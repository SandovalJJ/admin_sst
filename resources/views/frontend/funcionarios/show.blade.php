@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.funcionario.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.funcionarios.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $funcionario->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.n_identificacion') }}
                                    </th>
                                    <td>
                                        {{ $funcionario->n_identificacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $funcionario->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.genero') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Funcionario::GENERO_SELECT[$funcionario->genero] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.f_nacimiento') }}
                                    </th>
                                    <td>
                                        {{ $funcionario->f_nacimiento }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.celular') }}
                                    </th>
                                    <td>
                                        {{ $funcionario->celular }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.direccion') }}
                                    </th>
                                    <td>
                                        {{ $funcionario->direccion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.cargo') }}
                                    </th>
                                    <td>
                                        {{ $funcionario->cargo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.sede') }}
                                    </th>
                                    <td>
                                        {{ $funcionario->sede }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.funcionarios.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection