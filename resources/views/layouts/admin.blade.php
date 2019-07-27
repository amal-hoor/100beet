<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>Admin Pro Admin Template - The Ultimate Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('assets/plugins/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{asset('assets/plugins/c3-master/c3.min.css')}}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('assets/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('css/pages/dashboard1.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('css/colors/megna-dark.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

<body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Admin Pro</p>
    </div>
</div>

<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon --><b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{asset('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="{{asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                         <img src="{{asset('assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span> </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <li class="nav-item hidden-sm-down"><span>Admins</span></li>
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search">
                            <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                    </li>
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                            <ul>
                                <li>
                                    <div class="drop-title">Notifications</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        @foreach(auth()->user()->notifications as $notification)
                                        <a href="#">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                               <span class="mail-desc">{{$notification->body}}</span> <span class="time">{{$notification->created_at}}</span> </div>
                                        </a>
                                            @endforeach
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="{{route('notifications.index')}}"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@if(auth()->user()->photo)<img src="{{asset('/images'.auth()->user()->photo->path)}}" alt="user" class="profile-pic" />@else<img src="https://via.placeholder.com/150

C/O https://placeholder.com/"  class="profile-pic" >@endif</a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <ul class="dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img">@if(auth()->user()->photo)<img src="{{asset('/images'.auth()->user()->photo->path)}}" alt="user">@endif</div>
                                        <div class="u-text">
                                            <h4>{{auth()->user()->name}}</h4>
                                            <p class="text-muted">{{auth()->user()->email}}</p></div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{route('admin.logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">

                    <li class="nav-devider"></li>
                    <li class="nav-small-cap">PERSONAL</li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Admins</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li class="nav-item">
                            <a href="{{route('admin.index')}}" class="nav-link ">
                            <span class="title">All Admins</span>
                            </a>
                            </li>
                            <li class="nav-item  ">
                            <a href="{{route('admin.create')}}" class="nav-link ">
                            <span class="title">Create Admins</span>
                            </a>
                            </li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple-outline"></i><span class="hide-menu">Users</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link ">
                            <span class="title">All Users</span>
                            </a>
                            </li>
                            <li class="nav-item  ">
                            <a href="{{route('user.create')}}" class="nav-link ">
                            <span class="title">Create User</span>
                            </a>
                            </li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Products</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li class="nav-item  ">
                                <a href="{{route('products.index')}}" class="nav-link ">
                                    <span class="title">All Products</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="{{route('product.create')}}" class="nav-link ">
                                <span class="title">Create Product</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-archive"></i><span class="hide-menu">Categories</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li class="nav-item  ">
                                <a href="{{route('categories.index')}}" class="nav-link ">
                                <span class="title">All Categories</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-numeric-9-plus-box-outline"></i><span class="hide-menu">Orders</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li class="nav-item">
                                <a href="{{route('orders.index')}}" class="nav-link ">
                                <span class="title">All Orders</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="{{route('order.create')}}" class="nav-link ">
                                <span class="title">Create Order</span>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gift"></i><span class="hide-menu">Offers</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li class="nav-item  ">
                                <a href="{{route('offers.index')}}" class="nav-link ">
                                <span class="title">All Offers</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('offer.create')}}" class="nav-link ">
                                <span class="title">Create Offer</span>
                                </a>
                            </li>
                       </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-label"></i><span class="hide-menu">Packages</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li class="nav-item  ">
                                <a href="{{route('packages.index')}}" class="nav-link ">
                                <span class="title">All Packages</span>
                                </a>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{route('package.create')}}" class="nav-link ">
                                <span class="title">Create Package</span>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-menu-right"></i><span class="hide-menu">Sponsers</span></a>
                        <ul aria-expanded="false" class="collapse">

                            <li class="nav-item  ">
                                <a href="{{route('sponsers.index')}}" class="nav-link ">
                                <span class="title">All Sponsers</span>
                                </a>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{route('sponser.create')}}" class="nav-link ">
                                <span class="title">Create Sponser</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cellphone-settings"></i><span class="hide-menu">Notifications</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li class="nav-item  ">
                                <a href="{{route('notifications.index')}}" class="nav-link ">
                                <span class="title">All Notifications</span>
                                </a>
                            </li>
                       </ul>
                    </li>



                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        @yield('content')

        <footer class="footer">
            © 2019 Admin Pro by wrappixel.com
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>


<!--<script src="{{asset('assets/global/plugins/respond.min.js')}}"></script>-->
<!--<script src="{{asset('assets/global/plugins/excanvas.min.js')}}"></script>-->
<!--<script src="{{asset('assets/global/plugins/ie8.fix.min.js')}}"></script>-->
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
                <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
                <!-- Bootstrap popper Core JavaScript -->
                <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
                <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
                <!-- slimscrollbar scrollbar JavaScript -->
                <script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
                <!--Wave Effects -->
                <script src="{{asset('js/waves.js')}}"></script>
                <!--Menu sidebar -->
                <script src="{{asset('js/sidebarmenu.js')}}"></script>
                <!--Custom JavaScript -->
                <script src="{{asset('js/custom.min.js')}}"></script>
                <!-- ============================================================== -->
                <!-- This page plugins -->
                <!-- ============================================================== -->
                <!--sparkline JavaScript -->
                <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
                <!--morris JavaScript -->
                <script src="{{asset('assets/plugins/chartist-js/dist/chartist.min.js')}}"></script>
                <script src="{{asset('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
                <!--c3 JavaScript -->
                <script src="{{asset('assets/plugins/d3/d3.min.js')}}"></script>
                <script src="{{asset('assets/plugins/c3-master/c3.min.js')}}"></script>
                <!-- Popup message jquery -->
                <script src="{{asset('assets/plugins/toast-master/js/jquery.toast.js')}}"></script>
                <!-- Chart JS -->
                <script src="{{asset('js/dashboard1.js')}}"></script>
                <!-- ============================================================== -->
                <!-- Style switcher -->
                <!-- ============================================================== -->
                <script src="{{asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

</html>

