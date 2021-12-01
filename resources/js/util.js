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
    }
}
