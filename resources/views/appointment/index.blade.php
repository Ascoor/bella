@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Tables</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Data
                Tables</span>
        </div>
    </div>

</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row opened -->

<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">قائمة الحجوزات</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>


            @if($message = Session::get('Done'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif
            @if(session('status'))
            <div class="alert alert-danger" role="alert">
                {{ session('status') }}
                @endif

            </div>
 
                        <div class="col-xl-12">
                            <div class="card mg-b-20">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mg-b-0">قائمة الحجوزات</h4>
                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                    </div>
                                    <p class="tx-12 tx-gray-500 mb-2">يمكنك إضافة حجز جدبد<a href="{{route('appointments.create')}}">إضافة حجز</a></p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">م</th>
                                                    <th class="border-bottom-0">الإسم</th>
                                                    <th class="border-bottom-0">رقم الجوال</th>
                                                    <th class="border-bottom-0">تاريخ الحجز</th>
                                                    <th class="border-bottom-0">موعد الحجز</th>
                                                    <th class="border-bottom-0">تأكيد الحجز</th>
                                                    <th class="border-bottom-0">حالة الحجز</th>
                                                    <TH>
                                                    <th class="border-bottom-0">التحكم</th>
                                                    </TH>
                                                </tr>
                                            
                        </thead>
                        @if($appointments->count() > 0 )
                        <tbody class="text-center">

                            @php
                            $i = 1;
                            @endphp
                            @foreach ($appointments as $item)

                        <tbody>

                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <!-- <td >
                           <a  href="{{route('appointments.show',$item->id)}}">

                               {{ $item->apt_number }}</a> </td> -->
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->phone }}
                                </td>
                                <td>
                                    {{ $item->apt_date }}
                                </td>
                                <td>
                                    {{ $item->apt_time }}
                                </td>
                                <td>
                                    {{ $item->apply_date }}
                                </td>

                                <td>
                                    {{ $item->status }}
                                </td>


                                <td>
                                    <span>


                                        <a class="btn btn-primary"
                                            href="{{route('appointments.edit',$item->id)}}">Edit</a>

                      
                                </td>
                                <td>
                               


                                        <a class="btn btn-success"
                                            href="{{route('appointments.show',$item->id)}}">Show</a>

                                    </span>
                                </td>
                                <td></td>
                            </tr>
                            </tfoot>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
@else
<div class="col">
    <div class="alert alert-danger" role="alert">
        No appointments
    </div>
</div>
</div>
@endif
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection