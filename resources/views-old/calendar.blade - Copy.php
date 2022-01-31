@extends('layout.app')
@section('page-title') Calendar @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/prism/prism.css') !!}
    {!! Html::style('public/material/js/plugins/chartist-js/chartist.min.css') !!}
    {!! Html::style('public/material/js/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
    {!! Html::style('public/material/js/plugins/fullcalendar/css/fullcalendar.min.css') !!}
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/js/plugins/jsgrid/css/jsgrid.min.css') !!}
@endsection

@section('content')
    <!-- START CONTENT -->
    <section id="content">

    @include('partials.breadcrumb')


    <!--start container-->
        <div class="container">

            <div class="card" style="overflow: visible">
                <div class="card-content">
                    <div class="row">
                        <div class="col s2">
                            <select class="doctors" multiple>
                                <option value="" selected disabled="">All Doctors</option>
                                @if(isset($doctors) && count($doctors) > 0)

                                    @foreach($doctors as $doctor)
                                        <option value="{!! $doctor->id !!}">{!! $doctor->fname.' '.$doctor->lname !!}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col s2">
                            <select class="locations" multiple>
                                <option value="" selected disabled="">All Locations</option>
                                @if(isset($locations) && count($locations) > 0)

                                    @foreach($locations as $location)
                                        <option value="{!! $location->id !!}">{!! $location->name !!}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col s2">
                            <select class="services_" multiple>
                                <option value="" selected disabled="">All Services</option>
                                @if(isset($services) && count($services) > 0)

                                    @foreach($services as $service)
                                        <option value="{!! $service->id !!}" data-duration="{!! date('H:i', strtotime($service->duration)) !!}">{!! $service->service_name !!}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col s2">
                            <select class="appointments" multiple>
                                <option value="" selected disabled="">Active Appointments</option>
                                <option value="unconfirmed">Unconfirmed</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="rebook_cancelled">Rebooked/Cancelled</option>
                            </select>
                        </div>
                        <div class="col s2 day-options" style="display: none;">
                            <a class="btn-floating btn-large red calendar-options"  data-option="room" style="font-size:0.8rem">Rooms</a>
                            <a class="btn-floating btn-large red calendar-options"  data-option="staff" style="font-size:0.8rem">Staff</a>
                        </div>
                        <div class="col s2 right right-align">
                            <a class="waves-effect waves-light red btn add-appointment" style="width:140px; font-size: 0.8rem"><i class="material-icons left">add</i> Book</a>
                            <a class="waves-effect waves-light red btn m-top-5" style="width:140px; font-size: 0.8rem"> Block Time</a>
                        </div>

                    </div>
                </div>
            </div>


                <div id="full-calendar">
                    <div class="row">

                        <div class="col s12 m12 l12">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>



        </div>

        <!--end container-->
        <style>
            .modal{ width: 48%;}
            .picker__holder{overflow: hidden; background: none}
            .option-buttons{
                height: 100px;
                width: 100%;
                font-size: 25px;
                line-height: 42px;
            }
        </style>
        <div id="appointment-modal" class="modal" style="min-height: 90%; top:5% !important">



            <div class="modal-content">

                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">

                                    <select class="services">
                                        <option value="" disabled="">Choose Service</option>
                                        @if(isset($services) && count($services) > 0)

                                            @foreach($services as $service)
                                                <option value="{!! $service->id !!}" data-duration="{!! date('H:i', strtotime($service->duration)) !!}">{!! $service->service_name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="patient_name" type="text" class="autocomplete">
                                    <label for="patient_name" class="">Patient Name</label>
                                </div>


                            </div>
                            <div class="row">
                                <div class="input-field col s3">
                                    <i class="material-icons prefix">access_time</i>
                                    <input id="start_time" type="text" class="timepicker">
                                    <label for="start_time" class="">Start Time</label>
                                </div>
                                <div class="input-field col s3">
                                    <i class="material-icons prefix">access_time</i>
                                    <input id="end_time" type="text" class="timepicker">
                                    <label for="end_time" class="">End Time</label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">access_time</i>
                                    <input id="appointment_date" type="text"  class="datepicker">
                                    <label for="appointment_date" class="">Choose Date</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12">

                                    <select class="locations">

                                        <option value="" disabled selected>Choose Location</option>
                                        @if(isset($locations) && count($locations) > 0)

                                            @foreach($locations as $location)
                                                <option value="{!! $location->id !!}">{!! $location->name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12">

                                    <select class="rooms">

                                        <option value="" disabled selected>Choose Rooms</option>
                                        @if(isset($rooms) && count($rooms) > 0)

                                            @foreach($rooms as $room)
                                                <option value="{!! $room->id !!}">{!! $room->name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12">

                                    <select class="doctors_staff">

                                        <option value="" disabled="" selected>Choose Staff</option>
                                        @if(isset($doctors) && count($doctors) > 0)

                                            @foreach($doctors as $doctor)
                                                <option value="{!! $doctor->id !!}">{!! $doctor->fname.' '.$doctor->lname !!}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="textarea2" class="materialize-textarea" length="120"></textarea>
                                    <label for="textarea1" class="">Notes</label>
                                    <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span></div>
                            </div>
                        </form>
                    </div>

            </div>
            <div class="modal-footer">
                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Close</a>
                <a href="#" class="waves-effect waves-green btn-flat modal-action">Book Appointment</a>
            </div>
        </div>


    </section>
    <!-- END CONTENT -->
@endsection



@section('js')

    {!! Html::script('public/material/js/materialize_new.js') !!}
    {!! Html::script('public/plugins/clockface/js/clockface.js') !!}
    {!! Html::script('public/plugins/jquery.slimscroll/js/jquery.slimscroll.min.js') !!}
    {!! Html::script('public/material/js/plugins/fullcalendar/lib/jquery-ui.custom.min.js') !!}
    {!! Html::script('public/material/js/plugins/fullcalendar/lib/moment.min.js') !!}
    {!! Html::script('public/material/js/plugins/dropify/js/dropify.min.js') !!}
    {!! Html::script('public/material/js/plugins/editable-table/mindmup-editabletable.js') !!}
    {!! Html::script('public/material/js/plugins/editable-table/numeric-input-example.js') !!}
    {!! Html::script('public/material/js/plugins/fullcalendar/js/fullcalendar.min.js') !!}
    {!! Html::script('public/material/js/fullcalendar.min.js') !!}
    {!! Html::script('public/material/js/scheduler.min.js') !!}


    <script>
        $(function () {
            $(".add-appointment").click(function(){
                $('#appointment-modal').modal('open');;
            });
                        $(".calendar-options").click(function(){
                            var options = $(this).attr('data-option');
                            $("#calendar").fullCalendar('destroy');
                            $(".day-options").hide();
                            switch(options){
                                case "day":
                                    $(".day-options").show();
                                    $("#calendar").fullCalendar({
                                        defaultView: 'agendaDay',
                                        allDaySlot:false,
                                        editable: true,
                                        selectable: true,
                                        eventLimit: true, // allow "more" link when too many events
                                        slotDuration: "00:15:00",
                                        slotMinutes: 15,
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
                                            left: 'prev,next today',
                                            center: 'title',
                                            right: 'agendaDay,agendaTwoDay,agendaWeek,month'
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
                                            //  alert();
                                            var duration = $(".services").find(":selected").data("duration");
                                            ;


                                            var d = new Date(date.format());
                                            var selected_date = d.getDay()+"/"+d.getMonth()+"/"+d.getFullYear();
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

                                            $('#appointment-modal').modal('open');;
                                            //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                                            // change the day's background color just for fun

                                        },
                                        buttonText: {
                                            today: 'Today',
                                            month: 'Month',
                                            week: 'Week',
                                            day: 'Day'
                                        },
                                        //// uncomment this line to hide the all-day slot
                                        //allDaySlot: false,

                                        /*resources: [
                                        @foreach($rooms as $room)
                                        { id: '{!! $room->short_name !!}', title: '{!! $room->name !!}' },
                                        @endforeach


                                        ],*/
                                        events: [
                                            { id: '1', resourceId: 'a', start: '2017-10-06', end: '2017-10-08', title: 'event 1' },
                                            { id: '2', resourceId: 'a', start: '2017-10-07T09:00:00', end: '2017-10-07T14:00:00', title: 'event 2' },
                                            { id: '3', resourceId: 'b', start: '2017-10-07T12:00:00', end: '2017-10-08T06:00:00', title: 'event 3' },
                                            { id: '4', resourceId: 'b', start: '2017-10-07T07:30:00', end: '2017-10-07T09:30:00', title: 'event 4' },
                                            { id: '5', resourceId: 'a', start: '2017-10-07T10:00:00', end: '2017-10-07T15:00:00', title: 'event 5' }
                                        ],

                                        select: function(start, end, jsEvent, view, resource) {
                                            console.log(
                                                'select',
                                                start.format(),
                                                end.format(),
                                                resource ? resource.id : '(no resource)'
                                            );
                                        },

                                    });
                                    break;
                                case "week":
                                    $("#calendar").fullCalendar({
                                        defaultView: 'agendaWeek',
                                        allDaySlot:false,
                                        editable: true,
                                        selectable: true,
                                        eventLimit: true, // allow "more" link when too many events
                                        slotDuration: "00:15:00",
                                        slotMinutes: 15,
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
                                            left: 'prev,next today',
                                            center: 'title',
                                            right: 'agendaDay,agendaTwoDay,agendaWeek,month'
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
                                            //  alert();
                                            var duration = $(".services").find(":selected").data("duration");
                                            ;


                                            var d = new Date(date.format());
                                            var selected_date = d.getDay()+"/"+d.getMonth()+"/"+d.getFullYear();
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

                                            $('#appointment-modal_new').modal('open');;
                                            //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                                            // change the day's background color just for fun

                                        },
                                        buttonText: {
                                            today: 'Today',
                                            month: 'Month',
                                            week: 'Week',
                                            day: 'Day'
                                        },
                                        //// uncomment this line to hide the all-day slot
                                        //allDaySlot: false,

                                        /*resources: [
                                        @foreach($rooms as $room)
                                        { id: '{!! $room->short_name !!}', title: '{!! $room->name !!}' },
                                        @endforeach


                                        ],*/
                                        events: [
                                            { id: '1', resourceId: 'a', start: '2017-10-06', end: '2017-10-08', title: 'event 1' },
                                            { id: '2', resourceId: 'a', start: '2017-10-07T09:00:00', end: '2017-10-07T14:00:00', title: 'event 2' },
                                            { id: '3', resourceId: 'b', start: '2017-10-07T12:00:00', end: '2017-10-08T06:00:00', title: 'event 3' },
                                            { id: '4', resourceId: 'b', start: '2017-10-07T07:30:00', end: '2017-10-07T09:30:00', title: 'event 4' },
                                            { id: '5', resourceId: 'a', start: '2017-10-07T10:00:00', end: '2017-10-07T15:00:00', title: 'event 5' }
                                        ],

                                        select: function(start, end, jsEvent, view, resource) {
                                            console.log(
                                                'select',
                                                start.format(),
                                                end.format(),
                                                resource ? resource.id : '(no resource)'
                                            );
                                        },

                                    });
                                    break;
                                case "month":
                                    $("#calendar").fullCalendar({
                                        defaultView: 'month',
                                        allDaySlot:false,
                                        editable: true,
                                        selectable: true,
                                        eventLimit: true, // allow "more" link when too many events
                                        slotDuration: "00:15:00",
                                        slotMinutes: 15,
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
                                            left: 'prev,next today',
                                            center: 'title',
                                            right: 'agendaDay,agendaTwoDay,agendaWeek,month'
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
                                            //  alert();
                                            var duration = $(".services").find(":selected").data("duration");
                                            ;


                                            var d = new Date(date.format());
                                            var selected_date = d.getDay()+"/"+d.getMonth()+"/"+d.getFullYear();
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

                                            $('#appointment-modal_new').modal('open');;
                                            //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                                            // change the day's background color just for fun

                                        },
                                        buttonText: {
                                            today: 'Today',
                                            month: 'Month',
                                            week: 'Week',
                                            day: 'Day'
                                        },
                                        //// uncomment this line to hide the all-day slot
                                        //allDaySlot: false,

                                        /*resources: [
                                        @foreach($rooms as $room)
                                        { id: '{!! $room->short_name !!}', title: '{!! $room->name !!}' },
                                        @endforeach


                                        ],*/
                                        events: [
                                            { id: '1', resourceId: 'a', start: '2017-10-06', end: '2017-10-08', title: 'event 1' },
                                            { id: '2', resourceId: 'a', start: '2017-10-07T09:00:00', end: '2017-10-07T14:00:00', title: 'event 2' },
                                            { id: '3', resourceId: 'b', start: '2017-10-07T12:00:00', end: '2017-10-08T06:00:00', title: 'event 3' },
                                            { id: '4', resourceId: 'b', start: '2017-10-07T07:30:00', end: '2017-10-07T09:30:00', title: 'event 4' },
                                            { id: '5', resourceId: 'a', start: '2017-10-07T10:00:00', end: '2017-10-07T15:00:00', title: 'event 5' }
                                        ],

                                        select: function(start, end, jsEvent, view, resource) {
                                            console.log(
                                                'select',
                                                start.format(),
                                                end.format(),
                                                resource ? resource.id : '(no resource)'
                                            );
                                        },

                                    });
                                    break;
                                case "room":
                                    $(".day-options").show();
                                    $("#calendar").fullCalendar({
                                        defaultView: 'agendaDay',
                                        allDaySlot:false,
                                        editable: true,
                                        selectable: true,
                                        eventLimit: true, // allow "more" link when too many events
                                        slotDuration: "00:15:00",
                                        slotMinutes: 15,
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
                                            left: 'prev,next today',
                                            center: 'title',
                                            right: 'agendaDay,agendaTwoDay,agendaWeek,month'
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
                                            //  alert();
                                            var duration = $(".services").find(":selected").data("duration");
                                            ;


                                            var d = new Date(date.format());
                                            var selected_date = d.getDay()+"/"+d.getMonth()+"/"+d.getFullYear();
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

                                            $('#appointment-modal_new').modal('open');;
                                            //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                                            // change the day's background color just for fun

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
                                        @foreach($rooms as $room)
                                        { id: '{!! $room->short_name !!}', title: '{!! $room->name !!}' },
                                        @endforeach


                                        ],
                                        events: [
                                            { id: '1', resourceId: 'a', start: '2017-10-06', end: '2017-10-08', title: 'event 1' },
                                            { id: '2', resourceId: 'a', start: '2017-10-07T09:00:00', end: '2017-10-07T14:00:00', title: 'event 2' },
                                            { id: '3', resourceId: 'b', start: '2017-10-07T12:00:00', end: '2017-10-08T06:00:00', title: 'event 3' },
                                            { id: '4', resourceId: 'b', start: '2017-10-07T07:30:00', end: '2017-10-07T09:30:00', title: 'event 4' },
                                            { id: '5', resourceId: 'a', start: '2017-10-07T10:00:00', end: '2017-10-07T15:00:00', title: 'event 5' }
                                        ],

                                        select: function(start, end, jsEvent, view, resource) {
                                            console.log(
                                                'select',
                                                start.format(),
                                                end.format(),
                                                resource ? resource.id : '(no resource)'
                                            );
                                        },

                                    });
                                    break;
                                case "staff":
                                    $(".day-options").show();
                                    $("#calendar").fullCalendar({
                                        defaultView: 'agendaDay',
                                        allDaySlot:false,
                                        editable: true,
                                        selectable: true,
                                        eventLimit: true, // allow "more" link when too many events
                                        slotDuration: "00:15:00",
                                        slotMinutes: 15,
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
                                            left: 'prev,next today',
                                            center: 'title',
                                            right: 'agendaDay,agendaTwoDay,agendaWeek,month'
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
                                            //  alert();
                                            var duration = $(".services").find(":selected").data("duration");
                                            ;


                                            var d = new Date(date.format());
                                            var selected_date = d.getDay()+"/"+d.getMonth()+"/"+d.getFullYear();
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

                                            $('#appointment-modal_new').modal('open');;
                                            //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                                            // change the day's background color just for fun

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
                                        @if(isset($doctors) && count($doctors) > 0)

                                        @foreach($doctors as $doctor)
                                        { id: '{!! $doctor->id !!}', title: '{!! $doctor->fname.' '.$doctor->lname !!}' },
                                            @endforeach
                                            @endif



                                        ],
                                        events: [
                                            { id: '1', resourceId: 'a', start: '2017-10-06', end: '2017-10-08', title: 'event 1' },
                                            { id: '2', resourceId: 'a', start: '2017-10-07T09:00:00', end: '2017-10-07T14:00:00', title: 'event 2' },
                                            { id: '3', resourceId: 'b', start: '2017-10-07T12:00:00', end: '2017-10-08T06:00:00', title: 'event 3' },
                                            { id: '4', resourceId: 'b', start: '2017-10-07T07:30:00', end: '2017-10-07T09:30:00', title: 'event 4' },
                                            { id: '5', resourceId: 'a', start: '2017-10-07T10:00:00', end: '2017-10-07T15:00:00', title: 'event 5' }
                                        ],

                                        select: function(start, end, jsEvent, view, resource) {
                                            console.log(
                                                'select',
                                                start.format(),
                                                end.format(),
                                                resource ? resource.id : '(no resource)'
                                            );
                                        },

                                    });
                                    break;
                            }

                        });
          //  $('#payment-table').editableTableWidget();
            $(".appointment .tab").click(function(){
                var type = $(this).attr('data-action');

                switch (type){
                    case 'payments':
                            var services = [];
                            var doctors = [];
                            var price = [];
                            $("#services .services").each(function(){
                                if($(this).val()!="")
                                services.push($(this).val());
                            });
                        $("#services .doctors").each(function(){
                            if($(this).val()!="")
                                doctors.push($(this).val());
                        });

                        $("#services .price").each(function(){
                            if($(this).val()!="")
                                price.push($(this).val());
                        });

                        $.each(services, function(i,v){
                            $("#payment-table tbody").append("<tr>" +$("#payment-table tbody tr#clone").html()+"</tr>");
                        });

                        break;

                }
            });
            $('.dropify').dropify();
            var height = parseInt($('.slimScrollDiv').css('max-height'));
            $(".clock").on("focus", function () {
                $(this).timepicker("showWidget");
            });

            $(".add-more-service").click(function () {
                var row = $("#services table tbody tr:first").html();
                $("#services table tbody tr:last").after('<tr>'+row+'</tr>');
                $('select').material_select();
                $("select.services").on('change', function () {
                    var duration = "";
                    var total_duration = 0;
                    var add_minute = 0;
                    var total_price = 0;
                    $("select.services").each(function () {
                        duration = $(this).find(":selected").data("duration");
                        duration = (duration.split(':'));
                        add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                        total_duration+=add_minute;
                        var price = $(this).find(":selected").data("price");
                        price = parseFloat(price);
                        total_price+=price;
                    });
                    $("#total-cost").html("$"+total_price+".00");
                    add_minute = total_duration;

                    var price = $(this).find(":selected").data("price");
                    $(this).parents('tr').find('.price').val(price);
                   // duration = (duration.split(':'));
                    //var add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                    // alert(add_minute);
                    var time = $("#start_time").val();
                    //alert(time);
                    if (time != "") {
                        // time = time.split(' ');
                        //  var d = new Date('7:00:00');
                       //   alert(time+":"+add_minute);
                        var minutes = moment(time, 'h:mm:ss A').add(add_minute, 'minutes');
                        var d = new Date(minutes);
                        var hours = d.getHours();
                        var minutes = d.getMinutes();
                        var ampm = hours >= 12 ? 'PM' : 'AM';
                        hours = hours % 12;
                        hours = hours ? hours : 12; // the hour '0' should be '12'
                        minutes = minutes < 10 ? '0' + minutes : minutes;
                        var strTime = hours + ':' + minutes + ' ' + ampm;
                        $("#end_time").val(strTime);
                        $("#end_time").focusin();
                    }


                });
                $(".price").keyup(function () {
                    var price = 0;
                    $(".price").each(function () {
                        price+=parseFloat($(this).val());
                    });
                    $("#total-cost").html("$"+price+".00");
                });
            });

            $(".price").keyup(function () {
                var price = 0;
                $(".price").each(function () {
                    price+=parseFloat($(this).val());
                });
                $("#total-cost").html("$"+price+".00");
            });

            var area_code_default = $("#country_area_code option:selected").val();
            if(area_code_default)
                $("#contact_number").val("+"+area_code_default+" ");
            $("#country_area_code").change(function(){
                var area_code = $(this).val();
                $("#contact_number").val("+"+area_code+" ");
                $("#contact_number").focus();
            });
            var c =1;

            $(".existing").click(function(){
                $('#option-modal').modal('close');;
                $('#appointment-modal').modal('open');;
            });

           $("select.services").on('change', function () {
               var duration = "";
               var total_duration = 0;
               var add_minute = 0;
               var total_price = 0;
               $("select.services").each(function () {
                   duration = $(this).find(":selected").data("duration");
                   duration = (duration.split(':'));
                   add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                   total_duration+=add_minute;
                   var price = $(this).find(":selected").data("price");
                   price = parseFloat(price);
                   total_price+=price;
               });
               $("#total-cost").html("$"+total_price+".00");
               add_minute = total_duration;
               var price = $(this).find(":selected").data("price");
               $(this).parents('tr').find('.price').val(price);

              //  var add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                // alert(add_minute);
                var time = $("#start_time").val();
                if (time != "") {

                    // time = time.split(' ');
                    //  var d = new Date('7:00:00');
                    var minutes = moment(time, 'h:mm:ss A').add(add_minute, 'minutes');
                    var d = new Date(minutes);
                    var hours = d.getHours();
                    var minutes = d.getMinutes();
                    var ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    var strTime = hours + ':' + minutes + ' ' + ampm;
                    //alert(strTime);
                    $("#end_time").val(strTime);
                    $("#end_time").focusin();
                }


            });
            $('#clockface-basic-example').clockface();


            $(".close-book-appointment").click(function () {
                // alert();
                $(".make-booking").dropdown('toggle', 'open')
                $(".sidebar-extra .sidebar-extra-scroller").css({'right': '-280px'});
                $(".sidebar-extra").removeAttr('style');
            });

            $('#slide-out input.autocomplete').autocomplete({
                data: {
                    "Mujtaba Ahmad": null,
                    "Marlar Tun": null,
                    "Lwis": null
                },
                limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
                onAutocomplete: function(val) {
                    // Callback function when value is autcompleted.
                    $('#appointment-modal').modal('open');;

                },
                minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
            });
            $('.modal input.autocomplete').autocomplete({
                data: {
                    "Mujtaba Ahmad": null,
                    "Marlar Tun": null,
                    "Lwis": null
                },
                limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
                onAutocomplete: function(val) {
                    // Callback function when value is autcompleted.
                   // $('#appointment-modal').modal('open');;

                },
                minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
            });
            $("#calendar").fullCalendar({
                defaultView: 'agendaWeek',
                allDaySlot:false,
                editable: true,
                selectable: true,
                eventLimit: true, // allow "more" link when too many events
                slotDuration: "00:15:00",
                slotMinutes: 15,
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
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaDay,agendaTwoDay,agendaWeek,month'
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
                    //  alert();
                    var duration = $(".services").find(":selected").data("duration");
                    ;


                    var d = new Date(date.format());
                    var selected_date = d.getDay()+"/"+d.getMonth()+"/"+d.getFullYear();
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

                    $('#appointment-modal_new').modal('open');;
                    //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                    // change the day's background color just for fun

                },
                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    day: 'Day'
                },
                //// uncomment this line to hide the all-day slot
                //allDaySlot: false,

                /*resources: [
                    @foreach($rooms as $room)
                    { id: '{!! $room->short_name !!}', title: '{!! $room->name !!}' },
                    @endforeach


                ],*/
                events: [
                    { id: '1', resourceId: 'a', start: '2017-10-06', end: '2017-10-08', title: 'event 1' },
                    { id: '2', resourceId: 'a', start: '2017-10-07T09:00:00', end: '2017-10-07T14:00:00', title: 'event 2' },
                    { id: '3', resourceId: 'b', start: '2017-10-07T12:00:00', end: '2017-10-08T06:00:00', title: 'event 3' },
                    { id: '4', resourceId: 'b', start: '2017-10-07T07:30:00', end: '2017-10-07T09:30:00', title: 'event 4' },
                    { id: '5', resourceId: 'a', start: '2017-10-07T10:00:00', end: '2017-10-07T15:00:00', title: 'event 5' }
                ],

                select: function(start, end, jsEvent, view, resource) {
                    console.log(
                        'select',
                        start.format(),
                        end.format(),
                        resource ? resource.id : '(no resource)'
                    );
                },

            });
           // $('.fc-scroller').niceScroll({cursorcolor:"#F00"});
        })
    </script>
@endsection