require('./bootstrap');

import Echo from 'laravel-echo'
// window.io = require('socket.io-client');
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});

window.Progress = {
    show: () => {
        $('#top-progress').show()
    },
    hide: () => {
        $('#top-progress').hide()
    }
}

$(document).ajaxStart(() => {
    Progress.show()
});

$(document).ajaxComplete(() => {
    Progress.hide()
});

$.ajaxSetup({
    global: true,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: "json",
});
