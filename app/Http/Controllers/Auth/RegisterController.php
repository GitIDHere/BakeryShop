<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users\User;
use App\Providers\RouteServiceProvider;
use App\Services\Interfaces\IUserAddressService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    private $_validationRules = [
		'email' => ['required', 'string', 'email', 'between:5,250', 'unique:App\Models\Users\User,email'],
		'password' => ['required', 'string', 'between:5,50', 'confirmed'],
		'first_name' => ['required', 'alpha', 'between:2,30'],
		'surname' => ['required', 'alpha', 'between:2,30'],
	];

	private $_validationMessages = [
		'email.required' => 'Please provide an email address',
		'email.between' => 'The email must be at least 5 characters long',

		'password.required' => 'Please provide a password',
		'password.between' => 'The password must be at least 5 characters long',

		'first_name.between' => 'First name must be at least 2 characters',
		'surname.between' => 'Surname must be at least 2 characters',
	];

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * @var IUserAddressService
	 */
    public $_userAddressService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IUserAddressService $userAddressService)
    {
        $this->middleware('guest');
        $this->_userAddressService = $userAddressService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->_validationRules, $this->_validationMessages);
    }

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showRegistrationForm()
	{
		return view('pages.auth.register');
	}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


	/**
	 * The user has been registered. Create the UserProfile entry
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  mixed  $user
	 * @return mixed
	 */
	protected function registered(Request $request, $user)
	{
		$firstName = $request->input('first_name');
		$surname = $request->input('surname');

		$userDetails = [
			'first_name' => $firstName,
			'surname' => $surname
		];

		$this->_userAddressService->createAddress($user->id, $userDetails);
	}
}


