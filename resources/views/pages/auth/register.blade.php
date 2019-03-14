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

    <link rel="icon" type="image/png" href="{!! asset('images/logo.png') !!}" width="40px">


    <link rel="stylesheet" href="{!! asset('css/font-awesome.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/select2.css') !!}">

    <link rel="stylesheet" href="{!! asset('css/quirk.css') !!}">

    <script src="{!! asset('js/modernizr.js') !!}"></script>
    <!-- pass php vars to javascript -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'appUrl' => url("/"),
            'siteUser' => auth()->user(),
        ]); ?>
    </script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../lib/html5shiv/html5shiv.js"></script>
    <script src="../lib/respond/respond.src.js"></script>
    <![endif]-->
</head>

<body class="signwrapper"  style="background-color: orange;">
<div id="index">
    <Register></Register>
</div>
<script src="{!! asset('js/jquery.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/select2.js') !!}"></script>
<script src="{!! asset('js/index.js') !!}"></script>
<script>
    $(function() {

        // Select2 Box
        $("select.form-control").select2({ minimumResultsForSearch: Infinity });

    });
</script>



</body></html>
