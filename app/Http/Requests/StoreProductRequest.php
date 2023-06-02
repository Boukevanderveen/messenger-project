<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->isAdmin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [
            'name' => 'required|max:55',
            'categories[]' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:16000|nullable',
            'initial_page' => 'required_with:end_page|integer|min:1|digits_between: 1,5',
            'price' => 'required|regex:/^[0-9]{1,9}([,.][0-9]{1,9})?$/',
            'discount_price' => 'nullable|regex:/^[0-9]{1,9}([,.][0-9]{1,9})?$/|lt:price',
            'stock' => 'required|numeric|min:0|max:999999',
            'description' => 'required|max:65535',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Het veld naam is verplicht',
            'categories[].required' => 'Categorie(ën) zijn verplicht',
            'name.max' => 'De naam mag niet meer dan 55 karakters bevatten',
            'picture.mimes' => 'De afbeelding moet van type jpeg, png, jpg, gif of svg zijn',
            'picture.max' => 'De afbeelding mag niet groter dan 16mb zijn',
            'picture.image' => 'Het het veld afbeelding moet een afbeelding bevatten',
            'price.required' => 'Het veld prijs is verplicht',
            'price.regex' => 'Het veld prijs moet van juist formaat zijn. Voorbeeld: (1,95 of 1.95) en binnen de 999999 euro',            
            'discount_price.lt' => 'Het veld kortingsprijs moet lager zijn dan de prijs',            
            'discount_price.regex' => 'Het veld kortingsprijs moet van juist formaat zijn. Voorbeeld: (1,95 of 1.95) en binnen de 999999 euro',
            'stock.required' => 'Het veld voorraad is verplicht',
            'stock.numeric' => 'Het veld voorraad mag alleen een nummer bevatten',
            'stock.max' => 'Het veld voorraad mag niet meer dan 999999 karakters bevatten',
            'stock.min' => 'Het veld voorraad moet een getal boven de 0 bevatten',
            'description.required' => 'De beschrijving is verplicht',
            'description.max' => 'De beschrijving mag niet meer dan 65535 karakters bevatten',
        ];
    }
}
