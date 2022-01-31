@extends('layout.app')
@section('page-title') Availability : Setup @endsection
@section('css')

@endsection

@section('content')
    <style type="text/css">
        .input-field div.error {
            position: relative;
            top: -1rem;
            left: 0rem;
            font-size: 0.8rem;
            color: #FF0000;
            -webkit-transform: translateY(0%);
            -ms-transform: translateY(0%);
            -o-transform: translateY(0%);
            transform: translateY(0%);
        }

        .input-field label.active {
            width: 100%;
        }

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
        .left-alert textarea.materialize-textarea + label:after {
            left: 0px;
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
        .right-alert textarea.materialize-textarea + label:after {
            right: 70px;
        }

        .dropdown-content {
            background: #f5f2f0 !important;;
        }

        .dropdown-content a {
            color: rgba(0, 0, 0, 0.54) !important;
        }

        .dropdown-content li {
            padding: 10px !important;
        }

        .card {
            overflow: visible;
        }

        .input_start_time {
            top: 24.25px !important;
            left: 57.25px !important;
        }

        .input_end_time {
            top: 24.25px !important;
            left: 12.25px !important;
        }
      .add-availability input[type=text]{ font-size: 0.8rem !important; height: 1.3rem !important;}
        .add-availability  .input-field label {
            font-size: 0.8rem;
            margin-top: -7px;
        }
        input[type=number]{ height: 2rem !important;}
        .add-availability .dropdown-content li>a, .dropdown-content li>span{ padding: 5px 15px;}
    </style>
    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">
            <div class="ajax-loading white-text green" >Saved.</div>
            <div class="row">
                <h4 class="header col s6">Availability</h4>

            </div>
            @php
                $start = "00:00";
                $end = "23:30";

                $tStart = strtotime($start);
                $tEnd = strtotime($end);
                $tNow = $tStart;
        while($tNow <= $tEnd){



             $now = date("H:i",$tNow);
             $tNow = strtotime('+15 minutes',$tNow);
             $time_slots[] = $now;
        }$current_hour = date('H');
                $current_min = date('i');
                $current_slot = $current_hour.":".$current_min;
				if($current_min<=15){
					$current_slot =$current_hour.":00";
				}

				if($current_min>15 && $current_min<=30){
					$current_slot =$current_hour.":15";
				}

				if($current_min>30 && $current_min<=45){
					$current_slot =$current_hour.":30";
				}

				if($current_min>45 && $current_min<=59){
					$current_slot =$current_hour.":45";
				}


   // echo "<pre>"; print_r($time_slots); echo "</pre>";
            @endphp
            <div class="row ">
                <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">
                    @foreach($availability as $doctor)
                        <li class="">
                            <div class="collapsible-header"><i
                                        class="material-icons">subtitles</i>Dr. {{$doctor->fname.' '.$doctor->lname}}
                            </div>
                            <div class="collapsible-body" style="display: none;">
                                <form method="post" class="form" action="/save/availabilty" id="form-doctor-{!! $doctor->doctor_id !!}"  enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="{!! $doctor->doctor_id !!}" />
                                    {{csrf_field()}}
                                     <span>
                                             <div class="row add-availability">
                                                  <div class="input-field col s2">

                                                        <input id="from_date" name="from_date" type="text" value="{!! date('d.m.Y') !!}"  class="datepicker">
                                                        <label for="from_date" class="">Choose Date</label>
                                                    </div>
                                                  <div class="input-field col s2">
                                                    <i class="material-icons prefix">access_time</i>
                                                    <input type="text" class="dropdown-button " value="{!! empty($doctor->start_time)?$current_slot:date('H:i',strtotime($doctor->start_time)) !!}" id="start_time{!! $doctor->doctor_id !!}"
                                                           data-activates="input_start_time{!! $doctor->doctor_id !!}" name="start_time"/>
                                                    <ul class="dropdown-content input_start_time" id="input_start_time{!! $doctor->doctor_id !!}" name="start_time"
                                                        data-error=".errorTxt3">
                                                        @foreach($time_slots as $slots)
                                                            <li value="{!! $slots !!}" @if($current_slot==$slots) class="selected" @endif><a href="javascript:;">{!! $slots !!}</a> </li>
                                                        @endforeach
                                                    </ul>
                                                      {{--<input id="start_time" type="text" name="start_time" class="timepicker validate">--}}
                                                      <label for="start_time" class="">Start Time</label>
                                                </div>
                                                  <div class="input-field col s2">

                                                    <input type="text" class="dropdown-button "
                                                           id="end_time" data-activates="input_end_time{!! $doctor->doctor_id !!}"
                                                           name="end_time" value="{!! date('H:i',strtotime($doctor->end_time)) !!}"/>
                                <ul class="dropdown-content input_end_time" id="input_end_time{!! $doctor->doctor_id !!}" name="end_time"
                                    data-error=".errorTxt3">
                                    @foreach($time_slots as $slots)
                                        <li value="{!! $slots !!}" @if(date('H:i',strtotime($doctor->end_time))==$slots) class="selected" @endif><a href="javascript:;">{!! $slots !!}</a> </li>
                                    @endforeach
                                </ul>
                                                      {{--<input id="end_time" type="text" name="end_time" class="timepicker validate">--}}
                                                      <label for="end_time" class="">End Time</label>
                            </div>
                                                  <div class="input-field col s2">

                                                        <input id="to_date" name="to_date" type="text" value="{!! date('d.m.Y') !!}"  class="datepicker">
                                                        <label for="to_date" class="">Choose Date</label>
                                                    </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col s2">
                                                     <p>
                                                      <input type="checkbox" name="all_day" id="all-day{!! $doctor->doctor_id !!}" />
                                                      <label for="all-day{!! $doctor->doctor_id !!}">All Day</label>
                                                    </p>
                                                 </div>
                                                 <div class="col s4">
<i class="prefix"></i>
                                                     <select name="repeat">
                                                         <option value="no-repeat">Does not repeat</option>
                                                         <option value="daily">Daily</option>
                                                         <option value="{!! date('l') !!}">Weekly on {!! date('l') !!}</option>
                                                         <option value="second-{!! date('l') !!}">Monthly on second {!! date('l') !!}</option>
                                                         <option value="{!! date('d-m') !!}">Annually on {!! date('d F') !!}</option>
                                                         <option value="mon-fri">Every week (Monday to Friday)</option>
                                                         <option value="custom">Custom</option>
                                                     </select>

                                                 </div>
                                             </div>


                                             <div style="clear:both"></div>
                                        </span>
                                </form>

                            </div>
                        </li>
                    @endforeach

                </ul>

            </div>
        </div>

        <div id="repeat-occurence" class="modal" style="width: 35% !important;">
            <div class="modal-content">
                <h3 style="font-size: 1.2rem">Custom recurrence</h3>
                <div class="row">
                    <div class="col s4">
                        <p> Repeat every</p>
                    </div>
                    <div class="col s4">
                        <input type="number" />
                    </div>
                    <div class="col s4">
                      <select name="repeat-option" id="repeat-option">
                          <option value="day">Day</option>
                          <option value="week">Week</option>
                          <option value="month">Month</option>
                          <option value="year">Year</option>
                      </select>
                    </div>
                </div>
                <div class="row" id="week" style="display: none">
                    <p>
                        <input type="checkbox" id="sun" name="day[]" value="sun" />
                        <label for="sun" style="margin-left: 5px">Sun</label>
                        <input type="checkbox" id="mon"  name="day[]" value="mon" />
                        <label for="mon" style="margin-left: 5px">Mon</label>
                        <input type="checkbox" id="tues"  name="day[]" value="tues" />
                        <label for="tues" style="margin-left: 5px">Tue</label>

                        <input type="checkbox" id="wed"  name="day[]" value="wed" />
                        <label for="wed" style="margin-left: 5px">Wed</label>
                        <input type="checkbox" id="thu"  name="day[]" value="thu" />
                        <label for="thu" style="margin-left: 5px">Thu</label>
                        <input type="checkbox" id="fri"  name="day[]" value="fri" />
                        <label for="fri" style="margin-left: 5px">Fri</label>
                        <input type="checkbox" id="sat"  name="day[]" value="sat" />
                        <label for="sat" style="margin-left: 5px">Sat</label>
                    </p>
                </div>

                <div class="row" id="monthly" style="display: none">
                    <div class="col s8">
                        <select name="monthly-option" id="monthly-option">
                            <option value="monthly-{!! strtolower(date('d')) !!}">Monthly on day {!! date('d') !!}</option>
                            <option value="monthly-{!! strtolower(date('l')) !!}">Monthly on {!! date('l') !!}</option>

                        </select>
                    </div>
                </div>

                <div class="row">
                    <p>Ends</p>
                    <p>
                        <input class="with-gap" name="end" type="radio" id="never"  />
                        <label for="never">Never</label>
                    </p>
                    <p>
                    <div class="row">
                        <div class="col s4 m-top-10" style="padding: 0">
                            <input class="with-gap" name="end" type="radio" id="on"  />
                            <label for="on">On</label>
                        </div>
                        <div class="col s4">
                            <input id="repeat_date" name="repeat_date" type="text" value="{!! date('d.m.Y') !!}"  class="datepicker">

                        </div>
                    </div>

                    </p>
                    <p>
                    <div class="row">
                        <div class="col s4 m-top-10" style="padding: 0">
                            <input class="with-gap" name="end" type="radio" id="after"  />
                            <label for="after">After</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="repeat_occ" name="repeat_occ" type="number" min="1" value="1">
                            <label>occurrences
                            </label>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </div>

    </section>
@endsection


@section('js')

    {!! Html::script('/public/js/jquery.form.js') !!}
    {!! Html::script('/public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}
    <script>
        $(function () {
var to_animate = 0;
            $("input[name=start_time]").click(function(){
                var ths = $(this);
                if(to_animate==0)
                 to_animate = (ths.parent().find('li.selected').offset().top);
                ths.parent().find('.dropdown-content').animate({scrollTop:to_animate-300});
            });

            $("input[name=end_time]").click(function(){

                var start_time = $(this).parents('.add-availability').find('input[name=end_time]').val();
                var ths = $(this);
                $.ajax({
                    url: '/calculate/time',
                    data: {start_time: start_time, "_token": "{!! csrf_token() !!}"},
                    type: "post",
                    success: function (response) {

                        $('#booking-appointment select.end_time').material_select('destroy');
                        response = $.parseJSON(response);
                        ths.parents('.add-availability').find('input[name=end_time]').val(response[0].text);
                        ths.parents('.add-availability').find('input[name=end_time]').focusin();
                        var str = "";
                        $.each(response, function (i, v) {
                            str += '<li value="' + v.value + '"><a href="javascript:;"> ' + v.text + '</a></li>'
                        });

                        ths.parents('.add-availability').find('.input_end_time').html(str);
                        $(".input_end_time li").click(function () {
                            var end_time = $(this).attr('value');
                            $(this).parents('.input-field').find('input').val(end_time);
                            var frm = $(this).parents('form');
                            console.log(frm.attr('id'));
                            //     return false;
                            clearTimeout(timeoutId);
                            timeoutId = setTimeout(function() {
                                // Runs 1 second (1000 ms) after the last change
                                //$(".progress").show();
                                $(".ajax-loading").hide();
                                frm.ajaxForm(function(response){
                                    $(".progress").hide();
                                    $(".ajax-loading").show();
                                    //  $("#patient_id").val(response);
                                    setTimeout(function(){
                                        $(".ajax-loading").hide();
                                    },1500);
                                }).submit();

                            }, 1000);
                        });
                    }


                });



                return false;

                var ths = $(this);
                if(to_animate==0)
                    to_animate = (ths.parent().find('li.selected').offset().top);
                ths.parent().find('.dropdown-content').animate({scrollTop:to_animate-300});
            });
            var timeoutId;
            $('form input, form textarea').on('input propertychange change', function() {

                var frm = $(this).parents('form');
               console.log(frm.attr('id'));
            //     return false;
                clearTimeout(timeoutId);
                timeoutId = setTimeout(function() {
                    // Runs 1 second (1000 ms) after the last change
                    //$(".progress").show();
                    $(".ajax-loading").hide();
                    frm.ajaxForm(function(response){
                        $(".progress").hide();
                        $(".ajax-loading").show();
                        //  $("#patient_id").val(response);
                        setTimeout(function(){
                            $(".ajax-loading").hide();
                        },1500);
                    }).submit();

                }, 1000);
            });

            $("select[name=repeat]").on('change', function(){
                if($(this).val()=="custom"){
                    $("#repeat-occurence").modal('open');
                }
                var frm = $(this).parents('form');
                console.log(frm.attr('id'));
                //     return false;
                clearTimeout(timeoutId);
                timeoutId = setTimeout(function() {
                    // Runs 1 second (1000 ms) after the last change
                    //$(".progress").show();
                    $(".ajax-loading").hide();
                    frm.ajaxForm(function(response){
                        $(".progress").hide();
                        $(".ajax-loading").show();
                        //  $("#patient_id").val(response);
                        setTimeout(function(){
                            $(".ajax-loading").hide();
                        },1500);
                    }).submit();

                }, 1000);
            });

            $("select[name=repeat-option]").on('change', function(){
                if($(this).val()=="week"){
                    $("#week").show();
                }else{
                    $("#week").hide();
                }

                if($(this).val()=="month"){
                    $("#monthly").show();
                }else{
                    $("#monthly").hide();
                }
            });

            $( ".datepicker" ).datepicker();
            $(".input_start_time li").click(function () {
                var start_time = $(this).attr('value');
                var ths = $(this);
                $(this).parents('.input-field').find('input').val(start_time);
                $(this).parents('.input-field').find('input').focusin();
                $.ajax({
                    url: '/calculate/time',
                    data: {start_time: start_time, "_token": "{!! csrf_token() !!}"},
                    type: "post",
                    success: function (response) {

                        $('#booking-appointment select.end_time').material_select('destroy');
                        response = $.parseJSON(response);
                        ths.parents('.add-availability').find('input[name=end_time]').val(response[0].text);
                        ths.parents('.add-availability').find('input[name=end_time]').focusin();
                        var str = "";
                        $.each(response, function (i, v) {
                            str += '<li value="' + v.value + '"><a href="javascript:;"> ' + v.text + '</a></li>'
                        });

                        ths.parents('.add-availability').find('.input_end_time').html(str);
                        $(".input_end_time li").click(function () {
                            var end_time = $(this).attr('value');
                            $(this).parents('.input-field').find('input').val(end_time);

                        });
                    }
                });

                return false;
            });
            $("select.doctors").on('change', function () {
                var doctor_id = $(this).val();
                $(".preloader").addClass('active');
                $(".preloader").show();
                $.post("/availability/get_by_doctor", {
                    id: doctor_id,
                    "_token": "{!! csrf_token() !!}"
                }, function (response) {
                    $("#availability-response").html('');
                    $(".preloader").removeClass('active');
                    $(".preloader").hide();
                    var str = "";

                    response = $.parseJSON(response);
                    if (response) {
                        str = '<ul class="collection">';
                        $.each(response, function (i, v) {
                            str += '<li class="collection-item">';
                            str += ' <span class="title">' + v.day + '</span>';
                            str += ' <p><i class="material-icons">access_alarm</i> ' + v.slots + '</p>';
                            str += '</li>';
                        });
                        str += '</ul>';


                    }
                    $("#availability-response").html(str);
                });
            });

          /*  $(".save").click(function (e) {
                //  alert();
                $(".alert").hide();
                $validation = $("#form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {


                        doctors: {
                            required: true
                        },
                        start_time: {
                            required: true
                        },
                        end_time: {
                            required: true
                        },
                        day: {
                            required: true
                        },


                    },
                    // Error messages
                    messages: {
                        doctors: "Choose doctor",
                        start_time: "Start time is required ",
                        end_time: "End time is required ",
                        day: "Day is required ",
                        duration: "Duration is required ",

                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    // Class that wraps error message
                    errorClass: "help-block",
                    focusInvalid: true,
                    // Element that wraps error message
                    errorElement: 'div',
                    errorPlacement: function (error, element) {
                        var placement = $(element).data('error');
                        if (placement) {
                            $(placement).append(error)
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    success: function (helpBlock) {
                        if ($(helpBlock).closest(".form-group").hasClass('has-error')) {
                            $(helpBlock).closest(".form-group").removeClass("has-error").addClass("has-success");
                        }
                    }
                });

                if ($("#form").valid()) {

                    $("#form").ajaxForm(function (response) {
                        response = $.parseJSON(response);
                        if (response.type == "success") {

                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function () {
                                $('.success-message').fadeOut();

                                $("#availability-response").html('');

                                var str = "";

                                response = (response.data);
                                if (response) {
                                    str = '<ul class="collection">';
                                    $.each(response, function (i, v) {
                                        str += '<li class="collection-item">';
                                        str += ' <span class="title">' + v.day + '</span>';
                                        str += ' <p><i class="material-icons">access_alarm</i> ' + v.slots + '</p>';
                                        str += '</li>';
                                    });
                                    str += '</ul>';


                                }
                                $("#availability-response").html(str);

                                $("#form")[0].reset();

                            }, 2500);
                        } else {
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });*/
        })


    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection