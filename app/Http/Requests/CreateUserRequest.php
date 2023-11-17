<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|min : 3',
            'email' => 'required|email|unique:users',
            'motdepasse' => 'required|min : 3'
        ];
    }

    public function messages(){
        return [
            'nom.required' => 'nom requis',
            'nom.min' => 'nom minimum 3',
            'email.required' => 'email  requis',
            'email.unique' => 'email  deja lie a un compte',
            'email.email' => 'email  non valide',
            'motdepasse.required' => 'motdepasse requis',
            'motdepasse.min' => 'motdepasse  minimum 3',

        ];
    }
}
