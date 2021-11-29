window.util = {
    team: {
        create: () => {
            mdui.prompt('What is the name of the new team?',
                function (value) {
                    $.ajax({
                        method: 'POST',
                        url: route('teams.team.store'),
                        data: {
                            name: value,
                        },
                        success() {
                            window.location.reload()
                        }
                    });
                }
            );
        },
        afk: () => {
            $.ajax({
                method: 'POST',
                url: route('teams.afk'),
                success(data) {
                    ui.snackbar({
                        position: 'right-bottom',
                        message: data.data
                    })
                    window.team = 0;
                    util.theme.update();
                }
            });
        }
    },
    event: {
        listen: () => {
            window.Echo.private(`user.${window.user.id}`)
                .listen('UserEvent', (e) => {
                    util.event.process(e)
                });
        },
        process: (event) => {
            switch (event.data.type) {
                case 'team_invitation':
                    ui.snackbar({
                        message: 'You received a team invitation from ' + event.data.name,
                        buttonText: 'View',
                        onButtonClick: function () {
                            ui.alert('button clicked');
                        }
                    });
                    // ui.confirm(event.data.team_owner + ' invite you to join team: ' + event.data.name, () => {}, () => {})
                    break;

                default:
                    break;
            }
            console.log(event);
        }
    },
    menu: {
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
    },
    theme: {
        update: () => {
            if (team) {
                $('#app-title').text(team.name)
                $('#top-appbar .top-bar').removeClass('mdui-color-theme')
                $('#top-appbar .top-bar').addClass('mdui-color-white')
            } else {
                $('#app-title').text(app.data.name)
                $('#top-appbar .top-bar').removeClass('mdui-color-white')
                $('#top-appbar .top-bar').addClass('mdui-color-theme')
            }

        },
        version: () => {
            $('#version').text(app.data.version)
        }
    }
}

if (window.history && window.history.pushState) {
    window.onpopstate = function () {
        util.menu.update();
    };
}

$(() => {
    util.menu.update()
    var title = document.title;
    title = title.replace(' - ' + app.data.name, '');
    $('#top-title').text(title);
    util.theme.version();
});
