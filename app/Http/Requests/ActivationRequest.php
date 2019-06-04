<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivationRequest extends FormRequest
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
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'phone' => '',
            'company' => 'max:50',
            'lang' => 'required|in:fr,en',
            'optin' => '',
            'terms' => ''
        ];
    }
}
