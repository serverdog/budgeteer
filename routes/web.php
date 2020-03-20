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


Route::resource('balances', 'BalanceController');

Route::resource('accounttypes', 'AccounttypeController');

Route::resource('accounts', 'AccountController');

Route::resource('currencies', 'CurrencyController');

Route::resource('liabilities', 'LiabilityController');
Route::resource('loans', 'LiabilityController');

Route::resource('periods', 'PeriodController');Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'UserController@edit']);
	
});



Route::resource('categories', 'CategoryController');

Route::resource('bills', 'BillController');

Route::resource('billItems', 'BillItemController');