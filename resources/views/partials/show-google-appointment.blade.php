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
            <a href="#!" class="text-danger mb-1">  <h6 class="mb-0">{{ $appointment->summary }} </h6></a>
            <span class="text-muted"><i class="icon-calendar3"></i> {{ date('l d.m.Y', strtotime($appointment->start->dateTime)) }} <i class="icon-watch"></i>  {{ date('H:i A', strtotime($appointment->start->dateTime)) }} -   {{ date('H:i A', strtotime($appointment->end->dateTime)) }}</span>

        </div>









    </div>


</div>
    
    @endif