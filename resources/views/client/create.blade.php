@extends('home')
   @section('content')

       <div class="card-body" style="background-color: #bce2ff;">


       <form  action="{{route('services.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Service Name">
  </div>
  <div class="form-group">
    <label for="name">Specialty</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Service Name">
  </div>
  <div class="form-group">
    <label for="cost">Phone</label>
    <input type="text" class="form-control" name="cost" placeholder="Enter Service Cost">
  </div>
  <button type="submit" class="btn btn-primary">Create Service</button>
</form>

@endsection
