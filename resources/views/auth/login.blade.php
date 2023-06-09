<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.shared/title-meta', ['title' => "Log In"])
    @include('layouts.shared/head-css', ["mode" => $mode ?? '', "demo" => $demo ?? ''])

</head>

<style>

    body{
        /* background-image: url('/assets/images/background.jpg') !important; */
        /* background-size: cover; */
        background-color: #F5F6F8 !important;
    }
    .card{
        /* background-color: rgb(209, 186, 81,0.8) !important ; */
        /* background-color: #FEF79D !important; */
        background-color: white !important;
    }
    label{color: black}
     input.form-control { 
    /* background: #E6E7E9;
    padding: 20px 15px; */
    border: 1px solid #C3C4C8;
    border-radius: 0px;
} 
.bg-pattern {
    background-image: none;
}
/* .form-control {
    position: relative;
    font-size: 16px;
    height: auto;}
     .btn {
    /* background: url(../images/login-btn.png) no-repeat; 
    width: 208px;
    margin: 30px auto 0;
    border: 0;
} */
 @media only screen and (max-width: 500px) {
    .logo-lg img{
        height: 50px;
    }
 }
</style>


<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-pattern">

                        <div class="card-body p-4 pt-3">

                            <div class="text-center w-75 m-auto">
                               
                                <div class="auth-logo">
                                    <a href="#" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{asset('assets/images/new-logo.png')}}" alt="" height="130" width="130">
                                        </span>
                                    </a>

                                    <a href="#" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="22">
                                        </span>
                                    </a>
                                </div>

                                <p class="text-muted mb-2 mt-2">Enter your email address and password to access admin panel.</p>
                            </div>


                            @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>
                            <br>@endif
                            @if(session('success'))<div class=" alert alert-success">{{ session('success') }}
                            </div>
                            <br>@endif

                            @if (sizeof($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3 mt-4">
                                    {{-- <label for="emailaddress" class="form-label">Username</label> --}}
                                    <input class="form-control" type="text" name="name" id="emailaddress" required="" placeholder="Username">
                                </div>
                                
                                

                                <div class="mb-3">
                                    {{-- <label for="password" class="form-label ">Password</label> --}}
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                        {{-- <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div> --}}
                                    </div>
                                </div>



                                <div class="mb-3">
                                    {{-- <div class="form-check">
                                        <input type="checkbox" name="remember" class="form-check-input" id="checkbox-signin" checked>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div> --}}
                                </div>

                                <div class="text-center d-grid">
                                    <button class="btn btn-dark" type="submit"> Log In </button>
                                </div>

                            </form>

                            

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            {{-- <p> <a href="{{route('password.request')}}" class="text-white-50 ms-1">Forgot your password?</a></p> --}}
                          {{-- <p class="text-white-50">Don't have an account? <a href="/register" class="text-white ms-1"><b>Sign Up</b></a></p> --}}
                        </div> <!-- end col --> 
                     </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

   

    @include('layouts.shared/footer-script')

</body>

</html>