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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/b/search', 'BooksController@search')->name('searchBook');
Route::get('/b/detail/{id}', 'BooksController@detail')->name('bookDetail');
Route::get('/b/track', 'BooksController@track')->name('trackBook');

Route::group(['middleware' => ['privacy']], function () {
    Route::get('/borrow/record/{id}', 'BorrowsController@record')->name('recordBorrow');
});

Route::group(['middleware' => ['manager']], function () {
    Route::post('/b/add', 'BooksController@store');
    Route::post('/b/edit/{id}', 'BooksController@edit');
    Route::get('/b/delete/{id}', 'BooksController@delete');
    Route::get('/b/manage', 'BooksController@manage')->name('manageBook');
});

Route::group(['middleware' => ['admin']], function () {
    Route::get('/user/manage', 'UsersController@manage')->name('manageUser');
    Route::post('/user/add', 'UsersController@store');
    Route::post('/user/edit/{id}', 'UsersController@edit');
    Route::get('/user/delete/{id}', 'UsersController@delete');
});

Route::group(['middleware' => ['manager']], function () {
    Route::get('/borrow/manage', 'BorrowsController@manage')->name('manageBorrow');
    Route::get('/borrow/create', 'BorrowsController@create')->name('createBorrow');
    Route::post('/borrow/add', 'BorrowsController@add');
    Route::post('/borrow/store', 'BorrowsController@store');
    Route::get('/borrow/return/{id}', 'BorrowsController@remand');
    Route::get('/borrow/renew/{id}', 'BorrowsController@renewal');
    Route::post('/borrow/edit/{id}', 'BorrowsController@edit');
    Route::get('/borrow/delete/{id}', 'BorrowsController@delete');
});
