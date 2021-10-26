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



Route::get('/', function (){
    return view('/index');
})->name('dashboard');

Route::get('/products', function (){
    return view('/products');
})->name('products');

Route::get('/orders', function (){
    return view('/orders');
})->name('orders');

Route::get('/settings', function (){
    return view('/settings');
})->name('settings');

Route::get('/updates', function () {
    return view('update');
})->name('updates');

Route::get('/api', function () {
    return view('api');
})->name('api');
