@extends('layouts.app')
@section('css')
@endsection
@section('page-header')

@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#tabContent1" role="tab"
                            aria-controls="tabContent1" aria-selected="true">التفاصيل العامة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#tabContent2" role="tab"
                            aria-controls="tabContent2" aria-selected="false">المواعيد</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#tabContent3" role="tab" aria-controls="tabContent3" aria-selected="false">الأشعة والتحاليل</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab4" data-bs-toggle="tab" href="#tabContent4" role="tab" aria-controls="tabContent4" aria-selected="false">الأدوية والتحاليل</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab5" data-bs-toggle="tab" href="#tabContent5" role="tab" aria-controls="tabContent5" aria-selected="false">التقارير الطبية</a>
                </li> -->
                    <li class="nav-item">
                        <a class="nav-link" id="tab6" data-bs-toggle="tab" href="#tabContent6" role="tab"
                            aria-controls="tabContent6" aria-selected="false">المرفقات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab7" data-bs-toggle="tab" href="#tabContent7" role="tab"
                            aria-controls="tabContent7" aria-selected="false">الأطباء</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabContent1" role="tabpanel" aria-labelledby="tab1">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>بيانات العميل:</h4>
                                <hr>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><strong>اسم العميل:</strong></td>
                                            <td>{{ $client->client_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>رقم الهوية:</strong></td>
                                            <td>{{ $client->pid }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>تاريخ الميلاد:</strong></td>
                                            <td>{{ $client->birthdate }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>الجنس:</strong></td>
                                            <td>{{ $client->gender }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>بيانات التواصل:</h4>
                                <hr>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><strong>رقم الهاتف:</strong></td>
                                            <td>{{ $client->client_phone }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>البريد الإلكتروني:</strong></td>
                                            <td>{{ $client->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>العنوان:</strong></td>
                                            <td>{{ $client->address }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>المدينة:</strong></td>
                                            <td>{{ $client->city }}</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                <div class="tab-content">
                    <div class="tab-pane fade" id="tabContent2" role="tabpanel" aria-labelledby="tab2">
                        <h3>مواعيد الزيارات</h3>
                        <p>يمكنك هنا عرض جدول المواعيد للمريض في هذا القسم.</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>رقم الفاتورة</th>
                                    <th>القسم</th>
                                    <th>قيمة الفاتورة</th>
                                    <th>الخدمات المقدمه</th>
                                    <th>حالة الدفع</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($client->invoices as $invoice)
                                        @php
                                            $i++
                                        @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $invoice->invoice_number }}</td>

                                    <td>{{ $invoice->section->section_name }}</td>
                                    <td>{{ $invoice->total }}</td>

                                    <td>@foreach ($invoice->services as $service )
                                        <br />
                                        {{ $service->service_name }}
                                        {{ $service->price }}
                                        <br />
                                        @endforeach</td>
                                    <td>{{ $invoice->status }}</td>



                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <!-- <div class="tab-pane fade" id="tabContent3" role="tabpanel" aria-labelledby="tab3">
    <h3>الأشعة والتحاليل</h3>
    <p>Here you can add information related to radiology and analysis appointments or test results. You can also include any relevant images or documents.</p>
</div>
    <div class="tab-pane fade" id="tabContent4" role="tabpanel" aria-labelledby="tab4">


                </div>
                <div class="tab-pane fade" id="tabContent5" role="tabpanel" aria-labelledby="tab5">
  <h3>التقارير الطبية</h3>
  <p>هذا المحتوى يتعلق بالتقارير الطبية.</p>
  Add your content for tab 5 here
</div> -->
                </div>
            </div>

                <div class="tab-content">
                    <div class="tab-pane fade" id="tabContent6" role="tabpanel" aria-labelledby="tab6">
                        <div class="card-body">
                            <h5 class="card-title">المرفقات</h5>
                            <div class="row">
                                    <br>
                                    <div class="d-flex justify-content-center">

                                        <br />




                                        <div class="table-responsive mt-15">
                                            <table class="table center-aligned-table mb-0 table table-hover"
                                                style="text-align:center">
                                                <thead class="bg-light text-bg-dark text-lg-center">
                                                    <tr class="text-dark">
                                                        <th scope="col">رقم الفاتورة</th>
                                                        <th scope="col">اسم الملف</th>
                                                        <th scope="col">تفاصيل الملف</th>
                                                        <th scope="col">مضاف بواسطة</th>
                                                        <th scope="col">تاريخ الإضافة</th>
                                                        <th scope="col">مشاهدة</th>
                                                        <th scope="col">تحميل</th>
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
                                                                <td><a href="#" class="view-attachment"
                                                                        data-filename="{{ $attachment->filename }}"
                                                                        data-invoice-id="{{ $invoice->id }}">View</a>
                                                                </td>
                                                                <td><a
                                                                        href="{{ route('download.attachment', ['filename' => $attachment->filename, 'invoice_number' => $invoice->invoice_number]) }}">Download</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


        <div class="tab-content">
        <div class="tab-pane fade" id="tabContent7" role="tabpane7" aria-labelledby="tab7">
                <div class="row">
                    <div class="col">
                        <h3 class="text-center">تعليقات الأطباء</h3>
                        <br>
                        <div class="table-responsive">
                        <table class="table table-hover text-center">
    <thead class="table-light">
        <tr>
            <th scope="col">الطبيب</th>
            <th scope="col">التعليق</th>
            <th scope="col">الردود</th>
        </tr>
    </thead>
    <tbody>
    @foreach($client->comments as $comment)
        <tr>
            <td>{{ $comment->doctor->name }}</td>
            <td>{{ $comment->comment_text }}</td>
            <td>
                <ul>
                @foreach ($comment->replies as $reply)
    <li>
        <span style="color: blue;">{{ $reply->doctor->name }}</span> - {{ $reply->comment_text }}
    </li>
@endforeach

                </ul>
                <form method="POST" action="{{ route('comments.reply', $comment->id) }}">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ Auth::guard('doctor')->user()->id }}">
                    <div class="form-group">
                        <textarea class="form-control mb-3" name="comment_text" rows="3" placeholder="Add a reply"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

                        </div>
                        <form method="POST" action="{{ route('comments.store', $client->id) }}">
    @csrf
    <input type="hidden" name="doctor_id" value="{{ Auth::guard('doctor')->user()->id }}">
    <div class="form-group">
        <textarea class="form-control mb-3" name="comment_text" rows="3" placeholder="Add a comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Submit</button>
</form>


                </div>
            </div>
        </div>




@endsection
@section('js')
@endsection
