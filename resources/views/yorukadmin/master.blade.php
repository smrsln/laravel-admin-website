<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Türkiye - Türk Dünyası Yörük Türkmen Birliği Admin Paneli</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset("adminassets/plugins/bootstrap/css/bootstrap.css")}}" rel="stylesheet"/>
    <link href="{{asset("adminassets/plugins/bootstrap/css/bootstrap-grid.css")}}" rel="stylesheet"/>
    <link href="{{asset("adminassets/plugins/bootstrap/css/bootstrap-reboot.css")}}" rel="stylesheet"/>
    <link href="{{asset("adminassets/css/colors.css")}}" rel="stylesheet" id="themecolor"/>
    <link href="{{asset("adminassets/css/style.css")}}" rel="stylesheet"/>
    <style id="clock-animations"></style>
    @stack('head')
</head>
<body>

<div class="preloader">
    <div class="loading">
        <h2>
            Yükleniyor...
        </h2>
        <span class="progress"></span>
    </div>
</div>
<div class="wrapper">
@include('yorukadmin.menu')
@yield('content')
</div>
<a href="javascript:void(0)" class="btn btn-icon btn-circle btn-scroll-to-top btn-sm animated invisible text-light"
   data-color="purple" data-click="scroll-top"><i
        class="fa fa-angle-up"></i></a>
</body>
<script src="{{asset("adminassets/plugins/jquery/jquery-3.2.1.min.js")}}" type="text/javascript"></script>
<script src="{{asset("adminassets/plugins/bootstrap/js/bootstrap.bundle.js")}}" type="text/javascript"></script>
<script src="{{asset("adminassets/plugins/pace/pace.min.js")}}"></script>
<script src="{{asset("adminassets/plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js")}}"></script>
<script src="{{asset("adminassets/plugins/waitMe/waitMe.min.js")}}"></script>
<script src="{{asset("adminassets/js/pvr_lite_app.js")}}" id="appjs"></script>

<script src="{{asset("adminassets/plugins/sparkline/jquery.sparkline.js")}}" type="text/javascript"></script>
<script src="{{asset("adminassets/plugins/countup/countUp.min.js")}}"></script>
<script src="{{asset("adminassets/plugins/real-shadow/realShadow.js")}}" type="text/javascript"></script>
<script src="{{asset("adminassets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js")}}"></script>
<script src="{{asset("adminassets/plugins/typeit/typeit.js")}}"></script>
<script src="{{asset("adminassets/js/pvr_lite_dashboard_v1.js")}}"></script>
@stack('footer')
</html>