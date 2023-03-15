@extends('layouts.app')
@section('title')
لوحة التحكم الرئيسية
@stop
@section('css')

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
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="counter green">
                <span class="counter-value text-light"><i class="fas fa-users"></i> {{ $clientCount }}</span>
                <h3>Clients</h3>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="counter blue">
                <span class="counter-value text-light"><i class="fas fa-calendar-check"></i> {{ $completedCount }}</span>
                <h3>Completed</h3>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="counter ">
                <span class="counter-value text-danger"><i class="fas fa-calendar-check"></i> {{ $rejectedCount }}</span>
                <h3>Rejected</h3>
            </div>
        </div>
    </div>




				<!-- row opened -->
				<div class="row row-sm row-deck">

							<div class="main-content-body main-content-body-calendar card p-4">
								<div class="main-calendar" id="calendar"></div>
							</div>
						</div>
					</div>





@endsection
@section('js')


@endsection
