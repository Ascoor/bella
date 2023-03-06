<!doctype html>
<html dir="rtl">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Bella Clinic</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!--Internal Sumoselect css-->
    <link rel="stylesheet"
        href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet"
        href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <style>
        /* Center the form */
        .container-fluid {
            font-family: 'Cairo', sans-serif;
            background: #cc2b5e;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #753a88, #cc2b5e);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #753a88, #cc2b5e);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh
        }

        /* Style the form inputs */
        .form-control {
            border-radius: 0;
        }

        /* Style the submit button */
        .btn-danger-gradiant {

            background: linear-gradient(to right, #f91b4d, #ff4b2b);

            border-radius: 0;
            border: none;
            text-transform: uppercase;
            font-weight: bold;
        }

        /* Style the form labels */
        .text-uppercase {
            text-transform: uppercase;
            font-weight: bold;
            color: white;
            width: -webkit-fill-available;
        }

        /* Style the calendar icon */
        .input-group-text {
            border-radius: 0;
        }

        .fa-calendar {
            font-size: 1.2rem;
        }

        /* Style the form message input */
        textarea {
            resize: none;
        }

        /* Set the image height */
        .card-img {

            max-height: 300px;


        }

        /* Set the card body height */
        .card-body {
            height: 100%;

            background: #cc2b5e;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #753a88, #cc2b5e);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #753a88, #cc2b5e);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        /* Style the card */
        .card {
            height: 100%;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        /* Remove padding from columns */
        .p-0 {
            padding: 0 !important;
        }

        .carousel-item {
            border-radius: 50% 50% 50% 50%;

        }

        .footer {
            background: -webkit-linear-gradient(to right, #753a88, #cc2b5e);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #753a88, #cc2b5e);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            font-size: small;
            color: yellow;
            text-align: center;
        }
    .afoot{
            color: #e6e3e4;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6 col-lg-7 p-0">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/slid1.webp') }}" class="d-block w-100"
                                alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/slid2.jpg') }}" class="d-block w-100"
                                alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/slid3.jpg') }}" class="d-block w-100"
                                alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/slid4.jpg') }}" class="d-block w-100"
                                alt="Third slide">
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-md-6 col-lg-5 p-0">

                <div class="card border-0">
                    <div class="card-body">
                        <h3 class="my-3 text-center text-light text-uppercase">سجل بياناتك</h3>
                        <form method="post" action="{{ route('appointments.submitForm') }}">
                            @csrf

                            <div class="form-row">
                                <label for="first-name" class="text-uppercase">الإسم</label>
                                <input type="text" id="client_name" name="client_name" class="form-control"
                                    placeholder="الإسم">
                            </div>
                            <div class="form-group mt-4">
                                <label for="booking-date" class="text-uppercase">الطبيب</label>
                                <select name="doctor_id" id="doctor_id"
                                    class="form-control @error('doctor_id') is-invalid @enderror">
                                    <option value="">إختر الطبيب</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('doctor_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror


                            <div class="form-group mt-4">

                                <label for="email" class="text-uppercase">تاريخ وموعد الحجز</label>
                                <input type="datetime-local" name="apt_datetime" id="apt_datetime"
                                    class="form-control @error('apt_datetime') is-invalid @enderror">
                            </div>
                            <div class="form-group mt-4">
                                <label for="phone" class="text-uppercase">رقم الجوال</label>
                                <input type="tel" id="client_phone" name="client_phone" class="form-control"
                                    placeholder="إدخل رقم الجوال">
                            </div>



                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-danger-gradiant btn-block text-uppercase">إحجزك
                                    الأن</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
            <div class="footer">
                        <span>Copyrights © <a class="afoot" href="https://wwww.ask-ar.com"> Ask-ar T.S </a>all rights reserved © 2023</span>
            </div>





    <!-- jQuery and JS bundle w/ Popper.js -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    <script src="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.js') }}">
    </script>
    <script src="{{ URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js') }}">
    </script>
    <script>
        $(function () {
            $('#dp').datepicker();
        });
        $(function () {

            // International Telephone Input
            var input = document.querySelector("#client_phone");
            window.intlTelInput(input, {
                utilsScript: "assets/plugins/telephoneinput/utils.js",
            });
        });
    </script>

</body>

</html>
