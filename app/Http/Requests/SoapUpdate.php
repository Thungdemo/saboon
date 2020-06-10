<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoapUpdate extends FormRequest
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
            'name' => 'required',
            'description' => 'nullable',

            'ingredient' => 'nullable|array',
            'ingredient.*.ingredient_id' => 'required_with:ingredient|nullable|exists:ingredients,id',
            'ingredient.*.quantity' => 'required_with:ingredient|nullable|numeric|min:1',
        ];
    }

    public function attributes()
    {
        return [
            'ingredient.*.ingredient_id' => 'ingredient',
            'ingredient.*.quantity' => 'quantity',
        ];
    }
}
