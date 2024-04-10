<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRendicionCuentumRequest;
use App\Http\Requests\StoreRendicionCuentumRequest;
use App\Http\Requests\UpdateRendicionCuentumRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RendicionCuentasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rendicion_cuentum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rendicionCuenta.index');
    }

    public function create()
    {
        abort_if(Gate::denies('rendicion_cuentum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rendicionCuenta.create');
    }

    public function store(StoreRendicionCuentumRequest $request)
    {
        $rendicionCuentum = RendicionCuentum::create($request->all());

        return redirect()->route('admin.rendicion-cuenta.index');
    }

    public function edit(RendicionCuentum $rendicionCuentum)
    {
        abort_if(Gate::denies('rendicion_cuentum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rendicionCuenta.edit', compact('rendicionCuentum'));
    }

    public function update(UpdateRendicionCuentumRequest $request, RendicionCuentum $rendicionCuentum)
    {
        $rendicionCuentum->update($request->all());

        return redirect()->route('admin.rendicion-cuenta.index');
    }

    public function show(RendicionCuentum $rendicionCuentum)
    {
        abort_if(Gate::denies('rendicion_cuentum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rendicionCuenta.show', compact('rendicionCuentum'));
    }

    public function destroy(RendicionCuentum $rendicionCuentum)
    {
        abort_if(Gate::denies('rendicion_cuentum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rendicionCuentum->delete();

        return back();
    }

    public function massDestroy(MassDestroyRendicionCuentumRequest $request)
    {
        $rendicionCuenta = RendicionCuentum::find(request('ids'));

        foreach ($rendicionCuenta as $rendicionCuentum) {
            $rendicionCuentum->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
