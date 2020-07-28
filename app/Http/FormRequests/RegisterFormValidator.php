<?php namespace App\Http\FormRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterFormValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    	// Only if the user is not logged in
        return (empty(Auth::user()));
    }



    public function messages()
	{
		return [
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
	}



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'email' => 'required|email|between:5,250|unique:App\Models\User,email',
			'password' => 'required|string|between:5,50|confirmed',

			'first_name' => 'required|alpha|between:2,30',
			'surname' => 'required|alpha|between:2,30',
			'address_line_one' => 'required|between:3,50',
			'address_line_two' => 'required|between:3,50',
			'city' => 'required|between:3,50',
			'postcode' => 'nullable|between:6,8',
        ];
    }
}
