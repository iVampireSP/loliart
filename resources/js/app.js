window.jQuery = window.$ = require('jquery')
window.axios = require('axios')
require('jquery-pjax');
require('./util');
require('./util.event');
require('./util.team');
require('./util.theme');
require('./util.wings');
require('./ziggy');
require('./echo');

window.e = {}

window.ui = window.mdui = require('./mdui');

window.currentRoute = null;

window.Progress = {
    start: () => {
        $('#loader').addClass('loader-active')
    },
    done: () => {
        $('#loader').removeClass('loader-active')
    }
}

$(document).ajaxStart(() => {
    Progress.start();
    reload_menu = false
});

$(document).ajaxComplete(() => {
    Progress.done();
    util.masonry('.masonry')
});

$.ajaxSetup({
    global: true,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: "json",
});

window.console.line = 0;

document.onreadystatechange = Progress.done;

window.firstClick = false

// links_loaded = false
$(() => {
    Progress.done();

    util.theme.update();

    currentRoute = route().current();

    $.pjax.defaults.timeout = 10000;
    $(document).pjax('a', '.pjax-container');

    $(document).on('pjax:send', () => {
        // links_loaded = false
        Progress.start();
    });

    $(document).on("ready pjax:end", () => {
        Progress.done()
        util.menu.update();
        ui.mutation()
        currentRoute = route().current();

        if (typeof m != 'undefined' && typeof m.loaded != 'undefined') {
            m.loaded();
        }

        if (window.last_url != window.location.href) {
            let msg = window.user.name + ': I am visiting: ' + `${document.title}(${window.location.href})`;
            util.team.log(msg);
        } else {
            window.last_url = window.location.href
        }


        // if ($('.pages-link').length > 0) {
        //     if (!links_loaded) {
        //         util.reload('.pages-link')
        //     }
        //     links_loaded = true
        // }
    })

    $(document).on("pjax:timeout", (event) => {
        event.preventDefault()
        util.play('alert.mp3', 0.2)

    });

    $(document).on("pjax:beforeReplace", () => {
        // window.m = {};
    });

    $(document).on("pjax:error", (event, xhr) => {
        if (xhr.statusText == 'abort') {
            event.preventDefault();
        } else {
            window.history.back();
            util.theme.warning();
            util.play('error_1.wav')
        }

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
        } else if (xhr.statusText !== 'abort') {
            util.play('error_1.wav')
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
                let total = $('.mdui-ripple-wave').length;
                for (let i = 0; i < total; i++) {
                    $($('.mdui-ripple-wave')[i]).remove()
                }
            }, 1000)
        };
    }

    util.menu.update();
    util.theme.update();
    util.theme.version();

    util.event.listen();

    if (window.top === window && window.console) {
        let console_style = 'font-size: 24px;';

        for (let i = 0; i < 10; i++) {
            // if ($('#helper-link').css('content') == '"dark"') {
            //     console_style = 'font-size: 24px;';
            // } else {
            //     console_style = 'font-size: 24px;';
            // }
            window.console.log('%c%s', console_style, $('#helper-link').attr('data-console-alert'));
            window.console.log('');

        }
    }

    // 监听用户点击，播放空音频
    window.addEventListener('click', () => {
        let isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
        if (!isSafari) {
            if (!firstClick) {
                firstClick = true
                util.play('error_1.wav', 0)
                util.play('success_1.wav', 0)
                util.play('alert.mp3', 0)

                // 防止误退出
                // window.onbeforeunload = () => {
                //     return true;
                // };

            }
        }

        util.masonry('.masonry')

    })
    util.masonry('.masonry')

    $('.copy-year').text(new Date().getFullYear())

    $('.edge-standing, .queue_message').click(() => {
        util.console.open()
    })
})

window.addEventListener('online', () => {
    $('#offline_tip').fadeOut()
    util.play('success_1.wav')

})
window.addEventListener('offline', () => {
    $('#offline_tip').fadeIn()
    util.play('error_1.wav')
})

window.onerror = (err) => {
    ui.snackbar({
        message: err
    });
}
