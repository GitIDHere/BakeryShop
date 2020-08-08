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

Route::namespace('Auth')->group(function()
{
	Route::get('/login', 'LoginController@showLoginForm')->name('login.form');
	Route::post('/login', 'LoginController@login')->name('login.request');

	Route::get('/register', 'RegisterController@showRegistrationForm')->name('register.form');
	Route::post('/register', 'RegisterController@register')->name('register.request');

	// The page to enter the email to send a link to reset password
	Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

	// The user has clicked the link in email, and sees this page to reset password
	Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
});



/*
# TODO
GET|HEAD | password/confirm       | password.confirm | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm
POST     | password/confirm       |                  | App\Http\Controllers\Auth\ConfirmPasswordController@confirm
*/
