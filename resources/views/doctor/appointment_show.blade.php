@extends('layouts.app')
@section('css')
<!-- Internal Select2 css -->

@endsection
@section('page-header')
<!-- breadcrumb -->
				<!-- row -->

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
<div class="row h-100 p-8 justify-content-center align-items-center">
<div class="col-sm-8 col-md-6 col-lg-5">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">بيانات حجز</h5>

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
href="/doctor/appointments">عودة للحجوزات</a>

</span>
        </div>
        <!-- row closed -->
    </div>
    <!-- Container closed -->
</div>
</div>
                </div>

<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->

@endsection
