<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPoliticaSstRequest;
use App\Http\Requests\StorePoliticaSstRequest;
use App\Http\Requests\UpdatePoliticaSstRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PoliticaSstController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('politica_sst_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.politicaSsts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('politica_sst_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.politicaSsts.create');
    }

    public function store(StorePoliticaSstRequest $request)
    {
        $politicaSst = PoliticaSst::create($request->all());

        return redirect()->route('admin.politica-ssts.index');
    }

    public function edit(PoliticaSst $politicaSst)
    {
        abort_if(Gate::denies('politica_sst_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.politicaSsts.edit', compact('politicaSst'));
    }

    public function update(UpdatePoliticaSstRequest $request, PoliticaSst $politicaSst)
    {
        $politicaSst->update($request->all());

        return redirect()->route('admin.politica-ssts.index');
    }

    public function show(PoliticaSst $politicaSst)
    {
        abort_if(Gate::denies('politica_sst_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.politicaSsts.show', compact('politicaSst'));
    }

    public function destroy(PoliticaSst $politicaSst)
    {
        abort_if(Gate::denies('politica_sst_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $politicaSst->delete();

        return back();
    }

    public function massDestroy(MassDestroyPoliticaSstRequest $request)
    {
        $politicaSsts = PoliticaSst::find(request('ids'));

        foreach ($politicaSsts as $politicaSst) {
            $politicaSst->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
