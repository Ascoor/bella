@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
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
            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#add_apt_modal">اضافة حجز</a>
         </div>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
               <thead>
                  <tr>
                     <th class="border-bottom-0">#</th>
                     <th class="border-bottom-0">إسم العميل</th>
                     <th class="border-bottom-0">رقم الهاتف</th>
                     <th class="border-bottom-0">تاريخ و موعد الحجز</th>
                     <th class="border-bottom-0">الدكتور</th>
                     <th class="border-bottom-0">حالة الحجز</th>
                     <th class="border-bottom-0">العمليات</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 0; ?> @foreach ($appointments as $item)
                  <?php $i++; ?>
                  <tr>
                     <td> {{ $i }} </td>
                     <td>
                        <a href="{{ route('appointments.show', $item->id) }}">
                        {{ $item->client->client_name }}</a>
                     </td>
                     <td> {{ $item->client->client_phone }} </td>
                     <td> {{ $item->apt_datetime }} </td>
                     <td> {{ $item->doctor->name }} </td>
                     <td> {{ $item->status }} </td>
                     <td>
                        <a class="modal-effect btn btn-sm btn-success" data-effect="effect-scale" data-id="{{ $item->id }}" data-doctor_name="{{ $item->doctor->name }}" data-status="{{ $item->status }}" data-client_name="{{ $item->client->client_name }}" data-edited_by="{{ $item->edited_by }}" data-client_phone="{{ $item->client->client_phone }}" data-apt_datetime="{{ $item->apt_datetime }}" data-remarks="{{ $item->remarks }}" data-apt_time="{{ $item->apt_time }}" data-toggle="modal" href="#show_apt_modal" title="مشاهدة">
                        <i class="las la-eye"></i>
                        </a>
                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{ $item->id }}" data-doctor_id="{{ $item->doctor->id }}"  data-doctor_name="{{ $item->doctor->name }}" data-status="{{ $item->status }}" data-client_name="{{ $item->client->client_name }}" data-edited_by="{{ $item->edited_by }}" data-client_phone="{{ $item->client->client_phone }}" data-apt_datetime="{{ $item->apt_datetime }}" data-remarks="{{ $item->remarks }}" data-toggle="modal" href="#edit_apt_modal" title="تعديل">
                        <i class="fas fa-edit"></i>
                        </a>
                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-id="{{ $item->id }}" data-client_name="{{ $item->client->client_name }}" data-toggle="modal" href="#delete_apt_modal" title="حذف">
                        <i class="las la-trash"></i>
                        </a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
        </div>
    </div>
</div>

