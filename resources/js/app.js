// require('./bootstrap');

import Echo from 'laravel-echo'

import ui from 'mdui'

window.jQuery = window.$ = require('jQuery')
require('jquery-pjax');
require('./util');
require('./ziggy');

window.ui = window.mdui = ui

window.io = require('socket.io-client');

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

$(() => {
    util.theme.update();
    $(document).pjax('a', '.pjax-container');
    $(document).on('pjax:start', function () {
        Progress.show()
    });
    $(document).on('pjax:end', function () {
        Progress.hide();
    });
    $(document).on("pjax:timeout", function (event) {
        event.preventDefault()
    });
})
