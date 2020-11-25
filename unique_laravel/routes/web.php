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
    return view('welcome');
});


Route::get('/b', function () {
    return view('b');
});

Route::get('/unique_n_generator', 'number@unique_n_generator')->name('unique_n_generator');
Route::get('/test-b', 'b@unique_n_generator')->name('b');
