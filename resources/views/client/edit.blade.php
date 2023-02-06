@extends('home')
   @section('content')
   <div class="container">
     <div class="card">
       <div class="card-body" style="background-color: #bce2ff;">
       <div class="form-group">
                    <form action="{{route('services.update',$service)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" value="{{ $service->name }}" name="name" >
  </div>
  <div class="form-group">
    <label for="cost">Cost</label>
    <input type="number" class="form-control" value="{{ $service->cost }}" name="cost" >
  </div>
  <button type="submit" class="btn btn-primary">Create Service</button>
</form>

@endsection
