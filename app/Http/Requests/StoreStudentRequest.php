<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'cpf' => 'required|unique:students',
            'date_birth' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'street' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city' => 'required',
            'uf' => 'required',
            'status' => 'required',
            'course_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'cpf.required' => 'CPF é obrigatório',
            'cpf.unique' => 'CPF já cadastrado',
            'date_birth.required' => 'A Data de nascimento é obrigatório',
            'email.required' => 'O Email é obrigatório',
            'phone.required' => 'O Telefone é obrigatório',
            'street.required' => 'A Rua é obrigatório',
            'number.required' => 'O Número é obrigatório',
            'district.required' => 'O Bairro é obrigatório',
            'city.required' => 'A Cidade é obrigatório',
            'uf.required' => 'O UF é obrigatório',
            'course_id.required' => 'Escolha um curso',
        ];
    }
}
