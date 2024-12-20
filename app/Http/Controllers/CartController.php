<?php

namespace App\Http\Controllers;

use App\Mail\Orderconfirm;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Notifications\OrderComplete;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Stripe;

class CartController extends Controller
{
    public function AddToCart(Request $request, $courseId){
        $course = Course::find($courseId);

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

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

        if (Session::has('coupon')) {
            $coupon_name = session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();


            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
            ]);

        }

        return response()->json(['success' => 'You Successfully Removed A Course']);

    } //end method

                    ////////////////////
                    /// Coupon Apply ///
                    ////////////////////

    public function CouponApply(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

        if ($coupon) {
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully',
            ));
        }else {
            return response()->json(['error' => 'Invaild Coupon']);
        }


    } //end method


    public function InsCouponApply(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

        if ($coupon) {
            if ($coupon->course_id == $request->course_id && $coupon->instuctor_id == $request->instuctor_id) {

                Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
            ]);

            return back()->with('success' , 'Coupon Applied Successfully');
            // return response()->json(array(
            //     'validity' => true,
            //     'success' => 'Coupon Applied Successfully',
            // ));

            }else {
                return back()->with('error' , 'This Coupon Is Not Valid For This Course');
            }

        }else {
            return back()->with('error' , 'This Coupon Is Invalid');
        }


    }  //end method




    public function CouponCalculation(){

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }


    } //end method

    public function CouponRemove(){

        Session::forget('coupon');
        return back()->with('success','You Successfully Remove The Coupon');

    } //end method

    public function CheckoutIndex(){

        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartTotal = Cart::total();
                $cartQty = Cart::count();

                return view('frontend.component.checkout',compact('carts','cartTotal','cartQty'));

            }
            else {
                return back()->with('warning','Please! Buy Atleast A Course');
            }
        }
        else {
            return redirect('/')->with('warning','Please! At First Login Your
            Account' );
        }


    }//end method

    public function OrderStore(Request $request){

        $user = User::where('role','instuctor')->get();

        if (Session::has('coupon')) {
            $total_amount = session()->get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['course_title'] = $request->course_title;
        $cartTotal = Cart::total();
        $carts = Cart::content();

        if ($request->cash_delivery == 'stripe') {
                return view('frontend.component.payment.stripe',compact('data','cartTotal','carts')) ;
            }
            elseif ($request->cash_delivery == 'handcash')  {

        // Create A New Payment Record
        $data = new Payment();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->cash_delivery = $request->cash_delivery;
        $data->total_amount = $total_amount;
        $data->payment_type = 'Direct Payment';
        $data->invoice_no = 'MMH' . mt_rand(10000000 , 99999999) ;
        $data->order_date = Carbon::now()->format('d F Y');
        $data->order_month = Carbon::now()->format('F');
        $data->order_year = Carbon::now()->format('Y');
        $data->status = 'pending';
        $data->created_at = Carbon::now();
        $data->save();


// start checking is the course enrolled or not //////////////////////
        foreach ($request->course_title as $key => $course_title) {

            $existingOrder = Order::where('user_id',Auth::user()->id)->where('course_id',$request->course_id[$key])->first();

            if ($existingOrder) {
                return back()->with('error','You Already Enrolled This Course');
            } //end if


            $order = new Order();
            $order->payment_id = $data->id;
            $order->user_id = Auth::user()->id;
            $order->course_id = $request->course_id[$key];
            $order->instructor_id = $request->instructor_id[$key];
            $order->course_title = $course_title;
            $order->price = $request->price[$key];
            $order->created_at = Carbon::now();
            $order->save();

        } //end foreach

        $request->session()->forget('cart');


        $paymentId = $data->id;

        // start Send Email To Student //
        $sendmail = Payment::find($paymentId);

        $data = [
            'invoice_no' => $sendmail->invoice_no,
            'total_amount' => $total_amount,
            'name' => $sendmail->name,
            'email' => $sendmail->email,
            'phone' => $sendmail->phone,
        ];

        Mail::to($request->email)->send(new Orderconfirm($data));
        // End Send Email To Student //

        // start notification part
        Notification::send($user, new OrderComplete($request->name));
        // start notification part





            return redirect()->route('index')->with('success','Cash On Delivery Successfuly Submited');
        } //end elseif




    } // end method



    public function StripeOrder(Request $request){

        if (Session::has('coupon')) {
            $total_amount = session()->get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        \Stripe\Stripe::setApiKey('sk_test_51Q5ogHKuaFjUPOvCznH5iYLvxl3ny8eYHqBlv4eMQL71Hnk0exUub8h7CAdIoiGO4DmCduzD29gJBk3sFVTJ2p7c000QPkoMMP');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total_amount*100,
            'currency' => 'usd',
            'description' => 'Lms',
            'source' => $token,
            'metadata' => ['order_id' => '3434'],
        ]);

        $payment_id = Payment::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'cash_delivery' => $request->cash_delivery,
            'total_amount' => $total_amount,
            'payment_type' => 'payment_type',
            'invoice_no' => 'MMH' . mt_rand(10000000 , 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ]);


        $carts = Cart::content();
        foreach ($carts as $cart) {
            Order::insert([
                'payment_id' =>$payment_id,
                'user_id' => Auth::user()->id,
                'course_id' => $cart->id,
                'instructor_id' => $cart->options->instactor_id,
                'course_title' => $cart->name,
                'price' => $cart->price,
            ]);
        } // end foreach


        // session forget for cart

        if (Session::has('coupon')) {
            Session::forget('coupon');
        } //end if

        Cart::destroy();


        return redirect()->route('index')->with('success','Stripe Payment Successfully Done');



    }// end method








    public function BuyCourse(Request $request, $courseId){
        $course = Course::find($courseId);

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

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

         return response()->json(['success' => 'Successfully Added on Your Cart']);



    } //end method


    public function ReadNotification(Request $request,$notificationId){

        $user = Auth::user();
        $notification = $user->notifications()->where('id',$notificationId)->first();
        if ($notification) {
            $notification->markAsRead();
        }
        return response()->json(['count' => $user->unreadNotifications()->count()]);


    } //end method








}
