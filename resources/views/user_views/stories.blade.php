<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ajax -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
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
    <title>Cockatoo</title>
  </head>
  <body>
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 ">
                <div class="settings-tray">
                    <img class= "profile-image"src="{{url('/images/piza3.jpg')}}" alt="Profile image">
                <span class = "settings-tray--right float-right">
                    <i class="material-icons">cached</i>

                    <a href="{{ route('logout-user')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons" id="logoutIcon">logout</i>
                     </a>
                    <form id="logout-form" action="{{ route('logout-user') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </span>
                </div>
                <div class="search-box">
                    <div class="input-wrapper">
                        <i class="material-icons">search</i>
                        <input type="text" placeholder="Search here">
                    </div>
                </div>
                <div class="container vertical-scrollable" id = "stories">
            
               
                </div>
            </div>
            <div class="col-md-8">
                <div id="mapid">
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id ="carousel-inner">
                        </div>
                </div>
            </div>
        </div>
    </div>

<!--Modal-->
<div class="modal fade" id="areUSureModal" tabindex="-1" role="dialog" aria-labelledby="areUSureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to share your story?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-orange" id="share-story">Share story</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="{{ mix('/js/leafletMap.js') }}"></script>
    <script src="{{ mix('/js/stories.js') }}"></script>

  </body>
</html>