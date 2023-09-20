


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register & Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="author" name="ASHIK" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Bootstrap css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
    <!-- icons -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Head js -->
    <script src="{{asset('backend/assets/js/head.js')}}"></script>

</head>

<body class="authentication-bg authentication-bg-pattern">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input class="form-control" type="text" id="fullname" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" id="emailaddress" required placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                           required autocomplete="new-password" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                    <label class="form-check-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                </div>
                            </div>
                            <div class="text-center d-grid">
                                <button class="btn btn-success" type="submit"> Sign Up </button>
                            </div>

                        </form>


                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white-50">Already have account?  <a href="{{route('login')}}" class="text-white ms-1"><b>Sign In</b></a></p>
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

<footer class="footer footer-alt">
  <script>document.write(new Date().getFullYear())</script> &copy; Developed by <a href="#" class="text-white-50">ASHIK</a>
</footer>

<!-- Vendor js -->
<script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('backend/assets/js/app.min.js')}}"></script>

</body>
</html>
