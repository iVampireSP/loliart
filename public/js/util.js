/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/util.js ***!
  \******************************/
window.util = {
  team: {
    create: function create() {
      ui.prompt('What is the name of the new team?', function (value) {
        $.ajax({
          method: 'POST',
          url: route('teams.team.store'),
          data: {
            name: value
          },
          success: function success() {
            window.location.reload();
          }
        });
      });
    },
    afk: function afk() {
      $.ajax({
        method: 'POST',
        url: route('teams.afk'),
        success: function success(data) {
          ui.snackbar({
            position: 'right-bottom',
            message: data.data
          });
          window.team = 0;
          util.theme.update();
        }
      });
    },
    user: {
      invite: function invite() {
        ui.prompt('The email address of you want to invite.', function (value) {
          $.ajax({
            method: 'POST',
            url: route('teams.invite'),
            data: {
              email: value
            },
            success: function success(data) {
              if (data.status) {
                window.location.reload();
              } else {
                ui.snackbar({
                  position: 'right-bottom',
                  message: data.data
                });
              }
            }
          });
        });
      },
      deleteInvitation: function deleteInvitation(id) {
        ui.confirm('Really delete this role?', function () {
          $.ajax({
            method: 'DELETE',
            url: route('teams.invite.delete', id),
            success: function success(data) {
              if (data.status) {
                window.location.href = route('permission.index');
              } else {
                ui.snackbar({
                  position: 'right-bottom',
                  message: 'Unable to delete invitation.'
                });
              }
            }
          });
        });
      },
      kick: function kick() {},
      giveRole: function giveRole() {},
      givePermission: function givePermission() {}
    },
    permission: {
      role: {
        create: function create() {
          ui.prompt('What is the name of the new role?', function (value) {
            $.ajax({
              method: 'POST',
              url: route('permission.role.store'),
              data: {
                name: value
              },
              success: function success(data) {
                if (data.status) {
                  window.location.reload();
                } else {
                  ui.snackbar({
                    position: 'right-bottom',
                    message: 'Unable to create role.'
                  });
                }
              }
            });
          });
        },
        "delete": function _delete(id) {
          ui.confirm('Really delete this role?', function () {
            $.ajax({
              method: 'DELETE',
              url: route('permission.role.delete', id),
              success: function success(data) {
                if (data.status) {
                  window.location.href = route('permission.index');
                } else {
                  ui.snackbar({
                    position: 'right-bottom',
                    message: 'Unable to delete role.'
                  });
                }
              }
            });
          });
        },
        edit: function edit(id) {
          ui.confirm('What is the new of this role?', function () {
            $.ajax({
              method: 'DELETE',
              url: route('permission.update', id),
              success: function success(data) {
                if (data.status) {
                  window.location.href = route('permission.index');
                } else {
                  ui.snackbar({
                    position: 'right-bottom',
                    message: 'Unable to delete role.'
                  });
                }
              }
            });
          });
        },
        givePermission: function givePermission(name) {
          ui.prompt('What is the name of the permission?', function (value) {
            $.ajax({
              method: 'POST',
              url: route('permission.role.givePermission', name),
              data: {
                permission_name: value
              },
              success: function success(data) {
                if (data.status) {
                  window.location.reload();
                } else {
                  ui.snackbar({
                    position: 'right-bottom',
                    message: data.data
                  });
                }
              }
            });
          });
        },
        removePermission: function removePermission(name) {
          ui.confirm('Really delete this permission?', function () {
            $.ajax({
              method: 'DELETE',
              url: route('permission.role.delete', id),
              success: function success(data) {
                if (data.status) {
                  window.location.href = route('permission.index');
                } else {
                  ui.snackbar({
                    position: 'right-bottom',
                    message: 'Unable to delete role.'
                  });
                }
              }
            });
          });
        }
      }
    }
  },
  event: {
    listen: function listen() {
      window.Echo["private"]("user.".concat(window.user.id)).listen('UserEvent', function (e) {
        util.event.process(e);
      });
    },
    process: function process(event) {
      switch (event.data.type) {
        case 'team_invitation':
          ui.snackbar({
            message: 'You received a team invitation from ' + event.data.name,
            buttonText: 'View',
            onButtonClick: function onButtonClick() {
              ui.alert('button clicked');
            }
          });
          break;

        default:
          break;
      }

      console.log(event);
    }
  },
  menu: {
    update: function update() {
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
    update: function update() {
      if (!team) {
        $('#app-title').text(app.data.name);
        $('#top-appbar .top-bar').removeClass('mdui-color-white');
        $('#top-appbar .top-bar').addClass('mdui-color-theme');
        $('#top-appbar').removeClass('top-bar-shadow');
      } else {
        $('#app-title').text(team.name);
        $('#top-appbar .top-bar').removeClass('mdui-color-theme');
        $('#top-appbar .top-bar').addClass('mdui-color-white');
        $('#top-appbar').addClass('top-bar-shadow');
      }
    },
    version: function version() {
      $('#version').text(app.data.version);
    }
  },
  path: {
    to: function to(url) {
      window.location.href = url;
    },
    open: function open(url) {
      window.location.open = url;
    }
  }
};

if (window.history && window.history.pushState) {
  window.onpopstate = function () {
    util.menu.update();
  };
}

$(function () {
  util.menu.update();
  var title = document.title;
  title = title.replace(' - ' + app.data.name, '');
  $('#top-title').text(title);
  util.theme.version();
});
/******/ })()
;