
    <div class="row padding15">
        <div class="col s7">
            <h3>@if($user_info['appointment_type']=="appointment")Patient's Appointment @else Block Time @endif</h3>
        </div>
        @if($user_info['appointment_type']=="appointment")
        <div class="col s1">
            <a href="javascript:;" class="treatment-patient-appointment"  data-patient-id="{{ $user_info['patient_id'] }}"   data-appointment-id="{{ $user_info['id'] }}"><i class="material-icons">local_hospital</i></a>
        </div>
        @endif
        <div class="col s1">
            <a href="javascript:;" class="edit-patient-appointment"><i class="material-icons">create</i></a>
        </div>
        <div class="col s1">
            <a href="javascript:;" class="delete-patient-appointment"><i class="material-icons">delete_forever</i></a>
        </div>
        <div class="col s1">
            <a href="javascript:;" class="close-patient-appointment"><i class="material-icons">close</i></a>
        </div>
    </div>

    @php
        $start = "09:00";
        $end = "19:00";

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
    @if($user_info['appointment_type']=="appointment")
    <div class="row">
        <div class="col s2">
            <i class="material-icons">fingerprint</i>
        </div>
        <div class="col s10">
            {{ $user_info['patient_unique_id'] }}
        </div>
    </div>
    <div class="row">
        <div class="col s2">
            <i class="material-icons">account_box</i>
        </div>
        <div class="col s10">
                <a href="#!" class="get-patient-history" data-patient-id="{{ $user_info['patient_id']  }}">{{ $user_info['patient_name'] }}</a>
        </div>
    </div>
    @endif
    <form class="col s12" id="update-booking-form" action="/appointment/update" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $user_info['id'] }}">
    <div class="row show-appointment">
        <div class="col s2">
            <i class="material-icons">access_time</i>
        </div>
        <div class="col s10">
            {{ date('H:i A', strtotime($user_info['start'])) }} -   {{ date('H:i A', strtotime($user_info['end'])) }}
        </div>

    </div>
    <div class="row hide-appointment m-top-25" style="display: none">
        <div class="input-field col s6 time-slots">
            <i class="material-icons prefix">access_time</i>
            <select class="start_time validate" required name="start_time">
                @if(empty($slots))
                @foreach($time_slots as $slots)
                    <option value="{!! $slots !!}">{!! $slots !!}</option>
                @endforeach
                    @else
                    @foreach($slots as $slots)
                    <option value="{!! $slots !!}">{!! $slots !!}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="input-field col s6 time-slots _2nd">
            <select class="end_time validate" required name="end_time">

            </select>
        </div>
    </div>
    <div class="row show-appointment">
        <div class="col s2">
            <i class="material-icons">date_range</i>
        </div>
        <div class="col s10">
            {{ date('l d.m.Y', strtotime($user_info['booking_date'])) }}
        </div>
    </div>
    <div class="row hide-appointment" style="display: none">
        <div class="input-field col s12">
            <i class="material-icons prefix">access_time</i>
            <input id="appointment_date1" name="appointment_date" type="text" value="{{ date('d.m.Y', strtotime($user_info['booking_date'])) }}"  class="datepicker1 validate">
            <label for="appointment_date1" class="">Choose Date</label>
        </div>

    </div>
    <div class="row show-appointment">
        <div class="col s2">
            <i class="material-icons">vpn_key</i>
        </div>
        <div class="col s10">
            {{ $user_info['room_name'] }}
        </div>
    </div>
    <div class="row hide-appointment" style="display: none">
        <div class="input-field col s12">

            <select class="rooms" name="room_id">

                <option value="" disabled selected>Choose Rooms</option>
                @if(isset($rooms) && count($rooms) > 0)

                    @foreach($rooms as $room)
                        <option value="{!! $room->id !!}" @if($room->id == $user_info['room_id']) selected @endif>{!! $room->name !!}</option>
                    @endforeach
                @endif
            </select>

        </div>

    </div>
    <div class="row show-appointment">
        <div class="col s2">
            <i class="material-icons">location_on</i>
        </div>
        <div class="col s10">
            {{ $user_info['location'] }}
        </div>
    </div>
    <div class="row hide-appointment" style="display: none">
        <div class="input-field col s12">

            <select class="locations validate" name="location_id"  data-error=".errorTxt3">

                <option value="" disabled selected>Choose Location</option>
                @if(isset($locations) && count($locations) > 0)

                    @foreach($locations as $location)
                        <option value="{!! $location->id !!}" @if($location->id == $user_info['location_id']) selected @endif>{!! $location->name !!}</option>
                    @endforeach
                @endif
            </select>
            <div class="errorTxt3 error"></div>
        </div>

    </div>
    <div class="row show-appointment">
        <div class="col s2">
            <i class="material-icons">local_hospital</i>
        </div>
        <div class="col s10">
            {{ $user_info['doctor_name'] }}
        </div>
    </div>
    <div class="row hide-appointment">
        <div class="input-field col s12">

            <select class="doctors_staff" name="doctor_id"  data-error=".errorTxt4">

                <option value="" disabled="" selected>Choose Staff</option>
                @if(isset($doctors) && count($doctors) > 0)

                    @foreach($doctors as $doctor)
                        <option value="{!! $doctor->id !!}" @if($doctor->id == $user_info['doctor_id']) selected @endif>{!! $doctor->fname.' '.$doctor->lname !!}</option>
                    @endforeach
                @endif
            </select>
            <div class="errorTxt4 error"></div>
        </div>

    </div>

        <div class="row show-appointment">
            <div class="col s2">
                <i class="material-icons">create</i>
            </div>
            <div class="col s10">
                {{ $user_info['notes'] }}
            </div>
        </div>
        <div class="row hide-appointment" style="display: none">
            <div class="input-field col s12">

                <textarea  name="notes" class="materialize-textarea" length="120">{{ $user_info['notes'] }}</textarea>
                <div class="errorTxt4 error"></div>
            </div>

        </div>



    <div class="divider"></div>
    </form>
    <div class="row hide-appointment" style="display: none">
        <div class="input-field col s12">
            <button class="btn waves-effect waves-light red update-appointment" style="width: 100%">Update Appointment</button>
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



