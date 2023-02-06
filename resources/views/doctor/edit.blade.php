@extends('home')
   @section('content')
   <div class="container">
     <div class="card">
       <div class="card-body" style="background-color: #bce2ff;">
       <div class="form-group">
                    <form action="{{route('doctors.update',$doctor->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
    <label for="name">Doctor Name</label>
    <input type="text" class="form-control" value="{{ $doctor->name }}" name="name" >
  </div>
    <label for="name">Doctor Specialty</label>
    <input type="text" class="form-control" value="{{ $doctor->specialty }}" name="specialty" >
  </div>
  <div class="form-group">
  <div class="form-group">
    <label for="phone number">Phone Number</label>
    <input type="tell" class="form-control" value="{{$doctor->phone}}" name="phone" >
  </div>
  <button type="submit" class="btn btn-primary">Store Doctor</button>
</form>

@endsection
