window.util.wings = {
    locations: {
        create: () => {
            ui.prompt('What is the name of the new location?',
                function (value) {
                    $.ajax({
                        method: 'POST',
                        url: route('wings.locations.store'),
                        data: {
                            name: value,
                        },
                        success(data) {
                            util.url.to('#location-' + data.data.id);
                            util.reload()
                        }
                    });
                }
            );
        }
    }
}
