window.util.team = {
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
    edit: (name) => {
        $.ajax({
            method: 'PUT',
            url: route('teams.update'),
            data: {
                name: name
            },
            success(data) {
                if (data.status) {
                    util.url.to(route('permission.index'))
                    window.team = data.data;
                    util.theme.update();
                } else {
                    ui.snackbar({
                        position: 'right-bottom',
                        message: 'Unable to delete invitation.'
                    })
                }
            }
        });
    },
    delete: (id) => {
        ui.confirm('Really delete this team?', () => {
            $.ajax({
                method: 'DELETE',
                url: route('teams.delete', id),
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
        reject: (id) => {
            ui.confirm('Really reject this invitation?', () => {
                $.ajax({
                    method: 'POST',
                    url: route('teams.invite.reject', id),
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
}
