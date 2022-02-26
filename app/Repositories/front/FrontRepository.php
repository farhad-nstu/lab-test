<?php

namespace App\Repositories\front;
use App\Models\UrlShort;

class FrontRepository
{
    public function index()
    {
        $urls = UrlShort::orderBy('id', 'desc')->get();
        return view('front.home', compact('urls'));
    }
}
