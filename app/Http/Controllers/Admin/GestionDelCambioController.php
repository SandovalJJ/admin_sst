<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGestionDelCambioRequest;
use App\Http\Requests\StoreGestionDelCambioRequest;
use App\Http\Requests\UpdateGestionDelCambioRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GestionDelCambioController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gestion_del_cambio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gestionDelCambios.index');
    }

    public function create()
    {
        abort_if(Gate::denies('gestion_del_cambio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gestionDelCambios.create');
    }

    public function store(StoreGestionDelCambioRequest $request)
    {
        $gestionDelCambio = GestionDelCambio::create($request->all());

        return redirect()->route('admin.gestion-del-cambios.index');
    }

    public function edit(GestionDelCambio $gestionDelCambio)
    {
        abort_if(Gate::denies('gestion_del_cambio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gestionDelCambios.edit', compact('gestionDelCambio'));
    }

    public function update(UpdateGestionDelCambioRequest $request, GestionDelCambio $gestionDelCambio)
    {
        $gestionDelCambio->update($request->all());

        return redirect()->route('admin.gestion-del-cambios.index');
    }

    public function show(GestionDelCambio $gestionDelCambio)
    {
        abort_if(Gate::denies('gestion_del_cambio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gestionDelCambios.show', compact('gestionDelCambio'));
    }

    public function destroy(GestionDelCambio $gestionDelCambio)
    {
        abort_if(Gate::denies('gestion_del_cambio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gestionDelCambio->delete();

        return back();
    }

    public function massDestroy(MassDestroyGestionDelCambioRequest $request)
    {
        $gestionDelCambios = GestionDelCambio::find(request('ids'));

        foreach ($gestionDelCambios as $gestionDelCambio) {
            $gestionDelCambio->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
