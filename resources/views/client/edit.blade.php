@extends('home')
   @section('content')
   <div class="container">
     <div class="card">
       <div class="card-body" style="background-color: #bce2ff;">
       <div class="form-group">
                    <form action="{{route('clients.update',$client)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" value="{{ $client->name }}" name="name" >
  </div>
  <div class="form-group">
    <label for="phone number">Phone Number</label>
    <input type="number" class="form-control" value="{{ $client->phone }}" name="phone" >
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" value="{{ $client->email }}" name="email" >
  </div>
  <div class="form-group">
    <label for="details">Details</label>
    <textarea type="text" class="form-control" value="{{ $client->details }}" name="details" >{{$client->details}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update client</button>
</form>

@endsection
