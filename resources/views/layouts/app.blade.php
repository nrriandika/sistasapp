<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Sistem Informasi Batas Wilayah') }}</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="endless admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, endless admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('images/endless/favicon.ico') }}" type="image/x-icon">
    <title>Endless - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/style.css') }}">
    <link id="color" rel="stylesheet" type="text/css" href="{{ asset('css/endless/light-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/endless/responsive.css') }}">

    <!-- Leaflet map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/controlLayersTree.css') }}">

    <!-- Icon Layers -->
    <link rel="stylesheet" href="{{ asset('css/iconLayersExtend.css') }}" crossorigin="anonymous">

    <style>
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
        .btn-big {
          background-color: #07112e !important;
          border-color: #07112e !important;
          color: #fff;
        }
        .btn-big:hover,
        .btn-big:focus,
        .btn-big:active,
        .btn-big.active,
        .open .dropdown-toggle.btn-big {
          background-color: #15325c;
          color:#fff;
          border-color: #15325c;
        }

        .btn-outline-big {
          color: #15325c;
          background-color: #ffffff;
          border-color: #15325c;
          font-weight: bold;
          letter-spacing: 0.05em;
        }

        .btn-outline-big {
          color: #15325c;
          background-color: #ffffff;
          border-color: #15325c;
          font-weight: bold;
        }

        .btn-outline-big:hover,
        .btn-outline-big:active,
        .btn-outline-big:focus,
        .btn-outline-big.active {
          background: #15325c;
          color: #ffffff;
          border-color: #15325c;

        }

        .box-layout.page-wrapper .page-body-wrapper {
          width:100%;
        }
        .box-layout.page-wrapper .page-main-header {
          max-width: 100%;
          margin: unset;
          left: unset;
        }

        .theme-form .form-group input[type=text],
        .theme-form .form-group input[type=email],
        .theme-form .form-group input[type=search],
        .theme-form .form-group input[type=password],
        .theme-form .form-group input[type=number],
        .theme-form .form-group input[type=tel],
        .theme-form .form-group input[type=date],
        .theme-form .form-group input[type=datetime-local],
        .theme-form .form-group input[type=time],
        .theme-form .form-group input[type=datetime-local],
        .theme-form .form-group input[type=month],
        .theme-form .form-group input[type=week],
        .theme-form .form-group input[type=url],
        .theme-form .form-group input[type=file],
        .theme-form .form-group textarea,
        .theme-form .form-group select.form-control:not([size]):not([multiple]) {
            border-color: #c8cacc;
            background-color: #fff;
            font-size: 14px;
            color: #898989;
            font-family: work-Sans,sans-serif;
        }
        .switch-state {
            background-color: #dfdfdf;
        }

    </style>
    @stack('css')
</head>
<body>
    @yield('content')


    <!-- Javascript Library -->
    <!-- latest jquery-->
    <script src="{{ asset('js/endless/jquery-3.2.1.min.js') }}"></script>
    <!-- Stack JS Section -->
    @stack('js')

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
    <!-- <script src="{{ asset('js/endless/notify/index.js') }}"></script> -->
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
    <script src="{{ asset('js/endless/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/endless/select2/select2-custom.js') }}"></script>



    <!-- <script src="{{ asset('js/endless/theme-customizer/customizer.js') }}"></script> -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/endless/datepicker/date-time-picker/moment.min.js') }}"></script>
    <script src="{{ asset('js/endless/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('js/endless/datepicker/date-time-picker/datetimepicker.custom.js') }}"></script>
</body>
</html>
