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

    <!-- CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
  <link href="{{URL::asset('/css/dash.css')}}" rel="stylesheet">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="
background: url('../img/bg-pattern.png?h=88366d218f2eda574d88b27e4cb4169d'), linear-gradient(to left, #7b4397, #130e2d)">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/doctor/dashboard') }}">
        <img src="/img/logo.png" alt="" width="150" height="80" class="d-inline-block align-text-top">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @auth


          <li class="nav-item">
            <a class="nav-link" href="/doctor/dashboard">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/doctor/appointments">Appointments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/doctor/clients">Clients</a>
          </li>
<ul></ul>
<ul></ul>
<ul></ul>

<li>

    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
    </form>

</li>
<ul></ul>
<ul></ul>
<div class="menu-header-content  text-right">
<a class="dropdown-item" href="{{ route('doctor_notifications') }}">
    <i class="feather icon-bell"></i> الإشعارات
    <span class="badge badge-pill badge-primary">{{ auth()->guard('doctor')->user()->unreadNotifications->count() }}</span>
</a>


  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <div class="card" style="width: 18rem;">
      <div class="card-header">
        الإشعارات
      </div>
        <ul class="list-group list-group-flush text-center">
        @forelse(auth()->guard('doctor')->user()->unreadNotifications as $notification)
          <li class="list-group-item">
            <a href="{{ route('appointments.show', $notification->data['appointment_id']) }}" data-id="{{ $notification->id }}">
              تم تسجيل جديد من {{ $notification->data['client_name'] }} في يوم {{ $notification->data['appointment_date'] }}
              @if(isset($notification->data['doctor_name']))
                مع الطبيب {{ $notification->data['doctor_name'] }}
    @endif
            </a>
          </li>
        @empty
          <li class="list-group-item">لا يوجد إشعارات جديدة</li>
        @endforelse
        </ul>
      </form>
    </div>
  </div>
</li>

</div>
@endauth
</ul>
      @if(auth()->guard('doctor')->check())


          <li class="nav-item">
              <a class="nav-link">دكتور /{{ auth()->guard('doctor')->user()->name }}</a>
            </li>

          @endauth
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <!-- Authentication Links -->
          @guest
          @if(Route::has('login'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @endif

          @if(Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
          @else
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>



        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        </div>
        </li>
        @endguest
        </ul>
        </div>
        </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
     <!-- Optional JavaScript; choose one of the two! -->
    <script src="{{URL::asset('js/dash.js')}}"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

-->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>
