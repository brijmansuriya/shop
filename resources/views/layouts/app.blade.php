<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> @yield('title')</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/skin/default_skin/css/theme.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/skin/default_skin/css/custom.css') }}"> --}}
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/assets/admin-tools/admin-forms/css/admin-forms.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/img/favicon.ico') }}">
    
    <link rel="stylesheet" href="{{ asset('admin/vendor/sw/sweetalert2.min.css') }}">
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/skin/default_skin/css/custom.css') }}">
</head>

<body>
    <div id="main">
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
                        <img src="{{ asset('admin/assets/img/avatars/1.jpg') }}" alt="avatar" class="mw30 br64 mr15">
                        {{ Auth::user()->name }}
                        <span class="caret caret-tp hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                        <li class="list-group-item">
                            <a href="{{ url('admin/settings/add') }}/{{ Auth::user()->id }}"
                                class="animated animated-short fadeInUp">
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
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
        <aside id="sidebar_left" class="nano nano-primary affix">
            <div class="sidebar-left-content nano-content">
                <header class="sidebar-header">
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
                <ul class="nav sidebar-menu">
                    <li class="sidebar-label pt20">Menu</li>
                    <li class="active">
                        <a href="{{ url('/home') }}">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a href=" {{ url('admin/category') }}">
                        <span class="glyphicon glyphicon-home"></span>
                        <span class="sidebar-title">Category</span>
                        </a>
                    </li>
                    <li class="">
                        <a href=" {{ url('admin/expense') }}">
                        <span class="glyphicon glyphicon-home"></span>
                        <span class="sidebar-title">Expense</span>
                        </a>
                    </li>
                    <li class="">
                        <a href=" {{ url('admin/agent') }}">
                        <span class="glyphicon glyphicon-home"></span>
                        <span class="sidebar-title">Agent</span>
                        </a>
                    </li>
                    <li class="">
                        <a href=" {{ url('admin/customer') }}">
                        <span class="glyphicon glyphicon-home"></span>
                        <span class="sidebar-title">Customer</span>
                        </a>
                    </li>
                    <li class="">
                        <a href=" {{ url('admin/vendors') }}">
                        <span class="glyphicon glyphicon-home"></span>
                        <span class="sidebar-title">Vendor</span>
                        </a>
                    </li>
                    <li class="">
                        <a href=" {{ url('admin/product') }}">
                        <span class="glyphicon glyphicon-home"></span>
                        <span class="sidebar-title">Product</span>
                        </a>
                    </li>
                </ul>
                <div class="sidebar-toggle-mini">
                    <a href="#">
                        <span class="fa fa-sign-out"></span>
                    </a>
                </div>
            </div>
        </aside>
        <section id="content_wrapper">
            <header id="topbar" class="affix">
                @yield('breadcrumb')
            </header>
            <section id="content" class="animated fadeIn" style="height: 627px;">
                @yield('content')
            </section>
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
        </section>
        
    </div>
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
    <!-- Theme Javascript -->
    <script src="{{ asset('admin/assets/js/utility/utility.js') }}"></script>
    <script src="{{ asset('admin/assets/js/demo/demo.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

   
<script src="{{ asset('admin/vendor/sw/sweetalert2.all.min.js') }}"></script>
    <!-- Widget Javascript -->
    {{-- <script src="{{ asset('admin/assets/js/demo/widgets.js') }}"></script> --}}
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init();

           

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
                    }, 300)

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
