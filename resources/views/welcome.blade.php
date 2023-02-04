
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


     <!-- Site Metas -->
    <title>Bella Clinic</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="imag/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link href="css/app.css" rel="stylesheet" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body >

<nav class="navbar navbar-dark bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/img/logo.png" alt="" width="100" height="75" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="/">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </div>

    </div>
</nav>
<!-- Carousel wrapper -->
<div class="container-fluid">

        <div class="row">
            <div class="col">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/slid1.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Lamborghini</h5>
                                <p>Manufacturing magnate Italian Ferruccio Lamborghini founded the company in 1963.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/slid2.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Ford Mustang</h5>
                                <p> Yes, the Ford Mustang is a very good sports car.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/slid3.jpg"  class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Cameron</h5>
                                <p>The Cameron was an automobile manufactured by the Cameron Car Company of Rhode Island from 1902.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                </div>
                </div>  
                
                    <div class="row">
  
                            <div class="col-md col-12 mb-6">
                                <div class="form-control d-flex flex-column">
                                    <p class="h-blue">{{__('Name')}}</p> <input class="inputbox"
                                        placeholder="City or Airport" type="text">
                                </div>
                            </div>
                            <div class="col-md col-12 mb-6">
                                <div class="form-control d-flex flex-column">
                                    <p class="h-blue">{{__('Phone Number')}}</p> <input class="inputbox"
                                        placeholder="City or Airport" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-4">
                                <div class="form-control d-flex flex-column">
                                    <p class="h-blue">{{__('Appointment Date')}}</p> <input class="inputbox textmuted" type="date">
                                </div>
               
                            <div class="col-md-6 col-12 mb-4">
                                <div class="form-control d-flex flex-column">
                                    <p class="h-blue">{{__('Apointment Time')}}</p> <input class="inputbox textmuted " type="time">
            
                       

                            <div class="col-md-6 mb-4">
                                <div class="form-control d-flex flex-column">
                                    <p class="h-blue">{{__('Doctor')}}</p> <select class="border-0 outline-none">
                                        <option value="" hidden selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
   
                    
                    <div class="row-md-3 col-12 mb-4">
                    
                    <div class="btn btn-primary form-control text-center">Appointment</div>
                </form>
                </div>
    <!-- ALL JS FILES -->
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
