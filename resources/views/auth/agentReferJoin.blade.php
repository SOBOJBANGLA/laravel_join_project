<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote-django/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2024 10:32:43 GMT -->
<head>

    <meta charset="utf-8"/>
    <title>Login | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/agent/')}}/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/agent/')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('assets/agent/')}}/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('assets/agent/')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to continue to Skote.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('assets/agent/')}}/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="auth-logo">
                            <a href="index.html" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/agent/')}}/images/logo-light.svg" alt=""
                                                     class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>

                            <a href="index.html" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/agent/')}}/images/logo.svg" alt=""
                                                     class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal"
                                  action="{{route('agent.refer.join.save')}}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="username" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstname" id="username"
                                           placeholder="Enter firstname">

                                    <input type="hidden" class="form-control" name="ref_id" value="{{$ref_id}}"
                                           id="username"
                                           placeholder="Enter firstname">
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" id="username"
                                           placeholder="Enter lastname">
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username"
                                           placeholder="Enter username">
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="username"
                                           placeholder="Enter email">
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" id="username"
                                           placeholder="Enter phone number">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="password" class="form-control"
                                               placeholder="Enter password"
                                               aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light " type="button" id="password-addon"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                    <label class="form-check-label" for="remember-check">
                                        Remember me
                                    </label>
                                </div>

                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In
                                    </button>
                                </div>


                                <div class="mt-4 text-center">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i>
                                        Forgot your password?</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- end account-pages -->

<!-- JAVASCRIPT -->
<script src="{{asset('assets/agent/')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/agent/')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/agent/')}}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('assets/agent/')}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('assets/agent/')}}/libs/node-waves/waves.min.js"></script>

<!-- App js -->
<script src="{{asset('assets/agent/')}}/js/app.js"></script>
</body>

<!-- Mirrored from themesbrand.com/skote-django/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2024 10:32:43 GMT -->
</html>
