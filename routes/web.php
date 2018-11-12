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

Auth::routes(['register' => false]);
route::resource('repair','RepairController')->middleware('auth');

route::resource('customer','CustomerController')->middleware('auth');
Route::get('repair/{id}/p', 'RepairController@printReceipt')->middleware('auth');
Route::get('repair/{id}/v', 'RepairController@showReceipt')->middleware('auth');
Route::get('reports', 'RepairController@reports')->name('repair.getReports')->middleware('auth');
Route::post('reports', 'RepairController@reports')->name('repair.reports')->middleware('auth');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
