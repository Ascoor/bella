@extends('layouts.app')
@section('title')
لوحة التحكم الرئيسية
@stop
@section('css')
<link href="{{URL::asset('/css/dash.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">


@endsection
@section('page-header')

@endsection
@section('content')
				<!-- row -->
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="counter">
                <span class="counter-value text-primary"><i class="fas fa-users"></i> {{ $clientCount }}</span>
                <h3>Clients</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
    <div class="counter green">
        <span class="counter-value text-primary"><i class="fas fa-calendar-check"></i> {{ $processedCount }}</span>
        <h3>Processed</h3>
    </div>
</div>

        <div class="col-md-3 col-sm-6">
            <div class="counter green">
                <span class="counter-value text-success"><i class="fas fa-calendar-check"></i> {{ $completedCount }}</span>
                <h3>Completed</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter green">
                <span class="counter-value text-danger"><i class="fas fa-calendar-check"></i> {{ $rejectedCount }}</span>
                <h3>Rejected</h3>
            </div>
        </div>
    </div>



@endsection
@section('js')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

@endsection
