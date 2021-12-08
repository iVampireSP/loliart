window.util.wings = {
    locations: {
        create: () => {
            ui.prompt('What is the name of the new location?',
                (value) => {
                    $.ajax({
                        method: 'POST',
                        url: route('wings.locations.store'),
                        data: {
                            name: value,
                        },
                        success(data) {
                            util.url.to(route('wings.locations.show', data.data));
                        }
                    });
                }
            );
        },
        delete: (id) => {
            ui.confirm('Are you sure you want to delete this location?',
                () => {
                    $.ajax({
                        method: 'DELETE',
                        url: route('wings.locations.destroy', id),
                        success(data) {
                            if (data.status) {
                                util.reload();
                            } else {}
                        }
                    });
                }
            );
        },
        edit: (id, ele) => {
            $.ajax({
                method: 'PUT',
                url: route('wings.locations.update', id),
                data: {
                    name: ele.value
                },
                success(data) {
                    if (!data.status) {
                        util.theme.warning();
                    }
                },
                error() {
                    util.theme.warning();
                }
            });
        },
        nodes: {
            create: (ele) => {
                let data = ele.serializeArray();
                $.ajax({
                    method: 'POST',
                    url: route('wings.locations.nodes.store', route().params.location),
                    data: data,
                    success(data) {
                        if (data.status) {
                            util.url.to(route('wings.locations.show', route().params.location))
                        } else {
                            util.theme.warning()
                        }
                    }
                });
            },
            delete: (id, location_id) => {
                ui.confirm('Are you sure?',
                    () => {
                        $.ajax({
                            method: 'DELETE',
                            url: route('wings.locations.nodes.destroy', [location_id, id]),
                            success(data) {
                                if (data.status) {
                                    util.url.to(route('wings.locations.show', location_id))
                                } else {
                                    util.theme.warning()
                                }
                            }
                        });
                    }
                );
            },
            edit: (ele) => {
                let data = ele.serializeArray();

                $.ajax({
                    method: 'PUT',
                    url: route('wings.locations.nodes.update', [route().params.location, route().params.node]),
                    data: data,
                    success() {
                        util.toggleLock('node-edit', true)
                    },
                    error() {
                        util.theme.warning();
                    }
                });
            }
        }
    }
}
