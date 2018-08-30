<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Company;
use App\Models\Phone;

class ProfileRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,'.Auth::id().',user_id',
            'phone' => '',
            'company' => 'max:50',
            'lang' => 'required|in:fr,en',
        ];
    }

    public function updateUser()
    {
        $user = Auth::user();
        $user->email = $this->email;
        $user->lang  = $this->lang;
       
        if($this->filled('company'))
        {
            $company = Company::firstOrCreate(['name' => $this->company, 'location_id' => $user->location_id]);
            $user->company_id = $company->company_id;
        }
        
        if($this->filled('phone'))
        {
            $phone = Phone::updateOrCreate( ['user_id' => $user->user_id], 
                                            ['phone_no' => $this->phone]);
        }

        if(!$this->filled('phone') and !empty($user->phone->phone_no))
            $user->phone->delete();

        $user->save();
    }

}
