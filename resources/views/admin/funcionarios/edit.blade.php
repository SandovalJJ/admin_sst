@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.funcionario.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.funcionarios.update", [$funcionario->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('n_identificacion') ? 'has-error' : '' }}">
                            <label for="n_identificacion">{{ trans('cruds.funcionario.fields.n_identificacion') }}</label>
                            <input class="form-control" type="number" name="n_identificacion" id="n_identificacion" value="{{ old('n_identificacion', $funcionario->n_identificacion) }}" step="1">
                            @if($errors->has('n_identificacion'))
                                <span class="help-block" role="alert">{{ $errors->first('n_identificacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.n_identificacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.funcionario.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $funcionario->nombre) }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('genero') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.funcionario.fields.genero') }}</label>
                            <select class="form-control" name="genero" id="genero">
                                <option value disabled {{ old('genero', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Funcionario::GENERO_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('genero', $funcionario->genero) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('genero'))
                                <span class="help-block" role="alert">{{ $errors->first('genero') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.genero_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('f_nacimiento') ? 'has-error' : '' }}">
                            <label for="f_nacimiento">{{ trans('cruds.funcionario.fields.f_nacimiento') }}</label>
                            <input class="form-control date" type="text" name="f_nacimiento" id="f_nacimiento" value="{{ old('f_nacimiento', $funcionario->f_nacimiento) }}">
                            @if($errors->has('f_nacimiento'))
                                <span class="help-block" role="alert">{{ $errors->first('f_nacimiento') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.f_nacimiento_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('celular') ? 'has-error' : '' }}">
                            <label for="celular">{{ trans('cruds.funcionario.fields.celular') }}</label>
                            <input class="form-control" type="number" name="celular" id="celular" value="{{ old('celular', $funcionario->celular) }}" step="1">
                            @if($errors->has('celular'))
                                <span class="help-block" role="alert">{{ $errors->first('celular') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.celular_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : '' }}">
                            <label for="direccion">{{ trans('cruds.funcionario.fields.direccion') }}</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" value="{{ old('direccion', $funcionario->direccion) }}">
                            @if($errors->has('direccion'))
                                <span class="help-block" role="alert">{{ $errors->first('direccion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.direccion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cargo') ? 'has-error' : '' }}">
                            <label for="cargo">{{ trans('cruds.funcionario.fields.cargo') }}</label>
                            <input class="form-control" type="text" name="cargo" id="cargo" value="{{ old('cargo', $funcionario->cargo) }}">
                            @if($errors->has('cargo'))
                                <span class="help-block" role="alert">{{ $errors->first('cargo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.cargo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sede') ? 'has-error' : '' }}">
                            <label for="sede">{{ trans('cruds.funcionario.fields.sede') }}</label>
                            <input class="form-control" type="text" name="sede" id="sede" value="{{ old('sede', $funcionario->sede) }}">
                            @if($errors->has('sede'))
                                <span class="help-block" role="alert">{{ $errors->first('sede') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.sede_helper') }}</span>
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