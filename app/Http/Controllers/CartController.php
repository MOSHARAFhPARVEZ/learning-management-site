<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddToCart(Request $request, $courseId){
        $course = Course::find($courseId);

        // check if the course is already in the cart
        $cartItem = Cart::search(function ($cartItem, $rowId) use ($courseId){
            return $cartItem->id === $courseId;
        });

        if ($cartItem->isNotEmpty()) {
            return back()->with('error','This Course Already on Your Cart');
        }

        if ($course->discount_price == NULL) {
            Cart::add([
                'id' => $courseId,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->selling_price,
                'weight' => 1,
                'options' =>
                [
                    'course_image' => $course->course_image,
                    'course_name_slug' => $course->course_name_slug,
                    'instactor_id' => $course->instactor_id,
                ]
            ]);

        } else {
            Cart::add([
                'id' => $courseId,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->discount_price,
                'weight' => 1,
                'options' =>
                [
                    'course_image' => $course->course_image,
                    'course_name_slug' => $course->course_name_slug,
                    'instactor_id' => $course->instactor_id,
                ]
            ]);
        }

        return back()->with('success','Successfully Added On Your Cart');



    } //end method

    public function CartData(){
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();


        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));
    } //end method

    public function CourseMiniCart(){
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();


        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));
    } //end method


    public function MiniCartRemove($rowId){

        Cart::remove($rowId);

        return back()->with('success','You Successfully Remove A Course From Cart');

    } //end method


    public function GoToCart(){

        return view('frontend.component.gotocart');

    } //end method


    public function GetCartData(){

        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();


        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));

    } //end method



    public function CartRemove($rowId){

        Cart::remove($rowId);

        return back()->with('success','You Successfully Remove A Course From Cart');

    } //end method






}
