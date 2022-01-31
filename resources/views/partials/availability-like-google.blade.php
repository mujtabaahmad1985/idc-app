@extends('layout.app')
@section('page-title') Availability : Setup @endsection
@section('css')
    {!! Html::style('public/material/css/jquery.timepicker.min.css') !!}
    <style>
        .custom-days .btn-primary{ background-color: #e2e3e3 !important; color: #000 !important;}
        .custom-days .btn-primary.active{ background-color: #f44336 !important; color: #FFF !important;}
        .form-control{
            padding: 5px;
            height: auto;
            line-height: 10px;
        }
        .select2-selection--single{ padding: 5px; line-height: 16px}
        .btn-group-sm>.btn, .btn-sm{ padding: 3px 10px}
    </style>
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Doctor Availability</span> - List</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="/new/doctor" class="btn btn-link btn-float text-body"><i class="icon-users text-primary"></i> <span>Add Doctor</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="#" class="breadcrumb-item">Setup</a>
                    <span class="breadcrumb-item active">Availability</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    @php
        $dateTimeZone = new DateTimeZone("Asia/Singapore");
    $dateTime = new DateTime("now", $dateTimeZone);
    $offset = $dateTimeZone->getOffset($dateTime); //3600=1hr

    @endphp
    <div class="content">

                <div class="row ">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div id="accordion-default">
                            @foreach($doctors as $doctor)
                                <div class="card show-availability">
                                    <div class="card-header">
                                        <h6 class="card-title">
                                            <a data-toggle="collapse" class="text-default" href="#doctor{!! $doctor->id !!}" data-doctor-id="{!! $doctor->id !!}">Dr. {{$doctor->fname.' '.$doctor->lname}}</a>
                                        </h6>
                                    </div>

                                    <div id="doctor{!! $doctor->id !!}" class="collapse @if(Auth::User()->role=='doctor') show @endif" data-parent="#accordion-default">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="card main-section">

                                                        <div class="card-body doctor-section">
                                                            <form id="form-{!! $doctor->id !!}" method="POST" action="/save/doctor/availbility" enctype="multipart/form-data">
                                                                <input type="hidden" name="doctor_id" value="{!! $doctor['doctor_id']  !!}" />
                                                                @csrf
                                                                @if(isset($doctor->users->availabilities) && $doctor->users->availabilities->count() > 0)
                                                                    @foreach($doctor->users->availabilities as $k=>$availability)
                                                                        <input type="hidden" name="id[]" value="{!! $availability->id  !!}" />
                                                                    <div class="row availabilty-setting">



                                                                        <div class="col-md-2">
                                                                            <div class="form-group">

                                                                                <select class="validate locations" required name="location[]">
                                                                                    <option value="" @if(empty($value['location'])) selected @endif>N/A</option>
                                                                                    @if(isset($locations) && $locations->count() > 0)
                                                                                    @foreach($locations as $location)`

                                                                                    <option value="{!! $location->id !!}" @if($location->id==$availability->location)) selected  @endif >{!! $location->name !!}</option>

                                                                                    @endforeach
                                                                                        @endif
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <input type="text" id="start_date{!! $availability->id  !!}" class="form-control date start_date" value="{!! \App\Helpers\CommonMethods::formatDate($availability->start_date) !!}" readonly  name="start_date[]"/>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control time" name="start_time[]" required value="{!! $availability->start_time !!}" />

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1" style="padding: 10px 0;width: auto !important;max-width: initial;flex: 0;">To</div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <input type="text"  class="form-control time" name="end_time[]" required value="{!! $availability->end_time !!}" />

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control date end_date"  id="enddate{!! $availability->id  !!}" value="{!! \App\Helpers\CommonMethods::formatDate($availability->end_date) !!}" readonly name="end_date[]" />

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">

                                                                            <select class="form-control bg-danger-400 border-danger-400 repeat_occurrence" data-index="{!! $k !!}" data-id="{!! $availability->id !!}" name="repeat_occurrence[]">
                                                                                <option value="no-repeat" @if($availability->repeat_occurrence == "no-repeat") selected  @endif>No Repeat</option>
                                                                                <option value="daily" @if($availability->repeat_occurrence == "daily") selected  @endif>Daily</option>{{--
                                                                                <option value="weekly" @if($availability->repeat_occurrence == "weekly") selected  @endif>Weekly</option>--}}
                                                                                <option value="mon-fri" @if($availability->repeat_occurrence == "mon-fri") selected  @endif>Monday to Friday</option>
                                                                                <option value="custom-repeat" @if($availability->repeat_occurrence == "custom-repeat") selected  @endif>Custom Repeat</option>
                                                                                 </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="btn-group ">
                                                                                @if($k==0)
                                                                                <a type="button" href="#!" class="btn btn-sm btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}">+</a>
                                                                               @endif
                                                                                <a type="button" href="#!" class="btn btn-sm btn-danger delete-availability" data-id="{!! $availability->id !!}">-</a>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    @endforeach
                                                                    @else
                                                            <div class="row availabilty-setting">






                                                                <div class="col-md-2">
                                                                    <div class="form-group">

                                                                        <select class="validate locations" required name="location[]">
                                                                            <option value="">N/A</option>
                                                                            @if(isset($locations) && $locations->count() > 0)
                                                                            @foreach($locations as $location)

                                                                            <option value="{!! $location->id !!}"  >{!! $location->name !!}</option>

                                                                            @endforeach
                                                                                @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <input type="text" id="start_date" class="form-control date start_date" value="{!! \App\Helpers\CommonMethods::formatDate() !!}" readonly  name="start_date[]"/>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control time" name="start_time[]" required />

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1" style="padding: 10px 0;width: auto !important;max-width: initial;flex: 0;">To</div>
                                                                <div class="col-md-1">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control time" name="end_time[]" required />

                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control date end_date"  id="end_date" value="{!! \App\Helpers\CommonMethods::formatDate() !!}" readonly name="end_date[]" />

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">

                                                                        <select class="form-control bg-danger-400 border-danger-400 repeat_occurrence" data-index="0" name="repeat_occurrence[]">
                                                                            <option value="no-repeat">No Repeat</option>
                                                                            <option value="daily">Daily</option>{{--
                                                                                <option value="weekly" @if($availability->repeat_occurrence == "weekly") selected  @endif>Weekly</option>--}}
                                                                            <option value="mon-fri">Monday to Friday</option>
                                                                            <option value="custom-repeat">Custom Repeat</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <div class="btn-group ">

                                                                            <a type="button" href="#!" class="btn btn-sm btn-danger add-availability-btn" data-doctor-id="">+</a>

                                                                        <a type="button" href="#!" class="btn btn-sm btn-danger delete-availability" data-id="">-</a>

                                                                    </div>
                                                                </div>

                                                            </div>


                                                                    @endif
                                                        </form>


                                                        </div>
                                                        <div class="card-footer">
                                                            <a href="#!" class="btn btn-danger btn-sm save-availabilty" data-doctor-id="{!! $doctor->id !!}">Save</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card holidays">

                                                        <div class="card-body">
                                                            <div class="row"> <h4 class="heading left">Holidays And Unavailable Times</h4>
                                                                <a href="javascript:;" class="right m-top-10"> <span
                                                                            class="badge badge-danger ml-1 mt-1  light-blue darken-4 white-text add-holiday-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                                                            availability_id=""
                                                                            data-day="monday">+</span> </a></div>


                                                            <div class="row holidays-clone" style="display: none">
                                                                <div class="col-sm-6 input-field ">

                                                                    <input id="from_date{!! $doctor['doctor_id'] !!}" name="from_date" type="text" value="{{ date('d.m.Y') }}"  class="datepicker">

                                                                </div>
                                                                <div class="col-sm-6 input-field  ">

                                                                    <input id="to_date{!! $doctor['doctor_id'] !!}" name="to_date" type="text" value="{{ date('d.m.Y') }}"  class="datepicker">

                                                                </div>
                                                                <div class="col s2  no-padding">
                                                                    <a href="javascript:;" class="remove-holiday-btn" availability_id=""> <span
                                                                                class="badge badge-danger mt-1  light-blue darken-4 white-text   "

                                                                        >-</span> </a>
                                                                </div>
                                                            </div>

                                                            <div class="show-holiday">
                                                                @if(isset($doctor['availability']['holiday']) && !empty($doctor['availability']['holiday']))
                                                                    @foreach($doctor['availability']['holiday'] as $value)
                                                                        <div class="row"  availability_id="{!! $value['availability_id'] !!}">
                                                                            <div class="col-sm-6 input-field ">

                                                                                <input id="from_date{!! $value['availability_id'] !!}" name="from_date" type="text" value="{{ date('d.m.Y', strtotime($value['start_date'])) }}"  class="datepicker form-control">

                                                                            </div>
                                                                            <div class="col-sm-6 input-field  ">

                                                                                <input id="to_date{!! $value['availability_id'] !!}" name="to_date" type="text" value="{{  date('d.m.Y', strtotime($value['end_date'])) }}"  class="datepicker form-control">

                                                                            </div>
                                                                            <div class="col s2  no-padding">
                                                                                <a href="javascript:;" class="right m-top-10 remove-holiday-btn" availability_id="{!! $value['availability_id'] !!}"> <span
                                                                                            class="badge orange darken-4 white-text"

                                                                                    >-</span> </a>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>



        <div id="custom-date-modal" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Custom Date</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <form id="custom-date-form">

<input type="hidden" name="availability_id" id="availability_id" />
                            <div class="row">
                                <div class="col-sm-4">
                                    Repeat every:
                                    <input type="number" min="1" value="1" name="time_repeat" class="form-control input-sm" />
                                </div>
                                <div class="col-sm-4">
                                    <label></label>
                                    <select name="type_time_repeat" class="form-control input-sm">
                                        <option value="day">Day</option>
                                        <option value="week" selected>Week</option>
                                        <option value="month">Month</option>
                                        <option value="year">Year</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 custom-days">
                                    Repeat On:
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary ">
                                            <input type="checkbox" name="options" value="mon" autocomplete="off"> Mon
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="options" value="tue" autocomplete="off"> Tue
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="options" value="wed" autocomplete="off" > Wed
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="options" value="thu" autocomplete="off" > Thu
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="options" value="fri" autocomplete="off" > Fri
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="options" value="sat" autocomplete="off" > Sat
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="options" value="sun" autocomplete="off" > Sun
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="form-group col-md-12">
                                    <label>Ends: </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" name="custom_end" checked value="never-end" class="form-check-input-styled-warning" data-fouc>
                                                    Never End
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" name="custom_end"  value="custom_end_date" class="form-check-input-styled-info" data-fouc>
                                                    On
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control custom-date" name="end_repeat_date" value="{!! \App\Helpers\CommonMethods::formatDate() !!}">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </form>




                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary done-custom-date">Done</button>
                    </div>


                </div>
            </div>
        </div>

    </div>


@endsection


@section('js')

    {!! Html::script('/public/js/jquery.form.js') !!}
    {!! Html::script('/public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}
    {!! Html::script('public/material/js/jquery.timepicker.min.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    <script>
        $(function(){
            var _setting_section = null;
            var custom_select_index = 0;

            $('.form-check-input-styled-warning').uniform({
                wrapperClass: 'border-warning-600 text-warning-800'
            });

            // Info
            $('.form-check-input-styled-info').uniform({
                wrapperClass: 'border-info-600 text-info-800'
            });

            // Custom color
            $('.form-check-input-styled-custom').uniform({
                wrapperClass: 'border-indigo-600 text-indigo-800'
            });
            $("body").on('change','.repeat_occurrence',function () {
                var id = $(this).data('id');
                _setting_section = $(this).parents('.availabilty-setting');
                var index = $(this).attr('data-index');
               custom_select_index = index;


                if($(this).val()=="custom-repeat"){
                    $("#availability_id").val(id);
                    $("#custom-date-modal").modal();
                }
            });

            $("body").on('click','.done-custom-date',function(){
                var data = $("#custom-date-form").serializeArray();
                _setting_section.find('.custom-dates').remove();
                _setting_section.append("<input type='hidden' class='custom-dates' name='custom_dates["+custom_select_index+"]' value='"+JSON.stringify(data)+"' />");
                $("#custom-date-modal").modal('hide');
                $("#custom-date-form").resetForm();
                $(".custom-days .active").removeClass('active');
            });

            $("body").on("click",'.save-availabilty',function () {
                var _form = $(this).parents('.main-section .doctor-section').find('form');
                var doctor_id = $(this).attr('data-doctor-id');
                console.log(_form);

                $("#form-"+doctor_id).ajaxForm(function(){

                }).submit();
            });

            $("body").on("click",'.delete-availability',function () {

                var _doctor_section = $(this).parents('.doctor-section').find('.availabilty-setting').length;
                var _id = $(this).data('id');
                var _parent = $(this).parents('.availabilty-setting')
                if(_id){
                    $.ajax({
                        url:"/availability/delete/"+_id,
                        success:function(){
                            if(_doctor_section > 1)
                            _parent.remove();
                        }
                    });
                }

                else{
                    if(_doctor_section > 1)
                        _parent.remove();
                }


            });

            $('.custom-date').datepicker({ dateFormat: 'dd.mm.yy'});
            $('.date').datepicker({ dateFormat: 'dd.mm.yy',
                minDate:0,
                onSelect: function(dateText, inst) {

                    var start_date = $(this).parents('.availabilty-setting').find('.start_date').val();
                    var end_date = $(this).parents('.availabilty-setting').find('.end_date').val();

                    var start_date = $(this).parents('.availabilty-setting').find('.start_date').val();
                    var end_date =  $(this).parents('.availabilty-setting').find('.end_date').val();



                    var d = start_date.split('.');

                    var f = new Date(d[2]+"-"+d[1]+"-"+d[0]);
                    d = end_date.split('.');
                    var e = new Date(d[2]+"-"+d[1]+"-"+d[0]);

                    if(f > e){

                        $(this).parents('.availabilty-setting').find('.end_date').val(start_date);
                        return false;
                    }

                }
            });

            $('.daterange-time').daterangepicker({
                timePicker: true,
                applyClass: 'bg-danger-600',
                cancelClass: 'btn-light',
                locale: {
                    format: 'DD.MM.YYYY h:mm a'
                }
            });
            /*$("select[name=location]").select2({
                dropdownAutoWidth : 'true',
                width: 'auto'
            });*/

            /*  $(".datepicker").focusout(function(){
                  // alert($(this).val());
                  $(this).datepicker("setDate",new Date($(this).val()));
              });*/
            $('.time').timepicker({
                timeFormat : "H:i",
                show2400: true,
                scrollDefault: 'now',

                step:30
            });
            $("select[name=start_time]").select2({
                dropdownAutoWidth : 'true',

            }).change(function(){
                var start_time = $(this).val();
                var ths = $(this);
                $.ajax({
                    url: '/calculate/time',
                    data: {start_time: start_time, "_token": "{!! csrf_token() !!}"},
                    type: "post",
                    success: function (response) {
                        ths.parents('.add-availability').find("select[name=end_time]").select2('destroy');
                        ths.parents('.add-availability').find('select[name=end_time]').html('');

                        response = $.parseJSON(response);


                        var str = "";
                        $.each(response, function (i, v) {
                            str += '<option value="' + v.value + '">' + v.text + '</option>'
                        });

                        ths.parents('.add-availability').find('select[name=end_time]').html(str);
                        ths.parents('.add-availability').find("select[name=end_time]").select2({
                            dropdownAutoWidth : 'true',

                        }).change(function(){
                            var ths = $(this);
                            var end_time = $(this).val();

                            var doctor_id = ths.parents('.add-availability').attr('data-doctor');
                            var day = ths.parents('.add-availability').attr('data-day');
                            var id = ths.parents('.add-availability').attr('data-availablity');
                            var start_time = ths.parents('.add-availability').find('select[name=start_time]').val();
                            var location = ths.parents('.add-availability').find('select[name=location]').val();
                            //  alert(location);
                            //  alert(end_time);
                            //alert(day);

                            $(".ajax-loading").show();
                            $.ajax({
                                url:"/save/availabilty",
                                data:{location:location,start_time:start_time,end_time:end_time,id:id,"_token": "{!! csrf_token() !!}",day:day,doctor_id:doctor_id},
                                type:"POST",
                                success:function(response){
                                    ths.parents('.add-availability').attr('data-availablity',response);
                                    $(".ajax-loading").hide();
                                }
                            });
                        });
                        /*$(".input_end_time li").click(function () {
                            var end_time = $(this).attr('value');
                            // alert(end_time);
                            $(this).parents('.input-field').find('input').val(end_time);
                            var doctor_id = ths.parents('.add-availability').attr('data-doctor');
                            var day = ths.parents('.add-availability').attr('data-day');
                            var id = ths.parents('.add-availability').attr('data-availablity');
                            //alert(day);
                            $(".ajax-loading").show();
                            $.ajax({
                                url:"/save/availabilty",
                                data:{start_time:start_time,end_time:end_time,id:id,"_token": "{!! csrf_token() !!}",day:day,doctor_id:doctor_id},
                            type:"POST",
                            success:function(response){
                                $(".ajax-loading").hide();
                                if(id=="")
                                    ths.parents('.add-availability').attr('data-availablity',response);
                            }
                        });

                    });*/
                    }
                });
            });
            $('.end_time').on('changeTime', function() {
                var ths = $(this);
                var end_time = $(this).val();

                var doctor_id = ths.parents('.add-availability').attr('data-doctor');
                var day = ths.parents('.add-availability').attr('data-day');
                var id = ths.parents('.add-availability').attr('data-availablity');

                var start_time = ths.parents('.add-availability').find('input[name=start_time]').val();
                var location = ths.parents('.add-availability').find('select[name=location]').val();
                //  alert(end_time);
                //alert(day);
                $(".ajax-loading").show();
                $.ajax({
                    url:"/save/availabilty",
                    data:{location:location,start_time:start_time,end_time:end_time,id:id,"_token": "{!! csrf_token() !!}",day:day,doctor_id:doctor_id},
                    type:"POST",
                    success:function(response){
                        ths.parents('.add-availability').attr('data-availablity',response);
                        $(".ajax-loading").hide();
                    }
                });
            });
            $("select[name=end_time]").select2({
                dropdownAutoWidth : 'true',

            }).change(function(){
                var ths = $(this);
                var end_time = $(this).val();

                var doctor_id = ths.parents('.add-availability').attr('data-doctor');
                var day = ths.parents('.add-availability').attr('data-day');
                var id = ths.parents('.add-availability').attr('data-availablity');
                if(!id || id=="") return false;
                var start_time = ths.parents('.add-availability').find('select[name=start_time]').val();
                var location = ths.parents('.add-availability').find('select[name=location]').val();
                //  alert(end_time);
                //alert(day);
                $(".ajax-loading").show();
                $.ajax({
                    url:"/save/availabilty",
                    data:{location:location,start_time:start_time,end_time:end_time,id:id,"_token": "{!! csrf_token() !!}",day:day,doctor_id:doctor_id},
                    type:"POST",
                    success:function(response){
                        ths.parents('.add-availability').attr('data-availablity',response);
                        $(".ajax-loading").hide();
                    }
                });
            });;
            $(".locations").select2({
                dropdownAutoWidth : 'true',

            }).change(function(){
                var ths = $(this);
                var location = $(this).val();

                var doctor_id = ths.parents('.add-availability').attr('data-doctor');
                var day = ths.parents('.add-availability').attr('data-day');
                var id = ths.parents('.add-availability').attr('data-availablity');
                if(!id || id=="") return false;
                var start_time = ths.parents('.add-availability').find('select[name=start_time]').val();
                var end_time = ths.parents('.add-availability').find('select[name=end_time]').val();
                //  alert(end_time);
                //alert(day);
                $(".ajax-loading").show();
                $.ajax({
                    url:"/save/availabilty",
                    data:{location:location,start_time:start_time,end_time:end_time,id:id,"_token": "{!! csrf_token() !!}",day:day,doctor_id:doctor_id},
                    type:"POST",
                    success:function(response){
                        ths.parents('.add-availability').attr('data-availablity',response);
                        $(".ajax-loading").hide();
                    }
                });
            });;
            $(".remove-holiday-btn").click(function(){
                var availability_id = $(this).attr('availability_id');
                var ths = $(this);


                $.ajax({
                    url:'/holidays/delete/'+availability_id,
                    success:function(){
                        ths.parent().parent().remove();
                    }
                });
            });
            $( ".datepicker" ).datepicker({ dateFormat: 'dd.mm.yy',
                onSelect: function(dateText, inst) {
                    // var from_date = $(this).val();
                    //  alert()
                    var input_target = inst.input[0].name;

                    var from_date = $(this).parent().parent().find('input[name=from_date]').val();
                    var end_date = $(this).parent().parent().find('input[name=to_date]').val();
                    var availability_id = $(this).parent().parent().attr('availability_id');
                    var d = from_date.split('.');

                    var f = new Date(d[2]+"-"+d[1]+"-"+d[0]);
                    d = end_date.split('.');
                    var e = new Date(d[2]+"-"+d[1]+"-"+d[0]);
                    // alert(f+":"+":"+from_date+":"+e+":"+end_date);
                    if(f > e){
                        $(this).parent().parent().find('input[name=to_date]').val(from_date);
                        return false;
                    }

//alert(availability_id); return false;
                    if(end_date!=""){
                        $(".ajax-loading").show();
                        $.ajax({
                            url:"/save/holidays",
                            type:"POST",
                            data:{from_date:from_date,end_date:end_date,"_token": "{!! csrf_token() !!}",id:availability_id},
                            success:function(response){

                                $(".ajax-loading").hide();
                            }
                        });
                    }
                }});
            var to_animate = 0;
            $(".remove-availability-btn").click(function(){
                var availability_id = $(this).attr('data-availablity');
                var day = $(this).attr('data-day');
                if( $(this).parents('.add-availability').hasClass(day))
                {
                    $(this).parents('.add-availability').remove();
                }else{
                    $(this).parents('.add-availability').find('input').val('');
                }
                $(".ajax-loading").show();
                $.ajax({
                    url:"/availability/delete/"+availability_id,
                    success:function(){
                        $(".ajax-loading").hide();
                    }
                });
            });

            $(".add-holiday-btn").click(function(){
                var random_number = Math.floor((Math.random() * 1000) + 1);
                var clone = $(this).parents('.holidays').find(".holidays-clone").clone().removeAttr('style');;
                var doctor_id = $(this).attr('data-doctor-id');



                clone =  clone.removeClass('holidays-clone');
                clone.find('input[name=from_date]').attr('id','from_date'+random_number);
                clone.find('input[name=to_date]').attr('id','to_date'+random_number);
                //console.log(clone);
                //clone = clone.find('input[name=from_date]').attr('id','from_date'+random_number);
                $(this).parent().parent().parent().find(".show-holiday").append(clone);
                //$(".show-holiday").find('.hasDatepicker').attr('id',);
                $(this).parent().parent().parent().find(".show-holiday").find('.hasDatepicker').removeClass('hasDatepicker').addClass('form-control');

                $( ".datepicker" ).datepicker({ dateFormat: 'dd.mm.yy',
                    onSelect: function(dateText, inst) {
                        // var from_date = $(this).val();

                        var input_target = inst.input[0].name;

                        var from_date = $(this).parent().parent().find('input[name=from_date]').val();
                        //   alert(from_date);
                        var end_date = $(this).parent().parent().find('input[name=to_date]').val();
                        var availability_id = $(this).parent().parent().attr('availability_id');
                        var ths =  $(this).parent().parent();
                        var d = from_date.split('.');

                        var f = new Date(d[2]+"-"+d[1]+"-"+d[0]);
                        d = end_date.split('.');
                        var e = new Date(d[2]+"-"+d[1]+"-"+d[0]);
                        // alert(f+":"+":"+from_date+":"+e+":"+end_date);
                        if(f > e){
                            $(this).parent().parent().find('input[name=to_date]').val(from_date);
                            return false;
                        }

//alert(availability_id); return false;
                        if(end_date!=""){
                            $(".ajax-loading").show();
                            //return false;
                            $.ajax({
                                url:"/save/holidays",
                                type:"POST",
                                data:{from_date:from_date,end_date:end_date,doctor_id:doctor_id,"_token": "{!! csrf_token() !!}",id:availability_id},
                                success:function(response){
                                    console.log(ths.parent().parent());
                                    //  ths.remove();
                                    ths.find('.remove-holiday-btn').attr('availability_id', response);
                                    ths.attr('availability_id', response);
                                    //  ths.find('.remove-holiday-btn').remove();
                                    $(".ajax-loading").hide();
                                    $(".remove-holiday-btn").click(function(){
                                        var availability_id = $(this).attr('availability_id');
                                        var ths = $(this);


                                        $.ajax({
                                            url:'/holidays/delete/'+availability_id,
                                            success:function(){
                                                ths.parent().parent().remove();
                                            }
                                        });
                                    });
                                }
                            });
                        }
                    }});
                $(".remove-holiday-btn").click(function(){
                    $(this).parent().parent().remove();
                });
            });

            $(".add-availability-btn").click(function(){
                var _this = $(this).parents('.availabilty-setting');
                var random_number = Math.floor((Math.random() * 1000) + 1);
                var clone = _this.clone();
                clone.find('.add-availability-btn').hide();
                clone.find('select.locations').removeClass('select2-hidden-accessible');
                clone.find('.select2').remove();
                clone.find('label').remove();
                clone.find('.mt-4').removeClass('mt-4');
                clone.find('.delete-availability').removeAttr('data-id');
                var last_index =   clone.find('.repeat_occurrence').data('index');
                console.log(last_index);
                clone.find('.repeat_occurrence').attr('data-index',last_index+1);
                _this.parents('.doctor-section form').append(clone);
                clone.find('select.locations').select2();
                clone.find('.hasDatepicker').removeClass('hasDatepicker');
                clone.find('.start_date').attr('id','start_date'+random_number);
                clone.find('.end_date').attr('id','end_date'+random_number);

                _this.parents('.doctor-section').find('select.repeat_occurrence').each(function (i,v) {
                    console.log(i);
                $(this).attr('data-index',i);
                });

                $('.date').datepicker({ dateFormat: 'dd.mm.yy',
                    minDate:0,
                    onSelect: function(dateText, inst) {

                        var start_date = _this.find('.start_date').val();
                        var end_date = _this.find('.end_date').val();



                        var d = start_date.split('.');

                        var f = new Date(d[2]+"-"+d[1]+"-"+d[0]);
                        d = end_date.split('.');
                        var e = new Date(d[2]+"-"+d[1]+"-"+d[0]);

                        if(f > e){
                          //  alert();
                            clone.find('.end_date').val(start_date);
                            return false;
                        }

                    }
                });

                clone.find('.time').timepicker({
                    timeFormat : "H:i",
                    show2400: true,
                    scrollDefault: 'now',

                    step:30
                });

            });




        })
    </script>
@endsection