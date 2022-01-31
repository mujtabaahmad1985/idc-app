<style>
    .select2-container--default .select2-selection--single{ background: none; border-color: #9e9e9e !important}

    .time-slots .select2{
        width: 155px !important;
        float: right;
        margin-bottom: 10px;
        font-size: 0.8rem;
        top: -4px;
        left: 16px;

    }
    .time-slots._2nd .select2{
        width: 146px !important;
        float: none;
left:15px !important;
        margin-bottom:10px
    }
    .select2-patient .select2{
        width: 295px !important;
        float: right;
        margin-bottom:15px
    }
  /*  input[name=appointment_date]{ padding-left: 10px; width: 94% !important}*/

    .patient_name{width: calc(98% - 3rem) !important;
        float: right;}
    .locations-select2  .select2{

        left: 57px !important;
        width: 158px !important;
    }

    .room-select2  .select2{

        left: 25px !important;
        width: 141px !important;
    }

    #slide-booking-form .input-field{ margin-top: 0;}
    #appointment-panel .input-field div.error {
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
    .patient-container{ width:100%;
        height:50px; padding:5px; }
    .avatar{width: 40px;
        height: 39px;
        background: #E5E1E1;
        text-align: center;
        padding-top: 10px;
        float: left;
        margin-right: 5px;}
    .patient-info{ height:50px;  float:left}
    .patient-info h4{ margin:0; font-size: 16px;}
    .patient-info p.inner-text{         margin: -5px 0 0 0;
        font-size: 12px;
        color: #A49B9B;
        padding: 2px 0 0 0 ;
    }
    .patient-info p.inner-text i{ position: relative;
        top:7px; margin-right: 5px;}
    .select2-container--default .select2-results__option--highlighted[aria-selected] .patient-info p.inner-text { color: #FFF;}
    #appointment-panel.modal{ min-height: 480px !important; }
    .input-field.col .prefix ~ label, .input-field.col .prefix ~ .validate ~ label{ left: 23px;}
    #appointment-panel input[type=text], #appointment-panel input[type=email]{  position: relative;
        position: relative;
        left: 12px;
        width: 296px;
        padding-left: 0px;
        font-size: 12px;
        margin: 0 0 5px 44px;
    }
    #patient_phone{ width: 183px;}
    #appointment-panel input[name=appointment_date_end]{
        position: relative;
        left: 16px;
        padding-left: 20px;
        width: 141px;
    }
    label.error{ color: #FF0000;
        top: 24px;
        left: 24px !important;}
    .patient-phone .select2{
        width: 100px !important;
        left: 24px;
        top: 1px;
    }
    textarea{     width: calc(100% - 4rem) !important;}
    #patient_phone{
        width: 195px !important;
        left: 0 !important;
        margin: 0 !important;
    }
