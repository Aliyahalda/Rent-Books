<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent-Books | @yield ('title') </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>
<style>
    .main {
        height: 100vh;
    }

    .add {
        background-color: #567189;
    }

    .add:hover{
        background-color: #6096B4;
    }

    .addd{
        background-color: #567189;
    }

    .addd:hover{
        background-color: #7B8FA1;
    }

    

    .sidebar{
        background: #DCA7A3 ;
    }

    .sidebar a{
        text-decoration: none;
        padding: 20px 30px;
        color: black;
        display: block;
    }

    .sidebar a:hover{
        background-color: #CAC6E1;
        /* width: 213px;
        margin-left: -25px; */
    }

    .sidebar a.active{
        background-color: #CAC6E1;
        border-right: solid 4px #F49F95;
        /* width: 213px;
        margin-left: -25px; */
    }

    .navbar{
        background: linear-gradient(to bottom,#F49F95, #CAC6E1 );

    }

    .navbar-brand{
        margin-left: 5px;
    }

    .books{       
         background-color: #579BB1;  

    }

    .cate{
        background-color: #7B8FA1;
    }

    .user{
    background-color: #567189;

    }

    .card-data{
        border-radius: 5px;
        padding: 20px 25px;
        border: solid 1px;
        color: #ffffff;
   }

    .card-data i{
        font-size: 40px;
    }
    

    .desc{
        font-size: 20px;
    }

    .count {
        font-size: 20px;
    }

    .addbook{
        

      border: 1px solid;
      padding: 50px;
      border-radius: 10px;
      background: linear-gradient(to right, #8CA6DB, #B993D6);

    
    }
    
</style>
<body>

    <div class="main d-flex flex-column justify-content-between">
    <!--navbar-->
     <nav class="navbar navbar-expand-lg">
        <div class="container">
            <i class="bi bi-book-half" style="font-size: 30px"></i>
          <div class="navbar-brand"><b> Rent-Books</b></div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          </div>
        </div>
      </nav>

      <div class="body-main h-100">
        <div class="row g-0 h-100">
            <div class="col-lg-2  sidebar collapse d-lg-block" id="navbarSupportedContent">
                <div class="active">
                    @if (Auth::user()->roles_id == 1)
 
                <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class='active' @endif>
                    <i class="bi bi-house-dash-fill">
                    <b>Dashboard</b>
                    </i>
                </a>
                <a href="/users" @if (request()->route()->uri == 'users') class='active' @endif>
                    <i class="bi bi-people-fill">
                   <b> User</b>
                </i></a>
                <a href="/category"@if (request()->route()->uri == 'category') class='active' @endif>
                    <i class="bi bi-bookmark-check-fill">
                   <b> Category </b>
                </i></a>
                <a href="/book" @if (request()->route()->uri == 'book') class='active' @endif>
                    <i class="bi bi-book-fill">
                   <b> Books </b>
                </i></a>
                <a href="/rent" @if (request()->route()->uri == 'rent') class='active' @endif>
                    <i class="bi bi-cart-plus-fill">
                         <b>Rents Logs</b>
                </i></a>

                <br><br><br><br>
                <a href="/logout">
                    <i class="bi bi-box-arrow-left">
                    <b>Logout</b>
                </i></a>   

                @else
                <a href="/profile">
                    <i class="bi bi-person-square">
                       <b>Profile</b>
                </i></a>   
                <a href="/logout">
                    <i class="bi bi-box-arrow-left">
                    <b>Logout</b>
                </i></a>   
            @endif
            </div>
            </div>
            <div class="col-lg-10 p-5">
                    @yield('content')
            </div>
        </div>
      </div>
</div>
   


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    
</body>
</html>