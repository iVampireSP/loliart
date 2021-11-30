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
                            util.reload()
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
        user: {
            invite: () => {
                ui.prompt('The email address of you want to invite.',
                    function (value) {
                        $.ajax({
                            method: 'POST',
                            url: route('teams.invite'),
                            data: {
                                email: value,
                            },
                            success(data) {
                                if (data.status) {
                                    util.reload()
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
            deleteInvitation: (id) => {
                ui.confirm('Really delete this invitation?', () => {
                    $.ajax({
                        method: 'DELETE',
                        url: route('teams.invite.delete', id),
                        success(data) {
                            if (data.status) {
                                util.url.to(route('permission.index'))
                                util.reload()
                            } else {
                                ui.snackbar({
                                    position: 'right-bottom',
                                    message: 'Unable to delete invitation.'
                                })
                            }
                        }
                    });
                });
            },
            kick: () => {

            },
            giveRole: () => {

            },
            givePermission: () => {

            }
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
                                        util.reload()
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
                                    util.url.to(route('permission.index'))
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
                                    util.url.to(route('permission.index'))
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
                                        util.reload()
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
                removePermission: () => {
                    ui.confirm('Really delete this permission?', () => {
                        $.ajax({
                            method: 'DELETE',
                            url: route('permission.role.delete', id),
                            success(data) {
                                if (data.status) {
                                    util.url.to(route('permission.index'))
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
        },
        invitation: {
            list: () => {
                util.url.to(route('teams.invite.received'))
            },
            agree: (id) => {
                ui.confirm('Really accept this invitation?', () => {
                    $.ajax({
                        method: 'POST',
                        url: route('teams.invite.agree', id),
                        success(data) {
                            if (data.status) {
                                util.reload()
                            } else {
                                ui.snackbar({
                                    position: 'right-bottom',
                                    message: data.data
                                })
                            }
                        }
                    });
                });
            },
            deny: (id) => {
                ui.confirm('Really deny this invitation?', () => {
                    $.ajax({
                        method: 'POST',
                        url: route('teams.invite.deny', id),
                        success(data) {
                            if (data.status) {
                                util.reload()
                            } else {
                                ui.snackbar({
                                    position: 'right-bottom',
                                    message: data.data
                                })
                            }
                        }
                    });
                });
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
                case 'team.invitation.received':
                    if (currentRoute == 'teams.invite.received') {
                        util.reload()
                    } else {
                        ui.snackbar({
                            message: 'You received a team invitation from ' + event.data.name,
                            buttonText: 'View',
                            onButtonClick: () => {
                                util.team.invitation.list()
                            }
                        });
                    }

                    break;

                case 'team.invitation.deleted':
                    if (currentRoute == 'teams.invite.received') {
                        util.reload()
                    } else {
                        ui.snackbar({
                            message: event.data.name + '\'s invitation has been deleted.',
                            buttonText: 'View another.',
                            onButtonClick: () => {
                                util.team.invitation.list()
                            }
                        });
                    }

                    break;

                default:
                    break;
            }
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
        },
        reload: () => {
            $('.mdui-tooltip-open').remove()
        }
    },
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

if (window.history && window.history.pushState) {
    window.onpopstate = () => {
        util.menu.update();
        ui.mutation();
        util.theme.reload();
    };
}

$(() => {
    util.menu.update()
    var title = document.title;
    title = title.replace(' - ' + app.data.name, '');
    $('#top-title').text(title);
    util.theme.version();
});
