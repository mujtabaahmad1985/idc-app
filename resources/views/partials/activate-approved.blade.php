
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 2.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Activation Link : IDCSG</title>

    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->

    {!! Html::style('https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic') !!}


    {!! Html::style('public/material/css/ghpages-materialize.css') !!}
    {!! Html::style('public/material/js/plugins/sweetalert/sweetalert.css') !!}
    {!! Html::style('public/material/js/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}

    {!! Html::style('public/material/css/style.min.css') !!}
    {!! Html::style('public/material/css/dropzone.css') !!}
    {!! Html::style('public/material/css/custom/custom.min.css') !!}



    {!! Html::style('public/plugins/fontawesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/css/jquery-ui.css') !!}
    {!! Html::style('public/css/jquery.typeahead.css') !!}
    {!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}
<style>
    h1{font-size: 20px}
</style>
</head>

<body class="white">
<!-- Start Page Loading -->

<!-- End Page Loading -->
<div style="padding: 50px;" class=" grey lighten-4 center">
    <img src="/public/images/logo.png" alt="idc logo">
</div>
<div style="padding: 20px; width: 800px; margin: 40px auto; height: 60vh" class="center">
    <h1>You account is already activated, for login <a href="/">click here</a> </h1>
</div>




<!-- START FOOTER -->
<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            <span>Copyright © 2017 <a class="grey-text text-lighten-4" href="#" target="_blank">IDC</a> All rights reserved.</span>
            <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://thesharpcode.com/">TheSharpCode</a></span>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<!-- ================================================
  Scripts
  ================================================ -->

<!-- jQuery Library -->
{!! Html::script('public/material/js/plugins/jquery-1.11.2.min.js') !!}
{!! Html::script('public/material/js/materialize.min.js') !!}

{!! Html::script('public/material/js/plugins/prism/prism.js') !!}
{!! Html::script('public/material/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
{!! Html::script('public/material/js/plugins.min.js') !!}

<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>
</body>

</html>