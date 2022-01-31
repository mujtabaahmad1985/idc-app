@extends('layout.app')
@section('page-title') Edit Staff @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
@endsection

@section('content')
    <style type="text/css">
        .input-field div.error{
            position: relative;
            top: -1rem;
            left: 0rem;
            font-size: 0.8rem;
            color:#FF0000;
            -webkit-transform: translateY(0%);
            -ms-transform: translateY(0%);
            -o-transform: translateY(0%);
            transform: translateY(0%);
        }
        .input-field label.active{
            width:100%;
        }
        .card-panel:last-child{ margin-bottom: 100px}
        .left-alert input[type=text] + label:after,
        .left-alert input[type=password] + label:after,
        .left-alert input[type=email] + label:after,
        .left-alert input[type=url] + label:after,
        .left-alert input[type=time] + label:after,
        .left-alert input[type=date] + label:after,
        .left-alert input[type=datetime-local] + label:after,
        .left-alert input[type=tel] + label:after,
        .left-alert input[type=number] + label:after,
        .left-alert input[type=search] + label:after,
        .left-alert textarea.materialize-textarea + label:after{
            left:0px;
        }
        .right-alert input[type=text] + label:after,
        .right-alert input[type=password] + label:after,
        .right-alert input[type=email] + label:after,
        .right-alert input[type=url] + label:after,
        .right-alert input[type=time] + label:after,
        .right-alert input[type=date] + label:after,
        .right-alert input[type=datetime-local] + label:after,
        .right-alert input[type=tel] + label:after,
        .right-alert input[type=number] + label:after,
        .right-alert input[type=search] + label:after,
        .right-alert textarea.materialize-textarea + label:after{
            right:70px;
        }
        .dropdown-content{
            background: #f5f2f0 !important; width: 100% !important;
        }
        .dropdown-content a{color:rgba(0,0,0,0.54) !important;}
        .dropdown-content li{
            padding:10px !important;}
        .mandatory{
            color: #e32;
            content: ' *' !important;
            display:inline;
        }
        textarea.materialize-textarea{
            padding:0;}

        .input-field{    margin-top: 0.7rem;}
        .input-field input[type=text],.input-field input[type=email]{ height: 2rem;}
        .input-field.col label,.select-wrapper input.select-dropdown{ font-size: 0.8rem;}
        /*.ajax-loading{
            position: fixed;
            padding: 5px 10px;
            z-index: 99;
            top: 12px;
            width: 200px;
            right: 10px;
            display: none;
        }*/
        .phone, .new-phone{ position: relative}

        .add-button,.remove-button{
            position: absolute;
            right: 0;
            background: none;
            border: none;
            top: 6px;
            background-color: #FFF !important;

        }
        .remove-file {

            background: none;
            border: none;
            top: 6px;
            background-color: #FFF !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            font-size: 0.8rem
        }

        .select2 {
            width: 91% !important;
            float: right;
            margin-bottom: 30px;
            font-size: 0.8rem;
        }
        .select2-container .select2-selection--single .select2-selection__rendered{ padding-left: 0}

        .select2-container--default .select2-search--dropdown .select2-search__field {
            height: 30px !important
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #000 transparent transparent transparent;
        }

        .select2-search.select2-search--dropdown {
            width: 100%;
        }

        .select2-container--default .select2-selection {
            border: none;
            border-bottom: 1px solid #000;
            border-radius: 0
        }

        .select-wrapper input.select-dropdown {
            font-size: 0.8rem;
            height: 2rem;
            line-height: 2rem
        }
        .phone .select2, .new-phone .select2{ width: 84% !important;    }
        .message.card > .card-content{
            padding:3px;}
    </style>
    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">
            <div class="progress" style="display: none;">
                <div class="indeterminate"></div>
            </div>
            <form id="form" method="post" action="/staff/save" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="staff_id" id="staff_id"  value="{!! $staffs->id !!}" />
                <div class="row">
                    <div class="col s12 m6 l6 col s6  offset-m2 offset-l2">
                        <h4 class="header">Edit Personal Information for {!! $staffs->first_name.' '.$staffs->last_name !!}</h4>
                        <div class="card-panel">


                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">textsms</i>
                                    <input type="text" id="autocomplete-input" name="salutation" value="{!! $staffs->salutation !!}"  class="alphanumaric  autocomplete">
                                    <label for="autocomplete-input">Salutation </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_box</i>
                                    <input id="first_name" name="first_name" type="text"  value="{!! $staffs->first_name !!}" required class="alphanumaric">
                                    <label for="first_name" class="">First Name <span class="mandatory">*</span></label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_box</i>
                                    <input id="last_name" name="last_name" type="text"  value="{!! $staffs->last_name !!}" required class="alphanumaric">
                                    <label for="last_name" class="">Last Name <span class="mandatory">*</span></label>
                                </div>

                            </div>
                            @php
                                $year = $month = $day = "";
                                if(!empty($staffs->date_of_birth)){
                                 $d = explode('-',$staffs->date_of_birth);

                                $year = $d[0];
                                $month = $d[1];
                                $day = $d[2];
                                }

                            @endphp
                            <div class="row">
                                <div class="col s1">
                                    <i class="material-icons prefix">access_time</i>
                                </div>
                                <div class="input-field col s4 no-padding">

                                    <select name="month" id="month-date-of-birth">
                                        <option value="">Choose Month</option>
                                        @for($m=1; $m<=12; ++$m){
                                        <option @if($m==$month) selected @endif value="{!! $m !!}">{!!  date('F', mktime(0, 0, 0, $m, 1)) !!}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="input-field col s3">
                                    <select name="day" id="day-date-of-birth">
                                        <option value="">Choose Day</option>

                                        @for($d=1; $d<=31; ++$d){
                                        <option @if($d==$day) selected @endif value="{!! $d !!}">{!! $d !!}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="input-field col s4">
                                    <select name="year" id="year-date-of-birth">

                                        @for($i=2016; $i>=1910; $i--)
                                            <option @if($i==$year) selected @endif value="{!! $i !!}">{!! $i !!}</option>

                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">person_outline</i>
                                    <select name="gender">
                                        <option value="Male" @if($staffs->gender=='Male') selected @endif>Male</option>
                                        <option value="Female"  @if($staffs->gender=='Female') selected @endif>Female</option>
                                    </select>

                                </div>

                            </div>
                            <div class="row phone">
                                <div class="input-field col s5">


                                    <i class="mdi-communication-call prefix"></i>
                                    <select class="icons" name="country_area_code" id="country_area_code">
                                        <option value="">Choose Country</option>
                                        @foreach($countries as $country)
                                            <option @if($current_country==$country->name || $staffs->phone_code === $country->code) selected  @endif value="{!! $country->code !!}" data-code="{!! $country->code !!}" class="left circle">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="input-field col s7">
                                    <input id="contact_number" name="contact_number" value="{!! $staffs->contact_number !!}"  type="text"  class="alphanumaric">
                                </div>
                                {{--<button class="add-button"><i class="material-icons">add_circle</i> </button>--}}
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">email</i>
                                    <input id="email" name="email" type="email" value="{!! $staffs->users->email !!}"  readonly="readonly"  class="">
                                    <label for="email" class="">Email <span class="mandatory">*</span></label>

                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">location_on</i>
                                    <select class="icons" name="nationality">
                                        <option value="">Choose Nationality</option>
                                        @foreach($countries as $country)
                                            <option value="{!! $country->name !!}" data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg" @if( $staffs->nationality === $country->name) selected  @endif class="left circle">{!! $country->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">work
                                    </i>
                                    <input id="id_no" name="id_no" type="text" value="{!! $staffs->id_no !!}"   class="alphanumaric">
                                    <label for="id_no" class="">ID No. </label>

                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">date_range
                                    </i>
                                    <input id="start_date" name="start_date" type="text" placeholder="dd.mm.YYYY" value="{!! !empty($staffs->start_date)?date('d.m.Y',strtotime($staffs->start_date)):"" !!}"   class="alphanumaric datetimepicker">
                                    <label for="start_date" class="">Start Date </label>

                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">date_range
                                    </i>
                                    <input id="end_date" name="end_date" type="text"  placeholder="dd.mm.YYYY" value="{!! !empty($staffs->end_date)?date('d.m.Y',strtotime($staffs->end_date)):"" !!}"  class="alphanumaric datetimepicker">
                                    <label for="end_date" class="">End Date </label>

                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">work
                                    </i>
                                    <input id="designation" name="designation" value="{!! $staffs->designation !!}" type="text"  class="alphanumaric">
                                    <label for="designation" class="">Designation </label>

                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">location_city</i>
                                    <input id="city" name="city" value="{!! $staffs->city !!}"  type="text"  class="alphanumaric">
                                    <label for="city" class="">City </label>

                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">location_searching</i>
                                    <input id="state" name="state" value="{!! $staffs->state !!}"  type="text"  class="alphanumaric">
                                    <label for="state" class="">State </label>

                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="prefix"></i>
                                    <input id="zipcode" name="zipcode" value="{!! $staffs->zip_code !!}"  type="text"  class="alphanumaric">
                                    <label for="zipcode" class="">Zipcode</label>

                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="prefix"></i>
                                    <textarea id="address" name="address"  class="materialize-textarea" length="120">{!! $staffs->address !!}</textarea>
                                    <label for="address" class="">Address </label>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12 right-align">
                                    <a href="#!" class="upload-document" data-type="medical">Upload Picture</a>
                                </div>

                                <div class="col s12 add-file-here">

                                </div>
                            </div>
                            <div class="row m-top-30">
                                <div class="col s12 center-align">
                                    <a class="btn edit-user red" href="#!">Edit</a>
                                    <a class="btn save-user red" href="#!">Save</a>
                                    <a class="btn cancel-user red" href="#!">Delete</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="card green message success-message" style="display: none;">
                                        <div class="card-content white-text">
                                            <p>d</p>
                                        </div>
                                    </div>
                                    <div class="card red message error-message"  style="display: none;">
                                        <div class="card-content white-text">
                                            <p>d</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </form>
            <div class="ajax-loading white-text green" >Saved.</div>
        </div>

        <form id="upload-file" action="/upload/file" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <input name="document_type" type="hidden" value="profile"/>
            <input type="hidden" name="staff_id" id="document_staff_id" value="{!! $staffs->id !!}"/>
            <input type="file" name="document_file" style="display: none;"/>
        </form>
        <!--end container-->


    </section>
@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/material/js/plugins/dropify/js/dropify.min.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    <script>

$(function(){

    $( "#start_date" ).datepicker({ dateFormat: 'dd.mm.yy',

        changeMonth: true,
        changeYear: true,
        yearRange: '-100:+0',
        onSelect: function(dateText, inst){
            $("#end_date").datepicker("option","minDate",
                $("#start_date").datepicker("getDate"));
        }
    });

    $( "#end_date" ).datepicker({ dateFormat: 'dd.mm.yy',

        changeMonth: true,
        changeYear: true,
        yearRange: '-100:+0',
        minDate:$("#start_date").datepicker("getDate")
    });

    $("#month-date-of-birth").select2().change(function(){
        var year = $("#year-date-of-birth").val();
        var days = new Date(year, $(this).val(), 0).getDate();
        // $("#day-date-of-birth").select2('destroy');
        $("#day-date-of-birth").html('');
        for(var i=1;i<=days;i++){
            var data = {
                id: i,
                text: i
            };

            var newOption = new Option(data.text, data.id, false, false);
            $('#day-date-of-birth').append(newOption).trigger('change');

        }
        //$("#day-date-of-birth").select2();
    });
    $("#country_area_code").material_select('destroy');
    $("#country_area_code").select2();

    $( "#date_of_birth" ).datepicker({ dateFormat: 'dd.mm.yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '-100:+0'});
   /* $("#date_of_birth").focusout(function(){
        var d = $(this).val().split('.');
       // if(d[1]){
            var new_date = new Date(d[1]+"."+d[0]+"."+d[2]);
            //alert(new_date);

            $(this).datepicker("setDate",new Date(new_date));
       // }

    });*/

    $("select").material_select('destroy');
    $("select").select2();

    $(".save-user").click(function(e){
        $(".alert").hide();
        $validation = $("#form").validate({
            // Validation rules
            // Selecting input by name attribute
            rules: {




            },
            // Error messages
            messages: {
                service_name: "Servoce name is required",
                description: "Description is required ",
                buffer_time: "Buffer time is required ",
                price: "Price is required ",
                duration: "Duration is required ",

            },
            highlight: function(element, errorClass, validClass) {
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

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^[a-z\d\+\-_.()\s]+$/i.test(value);
        }, "Letters, numbers, and underscores only please");

        jQuery.validator.addMethod("validate_date", function(value, element) {
            return this.optional(element) || /^(\d{1,2})(\.|-)(\d{1,2})(\.|-)(\d{4})$/i.test(value);
        }, "Enter date as dd.mm.yy or dd.mm.yyyy please");

        $('.alphanumaric').each(function() {
            $(this).rules('add', {
                alphanumeric: true,
                messages: {
                    alphanumeric:  "Letters, numbers, and underscores only please",
                }
            });
        });
        $('.date-validate').each(function() {
            $(this).rules('add', {
                validate_date: true,
                messages: {
                    alphanumeric:  "Enter date as dd.mm.yyyy please",
                }
            });
        });
        if($("#form").valid()){

            if( $("#form").valid()) {
                // alert();
                $(".overlay").show();
                $("#form").ajaxForm(function (response) {
                    $(".overlay").hide();
                    $(".success-message").html('Data is updated successfully');
                    $(".success-message").show();

                    setTimeout(function () {
                        $(".success-message").hide();
                        window.location='/staffs/profile/{!! $staffs->user_id !!}';
                    }, 2500);
                }).submit();
            }
        }
        e.preventDefault();
    });

    $(".remove-file").click(function(e){
        var id = $(this).attr('data-id');
        var ths = $(this);
        $.ajax({
            url:"/document/delete/"+id,
            success:function () {
                ths.parents('.files').remove();
            }
        });

        e.preventDefault();
    });
    var _target = null;
    $(".upload-document").click(function () {
      //  $("input[name=document_type]").val($(this).attr('data-type'));
        _target = $(this).parent().parent().find('.add-file-here');
        $("input[name=document_file]").click();
    });

    $("input[name=document_file]").change(function () {
        //var file = $("input[name=document_file]")[0].files;
        //console.log(file[0].name);
        $("#upload-file").ajaxForm(function (response) {
            response = $.parseJSON(response);
            var str = '<div class="row files"><div class="col s11 m-top-5"><a class="truncate" href="/public/uploads/documents/'+response.document_name+'" download="'+response.document_name+'">' + response.document_name + '</a></div><div class="col s1 m-top-5"><button class="remove-file" data-id="' + response.id + '"><i class="material-icons">delete</i></button></div></div>';
            _target.html(str);
            $(".remove-file").click(function(e){
                var id = $(this).attr('data-id');
                var ths = $(this);
                $.ajax({
                    url:"/document/delete/"+id,
                    success:function () {
                        ths.parents('.files').remove();
                    }
                });

                e.preventDefault();
            });
        }).submit();


    });


    $("#country_area_code").on('change', function () {
        var val = $(this).val();

        $('#contact_number').val("+"+val);
    });

    $('input.autocomplete').autocomplete({
        data: {
            "Mr": null,
            "Mrs": null,
            "Madam": null,
            "Mas": null,
            "Prof.": null,
        },

        onAutocomplete: function(val) {
            // Callback function when value is autcompleted.
        },
        minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });

    $( ".datepicker" ).datepicker({ dateFormat: 'dd.mm.yy' });
var timeoutId;
  /*  $('#form input, #form textarea, #form select').on('input propertychange change', function() {

        var first_name = $("#first_name").val();
        if(first_name=="") return false;

       // var email = $("#email").val();
       // if(email=="") return false;
        clearTimeout(timeoutId);
        timeoutId = setTimeout(function() {
            // Runs 1 second (1000 ms) after the last change
            //$(".progress").show();
            $(".ajax-loading").hide();
            if($("#form").valid()) {
                $("#form").ajaxForm(function (response) {
                    $(".progress").hide();
                    $(".ajax-loading").show();
                    $("#staff_id").val(response);
                    $("#document_staff_id").val(response);
                    setTimeout(function () {
                        $(".ajax-loading").hide();
                    }, 1000);
                }).submit();
            }

        }, 2000);
    });*/


    $("input[name=contact_number],.contact_number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [187,107,46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

})



    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection