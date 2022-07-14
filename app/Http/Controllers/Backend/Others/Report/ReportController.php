<?php

namespace App\Http\Controllers\Backend\Others\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Invoice\Invoice;
use PDF;

class ReportController extends Controller
{
    public function View()
    {
        return view ('backend.main-section.page.others.report.daily.view');
    }

    public function DailyView(Request $request)
    {
        $sdate = date('Y-m-d',strtotime($request->sdate));
        $edate = date('Y-m-d',strtotime($request->edate));
        $data ['allData'] = Invoice::whereBetween('date',[$sdate,$edate])->where('status','1')->get();
        $data ['start_date'] = date('Y-m-d',strtotime($request->sdate));
        $data ['end_date'] = date('Y-m-d',strtotime($request->edate));
        $pdf = PDF::loadView('backend.main-section.page.others.report.daily.pdf', $data);
        return  $pdf->stream('invoice.pdf');
    }
}
