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




     <div class="card">
       <div class="card-body" style="background-color: #bce2ff;">
       <div class="form-group">
                    <form action="{{route('doctors.store')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

  <div class="form-group">
    <label for="name">Doctor Name</label>
    <input type="text" class="form-control"  name="name" >
  </div>
  <div class="form-group">
    <label for="name">Specialty</label>
    <input type="text" class="form-control" name="specialty" >
  </div>
  <div class="form-group">
    <label for="phone number">Phone Number</label>
    <input type="tell" class="form-control" name="phone" >
  </div>
  <button type="submit" class="btn btn-primary">Create Doctor</button>
</form>

</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
