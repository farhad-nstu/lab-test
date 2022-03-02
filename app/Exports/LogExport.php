<?php

namespace App\Exports;

use App\Models\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use DB;

class LogExport implements FromCollection, WithHeadings, WithMapping
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
        $logs = DB::table('logs')
        		->join('users', 'users.id', '=', 'logs.user_id')
        		->select('users.name as user', 'logs.link', 'logs.ip', 'logs.location', 'logs.latitude', 'logs.longitude', 'logs.browser', 'logs.os', 'logs.device')
        		->whereBetween('logs.created_at', [$this->start_date, $this->end_date])
        		->get();

        return $logs;
    }

    public function headings(): array
    {
        return [
            'User',
            'Link',
            'IP',
            'Location',
            'Latitude',
            'Longititude',
            'Browser',
            'OS',
            'Device'
        ];
    }

    public function map($order): array
    {
        return [
            $order->user,
            $order->link,
            $order->ip,
            $order->location,
            $order->latitude,
            $order->longitude,
            $order->browser,
            $order->os,
            $order->device,
        ];
    }
}
