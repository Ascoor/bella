@extends('home')
   @section('content')
   <div class="card-body" >
       <h4 class="card-header text-center text-light">Appointment Create</h4>

<div class="card-body">
                <div class="col-sm-6 col-8 text-sm-end">
                    <div class="mx-n1">
                        </div>
                            </div>




                            <div class="container">
                                <div class="card-body" style="background-color: #bce2ff;">
                            <a href="{{route('appointments.index')}}" class="btn d-inline-flex btn-md~ btn-warning mx-1">
                <span class=" pe-2"><i class="bi bi-house-up"></i> </span> <span>Home</span> </a>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('appointments.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf


<div class="input-group">
  <span class="input-group-text">Client name</span>

  <input type="text" aria-label="name" name="name" placeholdider="Name" class="form-control">
</div>
                        <div class="input-group mb-3">
  <span class="input-group-text" >Email</span>
  <input type="text" class="form-control" placeholder="email"  name="email"aria-label="EMAIL" aria-describedby="basic-addon1">
</div>
                        <div class="input-group mb-3">
  <span class="input-group-text" >phone Number</span>
  <input type="tel" class="form-control" placeholder="Phone Number"  name="phone_number"aria-label="Phone Number" aria-describedby="basic-addon1">
</div>
                <div class="row-12">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Services</label>
                        <div class="col-12">

                            @foreach($services as $item)

                            <input class="form-check-input mt-0" name="services[]" type="checkbox" value="{{ $item->id }}" aria-label="Checkbox for following text input">
                            <label for="">{{ $item->name }}</label>
                            @endforeach
                            <br>
                        </div>
<div class="input-group mb-3">
  <input type="date" name="apt_date" class="form-control" placeholder="Apt Date" aria-label="date">
  <input type="time" name="apt_time" class="form-control" placeholder="Apt Time" aria-label="time">
</div>
<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Status</label>
  <select class="form-select" name="status">

    <option value="pending">Pending</option>
    <option value="accepted">Accepted</option>
    <option value="accepted">Complete</option>
    <option value="rejected">Rejected</option>
  </select>
</div>
<div class="card-footer ml-auto">
            <button type="submit" class="btn btn-outline-primary mr-1">Create</button>
        </form>
    </div>


@endsection
