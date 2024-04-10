<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAsistenciumRequest;
use App\Http\Requests\StoreAsistenciumRequest;
use App\Http\Requests\UpdateAsistenciumRequest;
use App\Models\Asistencium;
use App\Models\Funcionario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AsistenciaController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('asistencium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Asistencium::with(['n_identificacions'])->select(sprintf('%s.*', (new Asistencium)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'asistencium_show';
                $editGate      = 'asistencium_edit';
                $deleteGate    = 'asistencium_delete';
                $crudRoutePart = 'asistencia';

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
                $labels = [];
                foreach ($row->n_identificacions as $n_identificacion) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $n_identificacion->n_identificacion);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('asistio', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->asistio ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'n_identificacion', 'asistio']);

            return $table->make(true);
        }

        $funcionarios = Funcionario::get();

        return view('admin.asistencia.index', compact('funcionarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('asistencium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $n_identificacions = Funcionario::pluck('n_identificacion', 'id');

        return view('admin.asistencia.create', compact('n_identificacions'));
    }

    public function store(StoreAsistenciumRequest $request)
    {
        $asistencium = Asistencium::create($request->all());
        $asistencium->n_identificacions()->sync($request->input('n_identificacions', []));

        return redirect()->route('admin.asistencia.index');
    }

    public function edit(Asistencium $asistencium)
    {
        abort_if(Gate::denies('asistencium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $n_identificacions = Funcionario::pluck('n_identificacion', 'id');

        $asistencium->load('n_identificacions');

        return view('admin.asistencia.edit', compact('asistencium', 'n_identificacions'));
    }

    public function update(UpdateAsistenciumRequest $request, Asistencium $asistencium)
    {
        $asistencium->update($request->all());
        $asistencium->n_identificacions()->sync($request->input('n_identificacions', []));

        return redirect()->route('admin.asistencia.index');
    }

    public function show(Asistencium $asistencium)
    {
        abort_if(Gate::denies('asistencium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistencium->load('n_identificacions');

        return view('admin.asistencia.show', compact('asistencium'));
    }

    public function destroy(Asistencium $asistencium)
    {
        abort_if(Gate::denies('asistencium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistencium->delete();

        return back();
    }

    public function massDestroy(MassDestroyAsistenciumRequest $request)
    {
        $asistencia = Asistencium::find(request('ids'));

        foreach ($asistencia as $asistencium) {
            $asistencium->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