</style>
<div class="row">
    @if(in_array(6,$permissions_allowed) || Auth::user()->role=='administrator')
    <form class="col s12" id="slide-booking-form" action="/appointment/book" method="post" enctype="multipart/form-data">
        <input type="hidden" name="booking_type" id="booking_type" value="appointment" />
        <input type="hidden" name="id" id="appointment_id" />
        <input id="unique_id" type="hidden" name="unique_id"  value="{!! $unique_id !!}">
        <input type="hidden" name="patient_id" @if(isset($patient_id) && !empty($patient_id)) value="{!! $patient_id !!}"  @endif />
        {{ csrf_field() }}

        <div class="row">
            <div class="input-field col s12 select2-patient">
                <i class="material-icons prefix">add_alert</i>
                <select class="services validate" required name="service_id" data-error=".errorTxt1">
                    <option value=""  selected>Choose Service</option>
                    @if(isset($services) && count($services) > 0)

                        @foreach($services as $service)
                            <option value="{!! $service->id !!}" data-duration="{!! date('H:i', strtotime($service->duration)) !!}">{!! $service->service_name !!}</option>
                        @endforeach
                    @endif
                </select>
                <div class="errorTxt1 error"></div>
            </div>

        </div>
        @if(empty($patient_id))
        <div class="row">
            <div class="input-field col s12 select2-patient">
                <i class="material-icons prefix">account_circle</i>
                <select class="patient validate" name="patient_select" data-error=".errorTxt2">


                </select>
            </div>


        </div>
        @else
            <div class="row">
                <div class="input-field col s12 select2-patient">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" value="{!! $patient_name !!}" class="patient_name" readonly="readonly" />
                </div>


            </div>
            @endif
        <div class="row new-patient-info" id="new-patient-info" style="display: none">


            <div class="input-field col s12">
                <i class="material-icons prefix">account_box</i>
                <input id="patient_name" type="text" name="patient_name" class="validate">
                <label for="patient_name" class="">Name</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input id="patient_email" type="email" name="patient_email" class="validate">
                <label for="patient_email" class="">Email</label>
            </div>

                <div class="input-field col s5 right-align patient-phone">
                    <i class="material-icons prefix"></i>
                    <select class="icons" name="country_area_code" id="country_area_code">
                        <option value="">Choose Country</option>
                        @foreach($countries as $country)
                            <option  value="{!! $country->code !!}" data-code="{!! $country->code !!}" class="left circle">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                        @endforeach
                    </select>

                </div>
                <div class="input-field col s7">
                    <input id="patient_phone" name="patient_phone" type="text" class="">
                </div>



        </div>
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
            <div class="input-field col s7 time-slots">
                <i class="material-icons prefix">access_time</i>

                <select class="start_time validate" required name="start_time">
                    @if(empty($slots) || is_null($slots))
                        @foreach($time_slots as $slot)
                            <option value="{!! $slot !!}" @if($start_time==$slot) selected @endif>{!! $slot !!}</option>
                        @endforeach
                    @else
                        @foreach($slots as $slot)
                            <option value="{!! $slot !!}" @if($start_time==$slot) selected @endif>{!! $slot !!}</option>
                        @endforeach
                    @endif
                </select>
                <div class="errorTxt14 error is_start_time_changed" style="left:67px !important; top:26px;"></div>

            </div>
            @php
            $end_time = strtotime('+5 minutes',strtotime($start_time));
            $end_time = date("H:i",$end_time);
            @endphp
            <div class="input-field col s5 time-slots _2nd no-padding">

                <select class="end_time validate" required name="end_time">
                    @if(empty($slots) || is_null($slots))
                        @foreach($time_slots as $slot)
                            <option value="{!! $slot !!}" @if($end_time==$slot) selected @endif>{!! $slot !!}</option>
                        @endforeach
                    @else
                        @foreach($slots as $slot)
                            <option value="{!! $slot !!}" @if($start_time==$slot) selected @endif>{!! $slot !!}</option>
                        @endforeach
                    @endif
                </select>

                <div class="errorTxt4 error is_end_time_changed" style="left:0 !important;"></div>
            </div>



        </div>
        <div class="row">

            <div class="input-field col s12">
                <i class="material-icons prefix">access_time</i>
                <input id="appointment_date_start" name="appointment_date_start" value="{!! $choose_date !!}" type="text" required  class="">

            </div>
           {{-- <div class="input-field col s6 no-padding">
                <input id="appointment_date_end" name="appointment_date_end" value="{!! $choose_date !!}" type="text" required  class="datepicker">

            </div>--}}
        </div>

        <div class="row">
            <div class="input-field col s12 select2-patient">
                <i class="material-icons prefix">local_hospital</i>
                <select class="doctors_staff" name="doctor_id" required data-error=".errorTxt4">

                    <option value="" disabled="" selected>Choose doctor</option>
                    @if(isset($doctors) && count($doctors) > 0)

                        @foreach($doctors as $doctor)
                            <option value="{!! $doctor->id !!}" @if($doctor_id == $doctor->id && empty($staff_id)) selected @endif  @if( !empty($staff_id) && $staff_id==$doctor->id) selected @endif>{!! $doctor->fname.' '.$doctor->lname !!}</option>
                        @endforeach
                    @endif
                </select>
                <div class="errorTxt4 error un_available_doctor_id"></div>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s6 locations-select2">
                <i class="material-icons prefix">location_on</i>
                <select class="locations-appointment validate" required name="location_id"  data-error=".errorTxt3">

                    <option value="" disabled selected>Choose Location</option>
                    @if(isset($locations) && count($locations) > 0)

                        @foreach($locations as $location)
                            <option value="{!! $location->id !!}" @if($location_id==$location->id) selected @endif>{!! $location->name !!}</option>
                        @endforeach
                    @endif
                </select>
                <div class="errorTxt3 error location-response"></div>
            </div>

        {{--</div>
        <div class="row">--}}
            <div class="input-field col s6 room-select2">

                <select class="rooms" name="room_id" required data-error=".errorTxt5">

                    <option value="" disabled selected>Choose Rooms</option>
                    @if(isset($rooms) && count($rooms) > 0)

                        @foreach($rooms as $room)
                            <option value="{!! $room->id !!}" data-room-name="{!! $room->name !!}" @if($room_id==$room->id) selected @endif>{!! $room->name !!}</option>
                        @endforeach
                    @endif
                </select>
                <div class="errorTxt5 error room-response"></div>
            </div>

        </div>

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">create</i>
                <textarea id="textarea2" name="notes" class="materialize-textarea" length="120" style="margin-left: 4rem"></textarea>
                <label for="textarea1" style="margin-top: 15px" class="active">Notes</label>
                <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span></div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <button class="btn waves-effect waves-light red save-appointment" style="width:100%;">Book Appointment</button>
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
        @else
        <label class="error">You have not granted for making appointment, contact administrator.</label>
    @endif
