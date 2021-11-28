/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/menu.js ***!
  \******************************/
var mainMenu = {
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
};
$(function () {
  mainMenu.update();
  var title = document.title;
  title = title.replace(' - ' + $('#top-title').text(), '');
  $('#top-title').text(title);
});

if (window.history && window.history.pushState) {
  window.onpopstate = function () {
    mainMenu.update();
  };
}
/******/ })()
;