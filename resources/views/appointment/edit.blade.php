@extends('home')
   @section('content')
   <div class="container">
     <div class="card">
       <div class="card-body" style="background-color: #bce2ff;">
       <div class="form-group">
                    <form action="{{route('appointments.update',$appointment)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
<div class="input-group">
  <span class="input-group-text">Client name</span>

  <input type="text" aria-label="name" name="name" value="{{ $appointment->name }}" class="form-control">
</div>
                        <div class="input-group mb-3">
  <span class="input-group-text" >Email</span>
  <input type="text" class="form-control"value="{{ $appointment->email }}" name="email"aria-label="EMAIL" aria-describedby="basic-addon1">
</div>
                        <div class="input-group mb-3">
  <span class="input-group-text" >phone Number</span>
  <input type="tel" class="form-control"  value="{{ $appointment->phone_number }}"  name="phone_number"aria-label="Phone Number" aria-describedby="basic-addon1">
</div>
<div class="form-group">
                @foreach ($services as $item)
                <input type="checkbox" name="services[]"
                   value="{{$item->id}}"

                   @foreach ($appointment->service as $item2)
                       @if ($item->id == $item2->id)
                           checked
                       @endif
                   @endforeach

                   >

                   <label for="">{{$item->name}}</label>
                @endforeach

              </div>
<div class="input-group mb-3">
  <input type="date" name="apt_date" class="form-control" value="{{ $appointment->apt_date }}"  aria-label="date">
  <input type="time" name="apt_time" class="form-control" value="{{ $appointment->apt_time }}"  Time" aria-label="time">
</div>
<div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">Status</label>
    <select  class="form-select"  value="{{ $appointment->status }}" name="status" id="service" checked>
        @if($appointment->status == 'pending')
            <option value="pending" selected>Pending</option>
            <option value="accepted">Accepted</option>
            <option value="accepted">Complete</option>

            <option value="rejected">Rejected</option>
        @elseif($appointment->status == 'accepted')
            <option value="pending">Pending</option>
            <option value="accepted" selected>Accepted</option>
            <option value="accepted">Complete</option>
            <option value="rejected">Rejected</option>
        @elseif($appointment->status == 'complete')
            <option value="pending">Pending</option>
            <option value="accepted" >Accepted</option>
            <option value="accepted" selected>Complete</option>
            <option value="rejected">Rejected</option>
        @else
            <option value="pending">Pending</option>
            <option value="accepted">Accepted</option>
            <option value="rejected" selected>Rejected</option>
        @endif
    </select>
</div>
<div class="card-footer ml-auto">
            <button type="submit" class="btn btn-outline-danger mr-1">update</button>
        </form>
    </div>
@endsection
