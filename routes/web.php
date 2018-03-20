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

Route::get('/dashboard', 'DashboardController@index')->name('home');

Route::get('/signup', function () {
   return view('front.signup');
});

// Route::get('/login', function () {
//     return view('front.login');
// });
Route::get('/header', function () {
   return view('front.header');
});

Route::get('/blog', function () {
   return view('front.blog');
});

// Route::get('/dashboard', function () {
//     return view('front.dashboard');
// });


Route::get('/showcase', function () {
   return view('front.showcase');
});

Route::get('/chat', function () {
   return view('front.chat');
});

// Product Routes
Route::get('/product/list', 'ProductController@index')->name('product-list');
Route::post('/product/create', 'ProductController@create')->name('create-product');
Route::post('/product/update/{product_id}', 'ProductController@update')->name('update-product');
Route::get('/product/{product_id}', 'ProductController@getProduct')->name('product');
Route::post('/product/delete/{product_id}', 'ProductController@delete')->name('delete-product');

// User Routes
Route::get('/user/profile', 'UserController@getProfile')->name('profile');
Route::post('/user/updateprofile/{id}', 'UserController@updateProfile')->name('update-profile');
Route::get('/user/inviteaccept/{contact_id}', 'UserController@acceptContact')->name('accept-contact');
Route::get('/user/{id}', 'UserController@getUser')->name('get-user');
Route::get('/user/contacts', 'UserController@getContacts')->name('contacts');
Route::post('/user/addcontact', 'UserController@addContact')->name('addcontact');
Route::get('/user/removecontact', 'UserController@removeContact')->name('removecontact');
Route::get('/user/messages', 'UserController@getMessages')->name('messages');
Route::get('/user/conversation/{id}', 'UserController@getConversation')->name('conversation');

// Market Routes
Route::get('/marketplace', 'MarketController@index')->name('market');

// Funding Routes
Route::post('/funding/request', 'FundingController@requestFund')->name('fundrequest');
Route::get('/funding/cancel/{id}', 'FundingController@deleteFundRequest')->name('delete-fund-request');
Route::get('/funding/list', 'FundingController@listMyRequests')->name('myrequests');
Route::get('/funding/all', 'FundingController@getAllFundingRequests')->name('allrequests');


// Search Routes
Route::get('/search', 'SearchController@find')->name('find');
// // Category Routes
// Route::get('category/list', 'CategoryController@list')->name('category-list');
// Route::get('category/all', 'CategoryController@all')->name('category-all');
Route::post('category/create', 'CategoryController@create')->name('create-category');
// Route::put('category/update/{category_id}', 'CategoryController@update')->name('update-category');
Route::get('category/{category_id}', 'CategoryController@getCategory')->name('category');
// Route::delete('category/delete/{category_id}', 'CategoryController@delete')->name('delete-category');


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


Route::get('/marketplace-two', function () {
    return view('front.marketplace-two');
});
