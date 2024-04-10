<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCronoCapRequest;
use App\Http\Requests\StoreCronoCapRequest;
use App\Http\Requests\UpdateCronoCapRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CronoCapController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('crono_cap_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cronoCaps.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crono_cap_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cronoCaps.create');
    }

    public function store(StoreCronoCapRequest $request)
    {
        $cronoCap = CronoCap::create($request->all());

        return redirect()->route('admin.crono-caps.index');
    }

    public function edit(CronoCap $cronoCap)
    {
        abort_if(Gate::denies('crono_cap_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cronoCaps.edit', compact('cronoCap'));
    }

    public function update(UpdateCronoCapRequest $request, CronoCap $cronoCap)
    {
        $cronoCap->update($request->all());

        return redirect()->route('admin.crono-caps.index');
    }

    public function show(CronoCap $cronoCap)
    {
        abort_if(Gate::denies('crono_cap_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cronoCaps.show', compact('cronoCap'));
    }

    public function destroy(CronoCap $cronoCap)
    {
        abort_if(Gate::denies('crono_cap_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cronoCap->delete();

        return back();
    }

    public function massDestroy(MassDestroyCronoCapRequest $request)
    {
        $cronoCaps = CronoCap::find(request('ids'));

        foreach ($cronoCaps as $cronoCap) {
            $cronoCap->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
