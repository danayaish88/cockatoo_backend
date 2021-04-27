<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            background: rgb(219, 226, 226); 
        }

        .row{
            background: white;
            border-radius: 30px;
            box-shadow: 12px 12px 22px grey;
        }

        img{
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .btn1{
            border: none;
            outline: none;
            height: 55px;
            width: 100%;
            background-color: rgba(245,113,78,255);
            color: white;
            border-radius: 4px;
            font-weight: bold;
        }

        .btn1:hover{
            background: white;
            border: 1px solid rgba(245,113,78,255);
            color: rgba(245,113,78,255);
        }

        .btn1:active{
            outline-color: rgba(245,113,78,255);
        }

        .btn1:focus{
            outline-color: rgba(245,113,78,255);
        }
       
        .form-control:focus {
            outline: none;
            border:1px solid rgba(245,113,78,255);
            box-shadow: 0 0 1px rgba(245,113,78,255);
        }
    </style>
  </head>
  <body>

    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="{{url('/images/piza3.jpg')}}" class ="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">Logo</h1>
                    <h4>Sign in</h4>
                    <form action="{{route('login')}}" method= "post">
                    @csrf
                        <div class="form-row">
                            <div class="col-lg-7 mt-2 mb-3">
                                <input type="email" placeholder="Email" class="form-control p-3" name="email">
                                @error('email')  
                                  <span  role="alert" style= "color: red;">
                                         {{ $message }} 
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7 mb-3 ">
                                <input type="password" placeholder="Password" class="form-control p-3" name="password">
                                @error('password')
                                    <span role="alert" style= "color: red;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                            <button type = "submit" class= "btn1"> Login </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>