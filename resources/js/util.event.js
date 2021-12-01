window.util.event = {
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

}
