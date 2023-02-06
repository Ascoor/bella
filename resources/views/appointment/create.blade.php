@extends('home')
   @section('content')
   <div class="card-body" >
       <h4 class="card-header text-center text-light">Appointment Create</h4>

<div class="card-body">





                            <div class="container">
                                <div class="card-body" style="background-color: #bce2ff;">
                            <a href="{{route('appointments.index')}}" class="btn d-inline-flex btn-md~ btn-warning mx-1">
                <span class=" pe-2"><i class="bi bi-house-up"></i> </span> <span>Home</span> </a>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('appointments.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
<div class="input-group ">
  <span class="input-group-text">Client name</span>

  <select class="border-0 outline-none" name="client_id">
                                         @foreach ($clients as $item )

                                        <option value="{{ $item->id }}"  >
                                            {{$item->name}}</option>

                                            <input type="hidden" id="custId" name="name" value="{{ $item->name}}">
                                            <input type="hidden" id="custId" name="phone" value="{{ $item->phone}}">
                                            @endforeach
                                        </select>
</div>


                            <div class="input-group ">
                            <span class="input-group-text">{{__('Doctor')}}</span>
                            
                            <select class="border-0 " name="doctor_name">
                                         @foreach ($doctors as $item2 )

                                        <option value="{{ $item2->name }}"  >
                                            {{$item2->name}}</option>

                                        @endforeach
                                    </select>
                                </div>

              
                                <div class="input-group ">
                                  <label class="input-group-text" for="inputGroupSelect01">Date</label>
                                  <input type="date" name="apt_date" class="form-control" placeholder="Apt Date" aria-label="date"></div>
                                  
                      
                                <div class="input-group ">
                                  <label class="input-group-text" for="inputGroupSelect01">Time</label>
                                  <input type="time" name="apt_time" class="form-control" placeholder="Apt Time" aria-label="time">
                                </div>
                                <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></label>
  <span class="input-group-text">{{__('Status')}}</span>
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
      <div class="card-footer text-muted">
        Footer
      </div>
    </div>
    </div>


@endsection
