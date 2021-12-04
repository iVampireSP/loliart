import ui from 'mdui'
import NProgess from 'nprogress'

window.jQuery = window.$ = require('jquery')

require('jquery-pjax');
require('./util');
require('./util.event');
require('./util.team');
require('./util.theme');
require('./ziggy');
require('./echo');

window.ui = window.mdui = ui

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

    $(document).on("pjax:error", (event, xhr) => {
        if (xhr.statusText == 'abort') {
            event.preventDefault();
        } else {
            window.history.back();
        }
        util.theme.warning();

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
        } else {
            util.theme.warning();
        }
    });

    if (window.history && window.history.pushState) {
        window.onpopstate = () => {
            util.menu.update();
            ui.mutation();
            util.theme.reload();

            if ($('.mdui-tab-indicator').length > 1) {
                $('.mdui-tab-indicator')[0].remove()
            }

            setTimeout(() => {
                $('.mdui-ripple-wave').remove()
            }, 1000)
        };
    }

    util.menu.update();
    util.theme.update();
    util.theme.version();

    util.event.listen();

    if (window.top === window && window.console) {
        let console_style = 'font-size: 24px;';
        // if ($('#helper-link').css('content') == '"dark"') {
        //     console_style = 'font-size: 24px;';
        // } else {
        //     console_style = 'font-size: 24px;';
        // }
        window.console.log('%c%s', console_style, $('#helper-link').attr('data-console-alert'));

    }

})
