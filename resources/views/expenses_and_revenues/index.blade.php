@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link
    href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}"
    rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}"
    rel="stylesheet">
<link
    href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}"
    rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}"
    rel="stylesheet">
<link
    href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}"
    rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}"
    rel="stylesheet">
@section('title')
الحجوزات
@stop
    @endsection
    @section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">قائمة الحجوزات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    جميع الحجوزات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    @endsection
    @section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                <div class="row">
    <div class="col-6">
        <input type="text" class="form-control daterange" name="daterange" value="" autocomplete="off" />
    </div>
</div>
            </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
  <thead>
    <tr>
      <th>#</th>
      <th>النوع</th>
      <th>التاريخ</th>
      <th>القيمة</th>
      <th>من/إلى</th>
      <th>ملاحظات</th>
      <th></th>
    </tr>
  </thead>

  <tbody>
    <?php $i = 0; ?>
    @foreach($expenses_revenues as $entry)
      <?php $i++; ?>
      <tr>
        <td>{{ $i }}</td>
        <td>{{ $entry->type }}</td>
        <td>{{ $entry->expense_date ?? $entry->revenue_date }}</td>
        <td>{{ $entry->expense_value ?? $entry->revenue_value }}</td>
        <td>{{ $entry->expense_to ?? $entry->revenue_from }}</td>
        <td>{{ $entry->expense_notes ?? $entry->revenue_notes }}</td>
        <td>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#entry-modal-{{ $entry->id }}">عرض التفاصيل</button>
        </td>
      </tr>

      <!-- Modal -->
      <div class="modal fade" id="entry-modal-{{ $entry->id }}" tabindex="-1" role="dialog" aria-labelledby="entry-modal-{{ $entry->id }}-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="entry-modal-{{ $entry->id }}-label">تفاصيل الإدخال</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><strong>النوع:</strong> {{ $entry->type }}</p>
              <p><strong>التاريخ:</strong> {{ $entry->expense_date ?? $entry->revenue_date }}</p>
              <p><strong>القيمة:</strong> {{ $entry->expense_value ?? $entry->revenue_value }}</p>
              <p><strong>من/إلى:</strong> {{ $entry->expense_to ?? $entry->revenue_from }}</p>
              <p><strong>ملاحظات:</strong> {{ $entry->expense_notes ?? $entry->revenue_notes }}</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </tbody>
</table>

<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
</div>

@endsection
@section('js')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.jsdelivr.net/npm/daterangepicker@3/daterangepicker.min.js"></script>

    <script
        src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}">
    </script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}">
    </script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}">
    </script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}">
    </script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}">
    </script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
$(function() {
    $('.daterange').daterangepicker({
        opens: 'left',
        autoApply: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    });

    $('.daterange').on('apply.daterangepicker', function(ev, picker) {
        var startDate = picker.startDate.format('YYYY-MM-DD');
        var endDate = picker.endDate.format('YYYY-MM-DD');

        $('tbody tr').hide();
        $('tbody tr').each(function() {
            var date = $(this).find('td:nth-child(3)').text();
            if (date >= startDate && date <= endDate) {
                $(this).show();
            }
        });
    });
});
</script>


@endsection
