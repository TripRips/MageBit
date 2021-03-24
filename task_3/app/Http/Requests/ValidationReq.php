<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  ValidationReq extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [

            'email' => 'required|email|not_regex:/.*\.co$/',
            'myCheck' => 'accepted',

        ];
    }

    public function messages()
    {
        return [
            'accepted' => 'You must accept the terms and conditions',
            'not_regex' => 'Not accepting subscriptions from Colombia',
            'required' => 'Email address is required',
            'email' => 'Please provide a valid e-mail address',
        ];
    }
}
