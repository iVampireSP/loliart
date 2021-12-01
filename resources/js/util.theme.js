window.util.menu = {
    update: () => {
        var url = window.location.protocol + '//' + window.location.host + window.location.pathname;
        var length = $("#main-list a[href='" + url + "']").length;

        if (!length) {
            url = url.substr(0, url.length - 1);
            length = $("#main-list a[href='" + url + "']").length;
        }

        if ($("#main-list a[href='" + url + "']").length > 0) {
            $('#main-list .mdui-list-item').removeClass('mdui-list-item-active');
            $("#main-list a[href='" + url + "']").addClass('mdui-list-item-active');
        }
    }
}

window.util.theme = {
    update: () => {
        // let title = document.title;
        // title = title.replace(' - ' + app.data.name, '');
        // $('#top-title').text(title);
        if (!team) {
            $('#app-title').text(app.data.name)
            $('#top-appbar .top-bar').removeClass('mdui-color-white')
            $('#top-appbar .top-bar').addClass('mdui-color-theme')
            $('#top-appbar').removeClass('top-bar-shadow')
        } else {
            $('#app-title').text(team.name)
            $('#top-appbar .top-bar').removeClass('mdui-color-theme')
            $('#top-appbar .top-bar').addClass('mdui-color-white')
            $('#top-appbar').addClass('top-bar-shadow')
        }

    },
    version: () => {
        $('#version').text(app.data.version)
    },
    reload: () => {
        $('.mdui-tooltip-open').remove()
        $('.mdui-ripple-wave').remove()
    },
    warning: () => {
        $('#main').css('cssText', 'transform: scale(0.98)')
        $('#main').css('overflow', 'hidden')
        setTimeout(() => {
            $('#main').css('cssText', 'transform: unset')
            $('#main').css('cssText', 'unset')
        }, 200)
    }
}
