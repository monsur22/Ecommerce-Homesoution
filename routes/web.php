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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes(['verify' => true]);

//Login
Route::get('/login','singinupController@loginpage');
Route::post('/login/action','singinupController@loginaction');
Route::get('/logout','singinupController@logout');

//Singup

Route::get('/singup','singinupController@singuppageView');
Route::post('/singup/action','singinupController@singuppage');
Route::get('/emailverify/{email}/{token}','singinupController@email_verify');


//Forget
Route::get('/For-Email','singinupController@forgetEmailView');
Route::post('/For-Email/action','singinupController@forgetEmail');
Route::get('/Forget-vefify-email/{email}/{token}','singinupController@forget_email_verify');
Route::post('/Update-Pass','singinupController@forUpdatePass');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin','AdminController@index');
Route::post('/admin-post', 'AdminController@admin_post');
Route::get('/admin-edit/{id}', 'AdminController@admin_edit');
Route::post('/admin-post-update', 'AdminController@admin_post_update');

Route::get('/allpost', 'AdminController@all_post');
Route::get('/allpost/delete/{id}', 'AdminController@allpost_delete');
Route::get('/allpost-status/{id}',[
    'uses'=>'AdminController@allpost_status_update',
    'as'=>'allpost_status_update'
    ]);



// Route::get('/admin','AdminController@index')->middleware('verified');
Route::get('/user','UserController@index');
///home
Route::get('/', 'HomeController@index');
Route::get('/details/{id}', 'HomeController@details_by_id');
// Route::get('/details', 'HomeController@details_by_id');
Route::get('/Product-by-menu/{id}', 'HomeController@Product_by_menu');
Route::get('/contact', 'HomeController@contact');
Route::get('/Faq', 'HomeController@faq');
Route::get('/about', 'HomeController@about');




//admin
Route::get('/category','AdminController@category');
Route::post('/category','AdminController@category_add');
Route::get('/category-info/{id}', 'AdminController@category_edit');
Route::post('/category-update', 'AdminController@category_update');
Route::get('/category/delete/{id}', 'AdminController@category_delete');
Route::get('/category-status/{id}',[
    'uses'=>'AdminController@category_status_update',
    'as'=>'category_status_update'
    ]);


// // All post
// Route::get('/post-list','AdminController@post_list');
// // user
// admin
Route::get('/mypost', 'UserController@mypost');
Route::post('/mypost', 'UserController@mypost_add');
Route::get('/mypost-info/{id}', 'UserController@mypost_edit');
Route::post('/mypost-update', 'UserController@mypost_update');
Route::get('/mypost/delete/{id}', 'UserController@mypost_delete');
Route::get('/mypost-status/{id}',[
    'uses'=>'UserController@mypost_status_update',
    'as'=>'mypost_status_update'
    ]);


// // My Request
// Route::get('/my-request', 'UserController@my_request');
// Route::get('/request-my-post', 'UserController@request_my_post');
// Route::get('/request-my-post/{id}',[
//     'uses'=>'UserController@request_my_post_status_update',
//     'as'=>'request_my_post_status_update'
//     ]);
// Route::get('/Adapt-list', 'UserController@Adapt_list');

// // Volunteer
// Route::post('/volunteer-add', 'VolunteerController@volunteer_add');
// // Route::get('/mypost-view/{id}', 'VolunteerController@mypost_edit');
// // Route::get('/mypost/delete/{id}', 'VolunteerController@mypost_delete');

// Route::get('/contact/show','ContactController@contact_show');
// Route::post('/contact/front','ContactController@frontcontact');
// Route::get('/contact/delete/{id}','ContactController@contact_delete');
// Route::get('/contact/replay/{id}','ContactController@contact_replay');
// Route::post('/contact/replay-message','ContactController@replay_message');

// Cart Controller
Route::post('/addToCart','CartController@addtocart')->name('add-to-cart');
Route::get('/cart','CartController@cartshow')->name('cartshow');
Route::get('/checkout/delete/{id}','CartController@delete')->name('delete-cart-item');
Route::get('/checkout/update','CartController@update')->name('updatecart');
Route::get('/checkout','CartController@checkout')->name('checkout')->middleware('user');


// shiping info store
Route::post('/shipping-adress/store', 'CartController@shipping_info_store');
// payment

Route::get('/payment','CartController@payment')->name('payment')->middleware('user');
Route::post('/checkout/order', 'CartController@neworder')->middleware('user');
//Order manage..........................................................................................
Route::get('/order','UserController@show')->name('show')->middleware('user');
Route::get('/order/show/{id}','UserController@ordershow')->name('details');
Route::get('/order/invoice/{id}','UserController@orderinvoice')->name('invoice');
Route::get('/order/status/{id}',[
    'uses'=>'UserController@orderstatus',
    'as'=>'orderstatus'
    ]);
//Order manage admin..........................................................................................
Route::get('/admin/order','AdminController@show')->name('show')->middleware('admin');
Route::get('/admin/order/show/{id}','AdminController@ordershow')->name('details');
Route::get('/admin/order/invoice/{id}','AdminController@orderinvoice')->name('invoice');
Route::get('/admin/order/status/{id}',[
    'uses'=>'AdminController@admin_orderstatus',
    'as'=>'admin_orderstatus'
    ]);

//user order
Route::get('/my-order','UserController@my_order')->middleware('user');