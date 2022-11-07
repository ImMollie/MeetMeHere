window.$ = require('jquery');
window._ = require('lodash');



require('bootstrap');
require('bootstrap-icons/font/bootstrap-icons.css');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */



 window.Pusher = require('pusher-js');

 import Echo from "laravel-echo"

 window.Echo = new Echo({
     broadcaster: 'pusher',
     key: 'b3942a496c5d19eaee0c',
     cluster: 'eu',
     encrypted: true     
 });