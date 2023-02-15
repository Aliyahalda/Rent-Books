<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <style>

  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap');

    .from-register{
      border: 1px solid;
      border-color: blue;
      padding: 20px;
      border-radius: 10px;
      background: linear-gradient(to right, #8CA6DB, #B993D6);
    }

    button{
      background: linear-gradient(to right, #859398, #283048);
    }

    button:hover{
            background: linear-gradient(to right,#283048, #859398 );
    }

    label{
      font-size: 15px;
      color:  black;
    }

    input{
      border-color: #283048;
      border-radius: 10px;
      padding: 0 0 0 45px;
    }

    .input-field{
      
    }

    

    i{
      position: relative;
      top: -33px;
      left: 17px;
      color: #283048;
    }
    
    </style>
  <body>

<div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh">
    <div class="from-register">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        @if (session('status'))
                      <div class="alert alert-success">
                    {{ session('messege') }}
                    </div>
              @endif

        <form action="#" method="POST"  style="width: 400px;">
            @csrf

            <div class=" mb-3 text-center">
              <i class="bi bi-person-circle" style="font-size: 4vh" ></i>
                <h3>Register</h3>
            </div>
            <div class="input-field mb-3 mt-3">
              <label for="username" class="form-label"><b>Username</b></label>
              <input type="text" class="form-control" id="username" name="username">
              <i class="bi bi-person-plus-fill"></i>
            </div>
           
            <div class="mb-3">
                <label for="phone" class="form-label"><b>Phone</b></label>
                <input type="number" class="form-control" id="phone" name="phone">
                <i class="bi bi-telephone-plus-fill"></i>
              </div>
              <div class="mb-3">
                <label for="address" class="form-label"><b>Address</b> </label>
                <textarea type="text" class="form-control" id="address" name="addres"></textarea>
                <i class="bi bi-building-fill-add"></i>
              </div>
             <div class="mb-3">
              <label for="password" class="form-label"><b> Password</b></label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn w-100 text-white">Submit</button>

            <div class="mb-3 my-3 text-center">
              <p>Have a account? <a href="/login" style="text-decoration: none;">Login</a></p>
            </div>
          </form>  
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>