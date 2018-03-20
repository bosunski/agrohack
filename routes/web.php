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

Route::get('/', function () {
   return view('front.index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/signup', function () {
   return view('front.signup');
});

Route::get('/login', function () {
   return view('front.login');
});
Route::get('/header', function () {
   return view('front.header');
});

Route::get('/blog', function () {
   return view('front.blog');
});

Route::get('/dashboard', function () {
   return view('front.dashboard');
});


Route::get('/showcase', function () {
   return view('front.showcase');
});

Route::get('/chat', function () {
   return view('front.chat');
});

Route::get('/storage', function () {
   return view('front.storage');
});

Route::get('/contacts', function () {
   return view('front.contacts');
});

Route::get('/funding', function () {
    return view('front.funding');
});

Route::get('/training', function () {
    return view('front.training');
});

Route::get('/marketplace', function () {
    return view('front.marketplace');
});

Route::get('/marketplace-two', function () {
    return view('front.marketplace-two');
});


