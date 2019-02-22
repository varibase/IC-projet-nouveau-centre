<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
            'name_en' => 'required|string|max:50',
            'name_fr' => 'required|string|max:50',
            'logo' => 'nullable|image|dimensions:ratio=1',
            'address' => 'array',
            'address.address_1' => 'string|max:100',
            'address.address_2' => 'nullable|string|max:100',
            'address.postal_code' => 'string|max:7',
            'address.city' => 'string|max:50',
            'address.province' => 'string|max:2',
            'address.longitude' => 'required',
            'address.latitude' => 'required',
        ];
    }
}