<!------- Add Appointment Modal ---------->
<div class="modal fade" id="add_apt_modal" tabindex="-1" role="dialog" aria-labelledby="addAptModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">إضافة حجز</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('appointments.store') }}" method="POST" enctype="form-data">
                     @csrf
                     @method('POST')
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">إسم العميل</label>
            <input class="form-control mg-b-20" name="client_name" id="client_name" type="text">
            @error('client_name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">رقم الجوال</label>
            <input type="tell" class="form-control" id="client_phone" name="client_phone" >
            @error('client_phone')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
          </div>
   <div class="form-group">
                           <p class="mg-b-10">إختر الدكتور</p>
                           <select class="form-control select2-no-search" id="doctor_name" name="doctor_id">
                              <option label="Choose one">
                                 @foreach($doctors as $doctor)
                              <option value="{{ $doctor->id }}">{{ $doctor->name }} </option>
                              @endforeach
                           </select>
                           @error('doctor_id')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
                        </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">العنوان</label>
            <input type="text" class="form-control" id="address" name="address">
            @error('address')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">البريد الإلكترونى للعميل</label>
            <input class="form-control mg-b-15" name="email" type="email">
            @error('address')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">تاريخ وموعد الحجز</label>
            <input type="datetime-local" name="apt_datetime" id="apt_datetime" class="form-control @error('apt_datetime') is-invalid @enderror">
            @error('apt_datetime')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
                  </div>

          <div class="form-group">

                           <p class="mg-b-10">حالة الحجز</p>
                           <select class="form-control select2-no-search" id="status" name="status">
                              <option label="Choose one">
                              <option value="pending" selected>Pending</option>
                              <option value="accepted">confirmed</option>
                              <option value="accepted">Complete</option>
                              <option value="accepted">cancelled</option>
                           </select>
                           @error('status')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
                        </div>


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">تأكيد الحجز</label>
            <input type="datetime-local" name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror">
            @error('remarks')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
            <button type="submit" class="btn btn-primary">سجل</button>
        </div>
    </form>
    </div>
  </div>
</div>
                  <!-- End Add Appointments Modal -->



   <!--  show Appointments Modal -->
   <div class="modal fade" id="show_apt_modal" tabindex="-1" role="dialog" aria-labelledby="showAptModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">بيانات حجز</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">

      <input type="hidden" id="edited_by" name="edited_by" value="">
                           <input type="hidden" id="id" name="id" value="">
            <label for="recipient-name" class="col-form-label">إسم العميل</label>
            <input class="form-control mg-b-20" name="client_name" id="client_name" type="text">

          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">رقم الجوال</label>
            <input type="tell" class="form-control" id="client_phone" name="client_phone" >

          </div>
   <div class="form-group">
   <label for="recipient-name" class="col-form-label">الطبيب</label>
                           <input type="text" class="form-control" id="doctor_name" name="doctor_name" >

                        </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">العنوان</label>
            <input type="text" class="form-control" id="address" name="address">

          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">البريد الإلكترونى للعميل</label>
            <input class="form-control mg-b-15" name="email" type="email">

          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">تاريخ وموعد الحجز</label>
            <input type="text" name="apt_datetime" id="apt_datetime" class="form-control @error('apt_datetime') is-invalid @enderror">

                  </div>

          <div class="form-group">

                           <p class="mg-b-10">حالة الحجز</p>
                           <input type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror">

</div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">تأكيد الحجز</label>
            <input type="text" name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror">

          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>

        </div>

    </div>
  </div>
</div>



      <!-- End Show Appointment Modal -->
      <!-- Edit Appointment Modal -->
      <div class="modal fade" id="edit_apt_modal" tabindex="-1" role="dialog" aria-labelledby="edit_apt_modal_label" aria-hidden="true">
      <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">إضافة حجز</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="appointments/update" method="POST" enctype="form-data">
                     @csrf
                     @method('PUT')
          <div class="form-group">
          <input type="hidden" id="edited_by" name="edited_by" value="">
          <input type="hidden" id="id" name="id" value="">

            <label for="recipient-name" class="col-form-label">إسم العميل</label>
            <input class="form-control mg-b-20" name="client_name" id="client_name" type="text">
            @error('client_name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">رقم الجوال</label>
            <input type="tell" class="form-control" id="client_phone" name="client_phone" >
            @error('client_phone')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
          </div>
          <div class="form-group">
   <label for="recipient-name" class="col-form-label">الطبيب</label>
                           <input type="text" class="form-control" id="doctor_name" name="doctor_name" >
                           <input type="hidden" class="form-control" id="doctor_id" name="doctor_id" >

                        </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">العنوان</label>
            <input type="text" class="form-control" id="address" name="address">
            @error('address')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">البريد الإلكترونى للعميل</label>
            <input class="form-control mg-b-15" name="email" type="email">
            @error('address')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">تاريخ وموعد الحجز</label>
            <input type="datetime-local" name="apt_datetime" id="apt_datetime" class="form-control @error('apt_datetime') is-invalid @enderror">
            @error('apt_datetime')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
                  </div>

          <div class="form-group">

                           <p class="mg-b-10">حالة الحجز</p>
                           <select class="form-control select2-no-search" id="status" name="status">
                              <option label="Choose one">
                              <option value="pending" selected>Pending</option>
                              <option value="accepted">accepted</option>
                              <option value="Complete">Complete</option>
                              <option value="cancelled">cancelled</option>
                           </select>
                           @error('status')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
                        </div>


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">تأكيد الحجز</label>
            <input type="datetime-local" name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror">
            @error('remarks')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
            <button type="submit" class="btn btn-primary">سجل</button>
        </div>
    </form>
    </div>
  </div>
</div>


<!---------   End Edit Model Appointment Model    --------->
   <!---------   Delete Appointment Model    --------->
   <div class="modal fade" id="delete_apt_modal" tabindex="-1" role="dialog" aria-labelledby="deleteAptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">حذف العميل</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="appointments/destroy" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>هل انت متاكد من عملية الحذف ؟</p>
                    <br>
                    <input type="hidden" name="id" id="id" value="">
                    <input class="form-control mg-b-20" id="client_name" type="text" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>

<!---------  End Delete Appointment Model    --------->
<!-- row closed -->
<!-- Container closed -->
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
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
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
<script>
   $('#edit_apt_modal').on('show.bs.modal', function(event) {
       var button = $(event.relatedTarget);
       var id = button.data('id');
       var client_name = button.data('client_name');
       var client_phone = button.data('client_phone');
       var apt_time = button.data('apt_time');
       var apt_datetime = button.data('apt_datetime');
       var remarks = button.data('remarks');
       var status = button.data('status');
       var edited_by = button.data('edited_by');
       var doctor_id = button.data('doctor_id');
       var doctor_name = button.data('doctor_name');
       var modal = $(this);

       modal.find('.modal-body #id').val(id);
       modal.find('.modal-body #client_name').val(client_name);
       modal.find('.modal-body #apt_time').val(apt_time);
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
       } else if (status === 'accepted') {
           status_text = 'accepted';
       } else if (status === 'confirmed') {
           status_text = 'confirmed';
       } else if (status === 'Complete') {
           status_text = 'completed';
       } else if (status === 'cancelled') {
           status_text = 'cancelled';
       }
       modal.find('.modal-body #old_status').text(status_text);
   });


   $('#show_apt_modal').on('show.bs.modal', function(event) {
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
       } else if (status === 'accepted') {
           status_text = 'accepted';
       } else if (status === 'Complete') {
           status_text = 'completed';
       } else if (status === 'cancelled') {
           status_text = 'cancelled';
       }
       modal.find('.modal-body #old_status').text(status_text);
   });
</script>
<script>
   $('#delete_apt_modal').on('show.bs.modal', function(event) {
       var button = $(event.relatedTarget);
       var id = button.data('id');
       var client_name = button.data('client_name');
       var modal = $(this);

       modal.find('.modal-body #id').val(id);
       modal.find('.modal-body #client_name').val(client_name);
   });
</script>
<script>
   var date = $('.fc-datepicker').datepicker({
       dateFormat: 'yy-mm-dd h:mm TT'
   }).val();
</script>
@endsection
