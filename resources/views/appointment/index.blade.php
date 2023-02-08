@extends('layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
						  <p class="mg-b-0">Sales monitoring dashboard template.</p>
						</div>
					</div>
					<div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">Customer Ratings</label>
							<div class="main-star">
								<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
							</div>
						</div>
						<div>
							<label class="tx-13">Online Sales</label>
							<h5>563,275</h5>
						</div>
						<div>
							<label class="tx-13">Offline Sales</label>
							<h5>783,675</h5>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
   <div class="card-body">
    <h4 class="card-header text-center text-light">Appointment List</h4>


    @if($message = Session::get('Done'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif
            @if(session('status'))
            <div class="alert alert-danger" role="alert">
                {{ session('status') }}
                @endif


                <div class="card-body">
                <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                </div>
                            </div>

                            <div class="container">
            <a href="{{route('appointments.create')}}" class="btn d-inline-flex btn-md~ btn-success mx-1">
               <span class=" pe-2"> <i class="bi bi-plus"></i> </span> <span>Create</span> </a>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">

<table class="table table-success table-striped table-hover">
<thead class="table-dark text-center">
                        <tr   style="color: #fff; background: black;" class="table-active ">

                            <th>Id</th>

                            <th>Client Name</th>
                            <th>Phone</th>
                            <th>Apt Date</th>
                            <th>Apt Time</th>
                            <th>Status</th>

                            <th>Control</th>
                            <th></th>






                        </tr>
                    </thead>
                    @if($appointments->count() > 0 )
                    <tbody class="text-center">

                        @php
                        $i = 1;
                        @endphp
                        @foreach ($appointments as $item)
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
                            <!-- <td>
                                <span>


                                    <a class="btn btn-success" href="{{ route('appointments.show',$item->id) }}">Show</a>
                                </span>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> {!! $appointments->links() !!}


            @else
            <div class="col">
                <div class="alert alert-danger" role="alert">
No appointments
                </div>
            </div>
    </div>
@endif
@endsection
