@extends('layouts.admin')
@section('content')
@can('income_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.bill.create") }}">
                {{ trans('global.add') }} Bill
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Bill List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Income">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Amount</th>
                        <th>Bill Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bills as $key => $bill)
                        <tr data-entry-id="{{ $bill->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bill->name->name ?? '' }}
                            </td>
                            <td>
                                {{ $bill->month_name ?? '' }}
                            </td>
                            <td>
                                {{ $bill->year ?? '' }}
                            </td>
                            <td>
                                {{ $bill->amount ?? '' }}
                            </td>
                            <td>
                                {{ $bill->bill_type==1?"Monthly Fees":"Admission Fees" ?? '' }}
                            </td>
                            <td>
                                @can('income_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.bill.show', $bill->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('income_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.bill.edit', $bill->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('income_delete')
                                    <form action="{{ route('admin.incomes.destroy', $bill->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('income_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.incomes.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Income:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
