<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="endless admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, endless admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('images/endless/favicon.ico') }}" type="image/x-icon">
    <title>Endless - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/prism.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/style.css') }}">
    <link id="color" rel="stylesheet" type="text/css" href="{{ asset('css/endless/light-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/responsive.css') }}">

    <!-- Leaflet map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/controlLayersTree.css') }}">

    <!-- Icon Layers -->
    <link rel="stylesheet" href="{{ asset('css/iconLayersExtend.css') }}" crossorigin="anonymous">

    <!-- Pretty Checkbox -->

    <style>
    #mainMap {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .page-wrapper .page-body-wrapper .page-sidebar {
        width: 255px;
        position: fixed;
        background: #07112e;
        top: 0;
        height: calc(100vh);
        z-index: 1000;
        -webkit-transition: .3s;
        transition: .3s;
    }

    #basemapControl {
        margin-left: -10px;
    }

    .treeIcon {
        width: 15px;
    }

    .leaflet-layerstree-header-label {
        display: inline-flex;
        position: relative;
    }

    .leaflet-layerstree-header-label>span {
        color: #363761;
        padding-left: 5px;

    }

    .leaflet-layerstree-header-label>input {
        height: 15px;
        width: 15px;
        -webkit-appearance: none;
        -moz-appearance: none;
        -o-appearance: none;
        appearance: none;
        border: 1px solid #363761;
        border-radius: 4px;
        outline: none;
        transition-duration: 0.3s;
        margin-left: 6px;
        background: transparent;
    }

    .leaflet-layerstree-header-label>input:checked {
        border: 1px solid #363761;
        background-color: #2f7db7;
    }

    .leaflet-layerstree-header-label>input:checked+span::before {
        content: '\2713';
        text-align: left;
        color: #2a3142;
    }

    .leaflet-layerstree-header-label>input:active {
        border: 2px solid #34495E;
    }
    </style>
</head>

