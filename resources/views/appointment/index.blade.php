


   @extends('home')
   @section('content')

   <div class="card-body">
    <h4 class="card-header text-center text-light">Appointment List</h4>


    @if($message = Session::get('Done'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif
            @if(session('status'))
            <div class="alert alert-danger" role="alert">
                {{ session('status') }}
                @endif


                <div class="card-body">
                <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                </div>
                            </div>
                            @if($appointments->count() > 0 )
                            <div class="container">
            <a href="{{route('appointments.create')}}" class="btn d-inline-flex btn-md~ btn-success mx-1">
               <span class=" pe-2"> <i class="bi bi-plus"></i> </span> <span>Create</span> </a>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">

<table class="table table-success table-striped table-hover">
<thead class="table-dark text-center">
                        <tr   style="color: #fff; background: black;" class="table-active ">

                            <th>Id</th>
                            <th>Apt Number</th>
                            <th>Customer Name</th>
                            <th>Mobile</th>
                            <th>Apt Date</th>
                            <th>Apt Time</th>
                            <th>Status</th>

                            <th>التحكم</th>
                            <th></th>






                        </tr>
                    </thead>
                    <tbody class="text-center">

                        @php
                        $i = 1;
                        @endphp
                        @foreach ($appointments as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td >
                           <a  href="{{route('appointments.show',$item->id)}}">

                               {{ $item->apt_number }}</a> </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->phone_number }}
                            </td>
                            <td>
                                {{ $item->apt_date }}
                            </td>
                            <td>
                                {{ $item->apt_time }}
                            </td>

                            <td>
                                {{ $item->status }}
                            </td>



                            <td>
                                <span>


                                    <a class="btn btn-primary"
                                    href="{{route('appointments.edit',$item->id)}}">Edit</a>

                                </span>
                            </td>
                            <!-- <td>
                                <span>


                                    <a class="btn btn-success" href="{{ route('appointments.show',$item->id) }}">Show</a>
                                </span>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> {!! $appointments->links() !!}


            @else
            <div class="col">
                <div class="alert alert-danger" role="alert">
No appointments
                </div>
            </div>
    </div>
@endif
@endsection