<script>
    $(function(){

        $(".treatment-patient-appointment").click(function(){
            $("#add-treatment-modal").modal('open');
            var patient_id = $(this).attr('data-patient-id');
            var appointment_id = $(this).attr('data-appointment-id');
            $.ajax({
                url:"/treatment/card",
                success:function (response) {
                    $("#treatment-card").html(response);
                    $("#treatment-card input[name=patient_id]").val(patient_id);
                    $("#treatment-card input[name=appointment_id]").val(appointment_id);
                    $("#consent").attr('data-patient-id',patient_id);
                    $("#consent").attr('data-appointment-id',appointment_id);
                }
            });

        });

        $(".get-patient-history").click(function(){

            var patient_id = $(this).attr('data-patient-id');
            $("#patient-view-panel").modal('open');
            $("#patient-history").html('<div class="progress"> <div class="indeterminate"></div></div>');
            $.ajax({
                url:"/history/get/"+patient_id,
                success:function (response) {
                    $("#patient-history").html(response);
                    const ps3 = new PerfectScrollbar('#patient-view-panel');
                }
            });
        });

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

        $('#patient-appointment select.start_time').material_select('destroy');
        $('#patient-appointment select.start_time').select2({
            //  placeholder: "Choose Start Time ",
            allowClear: false,

        }).on('change', function(){
            var start_time = $(this).val();
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
                        str+='<option value="'+v.value+'">'+v.text+'</option>'
                    });

                    $('#patient-appointment select.end_time').html(str);
                }
            });

        });

        $('#patient-appointment select[name=end_time]').material_select('destroy');
        $('#patient-appointment select[name=end_time]').select2({
            //  placeholder: "Choose Start Time ",
            allowClear: false,

        });
    })
</script>