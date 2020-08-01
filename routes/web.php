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
Route::get('/home', 'HomeController@showHomepage')->name('home');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login.form');
Route::post('/login', 'Auth\LoginController@login')->name('login.request');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register.form');
Route::post('/register', 'Auth\RegisterController@register')->name('register.request');

// The page to enter the email to send a link to reset password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

// The user has clicked the link in email, and sees this page to reset password
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

/*
# TODO
GET|HEAD | password/confirm       | password.confirm | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm
POST     | password/confirm       |                  | App\Http\Controllers\Auth\ConfirmPasswordController@confirm
*/
