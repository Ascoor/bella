<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Bella - Appointment</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&display=swap">
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">




  <!-- Internal CSS -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
  <link rel="stylesheet" href="assets/css/FORM.css?h=b06fa1b6f2184b1976127ae923a27995">
  <link rel="stylesheet" href="assets/css/Pretty-Registration-Form-.css?h=74cbd162836abb1eda12ebcad200c88a">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<style>

.image-container {
  position: relative;
  display: inline-block;
}

.image-container::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.8));
  z-index: 1;
}

.image-container img {
  display: block;
  max-width: 100%;
  height: auto;
  z-index: 2;
}
.slide-image {
  width: 900px;
  height: 625px;
  object-fit: cover; /* this property ensures the image is resized without distortion */
}
.btn-danger-gradiant {

background: linear-gradient(to right, #f91b4d, #ff4b2b);

border-radius: 0;
border: none;
text-transform: uppercase;
font-weight: bold;
}
   /* Style the form labels */
   .text-uppercase {
    font-family: Cairo;
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
        </style>

</head>

<body class=" h-100 text-center text-white " style="
background: url('img/bg-pattern.png?h=88366d218f2eda574d88b27e4cb4169d'),
linear-gradient(to left, #7b4397, #dc2430);">
<div class="container">

<header class="mb-auto p-3" style="    font-family: monospace;
font-size: calc(1.9rem + 2.12vw);">

<img src="{{ asset('img/loog.png') }}" class="me-1" width="350" height="200" >
<h3 >Bella Online Appointment</h3>
    <nav class="nav nav-masthead justify-content-center float-md-end">
        <!-- <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Services</a>
        <a class="nav-link" href="#">About Us</a>
        <a class="nav-link" href="#">Contact Us</a> -->
      </nav>


</header>
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
<br/>
          <form method="post" action="{{ route('appointments.submitForm') }}">
        <h2 class="my-3 text-center text-light text-uppercase">سجل بياناتك</h2>

          <!-- Add your appointment form code here -->


                      @csrf
                      <div class="form-group mt-4">
                      <label for="name"  class="text-uppercase" >الإسم</label>
                      <input type="text" id="client_name" name="client_name" class="form-control" placeholder="الإسم">
                    </div>
                    <div class="form-group mt-4">
                        <label for="phone" class="text-uppercase">رقم الجوال</label>
                        <input type="tel" id="client_phone" name="client_phone" class="form-control" placeholder="إدخل رقم الجوال، مثال: +971 5XX XXXX">
                      </div>
                    <div class="form-group mt-4">
                      <label for="booking-date"  class="text-uppercase">الطبيب</label>
                      <select name="doctor_id" id="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror">
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
                      <label for="email"  class="text-uppercase">تاريخ وموعد الحجز</label>
                      <input type="datetime-local" name="apt_datetime" id="apt_datetime" class="form-control @error('apt_datetime') is-invalid @enderror">
                  </div>


                  <br/>
                  <div class="form-group mt-4">
                <button type="submit" class="btn btn-danger-gradiant btn-block text-uppercase">إحجزك
                  الأن</button>
                  </div>
            </form>

      </div>
      <div class="col-md-6 col-lg-5">

            <div id="carouselExampleIndicators" class="carousel slide mt-6" data-bs-ride="carousel">
                <!-- <ol class="carousel-indicators">
                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                </ol> -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('img/slid6.png') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('img/slid2.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('img/slid3.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('img/slid4.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                  <!-- <div class="carousel-item">
                    <img src="{{ asset('img/slid5.jpg') }}" class="d-block w-100" alt="...">
                  </div> -->
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </a>
              </div>

        </div>

    </div>

</div>
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


<script src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" crossorigin="anonymous"></script>
<script src="{{ URL::asset('assets/plugins/telephoneinput/utils.js') }}"></script>
<script>
    $(function () {
        $('#dp').datepicker();
    });

    $(function () {
        // International Telephone Input
        var input = document.querySelector("#client_phone");
        window.intlTelInput(input, {
            utilsScript: "{{ URL::asset('assets/plugins/telephoneinput/utils.js') }}",
        });
    });
</script>

</body>

</html>
