<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPlanDeTrabajoRequest;
use App\Http\Requests\StorePlanDeTrabajoRequest;
use App\Http\Requests\UpdatePlanDeTrabajoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanDeTrabajoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('plan_de_trabajo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planDeTrabajos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('plan_de_trabajo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planDeTrabajos.create');
    }

    public function store(StorePlanDeTrabajoRequest $request)
    {
        $planDeTrabajo = PlanDeTrabajo::create($request->all());

        return redirect()->route('admin.plan-de-trabajos.index');
    }

    public function edit(PlanDeTrabajo $planDeTrabajo)
    {
        abort_if(Gate::denies('plan_de_trabajo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planDeTrabajos.edit', compact('planDeTrabajo'));
    }

    public function update(UpdatePlanDeTrabajoRequest $request, PlanDeTrabajo $planDeTrabajo)
    {
        $planDeTrabajo->update($request->all());

        return redirect()->route('admin.plan-de-trabajos.index');
    }

    public function show(PlanDeTrabajo $planDeTrabajo)
    {
        abort_if(Gate::denies('plan_de_trabajo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planDeTrabajos.show', compact('planDeTrabajo'));
    }

    public function destroy(PlanDeTrabajo $planDeTrabajo)
    {
        abort_if(Gate::denies('plan_de_trabajo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planDeTrabajo->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlanDeTrabajoRequest $request)
    {
        $planDeTrabajos = PlanDeTrabajo::find(request('ids'));

        foreach ($planDeTrabajos as $planDeTrabajo) {
            $planDeTrabajo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
