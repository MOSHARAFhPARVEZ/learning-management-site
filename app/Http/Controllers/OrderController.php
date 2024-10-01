<?php

namespace App\Http\Controllers;

use App\Models\Aboutins;
use App\Models\CourseSection;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function AdminPendingOrder()
    {

        $orders = Payment::where('status','pending')->orderBy('id','DESC')->get();
        return view('admin.backend.order.pendingorder',compact('orders'));


    } //end method

    public function AdminOrderDetails($id)
    {

        $payments = Payment::where('id',$id)->first();
        $orders = Order::where('payment_id',$id)->orderBy('id','DESC')->get();
        return view('admin.backend.order.orderdetails',compact('orders','payments'));

    } //end method


    public function PendingConfirm($id)
    {

        Payment::find($id)->update([
            'status' => 'confirm',
        ]);

        return redirect()->route('admin.confirm.order')->with('success','You Successfully Confirm This Order');

    } //end method


    public function AdminConfirmOrder()
    {

        $payments = Payment::where('status','confirm')->orderBy('id','DESC')->get();
        return view('admin.backend.order.confirmorder',compact('payments'));

    } //end method


    public function ConfirmOrderDetails($id)
    {

        $payments = Payment::where('id',$id)->first();
        $orders = Order::where('payment_id',$id)->orderBy('id','DESC')->get();
        return view('admin.backend.order.confirmdetails',compact('orders','payments'));

    } //end method


    public function CancelConfirm($id)
    {

        Payment::find($id)->update([
            'status' => 'pending',
        ]);

        return redirect()->route('admin.pending.order')->with('success','You Successfully Cancel This Order');

    } //end method


    public function InstuctorAllOrder()
    {

        $id = Auth::user()->id;

        $latestOrderItem = Order::where('instructor_id',$id)->select('payment_id',\DB::raw('MAX(id) as max_id'))->groupBy('payment_id');

        $orders = Order::joinSub($latestOrderItem , 'latest_order' , function($join){
            $join->on('orders.id' , '=' , 'latest_order.max_id');
        })->orderBy('latest_order.max_id','DESC')->get();
        // $orders = Order::where('instructor_id',$id)->orderBy('id','DESC')->get();


        return view('instuctor.order.allorders',compact('orders'));


    } //end method


    public function InstuctorOrderDetails($id)
    {
        $payments = Payment::where('id',$id)->first();
        $orders = Order::where('payment_id',$id)->orderBy('id','DESC')->get();
        return view('instuctor.order.orderdetails',compact('orders','payments'));

    } //end method


    public function InstuctorOrderInvoice($id)
    {
        $payments = Payment::where('id',$id)->first();
        $orders = Order::where('payment_id',$id)->orderBy('id','DESC')->get();


        $pdf = Pdf::loadView('instuctor.order.invoice_pdf',compact('payments','orders'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');


    } //end method


    public function UserCourse()
    {
        $id = Auth::user()->id;
        $mycoursers =  Order::where('user_id',$id)->orderBy('id','DESC')->get();
        $profiledata  = User::find($id);
        return view('frontend.dashboard.course.mycuourse',compact('mycoursers','profiledata'));

    } //end method


    public function UserCourseView($id)
    {
        $user_id = Auth::user()->id;

        $courses =  Order::where('course_id',$id)->where('user_id',$user_id )->first();
        $sections = CourseSection::where('course_id',$id)->orderBy('id','asc')->get();
        $ins = $courses->course->instuctor_id;

        return view('frontend.dashboard.course.cuourseview',compact('courses','sections'));

    } //end method






}
