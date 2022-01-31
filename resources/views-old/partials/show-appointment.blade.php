@if(in_array(39,$permissions_allowed) || Auth::user()->role=='administrator')

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

<div class="card card-body">
    <div class="media">


        <div class="media-body mb-3">
            <a href="/patient/view/{{ $user_info['patient_id']  }}" target="_blank" class="text-danger mb-1">  <h6 class="mb-0">{{ $user_info['patient_name'] }} - {{ $user_info['patient_unique_id'] }}</h6></a>
            <span class="text-muted"><i class="icon-calendar3"></i> {{ date('l d.m.Y', strtotime($user_info['booking_date'])) }} <i class="icon-watch"></i>  {{ date('H:i A', strtotime($user_info['start'])) }} -   {{ date('H:i A', strtotime($user_info['end'])) }}</span>

        </div>
        <div class="ml-3">
            <div class="list-icons">
                <div class="list-icons-item dropdown">
                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                        <a href="#" class="dropdown-item appointment-action"  data-action="completed"><i class="icon-checkbox-checked2"></i>  Confirm</a>
                        <a href="#" class="dropdown-item edit-appointment" data-appointment-id="{!! $user_info['id'] !!}" data-patient-name="{{ $user_info['patient_name'] }} - {{ $user_info['patient_unique_id'] }}"><i class="icon-pencil5"></i> Re-schedule</a>
                        <a href="#" class="dropdown-item appointment-action"  data-action="cancelled"><i class="icon-cancel-square"></i> Cancel Appointment </a>
                        <div class="dropdown-divider"></div>
                        <a href="/patient/view/{!! $user_info['patient_id'] !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                        <a href="/patient/view/{!! $user_info['patient_id'] !!}" class="dropdown-item"><i class="icon-pencil5"></i> Edit Patient</a>
                        <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $user_info['patient_id'] !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                        <div class="dropdown-divider"></div>
                        <a href="/view/treatment-cards/{!! $user_info['patient_id'] !!}" class="dropdown-item"><i class="icon-book2"></i> Treatment Record</a>
                        <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $user_info['patient_id'] !!}"><i class="icon-history"></i> Past Sessions</a>
                        <div class="dropdown-divider"></div>
                        <a href="/calendar/appointment/{!! $user_info['patient_id']  !!}/{!! strtolower(str_slug($user_info['patient_name'])) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                        <a href="#!" class="dropdown-item"><i class="icon-alarm"></i>  Pending Appointments</a>
                        <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $user_info['patient_id']  !!}"><i class="icon-file-text"></i> Add Form</a>
                        <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $user_info['patient_id'] !!}"><i class="icon-file-media"></i> Add Media</a>
                        <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $user_info['patient_id']  !!}"><i class="icon-link2"></i> Refer Patient </a>
                        <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! $user_info['patient_id']  !!}"><i class="icon-address-book3"></i> Contact Patient </a>

                    </div>
                </div>
            </div>
        </div>








    </div>
    <div class="d-sm-flex flex-sm-wrap mb-2">
        <div class="font-weight-semibold">Doctor:</div>
        <div class="ml-sm-auto mt-2 mt-sm-0">{{ $user_info['doctor_name'] }}</div>
    </div>

    <div class="d-sm-flex flex-sm-wrap mb-2">
        <div class="font-weight-semibold">Room:</div>
        <div class="ml-sm-auto mt-2 mt-sm-0">{{ $user_info['room_name'] }}</div>
    </div>

    <div class="d-sm-flex flex-sm-wrap mb-2">
        <div class="font-weight-semibold">Location:</div>
        <div class="ml-sm-auto mt-2 mt-sm-0">{{ $user_info['location'] }}</div>
    </div>

    <div class="d-sm-flex flex-sm-wrap mb-2">
        <div class="font-weight-semibold">Notes:</div>
        <div class="ml-sm-auto mt-2 mt-sm-0">{{ $user_info['notes'] }}</div>
    </div>

</div>



