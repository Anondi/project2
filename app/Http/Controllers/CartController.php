<?php

namespace App\Http\Controllers;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $productQuantity=$request->qty;
        $productId=$request->productId;
        $productById = Product::find($productId);
        Cart::add([
            'id' =>$productId,
            'name' =>$productById->productName,
            'price' =>$productById->productPrice,
            'qty' =>$productQuantity,
        ]);
        return redirect('/cart/show');
    }
    public function showCart(){
        $cartProducts=Cart::content();
        return view('frontEnd.cart.showCart',['cartProducts'=>$cartProducts]);
    }
    public function deleteCartProduct($id){
        Cart::remove($id);
        return redirect('/cart/show');
    }
    public function updateCartProduct($id,  Request $request){
        $productQuantity=$request->qty;
        cart::update($id,$productQuantity);
        return redirect('/cart/show');
        
    }
}
