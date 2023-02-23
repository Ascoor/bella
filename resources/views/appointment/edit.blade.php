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
            <h4 class="content-title mb-0 my-auto">الحجوزات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
            تعديل الحجز</span>
        </div>
    </div>
</div>

@endsection
@section('content')

<!-- row -->

<!--div-->
<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
    <div class="card">
        <div class="card-body">
        <form method="POST" action="{{ route('appointments.update',  $appointment->id ) }}">
    @csrf
    @method('PUT')      <div class="main-content-label mg-b-5">
          بيانات الحجز
                </div>
                <br/>
                <div class="row row-sm">
                    <div class="col-lg">
                        <p class="mg-b-10">إسم العميل</p>
                        <input class="form-control mg-b-20"  value="{{ $appointment->client->client_name }}" type="text">
                        <input hidden class="form-control mg-b-20" name="edited_by"  type="number">
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-lg">
                        <p class="mg-b-10">البريد الإلكترونى للعميل</p>
                        <input class="form-control mg-b-15" value="{{ $appointment->email }}" name="email" type="email">
                    </div>
                </div>


                <div class="row row-sm mg-b-20">
                    <div class="input-group col-md-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <p class="mg-b-10">تاريخ الحجز</p>
                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                            </div>
                        </div>
                            <input class="form-control fc-datepicker"    value="{{$appointment->apt_date}}" name="apt_date" placeholder="MM/DD/YYYY" type="date">
                    </div>


                    <div class="input-group col-md-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <p class="mg-b-10">موعد الحجز</p>
                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                            </div>
                        </div><input class="form-control fc-datepicker"  value="{{$appointment->apt_time}}" name="apt_time" placeholder="00:00 type="time">
                    </div>
                    <div class="input-group col-md-4">
                        <div class="input-group-prepend">
                        <div class="input-group-text">
  <p class="mg-b-10">لموعد المؤكد</p>
  <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
  <input class="form-control fc-datepicker" name="remarks" placeholder="00:00" type="datetime-local" value="2023-02-23T12:00">
</div>

                        </div>
                        </div>


                                <div class="input-group col-md-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                رقم الجوال</div>

                        <input class="form-control" id="client_phone" value="{{ $appointment->client->client_phone }}"
                            aria-label="Phone Number" type="tel">
                    </div><!-- input-group -->
                </div>

                </div>


                <div class="row row-sm mg-b-20">
                    <div class="col-lg-4">
                        <p class="mg-b-10">حالة الحجز</p><select class="form-control select2-no-search"
                            value="{{ $appointment->status }}" name="status">
                            <option label="Choose one">
                                @if($appointment->status == 'pending')
                            <option value="pending" selected>Pending</option>
                            <option value="confirmed">confirmed</option>
                            <option value="confirmed">Complete</option>

                            <option value="cancelled">cancelled</option>
                            @elseif($appointment->status == 'confirmed')
                            <option value="pending">Pending</option>
                            <option value="confirmed" selected>confirmed</option>
                            <option value="confirmed">Complete</option>
                            <option value="cancelled">cancelled</option>
                            @elseif($appointment->status == 'complete')
                            <option value="pending">Pending</option>
                            <option value="confirmed">confirmed</option>
                            <option value="confirmed" selected>Complete</option>
                            <option value="cancelled">cancelled</option>
                            @else
                            <option value="pending">Pending</option>
                            <option value="confirmed">confirmed</option>
                            <option value="cancelled" selected>cancelled</option>
                            @endif
                        </select>
                    </div>


                    <div class="col-lg-4">
                        <p class="mg-b-10">إختر الدكتور</p><select class="form-control select2-no-search"
                            name="doctor_id" value="{{ $appointment->doctor_id }}">
                            <option label="Choose one">

                            <option value="{{$appointment->doctor->id}}" selected>{{$appointment->doctor->name }} </option>

                        </select>
                    </div>
                </div>

            <div class="row">

                <span>
                    <button class="btn btn-primary text-light"
                    type="submit">تحديث</button>
                </span>
            </div>
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
