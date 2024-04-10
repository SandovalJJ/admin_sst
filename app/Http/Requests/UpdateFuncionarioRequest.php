<?php

namespace App\Http\Requests;

use App\Models\Funcionario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFuncionarioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('funcionario_edit');
    }

    public function rules()
    {
        return [
            'n_identificacion' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nombre' => [
                'string',
                'required',
            ],
            'f_nacimiento' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'celular' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'direccion' => [
                'string',
                'nullable',
            ],
            'cargo' => [
                'string',
                'nullable',
            ],
            'sede' => [
                'string',
                'nullable',
            ],
        ];
    }
}
