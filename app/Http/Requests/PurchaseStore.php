<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseStore extends FormRequest
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
            'ingredient_id' => 'required|exists:ingredients,id',
            'rate' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            'purchase_date' => 'nullable|date',
            'batch' => 'nullable',
        ];
    }
}
