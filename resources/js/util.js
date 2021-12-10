window.util = {
    url: {
        to: (url, ele = '.pjax-container') => {
            history.pushState(null, null, url);
            $.pjax.reload(ele);
        },
        open: (url) => {
            window.location.open = url
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
    }
}
