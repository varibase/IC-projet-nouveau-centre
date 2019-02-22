<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'partner_id' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'nullable|date_format:Y-m-d|after:start_date',
            'info_en' => 'array',
            'info_en.title' => 'string|max:250',
            'info_en.description' => 'string|max:500',
            'info_en.howto' => 'string|max:500',
            'info_en.legal_terms' => 'string|max:750',
            'info_fr' => 'array',
            'info_fr.title' => 'string|max:250',
            'info_fr.description' => 'string|max:500',
            'info_fr.howto' => 'string|max:500',
            'info_fr.legal_terms' => 'nullable|string|max:750',
        ];
    }
}
