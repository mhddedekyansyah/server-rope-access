<?php

namespace App\Http\Requests;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'stok' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name wajib di isi',
            'price.required' => 'price wajib di isi',
            'stok.required' => 'stok wajib di isi',
            'image.required' => 'image wajib di isi',
            'image.mimes' => 'image (png,jpg,jpeg)',
        ];
    }
}
