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
    {{-- <link href="{{ asset('css/pace.min.css') }}" rel="stylesheet" /> --}}
    {{-- <script src="{{ asset('js/pace.min.js') }}"></script> --}}
    <!--favicon-->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <!--Full Calendar Css-->
    <link href="{{ asset('plugins/fullcalendar/css/fullcalendar.min.css') }}" rel='stylesheet' />
    <!-- simplebar CSS-->
    <link href="{{ asset('plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{ asset('css/sidebar-menu.css') }}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ asset('css/app-style.css') }}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> --}}
    <style>
        .fc-event {
        font-size: 16px !important; 
    }
    </style>
</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    {{-- <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div> --}}
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
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
                    <a href="{{ route('icons') }}">
                        <i class="zmdi zmdi-invert-colors"></i> <span>UI Icons</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('forms') }}">
                        <i class="zmdi zmdi-format-list-bulleted"></i> <span>Forms</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tables') }}">
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
                    <a href="{{ route('login') }}" target="_blank">
                        <i class="zmdi zmdi-lock"></i> <span>Login</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('register') }}" target="_blank">
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
                            <span class="user-profile"><img src="{{ asset('images/avatar.jpg') }}" class="img-circle"
                                    alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3"
                                                src="{{ asset('images/avatar.jpg') }}" alt="user avatar"></div>
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
                        <h5 class="card-title">Reminders</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Title</th>
                                        <th scope="col" class="text-center">Start Date</th>
                                        <th scope="col" class="text-center">End Date</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Assigned By</th>
                                        {{-- <th scope="col">Created At</th> --}}
                                        {{-- <th scope="col">Status</th>
                                        <th scope="col">Creator</th> --}}
                                    </tr>
                                </thead>
                                <tbody id="get_reminders">
                                    {{-- Data wil appear here --}}
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

        {{-- Modal for Read --}}
        <div class="modal fade" id="addReminder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: rgba(67, 56, 202, 1)">
                    <div class="card card-authentication1 mx-auto my-4">
                        <div class="card-body">
                            <div class="card-content p-2">
                                <form action="calendar" method="POST">
                                    <div class="card-title text-uppercase text-center py-3">Add Reminder</div>
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="text" id="title" name="title"
                                                class="form-control input-shadow" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="datetime-local" id="start_date" name="start_date"
                                                class="form-control input-shadow" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="datetime-local" id="end_date" name="end_date"
                                                class="form-control input-shadow" required>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="dater">Creator</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="text" id="dater" name="dater"
                                                class="form-control input-shadow" readonly>
                                        </div>
                                    </div> --}}
                                    <div class="modal-footer">
                                        <button type="submit" id="saveBtn" class="btn btn-primary"
                                            data-dismiss="modal">Done</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal for Update --}}
        <div class="modal fade" id="updateReminder" tabindex="-1" role="dialog1"
            aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: rgba(67, 56, 202, 1)">
                    <div class="card card-authentication1 mx-auto my-4">
                        <div class="card-body">
                            <div class="card-content p-2">
                                <div class="card-title text-uppercase text-center py-3">Update Reminder</div>
                                <form id="update_reminder" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="idu" class="sr-only">ID</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="hidden" id="idu" name="idu"
                                                class="form-control input-shadow" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="titleu">Title</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="text" id="titleu" name="titleu"
                                                class="form-control input-shadow">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="startu">Start</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="datetime-local" id="startu" name="startu"
                                                class="form-control input-shadow">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="endu">End</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="datetime-local" id="endu" name="endu"
                                                class="form-control input-shadow">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn card-hover" data-bs-dismiss="modal"
                                        style="background-color: #c94bbd; color: rgb(0, 0, 0)">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal for Read --}}
        <div class="modal fade" id="readReminder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: rgba(67, 56, 202, 1)">
                    <div class="card card-authentication1 mx-auto my-4">
                        <div class="card-body">
                            <div class="card-content p-2">
                                <div class="card-title text-uppercase text-center py-3">Reminder Details</div>
                                <form>
                                    @csrf
                                    <div class="form-group">
                                        <label for="titler">Title</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="text" id="titler" name="titler"
                                                class="form-control input-shadow" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="startr">Start</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="text" id="startr" name="startr"
                                                class="form-control input-shadow" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="endr">End</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="text" id="endr" name="endr"
                                                class="form-control input-shadow" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dater">Created At</label>
                                        <div class="position-relative has-icon-right">
                                            <input type="text" id="dater" name="dater"
                                                class="form-control input-shadow" readonly>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <!-- simplebar js -->
        <script src="{{ asset('plugins/simplebar/js/simplebar.js') }}"></script>
        <!-- sidebar-menu js -->
        <script src="{{ asset('js/sidebar-menu.js') }}"></script>

        <!-- Custom scripts -->
        <script src="{{ asset('js/app-script.js') }}"></script>
        <script src="{{ asset('js/ajax-calendar.js') }}"></script>

        <!-- Full Calendar -->
        <script src='{{ asset('plugins/fullcalendar/js/moment.min.js') }}'></script>
        <script src='{{ asset('plugins/fullcalendar/js/fullcalendar.min.js') }}'></script>
        {{-- <script src="{{ asset('plugins/fullcalendar/js/fullcalendar-custom-script.js') }}"></script> --}}
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let reminds = @json($reminds)

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev, next today',
                        center: 'title',
                        right: 'month, agendaWeek, agendaDay'
                    },

                    events: reminds,
                    eventColor: '#00405F',
                    // events: 'full-calendar', //? this will get the data from our database from this url to the web.php
                    selectable: true, //? allow to click the cell of calendar
                    selectHelper: true, //? it will draw placeholder while user dragging the events
                    //! navLinks: true, //? can click day/week names to navigate views

                    select: function(start, end, allDay) {

                        $('#addReminder').modal('toggle') // to show the reminder modal

                        $('#saveBtn').click(function() { // save in database when clicked
                            let title = $('#title').val()
                            let start_date = $('#start_date').val()
                            let end_date = $('#end_date').val()
                            // let start_date = moment(start).format('YYYY-MM-DD HH:mm:ss')
                            // let end_date = moment(end).format('YYYY-MM-DD HH:mm:ss')

                            $.ajax({
                                type: 'POST',
                                url: 'calendar',
                                dataType: 'json',
                                data: {
                                    title: title,
                                    start_date: start_date,
                                    end_date: end_date
                                },
                                success: function(response) {
                                    get_reminders(); //? call the function to get reminders
                                    $('#calendar').fullCalendar('renderEvent', {
                                        title: title,
                                        start: start_date,
                                        end: end_date,
                                    });
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Added Successfully!',
                                        showConfirmButton: false,
                                        background: '#0860A1',
                                        color: '#fff',
                                        iconColor: '#31A24C',
                                        timer: 2000
                                    })
                                    clear_inputs()
                                },
                                error: function(error) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: 'Added Unsuccessful!',
                                        text: 'Try Again or Reload the page!',
                                        showConfirmButton: false,
                                        background: '#0860A1',
                                        color: '#fff',
                                        iconColor: '#CC0000',
                                        timer: 3000
                                    })
                                }
                            })
                        })
                    },

                    //? for drag and drop
                    editable: true,
                    eventDrop: function (calEvent) {
                        let start_date = moment(calEvent.start).format('YYYY-MM-DD HH:mm:ss')
                        let end_date = moment(calEvent.end).format('YYYY-MM-DD HH:mm:ss')
                        let id = calEvent.id
                        console.log(start_date, end_date, id)
                        $.ajax({
                            type: 'PATCH',
                            dataType: 'json',
                            url: '/calendar/update' + '/' + id,
                            data: {
                                start_date, end_date,
                            },
                            success: function(response) {
                                get_reminders(); //? call the function to get reminders
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Updated Successfully!',
                                    showConfirmButton: false,
                                    background: '#0860A1',
                                    color: '#fff',
                                    iconColor: '#31A24C',
                                    timer: 2000
                                })
                            },
                            error: function(response) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Error Updating Reminder',
                                    text: 'Try Again or Reload the page!',
                                    showConfirmButton: false,
                                    background: '#0860A1',
                                    color: '#fff',
                                    iconColor: '#CC0000',
                                    timer: 3000
                                })
                            },
                        })
                    },

                    eventClick: function (calEvent) {
                        let id = calEvent.id
                        console.log(id)

                        Swal.fire({
                            title: 'Are you sure you want to remove it?',
                            text: "You won't be able to revert this!",
                            color: '#fff',
                            icon: 'warning',
                            iconColor: '#CC0000',
                            background: '#0860A1',
                            showCancelButton: true,
                            confirmButtonColor: '#31A24C',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, remove it!'
                        }).then((result) => {
                            if (result.isConfirmed) {

                                $.ajax({
                                    type: 'DELETE',
                                    dataType: 'json',
                                    url: '/calendar/delete' + '/' + id,
                                    success: function(response) {
                                        get_reminders(); //? call the function to get reminders
                                        $('#calendar').fullCalendar('removeEvents', response)
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: 'Deleted Successfully!',
                                            showConfirmButton: false,
                                            background: '#0860A1',
                                            color: '#fff',
                                            iconColor: '#31A24C',
                                            timer: 2000
                                        })
                                    },
                                    error: function(response) {
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'error',
                                            title: 'Error Deleting Reminder',
                                            text: 'Try Again or Reload the page!',
                                            showConfirmButton: false,
                                            background: '#0860A1',
                                            color: '#fff',
                                            iconColor: '#CC0000',
                                            timer: 3000
                                        })
                                    },
                                })
                            }
                        })
                    },

                    eventResize: function(event, delta) {

                        let start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss')
                        let end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss')
                        let title = event.title
                        let id = event.id
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: 'full-calendar/action',
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                id: id,
                                type: 'update',
                            },
                            success: function(response) {
                                calendar.fullCalendar('refetchEvents')
                                alert('success')
                            },
                            error: function(response) {
                                alert('error')
                            },
                        })
                    },

                    eventLimit: true, //? allow "more" link when too many events
                });
            })

            //? clearing inputs
            function clear_inputs() {

                $('#title').val('');
                $('#start_date').val('');
                $('#end_date').val('');
            }
        </script>
</body>

</html>
