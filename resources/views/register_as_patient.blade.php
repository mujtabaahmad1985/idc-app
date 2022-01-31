<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> IDC : Sign up as Patient </title>
    <!-- REQUIRED STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic" rel="stylesheet" type="text/css">
    {!! Html::style('/public/css/bootstrap.css') !!}
    {!! Html::style('/public/plugins/fontawesome/css/font-awesome.min.css') !!}
    {!! Html::style('/public/plugins/icheck/css/skins/all.css') !!}
    {!! Html::style('public/css/jquery-ui.css') !!}

    <link href="/public/css/main.min.css" rel="stylesheet" rev="stylesheet" type="text/css" />
    <link href="/public/css/page-register2.min.css" rel="stylesheet" rev="stylesheet" type="text/css" />

{!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}



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
    .select2-container--default .select2-selection--single{
        height: 35px;
        padding: 2px 13px;
        font-size: 13px;
        color: #999;
        border-color: #e4e6e6;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        top:4px;}
    .register-wrapper {
        max-width: 450px;
        margin: 80px auto;
    }
    .register-wrapper .panel-body form .form-title span {

        border: 1px solid #a9a3a3;

        background-color: #a9a3a3;
        color: #FFF;
    }
    #datepicker{ width: 240px;}
    .ui-datepicker{width: 220px}
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active{ padding: 0px !important; line-height: 23px !important; height: 25px !important; text-align: center!important;}
    .ui-datepicker td{ padding: 0px !important;}
    .ui-datepicker a{ padding: 5px !important; line-height: 23px !important; height: 32px !important; text-align: center!important;}
    .ui-widget-header {
        border:none;
        background: none;
        font-weight: normal;
        color: #000;
        font-weight: normal;
    }
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active{
        border:none;
        background: none;
        font-weight: normal;
        color: #000;
        font-weight: normal;
    }
    .ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
        border: 1px solid #dad55e;
        background: #fffa90;
        color: #777620;
    }
    .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
        border:none;
        background: none;
        font-weight: normal;
        color: #000;
    }
    .has-error i,.has-success i{
        top:-22px !important;}
</style>
<div class="container">
    <div class="register-wrapper">
        <div class="text-center">
            <img src="/public/images/logo.png" alt="logo">
        </div><!-- /.logo-wrapper -->

        <div class="panel">
            <div class="panel-body">
                <h2>Sign Up as Patient</h2>
                <form id="form" method="post" action="/save/web/patient" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="patient_unique_id" value="{!! $unique_id !!}" />
                    <div class="form-title">
                        <span>Personal details</span>
                    </div>
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-user input-icon"></i>
                            <input type="text" class="form-control rounded" name="first_name" required autocomplete="off" placeholder="First Name">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-user input-icon"></i>
                            <input type="text" class="form-control rounded" name="last_name" required autocomplete="off" placeholder="Last Name">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-envelope input-icon"></i>
                            <input type="email" class="form-control rounded" name="patient_email" autocomplete="off" placeholder="Email">
                        </div>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-calendar input-icon"></i>
                            <input type="text" id="date_of_birth" class="form-control rounded" name="date_of_birth" required autocomplete="off"  placeholder="Date of Birth dd.mm.yyyy">
                        </div>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-male input-icon"></i>
                            <select name="gender" id="gender" class="gender validate form-control rounded" >
                                <option value="">Choose Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-phone input-icon"></i>
                            <input type="text" name="contact_number"  data-length="20" maxlength="20" class="form-control rounded" placeholder="Contact Number">
                        </div>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-map-marker input-icon"></i>
                            <select class="form-control rounded" name="nationality" >
                                <option value="">Choose Nationality</option>
                                @foreach($countries as $country)
                                    <option value="{!! $country->name !!}" data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg" class="left circle">{!! $country->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-id-card-o input-icon"></i>
                            <select class="form-control rounde" name="card_type"  >
                                {{--<option value="">Choose Card Type</option>--}}
                                <option value="IC Number">IC Number</option>
                                <option value="FIN Number">FIN Number</option>
                                <option value="Passport Number">PASSPORT Number</option>

                            </select>
                        </div>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-id-card-o input-icon"></i>
                            <input id="card_number" name="card_number" placeholder="IC Number" type="text" class="alphanumaric form-control rounded">
                        </div>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-briefcase input-icon"></i>
                            <input id="occupation"  name="occupation" placeholder="Occupation e.g. Engineer, Manager, Doctor" type="text" class="alphanumaric form-control rounded">
                        </div>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-briefcase input-icon"></i>
                            <input id="comapny_name"  name="comapny_name" placeholder="Company Name e.g. Sony, Dell, Toshiba" type="text" class="alphanumaric form-control rounded">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-map-marker input-icon"></i>
                            <input id="state" name="state" type="text" placeholder="State  e.g. Jurong West, Hougang" class="alphanumaric form-control rounded">

                        </div>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-map-marker input-icon"></i>
                            <input type="text" class="form-control rounded" name="address" placeholder="Address">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-map-marker input-icon"></i>
                            <input type="text" class="form-control rounded" placeholder="City">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-map-marker input-icon"></i>
                            <select class="form-control rounded" name="country_area_code" id="country_area_code">
                                <option value="">Choose Country</option>
                                @foreach($countries as $country)
                                    <option @if($current_country==$country->name) selected  @endif value="{!! $country->code !!}" data-code="{!! $country->code !!}" class="left circle">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- /.form-group -->

                    <div class="form-title">
                        <span>Medical Information</span>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="icheck-minimal-grey" name="is_medication">
                                Are you on medication?
                            </label>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">

                            <textarea style="padding-left: 5px" id="medication" name="medication"  class="form-control rounded" placeholder="If yes, please state all the medication you are talking." length="120"></textarea>
                        </div>
                    </div><!-- /.form-group -->






                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="icheck-minimal-grey" name="is_allergic">
                                Are you allergic to any medication?
                            </label>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">

                            <textarea style="padding-left: 5px" id="allergic" name="allergic"  class="form-control rounded" placeholder="If yes, please state all possible allergic." length="120"></textarea>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>Do you suffer from any of the following ilnessess?</label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="ilnessess[]" class="icheck-minimal-grey" value="allergie" >
                            Allergic
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="icheck-minimal-grey" name="high_blood_pressure">
                            High Blood Pressure
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="icheck-minimal-grey" name="gastric_problems">
                            Gastric Problems
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="icheck-minimal-grey" name="asthma">
                            Asthma
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="icheck-minimal-grey" name="head_neck_injuries">
                            Head/Neck Injuries
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="icheck-minimal-grey" name="diabetes">
                            Diabetes
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="icheck-minimal-grey" name="heart_bisease">
                            Heart Disease
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="icheck-minimal-grey" name="liver_problems">
                            Liver Problems
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="icheck-minimal-grey" name="epilepsy">
                            Epilepsy
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="icheck-minimal-grey" name="herpes">
                            Herpes
                        </label>
                    </div>


                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="icheck-minimal-grey" name="respiratory">
                            Respiratory
                        </label>
                    </div>

                    <div class="row m-top-5" id="gendar-check" style="display: none;">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="icheck-minimal-grey" name="pregnant">
                                If female, are you pregnant
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-icon-left">
                            <textarea id="other" style="padding-left: 5px" name="others" class="form-control rounded" placeholder="If others." length="120"></textarea>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-title">
                        <span>Account details</span>
                    </div>
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-user input-icon"></i>
                            <input type="text" class="form-control rounded" name="name" required placeholder="Username">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-lock input-icon"></i>
                            <input type="password" class="form-control rounded" required name="password" minlength="8" id="password" placeholder="Password">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="input-icon-left">
                            <i class="fa fa-lock input-icon"></i>
                            <input type="password" class="form-control rounded" required name="re_password" id="re_password" minlength="8" placeholder="Re-type your password">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="terms" required class="icheck-minimal-grey">
                                Accept the <a href="javascript:;">Terms of Service</a> &amp; <a href="javascript:;">Privacy Policy</a>
                            </label>
                        </div>
                    </div><!-- /.form-group -->
                    <button type="submit" class="btn btn-primary btn-block rounded">SIGN UP</button>
                    <div class="alert bg-success message success-message" style="display: none">
                        <strong>Well done!</strong> <p></p>
                    </div>
                    <div class="alert bg-danger message error-message"  style="display: none">
                        <strong>Oh snap!</strong> <p></p>
                    </div>
                </form>
            </div><!-- /.panel-body -->

            <div class="panel-footer">
                <a href="/">HAVE AN ACCOUNT ?</a>
            </div><!-- /.panel-footer -->
        </div><!-- /.panel -->
    </div>
</div><!--container-->

<!-- REQUIRED SCRIPTS -->

<!-- REQUIRED SCRIPTS -->
<script src="/public/js/jquery.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<!-- REQUIRED PLUGINS -->
{!! Html::script('/public/plugins/moment/js/moment.js') !!}
<script src="/public/plugins/icheck/js/icheck.min.js"></script>
<script src="/public/js/page-login.min.js"></script>
{!! Html::script('/public/js/jquery-ui.js') !!}

{!! Html::script('/public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
{!! Html::script('/public/material/plugins/select2/js/select2.min.js') !!}
{!! Html::script('/public/js/jquery.form.js') !!}
<script>
    $(function(){
        $("select").select2();
        /*$(".button[type=submit]").click(function(e){
            alert();
            e.preventDefault();
        });*/
        var valid_year = new Date().getFullYear()-2;
        $("button[type=submit]").click(function(e){

            $(".alert").hide();
            $validation = $("#form").validate({

                // Validation rules
                // Selecting input by name attribute

                rules: {
                    password: "required",
                    re_password: {
                        equalTo: "#password"
                    }
                },
                messages:{
                    re_password:{
                        equalTo:'Please enter same password again!'
                    }
                },

                highlight: function(element, errorClass, validClass) {
                    var elem = $(element);

                    $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                // Class that wraps error message
                errorClass: "error",
                focusInvalid: true,
                // Element that wraps error message
                errorElement : 'label',
                errorPlacement: function(error, element) {
                    console.log(element);
                    var placement = $(element).data('error');
                    console.log(placement);
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



            jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-z\d\+\-_\(\)\/\s]+$/i.test(value);
            }, "Letters, numbers, and underscores only please");

            jQuery.validator.addMethod("noSpace", function(value, element) {
                var index = value.indexOf(" ");
                return   value != " " && value[0] != " ";
            }, "No space please and don't leave it empty");



            jQuery.validator.addMethod("validDate", function(value, element) {
                var value1 = value.toString().split('.');

                // console.log(value1[2]+'-'+value1[1]+'-'+value1[0]);
                value1 = value1[2]+'-'+value1[1]+'-'+value1[0];
                var date_ = new Date(value1);


                if(date_=="Invalid Date")
                    return false;

                var d_text = value.toString().split('.');

                if(d_text.length != 3)
                    return false;

                if(typeof(d_text[2])=="undefined" || d_text[2]=="")
                    return false;

                if(parseInt(d_text[2])>valid_year || parseInt(d_text[2]) < 1920 )
                    return false;

                return true;

            }, "Invalid Date");

            $("#date_of_birth").rules('add', {
                validDate:true,
                messages:{
                    validDate:"Please enter valid date till to dd.mm."+valid_year
                }

            });


            $('.alphanumaric').each(function() {
                $(this).rules('add', {
                    alphanumeric: true,
                    messages: {
                        alphanumeric:  "Letters, numbers, and underscores only please",
                    },
                    noSpace: true,
                    messages: {
                        noSpace:  "No space please and don't leave it empty",
                    }
                });
            });








            if( $("#form").valid()) {
                e.preventDefault();
                // alert();
                $(".message").hide();
                $("#form").ajaxForm(function (response) {

                    response = $.parseJSON(response);
                    if(response.type=="success"){
                        $(".progress").hide();
                        $(".ajax-loading").show();
                        $(".overlay").hide();
                        $(".success-message").html('Patient information is updated.');
                        $(".success-message").show();
                        setTimeout(function () {
                            $(".success-message").hide();
                            window.location = "/patient/list";
                        }, 2500);
                    }else{
                        $(".error-message").html(response.message);
                        $(".error-message").show();
                    }
                }).submit();
            }

            e.preventDefault();
        });
        $(".gender").select2().on('change',function(){
            if($(this).val() =='Female')
                $("#gendar-check").show();
            else
                $("#gendar-check").hide();
        });

        $( "#date_of_birth" ).datepicker({ dateFormat: 'dd.mm.yy',maxDate:'-2Y' });
    })
</script>
</body>
</html>