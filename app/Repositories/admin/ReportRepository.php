<?php

namespace App\Repositories\admin;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LogExport;

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
    	return Excel::download(new LogExport($request->start, $request->end), 'datewise-report.xlsx');
    }
}
