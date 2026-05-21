<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class CadastrarRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:60|confirmed'
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Nome obrigatorio',
            'name.max' => 'O nome tem que ter no maximo 255',
            'name.string' => 'O nome deve ser um texto válido',

            'email.required' => 'Esse email é obrigatorio',
            'email.email' => 'o campo email dever ser um email',
            'email.unique' => 'email já cadastrado',

            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres',
            'password.max' => 'A senha deve ter no maximo 60 caracteres',
            'password.confirmed' => 'As senhas estão diferentes!'
        ];
    }

}
