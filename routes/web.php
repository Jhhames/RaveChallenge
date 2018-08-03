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

// 
Route::get('/', 'WebController@index')->name('/');
Auth::routes();
Route::get('/dashboard', 'WebController@dashboard')->name('/dashboard');
Route::get('/addcard', 'WebController@addcard')->name('/addcard');
Route::post('/processcard', 'LogicController@addcard')->name('/processcard');

Route::post('/processSavings', 'LogicController@addSavings')->name('/processSavings');
Route::get('/savings', 'WebController@savings')->name('/savings');

Route::post('/processSpendings', 'LogicController@addSpendings')->name('/processSpendings');
Route::get('/spendings', 'WebController@spendings')->name('/spendings');

Route::get('/history', 'WebController@history')->name('/history');

Route::post('/adddetails', 'LogicController@details')->name('/adddetails');
Route::get('/details', 'WebController@details')->name('/details');
// Route::post('/api/savings', 'LogicController@addSavings')->name('/');
// Route::get('/home', 'HomeController@index')->name('home');
