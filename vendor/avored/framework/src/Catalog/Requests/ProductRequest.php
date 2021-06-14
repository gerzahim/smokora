<?php

namespace AvoRed\Framework\Catalog\Requests;

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
        $rules = [];
        $rules['name'] = 'required|max:255';
        $rules['slug'] = 'required|max:255';

        if (strtolower($this->method()) == 'post') {
            $rules['type'] = 'required';
        }

        return $rules;
    }
}
