@extends('layouts.master')
@section('title')
قائمة الإيرادات
@stop
    @section('css')
    <!-- Internal Data table css -->
    <link
        href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link
        href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link
        href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}"
        rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}"
        rel="stylesheet" />
    @endsection
    @section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الإيرادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قائمةالإيرادات</span>
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
                    <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#add_revenues_modal">اضافة إيراد</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <th>نوع الإيراد</th>
                                    <th>التاريخ</th>
                                    <th>المبلغ</th>
                                    <th>المستلم منه</th>
                                    <th>المحصل</th>

                                    <th>الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i = 0;
                                @endphp
                                @foreach($revenues as $item)
                                    @php
                                        $i++
                                    @endphp
                                    <tr>

        <td>{{ $i }}</td>
        <td>{{ $item->incomeType ? $item->incomeType->name : '' }}</td>
        <td>{{ $item->revenue_date }}</td>
        <td>{{ $item->revenue_value }}</td>
        <td>{{ $item->revenue_from }}</td>
        <td>{{ $item->user ? $item->user->name : '' }}</td>
    </tr>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info"
                                            data-id="{{ $item->id }}"
                                                data-revenue_type_name="{{ $item->incomeType->name }}"
                                                data-revenue_type_id="{{ $item->incomeType->id }}"
                                                data-revenue_value="{{ $item->revenue_value }}"
                                                data-revenue_notes="{{ $item->revenue_notes }}"
                                                data-revenue_from="{{ $item->revenue_from }}"
                                                data-revenue_date="{{ $item->revenue_date }}" data-toggle="modal"
                                                data-target="#show_revenues_modal">عرض</button>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-id="{{ $item->id }}"
                                            data-revenue_type_name="{{ $item->incomeType->name }}"
                                            data-revenue_type_id="{{ $item->incomeType->id }}"
                                            data-revenue_value="{{ $item->revenue_value }}"
                                            data-revenue_notes="{{ $item->revenue_notes }}"
                                            data-revenue_from="{{ $item->revenue_from }}"
                                            data-revenue_date="{{ $item->revenue_date }}"
                                                data-target="#edit_revenues_modal">تعديل</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-id="{{ $item->id }}"     data-revenue_from="{{ $item->revenue_from }}"
                                                data-target="#delete_revenues_modal">حذف</button>
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

    <!--- Add Expense Model--->
    <div class="modal fade" id="add_revenues_modal" tabindex="-1" role="dialog" aria-labelledby="addExpenseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExpenseModalLabel">إضافة إيراد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addExpenseForm" action="revenues" method="POST" enctype="form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="revenue_name" class="col-form-label">نوع الإيراد</label>
                            <select name="income_type_id" id="income_type_id">
                                <option selected>إختر</option>
                               @foreach ($incomeTypes as $item1)
                                <option value="{{ $item1->id }}"> {{ $item1->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="revenue_name" class="col-form-label">المستلم منه</label>
                            <input type="text" class="form-control" id="revenue_from" name="revenue_from">
                        </div>
                        <div class="form-group">
                            <label for="revenue_amount" class="col-form-label">المبلغ</label>
                            <input type="number" class="form-control" id="revenue_value" name="revenue_value">
                        </div>
                        <div class="form-group">
                            <label for="revenue_date" class="col-form-label">تاريخ الصرف</label>
                            <input type="date" class="form-control" id="revenue_date" name="revenue_date">
                        </div>
                        <div class="form-group">
                            <label for="revenue_date" class="col-form-label">ملاخظات</label>
                            <textarea type="text" class="form-control" id="revenue_notes" name="revenue_notes"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"  >إضافة</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Show Expense Modal -->
    <div class="modal fade" id="show_revenues_modal" tabindex="-1" role="dialog" aria-labelledby="showExpenseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showExpenseModalLabel">عرض الإيراد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="form-group">
                            <label for="revenue_name" class="col-form-label">نوع الإيراد</label>

                            <input type="text" class="form-control"  readonly id="revenue_type_name">

                        </div>
                        <div class="form-group">
                            <label for="revenue_name" class="col-form-label">المنصرف له</label>
                            <input type="text" class="form-control" readonly id="revenue_from" name="revenue_from">
                        </div>
                        <div class="form-group">
                            <label for="revenue_amount" class="col-form-label">المبلغ</label>
                            <input type="number" class="form-control" readonly id="revenue_value" name="revenue_value">
                        </div>
                        <div class="form-group">
                            <label for="revenue_date" class="col-form-label">تاريخ الصرف</label>
                            <input type="date" class="form-control" readonly id="revenue_date" name="revenue_date">
                        </div>
                        <div class="form-group">
                            <label for="revenue_date" class="col-form-label">ملاخظات</label>
                            <textarea type="text" class="form-control" readonly id="revenue_notes" name="revenue_notes"></textarea>
                        </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_revenues_modal" tabindex="-1" role="dialog" aria-labelledby="editExpenseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_revenue_modal">تعديل بيانات اللإيراد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editExpenseForm" action="revenues/update" method="POST" enctype="form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">

                            <label for="revenue_name" class="col-form-label">نوع الإيراد</label>
                            <select name="income_type_id" id="income_type_id">

                               @foreach ($incomeTypes as $item1)
                                <option selected value="{{ $item1->id }}"> {{ $item1->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="revenue_name" class="col-form-label">المنصرف له</label>
                            <input type="text" class="form-control" id="revenue_from" name="revenue_from">
                        </div>
                        <div class="form-group">
                            <label for="revenue_amount" class="col-form-label">المبلغ</label>
                            <input type="number" class="form-control" id="revenue_value" name="revenue_value">
                        </div>
                        <div class="form-group">
                            <label for="revenue_date" class="col-form-label">تاريخ الصرف</label>
                            <input type="date" class="form-control" id="revenue_date" name="revenue_date">
                        </div>
                        <div class="form-group">
                            <label for="revenue_date" class="col-form-label">ملاخظات</label>
                            <textarea type="text" class="form-control" id="revenue_notes" name="revenue_notes"></textarea>
                        </div>
                        <input type="hidden" id="id" name="id">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</submit>
                    </div>
                </form>

            </div>
        </div>
    </div>


<div class="modal fade" id="delete_revenues_modal" tabindex="-1" role="dialog" aria-labelledby="deleteExpenseModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteExpenseModalLabel">حذف  الإيراد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form id="deleteExpenseForm"action="revenues/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p>
                        <br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control mg-b-20" id="revenue_from" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
        </div>
    </div>
</div>


    <!--/div-->
    </div>

    <!-- حذف الفاتورة -->



    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    @endsection
    @section('js')
    <!-- Internal Data tables -->
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
    $('#delete_revenues_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var revenue_from = button.data('revenue_from');
        var modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #revenue_from').val(revenue_from);
    });

        $('#show_revenues_modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var revenue_type_name = button.data('revenue_type_name');
            var revenue_type_id = button.data('revenue_type_id');
            var  revenue_value = button.data('revenue_value');
            var revenue_date = button.data('revenue_date');
            var revenue_from = button.data('revenue_from');
            var revenue_notes = button.data('revenue_notes');
            var modal = $(this);

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #revenue_type_name').val(revenue_type_name);
            modal.find('.modal-body #revenue_value').val(revenue_value);
            modal.find('.modal-body #revenue_date').val(revenue_date);
            modal.find('.modal-body #revenue_from').val(revenue_from);
            modal.find('.modal-body #revenue_notes').val(revenue_notes);


        });
        $('#edit_revenues_modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var income_type_name = button.data('income_type_name');
            var income_type_id = button.data('income_type_id');
            var  revenue_value = button.data('revenue_value');
            var revenue_date = button.data('revenue_date');
            var revenue_from = button.data('revenue_from');
            var revenue_notes = button.data('revenue_notes');
            var modal = $(this);

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #income_type_name').val(income_type_name);
            modal.find('.modal-body #revenue_value').val(revenue_value);
            modal.find('.modal-body #revenue_date').val(revenue_date);
            modal.find('.modal-body #revenue_from').val(revenue_from);
            modal.find('.modal-body #revenue_notes').val(revenue_notes);
            $('#delete_revenues_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var revenue_from = button.data('revenue_from');
        var modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #revenue_from').val(revenue_from);
    });

        });
    </script>







    @endsection
