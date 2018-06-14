<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['isloggedin']], function(){    
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::auth();

Route::get('/home', 'HomeController@index');
// brands
Route::resource('/brand', 'Brand@brandview');
Route::get('/itemview/{id}', 'Brand@itemview');



Route::group(['middleware' => ['isadmin']], function(){    
    Route::get('/adminhome', function () {
        return view('admin.index');
    });
    Route::resource('/admindailydeals', 'AdminController@admindailydeals');
    Route::resource('/createdailydeal', 'AdminController@createdailydeal');
    Route::resource('/admindeletedailydeals', 'AdminController@admindeletedailydeals');
    Route::resource('/adminupdatedailydeals', 'AdminController@adminupdatedailydeals');
    Route::resource('/adminproductscreate', 'AdminController@adminproductscreate');
    Route::resource('/adminviewvendors', 'AdminController@adminviewvendors');
    Route::resource('/admincreatevendors', 'AdminController@admincreatevendors');
    Route::resource('/admineditvendors', 'AdminController@admineditvendors');
    Route::resource('/admindeletevendors', 'AdminController@admindeletevendors');
});

Route::resource('/profile', 'ProfileController@index');
Route::resource('/profileupdate', 'ProfileController@profileupdate');
Route::resource('/profilemakebrand', 'ProfileController@profilemakebrand');
Route::resource('/userpostcreate', 'ProfileController@userpostcreate');


Route::resource('/wishlist', 'CartController@wishlist');
Route::get('/wishlistreload', function(){
    $wishlist_count = App\Wishlist::where('user_id', Auth::user()->id)->count();
    return $wishlist_count;
});


Route::resource('/addtocart', 'CartController@addtocart');
Route::get('/cartreload', function(){
    $cart_count = App\Cart::where('user_id', Auth::user()->id)->count();
    return $cart_count;
});


