<!DOCTYPE html>
<html lang="ar" dir="rtl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Thank You Page</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <title>Nella Clinic - Thank you</title>
         <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=a042b38f882c5db203767c9770c8f44d" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&amp;display=swap" />
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli&amp;display=swap" />

  <style>
      /* Center the form */

        @import url('https://fonts.googleapis.com/css2?family=Cairo&family=Shantell+Sans:wght@300&display=swap');



        h1,
        h1 {

            font-family: 'Cairo', sans-serif;

            color: #ecff4d;
            text-align: center;

        }

        p {

            font-family: 'Pacifico', cursive;
            color: gold;
            text-align: left;

        }


    </style>



</head>
<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="56">
    <header class="masthead" style="
            background: url('img/bg-pattern.png?h=88366d218f2eda574d88b27e4cb4169d'),
                linear-gradient(to left, #7b4397, #dc2430);
        ">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-8 col-lg-6 text-center">

            <h2 class="text-nav" style="
              font-family: cursive;
              font-size: 24px;
            ">Bella Online Appointment</h2>
            <!-- Add your appointment form code here -->
            <img src="{{ asset('img/loog.png') }}" width="200" height="100">
          </div>
        </div>
        <div class="row h-100 p-8 justify-content-center align-items-center">
          <div class="device-container">
            <div class="device-mockup iphone6_plus portrait white" >
              <div class="device" style="
                background-image: url('img/iphone_6_plus_white_port.png?h=a8ad898987fd6ec9bbde741517f4cbb9');
              ">
                <aside class="screen">
                  <p>
                    Thank You
                  </p>
                  <h1>{{ $appointment->client->client_name }}</h1>
                  <h2>شكرا لتسجيل الحجز وستصلك رسالة على رقم جوالك
                    {{ $appointment->client->clienr_phone }} لتأكيد
                    موعد الحجز.</h2>
                </aside>
                <div class="button"></div>
            </div>
            <div class="iphone-mockup"></div>
        </div>
          </div>
        </div>

    </div>

    </header>

    <footer>
      <div class="container">
        <p>
          <span>Copyrights ©
            <a class="afoot" href="https://wwww.ask-ar.com"> Ask-ar T.S </a>
            all rights reserved © 2023
          </span>
        </p>
      </div>
    </footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/new-age.js?h=8fc3cc14032ee2938bb61494b90187ba"></script>
</body>

</html>
