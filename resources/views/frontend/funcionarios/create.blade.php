@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.funcionario.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.funcionarios.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="n_identificacion">{{ trans('cruds.funcionario.fields.n_identificacion') }}</label>
                            <input class="form-control" type="number" name="n_identificacion" id="n_identificacion" value="{{ old('n_identificacion', '') }}" step="1">
                            @if($errors->has('n_identificacion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('n_identificacion') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.n_identificacion_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="nombre">{{ trans('cruds.funcionario.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                            @if($errors->has('nombre'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nombre') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.funcionario.fields.genero') }}</label>
                            <select class="form-control" name="genero" id="genero">
                                <option value disabled {{ old('genero', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Funcionario::GENERO_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('genero', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('genero'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('genero') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.genero_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="f_nacimiento">{{ trans('cruds.funcionario.fields.f_nacimiento') }}</label>
                            <input class="form-control date" type="text" name="f_nacimiento" id="f_nacimiento" value="{{ old('f_nacimiento') }}">
                            @if($errors->has('f_nacimiento'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('f_nacimiento') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.f_nacimiento_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="celular">{{ trans('cruds.funcionario.fields.celular') }}</label>
                            <input class="form-control" type="number" name="celular" id="celular" value="{{ old('celular', '') }}" step="1">
                            @if($errors->has('celular'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('celular') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.celular_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="direccion">{{ trans('cruds.funcionario.fields.direccion') }}</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" value="{{ old('direccion', '') }}">
                            @if($errors->has('direccion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('direccion') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.direccion_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cargo">{{ trans('cruds.funcionario.fields.cargo') }}</label>
                            <input class="form-control" type="text" name="cargo" id="cargo" value="{{ old('cargo', '') }}">
                            @if($errors->has('cargo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cargo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.funcionario.fields.cargo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sede">{{ trans('cruds.funcionario.fields.sede') }}</label>
                            <input class="form-control" type="text" name="sede" id="sede" value="{{ old('sede', '') }}">
                            @if($errors->has('sede'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sede') }}
                                </div>
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