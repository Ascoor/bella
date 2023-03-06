<!doctype html>
<html dir="rtl">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - GoSNippets</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
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



        .footer {
            font-size: small;
            color: yellow;
            text-align: center;
        }
    .afoot{
            color: #e6e3e4;
            text-align: center;
        }

        h1,
        h1 {
            font-size: calc(1.375rem + 1.5vw);
            font-family: 'Cairo', sans-serif;

            color: #ecff4d;
            text-align: center;

        }

        .h2,
        h2 {
            font-family: 'Cairo', sans-serif;
            font-family: 'Pacifico', cursive;
            color: wheat;
            font-size: calc(1.325rem + .9vw);
            font-family: Cairo
        }

        p {
            font-size: calc(1.375rem + 2.5vw);
            font-family: 'Pacifico', cursive;
            color: gold;
            text-shadow: silver;
            text-align: left;
            padding-top: 30px;


        }
        .d-block w-100{
            border-radius: 50% 0 50% 0;
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
                <p >


                    Thank You



                </p>

                <h1>{{ $appointment->client->client_name }}</h1>
                <div class="card-footer">
                <h2>شكرا لتسجيل الحجز وستصلك رسالة على رقم جوالك {{ $appointment->client->clienr_phone }} لتأكيد
                    موعد الحجز.</h2>

                    </div>
                    </div>
                </div>

            <div class="footer">

            <span>Copyrights © <a class="afoot" href="https://wwww.ask-ar.com">Ask-ar T.S</a>all rights reserved © 2023</span>
        </div>
    </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script type='text/javascript' src=''></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'>
        </script>
        <script type='text/javascript'
            src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>



        <!-- ALL JS FILES -->

        <script src="{{ asset('js/app.js') }}"></script>


    </body>

</html>
