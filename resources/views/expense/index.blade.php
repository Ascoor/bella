@extends('layouts.master')
@section('title')
قائمة المصروفات
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
                <h4 class="content-title mb-0 my-auto">المصروفات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قائمةالمصروفات</span>
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
                            data-toggle="modal" href="#add_expenses_modal">اضافة مصروف</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <th>نوع المصروف</th>
                                    <th>التاريخ</th>
                                    <th>المبلغ</th>
                                    <th>المصروف له</th>
                                    <th>الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i = 0;
                                @endphp
                                @foreach($expenses as $item)
                                    @php
                                        $i++
                                    @endphp
                                    <tr>

                                        <td>{{ $i }}</td>
                                        <td>{{ $item->expenseType->name }}</td>
                                        <td>{{ $item->expense_date }}</td>
                                        <td>{{ $item->expense_value }}</td>
                                        <td>{{ $item->expense_to }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info"
                                            data-id="{{ $item->id }}"
                                                data-expense_type_name="{{ $item->expenseType->name }}"
                                                data-expense_type_id="{{ $item->expenseType->id }}"
                                                data-expense_value="{{ $item->expense_value }}"
                                                data-expense_notes="{{ $item->expense_notes }}"
                                                data-expense_to="{{ $item->expense_to }}"
                                                data-expense_date="{{ $item->expense_date }}" data-toggle="modal"
                                                data-target="#show_expenses_modal">عرض</button>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-id="{{ $item->id }}"
                                            data-expense_type_name="{{ $item->expenseType->name }}"
                                            data-expense_type_id="{{ $item->expenseType->id }}"
                                            data-expense_value="{{ $item->expense_value }}"
                                            data-expense_notes="{{ $item->expense_notes }}"
                                            data-expense_to="{{ $item->expense_to }}"
                                            data-expense_date="{{ $item->expense_date }}"
                                                data-target="#edit_expenses_modal">تعديل</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-id="{{ $item->id }}"     data-expense_to="{{ $item->expense_to }}"
                                                data-target="#delete_expenses_modal">حذف</button>
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
    <div class="modal fade" id="add_expenses_modal" tabindex="-1" role="dialog" aria-labelledby="addExpenseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExpenseModalLabel">إضافة مصروف</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addExpenseForm" action="expenses" method="POST" enctype="form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="expense_name" class="col-form-label">نوع المصروف</label>
                            <select name="expense_type_id" id="expense_type_id">
                                <option selected>إختر</option>
                               @foreach ($expenseTypes as $item1)
                                <option value="{{ $item1->id }}"> {{ $item1->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expense_name" class="col-form-label">المنصرف له</label>
                            <input type="text" class="form-control" id="expense_to" name="expense_to">
                        </div>
                        <div class="form-group">
                            <label for="expense_amount" class="col-form-label">المبلغ</label>
                            <input type="number" class="form-control" id="expens_value" name="expense_value">
                        </div>
                        <div class="form-group">
                            <label for="expense_date" class="col-form-label">تاريخ الصرف</label>
                            <input type="date" class="form-control" id="expense_date" name="expense_date">
                        </div>
                        <div class="form-group">
                            <label for="expense_date" class="col-form-label">ملاخظات</label>
                            <textarea type="text" class="form-control" id="expense_notes" name="expense_notes"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="addExpenseBtn">إضافة</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Show Expense Modal -->
    <div class="modal fade" id="show_expenses_modal" tabindex="-1" role="dialog" aria-labelledby="showExpenseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showExpenseModalLabel">عرض المصروف</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="form-group">
                            <label for="expense_name" class="col-form-label">نوع المصروف</label>
                            <input type="text" class="form-control" readonly id="expense_type_name" name="expense_type_name">

                        </div>
                        <div class="form-group">
                            <label for="expense_name" class="col-form-label">المنصرف له</label>
                            <input type="text" class="form-control" readonly id="expense_to" name="expense_to">
                        </div>
                        <div class="form-group">
                            <label for="expense_amount" class="col-form-label">المبلغ</label>
                            <input type="number" class="form-control" readonly id="expense_value" name="expense_value">
                        </div>
                        <div class="form-group">
                            <label for="expense_date" class="col-form-label">تاريخ الصرف</label>
                            <input type="date" class="form-control" readonly id="expense_date" name="expense_date">
                        </div>
                        <div class="form-group">
                            <label for="expense_date" class="col-form-label">ملاخظات</label>
                            <textarea type="text" class="form-control" readonly id="expense_notes" name="expense_notes"></textarea>
                        </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_expenses_modal" tabindex="-1" role="dialog" aria-labelledby="editExpenseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_expense_modal">Edit Expense</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editExpenseForm" action="expenses/update" method="POST" enctype="form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="expense_name" class="col-form-label">نوع المصروف</label>
                            <select name="expense_type_id" id="expense_type_id">

                               @foreach ($expenseTypes as $item1)
                                <option value="{{ $item1->id }}" selected> {{ $item1->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expense_name" class="col-form-label">المنصرف له</label>
                            <input type="text" class="form-control" id="expense_to" name="expense_to">
                        </div>
                        <div class="form-group">
                            <label for="expense_amount" class="col-form-label">المبلغ</label>
                            <input type="number" class="form-control" id="expense_value" name="expense_value">
                        </div>
                        <div class="form-group">
                            <label for="expense_date" class="col-form-label">تاريخ الصرف</label>
                            <input type="date" class="form-control" id="expense_date" name="expense_date">
                        </div>
                        <div class="form-group">
                            <label for="expense_date" class="col-form-label">ملاخظات</label>
                            <textarea type="text" class="form-control" id="expense_notes" name="expense_notes"></textarea>
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


<div class="modal fade" id="delete_expenses_modal" tabindex="-1" role="dialog" aria-labelledby="deleteExpenseModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteExpenseModalLabel">حذف  المصروف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form id="deleteExpenseForm"action="expenses/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p>
                        <br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control mg-b-20" id="expense_to" type="text" readonly>
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
    $('#delete_expenses_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var expense_to = button.data('expense_to');
        var modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #expense_to').val(expense_to);
    });

        $('#show_expenses_modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var expense_type_name = button.data('expense_type_name');
            var expense_type_id = button.data('expense_type_id');
            var  expense_value = button.data('expense_value');
            var expense_date = button.data('expense_date');
            var expense_to = button.data('expense_to');
            var expense_notes = button.data('expense_notes');
            var modal = $(this);

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #expense_type_name').val(expense_type_name);
            modal.find('.modal-body #expense_value').val(expense_value);
            modal.find('.modal-body #expense_date').val(expense_date);
            modal.find('.modal-body #expense_to').val(expense_to);
            modal.find('.modal-body #expense_notes').val(expense_notes);


        });
        $('#edit_expenses_modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var expense_type_name = button.data('expense_type_name');
            var expense_type_id = button.data('expense_type_id');
            var  expense_value = button.data('expense_value');
            var expense_date = button.data('expense_date');
            var expense_to = button.data('expense_to');
            var expense_notes = button.data('expense_notes');
            var modal = $(this);

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #expense_typename').val(name);
            modal.find('.modal-body #expense_value').val(expense_value);
            modal.find('.modal-body #expense_date').val(expense_date);
            modal.find('.modal-body #expense_to').val(expense_to);
            modal.find('.modal-body #expense_notes').val(expense_notes);
            $('#delete_expenses_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var expense_to = button.data('expense_to');
        var modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #expense_to').val(expense_to);
    });

        });
    </script>







    @endsection
