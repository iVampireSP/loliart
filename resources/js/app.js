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

window.currentRoute = null;

window.Progress = {
    show: () => {
        $('#top-progress').fadeIn(100)
    },
    hide: () => {
        $('#top-progress').fadeOut(100)
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

    currentRoute = route().current();

    $(document).pjax('a', '.pjax-container');

    $(document).on('pjax:start', () => {
        Progress.show()
    });

    $(document).on('pjax:end', () => {
        Progress.hide();
    });

    $(document).on("pjax:complete", () => {
        util.menu.update();
        ui.mutation()
        currentRoute = route().current();
    })

    $(document).on("pjax:timeout", (event) => {
        event.preventDefault()
    });
})
