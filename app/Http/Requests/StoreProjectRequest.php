<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:55|unique:projects',
            'description' => 'required|min:3|max:55',
        ];
    }

                    /** 
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            
            'name.required' => 'De naam is verplicht',
            'name.min' => 'De naam moet minimaal 3 letters bevatten',
            'name.max' => 'De naam mag niet meer dan :max karakters bevatten',
            'name.unique' => 'Deze naam is al door een ander project gebruikt',
            'description.required' => 'De beschrijving is verplicht',
            'description.max' => 'De beschrijving mag niet meer dan :max karakters bevatten',
            'description.min' => 'De beschrijving moet minimaal 3 letters bevatten',
        ];
    }
}
