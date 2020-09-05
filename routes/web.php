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
// Route::get('/admin', function () {
//     return view('admin.index');
// });
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@register')->name('register');

Route::prefix('/admin')->name('admin.')->group(function ()
{
	Route::get('/', 'AdminController@index')->name('home');
	Route::prefix('/users')->name('users.')->group(function ()
	{
		Route::get('/', 'UserController@index')->name('index');
		Route::get('/edit', 'UserController@edit')->name('edit');
	});
	Route::prefix('/drugs')->name('drugs.')->group(function ()
	{
		Route::get('/', 'DrugController@index')->name('index');
		Route::get('/edit', 'DrugController@edit')->name('edit');
	});
});