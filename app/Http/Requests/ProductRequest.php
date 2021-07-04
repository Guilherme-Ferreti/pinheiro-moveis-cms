<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'min:5'],
            'description' => ['required', 'max:65000'],
        ]
        +
        ($this->isMethod('post') ? $this->store() : $this->update());
    }

    private function store()
    {
        return [
            'slug' => ['required', 'max:255', 'alpha_dash', 'unique:products,slug'],
        ];
    }

    private function update()
    {
        return [
            'slug' => ['required', 'max:255', 'alpha_dash', Rule::unique('products', 'slug')->ignore($this->product->id)],
        ];
    }
}
