<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'address' => 'required',
            'handphone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nama wajib di isi',
            'email.required' => 'email wajib di isi',
            'email.unique' => 'email sudah digunakan',
            'email.email' => 'email tidak valid',
            'password.required' => 'password wajib di isi',
            'password.min' => 'password minimal 6 karakter',
        ];
    }
}
