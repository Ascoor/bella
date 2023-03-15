@extends('layouts.app')
@section('css')
<link href="{{URL::asset('/css/dash.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">

<style>

    /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
.collapsible-link {
    width: 100%;
    position: relative;
    text-align: left;
}

.collapsible-link::before {
    content: '\f107';
    position: absolute;
    top: 50%;
    right: 0.8rem;
    transform: translateY(-50%);
    display: block;
    font-family: 'FontAwesome';
    font-size: 1.1rem;
}

.collapsible-link[aria-expanded='true']::before {
    content: '\f106';
}

/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
body {
    background: #654ea3;
    background: -webkit-linear-gradient(to left, #654ea3, #eaafc8);
    background: linear-gradient(to left, #654ea3, #eaafc8);
    min-height: 100vh;
}
</style>
@endsection
@section('page-header')

@endsection
@section('content')
			<!-- row -->
            <div class="container">

    <!-- For demo purpose -->
    <div class="row py-5">
        <div class="col-lg-9 mx-auto text-white text-center">



        <div class="col-md-4 col-sm-6">
            <div class="counter">
                <span class="counter-value text-primary"><i class="fas fa-users"></i> {{ $clientCount }}</span>
                <h3>Clients</h3>
            </div>
        </div>
        <!-- <div class="col-md-4 col-sm-6">
            <div class="counter green">
                <span class="counter-value text-primary"><i class="fas fa-calendar-check"></i> {{ $processedCount }}</span>
                <h3>Processed</h3>
            </div>
        </div> -->
        <div class="col-md-4 col-sm-6">
            <div class="counter blue">
                <span class="counter-value text-light"><i class="fas fa-calendar-check"></i> {{ $completedCount }}</span>
                <h3>Completed</h3>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="counter cgreen">
                <span class="counter-value text-danger"><i class="fas fa-calendar-check"></i> {{ $rejectedCount }}</span>
                <h3>Rejected</h3>
            </div>
        </div>
    </div>
</div>




        </div>
    </div><!-- En
<div class="container">
    <div class="row">



@endsection
@section('js')

@endsection
