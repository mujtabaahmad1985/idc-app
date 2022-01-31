
<div class="row">
    <form class="col s12" id="slide-block-form" action="/appointment/block-time" method="post" enctype="multipart/form-data">
        <input type="hidden" name="booking_type" id="booking_type" value="block_time" />
        {{ csrf_field() }}


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
    }
// echo "<pre>"; print_r($time_slots); echo "</pre>";
        @endphp


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Start Time</label>
                    <input type="text" id="start_time"  autocomplete="off" name="start_time" required class="time start_time  form-control input-sm check-availability" value=""  placeholder="hh:mm">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>End Time</label>
                    <input type="text" id="end_time" name="end_time"  autocomplete="off"  required="" class="time  end_time  form-control input-sm  check-availability" value=""  placeholder="hh:mm">
                    <div class="errorTxt4 error is_end_time_changed" style="left:0 !important;"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Start Date</label>
                    <input id="block_date" name="block_date" type="text" value="{{ date('d.m.Y') }}"  required="" class="form-control datepicker">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>End Date</label>
                    <input id="block_end_date" name="block_end_date" type="text" value="{{ date('d.m.Y') }}" required  class="datepicker form-control">
                    <div class="errorTxt4 error is_end_time_changed" style="left:0 !important;"></div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Locations</label>
                    <select class="locations select2" name="location_id[]" multiple="multiple" required data-error=".errorTxt3">
                        <option value="" disabled>Choose Location</option>
                        <option value="-1">All Location</option>

                        @if(isset($locations) && count($locations) > 0)
                            @foreach($locations as $location)
                                <option value="{!! $location->id !!}">{!! $location->name !!}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Rooms</label>
                    <select class="" name="room_id[]" id="room_id" multiple="multiple" required data-error=".errorTxt5">
                        <option value="0" disabled>Choose Rooms</option>
                        <option value="-1">All Rooms</option>
                        @if(isset($rooms) && count($rooms) > 0)
                            @foreach($rooms as $room)
                                <option value="{!! $room->id !!}">{!! $room->name !!}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Staff</label>
                    <select class="doctors_staff" name="doctor_id[]" multiple="multiple" required  data-error=".errorTxt4">
                        <option value="" disabled="">Choose Staff</option>
                        <option value="-1">All Staff</option>
                        @if(isset($doctors) && count($doctors) > 0)
                            @foreach($doctors as $doctor)
                                <option value="{!! $doctor->id !!}">{!! $doctor->fname.' '.$doctor->lname !!}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Notes</label>
                    <textarea id="textarea2" name="notes" class="form-control" length="120"></textarea>
                </div>
            </div>


        </div>

        <div class="row">

            <div class="col-sm-12">
                <div class="form-group">

                    <button class="btn btn-danger save-block-time" style="width:100%;">Block Time</button>
                </div>

            </div>

        </div>


        <div class="row">

            <div class="col-md-12">
                <div class="alert bg-success text-white alert-success-block-time">

                    <p></p>
                </div>
            </div>

        </div>
    </form>
</div>


<script>
    $(function(){

        $('.start_time').timepicker({
            timeFormat : "H:i",
            show2400: true,
            scrollDefault: 'now',
            'step': 5
        });  //static mask
        $('.end_time').timepicker({
            timeFormat : "H:i",
            show2400: true,
            scrollDefault: 'now',
            'step': 5
        });

        $("#room_id").select2().on('change',function(){
            var val = $(this).val();
            if(val=="-1"){

                $("select#room_id option > option").prop("selected","selected");// Select All Options
                $("select#room_id option").trigger("change");// Trigger change to select 2
            }
            else
            {

            }
        });
        $(".doctors_staff").select2().on('change',function(){
            var val = $(this).val();
            if(val=="-1"){

                $(".doctors_staff option > option").prop("selected","selected");// Select All Options
                $(".doctors_staff option").trigger("change");// Trigger change to select 2

            }
            else
            {

            }
        });
        $(".locations").select2().on('change',function(){
            var val = $(this).val();
            if(val=="-1"){

                $(".locations option > option").prop("selected","selected");// Select All Options
                $(".locations option").trigger("change");// Trigger change to select 2
            }
            else
            {

            }
        });
        $( ".datepicker" ).datepicker({ dateFormat: 'dd.mm.yy', minDate:0,
            onSelect: function(dateText, inst) {
                var input_target = inst.input[0].name;
                if(input_target=="block_date")
                $("input#block_end_date").datepicker('option', 'minDate', dateText);
            }});
        $("input[name=start_time]").focusout(function(){
            var its_time = $(this).val();

            //#9e9e9e
            if (its_time.indexOf(':') == -1) {
                // will not be triggered because str has _..
                var a = its_time.split('');
                var t = a[0]+a[1]+":"+a[2]+a[3];
                if (!/^\d{2}:\d{2}$/.test(t)) return false;
                var parts = t.split(':');
                //  alert(parts);
                if (parts[0] > 23 || parts[1] > 59) {
                    $(this).val('');
                    $(this).css({"border-bottom":"1px solid #e53935"});
                    return false;
                }
                $(this).css({"border-bottom":"1px solid #9e9e9e"});
                $(this).val(t);
            }
        });
        $("#block_end_date").focusin();
        $("#start_time_block_time").dropdown();
        $("#end_time_block_time").dropdown();



        $(".close-block-panel").click(function(){
            $("#block-time").animate({right:'-360px'});
        });
//mt needed now
        $(".input_start_time_block_time li").click(function(){
            var start_time = $(this).attr('value');
            $(this).parents('.input-field').find('input').val(start_time);

            $.ajax({
                url:'/calculate/time',
                data:{start_time:start_time,"_token":"{!! csrf_token() !!}"},
                type:"post",
                success:function(response){


                    response = $.parseJSON(response);
                    $('input[name=end_time]').val(response[0].text);
                    $('input[name=end_time]').focusin();
                    var str = "";
                    $.each(response, function(i,v){
                        str+='<li value="'+v.value+'"><a href="javascript:;"> '+v.text+'</a></li>'
                    });

                    $('#input_end_time_block_time').html(str);
                    $("#input_end_time_block_time li").click(function(){
                        var end_time = $(this).attr('value');
                        $(this).parents('.input-field').find('input').val(end_time);

                    });
                }
            });

            return false;
        });

        $("#start_time_block_time").focusout(function(){
            var start_time = $(this).val();
            $(this).parents('.input-field').find('input').val(start_time);
            $.ajax({
                url:'/calculate/time',
                data:{start_time:start_time,"_token":"{!! csrf_token() !!}"},
                type:"post",
                success:function(response){

//                    $('#booking-appointment .end_time').material_select('destroy');
                    response = $.parseJSON(response);
                    $('input[name=end_time]').val(response[0].text);
                    $('input[name=end_time]').focusin();
                    var str = "";
                    $.each(response, function(i,v){
                        str+='<li value="'+v.value+'"><a href="javascript:;"> '+v.text+'</a></li>'
                    });

                    $('#input_end_time').html(str);
                    $("#input_end_time li").click(function(){
                        var end_time = $(this).attr('value');
                        $(this).parents('.input-field').find('input').val(end_time);

                    });
                }
            });

            return false;
        });
    })
</script>