<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> IDC : Validate Link</title>
    <!-- REQUIRED STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic" rel="stylesheet" type="text/css">

    {!! Html::style('/public/css/bootstrap.css') !!}
    {!! Html::style('/public/plugins/fontawesome/css/font-awesome.min.css') !!}
    {!! Html::style('/public/plugins/icheck/css/skins/all.css') !!}
    {!! Html::style('/public/plugins/icheck/css/skins/all.css') !!}

    <link href="/public/css/main.min.css" rel="stylesheet" rev="stylesheet" type="text/css" />
    <link href="/public/css/page-login2.min.css" rel="stylesheet" rev="stylesheet" type="text/css" />



    <!-- Login css -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<style>
    .alert > p, .alert > ul {
        margin-bottom: 0;
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 1.2rem;
    }
    label.error{ color: #F00; position: absolute;
        top:35px;}
    .alert{
        display: none;}
    .login-wrapper .panel-body form .btn {
        margin-top: 21px;
        font-weight: 600;
    }
    .login-wrapper {
        max-width: 660px;
        margin: 80px auto;
    }
</style>



<div class="container">
    <div class="login-wrapper">
        <div class="text-center">
            <img src="/images/logo.png" alt="logo">
        </div><!-- /.logo-wrapper -->

        <div class="panel">
            <div class="panel-body">
                <h2>Secure Link Validating</h2>
            @if(isset($errors) && count($errors) > 0)
                    <div class="alert bg-danger" style="display: block">
                        <ul>
                            @foreach ($errors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif

            </div><!-- /.panel-body -->
            {{--<div class="panel-footer">
                <a href="/create/account/patient">CREATE AN ACCOUNT</a>
            </div>--}}<!-- /.panel-footer -->

        </div><!-- /.panel -->
    </div>
</div><!-- /.container -->

<!-- REQUIRED SCRIPTS -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
{!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
{!! Html::script('public/js/jquery.form.js') !!}

<!-- REQUIRED PLUGINS -->
<script src="/plugins/icheck/js/icheck.min.js"></script>
<script src="/js/page-login.min.js"></script>

</body>
</html>