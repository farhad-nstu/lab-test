<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\front\FrontRepository;

class FrontController extends Controller
{
    private $data;

    public function __construct(FrontRepository $data)
    {
        $this->data = $data;
    }

    //this method is show home page
    public function index()
    {
        return $this->data->index();
    }

    public function hit_link(Request $request, $link)
    {
        return $this->data->hit_link($request, $link);
    }

    public function get_qrcode($link)
    {
        return $this->data->get_qrcode($link);
    }
}
