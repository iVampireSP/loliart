var mainMenu = {
    update: function () {
        let url = window.location.protocol + '//' + window.location.host + window.location.pathname
        if ($("#main-list a[href='" + url + "']").length > 0) {
            $('#main-list .mdui-list-item').removeClass('mdui-list-item-active')
            $("#main-list a[href='" + url + "']").addClass('mdui-list-item-active')
        }
    }
}

$(document).ready(() => {
    mainMenu.update()
})

if (window.history && window.history.pushState) {
    window.onpopstate = function () {
        mainMenu.update()
    }
}
