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
    تعديل فاتورة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل فاتورة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
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

                <form action="{{ route('invoices.update', $invoice->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    @method('PUT')
    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
    {{-- 1 --}}
    <div class="row">
        <div class="col">

            <label for="inputName" class="control-label">رقم الفاتورة</label>
            <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
            <input type="text" class="form-control" id="inputName" name="invoice_number" title="يرجي ادخال رقم الفاتورة" value="{{ $invoice->invoice_number }}" required>

        </div>

        <div class="col">
            <label>تاريخ الفاتورة</label>
            <input class="form-control fc-datepicker" name="invoice_date" placeholder="YYYY-MM-DD" type="text" value="{{ $invoice->invoice_date }}" required>
        </div>

        <div class="col">
            <label>تاريخ الاستحقاق</label>
            <input class="form-control fc-datepicker" name="due_date" placeholder="YYYY-MM-DD" type="text" value="{{ $invoice->due_date }}" required>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="client" class="control-label">Choose client:</label>
            <select id="client_id" name="client_id">
                <option value="">Choose</option>
                @foreach ($clients as $client)
                <option value="{{ $client->id }}" @if ($client->id == $invoice->client_id) selected @endif>{{ $client->client_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- 2 --}}
    <div class="row">
        <div class="col">
            <label for="section" class="control-label">Choose Section:</label>
            <select id="section" name="section_id">
                <option value="">Choose</option>
                @foreach ($sections as $section)
                <option value="{{ $section->id }}" @if ($section->id == $invoice->section_id) selected @endif>{{ $section->section_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="services" class="control-label">Choose Services:</label>
            <div id="services">
                @foreach ($invoice->services as $service)
                <div><input type="checkbox" name ="services[]" class="service-checkbox" value="{{ $service->id }}" @if (in_array($service->id, $invoice->services->pluck('id')->toArray())) checked @endif>{{ $service->service_name }}</div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
  <div class="col">
    <label for="amount_collection" class="control-label">Amount Collection:</label>
    <input type="text" id="amount_collection" name="amount_collection" class="form-control" value="{{$invoice->amount_collection}}" readonly>
  </div>
  <div class="col">
    <label for="discount" class="control-label">Discount:</label>
    <input type="text" id="discount" name="discount" class="form-control"  value="{{$invoice->discount}}">
  </div>
  <div class="col">
    <label for="rate_vat" class="control-label">Rate VAT:</label>
    <select id="rate_vat" name="rate_vat" class="form-control" value="{{$invoice->rate_vat}}">
      <option value="0">0%</option>
      <option value="5">5%</option>
      <option value="10">10%</option>
    </select>
  </div>
</div>
  <div class="row mt-4">
  <div class="col">
                                <label for="inputName" class="control-label">قيمة ضريبة القيمة المضافة</label>
                                <input type="text" class="form-control" id="value_vat" name="value_vat"   value="{{$invoice->value_vat}}" readonly>
                            </div>
  <div class="col">
    <label for="total" class="control-label">Total:</label>
    <input type="text" id="total" name="total" class="form-control"  value="{{$invoice->total}}" readonly>
  </div>
</div>


<div class="row">
                        <div class="col">
                            <label for="exampleTextarea">ملاحظات</label>
                            <textarea class="form-control" id="exampleTextarea" value="{{$invoice->note}}" name="note" rows="3"></textarea>
                        </div>
                    </div><br>

                    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                    <h5 class="card-title">المرفقات</h5>

                    <div class="col-sm-12 col-md-12">
                        <input type="file" name="attached_files[]" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                    </div><br>
                    <div class="col">
                            <label for="exampleTextarea">تفاصيل المرفقات</label>
                            <textarea class="form-control" id="exampleTextarea" name="fileinfo" rows="1"></textarea>
                        </div>
                    </div><br>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                    </div>


                </form>
                </div>
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
  const totalAmountInput = document.getElementById('total_amount');
  const amountCollectionInput = document.getElementById('amount_collection');
  const remainingBalanceInput = document.getElementById('remaining_balance');

  function updateRemainingBalance() {
    const totalAmount = parseFloat(totalAmountInput.value);
    const amountCollected = parseFloat(amountCollectionInput.value);
    const remainingBalance = totalAmount - amountCollected;
    remainingBalanceInput.value = isNaN(remainingBalance) ? '' : remainingBalance.toFixed(2);
  }

  totalAmountInput.addEventListener('input', updateRemainingBalance);
  amountCollectionInput.addEventListener('input', updateRemainingBalance);
</script>


@endsection
