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
                    <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#addModal">اضافة حجز</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                            style="text-align: center">
                            <thead>
                                <tr>

                                <th>#</th>
                                <th>التاريخ</th>
                                <th>المبلغ</th>
                                <th>التصنيف</th>
                                <th>الخيارات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($revenues as $revenue)
                                    @php
                                    $i++
                                    @endphp


                            <tr>
                                <td>{{ $revenue->i }}</td>
                                <td>{{ $revenue->date }}</td>
                                <td>{{ $revenue->amount }}</td>
                                <td>{{ $revenue->category }}</td>
                                <td>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#showRevenueModal{{ $revenue->id }}">عرض</button>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editRevenueModal{{ $revenue->id }}">تعديل</button>

                                <!-- Button to trigger Revenue delete modal -->
<button class="btn btn-danger" data-toggle="modal" data-target="#revenue-delete-modal">حذف</button>
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



<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="addForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">إضافة إيراد جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="date">التاريخ:</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label for="amount">المبلغ:</label>
                        <input type="number" class="form-control" id="amount" name="amount">
                    </div>
                    <div class="form-group">
                        <label for="details">التفاصيل:</label>
                        <textarea class="form-control" id="details" name="details"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

 <!-- Show Modal -->
 <div class="modal fade" id="showModal{{ $revenue->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="showModal{{ $revenue->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">تفاصيل الإيراد</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>التاريخ: {{ $revenue->date }}</p>
                                            <p>التصنيف: {{ $revenue->category }}</p>
                                            <p>القيمة: {{ $revenue->value }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- Edit Revenue Modal -->
<div class="modal fade" id="editRevenueModal{{ $revenue->id }}" tabindex="-1" role="dialog" aria-labelledby="editRevenueModal{{ $revenue->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRevenueModal{{ $revenue->id }}Label">تعديل بيانات الإيراد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('revenues.update', $revenue->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="revenue_date" class="col-form-label">تاريخ الإيراد:</label>
                        <input type="date" class="form-control" id="revenue_date" name="revenue_date" value="{{ $revenue->revenue_date }}">
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">الوصف:</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $revenue->description }}">
                    </div>
                    <div class="form-group">
                        <label for="amount" class="col-form-label">المبلغ:</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="{{ $revenue->amount }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Revenue delete modal -->
<div class="modal fade" id="revenue-delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Delete Revenue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this revenue?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('revenues.destroy', $revenue->id) }}">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

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
    $(document).ready(function() {
        // Show Revenue Modal
        $('#showRevenueModal{{ $revenue->id }}').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var revenueId = button.data('revenueid') // Extract info from data-* attributes
            var revenueName = button.data('revenuename')
            var revenueAmount = button.data('revenueamount')
            var revenueDate = button.data('revenuedate')

            var modal = $(this)
            modal.find('.modal-title').text('Revenue Details')
            modal.find('.revenue-name').text(revenueName)
            modal.find('.revenue-amount').text(revenueAmount)
            modal.find('.revenue-date').text(revenueDate)
        })
    });
</script>



    <script>
    $(document).ready(function() {
        $('#editRevenueModal{{ $revenue->id }}').on('shown.bs.modal', function() {
            $(this).find('#revenue_date').focus();
        });
    });


</script>







@endsection
