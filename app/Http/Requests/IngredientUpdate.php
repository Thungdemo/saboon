<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientUpdate extends FormRequest
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
            'rate' => 'nullable|numeric|min:1',
            'quantity_unit_id' => 'required|exists:quantity_units,id'
        ];
    }
}
