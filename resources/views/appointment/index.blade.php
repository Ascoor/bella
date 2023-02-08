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
							<h4 class="content-title mb-0 my-auto">Tables</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Data Tables</span>
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
							<div class="card-body">
								<div class="table-responsive hoverable-table">
									<a id="button" href="{{route('appointments.create') }}" class="btn btn-primary mg-b-20">إضافة حجز</a>
									<table id="example-delete" class="table text-md-nowrap">
										<thead>
											<tr>
                                            <th>Id</th>

<th>Client Name</th>
<th>Phone</th>
<th>Apt Date</th>
<th>Apt Time</th>
<th>Status</th>

<th>Control</th>
<th></th>	
<th></th>

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