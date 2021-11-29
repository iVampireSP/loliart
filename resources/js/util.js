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
    }
}

$(() => {
    util.menu.update()
    var title = document.title;
    title = title.replace(' - ' + app_name, '');
    $('#top-title').text(title);
});

if (window.history && window.history.pushState) {
    window.onpopstate = function () {
        util.menu.update();
    };
}