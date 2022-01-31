

<div class="row">

    @if(in_array(6,$permissions_allowed) || Auth::user()->role=='administrator')

    <form class="col s12" id="slide-booking-form" action="/appointment/book" method="post" enctype="multipart/form-data">

        <input type="hidden" name="booking_type" id="booking_type" value="appointment" />

        <input type="hidden" name="id" id="appointment_id" />

        <input id="unique_id" type="hidden" name="unique_id"  value="{!! $unique_id !!}">

        <input type="hidden" name="patient_id" @if(isset($patient_id) && !empty($patient_id)) value="{!! $patient_id !!}"  @endif />

        {{ csrf_field() }}

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Choose Service</label>
                    <select class="services form-control input-sm" name="service_id" data-error=".errorTxt1">

                        <option value="" >Choose Service</option>

                        @if(isset($services) && count($services) > 0)



                            @foreach($services as $service)

                                <option value="{!! $service->id !!}" data-duration="{!! date('H:i', strtotime($service->duration)) !!}">{!! $service->service_name !!}</option>

                            @endforeach
                        @endif

                    </select>
                </div>
            </div>
        </div>

        @if(empty($patient_id))

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Choose Patient</label>
                        <select class="patient validate form-control input-sm" autocomplete="off" name="patient_select" data-error=".errorTxt2"></select>
                    </div>
                </div>
            </div>
            @else

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Choose Patient</label>
                        <input type="text"  autocomplete="off" value="{!! $patient_name !!}" class="patient_name form-control input-sm" readonly />
                    </div>
                </div>
            </div>

            @endif

        <div class="new-patient-info" id="new-patient-info" style="display: none">

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Patient Name</label>
                    <input id="patient_name" type="text"  autocomplete="off" name="patient_name" class="validate form-control input-sm">
                </div>
            </div>
        </div>
            <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Patient Email</label>
                    <input id="patient_email"  autocomplete="off" type="email" name="patient_email" class="validate form-control input-sm">
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Patient Email</label>
                    <input id="patient_email"  autocomplete="off" type="email" name="patient_email" class="validate form-control input-sm">
                </div>
            </div>
            </div>


            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Code</label>
                        <select class="form-control" name="country_area_code" id="country_area_code">

                            <option value="">Choose Country</option>

                            @foreach($countries as $country)

                                <option  value="{!! $country->code !!}" data-code="{!! $country->code !!}">{!! $country->name !!} ( +{!! $country->code !!} )</option>

                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Code</label>
                    <input id="patient_phone"  autocomplete="off" name="patient_phone" type="text" class="form-control input-sm">
                    </div>
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

         $tNow = strtotime('+1 minutes',$tNow);

         $time_slots[] = $now;

    }

    $index = 0;



    $location_id = isset($more_availability) && !is_null($more_availability)?$more_availability->location:"";

    //echo $location_id; exit;







// echo "<pre>"; print_r($time_slots); echo "</pre>";

        @endphp
        @php
            $end_time = strtotime('+5 minutes',strtotime($start_time));
            $end_time = date("H:i",$end_time);
        @endphp
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Start Time</label>
                    <input type="text" id="start_time"  autocomplete="off" name="start_time" class="time start_time validate form-control input-sm check-availability" value="{!! $start_time !!}"  placeholder="hh:mm">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>End Time</label>
                    <input type="text" id="end_time" name="end_time"  autocomplete="off"  class="time  end_time  form-control input-sm  check-availability" value="{!! $end_time !!}"  placeholder="hh:mm">
                    <div class="errorTxt4 error is_end_time_changed" style="left:0 !important;"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Appointment Date</label>
                    <input id="appointment_date_start"  autocomplete="off" name="appointment_date_start" value="{!! $choose_date !!}" type="text" required  class="check-availability form-control input-sm">
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

                                <option value="{!! $doctor->id !!}" @if($doctor_id == $doctor->id && empty($staff_id)) selected @endif  @if( !empty($staff_id) && $staff_id==$doctor->id) selected @endif>{!! $doctor->fname.' '.$doctor->lname !!}</option>

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

                                <option value="{!! $location->id !!}" @if($location_id==$location->id) selected @endif>{!! $location->name !!}</option>

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

                                <option value="{!! $room->id !!}" data-room-name="{!! $room->name !!}" @if($room_id==$room->id) selected @endif>{!! $room->name !!}</option>

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
                    <textarea id="textarea2" name="notes" class="form-control" length="120"></textarea>
                </div>
            </div>
        </div>




        <div class="row">

            <div class="col-sm-12">
                <div class="form-group">

                <button class="btn btn-danger save-appointment" style="width:100%;">Book Appointment</button>
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

</div>

