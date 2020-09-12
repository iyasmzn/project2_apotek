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
    return redirect()->route('login');
});
Route::get('/home', function () {
    return redirect()->route('admin.home');
});
// Route::get('/admin', function () {
//     return view('admin.index');
// });
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@registrationProcess')->name('register');
Route::post('/login', 'AuthController@loginProcess')->name('loginProcess');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function ()
{
	Route::get('/', 'AdminController@index')->name('home');
	Route::prefix('/users')->name('users.')->group(function ()
	{
		Route::get('/', 'UserController@index')->name('index');
		Route::get('/trash', 'UserController@trash')->name('trash');
		Route::get('/create', 'UserController@create')->name('create');
		Route::post('/store', 'UserController@store')->name('store');
		Route::get('/restore/{id}', 'UserController@restore')->name('restore');
		Route::get('/edit/{id}', 'UserController@edit')->name('edit');
        Route::put('/update/{id}', 'UserController@update')->name('update');
        Route::delete('/delete/{id}', 'UserController@delete')->name('delete');
		Route::delete('/forceDelete/{id}', 'UserController@forceDelete')->name('forceDelete');
		Route::get('/view/{id}', 'UserController@view')->name('view');
	});
	Route::prefix('/tags')->name('tags.')->group(function ()
	{
		Route::get('/', 'TagController@index')->name('index');
		Route::get('/create', 'TagController@create')->name('create');
		Route::post('/store', 'TagController@store')->name('store');
		Route::get('/edit/{id}', 'TagController@edit')->name('edit');
        Route::put('/update/{id}', 'TagController@update')->name('update');
        Route::delete('/delete/{id}', 'TagController@delete')->name('delete');
	});
	Route::prefix('/drugs')->name('drugs.')->group(function ()
	{
		Route::get('/', 'DrugController@index')->name('index');
		Route::get('/create', 'DrugController@create')->name('create');
		Route::post('/store', 'DrugController@store')->name('store');
		Route::get('/edit/{id}', 'DrugController@edit')->name('edit');
        Route::put('/update/{id}', 'DrugController@update')->name('update');
        Route::delete('/delete/{id}', 'DrugController@delete')->name('delete');
	});
	Route::prefix('/orders')->name('orders.')->group(function ()
	{
		Route::get('/', 'OrderController@index')->name('index');
		Route::get('/create', 'OrderController@create')->name('create');
		Route::post('/store', 'OrderController@store')->name('store');
		Route::get('/edit/{id}', 'OrderController@edit')->name('edit');
        Route::put('/update/{id}', 'OrderController@update')->name('update');
        Route::delete('/delete/{id}', 'OrderController@delete')->name('delete');
	});
});