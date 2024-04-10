<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDiagnosticoSaludRequest;
use App\Http\Requests\StoreDiagnosticoSaludRequest;
use App\Http\Requests\UpdateDiagnosticoSaludRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DiagnosticoSaludController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('diagnostico_salud_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.diagnosticoSaluds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('diagnostico_salud_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.diagnosticoSaluds.create');
    }

    public function store(StoreDiagnosticoSaludRequest $request)
    {
        $diagnosticoSalud = DiagnosticoSalud::create($request->all());

        return redirect()->route('admin.diagnostico-saluds.index');
    }

    public function edit(DiagnosticoSalud $diagnosticoSalud)
    {
        abort_if(Gate::denies('diagnostico_salud_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.diagnosticoSaluds.edit', compact('diagnosticoSalud'));
    }

    public function update(UpdateDiagnosticoSaludRequest $request, DiagnosticoSalud $diagnosticoSalud)
    {
        $diagnosticoSalud->update($request->all());

        return redirect()->route('admin.diagnostico-saluds.index');
    }

    public function show(DiagnosticoSalud $diagnosticoSalud)
    {
        abort_if(Gate::denies('diagnostico_salud_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.diagnosticoSaluds.show', compact('diagnosticoSalud'));
    }

    public function destroy(DiagnosticoSalud $diagnosticoSalud)
    {
        abort_if(Gate::denies('diagnostico_salud_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diagnosticoSalud->delete();

        return back();
    }

    public function massDestroy(MassDestroyDiagnosticoSaludRequest $request)
    {
        $diagnosticoSaluds = DiagnosticoSalud::find(request('ids'));

        foreach ($diagnosticoSaluds as $diagnosticoSalud) {
            $diagnosticoSalud->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
