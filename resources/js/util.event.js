window.util.event = {
    listen: () => {
        window.Echo.private(`user.${window.user.id}`)
            .listen('UserEvent', (e) => {
                util.event.process(e)
            });
        util.team.subscribe();
    },
    reSubscribe: (currentTeam) => {
        if (window.team.id != currentTeam.id) {
            Echo.leave('team.' + window.team.id);
            window.team = currentTeam;
            util.team.subscribe();
        }

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

            case 'team.updated':
                if (currentRoute == 'teams.team.show') {
                    $('#app-title').text(event.data.data.name);
                    $('.team-inline-edit').val(event.data.data.name);
                } else if (currentRoute == 'teams.index') {
                    $('.current-team-item').addClass('mdui-color-green');
                    $('.current-team-item *').css('color', 'white');
                    setTimeout(() => {
                        $('.current-team-item').removeClass('mdui-color-green');
                        $('.current-team-item *').css('color', 'inherit');
                    }, 500)
                } else {
                    window.team = event.data.data
                    ui.snackbar({
                        message: 'Team name has been updated to ' + event.data.data.name,
                    });
                }

                $('#app-title').text(event.data.data.name);
                $('.current-team-text').text(event.data.data.name);

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

            case 'team.users.updated':
                if (currentRoute == 'teams.team.show') {
                    util.reload()
                }

                break;


            case 'team.invitations.updated':
                if (currentRoute == 'teams.invitations') {
                    util.reload()
                }

                break;

            case 'team.permission.updated':
                util.reload()

                ui.snackbar({
                    message: 'Your permission has been updated.',
                    position: 'right-bottom',
                });

                break;

            case 'team.users.beenKicked':
                if (currentRoute == 'teams.index') {
                    util.reload()
                }

                if (currentRoute == 'teams.team.show') {
                    util.url.to(route('teams.index'))
                }

                ui.snackbar({
                    message: 'You have been kick from ' + event.data.data.name,
                    position: 'right-bottom',
                });

                util.team.afk()

                break;

            case 'team.deleted':
                util.url.to(route('teams.index'))

                ui.snackbar({
                    message: 'Team ' + event.data.data.name + 'has been deleted.',
                    position: 'right-bottom',
                });

                util.team.afk()

                break;


            default:
                break;
        }
    }

}
