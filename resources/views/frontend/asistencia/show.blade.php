@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.asistencium.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.asistencia.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.asistencia.index') }}">
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