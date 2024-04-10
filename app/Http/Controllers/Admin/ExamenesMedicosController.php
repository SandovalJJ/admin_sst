<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExamenesMedicoRequest;
use App\Http\Requests\StoreExamenesMedicoRequest;
use App\Http\Requests\UpdateExamenesMedicoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExamenesMedicosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('examenes_medico_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.examenesMedicos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('examenes_medico_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.examenesMedicos.create');
    }

    public function store(StoreExamenesMedicoRequest $request)
    {
        $examenesMedico = ExamenesMedico::create($request->all());

        return redirect()->route('admin.examenes-medicos.index');
    }

    public function edit(ExamenesMedico $examenesMedico)
    {
        abort_if(Gate::denies('examenes_medico_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.examenesMedicos.edit', compact('examenesMedico'));
    }

    public function update(UpdateExamenesMedicoRequest $request, ExamenesMedico $examenesMedico)
    {
        $examenesMedico->update($request->all());

        return redirect()->route('admin.examenes-medicos.index');
    }

    public function show(ExamenesMedico $examenesMedico)
    {
        abort_if(Gate::denies('examenes_medico_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.examenesMedicos.show', compact('examenesMedico'));
    }

    public function destroy(ExamenesMedico $examenesMedico)
    {
        abort_if(Gate::denies('examenes_medico_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examenesMedico->delete();

        return back();
    }

    public function massDestroy(MassDestroyExamenesMedicoRequest $request)
    {
        $examenesMedicos = ExamenesMedico::find(request('ids'));

        foreach ($examenesMedicos as $examenesMedico) {
            $examenesMedico->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
