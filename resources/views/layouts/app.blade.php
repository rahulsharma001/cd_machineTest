<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rareecom store , one stop shop for all your ecommerce needs">
    <meta name="keywords" content="rareecom, ecommerce, store, online store">
    <meta name="author" content="pixelstrap">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('assets/images/dashboard/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/dashboard/favicon.png')}}" type="image/x-icon">
    <title>Keshaa CRM</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css')}}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css')}}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">

    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/themify-icons.css">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin.css')}}">

    <!-- Datatable css -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>

    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        {{-- @if(Route::current()->getName() != 'login')
            @yield('header',View::make('admin.layouts.header'))
        @endif --}}

        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row">
                <div class="main-header-left d-lg-none">
                    <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" src="{{asset('assets/images/laravel_logo.png')}}" alt=""></a></div>
                </div>
                <div class="mobile-sidebar">
                    <div class="media-body text-right switch-sm">
                        <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                    </div>
                </div>
                <div class="nav-right col">
                    <ul class="nav-menus">
                        <li>
                            <form class="form-inline search-form">
                                <div class="form-group">
                                    <input class="form-control-plaintext" type="search" placeholder="Search.."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                                </div>
                            </form>
                        </li>
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
                        {{-- <li class="onhover-dropdown"><a class="txt-dark" href="#">
                                <h6>EN</h6>
                            </a>
                            <ul class="language-dropdown onhover-show-div p-20">
                                <li><a href="#" data-lng="en"><i class="flag-icon flag-icon-is"></i> English</a></li>
                                <li><a href="#" data-lng="es"><i class="flag-icon flag-icon-um"></i> Spanish</a></li>
                                <li><a href="#" data-lng="pt"><i class="flag-icon flag-icon-uy"></i> Portuguese</a></li>
                                <li><a href="#" data-lng="fr"><i class="flag-icon flag-icon-nz"></i> French</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="onhover-dropdown"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge">3</span><span class="dot"></span>
                            <ul class="notification-dropdown onhover-show-div p-0">
                                <li>Notification <span class="badge badge-pill badge-primary pull-right">3</span></li>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mt-0"><span><i class="shopping-color" data-feather="shopping-bag"></i></span>Your order ready for Ship..!</h6>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mt-0 txt-success"><span><i class="download-color font-success" data-feather="download"></i></span>Download Complete</h6>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mt-0 txt-danger"><span><i class="alert-color font-danger" data-feather="alert-circle"></i></span>250 MB trash files</h6>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="txt-dark"><a href="#">All</a> notification</li>
                            </ul>
                        </li> --}}
                        {{-- <li><a href="#"><i class="right_side_toggle" data-feather="message-square"></i><span class="dot"></span></a></li>
                        <li class="onhover-dropdown">
                            <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="{{asset('assets/images/dashboard/man.png')}}" alt="header-user">
                                <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                                <li><a href="#"><i data-feather="user"></i>Edit Profile</a></li>
                                <li><a href="#"><i data-feather="mail"></i>Inbox</a></li>
                                <li><a href="#"><i data-feather="lock"></i>Lock Screen</a></li>
                                <li><a href="#"><i data-feather="settings"></i>Settings</a></li>
                                <li><a href="#"><i data-feather="log-out"></i>Logout</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                    <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
                </div>
            </div>
        </div>
        <!-- Page Header Ends -->



        @yield('content')


        <!-- latest jquery-->
        <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>

        
        <!-- Datatable js -->
        <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
        
        <!-- feather icon js-->
        <script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
        
        <!-- Sidebar jquery-->
        <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
        
        <!-- touchspin js-->
        <script src="{{asset('assets/js/touchspin/vendors.min.js')}}"></script>
        <script src="{{asset('assets/js/touchspin/touchspin.js')}}"></script>
        <script src="{{asset('assets/js/touchspin/input-groups.min.js')}}"></script>
        
        <!-- form validation js-->
        <script src="{{asset('assets/js/dashboard/form-validation-custom.js')}}"></script>
        
        <!-- ckeditor js-->
        <script src="{{asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('assets/js/editor/ckeditor/styles.js')}}"></script>
        <script src="{{asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
        <script src="{{asset('assets/js/editor/ckeditor/ckeditor.custom.js')}}"></script>
        
        <!-- Zoom js-->
        <script src="{{asset('assets/js/jquery.elevatezoom.js')}}"></script>
        <script src="{{asset('assets/js/zoom-scripts.js')}}"></script>
        
        <!--Customizer admin-->
        <script src="{{asset('assets/js/admin-customizer.js')}}"></script>
        
        <!--right sidebar js-->
        <script src="{{asset('assets/js/chat-menu.js')}}"></script>
        
        <!--chartist js-->
        <script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
        
        <!--chartjs js-->
        <script src="{{asset('assets/js/chart/chartjs/chart.min.js')}}"></script>
        
        <!-- lazyload js-->
        <script src="{{asset('assets/js/lazysizes.min.js')}}"></script>

        <!--copycode js-->
        <script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
        <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
        <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
        
        <!--counter js-->
        <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
        
        <!--peity chart js-->
        <script src="{{asset('assets/js/chart/peity-chart/peity.jquery.js')}}"></script>
        
        <!--sparkline chart js-->
        <script src="{{asset('assets/js/chart/sparkline/sparkline.js')}}"></script>
        
        <!--Customizer admin-->
        <script src="{{asset('assets/js/admin-customizer.js')}}"></script>
        
        <!--dashboard custom js-->
        <script src="{{asset('assets/js/dashboard/default.js')}}"></script>
        
        <!--right sidebar js-->
        <script src="{{asset('assets/js/chat-menu.js')}}"></script>

        <!--height equal js-->
        <script src="{{asset('assets/js/height-equal.js')}}"></script>
        
        <!-- lazyload js-->
        <script src="{{asset('assets/js/lazysizes.min.js')}}"></script>
        
        <!--script admin-->
        <script src="{{asset('assets/js/admin-script.js')}}"></script>
        
        <!-- Bootstrap js-->
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.js')}}"></script>
        @yield('scripts')
        
    </body>
    
    </html>