<style>
    .select2-container--default .select2-selection--single{ background: none; border-color: #9e9e9e !important}
    .time-slots .select2{
        width: 125px !important;
        float: right;
        margin-bottom: 10px;
        font-size: 0.8rem;
        top: -4px;
        left: 16px;

    }
    .time-slots._2nd .select2{
        width: 146px !important;
        float: none;
        left:0 !important;
        margin-bottom:10px
    }
</style>
<div class="row">
    <div class="col s12">
        <a href="javascript:;" class="close-block-panel"><i class="material-icons">close</i></a>
    </div>
</div>
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
            <div class="input-field col s6 time-slots">
                <i class="material-icons prefix">access_time</i>
                <select class="start_time validate" required name="start_time">

                        @foreach($time_slots as $slot)
                            <option value="{!! $slot !!}">{!! $slot !!}</option>
                        @endforeach

                </select>
                {{--<input id="start_time" type="text" name="start_time" class="timepicker validate">--}}

            </div>
            <div class="input-field col s6 time-slots _2nd no-padding">

                {{--  <select class="end_time validate" id="end_time" name="end_time"  data-error=".errorTxt3">
                      @foreach($time_slots as $slots)
                          @php
                              $start = new DateTime($slots);
                              $diff = $start->diff(new DateTime($time_slots[0]));
                          @endphp
                          <option value="{!! $slots !!}">{!! $slots !!} ({!! $diff->h.'.'.$diff->i.' hrs' !!})</option>
                      @endforeach
                  </select>--}}
                <select class="end_time validate" required name="end_time">
                    @foreach($time_slots as $slot)
                        <option value="{!! $slot !!}">{!! $slot !!}</option>
                    @endforeach

                </select>
                {{--<input id="end_time" type="text" name="end_time" class="timepicker validate">--}}

            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">access_time</i>
                <input id="block_date" name="block_date" type="text" value="{{ date('d.m.Y') }}"  class="datepicker">
                <label for="block_date" class="">Choose Start Date</label>
            </div>
            <div class="input-field col s6">

                <input id="block_end_date" name="block_end_date" type="text" value="{{ date('d.m.Y') }}"  class="datepicker">
                <label for="block_end_date" class="">Choose End Date</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">

                <select class="locations validate" name="location_id"  data-error=".errorTxt3">

                    <option value="" disabled selected>Choose Location</option>
                    @if(isset($locations) && count($locations) > 0)

                        @foreach($locations as $location)
                            <option value="{!! $location->id !!}">{!! $location->name !!}</option>
                        @endforeach
                    @endif
                </select>
                <div class="errorTxt3 error"></div>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s12">

                <select class="rooms" name="room_id" multiple data-error=".errorTxt5">

                    <option value="" disabled selected>Choose Rooms</option>
                    <option value="-1">All Rooms</option>
                    @if(isset($rooms) && count($rooms) > 0)

                        @foreach($rooms as $room)
                            <option value="{!! $room->id !!}">{!! $room->name !!}</option>
                        @endforeach
                    @endif
                </select>
                <div class="errorTxt5 error"></div>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s12">

                <select class="doctors_staff" name="doctor_id"  data-error=".errorTxt4">

                    <option value="" disabled="" selected>Choose Staff</option>
                    @if(isset($doctors) && count($doctors) > 0)

                        @foreach($doctors as $doctor)
                            <option value="{!! $doctor->id !!}">{!! $doctor->fname.' '.$doctor->lname !!}</option>
                        @endforeach
                    @endif
                </select>
                <div class="errorTxt4 error"></div>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="textarea2" name="notes" class="materialize-textarea" length="120"></textarea>
                <label for="textarea1" class="">Notes</label>
                <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span></div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <button class="btn waves-effect waves-light red save-block-time" style="width:100%; margin-bottom: 40px">Block Time</button>
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
    </form>
</div>


<script>
    $(function(){

        $(".rooms").on('change',function(){
            var val = $(this).val();
            if(val=="-1"){
                alert();
                $('.rooms option').prop('selected', true);
            }
        });

        $('select.start_time').material_select('destroy');
       $(' select.start_time').select2({
           //  placeholder: "Choose Start Time ",
           dropdownAutoWidth : 'true',

       }).on('change', function(){
           // is_end_date_changed = false;
           var start_time = $(this).val();
           var selected_date = $("input[name=appointment_date]").val();
           $.ajax({
               url:'/calculate/time',
               data:{start_time:start_time,"_token":"{!! csrf_token() !!}",doctor_id:doctor_id,selected_date:selected_date},
               type:"post",
               success:function(response){

                   $('select.end_time').material_select('destroy');
                   response = $.parseJSON(response);
                   $('input[name=end_time]').val(response[0].text);
                   $('input[name=end_time]').focusin();
                   var str = "";
                   $.each(response, function(i,v){
                       str+='<option value="'+v.value+'">'+v.text+'</option>'
                   });

                   $('select.end_time').html(str);
               }
           });

       });
        $('select.end_time').material_select('destroy');
        $(' select.end_time').select2();


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


        $('#block-time select').material_select();
        $(".close-block-panel").click(function(){
            $("#block-time").animate({right:'-360px'});
        });

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

                    $('#booking-appointment select.end_time').material_select('destroy');
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