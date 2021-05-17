<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cockatoo Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" 
    integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">   
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">

        <!-- ajax -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

      <!-- material icons-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--fonts-->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon"><span class="material-icons">flutter_dash</span></span>
                        <span class="title"><h2>Cockatoo</h2></span>
                    </a>
                </li>
                <li>
                    <a href="">
                    <span class="icon"><span class="material-icons">home</span></span>
                    <span class="title">Dashboard</span>
                    </a>
                 </li>
                <li>
                    <a href="">
                        <span class="icon"><span class="material-icons">people</span></span>
                        <span class="title">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout-user')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <span class="icon"><span class="material-icons">logout</span></span>
                        <span class="title">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout-user') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle" onclick="toggleMenu();"></div>
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search">
                        <span class="material-icons">search</span>
                    </label>
                </div>
                <div class="user">
                        <img src="{{url('/images/logo.jpg')}}">
                </div>
            </div>

            <div class="cardBox">
                <div class="card">
                    <div id="users">
                        <div class="numbers"> 0</div>
                        <div class="cardName">Users</div>
                    </div>
                    <div class="iconBox"><span class="material-icons">person</span></div>
                </div>

                <div class="card">
                    <div id="stories">
                        <div class="numbers">0</div>
                        <div class="cardName">Stories</div>
                    </div>
                    <div class="iconBox"><span class="material-icons">auto_stories</span></div>
                </div>

                <div class="card">
                    <div id="images">
                        <div class="numbers"> 0</div>
                        <div class="cardName">Images</div>
                    </div>
                    <div class="iconBox"><span class="material-icons">image</span></div>
                </div>

                <div class="card">
                    <div id="bookmarks">
                        <div class="numbers"> 1,042</div>
                        <div class="cardName">Bookmarks</div>
                    </div>
                    <div class="iconBox"><span class="material-icons">bookmark</span></div>
                </div>
            </div>
            <div class="details">
                <div class="recentOrders">
                    <div>
                        <canvas id="myChart" width="200" height: "100"></canvas>
                    </div>
                </div>
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Users</h2>
                    </div>
                    <table>
                        <tbody id="recentUsers">
                            <tr>
                                <td width="60px"> <div class="imgBx"><img src="{{url('/images/logo.jpg')}}"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>
                            <tr>
                                <td width="60px"> <div class="imgBx"><img src="{{url('/images/logo.jpg')}}"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>
                            <tr>
                                <td width="60px"> <div class="imgBx"><img src="{{url('/images/logo.jpg')}}"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>
                            <tr>
                                <td width="60px"> <div class="imgBx"><img src="{{url('/images/logo.jpg')}}"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>
                            <tr>
                                <td width="60px"> <div class="imgBx"><img src="{{url('/images/logo.jpg')}}"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div> 
    </div>
       <script>
           function toggleMenu(){
               let toggle = document.querySelector('.toggle');
               let navigation = document.querySelector('.navigation');
               let main = document.querySelector('.main');

               toggle.classList.toggle('active');
               navigation.classList.toggle('active');
               main.classList.toggle('active');
           }
       </script>

       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <script src="{{ mix('/js/dashboard.js') }}"></script>

</body>
</html>