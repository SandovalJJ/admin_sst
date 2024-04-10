<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustodiaDeHistoriasClinicaRequest;
use App\Http\Requests\StoreCustodiaDeHistoriasClinicaRequest;
use App\Http\Requests\UpdateCustodiaDeHistoriasClinicaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustodiaDeHistoriasClinicasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('custodia_de_historias_clinica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.custodiaDeHistoriasClinicas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('custodia_de_historias_clinica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.custodiaDeHistoriasClinicas.create');
    }

    public function store(StoreCustodiaDeHistoriasClinicaRequest $request)
    {
        $custodiaDeHistoriasClinica = CustodiaDeHistoriasClinica::create($request->all());

        return redirect()->route('admin.custodia-de-historias-clinicas.index');
    }

    public function edit(CustodiaDeHistoriasClinica $custodiaDeHistoriasClinica)
    {
        abort_if(Gate::denies('custodia_de_historias_clinica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.custodiaDeHistoriasClinicas.edit', compact('custodiaDeHistoriasClinica'));
    }

    public function update(UpdateCustodiaDeHistoriasClinicaRequest $request, CustodiaDeHistoriasClinica $custodiaDeHistoriasClinica)
    {
        $custodiaDeHistoriasClinica->update($request->all());

        return redirect()->route('admin.custodia-de-historias-clinicas.index');
    }

    public function show(CustodiaDeHistoriasClinica $custodiaDeHistoriasClinica)
    {
        abort_if(Gate::denies('custodia_de_historias_clinica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.custodiaDeHistoriasClinicas.show', compact('custodiaDeHistoriasClinica'));
    }

    public function destroy(CustodiaDeHistoriasClinica $custodiaDeHistoriasClinica)
    {
        abort_if(Gate::denies('custodia_de_historias_clinica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $custodiaDeHistoriasClinica->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustodiaDeHistoriasClinicaRequest $request)
    {
        $custodiaDeHistoriasClinicas = CustodiaDeHistoriasClinica::find(request('ids'));

        foreach ($custodiaDeHistoriasClinicas as $custodiaDeHistoriasClinica) {
            $custodiaDeHistoriasClinica->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
