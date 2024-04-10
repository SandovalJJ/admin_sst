<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReintegroLaboralRequest;
use App\Http\Requests\StoreReintegroLaboralRequest;
use App\Http\Requests\UpdateReintegroLaboralRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReintegroLaboralController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reintegro_laboral_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reintegroLaborals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reintegro_laboral_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reintegroLaborals.create');
    }

    public function store(StoreReintegroLaboralRequest $request)
    {
        $reintegroLaboral = ReintegroLaboral::create($request->all());

        return redirect()->route('admin.reintegro-laborals.index');
    }

    public function edit(ReintegroLaboral $reintegroLaboral)
    {
        abort_if(Gate::denies('reintegro_laboral_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reintegroLaborals.edit', compact('reintegroLaboral'));
    }

    public function update(UpdateReintegroLaboralRequest $request, ReintegroLaboral $reintegroLaboral)
    {
        $reintegroLaboral->update($request->all());

        return redirect()->route('admin.reintegro-laborals.index');
    }

    public function show(ReintegroLaboral $reintegroLaboral)
    {
        abort_if(Gate::denies('reintegro_laboral_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reintegroLaborals.show', compact('reintegroLaboral'));
    }

    public function destroy(ReintegroLaboral $reintegroLaboral)
    {
        abort_if(Gate::denies('reintegro_laboral_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reintegroLaboral->delete();

        return back();
    }

    public function massDestroy(MassDestroyReintegroLaboralRequest $request)
    {
        $reintegroLaborals = ReintegroLaboral::find(request('ids'));

        foreach ($reintegroLaborals as $reintegroLaboral) {
            $reintegroLaboral->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
