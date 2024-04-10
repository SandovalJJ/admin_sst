<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAsistenciumRequest;
use App\Http\Requests\StoreAsistenciumRequest;
use App\Http\Requests\UpdateAsistenciumRequest;
use App\Models\Asistencium;
use App\Models\Funcionario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsistenciaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('asistencium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistencia = Asistencium::with(['n_identificacions'])->get();

        $funcionarios = Funcionario::get();

        return view('frontend.asistencia.index', compact('asistencia', 'funcionarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('asistencium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $n_identificacions = Funcionario::pluck('n_identificacion', 'id');

        return view('frontend.asistencia.create', compact('n_identificacions'));
    }

    public function store(StoreAsistenciumRequest $request)
    {
        $asistencium = Asistencium::create($request->all());
        $asistencium->n_identificacions()->sync($request->input('n_identificacions', []));

        return redirect()->route('frontend.asistencia.index');
    }

    public function edit(Asistencium $asistencium)
    {
        abort_if(Gate::denies('asistencium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $n_identificacions = Funcionario::pluck('n_identificacion', 'id');

        $asistencium->load('n_identificacions');

        return view('frontend.asistencia.edit', compact('asistencium', 'n_identificacions'));
    }

    public function update(UpdateAsistenciumRequest $request, Asistencium $asistencium)
    {
        $asistencium->update($request->all());
        $asistencium->n_identificacions()->sync($request->input('n_identificacions', []));

        return redirect()->route('frontend.asistencia.index');
    }

    public function show(Asistencium $asistencium)
    {
        abort_if(Gate::denies('asistencium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistencium->load('n_identificacions');

        return view('frontend.asistencia.show', compact('asistencium'));
    }

    public function destroy(Asistencium $asistencium)
    {
        abort_if(Gate::denies('asistencium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistencium->delete();

        return back();
    }

    public function massDestroy(MassDestroyAsistenciumRequest $request)
    {
        $asistencia = Asistencium::find(request('ids'));

        foreach ($asistencia as $asistencium) {
            $asistencium->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
