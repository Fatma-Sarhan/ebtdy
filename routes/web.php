<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('products/{product}/destory', function () {
//     return "here";
// });

Auth::routes();

Route::resource("categories","CategoryController");
Route::resource("products","ProductController");
Route::post("products/store","ProductController@store");
Route::get("products/destroy/{product}","ProductController@destroy");
Route::post("products/edit/{product}","ProductController@update");
Route::get('/home', 'HomeController@index');