<script>
    $('.appointment-actions').dropdown();
    $('.dropdown-button').dropdown({
        alignment: 'right',
        constrain_width: false,
    });
    $(function(){

        $(".appointment-action").click(function(){
            var appointment_id = "{!! $user_info['id'] !!}";
            var action = $(this).attr('data-action');
            $.ajax({
                url:"/update/status/appointment/"+appointment_id+"/"+action,
                success:function(){
                    //$(".sweet-overlay").remove();
                    //$(".sweet-alert").remove();
                    calendar.fullCalendar('refetchEvents');
                    $("#appointment-show-detail").modal('hide');
                }
            });
        });

        $(".get-media").click(function(){

            var data = {
                patient_id:$(this).attr('data-patient-id'),
                appointment_id:$(this).attr('data-appointment-id'),
                treatment_id:$(this).attr('data-treatment-id')
            };
            $("#get-media").modal();
            $.ajax({
                url:'/get/media',
                data:{"_token":"{!! csrf_token() !!}",data:data},
                type:"post",
                success:function (response) {
                    $(".get-media-show").html(response);

                }
            });
        });

        $("a.patient-actions").click(function(){
            var action = $(this).attr('data-action');
            var appointment_id = $(this).attr('data-appointment-id');

            switch(action){

                case "consent-form":
                    $(".patient-consent-show").html('<div class="progress"> <div class="indeterminate"></div></div>');
                    $("#patient-consent").modal();
                    //   $("#patient-consent-form").modal();
                    $.ajax({
                        url:"/patient/consent/appointment/"+appointment_id,
                        success:function(response){
                            $(".patient-consent-show").html(response);
                        }
                    });
                    break;

            }
        });
    //    const treatement_card = new PerfectScrollbar('#patient-treatment-card');
        $(".get-patient-history").click(function(){

           var patient_id = $(this).attr('data-patient-id');
            $("#patient-treatment-card").modal();
            $.ajax({
                url:"/patient/treatment-cards/"+patient_id,
                success:function(response){
                    $(".overlay").hide();
                    $("#patient-treatment-card .modal-content .patient-result").html(response);
                }
            });
          /*   $("#patient-view-panel").modal();
            $("#patient-history").html('<div class="progress"> <div class="indeterminate"></div></div>');
            $.ajax({
                url:"/patient/treatment-cards/"+patient_id,
                success:function (response) {
                    $("#patient-history").html(response);
                    const ps3 = new PerfectScrollbar('#patient-view-panel');
                }
            });*/
        });

        $(".edit-appointment").click(function(){
            $("#edit-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
            $("#appointment-show-detail").modal('hide');
            $("#appointment-edit-detail").modal();
            var id = $(this).attr('data-appointment-id');
            var name = $(this).attr('data-patient-name');
            $.ajax({
                url:"/appointment/edit/"+id,
                success:function(response){
                    $("#edit-appointment").html(response);
                    $("#edit-patient-name").html("Edit Appointment for "+ name);
                }
            });
        });
        //$( ".datepicker" ).removeClass('hasDatepicker');
        $(".close").click(function(){
            $("#appointment-show-detail").modal('hide');
        });


        $(".delete-patient-appointment").click(function(){
            var appointment_id = $(this).attr('data-appointment-id');
            swal({    title: "Are you sure?",
                    text: "You will not be able to recover this appointment!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true },
                function(){

                    $.ajax({
                        url:"/appointment/delete/"+appointment_id,
                        success:function(response){
                            response  =$.parseJSON(response);
                            $("#appointment-show-detail").modal('hide');
                            swal("Deleted!", "Appointment has been deleted.", "success");
                            calendar.fullCalendar('refetchEvents');
                        }
                    });



                });

        });
        $(".edit-patient-appointment").click(function(){
            $(".show-appointment").hide();
            $(".hide-appointment").show();
            $("input[type=text]").focusin();
            $("#start_time1").dropdown();
            $("#end_time1").dropdown();
            $(".input_start_time li").click(function(){
                var start_time = $(this).attr('value');
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

                        $('#input_end_time1').html(str);
                        $("#input_end_time1 li").click(function(){

                            var end_time = $(this).attr('value');
                            //  alert(end_time);
                            $(this).parents('.input-field').find('input').val(end_time);

                        });
                    }
                });

                return false;
            });
            $("#start_time1").focusout(function(){
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

                        $('#input_end_time1').html(str);
                        $("#input_end_time1 li").click(function(){

                            var end_time = $(this).attr('value');
                            //  alert(end_time);
                            $(this).parents('.input-field').find('input').val(end_time);

                        });
                    }
                });

                return false;
            });
            $("#patient-appointment .datepicker1").datepicker({ dateFormat: 'dd.mm.yy', minDate:0 });
            $('select').material_select();

            $(".update-appointment").click(function(e){
                $(".message").hide();
                $validation = $("#update-booking-form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        service_id: {
                            required: true
                        },
                        location_id: {
                            required: true
                        },
                        room_id: {
                            required: true
                        },
                        doctor_id: {
                            required: true
                        },
                        patient_name: {
                            required: true
                        },
                    },
                    // Error messages
                    messages: {

                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    // Class that wraps error message
                    errorClass: "help-block",
                    focusInvalid: true,
                    // Element that wraps error message
                    errorElement : 'div',
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
                if($("#update-booking-form").valid()){

                    $("#update-booking-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('#patient-appointment .success-message').html(response.message);
                            $('#patient-appointment .success-message').fadeIn();
                            calendar.fullCalendar('refetchEvents');

                            setTimeout(function(){$('.success-message').fadeOut();
                                $("#update-booking-form")[0].reset();
                                //  $(".new-patient-info").hide();
                                $("#patient-appointment").animate({right:'-360px'});
                            }, 2500);
                        }else{
                            $('#patient-appointment .error-message').html(response.message);
                            $('#patient-appointment .error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });

        });

var un_available_doctor_id = "0";
var choose_date = "0";
var doctor_id = "0";



if(un_available_doctor_id > 0 && doctor_id > 0 && (un_available_doctor_id==doctor_id)){
    $(".un_available_doctor_id").html('This doctor is not available for selected date');
    $(".un_available_doctor_id").fadeIn();
}
var staff_id = "0"

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
        $("input[name=appointment_date]").focusin();
        $( ".datepicker" ).datepicker({ dateFormat: 'dd.mm.yy', minDate:0,
            onSelect: function(dateText, inst) {
                $("input[name=appointment_date]").focusin();
            $("input[name=appointment_date]").val(dateText);
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

        $('select.end_time').select2().on('change', function () {
            var start_time = $("select.start_time option:selected").val();
            var end_time = $(this).val();
            var selected_date = $("input[name=appointment_date]").val();


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

                               swal({    title: "An Appointment is Already Booked.",
                                       text: response.data.patient_name+" has an appointment at "+response.data.start +" - "+response.data.end+" at "+response.data.booking_date+" in "+response.data.room_name+" (Room)",
                                       type: "warning",
                                       buttons:{
                                                ok:'Got it!'
                                       },


                                       closeOnConfirm: true },
                                   function(){
                                       $("#appointment-panel").modal('hide');

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

            if((un_available_doctor_id==$(this).val() && choose_date==$("input[name=appointment_date]").val())){

                $(".un_available_doctor_id").html('This doctor is not available for selected date');
                $(".un_available_doctor_id").fadeIn();
            }else{
                $.ajax({
                    url:"/check_availability_doctor_date",
                    type:"POST",
                    data:{selected_doctor:selected_doctor,selected_date:$("input[name=appointment_date]").val(),"_token":"{!! csrf_token() !!}",start_time:start_time,end_time:end_time},
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
                            $("#appointment-panel").modal('hide');
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
    @else
<style>
    label.error{ color: #FF0000;}
</style>
<div class="col s1 right"><a href="#!" class="grey-text close modal-action modal-close"><i class="material-icons">close</i></a>  </div>
    <label class="error">You have not granted for viewing appointment, contact administrator.</label>
    @endif