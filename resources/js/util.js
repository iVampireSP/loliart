window.util = {
    url: {
        to: (url, ele = '.pjax-container') => {
            history.pushState(null, null, url);
            $.pjax.reload(ele);
        },
        open: (url) => {
            window.location = url
        }
    },
    reload: (ele = '.pjax-container') => {
        $.pjax.reload(ele)
        $('.mdui-tooltip-open').remove()
    },
    toggleLock: (id, play = false) => {
        let btn = `[data-lock-btn="${id}"]`
        let form = `[data-lock-form="${id}"]`
        let j = $(`${btn} i`)
        if (j.hasClass('locked')) {
            j.html('lock_open')
            $(`${form} input:not([data-lock-pass])`).attr('readonly', false)
            $(`${form} input:not([data-lock-pass]`).attr('disabled', false)
            $(`${form} button:not([data-lock-pass]`).attr('disabled', false)
            $(`${form} span:not([data-lock-pass]`).attr('disabled', false)
            $(`${form} a:not([data-lock-pass]`).attr('disabled', false)
            $(`${form} *:not([data-lock-pass]`).css('pointer-events', 'auto')
            if (play) {
                util.play('unlock.mp3')
            }
            j.removeClass('locked')
        } else {
            j.html('lock')
            j.addClass('locked')
            $(`${form} input:not([data-lock-pass]`).attr('disabled', true)
            $(`${form} input:not([data-lock-pass]`).attr('readonly', true)
            $(`${form} button:not([data-lock-pass]`).attr('disabled', true)
            $(`${form} span:not([data-lock-pass]`).attr('disabled', true)
            $(`${form} a:not([data-lock-pass]`).attr('disabled', true)
            $(`${form} *:not([data-lock-pass]`).css('pointer-events', 'none')
            if (play) {
                util.play('lock.mp3')
            }
        }
    },
    play: (name, volume = 0.5) => {
        if (firstClick) {
            let filename = '/sounds/' + name;
            let audio = new Audio(filename);
            audio.volume = volume;
            audio.load();
            audio.play();
        }
    },
    masonry: (ele) => {
        if (!$(ele).length) {
            return false;
        }
        let masonry = require('masonry-layout')
        new masonry(ele)
    },
    m: () => {
        $.pjax.reload('#main-list');
    },
    pop: (str) => {
        util.theme.pop(str)
    },
    get: (url = null, data = null, back = null) => {
        $.ajax({
            url: url,
            method: 'GET',
            data: data,
            success: (data) => {
                if (back != null) {
                    util.url.to(back)
                }
                return data
            },
            failed: (error) => {
                return error
            }
        });
    },
    post: (url = null, data = null, back = null) => {
        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: (data) => {
                if (back != null) {
                    util.url.to(back)
                }
                return data
            },
            failed: (error) => {
                return error
            }
        });
    },
    delete: (url = null, data = null, back = null) => {
        $.ajax({
            url: url,
            method: 'DELETE',
            data: data,
            success: (data) => {
                if (back != null) {
                    util.url.to(back)
                }
                return data
            },
            failed: (error) => {
                return error
            }
        });
    },
    patch: (url = null, data = null, back = null) => {
        $.ajax({
            url: url,
            method: 'PATCH',
            data: data,
            success: (data) => {
                if (back != null) {
                    util.url.to(back)
                }
                return data
            },
            failed: (error) => {
                return error
            }
        });
    },
    put: (url = null, data = null, back = null) => {
        $.ajax({
            url: url,
            method: 'PUT',
            data: data,
            success: (data) => {
                if (back != null) {
                    util.url.to(back)
                }
                return data
            },
            failed: (error) => {
                return error
            }
        });
    },
    console: {
        open: () => {
            ui.$.showOverlay()
            $('#console').addClass('console-opened')
            $('.mdui-overlay-show').css('cssText', 'backdrop-filter: blur(20px) saturate(20%) opacity(0.9) brightness(0.4)');
            $('.mdui-overlay-show').bind('click', () => {
                util.console.close()
            })
        },
        close: () => {
            ui.$.hideOverlay()
            $('#console').removeClass('console-opened')
            $('.mdui-overlay-show').unbind('click')
        },
        append: (content) => {
            let date = new Date();
            let second = date.getSeconds();
            if (second < 10) {
                second = '0' + second;
            }

            date = date.getHours() + ':' + date.getMinutes() + ':' + second
            $('.logger').append(`<span>[${++window.console.line}] ${date}: ${content}</span>`);

            if ($('#console .logger span').length > 100) {
                $('#console .logger span')[0].remove()
            }

            let scrollHeight = $('#console').prop("scrollHeight");
            $('#console').scrollTop(scrollHeight, 200);
        }
    }
}
