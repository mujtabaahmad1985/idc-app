<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Reset Password : Login</title>
    <!-- REQUIRED STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic" rel="stylesheet" type="text/css">

    {!! Html::style('/css/bootstrap.css') !!}
    {!! Html::style('/plugins/fontawesome/css/font-awesome.min.css') !!}
    {!! Html::style('/plugins/icheck/css/skins/all.css') !!}
    {!! Html::style('/plugins/icheck/css/skins/all.css') !!}

    <link href="/css/main.min.css" rel="stylesheet" rev="stylesheet" type="text/css" />
    <link href="/css/page-login2.min.css" rel="stylesheet" rev="stylesheet" type="text/css" />



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



<div class="container">
    <div class="login-wrapper">
        <div class="text-center">
            <img src="/images/logo.png" alt="logo">
        </div><!-- /.logo-wrapper -->

        <div class="panel">
            <div class="panel-body">
                <h2>Reset Password to IDC</h2>
                <form method="POST" id="reset-password" action="/reset/new/password" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="email" value="{!! Request::get('email') !!}" />
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-lock input-icon"></i>
                            <input type="password" class="form-control rounded" placeholder="Enter New Password" required="" id="new_password" name="new_password">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-lock input-icon"></i>
                            <input type="password" class="form-control rounded" placeholder="Enter Confirm Password" required id="confirm_password" name="confirm_password">
                        </div>
                    </div><!-- /.form-group -->


                    <button  class="btn btn-primary btn-block rounded reset-password-btn">RESET</button>

                </form>
                <div class="alert bg-success message"></div>
                <div class="alert bg-danger message"></div>
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
{!! Html::script('/js/jquery.form.js') !!}
{!! Html::script('/plugins/jquery.validate/js/jquery.validate.min.js') !!}
<!-- REQUIRED PLUGINS -->
<script src="/plugins/icheck/js/icheck.min.js"></script>
<script src="/js/page-login.min.js"></script>
<script>
    $(function(){


        $( "#reset-password" ).validate({
            rules: {
                new_password: "required",
                minlength:8,
                confirm_password: {
                    equalTo: "#new_password"
                }
            }
        });



        $(".reset-password-btn").click(function (e) {
            $(".alert").hide();
            if($("#reset-password").valid()){
                $("#reset-password").ajaxForm(function (response) {

                    response = $.parseJSON(response);
                    if(response.type=="success"){
                        $(".message.bg-success").html(response.message);
                        $(".message.bg-success").show();

                        setTimeout(function(){
                           window.location = "/";
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