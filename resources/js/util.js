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
    toggleLock: (id) => {
        let btn = `[data-lock-btn="${id}"]`
        let form = `[data-lock-form="${id}"]`
        let submit_btn = `[data-lock-submit="${id}"]`
        let j = $(`${btn} i`)
        if (j.hasClass('locked')) {
            j.html('lock_open')
            $(`${form} input`).attr('readonly', false)
            $(submit_btn).show()
            j.removeClass('locked')
        } else {
            j.html('lock')
            j.addClass('locked')
            $(`${form} input`).attr('readonly', true)
            $(submit_btn).hide()
        }

    }
}
