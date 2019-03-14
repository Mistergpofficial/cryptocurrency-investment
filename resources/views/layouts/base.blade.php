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
    <link rel="stylesheet" type="text/css" href="{!! asset('css/flaticon.css') !!}">

    <link href="{!! asset('css/admin/fontawesome-all.css') !!}" rel="stylesheet">

    <link rel="icon" type="image/png" href="{!! asset('images/logo.png') !!}" width="40px">

    <style>


        td img {
            width: 25px;
        }



    </style>



    @yield('styles')


    <link rel="icon" type="image/png" href="{!! asset('images/ad.png') !!}" width="40px">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->

    <!-- pass php vars to javascript -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'appUrl' => url("/")
        ]); ?>
    </script>
    <div id="google_translate_element" align="right"></div><script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
        }
    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body>
<div id="app">

    <div class="preloader complete" style="display: none;">
        <div class="left_pre"></div>
        <div class="right_pre"></div>
        <div class="row m0 content">
            <div class="circle">
                <div class="red">
                    <div class="rotator">
                        <img src="{!! asset('images/loading-img.png') !!}" alt="">
                    </div>
                    <a href="http://wethemez.com/demo/crypto/#" class="logo"><img src="{!! asset('images/loading-img.png') !!}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
<!--================Header Menu Area =================-->
<header class="main_menu_area navbar_fixed">
    <div class="top_menu">
        <div class="container">
            <div class="float-md-left">
                <div class="top_contact">
                   <a href="#"><i class="fa fa-envelope"></i>itradeoption.com</a>

                </div>
            </div>
            <div class="float-md-right">
                <ul class="top_social">
              {{--      <li><span>Price:BTC/USD @{{ coinsBtc[0].price_usd }}</span></li>--}}
                </ul>
            </div>
        </div>
    </div>
    <div class="main_menu_inner">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="http://wethemez.com/demo/crypto/#"><span class="navbar-brand" style="font-family: AR BLANCA; color: white; font-weight: bold; font-size: 38px;"><img src="{!! asset('images/logo.jpg') !!}"></span></a>
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
                            <a href="{!! url('/') !!}">
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
                            <a href="#faq">
                                Faq
                            </a></li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                        <li>
                            <a href="{!! url('auth/login') !!}">Login</a>
                        </li>
                    </ul>
                   {{-- <ul class="navbar-nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="{!! url('auth/login') !!}">Login</a>
                        </li>
                    </ul>--}}
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================End Footer Area =================-->
    @yield('content')
   @include('pages.footer')
</div>
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
<script src="{!! asset('js/app.js') !!}"></script>
</body>
</html>