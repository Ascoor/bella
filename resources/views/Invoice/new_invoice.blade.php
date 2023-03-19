@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}"
    rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}"
    rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}"
    rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet"
    href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet"
    href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
اضافة فاتورة
@stop

    @section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة فاتورة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    @endsection
    @section('content')

    @if(session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('invoices.store') }}" method="post"
                        enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">رقم الفاتورة</label>
                                <input type="text" class="form-control" id="inputName" name="invoice_number"
                                    title="يرجي ادخال رقم الفاتورة" required>
                            </div>

                            <div class="col">
                                <label>تاريخ الفاتورة</label>
                                <input class="form-control fc-datepicker" name="invoice_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col">
                                <label>تاريخ الفاتورة</label>
                                <input class="form-control fc-datepicker" name="due_date" placeholder="YYYY-MM-DD"
                                    type="text" required> </div>



                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="client_name">Client Name</label>
                                    <input type="text" class="form-control"
                                        value="{{ $appointment->client->client_name }}" readonly>
                                    <input name="client_id" type="hidden" class="form-control"
                                        value="{{ $appointment->client_id }}">
                                </div>
                            </div>
                        </div>
                        <br />
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="section_name">Section Name</label>
                                    <input type="text" id="section_name" class="form-control"
                                        value="{{ $appointment->section->section_name }}" readonly>
                                    <input type="hidden" name="section_id" id="section_id" class="form-control"
                                        value="{{ $appointment->section_id }}">
                                </div>
                            </div>
                        </div>@php
                        $amountCollection = collect($appointment->services)->sum('price');
@endphp

<div class="row">
    <div class="col">
        <label for="services" class="control-label">Choose Services:</label>
        <div id="services">

        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label for="amount_collection" class="control-label">Amount Collection:</label>
        <input type="text" id="amount_collection" name="amount_collection" class="form-control"
            value="{{ $amountCollection }}" readonly>
    </div>

    <div class="col">
        <label for="discount" class="control-label">Discount:</label>
        <input type="text" id="discount" name="discount" class="form-control" value="0.00">
    </div>
    <div class="col">
        <label for="rate_vat" class="control-label">Rate VAT:</label>
        <select id="rate_vat" name="rate_vat" class="form-control" value="0.00">
            <option value="0">0%</option>
            <option value="5">5%</option>
            <option value="10">10%</option>
        </select>
    </div>
</div>
<div class="row mt-4">
    <div class="col">
        <label for="inputName" class="control-label">قيمة ضريبة القيمة المضافة</label>
        <input type="text" class="form-control" id="value_vat" name="value_vat" value="0.00" readonly>
    </div>
    <div class="col">
        <label for="total" class="control-label">Total:</label>
        <input type="text" id="total" name="total" class="form-control" value="0.00" readonly>
    </div>
</div>


{{-- 5 --}}
<div class="row">
    <div class="col">
        <label for="exampleTextarea">ملاحظات</label>
        <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
    </div>
</div><br>

<p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
<h5 class="card-title">المرفقات</h5>

<div class="col-sm-12 col-md-12">
    <input type="file" name="attached_files[]" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
        data-height="70" />
</div><br>

<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">حفظ البيانات</button>
</div>


</form>
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
<!--Internal Fileuploads js-->
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
<!--Internal Fancy uploader js-->
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}">
</script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}">
</script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
<!--Internal  Form-elements js-->
<script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2.js') }}"></script>
<!--Internal Sumoselect js-->
<script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
<!--Internal  Datepicker js -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}">
</script>
<!--Internal  jquery.maskedinput js -->
<script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}">
</script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
<!-- Internal form-elements js -->
<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

<script>
    var date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    }).val();
</script>

<script>
    $("#section").on("change", function () {
        var sectionId = $("#section_id").val();
        if (sectionId) {
            $.ajax({
                url: "{{ URL::to('section/services') }}/" + sectionId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#services").empty();
                    $.each(data, function (key, value) {
                        $("#services").append(
                            '<div><input type="checkbox" name ="services[]" class="service-checkbox" value="' +
                            value.id + '" data-price="' + value.price + '">' + value
                            .service_name + ' - $' + value.price + '</div>');
                    });
                },
            });
        } else {
            $("#services").empty();
        }
    });


    $(document).ready(function () {
        // get the initial value of amountCollection
        var amountCollection = parseFloat($('#amount_collection').val());

        // listen for changes to the discount field
        $('#discount').on('change', function () {
            var discount = parseFloat($(this).val());
            var newTotal = amountCollection - discount;
            $('#total').val(newTotal.toFixed(2));
        });

        // listen for changes to the rate_vat field
        $('#rate_vat').on('change', function () {
            var rateVat = parseFloat($(this).val());
            var valueVat = amountCollection * (rateVat / 100);
            $('#value_vat').val(valueVat.toFixed(2));
            var newTotal = amountCollection + valueVat;
            $('#total').val(newTotal.toFixed(2));
        });
    });
</script>


@endsection
