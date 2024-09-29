<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

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



}

