<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Awara Banajara</title>

        

        <!-- Favicon -->

        <link rel="shortcut icon" href="{{asset('public/admin/assets/img/favicon.png')}}">

        

        <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="{{asset('public/admin/assets/css/bootstrap.min.css')}}">

        

        <!-- Fontawesome CSS -->

        <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/fontawesome/css/fontawesome.min.css')}}">

        <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/fontawesome/css/all.min.css')}}">

        

        <!-- Main CSS -->

        <link rel="stylesheet" href="{{asset('public/admin/assets/css/style.css')}}">

        

        <!--[if lt IE 9]>

            <script src="assets/js/html5shiv.min.js"></script>

            <script src="assets/js/respond.min.js"></script>

        <![endif]-->

    </head>

    <body>

    

        <!-- Main Wrapper -->

        <div class="main-wrapper login-body">

            <div class="login-wrapper">

                <div class="container">

                <img class="img-fluid logo-dark mb-3" src="{{asset('public/admin/assets/img/logo.png')}}" alt="Logo">

                    

                    <div class="loginbox">

                        

                        <div class="login-right">

                          <div class="login-right-wrap">

                                <h1>Register</h1>

                                

                                

                                <!-- Form -->

                                <form action="{{ route('store') }}" method="post">

                    @csrf

                                    <div class="form-group">

                                        <label class="form-control-label">Name</label>

                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">

                                        @if ($errors->has('name'))

                                            <span class="text-danger">{{ $errors->first('name') }}</span>

                                        @endif

                                    </div>

                                    <div class="form-group">

                                        <label class="form-control-label">Email Address</label>

                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))

                                            <span class="text-danger">{{ $errors->first('email') }}</span>

                                        @endif

                                    </div>

                                    <div class="form-group">

                                        <label class="form-control-label">Password</label>

                                         <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">

                                        @if ($errors->has('password'))

                                            <span class="text-danger">{{ $errors->first('password') }}</span>

                                        @endif

                                    </div>

                                    <div class="form-group">

                                        <label class="form-control-label">Confirm Password</label>

                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">

                                    </div>

                                    <div class="form-group mb-0">

                                        <button class="btn btn-lg btn-block btn-primary w-100" type="submit">Register</button>

                                    </div>

                                </form>

                                <!-- /Form -->

                                

                               

                                <!-- /Social Login -->

                                <div class="text-center dont-have">Already have an account? <a href="{{ route('login') }}">Login</a></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- /Main Wrapper -->

        

        <!-- jQuery -->

        <script src="{{asset('public/admin/assets/js/jquery-3.6.0.min.js')}}"></script>

        

        <!-- Bootstrap Core JS -->

        <script src="{{asset('public/admin/assets/js/bootstrap.bundle.min.js')}}"></script>

        

        <!-- Feather Icon JS -->

        <script src="{{asset('public/admin/assets/js/feather.min.js')}}"></script>

        

        <!-- Custom JS -->

        <script src="{{asset('public/admin/assets/js/script.js')}}"></script>



    </body>

</html>