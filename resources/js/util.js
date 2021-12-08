window.util = {
    url: {
        to: (url) => {
            $('#helper-link').attr('href', url)
            $('#helper-link').click()
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
            $(`${form} input`).attr('readonly', false)
            $(`${form} input`).attr('disabled', false)
            $(`${form} button`).attr('disabled', false)
            if (play) {
                util.play('unlock.mp3')
            }
            j.removeClass('locked')
        } else {
            j.html('lock')
            j.addClass('locked')
            $(`${form} input`).attr('disabled', true)
            $(`${form} input`).attr('readonly', true)
            $(`${form} button`).attr('disabled', true)
            if (play) {
                util.play('lock.mp3')
            }
        }
    },
    play: (name, volume = 0.6) => {
        if (firstClick) {
            let filename = '/sounds/' + name;
            let audio = new Audio(filename);
            audio.volume = volume;
            audio.load();
            audio.play();
        }

    }
}
