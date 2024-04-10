<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRestriccionesYRecomendacioneRequest;
use App\Http\Requests\StoreRestriccionesYRecomendacioneRequest;
use App\Http\Requests\UpdateRestriccionesYRecomendacioneRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestriccionesYRecomendacionesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('restricciones_y_recomendacione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.restriccionesYRecomendaciones.index');
    }

    public function create()
    {
        abort_if(Gate::denies('restricciones_y_recomendacione_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.restriccionesYRecomendaciones.create');
    }

    public function store(StoreRestriccionesYRecomendacioneRequest $request)
    {
        $restriccionesYRecomendacione = RestriccionesYRecomendacione::create($request->all());

        return redirect()->route('admin.restricciones-y-recomendaciones.index');
    }

    public function edit(RestriccionesYRecomendacione $restriccionesYRecomendacione)
    {
        abort_if(Gate::denies('restricciones_y_recomendacione_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.restriccionesYRecomendaciones.edit', compact('restriccionesYRecomendacione'));
    }

    public function update(UpdateRestriccionesYRecomendacioneRequest $request, RestriccionesYRecomendacione $restriccionesYRecomendacione)
    {
        $restriccionesYRecomendacione->update($request->all());

        return redirect()->route('admin.restricciones-y-recomendaciones.index');
    }

    public function show(RestriccionesYRecomendacione $restriccionesYRecomendacione)
    {
        abort_if(Gate::denies('restricciones_y_recomendacione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.restriccionesYRecomendaciones.show', compact('restriccionesYRecomendacione'));
    }

    public function destroy(RestriccionesYRecomendacione $restriccionesYRecomendacione)
    {
        abort_if(Gate::denies('restricciones_y_recomendacione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $restriccionesYRecomendacione->delete();

        return back();
    }

    public function massDestroy(MassDestroyRestriccionesYRecomendacioneRequest $request)
    {
        $restriccionesYRecomendaciones = RestriccionesYRecomendacione::find(request('ids'));

        foreach ($restriccionesYRecomendaciones as $restriccionesYRecomendacione) {
            $restriccionesYRecomendacione->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
