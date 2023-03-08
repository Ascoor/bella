<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Home - Brand</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&amp;display=swap" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" integrity="sha512-eU5QbU6AtJy1VzSjBn+H45uJnOdZD7QMKj3q4Hbf4lztmEd/fmOWVJXrZq3q/8D8jv19TnFtRsl28tHLsQmtCg==" crossorigin="anonymous" />

  <!--Internal  TelephoneInput css-->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/FORM.css?h=b06fa1b6f2184b1976127ae923a27995" />
  <link rel="stylesheet" href="assets/css/Pretty-Registration-Form-.css?h=74cbd162836abb1eda12ebcad200c88a" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

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
  width: 850px;
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

<body class="d-flex h-100 text-center text-white " style="
background: url('img/bg-pattern.png?h=88366d218f2eda574d88b27e4cb4169d'),
    linear-gradient(to left, #7b4397, #dc2430);">

<div class="container-fluid">
    <header class="mb-auto">
  <div>
    <!-- <h3 class="float-md-start mb-0">Cover</h3> -->
    <nav class="nav nav-masthead justify-content-center float-md-end">
      <!-- <a class="nav-link active" aria-current="page" href="#">Home</a>
      <a class="nav-link" href="#">Features</a>
      <a class="nav-link" href="#">Contact</a> -->
    </nav>
  </div>
</header>
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
<br/>
        <h2 class="my-3 text-center text-light text-uppercase">سجل بياناتك</h2>

          <!-- Add your appointment form code here -->
          <img src="{{ asset('img/loog.png') }}" class="me-1" width="250" height="175" >
                <form method="post" action="{{ route('appointments.submitForm') }}">

                      @csrf
                    <div class="form-row">
                      <label for="name"  class="text-uppercase" >الإسم</label>
                      <input type="text" id="client_name" name="client_name" class="form-control" placeholder="الإسم">
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

                  <div class="form-group mt-4">
                    <label for="phone" class="text-uppercase">رقم الجوال</label>
                    <input type="tel" id="client_phone" name="client_phone" class="form-control" placeholder="إدخل رقم الجوال، مثال: +971 5XX XXXX">
                  </div>
                </form>

      </div>
      <div class="col-md-6 col-lg-5">
        <h2>Our Doctors</h2>
        <div id="doctor-carousel" class="carousel slide" data-bs-ride="carousel">
          <!-- Add your carousel slider code here -->

    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">

        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="{{ asset('img/slid6.png') }}"  class="d-block w-100 slide-image" alt="First slide">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/slid2.jpg') }}"  class="d-block w-100 slide-image" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/slid3.jpg') }}"  class="d-block w-100 slide-image" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/slid4.jpg') }}"  class="d-block w-100 slide-image" alt="Fourth slide">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/slid5.jpg') }}"  class="t-block w-100 slide-image" alt="Fifth slide">
          </div>
        </div>
      </div>
    </div>


        </div>

    </div>

    <footer class="mt-auto text-white-50">
        <p> <span>Copyrights ©
            <a class="afoot" href="https://wwww.ask-ar.com"> Ask-ar T.S </a>
            all rights reserved © 2023
        </span></p>
    </footer>
</div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->

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
