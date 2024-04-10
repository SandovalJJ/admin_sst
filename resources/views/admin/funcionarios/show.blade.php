@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.funcionario.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.funcionarios.index') }}">
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
                            <a class="btn btn-default" href="{{ route('admin.funcionarios.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#n_identificacion_asistencia" aria-controls="n_identificacion_asistencia" role="tab" data-toggle="tab">
                            {{ trans('cruds.asistencium.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="n_identificacion_asistencia">
                        @includeIf('admin.funcionarios.relationships.nIdentificacionAsistencia', ['asistencia' => $funcionario->nIdentificacionAsistencia])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection