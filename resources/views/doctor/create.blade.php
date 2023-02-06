@extends('home')
   @section('content')



   <div class="container">
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

@endsection
