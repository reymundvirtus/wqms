<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WQMS - Calendar</title>
    <!-- loader-->
    <link href="css/pace.min.css" rel="stylesheet" />
    <script src="js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!--Full Calendar Css-->
    <link href="plugins/fullcalendar/css/fullcalendar.min.css" rel='stylesheet' />
    <!-- simplebar CSS-->
    <link href="plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="css/sidebar-menu.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="{{ route('dashboard') }}">
                    <img src="images/logo-icon.png" class="logo-icon" alt="logo icon">
                    <h5 class="logo-text">Water Quality MS</h5>
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol">
                <li class="sidebar-header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('icons">
                        <i class="zmdi zmdi-invert-colors"></i> <span>UI Icons</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('forms">
                        <i class="zmdi zmdi-format-list-bulleted"></i> <span>Forms</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tables">
                        <i class="zmdi zmdi-grid"></i> <span>Tables</span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('calendar') }}">
                        <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
                        {{-- <small class="badge float-right badge-light">New</small> --}}
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile') }}">
                        <i class="zmdi zmdi-face"></i> <span>Profile</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('login" target="_blank">
                        <i class="zmdi zmdi-lock"></i> <span>Login</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('register" target="_blank">
                        <i class="zmdi zmdi-account-circle"></i> <span>Registration</span>
                    </a>
                </li>


                <li class="sidebar-header">LABELS</li>
                <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a>
                </li>
                <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i>
                        <span>Warning</span></a></li>
                <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a>
                </li> --}}

            </ul>

        </div>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        {{-- <form class="search-bar">
                            <input type="text" class="form-control" placeholder="Enter keywords">
                            <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                        </form> --}}
                        <h4 class="logo-text" style="left: 10px">Water Quality Monitoring System</h4>
                    </li>
                </ul>

                <ul class="navbar-nav align-items-center right-nav-link">
                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                            href="javascript:void();">
                            <i class="fa fa-envelope-open-o"></i></a>
                    </li>
                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                            href="javascript:void();">
                            <i class="fa fa-bell-o"></i></a>
                    </li>
                    <li class="nav-item language">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                            href="javascript:void();"><i class="fa fa-flag"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"
                            href="#">
                            <span class="user-profile"><img src="images/avatar.jpg" class="img-circle"
                                    alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3"
                                                src="images/avatar.jpg" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-2 user-title">{{ auth()->user()->name }}</h6>
                                            <p class="user-subtitle">{{ auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            {{-- <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li> --}}
                            <li class="dropdown-divider"></li>
                            {{-- <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li> --}}
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-settings mr-2"></i> Settings</li>
                            <li class="dropdown-divider"></li>
                            @auth
                                <li class="dropdown-item">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            style="padding: 0; border: none; background: none; color: #fff; width: 100%; text-align: left"><i
                                                class="icon-power mr-2"></i> Logout</button>
                                    </form>
                                </li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">
                <h4 class="sidebar-header">CALENDAR</h4>

                <div class="mt-3">
                    <div id='calendar'></div>
                </div>

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->
            <hr>
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reminder</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Creator</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Change Water</th>
                                        <td>2022-18-7</td>
                                        <td>2022-28-7</td>
                                        <td>2022-18-7</td>
                                        <td>Ongoing</td>
                                        <td>Clark</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Clean water</th>
                                        <td>2022-20-7</td>
                                        <td>2022-30-7</td>
                                        <td>2022-19-7</td>
                                        <td>Ongoing</td>
                                        <td>Jill</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Put Water</th>
                                        <td colspan="0">2022-10-7</td>
                                        <td>2022-17-7</td>
                                        <td>2022-10-7</td>
                                        <td>Expired</td>
                                        <td>Clark</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End content-wrapper-->

        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        <footer class="footer">
            <div class="container">
                <div class="text-center">
                    Water Quality Monitoring System
                </div>
            </div>
        </footer>
        <!--End footer-->

        <!--start color switcher-->
        {{-- <div class="right-sidebar">
            <div class="switcher-icon">
                <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
            </div>
            <div class="right-sidebar-content">

                <p class="mb-0">Gaussion Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>

                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>

            </div>
        </div>
        <!--end color switcher-->

    </div>
    <!--End wrapper--> --}}


        <!-- Bootstrap core JavaScript-->

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- simplebar js -->
        <script src="plugins/simplebar/js/simplebar.js"></script>
        <!-- sidebar-menu js -->
        <script src="js/sidebar-menu.js"></script>

        <!-- Custom scripts -->
        <script src="js/app-script.js"></script>

        <!-- Full Calendar -->
        <script src='plugins/fullcalendar/js/moment.min.js'></script>
        <script src='plugins/fullcalendar/js/fullcalendar.min.js'></script>
        <script src="plugins/fullcalendar/js/fullcalendar-custom-script.js"></script>

</body>

</html>
