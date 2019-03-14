<!DOCTYPE html>
<!-- saved from url=(0034)http://themepixels.me/bracket/app/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" description="iTrade Option">
    <meta property="og:url"           content="{{ url('/') }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="iTrade Option" />
    <meta property="og:description"   content="a bitcoin and ethereum investment platform" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'appUrl' => url("/"),
            'siteUser' => auth()->user(),
        ]); ?>
    </script>

    <title>Welcome to iTrade Option | Dashboard</title>

    <!-- vendor css -->
    <link href="{!! asset('css/admin/bootstrap.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/admin/export.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/admin/bootstrap-extend.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/admin/master_style.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/admin/_all-skins.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/admin/fontawesome.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/admin/fontawesome-all.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="icon" type="image/png" href="{!! asset('images/logo.png') !!}" width="40px">
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
</head>

<body class="skin-yellow sidebar-mini" style="height: auto; min-height: 100%;">

<div id="index">
    <div class="wrapper" style="height: auto; min-height: 100%;">
        @yield('content')
    </div>
</div>

<script src="{!! asset('js/admin/jquery.js') !!}"></script>

<script src="{!! asset('js/admin/popper.min.js') !!}"></script>

<script src="{!! asset('js/admin/bootstrap.js') !!}"></script>

<script src="{!! asset('js/admin/jquery.slimscroll.js') !!}"></script>
<script src="{!! asset('js/admin/fastclick.js') !!}"></script>
<script src="{!! asset('js/admin/amcharts.js') !!}"></script>

<script src="{!! asset('js/admin/gauge.js') !!}"></script>
<script src="{!! asset('js/admin/serial.js') !!}"></script>
<script src="{!! asset('js/admin/amstock.js') !!}"></script>
<script src="{!! asset('js/admin/pie.js') !!}"></script>
<script src="{!! asset('js/admin/animate.min.js') !!}"></script>
<script src="{!! asset('js/admin/export.min.js') !!}"></script>
<script src="{!! asset('js/admin/patterns.js') !!}"></script>
<script src="{!! asset('js/admin/light.js') !!}"></script>
<script src="{!! asset('js/admin/jquery.webticker.min.js') !!}"></script>

<script src="{!! asset('js/admin/echarts-en.min.js') !!}"></script>
<script src="{!! asset('js/admin/echarts-liquidfill.min.js') !!}"></script>

<script src="{!! asset('js/admin/jquery.dataTables.min.js') !!}"></script>

<script src="{!! asset('js/admin/template.js') !!}"></script>
<script src="{!! asset('js/admin/demo.js') !!}"></script>
<script src="{!! asset('js/admin/quirk.js') !!}"></script>
<script src="{!! asset('js/admin/chart.min.js') !!}"></script>
<script src="{!! asset('js/admin/chart-data.js') !!}"></script>
<script src="{!! asset('js/index.js') !!}"></script>
@yield('scripts')


</body>
</html>
