<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function AddToWishList(Request $request,$course_id){

        if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('course_id',$course_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'course_id' => $course_id,
                    'created_at' => Carbon::now(),
                ]);
                return back()->with('success','Successfully! Added on Your Wishlist');
            }else {
                return back()->with('error','Error! This Product Already on Your Wishlist');
            }
        }else{
            return back()->with('warning','Warning! Please Login First');
        }

    } //end method



    public function UserWishListIndex(){

        return view('frontend\dashboard\wishlist');
    } //end method

    public function GetWishListCourse(){

        $wishlist = Wishlist::with('course')->where('user_id',Auth::id())->latest()->get();
        $wishQty = Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['wishlist' => $wishlist , 'wishQty' => $wishQty]);
    } //end method

    public function RemoveWishList($id){

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return back()->with('success','Successfully! Deleted A Wishlist Course');

    } //end method



}
