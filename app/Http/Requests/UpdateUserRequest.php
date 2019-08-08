<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|min:4|max:50',
            'email' => 'required|string|min:4',
            'FIO' => 'string|min:4|max:150',
            'phone' => 'string|min:4|max:50',
            'photo' => 'sometimes|image|max:50000',
            'birthdayDate' => 'date',
        ];
    }
}
