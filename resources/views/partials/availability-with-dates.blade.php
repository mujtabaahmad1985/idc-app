@extends('layout.app')
@section('page-title') Availability : Setup @endsection
@section('css')
    {!! Html::style('public/material/css/jquery.timepicker.min.css') !!}
    <style>

    </style>
@endsection

@section('content')
    @php
        $dateTimeZone = new DateTimeZone("Asia/Singapore");
    $dateTime = new DateTime("now", $dateTimeZone);
    $offset = $dateTimeZone->getOffset($dateTime); //3600=1hr

    @endphp
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Availability</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>
            <div class="card-body">
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
                                                <div class="col-md-8">
                                                    <div class="card">

                                                        <div class="card-body doctor-section">
                                                            <form method="POST" action="/save/doctor/availbility" enctype="multipart/form-data">
                                                                <input type="hidden" name="doctor_id" value="{!! $doctor['doctor_id']  !!}" />
                                                                @csrf
                                                                @if(isset($doctor->users->availabilities) && $doctor->users->availabilities->count() > 0)
                                                                    @foreach($doctor->users->availabilities as $k=>$availability)
                                                                        <input type="hidden" name="id[]" value="{!! $availability->id  !!}" />
                                                                    <div class="row availabilty-setting">



                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                @if($k==0)
                                                                                <label>Location</label>
                                                                                @endif
                                                                                <select class="validate locations" required name="location[]">
                                                                                    <option value="" @if(empty($value['location'])) selected @endif>N/A</option>@foreach($locations as $location)`

                                                                                    <option value="{!! $location->id !!}" @if($location->id==$availability->location)) selected  @endif >{!! $location->name !!}</option>

                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                @if($k==0)
                                                                                <label>Available Date & Time:</label>
                                                                                @endif
                                                                                <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                                                                    <input type="text" class="form-control daterange-time" name="availabile_date_time[]" value="{!! \App\Helpers\CommonMethods::formatDate($availability->start_date).' '.date('H:i a',strtotime($availability->start_time)).' - '.\App\Helpers\CommonMethods::formatDate($availability->end_date).' '.date('H:i a',strtotime($availability->end_time)) !!}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                            @if($k==0)
                                                                                <label>Repeat:</label>
                                                                            @endif
                                                                            <select class="form-control bg-danger-400 border-danger-400" name="repeat_occurrence[]">
                                                                                <option value="no-repeat" @if($availability->repeat_occurrence == "no-repeat") selected  @endif>No Repeat</option>
                                                                                <option value="daily" @if($availability->repeat_occurrence == "daily") selected  @endif>Daily</option>
                                                                                <option value="same-week" @if($availability->repeat_occurrence == "same-week") selected  @endif>Weekly on same days</option>
                                                                                <option value="same-month" @if($availability->repeat_occurrence == "same-month") selected  @endif>Monthly on same date</option>
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="btn-group     @if($k==0)mt-4 @endif">
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

                                                                    <input type="hidden" name="doctor_id" value="{!! $doctor['doctor_id']  !!}" />
                                                                    @csrf
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Location</label>
                                                                            <select class="validate locations" required name="location[]">
                                                                                <option value="" @if(empty($value['location'])) selected @endif>N/A</option>@foreach($locations as $location)`

                                                                                <option value="{!! $location->id !!}" >{!! $location->name !!}</option>

                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Available Date & Time:</label>
                                                                            <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                                                                <input type="text" class="form-control daterange-time" name="availabile_date_time[]" value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                    <label>Repeat:</label>
                                                                    <select class="form-control bg-danger-400 border-danger-400" name="repeat_occurrence[]">
                                                                        <option value="no-repeat">No Repeat</option>
                                                                        <option value="daily">Daily</option>
                                                                        <option value="same-week">Weekly on same days</option>
                                                                        <option value="same-month">Monthly on same date</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                    <div class="col-md-2">
                                                                        <div class="btn-group mt-4">
                                                                            <a type="button" href="#!" class="btn btn-sm btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}">+</a>
                                                                            <a type="button" href="#!" class="btn btn-sm btn-danger delete-availability" data-availablity="">-</a>

                                                                        </div>
                                                                    </div>

                                                            </div>
                                                                    @endif
                                                        </form>
                                                                <a href="#!" class="btn btn-danger btn-sm save-availabilty">Save</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
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
            </div>
        </div>
    </div>

    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">
            <div class="ajax-loading white-text green">Saved.</div>
            <div class="row">
                <h4 class="header col s6"></h4>



            </div>


        </div>


    </section>
@endsection


@section('js')

    {!! Html::script('/public/js/jquery.form.js') !!}
    {!! Html::script('/public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}
    {!! Html::script('public/material/js/jquery.timepicker.min.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    <script>
        $(function(){

            $("body").on("click",'.save-availabilty',function () {
                var _form = $(this).parents('.doctor-section').find('form');
                console.log(_form);

                _form.ajaxForm(function(){

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

                step:5
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
                var clone = _this.clone();
                clone.find('.add-availability-btn').hide();
                clone.find('select.locations').removeClass('select2-hidden-accessible');
                clone.find('.select2').remove();
                clone.find('label').remove();
                clone.find('.mt-4').removeClass('mt-4');
                clone.find('.delete-availability').removeAttr('data-id');
                _this.after(clone);
                clone.find('select.locations').select2();
                $('.daterange-time').daterangepicker({
                    timePicker: true,
                    applyClass: 'bg-danger-600',
                    cancelClass: 'btn-light',
                    locale: {
                        format: 'DD.MM.YYYY h:mm a'
                    }
                });

            });

            /*$(".add-availability-btn").on('click', function () {
                // alert();
                var day = $(this).attr('data-day');
                var random_number = Math.floor((Math.random() * 1000) + 1);
                //alert(random_number);
                /!* $(this).parents('.add-availability').find('select[name=start_time]').select2('destroy');
                 $(this).parents('.add-availability').find('select[name=end_time]').select2('destroy');*!/
                $(this).parents('.add-availability').find('select[name=location]').select2('destroy');
                // alert('d');
                var clone = $(this).parents('.add-availability').clone().addClass(day).addClass('new');
                /!* $(this).parents('.add-availability').find('select[name=start_time]').select2();
                 $(this).parents('.add-availability').find('select[name=end_time]').select2();*!/
                $(this).parents('.add-availability').find('select[name=location]').select2();
                $(this).parents('.add-availability').find('.time').timepicker({
                    timeFormat : "H:i",
                    show2400: true,
                    scrollDefault: 'now',

                    step:5
                });
                //console.log($(this).parents('.add-availability').html()); return false;
                // console.log(clone.toString());return false;

                $(this).parents('.add-availability').after(clone);
                //return false;
                $('.add-availability.'+day).find('label').hide('');





                // $(this).parents('.add-availability').not(":first-child").find('.' + day).parents('.add-availability').addClass(day);
                $('.add-availability.new.'+day).not(":first-child").find('.' + day).parents('.add-availability').attr('data-availablity','');



                $('.add-availability.new.'+day).not(":first-child").find('.' + day).parents('.add-availability').find('.add-availability-btn').remove();
                $('.add-availability.new.'+day).not(":first-child").find('.' + day).parents('.add-availability').find('.mt-4').removeClass('mt-4').addClass('mt-2');

                $('.add-availability.new.'+day).find('select[name=start_time]').attr('id',"start_time"+random_number);
                $('.add-availability.'+day).find('select[name=start_time]').attr('data-activates',day+"_input_start_time"+random_number);

                $('.add-availability.new.'+day).find('select[name=end_time]').attr('id',"end_time"+random_number);
                $('.add-availability.'+day).find('select[name=end_time]').attr('data-activates',day+"_input_end_time"+random_number);

                $('.add-availability.new.'+day).find('.input_start_time').attr('id',day+"_input_start_time"+random_number);
                $('.add-availability.new.'+day).find('.input_end_time').attr('id',day+"_input_end_time"+random_number);
                //  return false;

                $('.add-availability.new.'+day).find('select[name=start_time]').select2({
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
                                // alert(id);
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
                            });
                            /!*$(".input_end_time li").click(function () {
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

                        });*!/
                        }
                    });
                });;

                $('.add-availability.new.'+day).find('select[name=end_time]').select2({
                    dropdownAutoWidth : 'true',

                });
                $('.add-availability.new.'+day).find('select[name=location]').select2({
                    dropdownAutoWidth : 'true',

                });
                $('.add-availability.new.'+day).removeClass('new');

                /!*$("input[name=start_time]").click(function () {
                 var ths = $(this);
                 if (to_animate == 0)
                 to_animate = (ths.parent().find('li.selected').offset().top);
                 ths.parent().find('.dropdown-content').animate({scrollTop: to_animate - 300});
                 });*!/
                /!* $(".add-availability-btn").click(function(){
                 // alert('d');
                 $(this).parents('.add-availability').after($(this).parents('.add-availability').clone());
                 });*!/


                $(".remove-availability-btn").click(function(){
                    var availability_id = $(this).attr('data-availablity');
                    var day = $(this).attr('data-day');
                    if( $(this).parents('.add-availability').hasClass(day))
                    {
                        $(this).parents('.add-availability').remove();
                    }else{
                        $(this).parents('.add-availability').find('input').val('');
                    }


                });

                $(".ui-timepicker-input").removeClass('ui-timepicker-input');

                $('.time').timepicker({
                    timeFormat : "H:i",
                    show2400: true,
                    scrollDefault: 'now',

                    step:5
                });

                $('.end_time').on('changeTime', function() {
                    var ths = $(this);
                    var end_time = $(this).val();

                    var doctor_id = ths.parents('.add-availability').attr('data-doctor');
                    var day = ths.parents('.add-availability').attr('data-day');
                    var id = ths.parents('.add-availability').attr('data-availablity');
                    // alert(id);
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

            });*/


        })
    </script>
@endsection