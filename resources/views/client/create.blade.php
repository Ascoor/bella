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
      <div class="card-header">
      <p class="card-text">Create Client</p>
      </div>
      <div class="card-body" style="background-color: #bce2ff;">
        <h4 class="card-title"> </h4>

        <form  action="{{route('clients.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter client name">
  </div>
  <div class="form-group">
    <label for="name">phone</label>
    <input type="tel" class="form-control" name="phone" placeholder="Enter client phone number">
  </div>
  <div class="form-group">
    <label for="cost">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter client phone email">
  </div>
  <div class="form-group">
    <label for="cost">Details</label>
    <textarea type="text" class="form-control" name="details" placeholder="Enter client details"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Create client</button>
</form>

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
