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
                            <label for="client" class="control-label">Choose client:</label>
                            <select id="client_id" name="client_id">
                                <option value="">Choose</option>
                                @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br/>
                    {{-- 2 --}}
                    <div class="row">
  <div class="col">
    <label for="section" class="control-label">Choose Section:</label>
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
    <label for="services" class="control-label">Choose Services:</label>
    <div id="services">

    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <label for="amount_collection" class="control-label">Amount Collection:</label>
    <input type="text" id="amount_collection" name="amount_collection" class="form-control" value="0.00" readonly>
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
                                <input type="text" class="form-control" id="value_vat" name="value_vat"  value="0.00" readonly>
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
                        <input type="file" name="attached_files[]" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                    </div><br>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
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
$(document).ready(function() {
  // On section change
  $("#section").on("change", function() {
    var sectionId = $(this).val();
    if (sectionId) {
      $.ajax({
        url: "{{ URL::to('section/services') }}/" + sectionId,
        type: "GET",
        dataType: "json",
        success: function(data) {
          $("#services").empty();
          $.each(data, function(key, value) {
            $("#services").append('<div><input type="checkbox" name ="services[]" class="service-checkbox" value="' + value.id + '" data-price="' + value.price + '">' + value.service_name + ' - $' + value.price + '</div>');
          });
        },
      });
    } else {
      $("#services").empty();
    }
  });

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

  // Update amount collection based on selected services
  function updateAmountCollection() {
  var selectedServices = $(".service-checkbox:checked");
  var total = 0;
  selectedServices.each(function() {
    total += parseFloat($(this).data("price"));
  });

  var discountValue = parseFloat($("#discount").val()) || 0;
  var vatRate = parseFloat($("#rate_vat").val()) || 0;
  var vatValue = (total * (vatRate/100));
  var totalAmount = total - discountValue + vatValue;

  $("#value_vat").val(vatValue.toFixed(2));
  $("#amount_collection").val((total + vatValue).toFixed(2));
  $("#total").val(totalAmount.toFixed(2));
}
var amountCollection = total + vatValue;
var vatAmount = (amountCollection * (vatRate/100));
$("#amount_collection").val((amountCollection + vatAmount).toFixed(2));

  // On click of add service button
  $("#add-service-btn").on("click", function() {
    var selectedServices = $(".service-checkbox:checked");
    selectedServices.each(function() {
      var serviceId = $(this).val();
      var serviceName = $(this).parent().text().trim();
      var servicePrice = parseFloat($(this).data("price"));
      var listItem = '<li data-price="' + servicePrice + '">' + serviceName + '<button type="button" class="remove-service-btn btn btn-danger btn-sm ml-3">Remove</button></li>';
      $("#selectedServices").append(listItem);
    });

    // Update amount collection after adding new services
    updateAmountCollection();
  });

  // On click of selected services
  if ($("#selectedServices").length) {
    $("#selectedServices").on("click", "li", function() {
      $(this).toggleClass("active");
      updateAmountCollection();
    });

    // On click of selected services remove button
    $("#selectedServices").on("click", ".remove-service-btn", function() {
      var servicePrice = parseFloat($(this).parent().data("price"));
      var total = parseFloat($("#amount_collection").val());
      total -= servicePrice;
      $(this).parent().remove();
      $("#amount_collection").val(total.toFixed(2));
      updateAmountCollection();
    });
  }
});
</script>


@endsection
