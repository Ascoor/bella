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
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات
                                                    الفاتورة</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">حالات الدفع</a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">


                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>


                               <th >إسم العميل</th>


                                                    <tr style="background-color: #f1fdee;">
                                 <td style="width: 300px;">{{ $invoice->client->client_name }}</td>
                                                    </tr>
                                                    </tbody>
                                                    <tbody>
                                                            <tr>
                                                            <th scope="row">رقم الفاتورة</th>
                                                            <th scope="row">تاريخ الاصدار</th>
                                                            <th scope="row">تاريخ الاستحقاق</th>
                                                            <th scope="row">القسم</th>
                                                            <th scope="row">الخدمات</th>
                                                            <th scope="row">قيمة الخدمات قبل الخصم والضريبة</th>

                                                            <th scope="row">الخصم</th>
                                                        </tr>
                                                        <tr style="background-color: #f1fdee;">
                                                            <td>{{ $invoice->invoice_number }}</td>
                                                            <td>{{ $invoice->invoice_date }}</td>
                                                            <td>{{ $invoice->due_date }}</td>
                                                            <td>{{ $invoice->Section->section_name }}</td>

                                                            <td>@foreach ($invoice->services as $service )
                                            <br/>
                                            {{$service->service_name}}

                                            <br/>
                                        @endforeach</td>
                                                            <td>{{ $invoice->amount_collection }}</td>

                                                            <td>{{ $invoice->discount }}</td>
                                                        </tr>


                                                        <tr >

                                                            <th scope="row">الاجمالي بعد الخصم</th>
                                                            <th scope="row">نسبة الضريبة</th>
                                                            <th scope="row">قيمة الضريبة</th>
                                                            <th scope="row">الاجمالي المطلوب سداده شامل الضريبة</th>

                                                            <th scope="row">ما تم سداده</th>
                                                            <th scope="row">المبلغ المتبقي</th>

                                                            <th scope="row">حالة السداد </th>
                                                        </tr>
                                                        <tr style="background-color: #f1fdee;">
                                                            <td>{{ $invoice->amount_collection - $invoice->discount }}</td>
                                                            <td>{{ $invoice->rate_vat }}%</td>
                                                            <td>{{ $invoice->value_vat }}</td>
                                                            <td>{{ $invoice->total }}</td>
                                                            <td>{{ $invoice->total_amount }}</td>
                                                            <td >{{ $invoice->total - $invoice->total_amount }}</td>
                                                            @if ($invoice->value_status == 1)
                                                                <td><span
                                                                        class="badge badge-pill badge-success">{{ $invoice->status }}</span>
                                                                </td>
                                                            @elseif($invoice->value_status ==2)
                                                                <td><span
                                                                        class="badge badge-pill badge-danger">{{ $invoice->status }}</span>
                                                                </td>
                                                            @else
                                                                <td><span
                                                                        class="badge badge-pill badge-warning">{{ $invoice->status }}</span>
                                                                </td>
                                                            @endif
                                                        </tr>
<tr>

    <th scope="row">ملاحظات</th>

                                                            <td><textarea style="background-color: #f1fdee;width:fit-content"readonly rows="2" >{{ $invoice->note }}</textarea></td>
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
                                    <th class="border-bottom-0">تاريخ السداد </th>


                                    <th class="border-bottom-0"> القيمة المسدده</th>



                                    <th class="border-bottom-0">المحصل</th>
                                    <th class="border-bottom-0">وقت التحصيل</th>
                                    <th class="border-bottom-0">الحالة</th>

                                                        </tr>
                                                    </thead>


                                                             <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($details as $x)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $x->invoice->invoice_number }}</td>

                                        <td>{{ $x->payment_date }}</td>
                    <td>{{ $x->payment_amount }}</td>


                    <td>{{ $x->user->name }}</td>
                                                                <td>{{ $x->created_at }}</td>

                                                                @if ($x->value_status == 1)
                                                                    <td><span
                                                                            class="badge badge-pill badge-success">{{ $x->status }}</span>
                                                                    </td>
                                                                @elseif($x->value_status ==2)
                                                                    <td><span
                                                                            class="badge badge-pill badge-danger">{{ $x->status }}</span>
                                                                    </td>
                                                                @else
                                                                    <td><span
                                                                            class="badge badge-pill badge-warning">{{ $x->status }}</span>
                                                                    </td>
                                                                @endif

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <a class="btn btn-success"
                                                            href="{{ URL::route('status_show', [$invoice->id]) }}">

                                                            سداد الفاتورة </a>


                                            </div>
                                        </div>


                                        <div class="tab-pane" id="tab6">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">

                                                    <div class="card-body">
                                                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                        <h5 class="card-title">اضافة مرفقات</h5>
                                                        <form method="post" action="{{ url('/invoices/add-attachments') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                    name="filename" required>
                                                                <input type="hidden" id="customFile" name="invoice_number"
                                                                    value="{{ $invoice->invoice_number }}">
                                                                <input type="hidden" id="invoiceId" name="invoice_id"
                                                                    value="{{ $invoice->id }}">
                                                                <label class="custom-file-label" for="customFile">حدد
                                                                    المرفق</label>
                                                            </div><br>
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
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead class="bg-light text-bg-dark text-lg-center">
                                                            <tr class="text-dark">


                                                                <th scope="col">اسم الملف </th>
                                                                <th scope="col">بيان الملف </th>
                                                                <th scope="col">القائم بالاضافة</th>
                                                                <th scope="col">تاريخ الاضافة</th>
                                                                <th scope="col">مشاهدة</th>
                                                                <th scope="col">تحميل</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
            @foreach($attachments as $attachment)
                <tr>

                    <td>{{ $attachment->filename }}</td>
                    <td>{{ $attachment->fileinfo }}</td>
                    <td>{{ $attachment->user->name }}</td>
                    <td>{{ $attachment->created_at }}</td>
                    <td><a href="#" class="view-attachment" data-filename="{{ $attachment->filename }}" data-invoice-id="{{ $invoice->id }}">View</a></td>
                    <td><a href="{{ route('download.attachment', ['filename' => $attachment->filename, 'invoice_number' => $invoice->invoice_number]) }}">Download</a></td>

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



    <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                        </p>

                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="invoice_number" id="invoice_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })

    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection
