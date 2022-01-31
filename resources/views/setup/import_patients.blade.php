@extends('layout.app')
@section('page-title') Import Patients @endsection
@section('css')

@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Import</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>
                    <a href="#" class="breadcrumb-item">Setup</a>
                    <span class="breadcrumb-item active">Imports</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>

    <div class="content">
        <div class="card">


            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row row-tile no-gutters">
                                <div class="col-6">
                                    <button type="button" class="btn btn-light btn-block btn-float m-0">
                                        <img src="/public/img/gmail.png" style="width: 40px; height: 40px" hspace="middle" />
                                        <span> <a class="" href="#!" id="authorize-button">Login to Gmail</a></span>

                                        <a class="import-patient" href="#!" id="import-button" style="display: none">Import Contact</a>
                                        <a class="import-patient" href="#!" id="signout-button" style="display: none"> | Logout</a>
                                    </button>

                                    <button type="button" class="btn btn-light btn-block btn-float m-0">
                                        <img src="/public/img/outlookpng.png" style="width: 40px; height: 40px" hspace="middle" />
                                        <span>Login to Outlook</span>
                                    </button>
                                </div>

                                <div class="col-6">
                                    <button type="button" class="btn btn-light btn-block btn-float m-0">
                                        <img src="/public/img/csv.png" style="width: 40px; height: 40px" hspace="middle" />
                                        <span><a href="#!" class="upload-csv-btn">Upload CSV</a></span>
                                    </button>
                                    <div class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width: 0%">
                                            <span class="sr-only">54% Complete</span>
                                        </div>
                                    </div>

                                    <div class="upload-csv-section" style="display:none">
                                        <form id="upload-csv-form" method="post" action="/import_patient" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <input name="import_csv" type="file" accept=".csv" />
                                        </form>
                                    </div>
                                    <div class="card green success-message" style="display: none;">
                                        <div class="card-content white-text" style="padding: 0px 5px;">
                                            <p>d</p>
                                        </div>
                                    </div>
                                    <div class="card red error-message"  style="display: none;">
                                        <div class="card-content white-text"  style="padding: 0px 5px;">
                                            <p>d</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    <script>
        var access_token= "";
        $(function(){

            $("#import-button").click(function () {

                if(access_token!=""){
                    $(".overlay").show();
                    $.ajax({
                        url:'/import/patient/google',
                        type:"post",
                        data:{"_token":"{!! csrf_token() !!}",token:access_token},
                        success:function (response) {
                            //alert(response);
                            $(".overlay").hide();
                        }
                    });
                }

            });

            $(".upload-csv-btn").click(function(){
                    $("input[name=import_csv]").click();
            });
            var progressbar = $(".progress-bar");

            $("input[name=import_csv]").change(function(){
                $("#upload-csv-form").ajaxForm(
                    {


                        beforeSend: function() {
                            $(".progress").css("display","block");
                            progressbar.width('0%');
                            progressbar.text('0%');
                        },
                        uploadProgress: function (event, position, total, percentComplete) {
                            //alert(percentComplete);
                            progressbar.width(percentComplete + '%');
                            progressbar.text(percentComplete + '%');
                        },
                        success: function(response) {
                            $(".progress").css("display","none");
                            response = $.parseJSON(response);
                            if(response.type=="success"){
                                $('.success-message').html(response.message);
                                $('.success-message').fadeIn();

                                setTimeout(function(){location.reload()}, 2500);
                            }else{
                                $('.error-message').html(response.message);
                                $('.error-message').fadeIn();
                            }

                            setTimeout(function(){location.reload()}, 2500);
                        }
                    })
                    .submit();
            });



            $(".save-room").click(function(e){
                $(".alert").hide();
                $validation = $("#user-form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        name: {
                            required: true
                        },
                        short_name: {
                            required: true
                        },


                    },
                    // Error messages
                    messages: {
                        name: "Name is required",
                        short_name: "Short Name is required ",

                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    // Class that wraps error message
                    errorClass: "help-block",
                    focusInvalid: true,
                    // Element that wraps error message
                    errorElement : 'div',
                    errorPlacement: function(error, element) {
                        var placement = $(element).data('error');
                        if (placement) {
                            $(placement).append(error)
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    success: function(helpBlock) {
                        if( $(helpBlock).closest(".form-group").hasClass('has-error') ){
                            $(helpBlock).closest(".form-group").removeClass("has-error").addClass("has-success");
                        }
                    }
                });

                if($("#user-form").valid()){

                    $("#user-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){location.reload()}, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });

            $(".edit-room").click(function(e){
                $(".alert").hide();
                $validation = $("#edit-form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        name: {
                            required: true
                        },
                        short_name: {
                            required: true
                        },


                    },
                    // Error messages
                    messages: {
                        name: "Name is required",
                        short_name: "Short Name is required ",

                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    // Class that wraps error message
                    errorClass: "help-block",
                    focusInvalid: true,
                    // Element that wraps error message
                    errorElement : 'div',
                    errorPlacement: function(error, element) {
                        var placement = $(element).data('error');
                        if (placement) {
                            $(placement).append(error)
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    success: function(helpBlock) {
                        if( $(helpBlock).closest(".form-group").hasClass('has-error') ){
                            $(helpBlock).closest(".form-group").removeClass("has-error").addClass("has-success");
                        }
                    }
                });

                if($("#edit-form").valid()){

                    $("#edit-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){location.reload()}, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });

            $(".edit").click(function(){
                var id = $(this).attr('data-id');
                $("#room_edit_id").val(id);
                $.ajax({
                    url:"/room/get/"+id,
                    success:function(response){
                        response = $.parseJSON(response);
                        $("#edit-form input[name=name]").val(response.name);
                        $("#edit-form input[name=name]").focusin();
                        $("#edit-form input[name=short_name]").val(response.short_name);
                        $("#edit-form input[name=short_name]").focusin();

                        $("#edit-modal-room").modal('open');;

                    }
                });
            });

            $(".delete").click(function(){
                var id = $(this).attr('data-id');
                swal({    title: "Are you sure?",
                        text: "You will not be able to recover this detail!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false },
                    function(){

                        $.ajax({
                            url:"/room/delete/"+id,
                            success:function(){
                                swal("Deleted!", "Record has been deleted.", "success");
                                setTimeout(function(){location.reload()}, 2500);
                            }
                        });


                    });
            });
        })




    </script>
    <script type="text/javascript">
        // Enter an API key from the Google API Console:
        //   https://console.developers.google.com/apis/credentials
        var apiKey = 'AIzaSyA_CjZe_0nU6g1ClmgUZ0F807X4o48uJFo';
        // Enter the API Discovery Docs that describes the APIs you want to
        // access. In this example, we are accessing the People API, so we load
        // Discovery Doc found here: https://developers.google.com/people/api/rest/
        var discoveryDocs = ["https://people.googleapis.com/$discovery/rest?version=v1"];
        // Enter a client ID for a web application from the Google API Console:
        //   https://console.developers.google.com/apis/credentials?project=_
        // In your API Console project, add a JavaScript origin that corresponds
        //   to the domain where you will be running the script.
        var clientId = '61109495143-p4knu9um8d2ejupsoho22bqorba8k9r8.apps.googleusercontent.com';
        // Enter one or more authorization scopes. Refer to the documentation for
        // the API or https://developers.google.com/people/v1/how-tos/authorizing
        // for details.
        var scopes = 'profile';
        var authorizeButton = document.getElementById('authorize-button');
        var signoutButton = document.getElementById('signout-button');
        function handleClientLoad() {
            // Load the API client and auth2 library
            gapi.load('client:auth2', initClient);
        }
        function initClient() {
            gapi.client.init({
                apiKey: apiKey,
                discoveryDocs: discoveryDocs,
                clientId: clientId,
                scope: scopes
            }).then(function () {
                // Listen for sign-in state changes.

                gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
                // Handle the initial sign-in state.
                updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
                authorizeButton.onclick = handleAuthClick;
                signoutButton.onclick = handleSignoutClick;
                access_token = gapi.auth.getToken().access_token;
               // alert(access_token);

            });
        }
        function updateSigninStatus(isSignedIn) {
            if (isSignedIn) {
                $("#authorize-button").hide();
                $("#import-button").show();
                $("#signout-button").show();
                makeApiCall();
            }else{
                $("#authorize-button").show();
                $("#import-button").hide();
                $("#signout-button").hide();
            }
        }
        function handleAuthClick(event) {
            gapi.auth2.getAuthInstance().signIn();
        }
        function handleSignoutClick(event) {
            gapi.auth2.getAuthInstance().signOut();
        }
        // Load the API and make an API call.  Display the results on the screen.
        function makeApiCall() {
            gapi.client.people.people.get({
                'resourceName': 'people/me',
                'requestMask.includeField': 'person.names'
            }).then(function(resp) {
                console.log(resp);


            });
        }
    </script>
    <script async defer src="https://apis.google.com/js/api.js"
            onload="this.onload=function(){};handleClientLoad()"
            onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection