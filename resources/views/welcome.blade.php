<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Home - Brand</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=a042b38f882c5db203767c9770c8f44d" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&amp;display=swap" />
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
  <!--Internal  TelephoneInput css-->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli&amp;display=swap" />
  <link rel="stylesheet" href="assets/css/FORM.css?h=b06fa1b6f2184b1976127ae923a27995" />
  <link rel="stylesheet" href="assets/css/Pretty-Registration-Form-.css?h=74cbd162836abb1eda12ebcad200c88a" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="56">
  <header class="masthead" style="
                background: url('img/bg-pattern.png?h=88366d218f2eda574d88b27e4cb4169d'),
                    linear-gradient(to left, #7b4397, #dc2430);">


        <div class="container h-80">
          <div class="row h-80">
          <div class="col-md-6 col-lg-6 p-0">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ asset('img/slid6.png') }}" class="d-block w-100" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('img/slid2.jpg') }}" class="d-block w-100" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('img/slid3.jpg') }}" class="d-block w-100" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('img/slid4.jpg') }}" class="d-block w-100" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('img/slid5.jpg') }}" class="d-block w-100" alt="Third slide">
                </div>
              </div>
            </div>
          </div>


          <div class="col-lg-6 col-xl-6 col-xxl-6 ms-md-0 me-md-5">
            <div class="mx-auto header-content">

              <div class="col-sm-8 col-lg-6 col-xl-9 my-auto">
              <img src="{{ asset('img/loog.png') }}" class="brand-logo w-50" >

                <h3 class="my-3 text-center text-light text-uppercase">سجل بياناتك</h3>
              </div>

            <div class="row form me-md-2 ms-md-5 mt-md-0 ps-md-0">

          <form method="post" action="{{ route('appointments.submitForm') }}">

                @csrf
              <div class="form-row">
                <label for="name" >الإسم</label>
                <input type="text" id="client_name" name="client_name" class="form-control" placeholder="الإسم">
              </div>
              <div class="form-group mt-4">
                <label for="booking-date" >الطبيب</label>
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
                <label for="email" >تاريخ وموعد الحجز</label>
                <input type="datetime-local" name="apt_datetime" id="apt_datetime" class="form-control @error('apt_datetime') is-invalid @enderror">
              </div>
              <div class="form-group mt-4">
                <label for="phone" >رقم الجوال</label>
                <input type="tel" id="client_phone" name="client_phone" class="form-control" placeholder="إدخل رقم الجوال">
              </div>
                <br/>
                <button type="submit" class="btn btn-danger-gradiant btn-block text-uppercase">إحجزك
                  الأن</button>
            </form>
            </div>
            <br/>
      </div>


  </header>
  <footer>
    <div class="container">
      <p> <span>Copyrights ©
          <a class="afoot" href="https://wwww.ask-ar.com"> Ask-ar T.S </a>
          all rights reserved © 2023
        </span></p>

    </div>
  </footer>\

<script>
  $(function() {
    $('#dp').datepicker();
  });

  $(function() {
    // International Telephone Input
    var input = document.querySelector("#client_phone");
    window.intlTelInput(input, {
      initialCountry: "auto",
      separateDialCode: true,
      utilsScript: "{{ URL::asset('assets/plugins/telephoneinput/utils.js') }}",
    });
  });
</script>
<!-- Required JavaScript files for Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/telephoneinput/utils.js') }}"></script>
<script src="{{ URL::asset('js/app.js') }}"></script>

<script>
  $(document).ready(function(){
    // Activate the carousel
    $("#myCarousel").carousel({interval: 5000});
});

</script>

</body>

</html>