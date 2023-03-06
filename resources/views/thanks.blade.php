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
        .card {

            background: #e6e3e4;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #753a88, #cc2b5e);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #753a88, #cc2b5e);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }



        .section-center {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .container {
            max-width: 800px;
        }

        #booking::before {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            background: url('assets/img/media/login.png') no-repeat center center fixed;
            background-size: cover;
            background: #cc2b5e;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #753a88, #cc2b5e);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #753a88, #cc2b5e);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            height: 100%;
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
            font-size: calc(1.375rem + 1.5vw);
            font-family: 'Pacifico', cursive;
            color: #f32f38;
            text-align: center;
            padding-top: 70px;
            font-size: 42px;

        }

        .booking-form .form-control::-webkit-input-placeholder {
            color: rgba(62, 72, 92, 0.3);
        }

        .booking-form .form-control:-ms-input-placeholder {
            color: rgba(62, 72, 92, 0.3);
        }

        .footer {
            font-size: small;
            color: #ecff4d;
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="booking" class="section">

        <div class="card" style="width:25rem;">
            <img src="{{ asset('img/slid1.webp') }}" class="card-img">

            <div class="card-img-overlay">

                <p class="card-text">


                    Thank You



                </p>
            </div>
            <div class="card-text">>
                <h1>{{ $appointment->client->client_name }}</h1>

                <h2>شكرا لتسجيل الحجز وستصلك رسالة على رقم جوالك {{ $appointment->client->clienr_phone }} لتأكيد
                    موعد الحجز.</h2>
            </div>

            <div class="footer">

            <span>Copyrights © <a href="https://wwww.ask-ar.com">Ask-ar T.S</a>all rights reserved © 2023</span>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        </div>
        <script type='text/javascript' src=''></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'>
        </script>
        <script type='text/javascript'
            src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>



        <!-- ALL JS FILES -->

        <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
