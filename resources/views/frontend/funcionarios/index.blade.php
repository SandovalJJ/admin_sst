@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('funcionario_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.funcionarios.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.funcionario.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Funcionario', 'route' => 'admin.funcionarios.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.funcionario.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Funcionario">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.n_identificacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.genero') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.f_nacimiento') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.celular') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.direccion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.cargo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.funcionario.fields.sede') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Funcionario::GENERO_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($funcionarios as $key => $funcionario)
                                    <tr data-entry-id="{{ $funcionario->id }}">
                                        <td>
                                            {{ $funcionario->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $funcionario->n_identificacion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $funcionario->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Funcionario::GENERO_SELECT[$funcionario->genero] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $funcionario->f_nacimiento ?? '' }}
                                        </td>
                                        <td>
                                            {{ $funcionario->celular ?? '' }}
                                        </td>
                                        <td>
                                            {{ $funcionario->direccion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $funcionario->cargo ?? '' }}
                                        </td>
                                        <td>
                                            {{ $funcionario->sede ?? '' }}
                                        </td>
                                        <td>
                                            @can('funcionario_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.funcionarios.show', $funcionario->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('funcionario_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.funcionarios.edit', $funcionario->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('funcionario_delete')
                                                <form action="{{ route('frontend.funcionarios.destroy', $funcionario->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('funcionario_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.funcionarios.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  });
  let table = $('.datatable-Funcionario:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection