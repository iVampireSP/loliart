window.util = {
    team: {
        create: () => {
            ui.prompt('What is the name of the new team?',
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
        },
        permission: {
            role: {
                create: () => {
                    ui.prompt('What is the name of the new role?',
                        function (value) {
                            $.ajax({
                                method: 'POST',
                                url: route('permission.role.store'),
                                data: {
                                    name: value
                                },
                                success(data) {
                                    if (data.status) {
                                        window.location.reload()
                                    } else {
                                        ui.snackbar({
                                            position: 'right-bottom',
                                            message: 'Unable to create role.'
                                        })
                                    }
                                }
                            });
                        }
                    );
                },
                delete: (id) => {
                    ui.confirm('Really delete this role?', () => {
                        $.ajax({
                            method: 'DELETE',
                            url: route('permission.role.delete', id),
                            success(data) {
                                if (data.status) {
                                    window.location.href = route('permission.index')
                                } else {
                                    ui.snackbar({
                                        position: 'right-bottom',
                                        message: 'Unable to delete role.'
                                    })
                                }
                            }
                        });
                    });
                },
                edit: (id) => {
                    ui.confirm('What is the new of this role?', () => {
                        $.ajax({
                            method: 'DELETE',
                            url: route('permission.update', id),
                            success(data) {
                                if (data.status) {
                                    window.location.href = route('permission.index')
                                } else {
                                    ui.snackbar({
                                        position: 'right-bottom',
                                        message: 'Unable to delete role.'
                                    })
                                }
                            }
                        });
                    });
                },
                givePermission: (name) => {
                    ui.prompt('What is the name of the permission?',
                        function (value) {
                            $.ajax({
                                method: 'POST',
                                url: route('permission.role.givePermission', name),
                                data: {
                                    permission_name: value,
                                },
                                success(data) {
                                    if (data.status) {
                                        window.location.reload()
                                    } else {
                                        ui.snackbar({
                                            position: 'right-bottom',
                                            message: data.data
                                        })
                                    }
                                }
                            });
                        }
                    );
                },
                removePermission: (name) => {
                    ui.confirm('Really delete this permission?', () => {
                        $.ajax({
                            method: 'DELETE',
                            url: route('permission.role.delete', id),
                            success(data) {
                                if (data.status) {
                                    window.location.href = route('permission.index')
                                } else {
                                    ui.snackbar({
                                        position: 'right-bottom',
                                        message: 'Unable to delete role.'
                                    })
                                }
                            }
                        });
                    });
                }
            }
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
                        onButtonClick: () => {
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
        }
    },
    path: {
        to: (url) => {
            window.location.href = url
        },
        open: (url) => {
            window.location.open = url
        }
    }
}

if (window.history && window.history.pushState) {
    window.onpopstate = () => {
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
