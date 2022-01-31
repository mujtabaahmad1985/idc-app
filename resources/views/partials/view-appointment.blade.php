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
                        @if(in_array(46,$permissions_allowed) || Auth::user()->role=='administrator')
                        <a href="#" class="dropdown-item edit-appointment" data-appointment-id="{!! $user_info['id'] !!}" data-patient-name="{{ $user_info['patient_name'] }} - {{ $user_info['patient_unique_id'] }}"><i class="icon-pencil5"></i> Re-schedule</a>
                        @endif
                            <a href="#" class="dropdown-item appointment-action"  data-action="cancelled"><i class="icon-cancel-square"></i> Cancel Appointment </a>
                        <div class="dropdown-divider"></div>
                        <a href="/patient/view/{!! $user_info['patient_id'] !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                        <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $user_info['patient_id'] !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                        <div class="dropdown-divider"></div>
                    {{--    <a href="/view/treatment-cards/{!! $user_info['patient_id'] !!}" class="dropdown-item"><i class="icon-book2"></i> Treatment Record</a>--}}
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




    @else
<style>
    label.error{ color: #FF0000;}
</style>
<div class="col s1 right"><a href="#!" class="grey-text close modal-action modal-close"></a>  </div>
    <label class="error">You have not granted for viewing appointment, contact administrator.</label>
    @endif