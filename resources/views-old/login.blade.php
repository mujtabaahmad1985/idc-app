<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> IDC : Login</title>
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
</style>

<div class="modal fade" id="modal-forgotPass" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h2>Forgot Password?</h2>
                <form id="forget-password-form" action="/forget/password" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <div class="input-icon-left m-top-15">
                            <i class="fa fa-envelope input-icon"></i>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                        </div>
                    </div><!-- /.form-group -->

                    <div class="btn-wrapper">
                <span>
                  <button type="button" class="btn btn-default-outline btn-block rounded" data-dismiss="modal">Cancel</button>
                </span>
                        <span>
                  <button  class="btn btn-primary btn-block rounded submit-forgot-password">Submit</button>
                </span>
                    </div>
                </form>
                <div class="alert bg-success message"></div>
                <div class="alert bg-danger message"></div>
            </div>
        </div>
    </div>
</div><!-- /.modal -->

<div class="container">
    <div class="login-wrapper">
        <div class="text-center">
            <img src="public/images/logo.png" alt="logo">
        </div><!-- /.logo-wrapper -->

        <div class="panel">
            <div class="panel-body">
                <h2>Sign in to IDC</h2>
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-user input-icon"></i>
                            <input type="text" class="form-control rounded" placeholder="Enter Email" name="email">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-lock input-icon"></i>
                            <input type="password" class="form-control rounded" placeholder="Enter Password" name="password">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember_me" class="icheck-minimal-grey">
                                Remember me
                            </label>
                        </div>
                    </div><!-- /.form-group -->

                    <button type="submit" class="btn btn-primary btn-block rounded">SIGN IN</button>
                    <a href="#" class="m-top-5" data-toggle="modal" data-target="#modal-forgotPass">Forgot Password?</a>
                </form>
                @if (count($errors) > 0)
                    <div class="alert bg-danger" style="display: block">
                        <ul>
                            @foreach ($errors->all() as $error)
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
{!! Html::script('public/js/jquery.form.js') !!}
{!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
<!-- REQUIRED PLUGINS -->
<script src="/plugins/icheck/js/icheck.min.js"></script>
<script src="/js/page-login.min.js"></script>
<script>
    $(function(){



        $(".submit-forgot-password").click(function (e) {
            $(".alert").hide();
            if($("#forget-password-form").valid()){
                $("#forget-password-form").ajaxForm(function (response) {

                    response = $.parseJSON(response);
                    if(response.type=="success"){
                        $(".message.bg-success").html(response.message);
                        $(".message.bg-success").show();

                        setTimeout(function(){
                            $("#modal-forgotPass").modal('hide');
                            $("#forget-password-form").reset();
                        },2500);
                    }else{
                        $(".message.bg-danger").html(response.message);
                        $(".message.bg-danger").show();
                    }

                }).submit();
            }
            e.preventDefault();
        });

    })
</script>
</body>
</html>