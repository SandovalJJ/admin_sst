@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.asistencium.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.asistencia.update", [$asistencium->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="n_identificacions">{{ trans('cruds.asistencium.fields.n_identificacion') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="n_identificacions[]" id="n_identificacions" multiple>
                                @foreach($n_identificacions as $id => $n_identificacion)
                                    <option value="{{ $id }}" {{ (in_array($id, old('n_identificacions', [])) || $asistencium->n_identificacions->contains($id)) ? 'selected' : '' }}>{{ $n_identificacion }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('n_identificacions'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('n_identificacions') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asistencium.fields.n_identificacion_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="asistio" value="0">
                                <input type="checkbox" name="asistio" id="asistio" value="1" {{ $asistencium->asistio || old('asistio', 0) === 1 ? 'checked' : '' }}>
                                <label for="asistio">{{ trans('cruds.asistencium.fields.asistio') }}</label>
                            </div>
                            @if($errors->has('asistio'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('asistio') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asistencium.fields.asistio_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fecha">{{ trans('cruds.asistencium.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha', $asistencium->fecha) }}">
                            @if($errors->has('fecha'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fecha') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asistencium.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection