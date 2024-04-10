<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMatrizLegalRequest;
use App\Http\Requests\StoreMatrizLegalRequest;
use App\Http\Requests\UpdateMatrizLegalRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MatrizLegalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('matriz_legal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.matrizLegals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('matriz_legal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.matrizLegals.create');
    }

    public function store(StoreMatrizLegalRequest $request)
    {
        $matrizLegal = MatrizLegal::create($request->all());

        return redirect()->route('admin.matriz-legals.index');
    }

    public function edit(MatrizLegal $matrizLegal)
    {
        abort_if(Gate::denies('matriz_legal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.matrizLegals.edit', compact('matrizLegal'));
    }

    public function update(UpdateMatrizLegalRequest $request, MatrizLegal $matrizLegal)
    {
        $matrizLegal->update($request->all());

        return redirect()->route('admin.matriz-legals.index');
    }

    public function show(MatrizLegal $matrizLegal)
    {
        abort_if(Gate::denies('matriz_legal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.matrizLegals.show', compact('matrizLegal'));
    }

    public function destroy(MatrizLegal $matrizLegal)
    {
        abort_if(Gate::denies('matriz_legal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matrizLegal->delete();

        return back();
    }

    public function massDestroy(MassDestroyMatrizLegalRequest $request)
    {
        $matrizLegals = MatrizLegal::find(request('ids'));

        foreach ($matrizLegals as $matrizLegal) {
            $matrizLegal->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
