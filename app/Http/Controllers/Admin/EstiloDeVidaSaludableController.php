<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEstiloDeVidaSaludableRequest;
use App\Http\Requests\StoreEstiloDeVidaSaludableRequest;
use App\Http\Requests\UpdateEstiloDeVidaSaludableRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstiloDeVidaSaludableController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('estilo_de_vida_saludable_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estiloDeVidaSaludables.index');
    }

    public function create()
    {
        abort_if(Gate::denies('estilo_de_vida_saludable_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estiloDeVidaSaludables.create');
    }

    public function store(StoreEstiloDeVidaSaludableRequest $request)
    {
        $estiloDeVidaSaludable = EstiloDeVidaSaludable::create($request->all());

        return redirect()->route('admin.estilo-de-vida-saludables.index');
    }

    public function edit(EstiloDeVidaSaludable $estiloDeVidaSaludable)
    {
        abort_if(Gate::denies('estilo_de_vida_saludable_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estiloDeVidaSaludables.edit', compact('estiloDeVidaSaludable'));
    }

    public function update(UpdateEstiloDeVidaSaludableRequest $request, EstiloDeVidaSaludable $estiloDeVidaSaludable)
    {
        $estiloDeVidaSaludable->update($request->all());

        return redirect()->route('admin.estilo-de-vida-saludables.index');
    }

    public function show(EstiloDeVidaSaludable $estiloDeVidaSaludable)
    {
        abort_if(Gate::denies('estilo_de_vida_saludable_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estiloDeVidaSaludables.show', compact('estiloDeVidaSaludable'));
    }

    public function destroy(EstiloDeVidaSaludable $estiloDeVidaSaludable)
    {
        abort_if(Gate::denies('estilo_de_vida_saludable_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estiloDeVidaSaludable->delete();

        return back();
    }

    public function massDestroy(MassDestroyEstiloDeVidaSaludableRequest $request)
    {
        $estiloDeVidaSaludables = EstiloDeVidaSaludable::find(request('ids'));

        foreach ($estiloDeVidaSaludables as $estiloDeVidaSaludable) {
            $estiloDeVidaSaludable->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
