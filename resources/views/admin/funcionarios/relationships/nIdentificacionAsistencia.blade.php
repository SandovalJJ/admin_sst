<div class="content">
    @can('asistencium_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.asistencia.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.asistencium.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.asistencium.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-nIdentificacionAsistencia">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.asistencium.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.asistencium.fields.n_identificacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.asistencium.fields.asistio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.asistencium.fields.fecha') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($asistencia as $key => $asistencium)
                                    <tr data-entry-id="{{ $asistencium->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $asistencium->id ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($asistencium->n_identificacions as $key => $item)
                                                <span class="label label-info label-many">{{ $item->n_identificacion }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $asistencium->asistio ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $asistencium->asistio ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $asistencium->fecha ?? '' }}
                                        </td>
                                        <td>
                                            @can('asistencium_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.asistencia.show', $asistencium->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('asistencium_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.asistencia.edit', $asistencium->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('asistencium_delete')
                                                <form action="{{ route('admin.asistencia.destroy', $asistencium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('asistencium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.asistencia.massDestroy') }}",
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
  let table = $('.datatable-nIdentificacionAsistencia:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection