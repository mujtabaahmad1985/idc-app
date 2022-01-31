<style>
    #appointment-edit-detail{ min-height:528px !important;}
    #appointment-edit-detail .input-field{ margin-top: 0.3rem;}
    #appointment-edit-detail .close-button i{
        position: relative; top:7px !important;}

    #appointment-edit-detail.modal .card .card-content{
        padding:5px 15px;}
    .select2-container--default .select2-selection--single{ background: none; border-color: #9e9e9e !important}

    #appointment-edit-detail .time-slots .select2{


        width: 158px !important;float: right;
        font-size: 0.8rem;
        top: -4px;
        left: 0px;

    }

    #appointment-edit-detail .time-slots .select2:last-child{width: 177px !important;float: right;}
    #appointment-edit-detail .time-slots._2nd .select2{
        width: 160px !important;
        float: none;
        left:0 !important;

    }
    #appointment-edit-detail .select2-patient .select2{
        width: 334px !important;
        float: right;

        font-size: 0.8rem;
        margin-bottom:0px
    }

    #appointment-edit-detail .locations-select2-edit .select2{
        width: 198px !important;
        float: right;
       /* left: 13px !important;
        top: -9px;*/
    }
    #activity .collection-item p{font-size: 0.8rem;
        line-height: 17px; text-align: left;
        color: gray;}
    #activity .collection-item .time{
        width: 100%;
        text-align: right;
        font-size: 0.7rem;}
    span.title{ font-size: 0.8rem; text-transform: lowercase !important;}
    span.title a{text-transform:capitalize !important;}
    #appointment-edit-detail .input-field div.error {
        position: absolute;
        top: 3rem;
        left: 4rem;
        font-size: 0.8rem;
        width: 400px;
        color: #FF0000;
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        -o-transform: translateY(0%);
        transform: translateY(0%);
    }

    .materialize-textarea{ margin-left: 5rem;width: calc(96% - 3rem); margin-top: -20px}
    .more-buttons{         padding: 5px;
        text-align: left;
        width: 100%;
        margin: 13px auto;
        font-size: 12px;
        border: none;
        color: #FFF; background: #F44336}
    .more-buttons i{
        position: relative;
        top: 5px;
        margin-right: 0px;
        font-size: 1.4rem;

    }

    #appointment-edit-detail  #appointment_date_start{
        width: 336px;
        margin: 0 0 0 8px !important;
        height: 30px !important;
        float: right;
        /*top: -25px;
        left: 0px*/
    }

    #appointment-edit-detail  #appointment_date_end{
        width: 172px;
        margin: 0 0 0 -25px !important;
        height: 20px !important;
        position: relative;
        top: -11px;

    }
.datepicker{ font-size: 0.8rem;}
    .input-field.select2-doctor{ margin-top: -10px;}

    .room-select2-edit .select2{
        left: -14px !important;
        width: 129px !important;

    }

    #appointment-edit-detail textarea{
       /* position: relative; */
        /* top: -46px; */
        width: 333px;
        /* left: 20px; */
        margin-left: 53px;
    }
    #appointment-edit-detail .message1{ height: 90px}

</style>

