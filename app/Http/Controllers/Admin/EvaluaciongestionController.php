<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEvaluaciongestionRequest;
use App\Http\Requests\StoreEvaluaciongestionRequest;
use App\Http\Requests\UpdateEvaluaciongestionRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EvaluaciongestionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('evaluaciongestion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.evaluaciongestions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('evaluaciongestion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.evaluaciongestions.create');
    }

    public function store(StoreEvaluaciongestionRequest $request)
    {
        $evaluaciongestion = Evaluaciongestion::create($request->all());

        return redirect()->route('admin.evaluaciongestions.index');
    }

    public function edit(Evaluaciongestion $evaluaciongestion)
    {
        abort_if(Gate::denies('evaluaciongestion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.evaluaciongestions.edit', compact('evaluaciongestion'));
    }

    public function update(UpdateEvaluaciongestionRequest $request, Evaluaciongestion $evaluaciongestion)
    {
        $evaluaciongestion->update($request->all());

        return redirect()->route('admin.evaluaciongestions.index');
    }

    public function show(Evaluaciongestion $evaluaciongestion)
    {
        abort_if(Gate::denies('evaluaciongestion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.evaluaciongestions.show', compact('evaluaciongestion'));
    }

    public function destroy(Evaluaciongestion $evaluaciongestion)
    {
        abort_if(Gate::denies('evaluaciongestion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evaluaciongestion->delete();

        return back();
    }

    public function massDestroy(MassDestroyEvaluaciongestionRequest $request)
    {
        $evaluaciongestions = Evaluaciongestion::find(request('ids'));

        foreach ($evaluaciongestions as $evaluaciongestion) {
            $evaluaciongestion->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
