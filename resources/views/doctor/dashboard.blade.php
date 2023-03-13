@extends('layouts.app')
@section('css')
<link href="{{URL::asset('/css/dash.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">


@endsection
@section('page-header')
				<
@endsection
@section('content')
				<!-- row -->
                <div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="counter">
                <span class="counter-value text-primary"><i class="fas fa-users"></i> {{ $clientCount }}</span>
                <h3>Clients</h3>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="counter green">
                <span class="counter-value text-primary"><i class="fas fa-calendar-check"></i> {{ $processedAppointmentCount }}</span>
                <h3>Processed</h3>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="counter green">
                <span class="counter-value text-success"><i class="fas fa-calendar-check"></i> {{ $completedAppointmentCount }}</span>
                <h3>Completed</h3>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="counter green">
                <span class="counter-value text-danger"><i class="fas fa-calendar-check"></i> {{ $rejectedAppointmentCount }}</span>
                <h3>Rejected</h3>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

@endsection
