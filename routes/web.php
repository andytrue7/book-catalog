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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/dashboard', 'Admin\\AdminController@index')->name('admin.dashboard');
    Route::get('/admin/booklist', 'Admin\\AdminController@showBookList')->name('admin.booklist');
    Route::get('/admin/orderlist', 'Admin\\AdminController@showOrderList')->name('admin.orderlist');
    Route::post('/admin', 'Admin\\AdminController@storeBook')->name('admin.store');
    Route::get('/admin/booklist/{id}/edit', 'Admin\\AdminController@editBook')->name('admin.booklist.edit');
    Route::put('/admin/booklist/{id}', 'Admin\\AdminController@updateBook')->name('admin.booklist.update');
    Route::delete('/admin/booklist/{id}', 'Admin\\AdminController@deleteBook')->name('admin.booklist.delete');
});

Route::get('/catalog', 'CatalogController@index');
Route::get('/catalog/{id}', 'CatalogController@showBookPage')->name('catalog.show');

Route::get('/order/{id}', 'OrderController@index')->name('order.index');
Route::post('/order/{id}', 'OrderController@createOrder')->name('order.create');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/comment/{id}', 'CommentController@createComment')->name('comment.create');
    Route::delete('/comment/{id}', 'CommentController@deleteComment')->name('comment.delete');
});
