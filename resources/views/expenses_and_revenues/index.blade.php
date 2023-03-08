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
                    <div class="card-header">قائمة الإيرادات و المصروفات</div>

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
                                <?php $i = 0; ?> @foreach ($expenses as $item)
                                <?php $i++; ?>
                                <tr>
                                    <td> {{ $i }} </td>

                <td>{{ $item->expense_type }}</td>
                <td>{{ $item->expense_date }}</td>
                <td>{{ $item->expense_value }}</td>
                <td>{{ $item->expense_notes }}</td>
                           <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#showExpenseModal{{ $expense->id }}">عرض</button>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editExpenseModal{{ $expense->id }}">تعديل</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteExpenseModal{{ $expense->id }}">حذف</button>
                                        </td>

                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
       <!-- Show Expense Modal -->

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


@endsection
