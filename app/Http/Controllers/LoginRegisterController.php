<?php

namespace App\Http\Controllers;

use App\Http\FormRequests\RegisterFormValidator;
use App\Services\Interfaces\IUserService;
use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{

	private $_userService;


	public function __construct(IUserService $userService)
	{
		$this->_userService = $userService;
	}

	/**
	 * Show the login form
	 */
	public function showLogin()
	{
		return view('pages.login');
	}


    /**
     * Receive the login attempt
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request)
    {

    }



    public function showRegister()
	{
		return view('pages.register');
	}


    public function registerUser(RegisterFormValidator $request)
	{
		$email = $request->input('email');
		$password = $request->input('password');

		$firstName = $request->input('first_name');
		$surname = $request->input('surname');
		$addressOne = $request->input('address_line_one');
		$addressTwo = $request->input('address_line_two');
		$city = $request->input('city');
		$postcode = $request->input('postcode');

		$newUser = $this->_userService->registerUser($email, $password);

		// Create UserProfile

		dd($request->get('password'));
	}


}
