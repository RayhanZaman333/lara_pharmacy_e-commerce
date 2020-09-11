<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontend pages route
Route::get('/', 'PageController@index')->name('index');

Route::get('/pages/category', 'PageController@category')->name('category');
Route::get('/pages/category/{id}', 'PageController@categorywise_show')->name('categorywise.show');

Route::get('/pages/brand/{id}', 'PageController@brandwise_show')->name('brandwise.show');

Route::get('/pages/single', 'PageController@single')->name('single');
Route::get('/pages/single/{id}', 'PageController@single_show')->name('single.show');

Route::get('/pages/contact', 'PageController@contact')->name('contact');

Route::get('/search', 'PageController@search')->name('search');
// Route::resource('category', 'CategoryController');
// category.index, category.create,

//admin pages route
Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'AdminPagesController@index')->name('admin.index');
	Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
	Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');

	//category pages route
	Route::group(['prefix' => 'category'], function(){
		Route::get('/', 'CategoryController@show')->name('admin.category.index');
		Route::get('/create', 'CategoryController@create')->name('admin.category.create');
		Route::post('/store', 'CategoryController@store')->name('admin.category.store');
		Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
		Route::post('/update/{id}', 'CategoryController@update')->name('admin.category.update');
		Route::post('/delete/{id}', 'CategoryController@destroy')->name('admin.category.delete');
	});

	//brand pages route
	Route::group(['prefix' => 'brand'], function(){
		Route::get('/', 'BrandController@show')->name('admin.brand.index');
		Route::get('/create', 'BrandController@create')->name('admin.brand.create');
		Route::post('/store', 'BrandController@store')->name('admin.brand.store');
		Route::get('/edit/{id}', 'BrandController@edit')->name('admin.brand.edit');
		Route::post('/update/{id}', 'BrandController@update')->name('admin.brand.update');
		Route::post('/delete/{id}', 'BrandController@destroy')->name('admin.brand.delete');
	});

	//product pages route
	Route::group(['prefix' => 'product'], function(){
		Route::get('/', 'ProductController@index')->name('admin.product.index');
		Route::get('/create', 'ProductController@create')->name('admin.product.create');
		Route::post('/store', 'ProductController@store')->name('admin.product.store');
		Route::get('/edit/{id}', 'ProductController@edit')->name('admin.product.edit');
		Route::post('/update/{id}', 'ProductController@update')->name('admin.product.update');
		Route::post('/delete/{id}', 'ProductController@destroy')->name('admin.product.delete');

	});

	//order pages route
	Route::group(['prefix' => 'order'], function(){
		Route::get('/', 'OrderController@index')->name('admin.order.index');
		Route::get('/single/{id}', 'OrderController@show')->name('admin.order.show');
		Route::post('/delete/{id}', 'OrderController@destroy')->name('admin.order.delete');
		Route::post('/delivered/{id}', 'OrderController@delivered')->name('admin.order.delivered');
		Route::post('/paid/{id}', 'OrderController@paid')->name('admin.order.paid');

	});

	//user pages route
	Route::group(['prefix' => 'user'], function(){
		Route::get('/', 'UserController@index')->name('admin.user.index');
	});
});


//cart route
Route::group(['prefix' => 'carts'], function(){
	Route::get('/', 'CartController@index')->name('carts');
	Route::post('/store', 'CartController@store')->name('cart.store');
	Route::post('/update/{id}', 'CartController@update')->name('cart.update');
	Route::post('/delete/{id}', 'CartController@destroy')->name('cart.delete');
});


//checkout route
Route::group(['prefix' => 'checkout'], function(){
	Route::get('/', 'CheckoutController@index')->name('checkout');
	Route::post('/store', 'CheckoutController@store')->name('checkout.store');
});

// Route::resource('pro_image', 'ProductImageController');
// Route::('pro_image/search', 'ProductImageController@search')->name('pro_image.search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
