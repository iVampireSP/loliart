require('./bootstrap');

import Echo from 'laravel-echo'
// window.io = require('socket.io-client');
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});

window.Echo.channel('workbench_database_test-event')
    .listen('ExampleEvent', (e) => {
        console.log(e);
    });
