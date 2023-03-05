<!doctype html>
                        <html dir="rtl">
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Snippet - GoSNippets</title>
                                <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <style>

.card {
  background-image: url('assets/img/media/login.png');
  background: #e6e3e4;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #753a88, #cc2b5e);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #753a88, #cc2b5e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
    background: #cc2b5e;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #753a88, #cc2b5e);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #753a88, #cc2b5e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    height: 100%;
}

h1, h1 {
    font-size: calc(1.375rem + 1.5vw);
    font-family: fantasy;
    color: honeydew;
    text-align: center
}
.h2, h2 {
    color: gold;
    font-size: calc(1.325rem + .9vw);
    font-family: Cairo
}
p {
    color: floralwhite;
    margin-top: 0;
    margin-bottom: 1rem;
}
.booking-form .form-control::-webkit-input-placeholder {
    color: rgba(62, 72, 92, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
    color: rgba(62, 72, 92, 0.3);
}



</style>
                                 </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                            <div id="booking" class="section">
                                <div class="card">


                      <div class="row">
                        <div class="col-md-7 col-md-push-5">
                          <div class="booking-cta">
                            <h1 >Thank You</h1>
                            <h2>{{$appointment->client->client_name}}</h2>
                            <p>شكرا لتسجيل الحجز وستصلك رسالة لتأكيد موعد الحجز</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </div>   <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>



                            <!-- ALL JS FILES -->

                            <script src="{{ asset('js/app.js')}}"></script>

                        </body>
                    </html>
