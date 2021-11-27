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
    }
}
