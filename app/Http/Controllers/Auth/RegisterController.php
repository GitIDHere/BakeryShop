<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\Interfaces\IUserProfileService;
use App\User;
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
		'email' => ['required', 'string', 'email', 'between:5,250', 'unique:App\Models\User,email'],
		'password' => ['required', 'string', 'between:5,50', 'confirmed'],
		'first_name' => ['required', 'alpha', 'between:2,30'],
		'surname' => ['required', 'alpha', 'between:2,30'],
		'address_line_one' => ['required', 'between:3,50'],
		'address_line_two' => ['required', 'between:3,50'],
		'city' => ['required', 'between:3,50'],
		'postcode' => ['between:6,8'],
	];

	private $_validationMessages = [
		'password.required' => 'Please provide a password',
		'password.between' => 'The password must be at least 5 characters long',

		'email.required' => 'Please provide an email address',
		'email.between' => 'The email must be at least 5 characters long',

		'first_name.between' => 'First name must be at least 2 characters',
		'surname.between' => 'Surname must be at least 2 characters',
		'address_line_one.between' => 'Address line 1 must be at least 3 characters',
		'address_line_two.between' => 'Address line 2 must be at least 3 characters',
		'city.between' => 'City must be at least 3 characters',
		'postcode.between' => 'Postcode must be at least 6 characters',
	];

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * @var IUserProfileService
	 */
    private $_userProfileService;


    /**
     * Create a new controller instance.
     *
	 * @param IUserProfileService $userProfileService
     * @return void
     */
    public function __construct(IUserProfileService $userProfileService)
    {
        $this->middleware('guest');
        $this->_userProfileService = $userProfileService;
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
		$addressLineOne = $request->input('address_line_one');
		$addressLineTwo = $request->input('address_line_two');
		$city = $request->input('city');
		$postcode = $request->input('postcode');

		$this->_userProfileService->createProfile($user->id, $firstName, $surname, $addressLineOne, $addressLineTwo, $city, $postcode);
	}
}


