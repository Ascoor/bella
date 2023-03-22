@extends('layouts.master')
@section('css')
@endsection
@section('title')
    تغير حالة الدفع
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تغير حالة الدفع</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('status_update', ['id' => $invoice->id]) }}" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">إسم العميل</label>
                                 <input type="text" class="form-control" id="inputName"
                                    value="{{ $invoice->client->client_name }}" required
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">رقم الفاتورة</label>
                                <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                <input type="text" class="form-control" id="inputName"
                                    title="يرجي ادخال رقم الفاتورة" value="{{ $invoice->invoice_number }}" required
                                    readonly>
                            </div>

                            <div class="col">
                                <label>تاريخ الفاتورة</label>
                                <input class="form-control fc-datepicker"  placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $invoice->invoice_date }}" required readonly>
                            </div>

                            <div class="col">
                                <label>تاريخ الاستحقاق</label>
                                <input class="form-control fc-datepicker"  placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $invoice->due_date }}" required readonly>
                            </div>

                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">القسم</label>
                                <input class="form-control SlectBox" value="       {{ $invoice->section->section_name }}" readonly/>




                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">الخدمات</label>
                                <p id="services"  class="form-control" style="text-align:right;height:70px" readonly  >
                                @foreach ($invoice->services as $service )
                                    {{ $service->service_name }} :سعر الخدمة {{ $service->price }}
</br>
                                    @endforeach
                                </p>

                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">إجمالى المستحق</label>
                                <input type="text" class="form-control" id="inputName
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value="{{ $invoice->total }}" readonly>
                            </div>
                        </div>


                        {{-- 3 --}}

                        <div class="row">



                            <div class="col">
                                <label for="inputName" class="control-label">الخصم</label>
                                <input type="text" class="form-control form-control-lg" id="discount"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value="{{ $invoice->discount }}" required readonly>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">قيمة ضريبة القيمة المضافة</label>
                                <input type="text" class="form-control" id="value_vat"
                                    value="{{ $invoice->value_vat }}" readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">نسبة ضريبة القيمة المضافة</label>
                                <input  id="rate_vat" value="{{ $invoice->rate_vat }}%" class="form-control" onchange="myFunction()" readonly />

                            </div>
                        </div>

                        {{-- 4 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">الاجمالي شامل الضريبة</label>
                                <input type="text" class="form-control" id="total" name="total" readonly
                                    value="{{ $invoice->total }}">
                            </div>


                            <div class="col">
                                <label for="inputName" class="control-label">إجمالى المحصل </label>
                                <input type="text"  class="form-control form-control-lg"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                value="{{ $invoice->total_amount }}" required readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label" >المطلوب سداده </label>
                                <input type="text"  class="form-control form-control-lg" style="background-color:#f8e4e4"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value="{{ $invoice->total - $invoice->total_amount }}" required readonly>
                            </div>
                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3" readonly>
                                {{ $invoice->note }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">حالة الدفع</label>
                                <input class="form-control" id="exampleTextarea" value=" {{ $invoice->status }}" rows="3" readonly>

                            </div>
                        </div>
                        <br>
                        <div class="row">
  <div class="col">
    <div class="form-group">
      <label for="amount_total">المبلغ المسدد</label>
      <input type="number" name="payment_amount" step="0.01" class="form-control" required>

    </div>
  </div>

  <div class="col">
    <div class="form-group">
      <label for="payment_date">تاريخ الدفع</label>
      <input class="form-control fc-datepicker" name="payment_date" placeholder="YYYY-MM-DD" type="text" required>
    </div>
  </div>
</div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">تحديث حالة الدفع</button>
                        </div>

                    </form>
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
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>
@endsection
