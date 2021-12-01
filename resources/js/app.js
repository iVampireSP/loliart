// require('./bootstrap');

import Echo from 'laravel-echo'

import ui from 'mdui'
import NProgess from 'nprogress'

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

// window.Progress = {
//     show: () => {
//         $('#top-progress').fadeIn(100)
//     },
//     hide: () => {
//         $('#top-progress').fadeOut(100)
//     }
// }

$(document).ajaxStart(() => {
    NProgess.start();
});

$(document).ajaxComplete(() => {
    NProgess.done();

});

$.ajaxSetup({
    global: true,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: "json",
});


document.onreadystatechange = NProgess.done;

$(() => {
    NProgess.done();

    util.theme.update();

    currentRoute = route().current();

    $(document).pjax('a', '.pjax-container');

    $(document).on('pjax:start', () => {
        NProgess.start();
    });

    $(document).on('pjax:end', () => {
        NProgess.done()
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
        event.preventDefault();
        util.theme.warning();
        window.history.back();
    });

    $(document).ajaxError((event, xhr, options, data) => {
        if (xhr.responseJSON != null && xhr.responseJSON != undefined) {
            let json = xhr.responseJSON;
            for (let i in json.errors) {
                ui.snackbar({
                    position: 'right-bottom',
                    message: json.errors[i]
                })
            }
        } else if (!xhr.responseText.status) {
            ui.snackbar({
                position: 'right-bottom',
                message: 'Something went wrong.'
            })

        } else {
            util.theme.warning();
        }
    });

    if (window.history && window.history.pushState) {
        window.onpopstate = () => {
            util.menu.update();
            ui.mutation();
            util.theme.reload();
            if ($('.mdui-tab-indicator').length) {
                $('.mdui-tab-indicator')[0].remove()
            }
        };
    }

    util.menu.update()
    var title = document.title;
    title = title.replace(' - ' + app.data.name, '');
    $('#top-title').text(title);
    util.theme.version();
})
