

    <div class="row">

        <div class="col s12 m12 l12">
            <div id='calendar'></div>
        </div>
    </div>


<script>
    $(function(){

var go_to_date = "{!! $go_to_date !!}";

        calendar = $("#calendar").fullCalendar({
            minTime:start_calendar_time,
            maxTime:end_calendar_time,
            defaultView: 'agendaDay',
            allDaySlot:false,
            editable: true,
            selectable: true,
            eventLimit: true, // allow "more" link when too many events
            slotDuration: "00:15:00",
            slotMinutes: 15,
            navLinks: true,
            refetchResourcesOnNavigate: true,
            navLinkDayClick: function(date, jsEvent) {
                // alert(date);
                calendar.fullCalendar('changeView', 'agendaDay');
                calendar.fullCalendar('gotoDate', date);
            },
            /* eventConstraint: {
             start: moment().format('YYYY-MM-DD HH:mm'),
             //  end: '2100-01-01' // hard coded goodness unfortunately
             },
             businessHours: {
             start: moment().format('HH:mm'), /!* Current Hour/Minute 24H format *!/
             // end: '19:00', // 5pm? set to whatever
             dow: [0,1,2,3,4,5,6] // Day of week. If you don't set it, Sat/Sun are gray too
             },
             droppable: true, // this allows things to be dropped onto the calendar
             drop: function () {
             // is the "remove after drop" checkbox checked?
             if ($("#drop-remove").is(":checked")) {
             // if so, remove the element from the "Draggable Events" list
             $(this).remove();
             }
             },*/
            header: {
                left: 'prev,next today,default_calendar',
                center: 'title',
                right: 'agendaDay,agendaTwoDay,agendaWeek,month'
            },
            customButtons: {
                default_calendar: {
                    text: 'Default Calendar',
                    click: function() {
                        calendar.fullCalendar('changeView', 'agendaWeek');
                        calendar.fullCalendar('gotoDate');
                    }
                }
            },
            views: {
                agendaTwoDay: {
                    type: 'agenda',
                    duration: { days: 2 },

                    // views that are more than a day will NOT do this behavior by default
                    // so, we need to explicitly enable it
                    groupByResource: true

                    //// uncomment this line to group by day FIRST with resources underneath
                    //groupByDateAndResource: true
                }
            },
            dayClick: function (date, jsEvent, view) {

                var d = new Date(date.format());
                var selected_date = d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();

                var check = selected_date;

                var today = new Date();
                today =  today.getDate()+"."+(today.getMonth()+1)+"."+today.getFullYear();

                if(check < today)
                    return false;

                if (jsEvent.target.classList.contains('fc-bgevent')) {

                    un_available_doctor_id = jsEvent.target.attributes[1].nodeValue;
                    return false;

                }
                //  alert();
                var duration = $(".services").find(":selected").data("duration");
                ;


                var d = new Date(date.format());
                var selected_date =  d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();
                $("#appointment_date").val(selected_date);
                $("#appointment_date").focusin();
                //d.setMinutes();
                var hours = d.getHours();
                var minutes = d.getMinutes();
                var ampm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12;
                hours = hours ? hours : 12; // the hour '0' should be '12'
                minutes = minutes < 10 ? '0' + minutes : minutes;
                var strTime = hours + ':' + minutes + ' ' + ampm;
                $("#start_time").val(strTime);
                $("#start_time").focusin();
                var add_minute = 0;
                if (duration) {
                    duration = (duration.split(':'));
                    add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                    d.setMinutes(minutes + add_minute);
                    hours = d.getHours();
                    minutes = d.getMinutes();
                    ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    strTime = hours + ':' + minutes + ' ' + ampm;
                    $("#end_time").val(strTime);
                    $("#end_time").focusin();
                }

                $("#booking_type").val('appointment');
                $("#booking-appointment").animate({right:'0'});
                //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                // change the day's background color just for fun

            },
            eventConstraint: {
                start: moment().format('YYYY-MM-DD h:mm'),
                end:  moment().add(12, 'months').format('YYYY-MM-DD h:mm') // hard coded goodness unfortunately
            },
            buttonText: {
                today: 'Today',
                month: 'Month',
                week: 'Week',
                day: 'Day'
            },
            //// uncomment this line to hide the all-day slot
            //allDaySlot: false,

            resources: [

                { id: '{!! $room->id !!}', title: '{!! $room->name !!}' },



            ],
            dayClick: function (date, jsEvent, view,resource) {
                // alert(date);
                var d = new Date(date.format());
                var selected_date = d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();
                var  s_date = d.getTime();

                var check = s_date;

                var today = new Date();

                today = today.getTime();

                if(check < today){

                    $("#error-modal-message").text("You cannot book appointment in past date and time");
                    $("#error-modal").modal();
                    return false;

                }

                if (view.name === "month") {

                    calendar.fullCalendar('changeView', 'agendaDay');
                    calendar.fullCalendar('gotoDate', date);
                    return false;
                }
                var duration = $(".services").find(":selected").data("duration");
                ;


                var d = new Date(date.format());
                var selected_date = d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();

                $("#appointment_date").val(selected_date);
                $("#appointment_date").focusin();
                //d.setMinutes();
                var hours = d.getHours();
                var minutes = d.getMinutes();

                var ampm = "";//hours >= 12 ? 'PM' : 'AM';
                // hours = hours % 12;
                // hours = hours ? hours : 12; // the hour '0' should be '12'
                minutes = minutes < 10 ? '0' + minutes : minutes;
                var strTime = hours + ':' + minutes + ' ' + ampm;
                $("#start_time").val(strTime);
                $("#start_time").focus();
                var add_minute = 0;
                if (duration) {
                    duration = (duration.split(':'));
                    add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                    d.setMinutes(minutes + add_minute);
                    hours = d.getHours();
                    minutes = d.getMinutes();
                    ampm = "";//hours >= 12 ? 'PM' : 'AM';
                    //hours = hours % 12;
                    // hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    strTime = hours + ':' + minutes + ' ' + ampm;
                    $("#end_time").val(strTime);
                    $("#end_time").focusin();
                }
                /* $("#booking_type").val('appointment');
                 $("#booking-appointment").animate({right:'0'});*/
                $("#booking_type").val('appointment');
                // $("#booking-appointment").animate({right:'0'});
                $.ajax({
                    url:"/make/appointment",
                    type:"POST",
                    data:{"_token":"{!! csrf_token() !!}",strTime:strTime,selected_date:selected_date, patient_id:patient_id, patient_name:patient_name,doctor_id:doctor_id, room_id:resource.id,un_available_doctor_id:un_available_doctor_id},
                    success:function (response) {
                        var calendar = calendar;
                        $("#make-appointment").html(response);



                    }
                });
                $("#appointment-panel").modal();

                //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                // change the day's background color just for fun

            },
            events:function(start, end, timezone, callback){
                $.ajax({
                    url: '/appoinment/get_appointments/all/'+doctor_id,
                    dataType: 'json',

                    success: function(doc) {
                        //    console.log(doc);
                        var events = [];
                        $.ajax({
                            url: '/appoinment/get_appointments/all/0',
                            dataType: 'json',

                            success: function(doc) {
                                //    console.log(doc);
                                var events = [];
                                $(doc).each(function(i,v) {
                                    if(v.appointment_type=='appointment'){
                                        events.push({
                                            id: v.id,
                                            title: v.title,
                                            start: v.start, // will be parsed
                                            end: v.end, // will be parsed
                                            resourceId:v.room_id,
                                            color:v.appointment_type=='appointment'?v.room_color:v.color,
                                            status:v.status
                                        });
                                    }else{
                                        events.push({
                                            id: v.id,
                                            title: v.room_id || v.doctor_id?v.title:"These slots are blocked for all rooms",
                                            start: v.start, // will be parsed
                                            end: v.end, // will be parsed
                                            resourceIds:(v.room_id?[v.room_id]:room_ids),
                                            color:v.color,
                                            status:v.status,

                                        });
                                    }
                                });
                                callback(events);
                            }
                        });
                    }
                });
                /*$.ajax({
                 url: '/get/not-availabile/'+doctor_id,
                 dataType: 'json',

                 success: function(doc) {
                 console.log(doc);
                 var events = [];
                 $(doc).each(function(i,v) {
                 events.push({
                 id: v.id,
                 title: v.title,
                 start: v.start, // will be parsed
                 end: v.end, // will be parsed
                 rendering: 'background'
                 });
                 });

                 // events.push(j);
                 callback(events);
                 }
                 });*/
            },
            eventRender: function(event, element, view) {
                if (event.rendering == 'background') {
                    element.append(event.title);
                    element.attr('data-doctor-id',event.doctor_id);
                }
                // console.log(event);
                //alert("Start: "+event.start.format("YYYY-MM-DD hh:mma")+"<br> End: "+event.end.format("YYYY-MM-DD hh:mma"));
                /// alert(event.end);

            },

            eventClick:function(event, jsEvent, view){
                $("#show-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                $("#appointment-show-detail").modal();

                var appointment_id = event.id;
                // $("#patient-appointment").animate({right:'0'});
                // $("#patient-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                // return;
                $.ajax({
                    url:"/show/appointment/"+appointment_id,
                    success: function(doc){
                        $("#show-appointment").html(doc);

                        $(".close-patient-appointment").click(function(){
                            //  $("#patient-appointment").animate({right:'-360px'});
                        });


                    }
                });

            }
            ,
            eventDrop:function(event, delta, revertFunc){

                var id = event.id;
                var end_time = event.end.format();
                var start_time = event.start.format();

                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();
                $.ajax({
                    url: "/appointment/update_resize",
                    data:{id:id,end_time:end_time, start_time:start_time, "_token":"{!! csrf_token() !!}"},
                    type:"POST",
                    success:function(response){
                        if(response > 0){
                            $(".overlay .progress").hide();
                            $(".overlay .message").show();

                            setTimeout(function(){ $(".overlay").hide();}, 2500);
                        }
                    }
                });
            },

            eventResize:function(event, jsEvent, ui, view ){

                var id = event.id;
                var end_time = event.end.format();
                var start_time = event.start.format();

                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();
                $.ajax({
                    url: "/appointment/update_resize",
                    data:{id:id,end_time:end_time, start_time:start_time, "_token":"{!! csrf_token() !!}"},
                    type:"POST",
                    success:function(response){
                        if(response > 0){
                            $(".overlay .progress").hide();
                            $(".overlay .message").show();

                            setTimeout(function(){ $(".overlay").hide();}, 2500);
                        }
                    }
                });
            },
            viewRender: function () {
                var $todayButton = $('.fc-today-button');
                $todayButton.removeClass('fc-state-disabled');
                $todayButton.prop('disabled', false);
            },

        });
        calendar.fullCalendar('gotoDate',"{!! $go_to_date !!}");
        /*$(".save-appointment").unbind('click');
       /!* $(".save-appointment").on('click',function(e){
            $(".message").hide();
            $validation = $("#slide-booking-form").validate({
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
                            $("#booking-appointment").animate({right:'-360px'});
                        }, 2500);
                    }else{
                        $('.error-message').html(response.message);
                        $('.error-message').fadeIn();
                    }
                }).submit();
            }
            e.preventDefault();
        });*!/*/
    })
</script>