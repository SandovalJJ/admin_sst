<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySeguridadSyRequest;
use App\Http\Requests\StoreSeguridadSyRequest;
use App\Http\Requests\UpdateSeguridadSyRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeguridadSySController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('seguridad_sy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seguridadSies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('seguridad_sy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seguridadSies.create');
    }

    public function store(StoreSeguridadSyRequest $request)
    {
        $seguridadSy = SeguridadSy::create($request->all());

        return redirect()->route('admin.seguridad-sies.index');
    }

    public function edit(SeguridadSy $seguridadSy)
    {
        abort_if(Gate::denies('seguridad_sy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seguridadSies.edit', compact('seguridadSy'));
    }

    public function update(UpdateSeguridadSyRequest $request, SeguridadSy $seguridadSy)
    {
        $seguridadSy->update($request->all());

        return redirect()->route('admin.seguridad-sies.index');
    }

    public function show(SeguridadSy $seguridadSy)
    {
        abort_if(Gate::denies('seguridad_sy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seguridadSies.show', compact('seguridadSy'));
    }

    public function destroy(SeguridadSy $seguridadSy)
    {
        abort_if(Gate::denies('seguridad_sy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seguridadSy->delete();

        return back();
    }

    public function massDestroy(MassDestroySeguridadSyRequest $request)
    {
        $seguridadSies = SeguridadSy::find(request('ids'));

        foreach ($seguridadSies as $seguridadSy) {
            $seguridadSy->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
