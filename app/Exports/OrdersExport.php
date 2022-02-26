<?php

namespace App\Exports;


use App\Models\Order;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use App\Models\admin\Product;
use App\Models\admin\ProductAttribute;
use App\Models\OrderItem;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    private $start_date;
    private $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        $orders = DB::table('orders')
                ->select('order_total_price', 'created_at', 'delivery_date', 'delivery_time', 'invoice_no', 'sender_full_name')
                ->where('status', 4)
                ->whereBetween('created_at', [$this->start_date, $this->end_date])
                ->get();

        return $orders;
    }

    public function headings(): array
    {
        return [
            'Order Price (USD)',
            'Order Price (BDT)',
            'Order Date',
            'Delivery Date',
            'Delivery Time',
            'Order ID',
            'Items',
            'Purchase Cost',
            'Cards',
            'Flowers',
            'Delivery Cost',
            'Total',
            'Profit/Loss',
            'Customer Name',
        ];
    }

    public function map($order): array
    {
        $items = OrderItem::where('invoice_no', $order->invoice_no)->get();
        $total = 0;
        $itemTitle = "";

        foreach($items as $item) {
            $itemTitle .= $item->product_name.", ";

            $buyingPrice = Product::where('id', $item->product_id)->pluck('buying_price')->first();
            if($item->attribute_id) {
                $buyingPrice = ProductAttribute::where('id', $item->attribute_id)->pluck('buying_price')->first();
            }
            $total = $total + $item->product_quantity * $buyingPrice;
        }

        $total = number_format((float)get_usd_to_bdt($total), 2, '.', '');
        $orderUsdPrice = number_format((float)$order->order_total_price, 2, '.', '');
        $orderBdtPrice = number_format((float)get_usd_to_bdt($order->order_total_price), 2, '.', '');

        $netPrice = $orderBdtPrice - $total;
        $netPrice = number_format((float)$netPrice, 2, '.', '');

        return [
            $orderUsdPrice,
            $orderBdtPrice,
            date('d-m-Y', strtotime($order->created_at)),
            date('d-m-Y', strtotime($order->delivery_date)),
            $order->delivery_time,
            $order->invoice_no,
            $itemTitle,
            $total,
            '-',
            '-',
            '-',
            $total,
            $netPrice,
            $order->sender_full_name,
        ];
    }
}
