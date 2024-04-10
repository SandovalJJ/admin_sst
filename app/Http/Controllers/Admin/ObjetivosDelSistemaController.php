<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyObjetivosDelSistemaRequest;
use App\Http\Requests\StoreObjetivosDelSistemaRequest;
use App\Http\Requests\UpdateObjetivosDelSistemaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ObjetivosDelSistemaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('objetivos_del_sistema_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.objetivosDelSistemas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('objetivos_del_sistema_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.objetivosDelSistemas.create');
    }

    public function store(StoreObjetivosDelSistemaRequest $request)
    {
        $objetivosDelSistema = ObjetivosDelSistema::create($request->all());

        return redirect()->route('admin.objetivos-del-sistemas.index');
    }

    public function edit(ObjetivosDelSistema $objetivosDelSistema)
    {
        abort_if(Gate::denies('objetivos_del_sistema_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.objetivosDelSistemas.edit', compact('objetivosDelSistema'));
    }

    public function update(UpdateObjetivosDelSistemaRequest $request, ObjetivosDelSistema $objetivosDelSistema)
    {
        $objetivosDelSistema->update($request->all());

        return redirect()->route('admin.objetivos-del-sistemas.index');
    }

    public function show(ObjetivosDelSistema $objetivosDelSistema)
    {
        abort_if(Gate::denies('objetivos_del_sistema_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.objetivosDelSistemas.show', compact('objetivosDelSistema'));
    }

    public function destroy(ObjetivosDelSistema $objetivosDelSistema)
    {
        abort_if(Gate::denies('objetivos_del_sistema_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $objetivosDelSistema->delete();

        return back();
    }

    public function massDestroy(MassDestroyObjetivosDelSistemaRequest $request)
    {
        $objetivosDelSistemas = ObjetivosDelSistema::find(request('ids'));

        foreach ($objetivosDelSistemas as $objetivosDelSistema) {
            $objetivosDelSistema->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
