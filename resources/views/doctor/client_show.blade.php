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
                    <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#tabContent1" role="tab" aria-controls="tabContent1" aria-selected="true">التفاصيل العامة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#tabContent2" role="tab" aria-controls="tabContent2" aria-selected="false">المواعيد</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#tabContent3" role="tab" aria-controls="tabContent3" aria-selected="false">الأشعة والتحاليل</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab4" data-bs-toggle="tab" href="#tabContent4" role="tab" aria-controls="tabContent4" aria-selected="false">الأدوية والتحاليل</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab5" data-bs-toggle="tab" href="#tabContent5" role="tab" aria-controls="tabContent5" aria-selected="false">التقارير الطبية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab6" data-bs-toggle="tab" href="#tabContent6" role="tab" aria-controls="tabContent6" aria-selected="false">المرفقات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab7" data-bs-toggle="tab" href="#tabContent7" role="tab" aria-controls="tabContent7" aria-selected="false">الأطباء</a>
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
                        <td>{{ $client->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>رقم الهوية:</strong></td>
                        <td>{{ $client->national_id }}</td>
                    </tr>
                    <tr>
                        <td><strong>تاريخ الميلاد:</strong></td>
                        <td>{{ $client->date_of_birth }}</td>
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
                        <td>{{ $client->phone_number }}</td>
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


<div class="tab-pane fade" id="tabContent2" role="tabpanel" aria-labelledby="tab2">
    <h3>مواعيد الزيارات</h3>
    <p>يمكنك هنا عرض جدول المواعيد للمريض في هذا القسم.</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">تاريخ الزيارة</th>
                <th scope="col">وقت الزيارة</th>
                <th scope="col">اسم الطبيب</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2023-04-05</td>
                <td>10:30 صباحاً</td>
                <td>د. أحمد</td>
            </tr>
            <tr>
                <td>2023-04-08</td>
                <td>2:00 مساءً</td>
                <td>د. فاطمة</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="tab-pane fade" id="tabContent3" role="tabpanel" aria-labelledby="tab3">
    <h3>الأشعة والتحاليل</h3>
    <p>Here you can add information related to radiology and analysis appointments or test results. You can also include any relevant images or documents.</p>
</div>
    <div class="tab-pane fade" id="tabContent4" role="tabpanel" aria-labelledby="tab4">
                    <!-- Add content for the fourth tab here -->
                </div>
                <div class="tab-pane fade" id="tabContent5" role="tabpanel" aria-labelledby="tab5">
  <h3>التقارير الطبية</h3>
  <p>هذا المحتوى يتعلق بالتقارير الطبية.</p>
  <!-- Add your content for tab 5 here -->
</div>
  <div class="tab-pane fade" id="tabContent6" role="tabpanel" aria-labelledby="tab6">
    <div class="card-body">
        <h5 class="card-title">المرفقات</h5>
        <div class="row">
            <div class="col-sm-6">
                <h6>إضافة مرفق جديد</h6>
                <form>
                    <div class="mb-3">
                        <label for="attachmentName" class="form-label">اسم المرفق</label>
                        <input type="text" class="form-control" id="attachmentName" placeholder="اسم المرفق">
                    </div>
                    <div class="mb-3">
                        <label for="attachmentFile" class="form-label">الملف</label>
                        <input type="file" class="form-control" id="attachmentFile">
                    </div>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </form>
            </div>
            <div class="col-sm-6">
                <h6>المرفقات الموجودة</h6>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        ملف 1
                        <span class="badge bg-primary rounded-pill">تحميل</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        ملف 2
                        <span class="badge bg-primary rounded-pill">تحميل</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        ملف 3
                        <span class="badge bg-primary rounded-pill">تحميل</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



@endsection
@section('js')
@endsection

