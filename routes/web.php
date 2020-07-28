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
    return view('master');
});

Route::get('/login', 'LoginRegisterController@showLogin')->name('user.login');
Route::post('/login', 'LoginRegisterController@loginUser');

Route::get('/register', 'LoginRegisterController@showRegister')->name('user.register');
Route::post('/register', 'LoginRegisterController@registerUser');