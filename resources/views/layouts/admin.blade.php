 <!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Metronic Admin Theme #4 | Admin Dashboard 2</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #4 for statistics, charts, recent events and reports" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{url('/public')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{url('/public')}}/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{url('/public')}}/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{url('/public')}}/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{url('/public')}}/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/assets/pages/css/blog.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <script src="{{url('/public')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">

        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <div class="page-actions">
            <div class="btn-group">
                <button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <span class="hidden-sm hidden-xs">Actions&nbsp;</span>
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    @guest
                        @if (Route::has('login') || Route::has('register'))
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="icon-docs"></i> Login </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">
                                    <i class="icon-tag"></i> Register </a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a class="nav-link"  href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
        <!-- END PAGE ACTIONS -->

    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item start active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <?php $menus = config('menu'); ?>
                    <ul class="sub-menu">
                        @foreach($menus as $menu)
{{--                            @if(Auth::user()->can($menu['route']))--}}
                            <li class="nav-item start ">
                                <a class="nav-link" href="{{route($menu['route'])}}">
                                    <span class="">{{$menu['label']}}</span>
                                </a>
                            </li>
{{--                            @endif--}}
                        @endforeach
                    </ul>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    @yield('content')
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2016 &copy; Metronic Theme By
        <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
        <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<script src="../assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->

<script src="{{url('/public')}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{url('/public')}}/assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{url('/public')}}/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{url('/public')}}/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{url('/public')}}/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body>
</html>

