<?php

namespace App\Http\Requests;

use App\Models\Asistencium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAsistenciumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asistencium_edit');
    }

    public function rules()
    {
        return [
            'n_identificacions.*' => [
                'integer',
            ],
            'n_identificacions' => [
                'array',
            ],
            'fecha' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
