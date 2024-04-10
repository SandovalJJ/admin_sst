<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyControlDocumentalRequest;
use App\Http\Requests\StoreControlDocumentalRequest;
use App\Http\Requests\UpdateControlDocumentalRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ControlDocumentalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('control_documental_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.controlDocumentals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('control_documental_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.controlDocumentals.create');
    }

    public function store(StoreControlDocumentalRequest $request)
    {
        $controlDocumental = ControlDocumental::create($request->all());

        return redirect()->route('admin.control-documentals.index');
    }

    public function edit(ControlDocumental $controlDocumental)
    {
        abort_if(Gate::denies('control_documental_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.controlDocumentals.edit', compact('controlDocumental'));
    }

    public function update(UpdateControlDocumentalRequest $request, ControlDocumental $controlDocumental)
    {
        $controlDocumental->update($request->all());

        return redirect()->route('admin.control-documentals.index');
    }

    public function show(ControlDocumental $controlDocumental)
    {
        abort_if(Gate::denies('control_documental_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.controlDocumentals.show', compact('controlDocumental'));
    }

    public function destroy(ControlDocumental $controlDocumental)
    {
        abort_if(Gate::denies('control_documental_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $controlDocumental->delete();

        return back();
    }

    public function massDestroy(MassDestroyControlDocumentalRequest $request)
    {
        $controlDocumentals = ControlDocumental::find(request('ids'));

        foreach ($controlDocumentals as $controlDocumental) {
            $controlDocumental->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
