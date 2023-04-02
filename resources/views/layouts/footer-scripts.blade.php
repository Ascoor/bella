<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<!-- Initialize Pusher with your app key -->
<script>
    var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
    });
</script>
<!-- Listen for the NewAppointment event -->
@auth
    <script>
        var channel = pusher.subscribe('appointment.{{ auth()->user()->id }}');
        channel.bind('App\\Events\\NewAppointment', function(data) {
            // Update the notification icon to show that there are unread notifications
            $('.main-header-notification .pulse').removeClass('off').addClass('on');

            // Display the notification message
            var message = 'New appointment from ' + data.client_name + ' on ' + data.appointment_date;
            toastr.info(message);
        });
    </script>
@endauth
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<!-- Bootstrap Bundle js -->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/ionicons/ionicons.js')}}"></script>

    <!-- moomet min js -->
    <script src="{{ URL::asset('assets/plugins/moment/min/moment.min.js') }}"></script>
    <!--Internal  Date picker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}">
    </script>
    <!--Internal  Fullcalendar js -->
    <script src="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}">
    </script>
<!-- Rating js-->
<script src="{{URL::asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('assets/plugins/rating/jquery.barrating.js')}}"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <!--Internal App calendar js -->
    <script src="{{ URL::asset('/js/app.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app-calendar-events.js') }}"></script>
    <script src="{{ URL::asset('assets/js/doc-calendar.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('assets/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('assets/plugins/side-menu/sidemenu.js')}}"></script>
