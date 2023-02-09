
@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
                @endsection
@section('content')
				<!-- row -->

	<div class="row">
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
                                <a href="{{route('clients.create')}}" class="btn d-inline-flex btn-md~ btn-success mx-1">
                                    <span class=" pe-2"> <i class="bi bi-plus"></i> </span> <span>Create</span> </a>
                                    @if($clients->count() > 0 )
                                    <div class="row">
                                        <div class="col-md-12">
                        <div class="table-responsive">

<table class="table table-success table-striped table-hover text-center">
<thead class="table-dark">
                        <tr   style="color: #fff; background: black;" class="table-active ">
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                <span>


                                    <a class="btn btn-primary"
                                    href="{{route('clients.edit',$item->id)}}">Edit</a>

                                </span>
                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>









            @else
            <div class="col">
                <div class="alert alert-danger text-center" role="alert">
No Services
                </div>
            </div>

@endif

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
@endsection
