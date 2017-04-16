<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class WelcomeController extends Controller
{
    //
    public function index(){
      $publishedProducts = Product::where('publicationStatus',1)->get();
     return view('frontEnd.home.home_content',['publishedProducts'=>$publishedProducts]);
    }
    public function category($id){
        $publishedCategoryProducts = Product::where('categoryId',$id)
                ->where('publicationStatus',1)
                ->get();
        return view('frontEnd.category.category_content',['publishedCategoryProducts'=>$publishedCategoryProducts]);
    }
    public function productDetails($id){
        $productById = Product::find($id);
        return view('frontEnd.product.productDetails',['productById'=>$productById]);
    }
}
