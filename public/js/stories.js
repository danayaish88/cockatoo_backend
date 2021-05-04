/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/stories.js ***!
  \*********************************/
var mymap = L.map('mapid').setView([51.505, -0.09], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZGFuYXlhaXNoIiwiYSI6ImNrbzRvaWJrdDBkcGUyeG15eDUyNjRzNTMifQ.riYivZLTd9Px0dM6fo-AIA', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  maxZoom: 18,
  id: 'mapbox/streets-v11',
  tileSize: 512,
  zoomOffset: -1,
  accessToken: 'your.mapbox.access.token'
}).addTo(mymap);
var listOfStories = [];
var markers = new Array();
$(function () {
  var $stories = $('#stories');
  $.ajax({
    type: 'GET',
    url: '/all-stories',
    success: function success(stories) {
      $.each(stories.data, function (i, story) {
        var imageUrl = story.images[0].url.split('/');
        imageUrl = 'http://localhost/' + imageUrl[3] + '/' + imageUrl[4];
        listOfStories.push(story);
        $stories.append("  \n                <div class=\"story-drawer story-drawer--onhover\" id=" + story.id + ">\n                <img src=\"" + imageUrl + "\" alt=\"Story photo\" class=\"profile-image\">\n                    <div class=\"text\">\n                        <h6>" + story.name + "</h6>\n                    </div>\n                    <span class=\"time text-muted small\">" + story.dateCreated + "</span>\n                </div>\n                <hr>");
      });
      setListenerForStories();
    }
  });
});

function setListenerForStories() {
  var x = document.getElementsByClassName("story-drawer");
  var i;

  for (i = 0; i < x.length; i++) {
    x[i].addEventListener("click", displayRoute);
  }
}

function displayRoute() {
  var listOfPoints = [];
  var i;
  var story;

  for (i = 0; i < listOfStories.length; i++) {
    if (this.id == listOfStories[i].id) {
      story = listOfStories[i];
      break;
    }
  }

  var point;

  for (point in story.points) {
    var points = [];
    var pointsString = story.points[point].split(', ');
    points[0] = parseFloat(pointsString[0]);
    points[1] = parseFloat(pointsString[1]);
    listOfPoints.push(points);
  }

  clearMap();
  clearMarkers();
  mymap.panTo(new L.LatLng(listOfPoints[0][0], listOfPoints[0][1]));
  drawRoute(listOfPoints);
  putImagesMarkers(story.images);
}

function drawRoute(listOfPoints) {
  var polygon = L.polygon(listOfPoints).addTo(mymap);
}

function putImagesMarkers(images) {
  var i;

  for (i = 0; i < images.length; i++) {
    var imageUrl = images[i].url.split('/');
    imageUrl = 'http://localhost/' + imageUrl[3] + '/' + imageUrl[4];
    var marker = L.marker([images[i].lat, images[i].lan]);
    marker.bindPopup("<img src=\"" + imageUrl + "\"width=\"40\" height=\"40\"/>");
    marker.addTo(mymap);
    markers.push(marker);
  }
}

function clearMap() {
  for (i in mymap._layers) {
    if (mymap._layers[i]._path != undefined) {
      try {
        mymap.removeLayer(mymap._layers[i]);
      } catch (e) {
        console.log("problem with " + e + mymap._layers[i]);
      }
    }
  }
}

function clearMarkers() {
  for (i = 0; i < markers.length; i++) {
    mymap.removeLayer(markers[i]);
  }

  markers = [];
}
/******/ })()
;