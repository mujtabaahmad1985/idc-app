


@if(in_array(6,$permissions_allowed) || Auth::user()->role=='administrator')

    <form class="col s12" id="update-booking-form" action="/appointment/update" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $appointment->id }}">

        {{ csrf_field() }}

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Choose Service</label>
                    <select class="services form-control input-sm" name="service_id" data-error=".errorTxt1">

                        <option value="" >Choose Service</option>

                        @if(isset($services) && count($services) > 0)



                            @foreach($services as $service)

                                <option @if($appointment->service == $service->id) selected @endif value="{!! $service->id !!}" data-duration="{!! date('H:i', strtotime($service->duration)) !!}">{!! $service->service_name !!}</option>

                            @endforeach
                        @endif

                    </select>
                </div>
            </div>
        </div>



            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Choose Patient</label>
                        <select class="patient validate form-control input-sm" autocomplete="off" name="patient_select" data-error=".errorTxt2">
                            <option value="{!! $patient->id !!}" selected>{!! $patient->patient_name !!}</option>
                        </select>
                    </div>
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
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Start Time</label>
                    <input type="text" id="start_time"  autocomplete="off" name="start_time" class="time start_time validate form-control input-sm check-availability" value="{!! date('H:i', strtotime($appointment->start_time)) !!}"  placeholder="hh:mm">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>End Time</label>
                    <input type="text" id="end_time" name="end_time"  autocomplete="off"  class="time  end_time  form-control input-sm  check-availability" value="{!! date('H:i', strtotime($appointment->end_time)) !!}"  placeholder="hh:mm">
                    <div class="errorTxt4 error is_end_time_changed" style="left:0 !important;"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Appointment Date</label>
                    <input id="appointment_date_start"  autocomplete="off" name="appointment_date_start" value="{!! date('d.m.Y', strtotime($appointment->booking_date)) !!}" type="text" required  class="check-availability form-control input-sm">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Select Doctor</label>
                    <select class="doctors_staff  check-availability form-control input-sm" name="doctor_id" required data-error=".errorTxt4">



                        <option value="" disabled="" selected>Choose doctor</option>

                        @if(isset($doctors) && count($doctors) > 0)



                            @foreach($doctors as $doctor)

                                <option value="{!! $doctor->id !!}"  @if($appointment->doctor == $doctor->id ) selected @endif>{!! $doctor->fname.' '.$doctor->lname !!}</option>

                            @endforeach

                        @endif

                    </select>
                    <div class="errorTxt4 error un_available_doctor_id signal"></div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Choose Clinic Location</label>
                    <select class="locations-appointment validate check-availability form-control input-sm" required name="location_id"  data-error=".errorTxt3">



                        <option value="" disabled selected>Choose Location</option>

                        @if(isset($locations) && count($locations) > 0)



                            @foreach($locations as $location)

                                <option value="{!! $location->id !!}" @if($appointment->location==$location->id) selected @endif>{!! $location->name !!}</option>

                            @endforeach

                        @endif

                    </select>

                    <div class="errorTxt3 error location-response signal"></div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Choose Room</label>
                    <select class="rooms check-availability form-control input-sm" name="room_id" required data-error=".errorTxt5">
                        <option value="" disabled selected>Choose Rooms</option>

                        @if(isset($rooms) && count($rooms) > 0)



                            @foreach($rooms as $room)

                                <option value="{!! $room->id !!}" data-room-name="{!! $room->name !!}" @if($appointment->room==$room->id) selected @endif>{!! $room->name !!}</option>

                            @endforeach

                        @endif

                    </select>

                    <div class="errorTxt5 error room-response signal"></div>
                </div>
            </div>
        </div>





        <div class="row">


            <div class="col-sm-12">
                <div class="form-group">
                    <label>Write Notes</label>
                    <textarea id="textarea2" name="notes" class="form-control" length="120">{!! $appointment->notes !!}</textarea>
                </div>
            </div>
        </div>




        <div class="row">

            <div class="col-sm-12">
                <div class="form-group">

                    <button class="btn btn-danger save-appointment" style="width:100%;">Update Appointment</button>
                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="alert bg-success text-white alert-success-appointment">

                    <p></p>
                </div>
            </div>

        </div>

    </form>

@else

    <label class="error">You have not granted for making appointment, contact administrator.</label>

@endif









<script>
    var old_value = ""
    $('.dropdown-button').dropdown({
        alignment: 'right',
        constrain_width: false,
    });
    $(function(){
        $('.time').focusin(function(){
            var old_value = $(this).val();
            if($(this).val()!="")
                $(this).val('');
        });
        $('.time').timepicker({
            timeFormat : "H:i",
            show2400: true,
            step:5
        });  //static mask
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
                        $('.alert-success-appointment').html(response.message);
                        $('.alert-success-appointment').fadeIn();
                        calendar.fullCalendar('refetchEvents');

                        setTimeout(function(){$('.alert-success-appointment').fadeOut();
                            $("#update-booking-form").resetForm();


                            $("#appointment-edit-detail").modal('hide');

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



       // $(' select.start_time').material_select('destroy');
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

                  //  $('select.end_time').material_select('destroy');
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

       // $('select[name=end_time]').material_select('destroy');

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
    })
</script>