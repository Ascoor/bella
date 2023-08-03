// app.js
import { createPopper } from '@popperjs/core';
window.Popper = createPopper;
import 'bootstrap';

import 'jquery-ui';

import intlTelInput from 'intl-tel-input'; // Import intl-tel-input using ES6 syntax
import '@fortawesome/fontawesome-free';
import 'pusher-js';
import 'select2';

import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

// Function to initialize international telephone input
function initInternationalTelephoneInput() {
    var input = document.querySelector("#client_phone");
    intlTelInput(input, {
        // utilsScript: "{{ URL::asset('assets/plugins/telephoneinput/utils.js') }}",
    });
}

// Function to handle the carousel
function carousel() {
    // Initialize the carousel
    $("#carouselExampleIndicators").carousel();

    // Toggle carousel visibility when carousel control buttons are clicked
    $(".carousel-control-prev, .carousel-control-next").on("click", function () {
        $(".carousel-container").toggle();
    });
}

// Call the function to initialize international telephone input
initInternationalTelephoneInput();

// Call the function to handle the carousel
carousel();

// Initialize the date picker
$(document).ready(function () {
    $('#dp').datepicker();
});
