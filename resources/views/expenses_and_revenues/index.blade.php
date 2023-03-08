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
            <on('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">قائمة المصروفات</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>المبلغ</th>
                                    <th>التصنيف</th>
                                    <th>التاريخ</th>
                                    <th>الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)



                            <tbody>
                                <?php $i = 0; ?> @foreach ($expenses as $item)
                                <?php $i++; ?>
                                <tr>
                                    <td> {{ $i }} </td>

                <td>{{ $item->expense_type }}</td>
                <td>{{ $item->expense_date }}</td>
                <td>{{ $item->expense_value }}</td>
                <td>{{ $item->expense_notes }}</td>
            </tr>
        @endforeach
        <td>
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#showExpenseModal{{ $expense->id }}">عرض</button>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editExpenseModal{{ $expense->id }}">تعديل</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteExpenseModal{{ $expense->id }}">حذف</button>
                                        </td>
                                    </tr>

                                    <!-- Show Expense Modal -->
                                    <div class="modal fade" id="showExpenseModal{{ $expense->id }}" tabindex="-1" role="dialog" aria-labelledby="showExpenseModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="showExpenseModalLabel">عرض المصروف</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>المبلغ:</strong> {{ $expense->amount }}</p>
                                                    <p><strong>التصنيف:</strong> {{ $expense->category }}</p>
                                                    <p><strong>التاريخ:</strong> {{ $expense->date }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
</div>

@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}">
</script>
<!-- Ionicons js -->
<script
    src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}">
</script>
<script
    src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}">
</script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}">
</script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}">
</script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}">
</script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}">
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
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
<script>
    $('#edit_apt_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var client_name = button.data('client_name');
        var client_phone = button.data('client_phone');

        var apt_datetime = button.data('apt_datetime');
        var remarks = button.data('remarks');
        var status = button.data('status');
        var edited_by = button.data('edited_by');
        var doctor_id = button.data('doctor_id');
        var doctor_name = button.data('doctor_name');
        var modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #client_name').val(client_name);

        modal.find('.modal-body #apt_datetime').val(apt_datetime);
        modal.find('.modal-body #client_phone').val(client_phone);
        modal.find('.modal-body #remarks').val(remarks);
        modal.find('.modal-body #edited_by').val(edited_by);
        modal.find('.modal-body #doctor_id').val(doctor_id);
        modal.find('.modal-body #doctor_name').val(doctor_name);

        // Set the selected value for the status field
        modal.find('.modal-body #status').val(status);

        var status_text = '';
        if (status === 'pending') {
            status_text = 'pending';


        } else if (status === 'Complete') {
            status_text = 'completed';
        } else if (status === 'cancelled') {
            status_text = 'cancelled';
        }
        modal.find('.modal-body #old_status').text(status_text);
    });
</script>
<script>
    $('#show_apt_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var client_name = button.data('client_name');
        var client_phone = button.data('client_phone');
        var apt_time = button.data('apt_time');
        var apt_datetime = button.data('apt_datetime');
        var remarks = button.data('remarks');
        var status = button.data('status');
        var edited_by = button.data('edited_by');
        var doctor_name = button.data('doctor_name');
        var modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #client_name').val(client_name);
        modal.find('.modal-body #apt_time').val(apt_time);
        modal.find('.modal-body #apt_datetime').val(apt_datetime);
        modal.find('.modal-body #client_phone').val(client_phone);
        modal.find('.modal-body #remarks').val(remarks);
        modal.find('.modal-body #edited_by').val(edited_by);
        modal.find('.modal-body #doctor_name').val(doctor_name);

        // Set the selected value for the status field
        modal.find('.modal-body #status').val(status);

        // Display the old value of the status field
        var status_text = '';
        if (status === 'pending') {
            status_text = 'pending';

        } else if (status === 'Complete') {
            status_text = 'completed';
        } else if (status === 'cancelled') {
            status_text = 'cancelled';
        }
        modal.find('.modal-body #old_status').text(status_text);
    });
</script>
<script>
    $('#delete_apt_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var client_name = button.data('client_name');
        var modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #client_name').val(client_name);
    });
</script>


@endsection
