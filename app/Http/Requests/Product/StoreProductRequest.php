<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
          'kode' => ['required', 'unique:products', 'max:100'],
          'name' => ['required', 'max:100'],
          'price' => ['required', 'numeric', 'min:1'],
          'stock' => ['required', 'numeric', 'min:0'],
          'category' => [],
          'brand'=> ['required'],
        ];
    }
}