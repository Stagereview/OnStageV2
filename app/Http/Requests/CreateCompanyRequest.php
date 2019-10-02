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
            'name' => 'required|min:1|max:191',
            'street' => 'required|min:1|max:191',
            'housenumber' => 'required|min:1|max:191',
            'city' => 'required|min:1|max:191',
            'zip_code' => 'required|unique:company|regex:/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/i|min:4',
            'logo' => 'nullable|image'
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
            'street.required'  => 'U dient een straat in te voeren',
            'street.unique' => 'Deze straat is al in gebruik, gelieve een andere straat in te voeren.',
            'city.required'  => 'U dient een stad in te voeren',
            'zip_code.required'  => 'U dient een postcode in te voeren',
            'name.unique' => 'Deze naam is al in gebruik, gelieve een andere naam kiezen.',
            'zip_code.regex' => 'Het formaat van de ingevoerde postcode is niet correct',
            'zip_code.unique' => 'Deze postcode is al in gebruik, gelieve een andere postcode in te voeren.',
            'housenumber.required' => 'U dient een huisnummer in te voeren.',
            'housenumber.unique' => 'Dit huisnummer is al in gebruik, gelieve een ander huisnummer in te voeren.'
        ];
    }
}
