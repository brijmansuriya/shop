<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tital</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    {{-- <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600'> --}}

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/skin/default_skin/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/skin/default_skin/css/custom.css') }}">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/admin-tools/admin-forms/css/admin-forms.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/img/favicon.ico') }}">

    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/skin/default_skin/css/custom.css') }}">
</head>

<body>
    <!-- Start: Main -->
    <div id="main">
        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top">
            <div class="navbar-branding">
                <a class="navbar-brand" href="/">
                    <b>Admin</b>
                </a>
                <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
            </div>
            {{-- <ul class="nav navbar-nav navbar-left">
               
                <li class="hidden-xs">
                    <a class="request-fullscreen toggle-active" href="#">
                        <span class="ad ad-screen-full fs18"></span>
                    </a>
                </li>
            </ul> --}}
          
            <ul class="nav navbar-nav navbar-right">
                <li class="menu-divider hidden-xs">
                    <i class="fa fa-circle"></i>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
                        <img src="{{ asset('admin/assets/img/avatars/1.jpg') }}" alt="avatar" class="mw30 br64 mr15"> {{Auth::user()->name;}}
                        <span class="caret caret-tp hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                        <li class="list-group-item">
                            <a href="{{url('admin/settings/add')}}/{{Auth::user()->id;}}" class="animated animated-short fadeInUp">
                                <span class="fa fa-gear"></span> Account Settings
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="animated animated-short fadeInUp">
                                <span class="fa fa-bell"></span> Activity
                            </a>
                        </li>
                        <li class="dropdown-footer">
                          
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                              <span class="fa fa-power-off pr5"></span>{{ __('Logout') }}
                         </a>
                        </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </ul>
                </li>
            </ul>

        </header>
        <!-- End: Header -->

        <!-- Start: Sidebar Left -->
        <aside id="sidebar_left" class="nano nano-primary affix">

            <!-- Start: Sidebar Left Content -->
            <div class="sidebar-left-content nano-content">

                <!-- Start: Sidebar Header -->
                <header class="sidebar-header">

                
                    <!-- Sidebar Widget - Author (hidden)  -->
                    <div class="sidebar-widget author-widget hidden">
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="{{ asset('admin/assets/img/avatars/3.jpg') }}" class="img-responsive">
                            </a>
                            <div class="media-body">
                                <div class="media-links">
                                    <a href="#" class="sidebar-menu-toggle">User Menu -</a>
                                    <a href="/">Logout</a>
                                </div>
                                <div class="media-author">Michael Richards
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Widget - Search (hidden) -->
                    <div class="sidebar-widget search-widget search-lg hidden">
                        <div class="form-group mbn">
                            <span class="append-icon left">
                                <i class="fa fa-search"></i>
                            </span>
                            <input type="text" class="form-control" id="sidebarSearch" placeholder="Search...">
                        </div>
                    </div>
                    <div class="sidebar-widget search-widget hidden">
                        <div class="form-group mbn">
                            <span class="append-icon left">
                                <i class="fa fa-search"></i>
                            </span>
                            <input type="text" class="form-control" id="sidebarSearch" placeholder="Search...">
                        </div>
                    </div>

                </header>
                <!-- End: Sidebar Header -->

                <!-- Start: Sidebar Left Menu -->
                <ul class="nav sidebar-menu">
                    <li class="sidebar-label pt20">Menu</li>
                   
                    <li class="active">
                        <a href="{{url('/home')}}">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('admin/category') }}">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="sidebar-title">Category</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('admin/expense') }}">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="sidebar-title">Expense</span>
                        </a>
                    </li>


                   
                </ul>
                <!-- End: Sidebar Menu -->

                <!-- Start: Sidebar Collapse Button -->
                <div class="sidebar-toggle-mini">
                    <a href="#">
                        <span class="fa fa-sign-out"></span>
                    </a>
                </div>
                <!-- End: Sidebar Collapse Button -->

            </div>
            <!-- End: Sidebar Left Content -->

        </aside>
        <!-- End: Sidebar Left -->

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">


            <!-- Start: Topbar -->
            <header id="topbar" class="affix">
                @yield('breadcrumb')
               
               
            </header>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn" style="height: 627px;">

            @yield('content')

            </section>
            <!-- End: Content -->

            <!-- Begin: Page Footer -->
            <footer id="content-footer">
                <div class="row">
                    <div class="col-xs-6">
                        <span class="footer-legal">© 2017 Admin</span>
                    </div>
                    <div class="col-xs-6 text-right">
                        <span class="footer-meta">
                            <b></b> </span>
                        <a href="#content" class="footer-return-top">
                            <span class="fa fa-arrow-up"></span>
                        </a>
                    </div>
                </div>
            </footer>
            <!-- End: Page Footer -->

        </section>
        <!-- End: Content-Wrapper -->

      
    </div>
    <!-- End: Main -->


    <!-- jQuery -->
    <script src="{{ asset('admin/vendor/jquery/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery/jquery_migrate/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

    {{-- notification js --}}
    <script src="{{ asset('admin/vendor/plugins/pnotify/pnotify.js') }}"></script>
    <script src='{{ asset('admin/includes/js/notifaction.js') }}'></script>
    
    <!-- Sparklines Plugin -->
    <script src="{{ asset('admin/vendor/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Simple Circles Plugin -->
    {{-- <script src="{{ asset('admin/vendor/plugins/circles/circles.js') }}"></script> --}}

    <!-- JvectorMap Plugin + US Map (more maps in plugin/assets folder) -->
    {{-- <script src="{{ asset('admin/vendor/plugins/jvectormap/jquery.jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js') }}"></script> --}}

    <!-- Theme Javascript -->
    <script src="{{ asset('admin/assets/js/utility/utility.js') }}"></script>
    <script src="{{ asset('admin/assets/js/demo/demo.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <!-- Widget Javascript -->
    {{-- <script src="{{ asset('admin/assets/js/demo/widgets.js') }}"></script> --}}
    <script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core      
        Core.init();

        // Init Demo JS
        // Demo.init();

        // Init Widget Demo JS
        // demoHighCharts.init();

        // Because we are using Admin Panels we use the OnFinish 
        // callback to activate the demoWidgets. It's smoother if
        // we let the panels be moved and organized before 
        // filling them with content from various plugins

        // Init plugins used on this page
        // HighCharts, JvectorMap, Admin Panels

        // Init Admin Panels on widgets inside the ".admin-panels" container
        $('.admin-panels').adminpanel({
            grid: '.admin-grid',
            draggable: true,
            preserveGrid: true,
            mobile: false,
            onStart: function() {
                // Do something before AdminPanels runs
            },
            onFinish: function() {
                $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

                // Init the rest of the plugins now that the panels
                // have had a chance to be moved and organized.
                // It's less taxing to organize empty panels
                setTimeout(function() {
                    runVectorMaps(); // function below
                    demoHighCharts.init();
                },300)

            },
            onSave: function() {
                $(window).trigger('resize');
            }
        });

     

    });
    </script>
    <!-- END: PAGE SCRIPTS -->
    @yield('js')
</body>

</html>
