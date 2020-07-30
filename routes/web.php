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

Route::get('/', 'HomeController@showHomepage');
Route::get('/home', 'HomeController@showHomepage');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('show_login_form');
Route::post('/login', 'Auth\LoginController@loginUser')->name('login_user');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('show_register_form');
Route::post('/register', 'Auth\RegisterController@register')->name('register_user');

# TODO - Implement custom routes
//Auth::routes();
