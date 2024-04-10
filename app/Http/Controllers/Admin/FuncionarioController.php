<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyFuncionarioRequest;
use App\Http\Requests\StoreFuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Models\Funcionario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FuncionarioController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('funcionario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Funcionario::query()->select(sprintf('%s.*', (new Funcionario)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'funcionario_show';
                $editGate      = 'funcionario_edit';
                $deleteGate    = 'funcionario_delete';
                $crudRoutePart = 'funcionarios';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('n_identificacion', function ($row) {
                return $row->n_identificacion ? $row->n_identificacion : '';
            });
            $table->editColumn('nombre', function ($row) {
                return $row->nombre ? $row->nombre : '';
            });
            $table->editColumn('genero', function ($row) {
                return $row->genero ? Funcionario::GENERO_SELECT[$row->genero] : '';
            });

            $table->editColumn('celular', function ($row) {
                return $row->celular ? $row->celular : '';
            });
            $table->editColumn('direccion', function ($row) {
                return $row->direccion ? $row->direccion : '';
            });
            $table->editColumn('cargo', function ($row) {
                return $row->cargo ? $row->cargo : '';
            });
            $table->editColumn('sede', function ($row) {
                return $row->sede ? $row->sede : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.funcionarios.index');
    }

    public function create()
    {
        abort_if(Gate::denies('funcionario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.funcionarios.create');
    }

    public function store(StoreFuncionarioRequest $request)
    {
        $funcionario = Funcionario::create($request->all());

        return redirect()->route('admin.funcionarios.index');
    }

    public function edit(Funcionario $funcionario)
    {
        abort_if(Gate::denies('funcionario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.funcionarios.edit', compact('funcionario'));
    }

    public function update(UpdateFuncionarioRequest $request, Funcionario $funcionario)
    {
        $funcionario->update($request->all());

        return redirect()->route('admin.funcionarios.index');
    }

    public function show(Funcionario $funcionario)
    {
        abort_if(Gate::denies('funcionario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $funcionario->load('nIdentificacionAsistencia');

        return view('admin.funcionarios.show', compact('funcionario'));
    }

    public function destroy(Funcionario $funcionario)
    {
        abort_if(Gate::denies('funcionario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $funcionario->delete();

        return back();
    }

    public function massDestroy(MassDestroyFuncionarioRequest $request)
    {
        $funcionarios = Funcionario::find(request('ids'));

        foreach ($funcionarios as $funcionario) {
            $funcionario->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
