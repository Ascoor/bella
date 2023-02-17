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
                <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#exampleModal">حجز جديد</a>
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
                                {{ $item->client->client_name }}
                            </td>
                            <td>
                                {{ $item->client->client_phone }}
                            </td>
                            <td>
                                {{ $item->apt_date }}
                            </td>
                            <td>
                                {{ $item->apt_time }}
                            </td>

                            <td>
                                {{ $item->doctor->name}}
                            </td>
                            <td>
                                {{ $item->status }}
                            </td>


                            <td>
                                <span>


                                    <a class="btn btn-primary"
                                    href="{{route('appointments.edit',$item->id)}}">تعديل</a>

                                </span>

                                <span>


                                    <a class="btn btn-success"
                                    href="{{route('appointments.show',$item->id)}}">مشاهدة</a>

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


<!-- Create Service Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="createServiceModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createServiceModalLabel">Create Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('appointments.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="main-content-label mg-b-5">
          بيانات الحجز
                </div>
                <br/>
                <div class="row row-sm">
                    <div class="col-lg">
                        <p class="mg-b-10">إسم العميل</p>
                        <input class="form-control mg-b-20" name="name"type="text">
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-lg">
                        <p class="mg-b-10">البريد الإلكترونى للعميل</p>
                        <input class="form-control mg-b-15"  name="email" type="email">
                    </div>
                </div>


                <div class="row row-sm mg-b-20">
                    <div class="input-group col-md-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <p class="mg-b-10">تاريخ الحجز</p>
                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                            </div>
                        </div><input class="form-control fc-datepicker" name="apt_date" placeholder="MM/DD/YYYY" type="date">
                    </div>

                    <div class="input-group col-md-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <p class="mg-b-10">موعد الحجز</p>
                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                            </div>
                        </div><input class="form-control " name="apt_time" placeholder="00:00" type="time">
                    </div>

                                <div class="input-group col-md-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                رقم الجوال</div>

                        <input class="form-control" id="phoneMask" name="phone"
                            aria-label="Phone Number" type="tel">
                    </div><!-- input-group -->
                </div>

                </div>


                <div class="row row-sm mg-b-20">
                    <div class="col-lg-4">
                        <p class="mg-b-10">حالة الحجز</p><select class="form-control select2-no-search"
                            name="status">
                            <option label="Choose one">

                            <option value="pending" selected>Pending</option>
                            <option value="accepted">confirmed</option>

                            <option value="accepted">Complete</option>
                            <option value="accepted">cancelled</option>
                        </select>
                    </div>


                    <div class="col-lg-4">
                        <p class="mg-b-10">إختر الدكتور</p><select class="form-control select2-no-search"
                            name="doctor_name" >
                            <option label="Choose one">
                                @foreach ($doctors as $item )

                            <option value="{{$item->name}}" >{{$item->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row row-xs wd-xl-80p">
	<div class="col-sm-6 col-md-3">
		<button type="submit" class="btn btn-outline-primary btn-block">سجل</button>
	</div>

</div>		</div>
				</div>
				<!-- /row -->

			</div>
			<!-- Container closed -->
		</div>
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
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
