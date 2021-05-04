
var mymap = L.map('mapid').setView([51.505, -0.09], 13);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZGFuYXlhaXNoIiwiYSI6ImNrbzRvaWJrdDBkcGUyeG15eDUyNjRzNTMifQ.riYivZLTd9Px0dM6fo-AIA', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);

var listOfStories =[];
var markers = new Array();


$(function (){
    var $stories = $('#stories');
    $.ajax({
        type:'GET',
        url: '/all-stories',
        success: function(stories){
            $.each(stories.data, function(i, story){
                var imageUrl = story.images[0].url.split('/');
                imageUrl = 'http://localhost/' + imageUrl[3] + '/' + imageUrl[4];
                
                

                listOfStories.push(story);
                
                $stories.append(`  
                <div class="story-drawer story-drawer--onhover" id=` +story.id + `>
                <img src="` + imageUrl + `" alt="Story photo" class="profile-image">
                    <div class="text">
                        <h6>` + story.name + `</h6>
                        <span class="time text-muted small">` + story.dateCreated + `</span>
                    </div>
                    <i class="material-icons start-animation">play_circle</i>
                </div>
                <hr>`);
            },)
            setListenerForStories();
            setAnimationListeners();
        }
    });
});

function setAnimationListeners(){
    var x = document.getElementsByClassName("start-animation");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].addEventListener("click", displayAnimation)
    }
}

function setListenerForStories(){
    var x = document.getElementsByClassName("story-drawer");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].addEventListener("click", displayRoute
    )
}}

function setOtherStoriesToWhite(){
    var x = document.getElementsByClassName("story-drawer");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].className= 'story-drawer story-drawer--onhover';
    }
}



function displayRoute(){
    setOtherStoriesToWhite();
    this.className =  'story-drawer story-drawer active';
    var listOfPoints = [];
    var i;
    var story;
    for(i = 0; i < listOfStories.length; i++){
        if(this.id == listOfStories[i].id){
            story = listOfStories[i];
            break;
        }
    }

    var point;
    for(point in story.points){
        var points = [];
        var pointsString = story.points[point].split(', ');
        points[0] = parseFloat(pointsString[0]);
        points[1] = parseFloat(pointsString[1]);
        listOfPoints.push(points);
    }

    clearMap();
    clearMarkers();

    mymap.flyTo([listOfPoints[0][0], listOfPoints[0][1]], 13);

    drawRoute(listOfPoints);
    putImagesMarkers(story.images);

}

function drawRoute(listOfPoints){
    var polygon = L.polygon(
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

function clearMap() {
    for(i in mymap._layers) {
        if(mymap._layers[i]._path != undefined) {
            try {
                mymap.removeLayer(mymap._layers[i]);
            }
            catch(e) {
                console.log("problem with " + e + mymap._layers[i]);
            }
        }
    }
}

function clearMarkers(){
    for(i = 0; i < markers.length; i++) {
        mymap.removeLayer(markers[i]);
    } 
    markers = [];
}





