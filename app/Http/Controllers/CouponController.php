<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{

    public function AdminCouponIndex(){

        $coupons = Coupon::latest()->get();

        return view('admin.backend.coupon.index',compact('coupons'));
    } //end method


    public function AdminCouponCreate(){

        return view('admin.backend.coupon.create');
    } //end method


    public function AdminCouponStore(Request $request){

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' =>$request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        return redirect('admin/coupon/index')->with('success','You Successfully Added A Coupon');

    } //end method


        public function AdminCouponEdit($id){

            $coupon = Coupon::find($id);

            return view('admin.backend.coupon.edit',compact('coupon'));
        } //end method

        public function AdminCouponUpdate(Request $request, $id){

            Coupon::find($id)->update([
                'coupon_name' => strtoupper($request->coupon_name),
                'coupon_discount' => $request->coupon_discount,
                'coupon_validity' =>$request->coupon_validity,
                'updated_at' => Carbon::now(),
            ]);
            return redirect('admin/coupon/index')->with('success','You Successfully Updated A Coupon');

        } //end method


        public function AdminCouponDestroy($id){

        Coupon::find($id)->delete();

        return redirect('admin/coupon/index')->with('success','You Successfully Deleted A Coupon');

        } //end method

///////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////instuctor coupon part//////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////

        public function InstuctorCouponIndex(){

            $id = Auth::user()->id;
            $coupons = Coupon::where('instuctor_id',$id)->latest()->get();

            return view('instuctor.coupon.viewcoupon',compact('coupons'));

        } //end method


        public function InstuctorCouponCreate(){

            $id = Auth::user()->id;
            $courses = Course::where('instactor_id',$id)->get();

            return view('instuctor.coupon.createcoupon',compact('courses'));

        } //end method


        public function InstuctorCouponStore(Request $request){

            Coupon::insert([
                'coupon_name' => strtoupper($request->coupon_name),
                'coupon_discount' => $request->coupon_discount,
                'coupon_validity' =>$request->coupon_validity,
                'course_id' => $request->course_id,
                'instuctor_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->route('instuctor.coupon.index')->with('success','You Successfully Created A Coupon');

        } //end method





        public function InstuctorCouponEdit($id){

            $coupon = Coupon::find($id);
            $courses = Course::latest()->get();

            return view('instuctor.coupon.editcoupon',compact('coupon','courses'));

        } //end method



        public function InstuctorCouponUpdate(Request $request , $id){

            Coupon::find($id)->update([
                'coupon_name' => strtoupper($request->coupon_name),
                'coupon_discount' => $request->coupon_discount,
                'coupon_validity' =>$request->coupon_validity,
                'course_id' => $request->course_id,
                'instuctor_id' => Auth::user()->id,
                'Updated_at' => Carbon::now(),
            ]);

            return redirect()->route('instuctor.coupon.index')->with('success','You Successfully Updated A Coupon');

        } //end method

        public function InstuctorCouponDestroy($id){

            Coupon::find($id)->delete();

            return redirect()->route('instuctor.coupon.index')->with('success','You Successfully Deleted A Coupon');

        } //end method















}


