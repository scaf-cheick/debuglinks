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


Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::get('/search', 'Thread\ThreadController@searchByKeword')->name('search.keywords');

Route::get('/members/{criteria?}','Contributors\MemberController@home')->name('member.home');
Route::get('/members/details/{ref}','Contributors\MemberController@show')->name('member.show');
Route::post('/members/filter/','Contributors\MemberController@filter')->name('member.filter');

Route::resource('threads','Thread\ThreadController');
Route::get('threads/{categoryTitle}/{id}','Thread\ThreadController@filterByCategory')->name('threads.filter-category');
Route::post('threads/filter-by-tags','Thread\ThreadController@filterByTag')->name('threads.filter-tags');
Route::delete('threads/custom-delete/{id}','Thread\ThreadController@customDelete')->name('threads.customdelete');
Route::post('/thread/comment/create/{thread}', 'Thread\ThreadController@commentThread')->name('comment-a-thread');
Route::post('/comment/reply/create/{comment}', 'Thread\ThreadController@replyComment')->name('reply-comment');

Auth::routes(['verify' => true]);

Route::group(['middleware'=>['auth','verified'],'namespace'=>'Contributors'],function(){

    Route::get('/account','AccountController@home')->name('account.home');
    Route::post('/account/update','AccountController@update')->name('account.update');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
