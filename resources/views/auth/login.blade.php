<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    

    <title>Login Page</title>
  </head>
  <body class="bg-light">
    <div class="container">
        <div class="row vh-100 d-flex align-items-center">
            <div class="col-lg-6 m-auto">
                <div class="card card-login shadow-sm ps-4 pe-4">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <h4 class="text-primary fw-bold mb-3">Sistem Pencatatan Keuangan</h4>
                        </div>
                        <form method="POST" action="{{ route('auth') }}">
                            @csrf
                            @if($message = Session::get('failed'))
                            <div class="alert alert-warning border-0 ps-4 pe-4">
                                {{ $message }}
                            </div>
                            @endif
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <div class="form-floating form-floating-group flex-grow-1">
                                    <input type="email" name="email" class="form-control radius1" id="email" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                                @error('email')
                                <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                <div class="form-floating form-floating-group flex-grow-1">
                                    <input type="password" name="password" class="form-control radius2" id="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                @error('password')
                                <label class="text-danger">{{ $message }}</label>
                                @enderror
                                <span class="input-group-text show-pass" id="show-pass"><i class="fa-solid fa-eye" id="icon-show-pass"></i></span>
                            </div>

                            <button class="btn btn-primary btn-login" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>

  </body>
</html>