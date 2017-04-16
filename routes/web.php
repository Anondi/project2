<?php

Route::get('/','WelcomeController@index');
Route::get('/category/{id}','WelcomeController@category');
Route::get('/product-details/{id}','WelcomeController@productDetails');

/*Cart Info*/
Route::post('/add-to-cart','CartController@addToCart');
Route::get('/cart/show','CartController@showCart');
Route::get('/cart/delete/{id}','CartController@deleteCartProduct');
Route::post('/cart/update/{id}','CartController@updateCartProduct');
Route::get('/checkout/index','CheckoutController@index');
Route::post('/new-customer','CheckoutController@customerRegistration');
Route::get('/shipping-info','CheckoutController@showShippingForm');
Route::post('/new-shipping','CheckoutController@saveShippingInfo');
Route::get('/payment-info','CheckoutController@showPaymentForm');
Route::post('/new-order','CheckoutController@saveOrderInfo');
Route::get('/my-home','CustomerController@index');
/*Cart Info*/


Auth::routes();
Route::get('/home', 'HomeController@index');

/*Category Info */
Route::get('add-category','CategoryController@createCategory');
Route::post('new-category','CategoryController@storeCategory');
Route::get('/manage-category','CategoryController@showCategory');
Route::get('/edit-category/{id}','CategoryController@editCategory');
Route::post('/update-category','CategoryController@updateCategory');
Route::get('/delete-category/{id}','CategoryController@deleteCategory');
/*Category Info*/
/*Manufacturer Info*/
Route::get('add-manufacturer','ManufacturerController@createManufacturer');
Route::post('new-manufacturer','ManufacturerController@storeManufacturer');
Route::get('/manage-manufacturer','ManufacturerController@showManufacturer');
Route::get('/edit-manufacturer/{id}','ManufacturerController@editManufacturer');
Route::post('update-manufacturer','ManufacturerController@updateManufacturer');
Route::get('/delete-manufacturer/{id}','ManufacturerController@deleteManufacturer');
/*Manufacturer Info*/
/*Product Info*/
Route::get('/add-product','ProductController@createProduct');
Route::post('new-product','ProductController@storeProduct');
Route::get('/manage-product','ProductController@manageProduct');
Route::get('/view-product/{id}','ProductController@viewProduct');
Route::get('/delete-product/{id}','ProductController@deleteProduct');
Route::get('/manage-order','ProductController@manageOrder');
/*Product Info*/