<div class="row">
    <div class="col s12 info-section">
        <div class="card" style="padding: 10px;font-size: 1rem;">

            <a href="#!" class="left close-button"><i class="material-icons">keyboard_arrow_left</i> Back to Calendar</a>
            <span class="right m-top-5" >Edit Block Time</span>
            <div style="clear:both "></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col s8 info-section no-padding offset-s2">
        <form class="col s12" id="update-booking-form" action="/appointment/update" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $appointment->id }}">
        <div class="card">
            <div class="card-content">

                @php
                    $start = "00:00";
                    $end = "23:30";

                    $tStart = strtotime($start);
                    $tEnd = strtotime($end);
                    $tNow = $tStart;
            while($tNow <= $tEnd){



                 $now = date("H:i",$tNow);
                 $tNow = strtotime('+5 minutes',$tNow);
                 $time_slots[] = $now;
            }
            $index = 0;

            $location_id = isset($more_availability) && !is_null($more_availability)?$more_availability->location:"";
            //echo $location_id; exit;



        // echo "<pre>"; print_r($time_slots); echo "</pre>";
                @endphp

                <div class="row">
                    <div class="input-field col s12 time-slots">
                        <i class="material-icons prefix">access_time</i>


                        <select class="end_time validate" required name="end_time">
                            @if(empty($slots) || is_null($slots))
                                @foreach($time_slots as $slot)
                                    <option value="{!! $slot !!}" @if(date('H:i', strtotime($appointment->end_time))==$slot) selected @endif>{!! $slot !!}</option>
                                @endforeach
                            @else
                                @foreach($slots as $slot)
                                    <option value="{!! $slot !!}" @if(date('H:i', strtotime($appointment->end_time))==$slot) selected @endif>{!! $slot !!}</option>
                                @endforeach
                            @endif
                        </select>
                        <select class="start_time validate" required name="start_time">
                            @if(empty($slots) || is_null($slots))
                                @foreach($time_slots as $slot)
                                    <option value="{!! $slot !!}" @if(date('H:i', strtotime($appointment->start_time))==$slot) selected @endif>{!! $slot !!}</option>
                                @endforeach
                            @else
                                @foreach($slots as $slot)
                                    <option value="{!! $slot !!}" @if(date('H:i', strtotime($appointment->start_time))==$slot) selected @endif>{!! $slot !!}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix" >access_time</i>
                        <input id="appointment_date_start" name="appointment_date_start" value="{!! date('d.m.Y', strtotime($appointment->booking_date)) !!}" type="text"  class="">

                    </div>
                    {{--<div class="input-field col s5">
                        <input id="appointment_date_end" name="appointment_date_end" value="{!! date('d.m.Y', strtotime($appointment->booking_end_date)) !!}" type="text"  class="datepicker">

                    </div>--}}
                </div>
                <div class="row" >
                    <div class="input-field col s12 select2-patient select2-doctor">
                        <i class="material-icons prefix">local_hospital</i>
                        <select class="doctors_staff" name="doctor_id"  data-error=".errorTxt4">

                            <option value="" disabled="" selected>Choose doctor</option>
                            @if(isset($doctors) && count($doctors) > 0)

                                @foreach($doctors as $doctor)
                                    <option value="{!! $doctor->id !!}" @if($appointment->doctor == $doctor->id ) selected @endif>{!! $doctor->fname.' '.$doctor->lname !!}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="errorTxt4 error un_available_doctor_id"></div>
                    </div>

                </div>
                <div class="row location-room" >
                    <div class="input-field col s8 locations-select2-edit">
                        <i class="material-icons prefix">location_on</i>
                        <select class="locations-appointment validate" name="location_id"  data-error=".errorTxt3">

                            <option value="" disabled selected>Choose Location</option>
                            @if(isset($locations) && count($locations) > 0)

                                @foreach($locations as $location)
                                    <option value="{!! $location->id !!}" @if($appointment->location==$location->id) selected @endif>{!! $location->name !!}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="errorTxt3 error location-response"></div>
                    </div>

                    {{--</div>
                    <div class="row">--}}
                    <div class="input-field col s4  room-select2-edit">

                        <select class="rooms" name="room_id" data-error=".errorTxt5">

                            <option value="" disabled selected>Choose Rooms</option>
                            @if(isset($rooms) && count($rooms) > 0)

                                @foreach($rooms as $room)
                                    <option value="{!! $room->id !!}" data-room-name="{!! $room->name !!}" @if($appointment->room==$room->id) selected @endif>{!! $room->name !!}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="errorTxt5 error room-response"></div>
                    </div>

                </div>
                <div class="row">
                    <div class="input-field col s12 message1">
                        <i class="material-icons prefix">message</i>
                        <textarea id="textarea2" name="notes" class="materialize-textarea" length="120">{!! $appointment->notes !!}</textarea>

                        <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span></div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light red save-appointment" style="width:100%; margin-bottom: 35px">Update Appointment</button>
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
        </form>
    </div>

</div>





