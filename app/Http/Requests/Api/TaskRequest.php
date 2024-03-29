<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:pendente,concluída,cancelada',
        ];
    }

    /**
     * Customize error messages for specific rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'O título da tarefa é obrigatório.',
            'description.required' => 'A descrição da tarefa é obrigatória.',
            'status.required' => 'O status da tarefa é obrigatório.',
            'status.in' => 'O status da tarefa deve ser "pendente", "concluída" ou "cancelada".',
        ];
    }
}
