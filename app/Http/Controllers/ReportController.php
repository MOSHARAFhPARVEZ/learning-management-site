<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function AdminReportView(){

        return view('admin.backend.report.reportview');
    } //end method


    public function AdminSearchDate(Request $request){

        // error part
        $request->validate([
            'order_date' => 'required',
        ]);
        // error part

        $order_date = new DateTime($request->order_date);
        $date = $order_date->format('d F Y');

        $payments = Payment::where('order_date',$date)->latest()->get();

        return view('admin.backend.report.searchby_date',compact('payments','date'));

    } //end method


    public function AdminSearchMonth(Request $request){

        // error part
        $request->validate([
            'order_month' => 'required',
            'order_year' => 'required',
        ]);
        // error part


        $month = $request->order_month;
        $year = $request->order_year;

        $payments = Payment::where('order_month',$month)->where('order_year',$year)->latest()->get();

        return view('admin.backend.report.searchby_month',compact('payments','month','year'));

    } //end method


    public function AdminSearchYear(Request $request){

        // error part
        $request->validate([
            'order_year' => 'required',
        ]);
        // error part

        $year = $request->order_year;

        $payments = Payment::where('order_year',$year)->latest()->get();

        return view('admin.backend.report.searchby_year',compact('payments','year'));

    } //end method


}
