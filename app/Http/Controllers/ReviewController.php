<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function UserReviewStore(Request $request){

        // error part
        $request->validate([
            'comments' => 'required',
            'ratings' => 'required',
        ]);
        // error part

        Review::insert([
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
            'comments' => $request->comments,
            'ratings' => $request->ratings,
            'instactor_id' => $request->instactor_id,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success','Review Will Approve By Admin');

    } //end method


////////////////////////////////////////////////////////////////////////////////////////////
////////////---Admin Part---////////////---Admin Part---//////////// ---Admin Part---///////
////////////////////////////////////////////////////////////////////////////////////////////

    public function AdminReviewView(){

        $reviews = Review::latest()->get();
        return view('admin.backend.review.reviewall',compact('reviews'));


    } // end method

    public function InactiveReview($id){

        $reviews = Review::find($id)->update([
            'status' => '0',
        ]);
        return back()->with('success','You Successfully Update Review Status');


    } // end method

    public function ActiveReview($id){

        $reviews = Review::find($id)->update([
            'status' => '1',
        ]);
        return back()->with('success','You Successfully Update Review Status');


    } // end method

////////////////////////////////////////////////////////////////////////////////////////////
///--- instuctor Part---/////////--- instuctor Part---//////////// --- instuctor Part---///
////////////////////////////////////////////////////////////////////////////////////////////



    public function InstuctorReviewIndex(){

        $reviews = Review::latest()->get();
        return view('instuctor.review.viewreview',compact('reviews'));


    } // end method










}
