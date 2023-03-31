@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
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

@if (session()->has('Add'))
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
                <form action="{{ route('invoices.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}
                    {{-- 1 --}}

                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label">رقم الفاتورة</label>
                            <input type="text" class="form-control" id="inputName" name="invoice_number" title="يرجي ادخال رقم الفاتورة" required>
                        </div>

                        <div class="col">
                            <label>تاريخ الفاتورة</label>
                            <input class="form-control fc-datepicker" name="invoice_date" placeholder="YYYY-MM-DD" type="text" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col">
                            <label>تاريخ الفاتورة</label>
                            <input class="form-control fc-datepicker" name="due_date" placeholder="YYYY-MM-DD"
                                    type="text" required>        </div>



                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="client" class="control-label">حدد العميل</label>
                            <select id="client_id" name="client_id">
                                <option value="">Choose</option>
                                @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
  <div class="col">
    <label for="section" class="control-label">إختيار القسم</label>
    <select id="section" name="section_id">
      <option value="">Choose</option>
      @foreach ($sections as $section)
      <option value="{{ $section->id }}">{{ $section->section_name }}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="row">
  <div class="col">
    <label for="services" class="control-label">حدد الخدمات</label>
    <div name="services[]" id="services">

    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <label for="amount_collection" class="control-label">قيمة الخدمات</label>
    <input type="text" id="amount_collection" name="amount_collection" class="form-control" value="0.00" readonly>
  </div>
  <div class="col">
    <label for="discount" class="control-label">الخضم</label>
    <input type="text" id="discount" name="discount" class="form-control" value="0.00">
  </div>
  <div class="col">
    <label for="rate_vat" class="control-label">نسبة الضريبة</label>
    <select id="rate_vat" name="rate_vat" class="form-control" value="0">
      <option value="0">0%</option>
      <option value="5">5%</option>
      <option value="10">10%</option>
    </select>
  </div>
</div>
  <div class="row mt-4">
  <div class="col">
                                <label for="inputName" class="control-label">قيمة ضريبة القيمة المضافة</label>
                                <input type="text" class="form-control" id="value_vat" name="value_vat"  value="0.00" readonly>
                            </div>
  <div class="col">
    <label for="total" class="control-label">الإجمالي</label>
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
                        <input type="file" name="attached_files[]" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                    </div><br>
                    <div class="col">
                            <label for="exampleTextarea">تفاصيل المرفقات</label>
                            <textarea class="form-control"  name="fileinfo" rows="1" ></textarea>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>




@endsection
@section('js')

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

<!-- Internal Select2 js-->

<!--Internal Fileuploads js-->
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
<!--Internal Fancy uploader js-->
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
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

<script>
$("#section").on("change", function() {
  var sectionId = $(this).val();
  if (sectionId) {
    $.ajax({
      url: "{{ URL::to('section/services') }}/" + sectionId,
      type: "GET",
      dataType: "json",
      success: function(response) {
        $("#services").empty();
        $("#doctors").remove(); // Remove previous doctors select element
        $.each(response.services, function(key, value) {
            $("#services").append('<div><input type="checkbox" name="services[]" class="service-checkbox" value="' + value.id + '" data-price="' + value.price + '">' + value.service_name + ' - $' + value.price + '</div>');

        });

      },
    });
  } else {
    $("#services").empty();
    $("#doctors").remove();
  }



  // On click of service checkbox
  $(document).on("click", ".service-checkbox", function() {
    updateAmountCollection();
  });

  // On change of discount input
  $("#discount").on("input", function() {
    updateAmountCollection();
  });

  // On change of rate VAT input
  $("#rate_vat").on("change", function() {
    updateAmountCollection();
  });
  function updateAmountCollection() {
  var selectedServices = $(".service-checkbox:checked");
  var genTotal = 0;
  selectedServices.each(function() {
    genTotal += parseFloat($(this).data("price"));
  });

  var discountValue = parseFloat($("#discount").val()) || 0;
  var vatRate = parseFloat($("#rate_vat").val()) || 0;
  var vatValue = ((genTotal ) * (vatRate/100));
  var tempTotal = (genTotal - discountValue) + vatValue;

  var amountCollection = genTotal.toFixed(2);
  var ratePercentage = 0;
  if(amountCollection > 0) {
    ratePercentage = ((tempTotal - amountCollection) / amountCollection) * 100;
  }
  var valueRate = ratePercentage.toFixed(2);
  var total = tempTotal.toFixed(2);

  $("#value_vat").val(vatValue.toFixed(2));
  $("#amount_collection").val(amountCollection);
  $("#value_rate").val(valueRate);
  $("#total").val(total);
}

});

</script>

@endsection
