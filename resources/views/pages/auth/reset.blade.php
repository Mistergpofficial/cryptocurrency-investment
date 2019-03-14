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

    <link rel="stylesheet" href="{!! asset('css/font-awesome.css') !!}">

    <link rel="stylesheet" href="{!! asset('css/quirk.css') !!}">

    <link rel="icon" type="image/png" href="{!! asset('images/logo.png') !!}" width="40px">
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

<body class="signwrapper" style="background-color: orange;">
<div id="index">
    <div class="sign-overlay"></div>
    <div class="signpanel"></div>

    <div class="panel signin">
        <div class="panel-heading">
            <h1><a href="{!! asset('/') !!}">iTrade Option</a></h1>
            <h4 class="panel-title">Reset Password</h4>
        </div>
        <div class="panel-body">
            <!--    <button class="btn btn-primary btn-quirk btn-fb btn-block">Connect with Facebook</button>
                <div class="or">or</div>-->
            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}


                @if (session('status'))
                    <div class="alert alert-success">
                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                        {{ session('status') }}
                    </div>
                @endif

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" >

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" >

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </div>
            </form>
            <hr class="invisible">

        </div>
    </div><!-- panel -->

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
