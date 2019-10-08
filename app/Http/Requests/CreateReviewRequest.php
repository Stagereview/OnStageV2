<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
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
            'title' => 'required|min:1|max:191',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'rating' => 'required|min:1|max:10',
            'role' => 'required|min:1|max:191',
            'type' => 'required|min:1|max:1',
            'details' => 'required|min:1|max:255'
        ];
    }
}
