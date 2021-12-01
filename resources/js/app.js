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

    $(document).on("pjax:error", (event) => {
        event.preventDefault()
        window.history.back();
    });

    $(document).ajaxError(function (event, xhr, options, data) {
        if (xhr.status !== 200) {
            mdui.snackbar({
                position: 'right-bottom',
                message: 'Request failed.'
            })
        }

    });

    if (window.history && window.history.pushState) {
        window.onpopstate = () => {
            util.menu.update();
            ui.mutation();
            util.theme.reload();
        };
    }

    util.menu.update()
    var title = document.title;
    title = title.replace(' - ' + app.data.name, '');
    $('#top-title').text(title);
    util.theme.version();
})
