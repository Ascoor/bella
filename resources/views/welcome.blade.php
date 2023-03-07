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

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli&amp;display=swap" />
  <link rel="stylesheet" href="assets/css/FORM.css?h=b06fa1b6f2184b1976127ae923a27995" />
  <link rel="stylesheet" href="assets/css/Pretty-Registration-Form-.css?h=74cbd162836abb1eda12ebcad200c88a" />
  <link rel="stylesheet" href="assets/css/Carousel.css" />
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="56">
  <header class="masthead" style="
                background: url('img/bg-pattern.png?h=88366d218f2eda574d88b27e4cb4169d'),
                    linear-gradient(to left, #7b4397, #dc2430);
            ">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-11 col-xl-12 col-xxl-12 ms-md-0 me-md-5">
          <div class="row register-form me-md-0 ms-md-5 mt-md-0 ps-md-0">
            <div class="col-sm-12 col-lg-5 col-xl-5 col-xxl-5 my-auto">
              <div class="device-container">
                <div class="device-mockup iphone6_plus portrait white">
                  <div class="device" style="
                                                background-image: url('img/iphone_6_plus_white_port.png?h=a8ad898987fd6ec9bbde741517f4cbb9');
                                            ">
                    <aside class="screen">
                      <div id="myCarousel" class="carousel-indicators" data-ride="carousel" data-interval="5000">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{ asset('img/slid6.png') }}" class="d-block  " alt="First slide">
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
                            <img src="{{ asset('img/slid5.jpg') }}" class="d-block h-100 w-100" alt="Third slide">
                          </div>
                        </div>
                      </div>

                    </aside>

                    <div class="button"></div>
                  </div>
                </div>
              </div>
              <div class="iphone-mockup"></div>
            </div>

            <div class="col-sm-11 col-lg-6 col-xl-5 col-xxl-6 ps-md-0 me-md-5 ms-md-0 pe-md-0">

              <form class="custom-form pe-md-0 me-md-0" method="post" action="{{ route('appointments.submitForm') }}">
                @csrf

                <div class="row form-group">
                  <div class="col-sm-4 label-column">
                    <label class="col-form-label" for="name-input-field">الإسم </label>
                  </div>
                  <input type="text" id="client_name" name="client_name" class="form-control text-center">
                </div>

                <div class="row form-group">
                  <div class="col-sm-4 label-column">
                    <label class="col-form-label" for="name-input-field">الطبيب </label>
                  </div>
                  <select name="doctor_id" id="doctor_id" class="form-select @error('doctor_id') is-invalid @enderror">

                    <option value="">إختر الطبيب</option>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                  </div>
                  </select>
                  @error('doctor_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror

                <div class="row form-group">
                  <div class="col-sm-4 label-column">
                    <label class="col-form-label" for="name-input-field">تاربخ وموعد الحجز </label>
                  </div>
                  <input type="datetime-local" id="apt_datetime" name="apt_datetime" class="form-control text-center">

                </div>

                  @error('apt_datetime')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror

                <div class="row form-group">
                  <div class="col-sm-4 label-column">
                    <label class="col-form-label" for="name-input-field">رقم الجوال </label>
                  </div>
                  <input type="tel" id="client_phone" name="client_phone" class="form-control">

                </div>
                <div class="col-sm-4 label-column">

                  <button class="btn btn-light submit-button" type="button">أحجز الأن</button>
                </div>
              </form>
            </div>
          </div>
        </div>


      <div class="col-sm-11 col-lg-7 col-xl-9 my-auto">
        <div class="mx-auto header-content"></div>
      </div>


  </header>
  <footer>
    <div class="container">
      <p> <span>Copyrights ©
          <a class="afoot" href="https://wwww.ask-ar.com"> Ask-ar T.S </a>
          all rights reserved © 2023
        </span></p>

    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/new-age.js?h=8fc3cc14032ee2938bb61494b90187ba"></script>


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