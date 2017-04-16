<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use App\Shipping;
use App\Order;
use App\Payment;
use App\OrderDetails;
use Cart;
class CheckoutController extends Controller
{
    public function index(){
        return view('frontEnd.checkout.showCheckoutForm');
    }
    public function customerRegistration(Request $request){
        $customer = new Customer();
        $customer->firstName=$request->firstName;
        $customer->lastName=$request->lastName;
        $customer->emailAddress=$request->emailAddress;
        $customer->password=  bcrypt($request->password);
        $customer->address=$request->address;
        $customer->phoneNumber=$request->phoneNumber;
        $customer->districtName=$request->districtName;
        $customer->save();
        $customerId=$customer->id;
        Session::put('customerId',$customerId);
        return redirect('/shipping-info');
    }
    public function showShippingForm(){
        $customerId = Session::get('customerId');
        $customerById = Customer::find($customerId);
        return view('frontEnd.checkout.showShippingForm',['customerById'=>$customerById]);
    }
    public function saveShippingInfo(Request $request){
        $shipping = new Shipping();
        $shipping->fullName=$request->fullName;
        $shipping->emailAddress=$request->emailAddress;
        $shipping->address=$request->address;
        $shipping->phoneNumber=$request->phoneNumber;
        $shipping->districtName=$request->districtName;
        $shipping->save();
        $shippingId=$shipping->id;
        Session::put('shippingId',$shippingId);
        return redirect('/payment-info');
    }
    public function showPaymentForm(){
         return view('frontEnd.checkout.showPaymentForm');
    }
    public function saveOrderInfo(Request $request){
       $paymentType= $request->paymentType;
       if($paymentType=='cashOnDelivery'){
           $order=new Order();
           $order->customerId = Session::get('customerId');
           $order->shippingId = Session::get('shippingId');
           $order->orderTotal = Session::get('orderTotal');
           $order->save();
           Session::put('orderId',$order->id);
           $payment = new Payment();
           $payment->orderId=Session::get('orderId');
           $payment->paymentType=$request->paymentType;
           $payment->save();
         
           $cartProducts=Cart::content();
           foreach($cartProducts as $cartProduct){
                 $orderDetails = new OrderDetails();
                 $orderDetails->orderId = Session::get('orderId');
                 $orderDetails->productId = $cartProduct->id;
                 $orderDetails->productName = $cartProduct->name;
                 $orderDetails->productPrice = $cartProduct->price;
                 $orderDetails->productQuantity = $cartProduct->qty;
                 $orderDetails->save();
           }
           return redirect('/my-home');
           
       }else if($paymentType=='paypal'){
           
       }else if($paymentType=='bkash'){
           
       }
    }
}
