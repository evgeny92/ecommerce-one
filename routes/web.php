<?php


//Main page
Route::get('/', 'PartitionController@index')->name('home');
Route::get('/shirts', 'PartitionController@shirts')->name('shirts');
Route::get('/shirt', 'PartitionController@shirt')->name('shirt');


//Auth
Auth::routes();
/*Route::get('/home', 'HomeController@index')->name('home');*/
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');


//Cart resource
Route::resource('/cart', 'CartController');
Route::get('/cart/add-item/{id}', 'CartController@addItem')->name('cart.addItem');



//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){

   Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')->name('toggle.deliver');

   Route::get('/', function(){
      return view('admin.index');
   })->name('admin.index');

   //Products resource
   Route::resource('product', 'ProductsController');

   //Categories resource
   Route::resource('category', 'CategoriesController');

   //Orders
   Route::get('orders/{type?}', 'OrderController@orders');

});

//Address resource
Route::resource('address', 'AddressController');

//Checkout
//Route::get('checkout', 'CheckoutController@stepOne');

Route::group(['middleware' => 'auth'], function(){
   Route::get('shipping-info', 'CheckoutController@shipping')->name('checkout.shipping');
});


Route::get('payment', 'CheckoutController@payment')->name('checkout.payment');
Route::post('store-payment', 'CheckoutController@storePayment')->name('payment.store');