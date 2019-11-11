<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstitutionRequest extends FormRequest
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
            'cnpj' => 'required|unique:institutions,cnpj,'.$this->get('id'),
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'cnpj.unique' => 'CNPJ já cadastrado',
            'cnpj.required' => 'O CNPJ é obrigatório'
        ];
    }
}
