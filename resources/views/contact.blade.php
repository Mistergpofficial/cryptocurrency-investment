{{--
<!DOCTYPE html>
<html lang="en" xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head>
    <title>Welcome to Prime Crypto Options</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="BitCoin and Ethereum Investment">
    <meta name="author" description="prime crypto options">
    <meta property="og:url"           content="{{ url('/') }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="prime crypto options" />
    <meta property="og:description"   content="a bitcoin and ethereum investment platform" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap -->
    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
     <link href="{!! asset('css/styles.css') !!}" rel="stylesheet">
    <!-- slider -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/slick.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/slick-theme.css') !!}">
    <!-- Style CSS -->

    <!-- animsition css -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/animsition.min.css') !!}">
    <!-- Style CSS -->
    <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/fontello.css') !!}">


    <link rel="stylesheet" type="text/css" href="{!! asset('css/flaticon.css') !!}">
    <link href="{!! asset('css/settings.css') !!}" rel="stylesheet">
    <!-- slider -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/layers.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/navigation.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/owl.carousel.min.css') !!}">
    <!-- Style CSS -->
    <link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/nice-select.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/responsive.css') !!}">

    <!-- Template Font CSS-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <link rel="icon" type="image/png" href="{!! asset('images/logo.png') !!}" width="40px">

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
   <!--================Header Menu Area =================-->
<header class="main_menu_area navbar_fixed">
    <div class="top_menu">
        <div class="container">
            <div class="float-md-left">
                <div class="top_contact">--}}
{{--
                    <li><span>Price:BTC/USD @{{ coinsBtc[0].price_usd }}</span></li> --}}{{--

                    <a href="mailto:info@wethemez.com"><i class="fa fa-envelope"></i>primecryptooptions.com</a>
                </div>
            </div>
            
        </div>
    </div>
    <div class="main_menu_inner">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="http://wethemez.com/demo/crypto/#"><img src="{!! asset('images/logo.png') !!}" alt=""></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="my_toggle_menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                        <li>
                            <a  href="{!! url('/') !!}" >
                                Home
                            </a></li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li>
                            <a href="#overview-block-ptb">
                                Trade View
                            </a></li>

                        <li>
                            <a href="">
                                Faq
                            </a></li>
                        <li>
                            <a href="{!! url('/contact') !!}">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="{!! url('auth/login') !!}">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>


        <div class="page-header"   style="background-image: url('images/4.jpg');"><!-- page-header -->
            <div class="container">
                <div class="row"><!-- page section -->
                    <div class="col-md-12"><!-- page description -->
                        <div class="page-section">
                            --}}
{{--  <h1 class="page-title">Login</h1>--}}{{--

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
                                <li class="active">Contact</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Contact></Contact>
        @include('pages.footer')
    </div>

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

<script src="{!! asset('js/jquery-3.2.1.min.js') !!}"></script>
<script src="{!! asset('js/popper.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/jquery.themepunch.tools.min.js') !!}"></script>
<script src="{!! asset('js/jquery.themepunch.revolution.min.js') !!}"></script>
<script src="{!! asset('js/revolution.extension.actions.min.js') !!}"></script>
<script src="{!! asset('js/revolution.extension.video.min.js') !!}"></script>
<script src="{!! asset('js/revolution.extension.slideanims.min.js') !!}"></script>
<script src="{!! asset('js/revolution.extension.layeranimation.min.js') !!}"></script>
<script src="{!! asset('js/revolution.extension.navigation.min.js') !!}"></script>
<script src="{!! asset('js/revolution.extension.slideanims.min.js') !!}"></script>
<script src="{!! asset('js/jquery.waypoints.min.js') !!}"></script>
<script src="{!! asset('js/jquery.counterup.min.js') !!}"></script>
<script src="{!! asset('js/owl.carousel.min.js') !!}"></script>
<script src="{!! asset('js/wow.min.js') !!}"></script>
<script src="{!! asset('js/parallax.min.js') !!}"></script>
<script src="{!! asset('js/jquery.waypoints.min.js') !!}"></script>
<script src="{!! asset('js/jquery.counterup.min.js') !!}"></script>
<script src="{!! asset('js/apear.js') !!}"></script>
<script src="{!! asset('js/countto.js') !!}"></script>
<script src="{!! asset('js/jquery.nice-select.min.js') !!}"></script>
<script src="{!! asset('js/theme.js') !!}"></script>
<script src="{!! asset('js/index.js') !!}"></script>
</body>
</html>--}}
