<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPresupuestoRequest;
use App\Http\Requests\StorePresupuestoRequest;
use App\Http\Requests\UpdatePresupuestoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresupuestoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('presupuesto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.presupuestos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('presupuesto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.presupuestos.create');
    }

    public function store(StorePresupuestoRequest $request)
    {
        $presupuesto = Presupuesto::create($request->all());

        return redirect()->route('admin.presupuestos.index');
    }

    public function edit(Presupuesto $presupuesto)
    {
        abort_if(Gate::denies('presupuesto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.presupuestos.edit', compact('presupuesto'));
    }

    public function update(UpdatePresupuestoRequest $request, Presupuesto $presupuesto)
    {
        $presupuesto->update($request->all());

        return redirect()->route('admin.presupuestos.index');
    }

    public function show(Presupuesto $presupuesto)
    {
        abort_if(Gate::denies('presupuesto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.presupuestos.show', compact('presupuesto'));
    }

    public function destroy(Presupuesto $presupuesto)
    {
        abort_if(Gate::denies('presupuesto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presupuesto->delete();

        return back();
    }

    public function massDestroy(MassDestroyPresupuestoRequest $request)
    {
        $presupuestos = Presupuesto::find(request('ids'));

        foreach ($presupuestos as $presupuesto) {
            $presupuesto->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
