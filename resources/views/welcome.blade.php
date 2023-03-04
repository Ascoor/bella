<!doctype html >
                        <html dir="rtl">
<head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Bella Clinic</title>
               <!-- CSS -->
<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">

<style>
  /* Center the form */
.container-fluid {
  background: brown;
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
  height: 100%;
}

/* Set the card body height */
.card-body {
  height: 100%;

    background: #a52a2a;
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

</style>

                            </head>
                            <body>
                            <div class="container-fluid">
  <div class="row">
  <div class="col-md-6 col-lg-5 p-0">

      <div class="card border-0">
        <div class="card-body">
          <h3 class="my-3 text-center text-light text-uppercase">إحجزك الأن</h3>
          <form method="post" action="{{ route('appointments.submitForm') }}">
    @csrf

            <div class="form-row">
              <label for="first-name" class="text-uppercase">الإسم</label>
              <input type="text" id="client_name" name="client_name" class="form-control" placeholder="الإسم">
            </div>
            <div class="form-group mt-4">
              <label for="booking-date" class="text-uppercase">الطبيب</label>
              <select name="doctor_id" id="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror">
            <option value="">إختر الطبيب</option>
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            @endforeach
        </select>
            </div>
        @error('doctor_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <div class="form-group mt-4">

              <label for="email" class="text-uppercase">تارخ وموعد الحجز</label>
              <input type="datetime-local" name="apt_datetime" id="apt_datetime" class="form-control @error('apt_datetime') is-invalid @enderror">
            </div>
            <div class="form-group mt-4">
              <label for="phone" class="text-uppercase">رقم الجوال</label>
              <input type="tel" id="client_phone" name="client_phone"class="form-control" placeholder="إدخل رقم الجوال">
            </div>



            <div class="form-group mt-5">
              <button type="submit" class="btn btn-danger-gradiant btn-block text-uppercase">سجل حجزك</button>
            </div>
          </form>
        </div>


            </div>
      </div>
      <div class="col-md-6 col-lg-7 p-0">
    <div class="card border-0">
      <img src="{{ asset('img/back2.jpeg') }}" class="card-img">
    </div>
      </div>



    <!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK" crossorigin="anonymous"></script>



<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
                      <script>
                        $(function() {
  $('#dp').datepicker();
});$(function() {

// International Telephone Input
var input = document.querySelector("#client_phone");
  window.intlTelInput(input, {
    utilsScript: "assets/plugins/telephoneinput/utils.js",
  });
});
                        </script>

                        </body>
                    </html>
