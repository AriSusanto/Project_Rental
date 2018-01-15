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
Route::get('/login',['uses'=>'MainController@login'])->middleware(['guest'])->name('login');
Route::get('/logout',['uses'=>'MainController@logout'])->middleware(['auth']);
Route::get('/register',['uses'=>'MainController@register'])->middleware(['guest']);
Route::get('/beranda',['uses'=>'MainController@beranda'])->middleware(['auth']);
Route::get('/data_pelanggan',['uses'=>'MainController@data_pelanggan'])->middleware(['auth']);
Route::get('/dashboard',['uses'=>'MainController@dashboard'])->middleware(['auth']);
Route::get('/order',['uses'=>'MainController@order'])->middleware(['auth']);
Route::get('/produks',['uses'=>'MainController@produks'])->middleware(['auth']);
Route::get('/tambahmobil',['uses'=>'MainController@tambahmobil'])->middleware(['auth']);

Route::post('/proses_daftar',['uses'=>'MainController@proses_daftar']);
Route::post('/proses_login',['uses'=>'MainController@proses_login']);
Route::post('/proses_tambahmobil',['uses'=>'MainController@proses_tambahmobil']);
Route::post('/proses_order',['uses'=>'MainController@proses_order']);
Route::post('/hapus_produk',['uses'=>'MainController@hapus_produk']);
Route::post('/proses_update_pelanggan',['uses'=>'MainController@proses_update_pelanggan']);
Route::post('/proses_update_produk',['uses'=>'MainController@proses_update_produk']);
Route::post('/hapus_pelanggan',['uses'=>'MainController@hapus_pelanggan']);