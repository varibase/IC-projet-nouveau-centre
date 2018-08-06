<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Company;

class RegistrationRequest extends FormRequest
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
            'phone' => 'numeric',
            'company' => 'max:50',
            'lang' => 'required|in:fr,en',
            'optin' => 'required',
            'terms' => 'required'
        ];
    }

    public function registerUser($location)
    {
        $confirmation_code = str_random(30);
        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'lang' => $this->lang,
            'location_id' => $location->location_id,
            'confirmation_code' => $confirmation_code
        ]);

        if($this->has('optin'))
        {
            $user->optin()->create([
                'optin' => 2,
                'optin_source' => 1,
                'optin_ip' => $this->ip()
            ]);
        }

        if($this->filled('company'))
        {
            $company = Company::firstOrCreate(['name' => $this->company, 'location_id' => $location->location_id]);
            $user->company_id = $company->company_id;
            $user->save();
        }

        if($this->filled('phone'))
        {
            $user->phone()->create([
                'phone_no' => $this->phone
            ]);
        }

        return $user;
    }

}
