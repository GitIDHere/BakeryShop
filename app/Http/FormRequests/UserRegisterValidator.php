<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function messages()
	{
		return [
			'password.required' => 'Please provide a password',
			'password.between' => 'The password must be between 5 and 50 characters long',

			'email.required' => 'Please provide an email address',
			'email.between' => 'The email must be between 5 and 250 characters long',


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
			'password' => 'required|string|between:5,50',

			'first_name' => 'required|alpha|between:2,30',
			'surname' => 'required|alpha|between:2,30',
			'address_line_one' => 'required|between:3,50',
			'address_line_two' => 'required|between:3,50',
			'city' => 'required|between:3,50',
			'country_id' => 'required|size:2',
			'postcode' => 'nullable|size:between:6,8',
			'usa_state_id' => 'nullable|size:2',
			'zip' => 'nullable|between:3,10',
        ];
    }
}