<script>
    $(function(){
      //  const edit_detail = new PerfectScrollbar('#appointment-edit-detail');
        $(".more-buttons").click(function () {
            var action = $(this).attr('data-action');

            switch (action){
                case "treatment":
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
                    break;
            }
        });
        var un_available_doctor_id = "{!! $appointment->doctor !!}";
        var choose_date = "{!! $appointment->booking_date !!}";
        var doctor_id = "{!! $appointment->doctor !!}";
        var selected_doctor = doctor_id==""?0:doctor_id;
        $(".save-appointment").click(function(e){
            $(".message").hide();

            if($("#update-booking-form").valid()){

                $("#update-booking-form").ajaxForm(function(response){
                    response = $.parseJSON(response);
                    if(response.type=="success"){
                        $('.success-message').html(response.message);
                        $('.success-message').fadeIn();
                        calendar.fullCalendar('refetchEvents');

                        setTimeout(function(){$('.success-message').fadeOut();
                            $("#slide-booking-form")[0].reset();
                            $(".new-patient-info").hide();
                            ///$("#booking-appointment").animate({right:'-360px'});
                            $("#appointment-panel").modal('close');
                        }, 2500);
                    }else{
                        $('.error-message').html(response.message);
                        $('.error-message').fadeIn();
                    }
                }).submit();
            }
            e.preventDefault();
        });

        $(".close-button").click(function(){
            $("#appointment-edit-detail").modal('close');
        });

        $('#appointment-edit-detail select.services').select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',

        });

        $('#appointment-edit-detail select[name=patient_select]').select2({
            placeholder: "Enter Patient ",
            allowClear: true,
            minimumInputLength: 3,
            templateResult:patient_result_template,
            dropdownAutoWidth : 'true',
            ajax: {
                url: function (params) {
                    return '/patients/get_all_patients/' + params.term;
                },
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                }
            }
        }).on('change', function(){
            var id = $(this).val();
//alert();


            if(id > 0){

                $.ajax({
                    url:"/get/appoinment/pending/"+id,
                    success:function (response) {
                        if(response){
                            response = $.parseJSON(response);
                            if(response.type=="success"){



                                swal({    title: "An Appointment is Already Booked.",
                                        text: response.data.patient_name+" has an appointment at "+response.data.start +" - "+response.data.end+" at "+response.data.booking_date+" in "+response.data.room_name+" (Room)",
                                        type: "warning",
                                        closeOnConfirm: true,
                                        showCancelButton: true,
                                    },
                                    function(){
                                        $(" #appointment-edit-detail").modal('close');

                                    });

                                $(".sweet-alert.showSweetAlert > .sa-button-container").html('<button class="action-button green" data-action="completed">Confirm it!</button> <button class="action-button blue" data-action="cancelled">Cancel it!</button> <button class="action-button orange" data-action="re-schedule">Re-schedule it!</button>  <button class="action-button red" data-action="deleted">Delete it!</button>   <button class="action-button black confirm" data-action="ok">Done</button>');


                                ///  $(".confirm")
                                $(".action-button").click(function(){
                                    var action = $(this).attr('data-action');

                                    switch (action){
                                        case "ok":
                                            $(".sweet-overlay").remove();
                                            $(".sweet-alert").remove();
                                            $(" #appointment-edit-detail").modal('close');
                                            break;
                                        case "completed":
                                        case "cancelled":
                                        case "deleted":

                                            $.ajax({
                                                url:"/update/status/appointment/"+response.data.appointment_id+"/"+action,
                                                success:function(){
                                                    $(".sweet-overlay").remove();
                                                    $(".sweet-alert").remove();
                                                    calendar.fullCalendar('refetchEvents');
                                                    $(" #appointment-edit-detail").modal('close');
                                                }
                                            });
                                            break;
                                        case "re-schedule":

                                            $.ajax({
                                                url:"/appointment/get/"+response.data.appointment_id,
                                                success:function (response_detail) {
                                                    response_detail = $.parseJSON(response_detail);



                                                    $("select.rooms").val(response_detail.room);
                                                    $("select.rooms"). select2().trigger('change');

                                                    $("select.services").val(response_detail.services);
                                                    $("select.services"). select2().trigger('change');

                                                    $("select.start_time").val(response_detail.start);
                                                    $("select.start_time"). select2().trigger('change');



                                                    $("select.services").val(response_detail.services);
                                                    $("select.services"). select2().trigger('change');

                                                    $("select.doctors_staff").val(response_detail.doctor);
                                                    $("select.doctors_staff"). select2().trigger('change');

                                                    //  $("select.patient").val(response_detail.patient);
                                                    //   $("select.patient"). select2().trigger('change');
                                                    setTimeout(function(){
                                                        $("select.end_time").val(response_detail.end);
                                                        $("select.end_time"). select2().trigger('change');

                                                    }, 1500);
                                                    setTimeout(function(){

                                                        $("select.locations-appointment").val(response_detail.location);
                                                        $("select.locations-appointment"). select2().trigger('change');
                                                    }, 1800);



                                                    $("#appointment_date").val(response_detail.booking_date);

                                                    $("#slide-booking-form").attr('action','/appointment/update');
                                                    $("#appointment_id").val(response_detail.id);

                                                    $(".sweet-overlay").remove();
                                                    $(".sweet-alert").remove();
                                                }
                                            });
                                            break;
                                    }
                                });
                            }
                        }
                    }
                });

                $("input[name=patient_id]").val(id);

                $(this).parents('form').find('.new-patient-info').hide();
            }else{

                $(this).parents('form').find('.new-patient-info').show();
                //  const ps3 = new PerfectScrollbar('.booking-appointment');
            }
        });

        $("input[name=appointment_date_start]").focusin();
        $("input[name=appointment_date_start]").datepicker({ dateFormat: 'dd.mm.yy', minDate:0,
            onSelect: function(dateText, inst) {
                $("input[name=appointment_date_start]").focusin();
                $("input[name=appointment_date_start]").val(dateText);
                var c = dateText.toString();
                //  alert(choose_date+" : "+c);
                if((un_available_doctor_id==selected_doctor) && (choose_date==c)){
                    //  alert(un_available_doctor_id+":"+selected_doctor+":"+choose_date+":"+dateText);
                    $(".un_available_doctor_id").html('This doctor is not available for selected date');
                    $(".un_available_doctor_id").fadeIn();
                }else{
                    var start_time = $("select.start_time option:selected").val();
                    var end_time = $("select.end_time option:selected").val();


                    $(".un_available_doctor_id").fadeOut();
                }
            }
        });



        $(' select.start_time').material_select('destroy');
        $('select.start_time').select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',

        }).on('change', function(){
            var start_time = $(this).val();
            var selected_date = $("input[name=appointment_date_start]").val();
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
        $('select.end_time').select2().on('change', function () {
            var start_time = $("select.start_time option:selected").val();
            var end_time = $(this).val();
            var selected_date = $("input[name=appointment_date_start]").val();




        });

        $('select[name=end_time]').material_select('destroy');

        $(' #appointment-edit-detail select.rooms').select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',

        }).on('change',function(){
            var room_id = $(this).val();
            $(".room-response").hide();
            //$(".location-response").hide();
            var start_time = $("select.start_time").val();
            var end_time = $("select.end_time").val();
            var s_date = $("input[name=appointment_date_start]").val();
            var location_id = $(" #appointment-edit-detail select.locations-appointment").val();
            var options = {
                room_id:room_id,
                location_id:location_id,
                doctor_id:selected_doctor,
                start_time:start_time,
                end_time:end_time,
                selected_date:s_date,
                "_token":"{!! csrf_token() !!}"
            };


        });
        $(' #appointment-edit-detail select.locations-appointment').select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',

        }).on('change',function(){
            var location_id = $(this).val();
            $(".location-response").hide();
            //  $(".room-response").hide();

            var start_time = $("select.start_time").val();
            var end_time = $("select.end_time").val();
            var s_date = $("input[name=appointment_date_start]").val();
            var room_id = $("select.rooms").val();
            var options = {
                room_id:room_id,
                location_id:location_id,
                doctor_id:selected_doctor,
                start_time:start_time,
                end_time:end_time,
                selected_date:s_date,
                "_token":"{!! csrf_token() !!}"
            };


        });

        $('#appointment-edit-detail select.doctors_staff').select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',

        }).on('change',function(){
            selected_doctor = $(this).val();
            var start_time = $("select.start_time option:selected").val();
            var end_time = $("select.end_time option:selected").val();

            if((un_available_doctor_id==$(this).val() && choose_date==$("input[name=appointment_date_start]").val())){

                $(".un_available_doctor_id").html('This doctor is not available for selected date');
                $(".un_available_doctor_id").fadeIn();
            }else{

                $(".un_available_doctor_id").fadeOut();
            }
        });
    })
</script>