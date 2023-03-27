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
    @error('field_name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

    <!-- row -->
    <div class="row">


        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('appointments.invoice') }}" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col">
            <label for="invoice_number" class="control-label">رقم الفاتورة</label>
            <input type="text" class="form-control @error('invoice_number') is-invalid @enderror" id="invoice_number" name="invoice_number" title="يرجي ادخال رقم الفاتورة" required value="{{ old('invoice_number') }}">
            @error('invoice_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col">
            <label for="invoice_date">تاريخ الفاتورة</label>
            <input class="form-control fc-datepicker @error('invoice_date') is-invalid @enderror" id="invoice_date" name="invoice_date" placeholder="YYYY-MM-DD" type="text" value="{{ old('invoice_date', date('Y-m-d')) }}" required>
            @error('invoice_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col">
            <label for="due_date">تاريخ الاستحقاق</label>
            <input class="form-control fc-datepicker @error('due_date') is-invalid @enderror" id="due_date" name="due_date" placeholder="YYYY-MM-DD" type="text" value="{{ old('due_date') }}" required>
            @error('due_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="client_name">Client Name</label>
                <input type="text" class="form-control" value="{{ $appointment->client->client_name }}" readonly>
                <input name="client_id" type="hidden" class="form-control @error('client_id') is-invalid @enderror" value="{{ $appointment->client_id }}" required>
                <input name="appointment_id" type="hidden" class="form-control @error('client_id') is-invalid @enderror" value="{{ $appointment->id }}" required>
                @error('client_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="section_name">Section Name</label>
                <input type="text" id="section_name" class="form-control" value="{{ $appointment->section->section_name }}" readonly>
                <input type="hidden" name="section_id" id="section_id" class="form-control @error('section_id') is-invalid @enderror" value="{{ $appointment->section_id }}" required>
                @error('section_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    @php
        $amountCollection = collect($appointment->services)->sum('price');
    @endphp

    <div class="form-group">
        <label for="services">Choose Services:</label>
        <select id="services" name="services[]" class="form-control @error('services') is-invalid @enderror" multiple required data-error="Please select at least one service">
            @foreach ($appointment->services as $service)

            <option value="{{ $service->id }}" @if(in_array($service->id, old('services', $appointment->services->pluck('id')->toArray()))) selected @endif>{{ $service->service_name }}</option>
@endforeach
</select>
@error('services')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>

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
        <input type="text" id="total" name="total" class="form-control" value="{{  $amountCollection }}" readonly>
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
</div>
<div class="col">
                            <label for="exampleTextarea">تفاصيل المرفقات</label>
                            <textarea class="form-control"  name="fileinfo" rows="1" ></textarea>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
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
    // Get the file input element
    var fileInput = document.querySelector('input[type=file]');

    // Get the file note input element
    var fileNoteInput = document.querySelector('textarea[name=fileinfo]');

    // Add an event listener to the file input element to check if a file is selected
    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            // File is selected, make the file note input required
            fileNoteInput.setAttribute('required', true);
        } else {
            // No file is selected, remove the required attribute from the file note input
            fileNoteInput.removeAttribute('required');
        }
    });
</script>

<script>
    var date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    }).val();
</script>

<script>



    $(document).ready(function () {
        // get the initial value of amountCollection
        var amountCollection = parseFloat($('#amount_collection').val());

      // listen for changes to the discount field
$('#discount').on('input', function () {
    var discount = parseFloat($(this).val());
    var newTotal = amountCollection + valueVat - discount;
    $('#total').val(newTotal.toFixed(2));
});

// listen for changes to the rate_vat field
$('#rate_vat').on('input', function () {
    var rateVat = parseFloat($(this).val());
    var valueVat = amountCollection * (rateVat / 100);
    $('#value_vat').val(valueVat.toFixed(2));
    var newTotal = amountCollection + valueVat - parseFloat($('#discount').val());
    $('#total').val(newTotal.toFixed(2));
});

// calculate the initial total
var valueVat = amountCollection * ($('#rate_vat').val() / 100);
var newTotal = amountCollection + valueVat - parseFloat($('#discount').val());
$('#value_vat').val(valueVat.toFixed(2));
$('#total').val(newTotal.toFixed(2));

    });
</script>


@endsection
