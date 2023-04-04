@extends('layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Datetimepicker-slider css -->
<link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- Internal Spectrum-colorpicker css -->
<link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"><a type="btn" href="/appointments">الحجوزات</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
            تفاصيل الحجز</span>
        </div>
    </div>
</div>

@endsection
@section('content')

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
            <input class="form-control mg-b-20" readonly placeholder="{{ $appointment->client->client_name }}" type="text">

          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">رقم الجوال</label>
            <input class="form-control mg-b-20" readonly placeholder="{{ $appointment->client->client_phone }}" type="text">

          </div>
   <div class="form-group">
   <label for="recipient-name" class="col-form-label">الطبيب</label>
   <input class="form-control mg-b-20" readonly placeholder="{{ $appointment->doctor->name }}" type="text">

                        </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">العنوان</label>
            <input class="form-control mg-b-20" readonly placeholder="{{ $appointment->client->adress }}" type="text">

          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">البريد الإلكترونى للعميل</label>
            <input class="form-control mg-b-20" readonly placeholder="{{ $appointment->client->email }}" type="text">

          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">تاريخ وموعد الحجز</label>
            <input class="form-control mg-b-20" readonly placeholder="{{ $appointment->apt_datetime }}" type="text">

                  </div>

          <div class="form-group">

                           <p class="mg-b-10">حالة الحجز</p>
                           <input class="form-control mg-b-20" readonly placeholder="{{ $appointment->status }}" type="text">
</div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">تأكيد الحجز</label>
            <input class="form-control mg-b-20" readonly placeholder="{{ $appointment->remarks }}" type="text">
          </div>
        </div>
        <div class="modal-footer">


<a class="btn btn-success"
href="/appointments">عودة للحجوزات</a>

</span>

        </div>
        <!-- row closed -->
    </div>
    <!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
@endsection
