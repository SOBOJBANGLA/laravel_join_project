<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote-django/layouts/layouts-light-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2024 10:31:05 GMT -->
<head>

    <meta charset="utf-8"/>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/agent/')}}/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/agent/')}}/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('assets/agent/')}}/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('assets/agent/')}}/css/app.min.css" rel="stylesheet" type="text/css"/>

</head>

<body data-topbar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/themes/betting/images/SeraBajiLogo.png')}}" alt=""
                                         height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/themes/betting/images/SeraBajiLogo.png')}}" alt=""
                                         height="17">
                                </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/themes/betting/images/SeraBajiLogo.png')}}"
                                         style="height: 100px;" alt=""
                                         height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/themes/betting/images/SeraBajiLogo.png')}}"
                                         style="height: 50px;" alt=""
                                         height="19">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>


            </div>

            <div class="d-flex">


                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"
                             src="https://img.freepik.com/free-psd/contact-icon-illustration-isolated_23-2151903337.jpg"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1"
                              key="t-henry">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        {{--                        <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i>--}}
                        {{--                            <span key="t-lock-screen">Lock screen</span></a>--}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{route('agent.logout')}}"><i
                                class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                key="t-logout">Logout</span></a>
                    </div>
                </div>


            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Menu</li>


                    <li>
                        <a href="{{route('agent.dashboard')}}" class="waves-effect">
                            <i class="bx bx-chat"></i>
                            <span key="t-chat">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('agent.create.user')}}" class="waves-effect">
                            <i class="bx bx-chat"></i>
                            <span key="t-chat">Create User</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('agent.all.user')}}" class="waves-effect">
                            <i class="bx bx-chat"></i>
                            <span key="t-chat">All User</span>
                        </a>
                    </li>

                    {{--                    <li>--}}
                    {{--                        <a href="{{route('agent.user.deposit')}}" class="waves-effect">--}}
                    {{--                            <i class="bx bx-chat"></i>--}}
                    {{--                            <span key="t-chat">User Deposit</span>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}

                    {{--                    <li>--}}
                    {{--                        <a href="{{route('agent.user.withdraw')}}" class="waves-effect">--}}
                    {{--                            <i class="bx bx-chat"></i>--}}
                    {{--                            <span key="t-chat">User Withdraw</span>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}

                    <li>
                        <a href="{{route('agent.fund')}}" class="waves-effect">
                            <i class="bx bx-chat"></i>
                            <span key="t-chat">User Fund</span>
                        </a>
                    </li>

                    {{--                    <li>--}}
                    {{--                        <a href="{{route('agent.fund.history')}}" class="waves-effect">--}}
                    {{--                            <i class="bx bx-chat"></i>--}}
                    {{--                            <span key="t-chat"> Fund History</span>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}

                    {{--                    <li>--}}
                    {{--                        <a href="javascript: void(0);" class="has-arrow waves-effect">--}}
                    {{--                            <i class="bx bx-calendar"></i>--}}
                    {{--                            <span key="t-dashboards">Calendars</span>--}}
                    {{--                        </a>--}}
                    {{--                        <ul class="sub-menu" aria-expanded="false">--}}
                    {{--                            <li><a href="calendar.html" key="t-tui-calendar">TUI Calendar</a></li>--}}
                    {{--                            <li><a href="calendar-full.html" key="t-full-calendar">Full Calendar</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}


                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @yield('agent')


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © .
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/agent/')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/agent/')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/agent/')}}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('assets/agent/')}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('assets/agent/')}}/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="{{asset('assets/agent/')}}/libs/apexcharts/apexcharts.min.js"></script>

<script src="{{asset('assets/agent/')}}/js/pages/dashboard.init.js"></script>

<script src="{{asset('assets/agent/')}}/js/app.js"></script>
<script src="{{asset('assets/global/js/notiflix-aio-2.7.0.min.js')}}"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/67781e4f49e2fd8dfe021de0/1igmjcq65';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
@include('themes.betting.partials.notification')

</body>

<!-- Mirrored from themesbrand.com/skote-django/layouts/layouts-light-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2024 10:31:05 GMT -->
</html>
