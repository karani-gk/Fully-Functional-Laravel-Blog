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

Route::get('/', ['as' => '/', 'uses' => 'FrontendController@index' ] );
Route::get('/about', ['as' => 'about', 'uses' => 'FrontendController@about' ] );
Route::get('/contact/me', ['as' => 'contact-me', 'uses' => 'FrontendController@contact' ] );
Route::get('/collections/article/{id}', ['as' => 'details', 'uses' => 'FrontendController@details' ] );
Route::post('/posts/search', ['as' => 'search', 'uses' => 'FrontendController@search' ] );
Route::post('/email/send', ['as' => 'sendmail', 'uses' => 'FrontendController@sendmail' ] );
Route::post('/subscribe/to/newsletter', ['as' => 'newsletter', 'uses' => 'FrontendController@newsletter' ] );
Route::get('/categories', ['as' => 'categories', 'uses' => 'FrontendController@categories' ] );
Route::post('/comment', ['as' => 'comment', 'uses' => 'FrontendController@comment' ] );
Route::post('/comment/response', ['as' => 'comment-response', 'uses' => 'FrontendController@commentresp' ] );

Route::get('/404', ['as' => '404', 'uses' => 'FrontendController@notfound' ] );
Route::get('/500', ['as' => '500', 'uses' => 'FrontendController@fatal' ] );

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::post('/post/save', ['as' => 'save-post', 'uses' => 'PostsController@save' ] );
});
