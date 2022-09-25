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

Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/pelanggan', 'PelangganController@getIndex')->name('pelanggan');
    Route::post('/pelanggan/save', 'PelangganController@postSave')->name('pelanggan');
    Route::post('/pelanggan/edit', 'PelangganController@postEdit')->name('pelanggan');
    Route::post('/pelanggan/order', 'PelangganController@postOrder')->name('pelanggan');
    Route::get('/pelanggan/delete', 'PelangganController@postDelete')->name('pelanggan');

    Route::get('/pelanggan/modal-edit', 'PelangganController@getModalEdit')->name('pelanggan');
    Route::get('/pelanggan/modal-tambah', 'PelangganController@getModalTambah')->name('pelanggan');
    Route::get('/pelanggan/modal-order', 'PelangganController@getModalOrder')->name('pelanggan');

    Route::get('/galon', 'GalonController@index')->name('pelanggan');



});




