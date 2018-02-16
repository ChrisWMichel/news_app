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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');


//Route::group(['middleware'=>'guest'], function () {
    Route::get('permissions-guests',['middleware'=>'check-permission:guest|member|admin|superadmin','uses'=>'HomeController@allUsers']);
    Route::get('permissions-members',['middleware'=>'check-permission:member|user|admin|superadmin','uses'=>'HomeController@members']);

    Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@superadmin']);
//});

Route::get('/logout', function (){auth()->logout(); return redirect('/');});

Route::get('member/verify/{token}', 'MembersController@receiveResetPassword')->name('verify');
Route::get('verify-admin/{token}', 'AdminController@receiveResetPassword')->name('verifyAdmin');

Route::post('member/reset', 'MembersController@resetPassword')->name('reset');

//Route::post('article', 'MembersController@article')->name('article');
Route::group(['middleware'=>'check-permission:admin|superadmin'], function (){

    Route::get('admin', 'AdminController@index')->name('admin-home');
    Route::get('articles', 'ArticleController@index')->name('admin-articles');
    Route::get('manage-articles', 'ArticleController@manageArticles')->name('manage-articles');
    Route::get('categories', 'CategoryController@index')->name('admin-categories');

    Route::get('comments', 'CommentController@index')->name('comments');
    Route::get('members', 'MembersController@index')->name('members');
    Route::get('advertisement', 'AdvertismentController@index')->name('advertisement');

    Route::get('new-admin', 'AdminController@newAdmin')->name('new_admin');
    Route::post('notify-admin', 'AdminController@notifyNewAdmin');


});
