<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyManualContratistumRequest;
use App\Http\Requests\StoreManualContratistumRequest;
use App\Http\Requests\UpdateManualContratistumRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManualContratistasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manual_contratistum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manualContratista.index');
    }

    public function create()
    {
        abort_if(Gate::denies('manual_contratistum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manualContratista.create');
    }

    public function store(StoreManualContratistumRequest $request)
    {
        $manualContratistum = ManualContratistum::create($request->all());

        return redirect()->route('admin.manual-contratista.index');
    }

    public function edit(ManualContratistum $manualContratistum)
    {
        abort_if(Gate::denies('manual_contratistum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manualContratista.edit', compact('manualContratistum'));
    }

    public function update(UpdateManualContratistumRequest $request, ManualContratistum $manualContratistum)
    {
        $manualContratistum->update($request->all());

        return redirect()->route('admin.manual-contratista.index');
    }

    public function show(ManualContratistum $manualContratistum)
    {
        abort_if(Gate::denies('manual_contratistum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manualContratista.show', compact('manualContratistum'));
    }

    public function destroy(ManualContratistum $manualContratistum)
    {
        abort_if(Gate::denies('manual_contratistum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manualContratistum->delete();

        return back();
    }

    public function massDestroy(MassDestroyManualContratistumRequest $request)
    {
        $manualContratista = ManualContratistum::find(request('ids'));

        foreach ($manualContratista as $manualContratistum) {
            $manualContratistum->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
