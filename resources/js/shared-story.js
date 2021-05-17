
var mymap = L.map('mapid').setView([51.505, -0.09], 20);
var audio = new Audio('/audio/Giant Moon – Vendredi.mp3');
var selectedStoryId = 0;
var listOfPoints = [];
var listOfImages =[];
var markers = new Array();


L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZGFuYXlhaXNoIiwiYSI6ImNrbzRvaWJrdDBkcGUyeG15eDUyNjRzNTMifQ.riYivZLTd9Px0dM6fo-AIA', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);

$('.carousel').carousel({
    interval: 2500
  });

  $('#exampleModalCenter').on('hidden.bs.modal', function () {
    audio.pause();
  });

    var btn = document.getElementById("refreshButton");
    btn.addEventListener("click", displayCarousel);


  $(function (){
    const completeUrl = new URL(window.location.href);
    var id = completeUrl.searchParams.get('id')
    var url = "/get-story/" + id;
    $.ajax({
        type:'GET',
        url: url,
        success: function(res){
            var story = res.data[0];
            console.log(story.city);
            listOfImages = story.images;
            for(i in story.points){
                var points = [];
                var pointsString = story.points[i].split(', ');
                points[0] = parseFloat(pointsString[0]);
                points[1] = parseFloat(pointsString[1]);
                listOfPoints.push(points);
            }
            mymap.flyTo([listOfPoints[0][0], listOfPoints[0][1]], 13);
            drawRoute(listOfPoints);
            putImagesMarkers(story.images);
            
        }
    });
});

function drawRoute(listOfPoints){
    var polyline = L.polyline(
        listOfPoints
    ).addTo(mymap);
}

function putImagesMarkers(images){    
    
    var i;
    for(i = 0; i < images.length; i++){
        var imageUrl = images[i].url.split('/');
        imageUrl = 'http://localhost/' + imageUrl[3] + '/' + imageUrl[4];

        var marker = L.marker([images[i].lat, images[i].lan]);
        marker.bindPopup( `<img src="` + imageUrl + `"width="40" height="40"/>`);
        marker.addTo(mymap);
        markers.push(marker);
    }
}

function displayCarousel(){

    var story;
    var i;
    var $carousel = $('#carousel-inner');

    $("#carousel-inner").empty();
    

    $(".carousel").on("mouseenter",function() {
        $(this).carousel('cycle');
      }).on("mouseleave", function() {
        $(this).carousel('cycle');
    });

    
    for(i = 0; i < listOfImages.length; i++){
        var imageUrl = listOfImages[i].url.split('/');
        imageUrl = 'http://localhost/' + imageUrl[3] + '/' + imageUrl[4];

        if(i == 0){
            $carousel.append(`
            <div class="carousel-item active">
                <img class="d-block w-100" src="` + imageUrl + `" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <p>` + listOfImages[i].description + `</p>
                </div>
            </div>`);
        }
        else{
            $carousel.append(`
            <div class="carousel-item">
                <img class="d-block w-100" src="` + imageUrl + `" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <p>` + listOfImages[i].description + `</p>
                </div>
            </div>`);
        }
    }

    playAudio();
}

function playAudio() {
    audio.play();
  }