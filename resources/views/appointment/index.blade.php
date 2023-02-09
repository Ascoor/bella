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
							<h4 class="content-title mb-0 my-auto">الحجوزات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الحجوزات</span>
						</div>
					</div>

					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->

				
			<!-- row opened -->
            <div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
                <div class="card-body">
                <div class="col-sm-6 col-md-4 col-xl-3">
										<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">إضافة حجز جديد</a>
									</div>
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">إسم العميل</th>
                                    <th class="border-bottom-0">رقم الهاتف</th>
                                    <th class="border-bottom-0">تاريخ الحجز</th>
                                    <th class="border-bottom-0">موعد الحجز</th>
                                    <th class="border-bottom-0">الدكتور</th>
                                    <th class="border-bottom-0">حالة الحجز</th>
                                    
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>

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
                                {{ $item->doctor_name}}
                            </td>
                            <td>
                                {{ $item->status }}
                            </td>


                            <td>
                                <span>


                                    <a class="btn btn-primary"
                                    href="{{route('appointments.edit',$item->id)}}">Edit</a>

                                </span>
							</td>
							<td>
                                <span>


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
