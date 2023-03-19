<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{route('home')}}"><img
                src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{route('home')}}"><img
                src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{route('home')}}"><img
                src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{route('home')}}"><img
                src="{{ URL::asset('assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{ URL::asset('assets/img/faces/6.jpg') }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">برنامج إدارة عيادات بيلا  كلينك</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'home')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label">الرئيسية</span></a>
            </li>


                <li class="side-item side-item-category">الحجوزات والفواتير</li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="#FFFFFF"><path d="M0 0h24v24H0z" fill="none"/><path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/></svg>
<span class="side-menu__label">الحجوزات</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">

                            <li><a class="slide-item" href="{{ url('/appointments') }}">قائمة الحجوزات</a></li>





                            <li><a class="slide-item"  href="{{ route('appointments.sort', ['status' => 'pending']) }}">الحجوزات بقائمة الإنتظار</a>


                        </li>


                            <li><a class="slide-item"  href="{{ route('appointments.sort', ['status' => 'processing']) }}">الحجوزات قيد التنفيذ</a>
                            </li>




                            <li><a class="slide-item" href="{{ route('appointments.sort', ['status' => 'Complete']) }}"> الحجوزات المنفذه</a></li>

                                                        <li><a class="slide-item" href="{{ route('appointments.sort', ['status' => 'cancelled']) }}">
                                                                الحجوزات الملغاه</a>
                                                        </li>

                    </ul>

                    <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
  <path d="M0 0h24v24H0V0z" fill="none" />
  <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 16H6V6h12v12zm-8-8H8v2h2v-2zm0-4H8v2h2V6zm4 4h-2v2h2v-2zm0-4h-2v2h2V6z" />
</svg>
<span class="side-menu__label">الفواتير</span><i class="angle fe fe-chevron-down"></i></a>
      	<ul class="slide-menu">
							<li><a class="slide-item" href="{{route('invoices.index')}}">قائمة الفواتير</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='chart-chartjs') }}">الفواتير المسددة</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='chart-echart') }}">الفواتير المسددة جزئيا</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='chart-flot') }}">الفواتير الغير مسدده </a></li>

						</ul>
					</li>


                <li class="side-item side-item-category"> إدارة الحسابات</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="21" height="21" fill="#ffff" viewBox="0 0 640 512"><path d="M320 144c-53.02 0-96 50.14-96 112 0 61.85 42.98 112 96 112 53 0 96-50.13 96-112 0-61.86-42.98-112-96-112zm40 168c0 4.42-3.58 8-8 8h-64c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h16v-55.44l-.47.31a7.992 7.992 0 0 1-11.09-2.22l-8.88-13.31a7.992 7.992 0 0 1 2.22-11.09l15.33-10.22a23.99 23.99 0 0 1 13.31-4.03H328c4.42 0 8 3.58 8 8v88h16c4.42 0 8 3.58 8 8v16zM608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zm-16 272c-35.35 0-64 28.65-64 64H112c0-35.35-28.65-64-64-64V176c35.35 0 64-28.65 64-64h416c0 35.35 28.65 64 64 64v160z"/></svg>
<span class="side-menu__label">الحسابات</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
							<li><a class="slide-item" href="{{url('expenses_revenues')}}">قائمة المصروفات والإيرادات</a></li>
							<li><a class="slide-item" href="{{ route('expenses.index') }}">المصروفات</a></li>
							<li><a class="slide-item" href="{{ route('revenues.index') }}">الإيرادات</a></li>

                    </ul>
                </li>
                <li class="side-item side-item-category"> إدارة العملاء</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
  <path d="M0 0h24v24H0V0z" fill="none"/>
  <path d="M19.6 4H4.4C3.17 4 2.16 5.01 2.16 6.24v11.52c0 1.23 1.01 2.24 2.24 2.24h15.12c1.23 0 2.24-1.01 2.24-2.24V6.24c0-1.23-1.01-2.24-2.24-2.24zM12 7.5c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5 1.12-2.5 2.5-2.5zm6.6 10.24c0 .69-.56 1.24-1.24 1.24H6.64c-.69 0-1.24-.56-1.24-1.24V8.76c0-.69.56-1.24 1.24-1.24h10.72c.69 0 1.24.56 1.24 1.24v8.98z"/>
