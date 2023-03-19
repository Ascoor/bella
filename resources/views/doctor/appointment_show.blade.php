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
<div class="row vh-100 p-4 justify-content-center align-items-center">
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
            <input class="form-control mb-3" readonly placeholder="{{ $appointment->client->client_name }}" type="text">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">رقم الجوال</label>
            <input class="form-control mb-3" readonly placeholder="{{ $appointment->client->client_phone }}" type="text">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">الطبيب</label>
            <input class="form-control mb-3" readonly placeholder="{{ $appointment->doctor->name }}" type="text">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">العنوان</label>
            <input class="form-control mb-3" readonly placeholder="{{ $appointment->client->adress }}" type="text">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">البريد الإلكترونى للعميل</label>
            <input class="form-control mb-3" readonly placeholder="{{ $appointment->client->email }}" type="text">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">تاريخ وموعد الحجز</label>
            <input class="form-control mb-3" readonly placeholder="{{ $appointment->apt_datetime }}" type="text">
          </div>
          <div class="form-group">
            <p class="mb-2">حالة الحجز</p>
            <input class="form-control mb-3" readonly placeholder="{{ $appointment->status }}" type="text">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">تأكيد الحجز</label>
            <input class="form-control mb-3" readonly placeholder="{{ $appointment->remarks }}" type="text">
          </div>
          @if ($appointment->status == 'processing')
  <form method="POST" action="{{ route('doctor.appointment.update', $appointment->id) }}">
    @csrf
    @method('POST')

    <div class="mb-3">
      <label class="form-label">Services</label>
      @foreach ($services as $service)
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}" id="service_{{ $service->id }}" {{ $appointment->services->contains($service) ? 'checked' : '' }}>
        <label class="form-check-label" for="service_{{ $service->id }}">{{ $service->service_name }}</label>
      </div>
      @endforeach
    </div>

    <!-- Add your form fields here -->

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endif


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
