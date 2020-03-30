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

Route::get('/', 'HomeController@home')->name('home');

Route::get('/faq', 'HomeController@faq')->name('faq');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('dashboard');
    Route::resource('balances', 'BalanceController');

    Route::resource('accounttypes', 'AccounttypeController');

    Route::resource('accounts', 'AccountController');

    Route::resource('currencies', 'CurrencyController');

    Route::resource('liabilities', 'LiabilityController');
    Route::resource('loans', 'LiabilityController');

    Route::resource('periods', 'PeriodController');


    Route::resource('users', 'UserController');

    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'UserController@edit']);

    Route::resource('categories', 'CategoryController');

    Route::resource('bills', 'BillController');

    Route::resource('billItems', 'BillItemController');

    Route::resource('incomes', 'IncomeController');

    Route::resource('selfAssessments', 'SelfAssessmentController');
});

Route::resource('articles', 'ArticleController');