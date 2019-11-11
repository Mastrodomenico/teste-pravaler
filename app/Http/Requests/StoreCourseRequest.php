<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'name' => 'required|unique:courses',
            'duration_week' => 'required',
            'institution_id' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.unique' => 'Curso já cadastrado',
            'duration_week.required' => 'Escolha a quantidade de semena do curso',
            'institution_id.required' => 'Escolha uma instituição',
            'status.required' => 'Selecione o status',
        ];
    }
}
