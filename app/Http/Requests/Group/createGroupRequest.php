<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class createGroupRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'name_group' => 'Nome'
        ];
      
    }

    public function messages()
    {
        return [
            'name_group' => 'Nome'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_group' => 'required'
        ];
    }
}
