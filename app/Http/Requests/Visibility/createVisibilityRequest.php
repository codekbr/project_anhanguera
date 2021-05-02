<?php

namespace App\Http\Requests\Visibility;

use Illuminate\Foundation\Http\FormRequest;

class createVisibilityRequest extends FormRequest
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
            'description' => 'required|min:5|max:255',
            'type' => 'required|max:50'
        ];
    }
}
