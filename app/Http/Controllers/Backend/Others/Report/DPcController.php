<?php

namespace App\Http\Controllers\Backend\Others\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Purchase\Purchase;
use PDF;

class DPcController extends Controller
{
    public function PcView()
    {
        return view ('backend.main-section.page.others.report.daily-pc.view');
    }

    public function PcStockView(Request $request)
    {
        $sdate = date('Y-m-d',strtotime($request->sdate));
        $edate = date('Y-m-d',strtotime($request->edate));
        $data ['allData'] = Purchase::whereBetween('date',[$sdate,$edate])->where('status','1')->get();
        $data ['start_date'] = date('Y-m-d',strtotime($request->sdate));
        $data ['end_date'] = date('Y-m-d',strtotime($request->edate));
        $pdf = PDF::loadView('backend.main-section.page.others.report.daily-pc.pdf', $data);
        return  $pdf->stream('invoice.pdf');
    }
}
