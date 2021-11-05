<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:250'],
            'email' => ['required', 'email:rfc,dns'],
            'is_admin' => ['sometimes'],
        ];
    }
    public function messages()
    {
        return [
            'required'=> 'Bitte füllen Sie das :attribute Feld aus.'
        ];
    }

}