</svg>
<span class="side-menu__label">العملاء</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
							<li><a class="slide-item" href="{{url('clients')}}">قائمة العملاء</a></li>


                    </ul>
                </li>

                <li class="side-item side-item-category"> إدارة شئون العاملين</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-menu__icon">
  <path d="M0 0h24v24H0V0z" fill="none"/>
  <path d="M13 11v-3h3v-2h-3V3h-2v3H8v2h3v3zm9 9h-6v-2h6v-6h-2V8.08A3.92 3.92 0 0 0 16.08 4H7.92A3.92 3.92 0 0 0 4 8.08v7.84A3.92 3.92 0 0 0 7.92 20h7.84A3.92 3.92 0 0 0 20 16.08V14h2v6z"/>

  <circle cx="22.5" cy="8.5" r="1.5"/>
</svg>
<span class="side-menu__label"> الفريق الطبي</span><i class="angle fe fe-chevron-down"></i></a>

					<ul class="slide-menu">
							<li><a class="slide-item" href="{{route('doctors.index')}}">قائمة الأطباء </a></li>
							<li><a class="slide-item" href="{{route('assests.index')}}">قائمة المساعدين</a></li>

						</ul>
					</li>


                <!-- <li class="side-item side-item-category">المستخدمين</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                            <path
                                d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                        </svg><span class="side-menu__label">المستخدمين</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">

                            <li><a class="slide-item" href="{{ url('/' . ($page = 'users')) }}">قائمة المستخدمين</a></li>



                            <li><a class="slide-item" href="{{ url('/' . ($page = 'roles')) }}">صلاحيات المستخدمين</a></li>

                    </ul>
                </li> -->



                <li class="side-item side-item-category">الاعدادات</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
  <path d="M0 0h24v24H0V0z" fill="none"/>
  <path d="M19.9 12c0-.6-.1-1.1-.2-1.6l1.7-1.3c.2-.2.3-.5.1-.8l-1.7-3c-.2-.4-.6-.6-1-.6H17c-.4 0-.7.2-.9.5L15 6.8c-.2.2-.5.3-.8.1L12.6 5c-.5-.2-1-.2-1.5-.2v2.1c0 .4-.2.8-.5 1L9 9.9c-.2.2-.3.5-.1.8l1.7 3c.2.4.6.6 1 .6h.2c.1.5.2 1 .2 1.6l-1.7 1.3c-.2.2-.3.5-.1.8l1.7 3c.2.4.6.6 1 .6h.2c.4 0 .7-.2.9-.5l1.1-1.6c.2-.2.5-.3.8-.1l2.4 1.7c.4.3.9.3 1.4.3v-2.1c0-.4.2-.8.5-1l1.5-1.1c.2-.2.3-.5.1-.8l-1.7-3c-.3-.3-.7-.5-1.1-.5h-.1z"/>
  <path d="M12 15.5c1.9 0 3.5-1.6 3.5-3.5s-1.6-3.5-3.5-3.5-3.5 1.6-3.5 3.5 1.6 3.5 3.5 3.5zm0-5.5c1 0 1.9.8 1.9 1.9S13 14.9 12 14.9 10.1 14.1 10.1 13s.8-1.4 1.9-1.4z"/>
</svg>
<span class="side-menu__label">الاعدادات</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">

                            <li><a class="slide-item" href="{{ url('/expense_types') }}">انواع المصروفات</a></li>
                            <li><a class="slide-item" href="{{ url('/income_types') }}">انواع الإيرادات</a></li>
                            <li><a class="slide-item"href="{{ route('services.index') }}"> الخدمات</a></li>

                            <li><a class="slide-item" href="{{ route('sections.index') }}">الأقسام </a></li>


                    </ul>
                </li>

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
