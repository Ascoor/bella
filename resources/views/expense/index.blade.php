@extends('layouts.master')
@section('title')
    قائمة الفواتير
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    الفواتير</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('delete_invoice'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف الفاتورة بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif


    @if (session()->has('Status_Update'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تحديث حالة الدفع بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif

    @if (session()->has('restore_invoice'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم استعادة الفاتورة بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif


    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#add_expense_modal">اضافة مصروف</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>المبلغ</th>
                                    <th>التصنيف</th>
                                    <th>التاريخ</th>
                                    <th>الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                $i = 0;
                                @endphp
                                @foreach ($expenses as $expense)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>

                                        <td>{{ $i }}</td>
                                        <td>{{ $expense->amount }}</td>
                                        <td>{{ $expense->category }}</td>
                                        <td>{{ $expense->date }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#show_expense_modal{{ $expense->id }}">عرض</button>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit_expense_modal{{ $expense->id }}">تعديل</button>
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
    </div>






                                    <div class="modal fade" id="add_expense_modal" tabindex="-1" role="dialog" aria-labelledby="addExpenseModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addExpenseModalLabel">Add Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addExpenseForm"action="{{ route('expenses.store') }}" method="POST" enctype="form-data">
                    @csrf
                    @method('POST')

          <div class="form-group">
            <label for="expense_name" class="col-form-label">Expense Name:</label>
            <input type="text" class="form-control" id="expense_name" name="expense_name">
          </div>
          <div class="form-group">
            <label for="expense_amount" class="col-form-label">Amount:</label>
            <input type="number" class="form-control" id="expense_amount" name="expense_amount">
          </div>
          <div class="form-group">
            <label for="expense_date" class="col-form-label">Expense Date:</label>
            <input type="date" class="form-control" id="expense_date" name="expense_date">
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn btn-primary" id="addExpenseBtn">Add</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
    </div>
  </div>
</div>

                                    <!-- Show Expense Modal -->
                                    <div class="modal fade" id="show_expense_modal" tabindex="-1" role="dialog" aria-labelledby="showExpenseModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="showExpenseModalLabel">عرض المصروف</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong id="amount">المبلغ:</strong></p>
                                                    <p><strong id="category">التصنيف:</strong></p>
                                                    <p><strong id="date">التاريخ:</strong></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="edit_expense_modal" tabindex="-1" role="dialog" aria-labelledby="editExpenseModalLabel"
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
            <label for="edit_expense_name" class="col-form-label">Expense Name:</label>
            <input type="text" class="form-control" id="edit_expense_name" name="expense_name">
          </div>
          <div class="form-group">
            <label for="edit_expense_amount" class="col-form-label">Amount:</label>
            <input type="number" class="form-control" id="edit_expense_amount" name="expense_amount">
          </div>
          <div class="form-group">
            <label for="edit_expense_date" class="col-form-label">Expense Date:</label>
            <input type="date" class="form-control" id="edit_expense_date" name="expense_date">
          </div>
          <input type="hidden" id="edit_expense_id" name="expense_id">
        </form>
      </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateExpenseBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteExpenseModal" tabindex="-1" role="dialog" aria-labelledby="deleteExpenseModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteExpenseModalLabel">Delete Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this expense?
                <form id="deleteExpenseForm"action="expenses/destroy" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}

                    @csrf
                    <input type="hidden" name="expense_id" id="expense_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="deleteExpenseBtn">Delete</button>
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
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <script>
    $(document).on('click', '.delete-expense-btn', function() {
        var expense_id = $(this).attr('data-id');
        $('#deleteExpenseModal').find('#expense_id').val(expense_id);
    });
</script>

<!-- Show Expense Modal Script -->

    <script>
    function showExpenseModal(expenseId) {
        $('#show_expense_modal' + expenseId).modal('show');
    }
</script>
<script>

    $('#add_expense_modal').on('show.bs.modal', function (event) {
        var modal = $(this);

        modal.find('.modal-body #expense_name').val('');
        modal.find('.modal-body #expense_amount').val('');
        modal.find('.modal-body #expense_date').val('');
    });



    $('#edit_expense_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var amount = button.data('amount');
        var date = button.data('date');
        var modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #expense_name').val(name);
        modal.find('.modal-body #expense_amount').val(amount);
        modal.find('.modal-body #expense_date').val(date);


    });
</script>







@endsection
