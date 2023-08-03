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