</div>

<script>
    function timeToSeconds(time) {
        time = time.split(/:/);
        return time[0] * 3600 + time[1] * 60 + time[2];
    }
    $(function(){
        //$( ".datepicker" ).removeClass('hasDatepicker');
        $('#country_area_code').material_select('destroy');
        $('#country_area_code').select2({dropdownAutoWidth : 'true'});
        const appointment_panel = new PerfectScrollbar('#appointment-panel');

        $(".datepicker").datepicker({ dateFormat: 'dd.mm.yy', minDate:0});

var un_available_doctor_id = "{!! $un_available_doctor_id !!}";
var choose_date = "{!! $choose_date !!}";
var doctor_id = "{!! $doctor_id !!}";

var is_end_date_changed = false;

        $("#country_area_code").change(function(){

            var area_code = $(this).val();
           // alert(area_code);
            $("#patient_phone").val("+"+area_code);
            $("#patient_phone").focusin();
        });

if(un_available_doctor_id > 0 && doctor_id > 0 && (un_available_doctor_id==doctor_id)){
    $(".un_available_doctor_id").html('This doctor is not available for selected date');
    $(".un_available_doctor_id").fadeIn();
}
var staff_id = "{!! $staff_id !!}"

        if(staff_id > 0 ){
            var start_time = $("select.start_time option:selected").val();
            var end_time = $("select.end_time option:selected").val()
            $.ajax({
                url:"/check_availability_doctor_date",
                type:"POST",
                data:{selected_doctor:staff_id,selected_date:choose_date,"_token":"{!! csrf_token() !!}",start_time:start_time,end_time:end_time},
                success:function (response) {
                    response = $.parseJSON(response);
                    if(response){
                        if(response.type=='error'){
                            $(".un_available_doctor_id").html(response.message);
                            $(".un_available_doctor_id").fadeIn();
                        }
                        else if(response.type=='no_slot') {
                            $(".un_available_doctor_id").html(response.message);
                            $(".un_available_doctor_id").fadeIn();
                        }
                        else{
                            $(".un_available_doctor_id").fadeOut();
                        }



                        if(response.type=='location_found'){

                            $("select.locations-appointment").val(response.location_id);
                            $("select.locations-appointment"). select2().trigger('change');
                            // $("select.locations-appointment").select2();
                        }



                    }else{
                        $(".un_available_doctor_id").fadeOut();
                    }
                }
            });
        }

var selected_doctor = doctor_id==""?0:doctor_id;
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
                    $.ajax({
                        url:"/check_availability_doctor_date",
                        type:"POST",
                        data:{selected_doctor:selected_doctor,selected_date:c,"_token":"{!! csrf_token() !!}",start_time:start_time,end_time:end_time},
                        success:function (response) {
                            response = $.parseJSON(response);
                            if(response){
                                if(response.type=='error'){
                                    $(".un_available_doctor_id").html(response.message);
                                    $(".un_available_doctor_id").fadeIn();
                                }
                                else if(response.type=='no_slot') {
                                    $(".un_available_doctor_id").html(response.message);
                                    $(".un_available_doctor_id").fadeIn();
                                }
                                else{
                                    $(".un_available_doctor_id").fadeOut();
                                }



                                if(response.type=='location_found'){

                                    $("select.locations-appointment").val(response.location_id);
                                    $("select.locations-appointment"). select2().trigger('change');
                                   // $("select.locations-appointment").select2();
                                }
                            }else{
                                $(".un_available_doctor_id").fadeOut();
                            }
                        }
                    });

                    $(".un_available_doctor_id").fadeOut();
                }
        }
        });



        $(' select.start_time').material_select('destroy');
        $('select.start_time').select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',

        }).on('change', function(){
            is_end_date_changed = false;
            var start_time = $(this).val();
            var calendar_limit_start_time = timeToSeconds("09:00:00");
            var s_unix = timeToSeconds(start_time+":00");
            if(s_unix < calendar_limit_start_time){
                $(".is_start_time_changed").html("You are booking appointment out of calendar hours!");
                $(".is_start_time_changed").show();

            }else
            $(".is_start_time_changed").hide();
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

        $('select.end_time').select2().on('change', function () {
            is_end_date_changed = true;
            var start_time = $("select.start_time option:selected").val();
            var end_time = $(this).val();
            var selected_date = $("input[name=appointment_date_start]").val();


                $.ajax({
                    url:"/check_availability_doctor_date",
                    type:"POST",
                    data:{selected_doctor:selected_doctor,selected_date:selected_date,"_token":"{!! csrf_token() !!}",start_time:start_time,end_time:end_time},
                    success:function (response) {
                        response = $.parseJSON(response);
                        if(response){
                            if(response.type=='error'){
                                $(".un_available_doctor_id").html(response.message);
                                $(".un_available_doctor_id").fadeIn();
                            }
                            else if(response.type=='no_slot') {
                                $(".un_available_doctor_id").html(response.message);
                                $(".un_available_doctor_id").fadeIn();
                            }
                            else{
                                $(".un_available_doctor_id").fadeOut();
                            }

                            if(response.type=='location_found'){
                                $("select.locations-appointment").val(response.location_id);
                                $("select.locations-appointment"). select2().trigger('change');
                            }
                            else{
                                $("select.locations-appointment").val("");
                                $("select.locations-appointment"). select2().trigger('change');
                            }

                            if(response.room_id > 0){
                              //  alert('test');
                                $("select.rooms"). select2('destroy');
                                $("select.rooms option").each(function(){
                                    if($(this).val() == response.room_id){
                                        $(this).text($(this).attr('data-room-name')+" - Occupied");
                                        $(this).attr('disabled','disabled');
                                        $(this).addClass()
                                    }else{
                                        if($(this).val()!="")
                                        $(this).text($(this).attr('data-room-name')+" - Available");
                                        $(this).removeAttr('disabled');
                                    }
                                });
                                $("select.rooms"). select2({ dropdownAutoWidth : 'true',});


                            }else{
                              //  alert();
                                $("select.rooms"). select2('destroy');
                                $("select.rooms option").each(function(){

                                    if($(this).val()!="")
                                        $(this).text($(this).attr('data-room-name')+" - Available");
                                    $(this).removeAttr('disabled');

                                });
                                $("select.rooms"). select2({ dropdownAutoWidth : 'true',});
                            }

                        }else{

                            $(".un_available_doctor_id").fadeOut();
                        }
                    }
                });

        });

        $('select[name=end_time]').material_select('destroy');



        $('select[name=patient_select]').select2({
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



                               swal({    title: "Pending Appointment.",
                                       text: response.data.patient_name+" has an appointment at "+response.data.start +" - "+response.data.end+" at "+response.data.booking_date+" in "+response.data.room_name+" (Room)",
                                       type: "warning",
                                        closeOnConfirm: true,
                                       showCancelButton: true,
                                   },
                                   function(){
                                       $("#appointment-panel").modal('close');

                                   });

                               $(".sweet-alert.showSweetAlert > .sa-button-container").html('<button class="action-button red" data-action="add">Add anyway</button> <button class="action-button green" data-action="completed">Confirm</button> <button class="action-button blue" data-action="cancelled">Cancel</button> <button class="action-button orange" data-action="re-schedule">Re-schedule</button>  <button class="action-button red" data-action="deleted">Delete</button>   <button class="action-button black confirm" data-action="ok">Done</button>');


                             ///  $(".confirm")
                               $(".action-button").click(function(){
                                   var action = $(this).attr('data-action');

                                   switch (action){
                                       case "ok":
                                           $(".sweet-overlay").remove();
                                           $(".sweet-alert").remove();
                                           $("#appointment-panel").modal('close');
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
                                                   $("#appointment-panel").modal('close');
                                               }
                                           });
                                       case "add":
                                           $(".sweet-overlay").remove();
                                           $(".sweet-alert").remove();
                                           break;
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

        $('#appointment-panel select.doctors_staff').select2({
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
                $.ajax({
                    url:"/check_availability_doctor_date",
                    type:"POST",
                    data:{selected_doctor:selected_doctor,selected_date:$("input[name=appointment_date_start]").val(),"_token":"{!! csrf_token() !!}",start_time:start_time,end_time:end_time},
                    success:function (response) {
                        response = $.parseJSON(response);
                        if(response){
                            if(response.type=='error'){
                                $(".un_available_doctor_id").html(response.message);
                                $(".un_available_doctor_id").fadeIn();
                            }
                            else if(response.type=='no_slot') {
                                $(".un_available_doctor_id").html(response.message);
                                $(".un_available_doctor_id").fadeIn();
                            }
                            else{
                                $(".un_available_doctor_id").fadeOut();
                            }

                            if(response.type=='location_found'){
                                $("select.locations-appointment").val(response.location_id);
                                $("select.locations-appointment"). select2().trigger('change');
                            }
                            else{
                                $("select.locations-appointment").val("");
                                $("select.locations-appointment"). select2().trigger('change');
                            }
                        }else{
                            $(".un_available_doctor_id").fadeOut();
                        }
                    }
                });
                $(".un_available_doctor_id").fadeOut();
            }
        });
        $('#appointment-panel select.rooms').select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',

        }).on('change',function(){
            var room_id = $(this).val();
            $(".room-response").hide();
            //$(".location-response").hide();
            var start_time = $("select.start_time").val();
            var end_time = $("select.end_time").val();
            var s_date = $("input[name=appointment_date]").val();
            var location_id = $("#appointment-panel select.locations-appointment").val();
            var options = {
                room_id:room_id,
                location_id:location_id,
                doctor_id:selected_doctor,
                start_time:start_time,
                end_time:end_time,
                selected_date:s_date,
                "_token":"{!! csrf_token() !!}"
            };

            $.ajax({
                url:'check/availability',
                type:"POST",
                data:options,
                success:function(response){
                    //     alert(response);
                    response = $.parseJSON(response);

                    if(response.type=='success'){


                        if(response.room_flag=='booked'){
                            $(".room-response").html('Selected room is already booked');

                            $(".room-response").fadeIn();
                        }


                    }
                }

            });
        });
        $('#appointment-panel select.services').select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',
            allowClear: true,
            tags: true,

        });
        $('#appointment-panel select.locations-appointment').select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',

        }).on('change',function(){
            var location_id = $(this).val();
            $(".location-response").hide();
          //  $(".room-response").hide();

            var start_time = $("select.start_time").val();
            var end_time = $("select.end_time").val();
            var s_date = $("input[name=appointment_date]").val();
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

            $.ajax({
                url:'check/availability',
                type:"POST",
                data:options,
                success:function(response){
               //     alert(response);
                    response = $.parseJSON(response);

                    if(response.type=='success'){
                        if(response.loaction_flag=="not-available"){
                            $(".location-response").html('Selected location is not available');

                            $(".location-response").fadeIn();
                        }



                        if(response.loaction_flag=="booked"){
                            $(".location-response").html('Selected location is already booked');

                            $(".location-response").fadeIn();
                        }
                    }
                }

            });
        });

        $(".save-appointment").click(function(e){
            $(".message").hide();

            if($("#slide-booking-form").valid()){
                $(".is_end_time_changed").hide();
                if(!is_end_date_changed){
                    $(".is_end_time_changed").html('Please select end time');
                    $(".is_end_time_changed").show();
                    return false;
                }

                $("#slide-booking-form").ajaxForm(function(response){
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

    })

    function patient_result_template(patient){

        if(patient.id > 0)
        var $patient = $('<div class="patient-container">'+
            '<div class="avatar"><img src="/public/img/user.svg" alt="user"></div>'+
                '<div class="patient-info">'+
                '<h4>'+patient.text+'</h4>'+
                '<p class="inner-text"><i class="material-icons prefix">fingerprint</i> '+patient.patient_unique_id+'  '+
                '<i class="material-icons prefix" style="margin-left: 20px">contact_phone</i> '+patient.patient_phone+'</p>'+
                '</div>'+
            '</div>');
        else
            var $patient = patient.text;
        return $patient;
    }
</script>