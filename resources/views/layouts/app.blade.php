<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Title -->
<title> @yield("title") </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">



    <link href="{{URL::asset('/css/app.css')}}" rel="stylesheet">
  <link href="{{URL::asset('/css/dash.css')}}" rel="stylesheet">


  <link href="{{URL::asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">

</head>
<body>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background: url('/img/bg-pattern.png?h=88366d218f2eda574d88b27e4cb4169d'), linear-gradient(to bottom, #101f3c, #422076)">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/doctor/dashboard') }}">
                <img src="/img/logo.png" alt="" width="150" height="80" class="d-inline-block align-text-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/doctor/dashboard">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/doctor/appointments">الحجوزات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/doctor/clients">العملاء</a>
                    </li>
                    <!-- Add more sidebar items here -->
                    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="badge bg-danger">{{ auth()->guard('doctor')->user()->unreadNotifications()->count() }}</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="card" style="width: 18rem;">
              <div class="card-header">
                الإشعارات
              </div>
              <ul class="list-group list-group-flush text-center">
                @foreach (auth()->guard('doctor')->user()->unreadNotifications as $notification)
                  <a class="d-flex p-3 border-bottom notification-item" href="{{ route('doctor_dashboard.show_appointment', $notification->data['appointment_id']) }}" data-id="{{ $notification->id }}">
                    <li class="list-group-item">
                      <a href="{{ route('doctor_dashboard.show_appointment', $notification->data['appointment_id']) }}" data-id="{{ $notification->id }}">
                        تم تأكيد حجز جديد من {{ $notification->data['client_name'] }} في يوم {{ $notification->data['appointment_date'] }}
                      </a>
                      {{ $notification->markAsRead() }}
                    </li>
                  </a>
                @endforeach



          <li class="list-group-item">لا يوجد إشعارات جديدة</li>


    </div>
  </div>


  @endauth
                </ul>
                @if (auth()->guard('doctor')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-bold text-light" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            دكتور / {{ auth()->guard('doctor')->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    تسجيل الخروج
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('register') }}">{{ __('التسجيل') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('doctor.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('تسجيل الخروج') }}
                                </a>
                                <form id="logout-form" action="{{ route('doctor.logout') }}"
                                    method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                @endif
            </div>
        </div>
    </nav>

    <div class="container pt-5">
        @yield('content')
    </div>

     <!-- Optional JavaScript; choose one of the two! -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <script src="{{URL::asset('js/app.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>


<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- moomet min js -->
<script src="{{URL::asset('assets/plugins/moment/min/moment.min.js')}}"></script>
<!--Internal  Date picker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  Fullcalendar js -->
<script src="{{URL::asset('assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<!-- Internal Select2.full.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<!--Internal App calendar js -->

<script src="{{URL::asset('assets/js/doc-calendar.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
    <script src="{{URL::asset('js/dash.js')}}"></script>


</body>

</html>
