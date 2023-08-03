import $ from 'jquery';
window.jQuery = $;
window.$ = $;

import 'bootstrap';
import 'bootstrap-datepicker';
import '@popperjs/core';
import 'intl-tel-input';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'intl-tel-input/build/css/intlTelInput.css';
import intlTelInput from 'intl-tel-input';

// Rest of the code...
// Function to initialize international telephone input
function initInternationalTelephoneInput() {
    var input = document.querySelector("#client_phone");
    intlTelInput(input, {
      // options for intlTelInput if needed
    });
  }
$(function() {
     // Initialize international telephone input
  initInternationalTelephoneInput();
  // Initialize the carousel
  $("#carouselExampleIndicators").carousel();

  // Initialize international telephone input
  var input = document.querySelector("#client_phone");
  intlTelInput(input, {
    // options for intlTelInput if needed
  });

  // Initialize the date picker
  $('#dp').datepicker();
});


