
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}


//   Core JS Files

//<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
//require('./vendor/bootstrap.min.js');  
require('./vendor/material.min.js');  
require('./vendor/perfect-scrollbar.jquery.min.js');  

// Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert
//<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

// Library for adding dinamically elements
require('./vendor/arrive.min.js');  

// Forms Validations Plugin
require('./vendor/jquery.validate.min.js');

//  Plugin for Date Time Picker and Full Calendar Plugin-->
//require('./vendor/moment.min');

//  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/
require('./vendor/chartist.min.js');

//  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard
require('./vendor/jquery.bootstrap-wizard.js');

//  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/   
require('./vendor/bootstrap-notify.js');

//  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/
require('./vendor/bootstrap-datetimepicker.js');

// Vector Map plugin, full documentation here: http://jvectormap.com/documentation/
require('./vendor/jquery-jvectormap.js');

// Sliders Plugin, full documentation here: https://refreshless.com/nouislider/
require('./vendor/nouislider.min.js');

//  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select
require('./vendor/jquery.select-bootstrap.js');

require('./vendor/jquery.datatables.js');

// Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/
require('./vendor/sweetalert2.js');

// Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput
require('./vendor/jasny-bootstrap.min.js');

//  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar   
require('./vendor/fullcalendar.min.js');

// Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs 
require('./vendor/jquery.tagsinput.js');

// Material Dashboard javascript methods
require('./vendor/material-dashboard.js?v=1.3.0');

// Material Dashboard DEMO methods, don't include it in your project!
require('./vendor/demo.js');



/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
