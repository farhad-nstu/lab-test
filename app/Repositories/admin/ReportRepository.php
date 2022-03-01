<?php

namespace App\Repositories\admin;
use App\Models\UrlShort;
use App\Models\Log;
use Auth;
use DB;

class ReportRepository
{
    public function get_datewise_report_page()
    {
        return view('admin.reports.dateWiseReport');
    }

    public function get_datewise_report($request)
    {
    	$start = $request->start;
    	$end = $request->end;
        $logs = DB::table('logs')
        		->join('users', 'users.id', '=', 'logs.user_id')
        		->select('logs.*', 'users.name as user')
        		->whereBetween('logs.created_at', [$start, $end])
        		->get();
        return view('admin.reports.dateWiseReport', compact('logs', 'start', 'end'));
    }

    public function export_file($request)
    {
    	dd($request->all());
    	$start = $request->start;
    	$end = $request->end;
        $logs = DB::table('logs')
        		->join('users', 'users.id', '=', 'logs.user_id')
        		->select('logs.*', 'users.name as user')
        		->whereBetween('logs.created_at', [$start, $end])
        		->get();
        return view('admin.reports.dateWiseReport', compact('logs', 'start', 'end'));
    }
}
