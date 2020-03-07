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


Route::get('/home', function() {
	return view('welcome');
});
Route::get('/testlogin', 'HomeWorkController@test1');
Route::post('/testlogin', 'HomeWorkController@handleForm');
Route::post('/testlogin', 'HomeWorkController@testPost');
Route::get('/testlogin1', 'UsersController@getInform');
Route::post('/testlogin1', 'UsersController@updateFirstInform');
Route::get('/welcome', function() {
    return view('home');
});
Route::get('/test', function() {
    return view('layouts/app');
});



Route::group([
    'namespace' => 'Frontend'
], function() {

    Route::get('/', 'SaleWebController@index')->name('frontend.index');
    Route::get('/cart', 'SaleWebController@cart');

    Route::get('/blog', 'BlogController@index')->name('blog.display');
    Route::get('/blog-details/{id}', 'BlogController@show');
    Route::post('/blog-details/{id}', 'BlogController@storeComment');
    Route::post('/blog/ajax', 'BlogController@rateAjax');


    Route::get('/checkout', 'SaleWebController@checkout');
    Route::get('/contact-us', 'SaleWebController@contact');
    Route::get('/product-details', 'SaleWebController@productDetails');
    Route::get('/sendemail', 'SaleWebController@sendemail');
    Route::get('/shop', 'SaleWebController@shop');
    Route::get('/404', 'SaleWebController@error');

    // Điều kiện khi chưa đăng nhập
    Route::group([
        'prefix' => 'member',
        'middleware' => ['memberNotLogin'],
    ], function () {
        Route::get('/login', 'MemberController@indexLogin')->name('member.login');
        Route::post('/login', 'MemberController@login');
        Route::get('/register', 'MemberController@indexRegister')->name('member.register');
        Route::post('/register', 'MemberController@register');
    });

     // Điều kiện đã đăng nhập
    Route::group([
        'prefix' => 'member',
        'middleware' => ['memberLogin'],
    ], function () {
        Route::get('/logout', 'MemberController@logout');

    });



    
});

// admin
Auth::routes();
//Login manager Route
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Auth'
], function () {
    Route::get('/', 'LoginController@showLoginForm');
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout');
});


// Điều hướng sau khi login
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['admin']
], function () {
	Route::get('/dashboard','WebSellingController@index')->name('admin.dashboard');
    
    Route::get('/profile', 'UserController@index')->name('admin.user');
    Route::post('/profile', 'UserController@update');
    Route::get('/member-list', 'UserController@show');

    Route::get('/countries', 'CountryController@show')->name('admin.country');
    Route::get('/countries/add-country', 'CountryController@create')->name('country.add');
    Route::post('/countries/add-country', 'CountryController@store');
    Route::get('/countries/edit/{id_country}', 'CountryController@edit')->name('country.edit');
    Route::post('/countries/edit/{id_country}', 'CountryController@update');
    Route::get('countries/delete/{id_country}', 'CountryController@destroy')->name('country.delete');

    Route::get('/blogs','BlogController@index')->name('admin.blog');
    Route::get('/blogs/add','BlogController@create')->name('blog.add');
    Route::post('/blogs/add','BlogController@store');
    Route::get('/blogs/edit/{id}','BlogController@edit')->name('blog.edit');
    Route::post('/blogs/edit/{id}','BlogController@update');
    Route::get('/blogs/delete/{id}','BlogController@destroy')->name('blog.delete');

	Route::get('/democart','WebSellingController@demoCart');
    Route::get('/error-404', 'WebSellingController@errors');
    Route::get('/form-basic', 'WebSellingController@formBasic');
    Route::get('/icon-material', 'WebSellingController@iconMaterial');
    Route::get('/starter-kit', 'WebSellingController@starterKit');
    Route::get('/table-basic', 'WebSellingController@tableBasic');
});
