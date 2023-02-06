@extends('home')
   @section('content')

       <div class="card-body" style="background-color: #bce2ff;">


       <form  action="{{route('services.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Service Name">
  </div>
  <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Doctor Services<span class="text-danger">*</label><br>
                            @foreach($doctors as $doctor)
                            <input type="checkbox" name="doctor_name" value="{{$doctor->name}}">

                            <label for="">{{$doctor->name}}</label>
                            @endforeach
                        </div>
                            <br> <div class="form-group">
    <label for="cost">Cost</label>
    <input type="text" class="form-control" name="cost" placeholder="Enter Service Cost">
  </div>
  <button type="submit" class="btn btn-primary">Create Service</button>
</form>

@endsection
