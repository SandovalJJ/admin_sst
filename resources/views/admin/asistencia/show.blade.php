@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.asistencium.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.asistencia.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.asistencium.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $asistencium->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.asistencium.fields.n_identificacion') }}
                                    </th>
                                    <td>
                                        @foreach($asistencium->n_identificacions as $key => $n_identificacion)
                                            <span class="label label-info">{{ $n_identificacion->n_identificacion }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.asistencium.fields.asistio') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $asistencium->asistio ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.asistencium.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $asistencium->fecha }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.asistencia.index') }}">
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