<!DOCTYPE html>
<html lang="en" xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head>
    <title>Welcome to iTrade Option</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="BitCoin and Ethereum Investment">
    <meta name="author" description="iTrade Option">
    <meta property="og:url"           content="{{ url('/') }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="iTrade Option" />
    <meta property="og:description"   content="a bitcoin and ethereum investment platform" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap -->
    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    <!-- slider -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/slick.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/slick-theme.css') !!}">
    <!-- Style CSS -->

    <!-- animsition css -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/animsition.min.css') !!}">
    <!-- Style CSS -->
    <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/fontello.css') !!}">

    <!-- Template Font CSS-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png" href="{!! asset('images/logo.png') !!}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- pass php vars to javascript -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'appUrl' => url("/")
        ]); ?>
    </script>
</head>
<body>
    <div id="index">
        <div class="" >
            <div class="navigation-transparent navbar-fixed-top">
                <div class="top-bar"><!-- top-bar -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <span class="call-text">Price:BTC/USD @{{ coinsBtc[0].price_usd }}</span>

                                <span class="call-text">Price:ETH/USD @{{ coinetEth[0].price_usd }}</span>
                            </div>
                            <div class="col-md-8 text-right"><span class="call-text"> <i class="fa fa-phone"></i> 010-020-0340 </span> <span class="mail-text"><i class="fa fa-envelope"></i> support@primecryptosolutions.com</span>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.top-bar -->
                <nav class="navbar navbar-inverse" role="banner">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="{{ url('/') }}"><img src="{!! asset('images/capture.png') !!}" alt="logo"></a>
                        </div>

                        <div class="collapse navbar-collapse navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="">Trade View</a></li>
                                <li><a href="{{ url('auth/login') }}">Login</a></li>
                                <li><a href="{{ url('auth/register') }}">Register</a></li>
                                <li><a href="{{ url('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div><!--/.container-->
                </nav><!--/nav-->
            </div>
            <!-- /.navigation-transparent -->
        </div>




        <div class="page-header"  style="background-image: url('../images/4.jpg');"><!-- page-header -->
            <div class="container">
                <div class="row"><!-- page section -->
                    <div class="col-md-12"><!-- page description -->
                        <div class="page-section">
                            {{--  <h1 class="page-title">Login</h1>--}}
                        </div>
                    </div>
                    <!-- page description -->
                </div>
                <!-- page section -->
            </div>
            <div class="page-breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12"><!-- breadcrumb -->
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}" title="Home">Home</a></li>
                                <li class="active">Privacy Policy</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Privacy></Privacy>
        @include('pages.footer')

        <script src="{!! asset('js/jquery.min.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('js/navigation.js') !!}"></script>
        <script src="{!! asset('js/nav-collapse.js') !!}"></script>
        <script src="{!! asset('js/jquery.sticky.js') !!}"></script>
        <script src="{!! asset('js/sticky-header.js') !!}"></script>
        <script src="{!! asset('js/animsition.js') !!}"></script>
        <script src="{!! asset('js/animsition-script.js') !!}"></script>
        <script src="{!! asset('js/slick.min.js') !!}"></script>
        <script src="{!! asset('js/slider.js') !!}"></script>
        <script src="{!! asset('js/index.js') !!}"></script>
    </div>
    </body>
    </html>