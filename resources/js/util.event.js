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
        $('.queue_message').text(event.data.type);
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
                if (currentRoute == 'teams.team.show' || currentRoute == 'teams.invitations') {
                    util.reload()
                }

                break;


            case 'team.invitations.updated':
                if (currentRoute == 'teams.invitations' || currentRoute == 'teams.team.show') {
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
                    message: 'Your team has been deleted.',
                    position: 'right-bottom',
                });

                util.reload()

                util.team.afk()

                break;

            case 'wings.locations.pending':
                if (currentRoute == 'wings.locations.show') {
                    util.reload()
                }
                $('#location-create-text').text('Pending...');

                break;

            case 'wings.locations.creating':
                if (currentRoute == 'wings.locations.show') {
                    util.reload()
                }
                $('#location-create-text').text('Creating location...');
                $('#location-create-progress div').css('width', '50%')
                break;

            case 'wings.locations.calling':
                $('#location-create-text').text('Calling server...');
                $('#location-create-progress div').css('width', '75%')
                break;

            case 'wings.locations.created':
                $('#location-create-text').text('Created!');
                $('#location-create-progress div').css('width', '100%')
                $('#location-create-text').addClass('mdui-text-color-green');
                $('#location-create-progress div').css('width', '100%')
                $('#location-create-progress div').addClass('mdui-color-green')

                setTimeout(() => {
                    util.theme.warning();
                    util.reload()
                }, 1000)


                break;

            case 'wings.locations.failed':
                $('#location-create-text').text('Failed');
                $('#location-create-text').addClass('mdui-text-color-red');
                $('#location-create-progress div').css('width', '100%')
                $('#location-create-progress div').addClass('mdui-color-red')

                setTimeout(() => {
                    $('#location-create-progress div').css('width', '0%')
                }, 1500)

                setTimeout(() => {
                    util.url.to(route('wings.locations.index'))
                }, 2000)


                break;

            case 'wings.locations.deleting':
                util.reload();
                break;

            case 'wings.locations.deleted':
                $('#location-create-progress div').css('width', '0%')

                setTimeout(() => {
                    util.url.to(route('wings.locations.index'))
                }, 1500)

                break;
            default:
                break;
        }
    }

}
