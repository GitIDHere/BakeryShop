<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * @return array
	 */
    protected function rules()
	{
		return [
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed|between:5,50',
		];
	}

	/**
	 * @param Request $request
	 * @param null $token
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function showResetForm(Request $request, $token = null)
	{
		return view('pages.auth.password_reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
	}

}
