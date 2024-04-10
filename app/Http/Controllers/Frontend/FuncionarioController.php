<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyFuncionarioRequest;
use App\Http\Requests\StoreFuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Models\Funcionario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FuncionarioController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('funcionario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $funcionarios = Funcionario::all();

        return view('frontend.funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('funcionario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.funcionarios.create');
    }

    public function store(StoreFuncionarioRequest $request)
    {
        $funcionario = Funcionario::create($request->all());

        return redirect()->route('frontend.funcionarios.index');
    }

    public function edit(Funcionario $funcionario)
    {
        abort_if(Gate::denies('funcionario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.funcionarios.edit', compact('funcionario'));
    }

    public function update(UpdateFuncionarioRequest $request, Funcionario $funcionario)
    {
        $funcionario->update($request->all());

        return redirect()->route('frontend.funcionarios.index');
    }

    public function show(Funcionario $funcionario)
    {
        abort_if(Gate::denies('funcionario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $funcionario->load('nIdentificacionAsistencia');

        return view('frontend.funcionarios.show', compact('funcionario'));
    }

    public function destroy(Funcionario $funcionario)
    {
        abort_if(Gate::denies('funcionario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $funcionario->delete();

        return back();
    }

    public function massDestroy(MassDestroyFuncionarioRequest $request)
    {
        $funcionarios = Funcionario::find(request('ids'));

        foreach ($funcionarios as $funcionario) {
            $funcionario->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
