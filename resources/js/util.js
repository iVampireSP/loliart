window.util = {
    url: {
        to: (url) => {
            $('#helper-link').attr('href', url)
            $('#helper-link').click()
            $.pjax.reload('#main-list');
        },
        open: (url) => {
            window.location.open = url
        }
    },
    reload: () => {
        $.pjax.reload('.pjax-container')
        $('.mdui-tooltip-open').remove()
    },
    toggleLock: (id, play = false) => {
        let btn = `[data-lock-btn="${id}"]`
        let form = `[data-lock-form="${id}"]`
        let j = $(`${btn} i`)
        if (j.hasClass('locked')) {
            j.html('lock_open')
            $(`${form} input:not([data-pass-lock])`).attr('readonly', false)
            $(`${form} input:not([data-pass-lock]`).attr('disabled', false)
            $(`${form} button:not([data-pass-lock]`).attr('disabled', false)
            if (play) {
                util.play('unlock.mp3')
            }
            j.removeClass('locked')
        } else {
            j.html('lock')
            j.addClass('locked')
            $(`${form} input:not([data-pass-lock]`).attr('disabled', true)
            $(`${form} input:not([data-pass-lock]`).attr('readonly', true)
            $(`${form} button:not([data-pass-lock]`).attr('disabled', true)
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
    }
}
