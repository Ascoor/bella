<!doctype html>
                        <html>
<head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Bella Clinic</title>
                                <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='{{asset('/public/css/app.css')}}' rel='stylesheet'>
                                <style>.section {
    position: relative;
    height: 100vh;
}

.form-control {
    display: block;
    width: 75%;
    min-height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: medium;
    font-weight: 400;
    line-height: 1.5;
    color: #6c757d;
    background-color: #ffffff7a;
    background-clip: padding-box;
    border: 1px solid #f50b0b;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: revert;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.btn-primary {
    color: #fff;
    background-color: #d01414;
    border-color: #fd0d5b;
}
.card {

    display: contents;
}

.section .section-center {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}

#booking {
    font-family: 'Montserrat', sans-serif;
    background-image: url('img/back4a.jpg');
    background-size: cover;
    background-position: center;
}

#booking::before {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    background: rgba(47, 103, 177, 0.6);
}

.booking-form {
    background-color: #fff;
    padding: 50px 20px;
    -webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
    border-radius: 4px;
}

.booking-form .form-group {
    position: relative;
    margin-bottom: 30px;
}

.booking-form .form-control {
    background-color: #ebecee;
    border-radius: 4px;
    border: none;
    height: 40px;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #3e485c;
    font-size: 14px;
}

.booking-form .form-control::-webkit-input-placeholder {
    color: rgba(62, 72, 92, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
    color: rgba(62, 72, 92, 0.3);
}

.booking-form .form-control::placeholder {
    color: rgba(62, 72, 92, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
    color: rgba(62, 72, 92, 0.3);
}

.booking-form select.form-control {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.booking-form select.form-control+.select-arrow {
    position: absolute;
    right: 0px;
    bottom: 4px;
    width: 32px;
    line-height: 32px;
    height: 32px;
    text-align: center;
    pointer-events: none;
    color: rgba(62, 72, 92, 0.3);
    font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
    content: '\279C';
    display: block;
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}

.booking-form .form-label {
    display: inline-block;
    color: #3e485c;
    font-weight: 700;
    margin-bottom: 6px;
    margin-left: 7px;
}

.booking-form .submit-btn {
    display: inline-block;
    color: #fff;
    background-color: #1e62d8;
    font-weight: 700;
    padding: 14px 30px;
    border-radius: 4px;
    border: none;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
}

.booking-form .submit-btn:hover,
.booking-form .submit-btn:focus {
    opacity: 0.9;
}

.booking-cta {
    margin-top: 80px;
    margin-bottom: 30px;
}

.booking-cta h1 {
    font-size: 52px;
    text-transform: uppercase;
    color: #fff;
    font-weight: 700;
}

.booking-cta p {
    font-size: 16px;
    color: rgba(255, 255, 255, 0.8);
}</style>
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                            <div id="booking" class="section">
    <div class="section-center">
    <div class="container">

    <h1 style="color:aliceblue">Create Appointment</h1>
    <div class="card">
<div class="card-body">


    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<form method="post" action="{{ route('appointments.submitForm') }}">
    @csrf

    <div class="form-group">

        <select name="doctor_id" id="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror">
            <option value="">Select a doctor</option>
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            @endforeach
        </select>
        @error('doctor_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group"><input type="datetime-local" name="apt_datetime" id="apt_datetime" class="form-control @error('apt_datetime') is-invalid @enderror">
@error('apt_datetime')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror



    <div class="form-group">

        <input type="text" placeholder="Your Name" name="client_name" id="client_name" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name') }}">
        @error('client_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">

        <input type="text" name="client_phone" id="client_phone" class="form-control @error('client_phone') is-invalid @enderror" placeholder="Your Phone Number" value="{{ old('client_phone') }}">
        @error('client_phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create Now</button>
</form>
</div>               <script type='text/javascript'></script>

</div>
                            <!-- ALL JS FILES -->

                            <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                            <script src="{{ asset('js/app.js')}}"></script>

                        </body>
                    </html>

<!--
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
                @endif -->
