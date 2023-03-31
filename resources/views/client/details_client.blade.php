@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل فاتورة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
              <a href="/invoices">  <h4  class="content-title mb-0 my-auto">قائمة الفواتير</h4></a><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الفاتورة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">فواتير العميل</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">حجوزات العميل </a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات الخاصة بالعميل</a></li>
                                            <li><a href="#tab7" class="nav-link" data-toggle="tab">الأطباء المعالجين للعميل</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">


                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                            <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">

      <thead>
        <tr>
          <th>#</th>
          <th>رقم الفاتورة</th>
          <th>القسم</th>
          <th>قيمة الفاتورة</th>
          <th>الخدمات المقدمة</th>
          <th>حالة الدفع</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        @php
                                $i = 0;
                                @endphp
                                @foreach ($client->invoices as $invoice)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $invoice->invoice_number }}</td>

                                        <td>{{ $invoice->section->section_name }}</td>
                    <td>{{ $invoice->total }}</td>

                    <td>@foreach ($invoice->services as $service )
                                            <br/>
                                            {{$service->service_name}}
                                            {{$service->price}}
                                            <br/>
                                        @endforeach</td>
                    <td>{{ $invoice->status }}</td>



                                                        @endforeach
        </tr>
      </tbody>
    </table>

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab5">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                        <tr class="text-dark text-lg-center bg-warning">
                                                            <th>#</th>
                                                            <th class="border-bottom-0">رقم الفاتورة</th>
                                    <th class="border-bottom-0">تاريخ الحجز المنفذ </th>


                                    <th class="border-bottom-0"> القسم </th>



                                    <th class="border-bottom-0">الدكتور</th>

                                    <th class="border-bottom-0">الحالة</th>

                                                        </tr>
                                                    </thead>


                                                             <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($client->appointments as $appointment)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $appointment->invoice->invoice_number }}</td>
                                        <td>{{ $appointment->remarks }}</td>

                                        <td>{{ $appointment->section->section_name }}</td>

                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->status }}</td>


                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>


                                        <div class="tab-pane" id="tab6">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">

                                                    <div class="card-body">

                                                            <div class="col">
                            <label for="exampleTextarea">تفاصيل المرفقات</label>

                            <textarea class="form-control"  name="fileinfo" rows="1" ></textarea>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">

                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                name="uploadedFile">إضافة</button>
                                                        </form>
                                                    </div>
                                                    <br/>


                                                <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table table-hover" style="text-align:center">
    <thead class="bg-light text-bg-dark text-lg-center">
        <tr class="text-dark">
            <th scope="col">Invoice Number</th>
            <th scope="col">File Name</th>
            <th scope="col">File Info</th>
            <th scope="col">Added By</th>
            <th scope="col">Upload Date</th>
            <th scope="col">View</th>
            <th scope="col">Download</th>
        </tr>
    </thead>
    <tbody>
        @foreach($client->invoices as $invoice)
            @foreach($invoice->attachments as $attachment)
                <tr>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $attachment->filename }}</td>
                    <td>{{ $attachment->fileinfo }}</td>
                    <td>{{ $attachment->user->name }}</td>
                    <td>{{ $attachment->created_at }}</td>
                    <td><a href="#" class="view-attachment" data-filename="{{ $attachment->filename }}" data-invoice-id="{{ $invoice->id }}">View</a></td>
                    <td><a href="{{ route('download.attachment', ['filename' => $attachment->filename, 'invoice_number' => $invoice->invoice_number]) }}">Download</a></td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                        <div class="tab-pane" id="tab7">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">

                                                    <div class="card-body">

                                                            <div class="col">
                            <label for="exampleTextarea">تفاصيل الأطباء</label>

                            <textarea class="form-control"  name="fileinfo" rows="1" ></textarea>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">

                                                    <br/>


                                                <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table table-hover" style="text-align:center">
    <thead class="bg-light text-bg-dark text-lg-center">
        <tr class="text-dark">
            <th scope="col">#</th>
            <th scope="col">إسم الطبيب</th>
            <th scope="col">الحجز</th>
            <th scope="col">تاريخ الكشف</th>

        </tr>
    </thead>
    <tbody>
        @foreach($client->appointments as $x)

                <tr>
                    <td>{{ $x->id }}</td>
                    <td>{{ $x->doctor->name }}</td>
                    <td>{{ $x->remarks }}</td>

                </tr>
            @endforeach

    </tbody>
</table>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->



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
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>


    <script>
    $(document).ready(function() {
        $('.view-attachment').on('click', function(e) {
            e.preventDefault();

            var filename = $(this).data('filename');
            var invoiceId = $(this).data('invoice-id');

            $.ajax({
                url: '{{ route("view.attachment", ["invoice_number" => $invoice->invoice_number, "filename" => ":filename", "id" => ":invoiceId"]) }}'.replace(':filename', filename).replace(':invoiceId', invoiceId),
                type: 'GET',
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(response) {
                    var fileURL = URL.createObjectURL(response);
                    window.open(fileURL, '_blank');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Log any error messages to the console
                }
            });
        });
    });
</script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection
