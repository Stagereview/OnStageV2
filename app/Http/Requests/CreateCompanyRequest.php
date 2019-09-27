<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
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
            'name' => 'required|unique:company|min:1|max:191',
            'street' => 'required|max:191',
            'city' => 'required|max:191',
            'zip_code' => 'required|regex:/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/i|min:4',
            'logo' => 'image',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'U dient een naam in te voeren.',
            'street.required'  => 'U dient een straat in te voeren',
            'city.required'  => 'U dient een stad in te voeren',
            'zip_code.required'  => 'U dient een postcode in te voeren',
            'name.unique' => 'Deze naam is al in gebruik, gelieve een andere naam kiezen.',
            'zip_code.regex' => 'Het formaat van de ingevoerde postcode is niet correct',
        ];
    }
}
