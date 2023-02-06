@extends('home')

@section('content')

<div class="container">
<div class="card-body" style="background-color: #bce2ff;">
<br>
        <div class="card-header" ">
            <div class="head-text">
                <h2 class="display-7 text-center text-primary" >Appointmaent Client</a></h2>
                <h3 class="display-10 text-center" style="color: burlywood;">{{$appointment->name}}</a></h3>

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">

                    <a class="btn btn-primary col-1 " href="{{ route('appointments.index') }}" role="button"> Appointments</a>
                    <a class="btn btn-warning col-1" href="{{ route('appointments.edit',$appointment) }}" role="button"> Edit</a>


                </div>
                </div>






            <center>


                                    <div class="align-self-center">
                                        <h2>Appiontment Number</h2>

                                        <h3 style="color: darkorange;">{{ $appointment->apt_number }}</h3 >
                                    </div>



                                        <div class="align-self-center">
                                            <h2>Client Name</h2>

                                            <h3 style="color: darkorange;">{{ $appointment->name }}</h3>

                                        </div>
                                    </div>



            </center>
            <div class="media-body text-center">

                                            <h2 class="danger">Appiontment Date</h2>
                                            <h3 style="color: darkorange;">{{ $appointment->apt_date }}</h3>

<br>
<div class="media-body text-center">
<h2 class="danger">Appiontment time</h2>
<h3 style="color: darkorange;">{{ $appointment->apt_time }}</h3>
<br>
<div class="media-body text-center">
                                            <h2 class="danger">Appiontment status</h2>
                                            <h3 style="color: darkorange;">{{ $appointment->status }}</h3>
                                        </div>

=
<div class="media-body text-center">
<h2 class="danger">Provieded Services</h2>


@foreach ($appointment->service as $item)

<label style="color: darkorange;" for=""><h2>{{$item->name}}</h2></label> -
@endforeach


<br>
<br>

</div>

                            </div>
                            </div>
                        </div>

</section>

@endsection
