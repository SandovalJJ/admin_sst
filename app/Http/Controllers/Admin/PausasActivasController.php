<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPausasActivaRequest;
use App\Http\Requests\StorePausasActivaRequest;
use App\Http\Requests\UpdatePausasActivaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PausasActivasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pausas_activa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pausasActivas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pausas_activa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pausasActivas.create');
    }

    public function store(StorePausasActivaRequest $request)
    {
        $pausasActiva = PausasActiva::create($request->all());

        return redirect()->route('admin.pausas-activas.index');
    }

    public function edit(PausasActiva $pausasActiva)
    {
        abort_if(Gate::denies('pausas_activa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pausasActivas.edit', compact('pausasActiva'));
    }

    public function update(UpdatePausasActivaRequest $request, PausasActiva $pausasActiva)
    {
        $pausasActiva->update($request->all());

        return redirect()->route('admin.pausas-activas.index');
    }

    public function show(PausasActiva $pausasActiva)
    {
        abort_if(Gate::denies('pausas_activa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pausasActivas.show', compact('pausasActiva'));
    }

    public function destroy(PausasActiva $pausasActiva)
    {
        abort_if(Gate::denies('pausas_activa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pausasActiva->delete();

        return back();
    }

    public function massDestroy(MassDestroyPausasActivaRequest $request)
    {
        $pausasActivas = PausasActiva::find(request('ids'));

        foreach ($pausasActivas as $pausasActiva) {
            $pausasActiva->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
