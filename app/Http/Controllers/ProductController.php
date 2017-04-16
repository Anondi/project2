<?php

namespace App\Http\Controllers;

use App\Category;
use App\Manufacturer;
use App\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProduct() {
        $publishedCategories = Category::where('publicationStatus', 1)->get();
        $publishedManufacturers = Manufacturer::where('publicationStatus', 1)->get();
        return view('admin.product.createProduct', ['publishedCategories' => $publishedCategories, 'publishedManufacturers' => $publishedManufacturers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduct(Request $request) {
        $this->formValidation($request);

        $productImage = $request->file('productImage');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;

        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
        return redirect('/add-product')->with('message', 'Product Info Save Successfully');
    }

    private function formValidation(Request $request) {
        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productImage' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manageProduct() {
        $products = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.categoryId')
                ->join('manufacturers', 'manufacturers.id', '=', 'products.manufacturerId')
                ->select('products.productName', 'products.id', 'products.productPrice', 'products.productQuantity', 'products.publicationStatus', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->get();
        return view('admin.product.manageProduct', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewProduct($id) {
        $productById = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.categoryId')
                ->join('manufacturers', 'manufacturers.id', '=', 'products.manufacturerId')
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->where('products.id', $id)
                ->first();
        return view('admin.product.viewProduct', ['productById' => $productById]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id) {
         $product = Product::find($id);
       $product->delete();
       return redirect('/manage-product')->with('message','Successfully Deleted');
    }
    public function manageOrder(){
          $orders = DB::table('orders')
                ->join('payments', 'payments.orderId', '=', 'orders.id')
                ->join('order_details', 'order_details.orderId', '=', 'orders.id')
                ->join('customers', 'customers.id', '=', 'orders.customerId')
                ->select('orders.*', 'payments.*', 'order_details.*','customers.*')
                ->get();
          return view('admin.product.viewOrder', ['orders' => $orders]);
    }

}
