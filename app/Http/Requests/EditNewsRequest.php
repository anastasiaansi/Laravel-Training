<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'short_description' => ['required', 'string','min:3','max:255'],
            'description' => ['required', 'string','min:5', 'max:512'],
            'status' => ['required', 'string','min:5', 'max:15'],
            'author_id' => ['required', 'string'],
            'category_id' => ['required', 'string'],
            'image'  => ['nullable'],
            ];
    }
    public function messages()
    {
        return [
            'required'=> 'Bitte füllen Sie das :attribute Feld aus.'
        ];
    }
    public function attributes()
    {
        return [
            'author_id' => 'Autor',
            'category_id' => 'Kategorie',

        ];
    }
}