<body>

    <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    SITASWIL
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> -->







    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader bg-white">
            <div class="whirly-loader"> </div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-page box-layout">






        <!-- Page Header Start-->
        @if (Route::has('login'))
        <div class="page-main-header">
            <div class="main-header-right row">
                <div class="main-header-left d-lg-none">
                    <div class="logo-wrapper">
                        <a href="index.html"><img src="{{ asset('images/endless/endless-logo2.png') }}" alt=""></a>
                        Badan Informasi Geospasial
                    </div>
                </div>
                <div class="nav-right col p-0">
                    <ul class="nav-menus">
                        <li>
                            <form class="form-inline search-form" action="#" method="get">
                                <div class="form-group">
                                    <div class="Typeahead Typeahead--twitterUsers">
                                        <div class="u-posRelative">
                                            <input class="Typeahead-input form-control-plaintext" id="demo-input"
                                                type="text" name="q" placeholder="Search...">
                                            <div class="spinner-border Typeahead-spinner" role="status"><span
                                                    class="sr-only">Loading...</span></div><span
                                                class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                                        </div>
                                        <div class="Typeahead-menu"></div>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a></li>
                        @auth
                        <li class="onhover-dropdown"><a class="txt-dark" href="#">
                                <h6>EN</h6>
                            </a>
                            <ul class="language-dropdown onhover-show-div p-20">
                                <li><a href="#" data-lng="en"><i class="flag-icon flag-icon-is"></i> English</a></li>
                                <li><a href="#" data-lng="es"><i class="flag-icon flag-icon-um"></i> Spanish</a></li>
                                <li><a href="#" data-lng="pt"><i class="flag-icon flag-icon-uy"></i> Portuguese</a></li>
                                <li><a href="#" data-lng="fr"><i class="flag-icon flag-icon-nz"></i> French</a></li>
                            </ul>
                        </li>

                        <li class="onhover-dropdown"><i data-feather="bell"></i><span class="dot"></span>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>Notification <span class="badge badge-pill badge-primary pull-right">3</span></li>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mt-0"><span><i class="shopping-color"
                                                        data-feather="shopping-bag"></i></span>Your order ready for
                                                Ship..!<small class="pull-right">9:00 AM</small></h6>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mt-0 txt-success"><span><i class="download-color font-success"
                                                        data-feather="download"></i></span>Download Complete<small
                                                    class="pull-right">2:30 PM</small></h6>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mt-0 txt-danger"><span><i class="alert-color font-danger"
                                                        data-feather="alert-circle"></i></span>250 MB trash files<small
                                                    class="pull-right">5:00 PM</small></h6>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="bg-light txt-dark"><a href="#">All</a> notification</li>
                            </ul>
                        </li>

                        <li><a href="#"><i class="right_side_toggle" data-feather="message-circle"></i><span
                                    class="dot"></span></a></li>

                        <li class="onhover-dropdown">
                            <div class="media align-items-center"><img
                                    class="align-self-center pull-right img-50 rounded-circle"
                                    src="{{ asset('images/endless/dashboard/user.png') }}" alt="header-user">
                                <div class="dotted-animation"><span class="animate-circle"></span><span
                                        class="main-circle"></span></div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div p-20">
                                <li><a href="#"><i data-feather="user"></i> Edit Profile</a></li>
                                <li><a href="#"><i data-feather="mail"></i> Inbox</a></li>
                                <li><a href="#"><i data-feather="lock"></i> Lock Screen</a></li>
                                <li><a href="#"><i data-feather="settings"></i> Settings</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                        <i data-feather="log-out"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <!-- <a href="#"><i data-feather="log-out"></i> Logout</a> -->
                                </li>
                            </ul>
                        </li>
                        @else
                        <li><a href="{{ route('login') }}"><i data-feather="log-out"></i> Login</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}"><i data-feather="file-text"></i> Register</a></li>
                        @endif

                        @endauth

                    </ul>
                    <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
                </div>
                <script id="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">
                <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                <div class="ProfileCard-details">
                <div class="ProfileCard-realName">{{'name'}}</div>
                </div>
                </div>
              </script>
                <script id="empty-template" type="text/x-handlebars-template">
                    <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>

              </script>
            </div>
        </div>
        @endif
        <!-- Page Header Ends -->










        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-hover">




            <!-- Page Sidebar Start-->
            @if (Route::has('login'))
            <div class="page-sidebar">
                <div class="main-header-left d-none d-lg-block">
                    <div class="logo-wrapper">
                        <a href="{{ route('dashboard') }}" style="display:inline-block"><span>Sistem Informasi Batas
                                Wilayah Badan Informasi Geospasial</span></a>
                    </div>
                </div>
                <div class="sidebar custom-scrollbar">
                    @auth
                    <div class="sidebar-user text-center">
                        <div><img class="img-60 rounded-circle" src="{{ asset('images/endless/user/1.jpg') }}" alt="#">
                            <div class="profile-edit"><a href="edit-profile.html" target="_blank"><i
                                        data-feather="edit"></i></a></div>
                        </div>
                        <h6 class="mt-3 f-14">ELANA</h6>
                        <p>general managers.</p>
                    </div>
                    @endauth
                    <ul class="sidebar-menu">
                        <li><a class="sidebar-header" href="{{ route('dashboard') }}"><i
                                    data-feather="map"></i><span>Peta Utama</span></a></li>

                        <li><a class="sidebar-header" href="#"><i data-feather="home"></i><span>Dashboard</span><span
                                    class="badge badge-pill badge-primary">6</span><i
                                    class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="index.html"><i class="fa fa-circle"></i><span>Default</span></a></li>
                                <li><a href="dashboard-ecommerce.html"><i
                                            class="fa fa-circle"></i><span>E-commerce</span></a></li>
                                <li><a href="dashboard-university.html"><i
                                            class="fa fa-circle"></i><span>University</span></a></li>
                                <li><a href="dashboard-bitcoin.html"><i class="fa fa-circle"></i><span>Crypto</span></a>
                                </li>
                                <li><a href="dashboard-server.html"><i class="fa fa-circle"></i><span>Server</span></a>
                                </li>
                                <li><a href="dashboard-project.html"><i
                                            class="fa fa-circle"></i><span>Project</span></a></li>
                            </ul>
                        </li>


                        <li><a class="sidebar-header" href="#"><i data-feather="box"></i><span> Base</span><i
                                    class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="state-color.html"><i class="fa fa-circle"></i>State color</a></li>
                                <li><a href="typography.html"><i class="fa fa-circle"></i>Typography</a></li>
                                <li><a href="avatars.html"><i class="fa fa-circle"></i>Avatars</a></li>
                                <li><a href="helper-classes.html"><i class="fa fa-circle"></i>helper classes</a></li>
                                <li><a href="grid.html"><i class="fa fa-circle"></i>Grid</a></li>
                                <li><a href="tag-pills.html"><i class="fa fa-circle"></i>Tag & pills</a></li>
                                <li><a href="progress-bar.html"><i class="fa fa-circle"></i>Progress</a></li>
                                <li><a href="modal.html"><i class="fa fa-circle"></i>Modal</a></li>
                                <li><a href="alert.html"><i class="fa fa-circle"></i>Alert</a></li>
                                <li><a href="popover.html"><i class="fa fa-circle"></i>Popover</a></li>
                                <li><a href="tooltip.html"><i class="fa fa-circle"></i>Tooltip</a></li>
                                <li><a href="loader.html"><i class="fa fa-circle"></i>Spinners</a></li>
                                <li><a href="dropdown.html"><i class="fa fa-circle"></i>Dropdown</a></li>
                                <li><a href="#"><i class="fa fa-circle"></i>Tabs<i
                                            class="fa fa-angle-down pull-right"></i></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="tab-bootstrap.html"><i class="fa fa-circle"></i>Bootstrap Tabs</a>
                                        </li>
                                        <li><a href="tab-material.html"><i class="fa fa-circle"></i>Line Tabs</a></li>
                                    </ul>
                                </li>
                                <li><a href="according.html"><i class="fa fa-circle"></i>Accordion</a></li>
                                <li><a href="navs.html"><i class="fa fa-circle"></i>Navs</a></li>
                                <li><a href="box-shadow.html"><i class="fa fa-circle"></i>Shadow</a></li>
                                <li><a href="list.html"><i class="fa fa-circle"></i>Lists</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-header" href="maintenance.html" target="_blank"><i
                                    data-feather="settings"></i><span> Maintenance</span></a></li>

                    </ul>
                </div>
            </div>
            @endif
            <!-- Page Sidebar Ends-->

















            <!-- Right sidebar Start-->
            <div class="right-sidebar" id="right_side_bar">
                <div class="container p-0">
                    <div class="modal-header p-l-20 p-r-20">
                        <div class="col-sm-8 p-0">
                            <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                        </div>
                        <div class="col-sm-4 text-right p-0"><i class="mr-2" data-feather="settings"></i></div>
                    </div>
                </div>
                <div class="friend-list-search mt-0">
                    <input type="text" placeholder="search friend"><i class="fa fa-search"></i>
                </div>
                <div class="chat-box">
                    <div class="people-list friend-list">
                        <ul class="list">
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="{{ asset('images/endless/user/1.jpg') }}" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Vincent Porter</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="{{ asset('images/endless/user/2.png') }}" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Ain Chavez</div>
                                    <div class="status"> 28 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="{{ asset('images/endless/user/8.jpg') }}" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Kori Thomas</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="{{ asset('images/endless/user/4.jpg') }}" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Erica Hughes</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="{{ asset('images/endless/user/5.jpg') }}" alt="">
                                <div class="status-circle offline"></div>
                                <div class="about">
                                    <div class="name">Ginger Johnston</div>
                                    <div class="status"> 2 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="{{ asset('images/endless/user/6.jpg') }}" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Prasanth Anand</div>
                                    <div class="status"> 2 hour ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="{{ asset('images/endless/user/7.jpg') }}" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Hileri Jecno</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Right sidebar Ends-->





            <div class="page-body">
                <div id="mainMap"></div>


            </div>





        </div>





    </div>







    <div class="customizer-links">
        <div class="nav flex-column nac-pills" id="c-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="c-pills-home-tab" data-toggle="pill" href="#c-pills-home" role="tab"
                aria-controls="c-pills-home" aria-selected="false">
                <div class="settings"> <i class="icofont icofont-ui-settings"></i> </div>
            </a>
        </div>
    </div>
    <div class="customizer-contain">
        <div class="tab-content" id="c-pills-tabContent">
            <!-- <div class="customizer-header"> <i class="icofont-close icon-close"></i>
                  <h5>Customizer</h5>
                  <p class="mb-0">Customize &amp; Preview Real Time</p>
              </div> -->
            <div class="customizer-body custom-scrollbar">
                <div class="tab-pane fade show active" id="c-pills-home" role="tabpanel"
                    aria-labelledby="c-pills-home-tab">
                    <h6 class="controller-title">Peta Dasar</h6>
                    <div id="basemapControl"></div>
                    <h6 class="controller-title">Batas Wilayah</h6>
                    <div id="layerControl"></div>
                </div>

            </div>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('js/endless/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('js/endless/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/endless/bootstrap/bootstrap.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('js/endless/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('js/endless/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('js/endless/sidebar-menu.js') }}"></script>
    <script src="{{ asset('js/endless/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('js/endless/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('js/endless/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('js/endless/prism/prism.min.js') }}"></script>
    <script src="{{ asset('js/endless/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('js/endless/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/endless/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/endless/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('js/endless/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('js/endless/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('js/endless/notify/index.js') }}"></script>
    <script src="{{ asset('js/endless/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('js/endless/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('js/endless/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('js/endless/chat-menu.js') }}"></script>
    <script src="{{ asset('js/endless/height-equal.js') }}"></script>
    <script src="{{ asset('js/endless/tooltip-init.js') }}"></script>
    <script src="{{ asset('js/endless/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('js/endless/typeahead-search/typeahead-custom.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('js/endless/script.js') }}"></script>
    <!-- <script src="{{ asset('js/endless/theme-customizer/customizer.js') }}"></script> -->
    <!-- Plugin used-->



    <!-- Leaflet Map -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet/dist/esri-leaflet.js"></script>
    <script src="https://yigityuce.github.io/Leaflet.Control.Custom/Leaflet.Control.Custom.js"></script>
    <script src="{{ asset('js/iconLayersExtend.js') }}"></script>
    <script src="{{ asset('js/controlLayersTree.js') }}"></script>
    <script type="text/javascript">
    function BetterWMS(map, vector) {
        L.TileLayer.BetterWMS = L.TileLayer.WMS.extend({
            onAdd: function(map) {
                // Triggered when the layer is added to a map.
                //   Register a click listener, then do all the upstream WMS things
                L.TileLayer.WMS.prototype.onAdd.call(this, map);
                map.on('click', this.getFeatureInfo, this);
            },

            onRemove: function(map) {
                // Triggered when the layer is removed from a map.
                //   Unregister a click listener, then do all the upstream WMS things
                L.TileLayer.WMS.prototype.onRemove.call(this, map);
                map.off('click', this.getFeatureInfo, this);
            },

            getFeatureInfo: function(evt) {
                // Make an AJAX request to the server and hope for the best
                var me = this;
                var url = this.getFeatureInfoUrl(evt.latlng),
                    showResults = L.Util.bind(this.showGetFeatureInfo, this);
                $.ajax({
                    url: url,
                    success: function(data, status, xhr) {
                        var features = data.features;
                        var html = "",
                            popup;


                        if (features != null) {
                            if (features.length) {
                                vector = L.geoJSON(data, {
                                    style: {
                                        "color": "#ff7800",
                                        "weight": 5
                                    }
                                }).addTo(map);
                                for (var i in features) {
                                    var feature = features[i],
                                        attributes = feature.properties;
                                    html +=
                                        "<br/><b>State Code:</b> " +
                                        attributes.remark +
                                        "<br/><b>State Name:</b> " +
                                        attributes.remark +
                                        "<br/>";
                                }
                                popup = L.popup(null, me).setLatLng(evt.latlng).setContent(html)
                                    .openOn(map);
                                me.on("popupclose", function() {
                                    map.removeLayer(vector);
                                    me.off("popupclose", function() {});
                                });
                            }
                        } else {
                            html = "No features found.";
                            popup = L.popup().setLatLng(evt.latlng).setContent(html).openOn(
                                map);
                        }





                        var err = typeof data === 'string' ? null : data;
                        showResults(err, evt.latlng, data);
                    },
                    error: function(xhr, status, error) {
                        showResults(error);
                    }
                });
            },

            getFeatureInfoUrl: function(latlng) {
                // Construct a GetFeatureInfo request URL given a point
                var point = this._map.latLngToContainerPoint(latlng, this._map.getZoom()),
                    size = this._map.getSize(),

                    params = {
                        request: 'GetFeatureInfo',
                        service: 'WFS',
                        srs: 'EPSG:4326',
                        styles: this.wmsParams.styles,
                        transparent: this.wmsParams.transparent,
                        version: this.wmsParams.version,
                        format: this.wmsParams.format,
                        bbox: this._map.getBounds().toBBoxString(),
                        height: size.y,
                        width: size.x,
                        layers: this.wmsParams.layers,
                        query_layers: this.wmsParams.layers,
                        info_format: 'application/json'
                    };

                params[params.version === '1.3.0' ? 'i' : 'x'] = point.x;
                params[params.version === '1.3.0' ? 'j' : 'y'] = point.y;

                return this._url + L.Util.getParamString(params, this._url, true);
            },

            showGetFeatureInfo: function(err, latlng, content) {
                if (err) {
                    console.log(err);
                    return;
                } // do nothing if there's an error
                // Otherwise show the content in a popup, or something.
                L.popup({
                        maxWidth: 800
                    })
                    .setLatLng(latlng)
                    .setContent(content)
                    .openOn(this._map);
            }
        });

        L.tileLayer.betterWms = function(url, options) {
            return new L.TileLayer.BetterWMS(url, options);
        };
    }

    var map = L.map('mainMap').setView([-4.45, 119.80], 5);

    // Basemap
    var osmMapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    var esri_WorldImagery = L.tileLayer(
        'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
        });
    var mapBox = L.tileLayer(
        'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox.streets'
        });
    var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    var petaDasarBaruBIG = L.tileLayer(
        "http://palapa.big.go.id:8080/geoserver/gwc/service/tms/1.0.0/basemap_rbi:basemap@EPSG:3857@png/{z}/{x}/{-y}.png", {
            attribution: '&copy; <a href="#">BIG</a>'
        });
    petaDasarBaruBIG.addTo(map);

    var iconLayersControl = new L.Control.IconLayers(
        [{
                title: 'OSM Mapnik',
                layer: osmMapnik,
                icon: 'images/iconLayersImage/osm_mapnik.png'
            },
            {
                title: 'Map Box',
                layer: mapBox,
                icon: 'images/iconLayersImage/google_street.png'
            },
            {
                title: 'Google Hybrid',
                layer: googleHybrid,
                icon: 'images/iconLayersImage/google_hybd.png'
            },
            {
                title: 'RBI 2019',
                layer: petaDasarBaruBIG,
                icon: 'images/iconLayersImage/rbi_2019.png'
            },
        ], {
            position: 'bottomright',
            maxLayersInRow: 4
        }
    );

    iconLayersControl.addTo(map);
    iconLayersControl.setActiveLayer(petaDasarBaruBIG);
    iconLayersControl.expand();


    /* Function to move controler to sidebar */
    function setParent(el, newParent) {
        newParent.appendChild(el);
    }

    /* Layers WMS */
    var vector = L.geoJSON();
    vector.addTo(map);
    BetterWMS(map, vector);

    var wmsUrl = "{{ $wms_url }}";
    // Batas Administrasi
    var adminKabKot = L.tileLayer.betterWms(wmsUrl, {
        layers: 'bataswilayah:administrasi_ln_kabkota',
        transparent: true,
        format: 'image/png'
    });

    // Batas Darat
    var batasDarat = L.tileLayer.betterWms(wmsUrl, {
        layers: 'bataswilayah:batas_negara_darat_ln',
        transparent: true,
        format: 'image/png'
    });

    // Batas Laut
    var batasLK = L.tileLayer.betterWms(wmsUrl, {
        layers: 'bataswilayah:batas_lk_ln',
        transparent: true,
        format: 'image/png'
    });

    var batasMoUFisheries = L.tileLayer.betterWms(wmsUrl, {
        layers: 'bataswilayah:batas_mou_fisheries_ln',
        transparent: true,
        format: 'image/png'
    });

    var batasTeritorial = L.tileLayer.betterWms(wmsUrl, {
        layers: 'bataswilayah:batas_teritorial_ln',
        transparent: true,
        format: 'image/png'
    });

    var batasZEE = L.tileLayer.betterWms(wmsUrl, {
        layers: 'bataswilayah:batas_zee_ln',
        transparent: true,
        format: 'image/png'
    });

    var garisPangkal = L.tileLayer.betterWms(wmsUrl, {
        layers: 'bataswilayah:garis_pangkal_ln',
        transparent: true,
        format: 'image/png'
    });

    var titikDasar = L.tileLayer.betterWms(wmsUrl, {
        layers: 'bataswilayah:titik_dasar_pt',
        transparent: true,
        format: 'image/png'
    });

    var zonaTambahan = L.tileLayer.betterWms(wmsUrl, {
        layers: 'bataswilayah:zona_tambahan_ln',
        transparent: true,
        format: 'image/png'
    });

    /* Leaflet Tree Controller */
    var overlaysTree = [{
            label: '<strong>Batas Negara</strong>',
            selectAllCheckbox: 'Un/select all',
            eventedClasses: {
                className: "hua"
            },
            children: [{
                    label: 'Batas Darat',
                    layer: batasDarat,
                    className: "hua"
                },
                {
                    label: 'Batas Laut Teritorial',
                    layer: batasTeritorial
                },
                {
                    label: 'Garis Pangkal',
                    layer: garisPangkal
                },
                {
                    label: 'Titik Dasar',
                    layer: titikDasar
                },
                {
                    label: 'Batas Landasan Kontinen',
                    layer: batasLK
                },
                {
                    label: 'Zona Tambahan',
                    layer: zonaTambahan
                },
                {
                    label: 'Zona Ekonomi Esklusif',
                    layer: batasZEE
                },
                {
                    label: 'Batas MoU Fisheries',
                    layer: batasMoUFisheries
                },

            ]
        },
        {
            label: '<strong>Batas Wilayah Administrasi</strong>',
            selectAllCheckbox: 'Un/select all',
            children: [{
                label: 'Batas Landasan Kontinen',
                layer: adminKabKot
            }, ]
        }
    ]

    var layerTree = L.control.layers.tree([], overlaysTree, {
        namedToggle: false,
        selectorBack: false,
        closedSymbol: '<img class="treeIcon" src="{{ asset('
        images / endless / close - box.png ') }}">',
        openedSymbol: '<img class="treeIcon" src="{{ asset('
        images / endless / open - box.png ') }}">',
        collapsed: false,
    });
    layerTree.addTo(map).expandSelected().collapseTree(false);

    // Move Controller to right Bar
    // Basemap
    var htmlObjectBasemap = iconLayersControl.getContainer();
    var e_basemapController = document.getElementById('basemapControl');
    setParent(htmlObjectBasemap, e_basemapController);
    // layer Tree
    var htmlObjectAdmLayers = layerTree.getContainer().getElementsByClassName("leaflet-control-layers-overlays").item(
        0);
    var e_admLayersController = document.getElementById('layerControl');
    setParent(htmlObjectAdmLayers, e_admLayersController);
    $('.leaflet-control-layers.leaflet-control-layers-expanded.leaflet-control').remove();
    </script>


    <script>
    $(document).ready(function() {
        $(".customizer-links").click(function() {
            if ($(this).hasClass("open")) {
                $(".customizer-contain").removeClass("open");
                $(".customizer-links").removeClass("open");
            } else {
                $(".customizer-contain").addClass("open");
                $(".customizer-links").addClass("open");
            }

        });

        $(".close-customizer-btn").on('click', function() {
            $(".floated-customizer-panel").removeClass("active");
        });

        // $(".customizer-contain .icon-close").on('click', function() {
        //     $(".customizer-contain").removeClass("open");
        //     $(".customizer-links").removeClass("open");
        // });

        $(".customizer-color li").on('click', function() {
            $(".customizer-color li").removeClass('active');
            $(this).addClass("active");
            var color = $(this).attr("data-attr");
            var primary = $(this).attr("data-primary");
            var secondary = $(this).attr("data-secondary");
            localStorage.setItem("color", color);
            localStorage.setItem("primary", primary);
            localStorage.setItem("secondary", secondary);
            localStorage.removeItem("dark");
            $("#color").attr("href", "../assets/css/" + color + ".css");
            $(".dark-only").removeClass('dark-only');
            location.reload(true);
        });

        $(".customizer-color.dark li").on('click', function() {
            $(".customizer-color.dark li").removeClass('active');
            $(this).addClass("active");
            $("body").attr("class", "dark-only");
            localStorage.setItem("dark", "dark-only");
        });


        $(".customizer-mix li").on('click', function() {
            $(".customizer-mix li").removeClass('active');
            $(this).addClass("active");
            var mixLayout = $(this).attr("data-attr");
            $("body").attr("class", mixLayout);
        });


        $('.sidebar-setting li').on('click', function() {
            $(".sidebar-setting li").removeClass('active');
            $(this).addClass("active");
            var sidebar = $(this).attr("data-attr");
            $(".page-sidebar").attr("sidebar-layout", sidebar);
        });

        $('.sidebar-main-bg-setting li').on('click', function() {
            $(".sidebar-main-bg-setting li").removeClass('active')
            $(this).addClass("active")
            var bg = $(this).attr("data-attr");
            $(".page-sidebar").attr("class", "page-sidebar " + bg);
        });

        $('.sidebar-type li').on('click', function() {
            $(".sidebar-type li").removeClass('active');
            var type = $(this).attr("data-attr");

            var boxed = "";
            if ($(".page-wrapper").hasClass("box-layout")) {
                boxed = "box-layout";
            }
            // switch (type) {
            //     case 'normal-sidebar':
            //     {
            //         $(".page-wrapper").attr("class", "page-wrapper "+boxed);
            //         $(".page-body-wrapper").attr("class", "page-body-wrapper ");
            //         $(".logo-wrapper").find('img').attr('src', '../assets/images/endless-logo.png');
            //         break;
            //     }
            //     case 'compact-sidebar':
            //     {
            //         $(".page-wrapper").attr("class", "page-wrapper compact-wrapper "+boxed);
            //         $(".page-body-wrapper").attr("class", "page-body-wrapper sidebar-icon");
            //         $(".logo-wrapper").find('img').attr('src', '../assets/images/logo/compact-logo.png');
            //         break;
            //     }
            //     case 'compact-icon-sidebar':
            //     {
            //         $(".page-wrapper").attr("class", "page-wrapper compact-page "+boxed);
            //         $(".page-body-wrapper").attr("class", "page-body-wrapper sidebar-hover");
            //         $(".logo-wrapper").find('img').attr('src', '../assets/images/endless-logo.png');
            //         break;
            //     }
            //     default:
            //     {
            //         $(".page-wrapper").attr("class", "page-wrapper "+boxed);
            //         $(".page-body-wrapper").attr("class", "page-body-wrapper ");
            //         $(".logo-wrapper").find('img').attr('src', '../assets/images/endless-logo.png');
            //     }
            // }
            $(this).addClass("active");
        });

        $('.main-layout li').on('click', function() {
            $(".main-layout li").removeClass('active');
            $(this).addClass("active");
            var layout = $(this).attr("data-attr");
            $("body").attr("main-theme-layout", layout);

            $("html").attr("dir", layout);
        });
    });
    </script>
</body>

</html>