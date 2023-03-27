@extends('assest.layout.app')
@section('title')
تسجيل الدخول للأطباء    |برنامج بيلا كلينك
@stop
@section('css')

@endsection
@section('content')
<div class="container-fluid">


    <div class="col-lg-8 mx-auto text-center" style="background-color:#fff3f3">
    <div class="card  text-center">
        <div class="card-body"    >
            <div class="card-sigin">
            <img class="img-login" src="{{URL::asset('img/logo.png')}}" width=250px" height="150px" >
											<div class="main-signup-header">
												<h2>مرحبا بك</h2>
												<h5 class="font-weight-semibold mb-4"> تسجيل الدخول العاملين</h5>

                                                <form method="POST" action="{{ route('assest.login') }}">


                            @csrf

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

												  </div>
                                                    <button type="submit" class="btn btn-success">
                                                    {{ __(' تسجيل الدخول') }}
                                                    </button>
												</form>

                                                    <div class="card-footer text-muted">
                                                        Footer
                                                    </div>
                                                </div>
                                            </div>
</div>

    </div>

@endsection


@section('js')
