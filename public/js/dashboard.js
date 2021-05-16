/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/dashboard.js ***!
  \***********************************/
$(function () {
  var $users = $('#users');
  $("#users").empty();
  $.ajax({
    type: 'GET',
    url: '/users-count',
    success: function success(count) {
      $users.append("\n                    <div id=\"users\">\n                        <div class=\"numbers\">" + count + "</div>\n                        <div class=\"cardName\">Users</div>\n                    </div>\n            ");
    }
  });
});
$(function () {
  var $stories = $('#stories');
  $("#stories").empty();
  $.ajax({
    type: 'GET',
    url: '/stories-count',
    success: function success(count) {
      $stories.append("\n                    <div id=\"stories\">\n                        <div class=\"numbers\">" + count + "</div>\n                        <div class=\"cardName\">Stories</div>\n                    </div>\n            ");
    }
  });
});
$(function () {
  var $images = $('#images');
  $("#images").empty();
  $.ajax({
    type: 'GET',
    url: '/images-count',
    success: function success(count) {
      $images.append("\n                    <div id=\"images\">\n                        <div class=\"numbers\">" + count + "</div>\n                        <div class=\"cardName\">Images</div>\n                    </div>\n            ");
    }
  });
});
$(function () {
  var $bookmarks = $('#bookmarks');
  $("#bookmarks").empty();
  $.ajax({
    type: 'GET',
    url: '/bookmarks-count',
    success: function success(count) {
      $bookmarks.append("\n                    <div id=\"bookmarks\">\n                        <div class=\"numbers\">" + count + "</div>\n                        <div class=\"cardName\">Bookmarks</div>\n                    </div>\n            ");
    }
  });
});
$(function () {
  var $recentUsers = $('#recentUsers');
  $("#recentUsers").empty();
  $.ajax({
    type: 'GET',
    url: '/last-five-users',
    success: function success(data) {
      $.each(data.data, function (i, user) {
        $recentUsers.append(" \n                    <tr>\n                        <td width=\"60px\"> <div class=\"imgBx\"><img src=\"http://127.0.0.1:8000/images/piza3.jpg\"></div></td>\n                        <td><h4>" + user.name + "<br><span>" + user.country + "</span></h4></td>\n                    </tr> \n                ");
      });
    }
  });
});
$(function () {
  var ctx = document.getElementById('myChart').getContext('2d');
  $.ajax({
    type: 'GET',
    url: '/get-countries',
    success: function success(result) {
      var labels = [];
      var data = [];
      var colors = [];
      $.each(result, function (i, country) {
        labels.push(country.country);
        data.push(country.count);
        colors.push(getRandomColor());
      });
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: labels,
          datasets: [{
            label: 'Users distribution',
            data: data,
            hoverOffset: 4,
            backgroundColor: colors
          }]
        }
      });
    }
  });
});

function getRandomColor() {
  var letters = '0123456789ABCDEF'.split('');
  var color = '#';

  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }

  return color;
}
/******/ })()
;