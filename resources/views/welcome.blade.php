  <!DOCTYPE html>
  <html lang="ar" dir="rtl">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
      <title>Bella - Appointment</title>

      <script src="{{ URL::asset('js/welcome.js') }}"></script>

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&display=swap">
      <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
      <!-- Internal CSS -->
      <!-- Add these links inside the <head> tag -->
      <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
      <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
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
      background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8));
      z-index: 1;
    }

    .image-container img {
      display: block;
      max-width: 100%;
      height: auto;
      z-index: 2;
    }

.slide-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
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

    /* New CSS to handle responsive layout */
    .content-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: flex-start;
      max-width: 1200px;
      margin: 0 auto;
    }

    .form-container {
      flex-basis: 100%;
      max-width: 400px;
      margin-bottom: 20px;
    }

    .carousel-container {
      flex-basis: 100%;
      max-width: 600px;
    }

    @media (min-width: 768px) {
      /* Arrange the form and carousel in a row for medium and large devices */
      .form-container,
      .carousel-container {
        flex-basis: 50%;
      }
    }

    /* Additional styles for full-page welcome */
    body,
    html {
      height: 100%;
      overflow: hidden;
    }

    .container {
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .container > * {
      flex: 1;
    }
      </style>
  </head><body class="h-100 text-center text-white" style="
  background: url('img/bg-pattern.png?h=88366d218f2eda574d88b27e4cb4169d'),
  linear-gradient(to left, #7b4397, #dc2430);">
      <div class="container">
          <header class="mb-auto p-3" style="font-family: monospace; font-size: 16px;">

            <img src="{{ asset('img/loog.png') }}" width="200" height="100">
            <h2 class="text-nav" style="
                font-family: cursive;
                font-size: 24px;
              ">Bella Online Appointment</h2>
          <nav class="nav nav-masthead justify-content-center float-md-end">
              <!-- <a class="nav-link active" aria-current="page" href="#">Home</a><a class="nav-link" href="#">Services</a><a class="nav-link" href="#">About Us</a><a class="nav-link" href="#">Contact Us</a> -->
          </nav>
        </header> <div class="content-container">
          <div class="form-container">
            <form method="post" action="{{ route('appointments.submitForm') }}">
              <h2 class="my-3 text-center text-light text-uppercase">سجل بياناتك</h2>
              <!-- Add your appointment form code here --> @csrf
              <div class="form-group mt-4">
                <label for="name" class="text-uppercase">الإسم</label>
                <input type="text" id="client_name" name="client_name" class="form-control" placeholder="الإسم">
              </div>
              <div class="form-group mt-4">
                <label for="phone" class="text-uppercase">رقم الجوال</label>
                <input type="tel" id="client_phone" name="client_phone" class="form-control" placeholder="إدخل رقم الجوال، مثال: +971 5XX XXXX">
              </div>
              <div class="form-group mt-4">
                <label for="booking-date" class="text-uppercase">الطبيب</label>
                <select name="doctor_id" id="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror">
                  <option value="">إختر الطبيب</option> @foreach($doctors as $doctor) <option value="{{ $doctor->id }}">{{ $doctor->name }}</option> @endforeach
                </select>
              </div> @error('doctor_id') <div class="invalid-feedback">{{ $message }}</div> @enderror <div class="form-group mt-4">
                <label for="email" class="text-uppercase">تاريخ وموعد الحجز</label>
                <input type="datetime-local" name="apt_datetime" id="apt_datetime" class="form-control @error('apt_datetime') is-invalid @enderror">
              </div>

              <div class="form-group mt-4">
                <button type="submit" class="btn btn-danger-gradiant btn-block text-uppercase">إحجزك الأن</button>
              </div>
            </form>
          </div>
<!-- Add the HTML code for the carousel -->
<div class="carousel-container">
  <div id="carouselExampleIndicators" class="carousel slide mt-6" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('img/slid6.png') }}" class="d-block w-100 slide-image" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/slid2.jpg') }}" class="d-block w-100 slide-image" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/slid3.jpg') }}" class="d-block w-100 slide-image" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/slid4.jpg') }}" class="d-block w-100 slide-image" alt="...">
      </div>
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

  <br/>
          <p>
            <span>Copyrights © <a class="afoot" href="https://wwww.ask-ar.com"> Ask-ar T.S </a> all rights reserved © 2023 </span>
          </p>
        </div>

      <!-- Footer script -->

      <script>
  // Function to initialize the carousel
  function initCarousel() {
    $("#carouselExampleIndicators").carousel();
  }

  // Call the function to initialize the carousel when the document is ready
  $(document).ready(function () {
    initCarousel();
  });
  // Function to initialize international telephone input
function initInternationalTelephoneInput() {
    var input = document.querySelector("#client_phone");
    intlTelInput(input, {
        // utilsScript: "{{ URL::asset('assets/plugins/telephoneinput/utils.js') }}",
    });
}
// Call the function to initialize international telephone input
initInternationalTelephoneInput();

</script>
    </body>
  </html>
