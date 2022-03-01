<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\admin\ReportRepository;

class ReportController extends Controller
{
    private $report;

    public function __construct(ReportRepository $report)
    {
        $this->report = $report;
    }

    public function get_datewise_report_page()
    {
        return $this->report->get_datewise_report_page();
    }

    public function get_datewise_report(Request $request)
    {
        return $this->report->get_datewise_report($request);
    }

    public function export_file(Request $request)
    {
        return $this->report->export_file($request);
    }
}