<script>





        var availabilty_checking_parameters = null;

        $(".check-availability").on('change',function(){
            $(".signal").hide();
           var start_time = $("input[name=start_time]").val();
           var end_time = $("input[name=end_time]").val();
           var appointment_date = $("input[name=appointment_date_start]").val();
           var doctor_id = $("select[name=doctor_id]").val();
           var location_id = $("select[name=location_id]").val();
            var room_id = $("select[name=room_id]").val();


            availabilty_checking_parameters = {doctor:doctor_id,selected_date:appointment_date,"_token":"{!! csrf_token() !!}",
                start_time:start_time,end_time:end_time,room:room_id,location:location_id};

            $.ajax({

                url:"/check_all_availability",

                type:"POST",

                data:availabilty_checking_parameters,

                success:function (response) {

                    response = $.parseJSON(response);

                    if(response){
                        var roomid = response.room;
                        var locationid = response.location;
                        var doctorid = response.doctor;
                        var doctor_un_available = response.doctor_un_available;

                        if(room_id!="" && room_id == roomid && location_id == locationid){
                           // alert('Room is already booked');
                            $(".room-response").html('Room is not available');
                            $(".room-response").show();
                        }
/*
                        if(location_id && location_id != "" && locationid!="" && location_id == locationid){

                            // alert('Room is already booked');
                            $(".location-response").html('Location is not available');
                            $(".location-response").show();
                        }

                        if(doctor_id!="" && doctor_id == doctorid){
                            // alert('Room is already booked');
                            $(".un_available_doctor_id").html('Doctor is not available');
                            $(".un_available_doctor_id").show();
                        }*/


                        if(doctor_id && doctor_id!="" && doctor_id != doctorid  && doctor_un_available!="" && doctor_un_available > 0){
                            // alert('Room is already booked');
                            $(".un_available_doctor_id").html('Doctor is not available');
                            $(".un_available_doctor_id").show();
                        }

                    }

                }

            });
        });

        $('.time').timepicker({
            timeFormat : "H:i",
            show2400: true,
            scrollDefault: 'now',

            step:5
        });

        $('.time').focusin(function(){
            if($(this).val()!="")
                $(this).val('');
        });

        //$( ".datepicker" ).removeClass('hasDatepicker');

       // $('#country_area_code').material_select('destroy');

        $('#country_area_code').select2({dropdownAutoWidth : 'true'});

       // const appointment_panel = new PerfectScrollbar('#appointment-panel');



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

 //   $(".un_available_doctor_id").html('This doctor is not available for selected date');

  //  $(".un_available_doctor_id").fadeIn();

}
else {
  //  $(".un_available_doctor_id").fadeOut();
}

var staff_id = "{!! $staff_id !!}"



        if(staff_id > 0 ){

            var start_time = $(".start_time ").val();

            var end_time = $(".end_time ").val()


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

                    var start_time = $(".start_time").val();

                    var end_time = $(".end_time").val();



                }

        }

        });










        $('#end_time').on('changeTime', function () {

//            alert('hello world');

            is_end_date_changed = true;

            var start_time = $(".start_time").val();

            var end_time = $(this).val();

            var selected_date = $("input[name=appointment_date_start]").val();





        });



   //     $('select[name=end_time]').material_select('destroy');







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

                                       $("#appointment-panel").modal('hide');



                                   });



                               $(".sweet-alert.showSweetAlert > .sa-button-container").html('<button class="action-button red" data-action="add">Add anyway</button> <button class="action-button green" data-action="completed">Confirm</button> <button class="action-button blue" data-action="cancelled">Cancel</button> <button class="action-button orange" data-action="re-schedule">Re-schedule</button>  <button class="action-button red" data-action="deleted">Delete</button>   <button class="action-button black confirm" data-action="ok">Done</button>');





                             ///  $(".confirm")

                               $(".action-button").click(function(){

                                   var action = $(this).attr('data-action');



                                   switch (action){

                                       case "ok":

                                           $(".sweet-overlay").remove();

                                           $(".sweet-alert").remove();

                                           $("#appointment-panel").modal('hide');

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

                                                   $("#appointment-panel").modal('hide');

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



                                                   $(".start_time").val(response_detail.start);








                                                   $("select.services").val(response_detail.services);

                                                   $("select.services"). select2().trigger('change');



                                                   $("select.doctors_staff").val(response_detail.doctor);

                                                   $("select.doctors_staff"). select2().trigger('change');



                                                 //  $("select.patient").val(response_detail.patient);

                                                //   $("select.patient"). select2().trigger('change');

setTimeout(function(){

    $(".end_time").val(response_detail.end);




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

            var start_time = $(".start_time").val();

            var end_time = $(".end_time").val();



            if((un_available_doctor_id==$(this).val() && choose_date==$("input[name=appointment_date_start]").val())){



                $(".un_available_doctor_id").html('This doctor is not available for selected date');

                $(".un_available_doctor_id").fadeIn();

            }else{



            }

        });

        $('#appointment-panel select.rooms').select2({

            //  placeholder: "Choose Start Time ",

            dropdownAutoWidth : 'true',



        }).on('change',function(){

            var room_id = $(this).val();

            $(".room-response").hide();

            //$(".location-response").hide();

            var start_time = $(".start_time").val();

            var end_time = $(".end_time").val();

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



            var start_time = $(".start_time").val();

            var end_time = $(".end_time").val();

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

                        $('.alert-success-appointment').html(response.message);
                        $('.alert-success-appointment').fadeIn();
                        calendar.fullCalendar('refetchEvents');

                        setTimeout(function(){$('.alert-success-appointment').fadeOut();
                            $("#slide-booking-form")[0].reset();
                            $(".new-patient-info").hide();

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







    function patient_result_template(patient){



        if(patient.id > 0)

        var $patient = $('<div class="patient-container">'+



                '<div class="patient-info">'+

                '<h5>'+patient.text+'</h5>'+

                '<p class="inner-text"><i class="icon-key"></i> '+patient.patient_unique_id+'  '+

                '<i class="icon-phone2" style="margin-left: 20px"></i> '+patient.patient_phone+'</p>'+

                '</div>'+

            '</div>');

        else

            var $patient = patient.text;

        return $patient;

    }

</script>