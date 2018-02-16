<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('reset/password', 'MembersController@SendResetPassword');

/*Route::get('/get_sections', 'SectionController@getSections');
Route::post('/add_section_name', 'SectionController@addSectionName');
Route::put('/update_section_name/{id}', 'SectionController@updateSectionName');*/

Route::get('/get_categories', 'CategoryController@getCategories');
Route::post('/add_category_name', 'CategoryController@addCategory');
Route::put('/update_category/{id}', 'CategoryController@updateCategory');

Route::post('/add_article', 'ArticleController@addArticle');
Route::put('/admin_comment/{id}', 'ArticleController@addComment');

Route::get('/get_active_articles', 'ArticleController@getActiveArticles');
Route::get('/get_archive_articles', 'ArticleController@getArchives');
Route::put('/update-article/{id}', 'ArticleController@updateArticle');
Route::put('/update-active/{id}', 'ArticleController@updateActive');
Route::delete('/delete-article/{id}', 'ArticleController@destroy');

Route::get('/get_admins', 'AdminController@getAdmins');


