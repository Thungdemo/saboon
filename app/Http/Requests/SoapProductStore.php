<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoapProductStore extends FormRequest
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
            'soap_id' => 'required|exists:soap,id',
            'mfg_date' => 'nullable|date',
            'ingredients' => 'required|array',
            'ingredients.*.ingredient_id' => 'required|exists:ingredients,id',
            'ingredients.*.quantity' => 'required|numeric|min:1',
        ];
    }

    public function attributes()
    {
        return [
            'ingredients.*.ingredient_id' => 'ingredient',
            'ingredients.*.quantity' => 'quantity',
        ];
    }
}
