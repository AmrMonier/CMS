<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function (){
  Route::get('/home', 'HomeController@index')->name('home');

  Route::prefix('post')->group(function () {
    Route::get('/trashed', 'PostController@trashed')->name('post.trashed');
    Route::delete('/remove', 'PostController@deletePermenat')->name('post.remove');
    route::put('/{post}/restore','PostController@restore')->name('post.restore');
    route::get('/delete-all', 'PostController@deleteAll')->name('post.delete-all');
    route::get('/restore-all', 'PostController@restoreAll')->name('post.restore-all');

  });
  Route::resource('post', 'PostController');

  Route::resource('category', 'CategoryController')->except(['show', 'create']);

  Route::resource('tag', 'TagController')->except(['show', 'create']);

});
