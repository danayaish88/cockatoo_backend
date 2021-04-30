<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- material icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--leaflet css-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

    <!-- scss file -->
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/stories.css') }}" />
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 ">
                <div class="settings-tray">
                    <img class= "profile-image"src="{{url('/images/piza3.jpg')}}" alt="Profile image">
                <span class = "settings-tray--right float-right">
                    <i class="material-icons">cached</i>
                    <i class="material-icons">message</i>
                    <i class="material-icons">menu</i>
                </span>
                </div>
                <div class="search-box">
                    <div class="input-wrapper">
                        <i class="material-icons">search</i>
                        <input type="text" placeholder="Search here">
                    </div>
                </div>
                <div class="container vertical-scrollable">
                    <div class="story-drawer story-drawer--onhover">
                    <img src="{{url('/images/piza3.jpg')}}" alt="Story photo" class="profile-image">
                    <div class="text">
                        <h6>Robo Cob</h6>
                    </div>
                    <span class="time text-muted small">13:21</span>
                </div>
                <hr>
                <div class="story-drawer story-drawer--onhover">
                    <img src="{{url('/images/piza3.jpg')}}" alt="Story photo" class="profile-image">
                    <div class="text">
                        <h6>Robo Cob</h6>
                    </div>
                    <span class="time text-muted small">13:21</span>
                </div>
                <hr>
                <div class="story-drawer story-drawer--onhover">
                    <img src="{{url('/images/piza3.jpg')}}" alt="Story photo" class="profile-image">
                    <div class="text">
                        <h6>Robo Cob</h6>
                    </div>
                    <span class="time text-muted small">13:21</span>
                </div>
                <hr>

                <div class="story-drawer story-drawer--onhover">
                    <img src="{{url('/images/piza3.jpg')}}" alt="Story photo" class="profile-image">
                    <div class="text">
                        <h6>Robo Cob</h6>
                    </div>
                    <span class="time text-muted small">13:21</span>
                </div>
                <hr>
                <div class="story-drawer story-drawer--onhover">
                    <img src="{{url('/images/piza3.jpg')}}" alt="Story photo" class="profile-image">
                    <div class="text">
                        <h6>Robo Cob</h6>
                    </div>
                    <span class="time text-muted small">13:21</span>
                </div>
                <hr>
                </div>
            </div>
            <div class="col-md-8">
                <div id="mapid">
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="{{ mix('/js/leafletMap.js') }}"></script>

  </body>
</html>