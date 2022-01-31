
<div class="card">
    <div class="card-content">
        @if(isset($appointments) && !is_null($appointments))
            <ul class="collapsible popout">
                @foreach($appointments as $key=>$appointment)

                    <li @if($key==0) class="active" @endif>
                        <div class="collapsible-header @if($key==0) active @endif"><i class="material-icons">date_range</i> {!! $appointment->service_name !!} at {!! date('d.M.Y', strtotime($appointment->booking_date)) !!}</div>
                        <div class="collapsible-body" @if($key==0) style="display: block" @endif><span>
                                                     <ul class="appointment-info">
                                                        <li >
                                                           <div class="col s1"><i class="material-icons m-top-10">access_time</i></div>  <div class="col s10">

                                                                    <div class="appointment-booking-date">{{ date('l d.m.Y', strtotime($appointment->booking_date)) }} </div>


                                                                <div class="appointment-time-slots blue-grey-text lighten-5">{{ date('H:i A', strtotime($appointment->start_time)) }} -   {{ date('H:i A', strtotime($appointment->end_time)) }}</div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col s1"> <i class="material-icons m-top-5">local_hospital</i></div>
                                                            <div class="col s10">Dr. {{ $appointment->fname.' '.$appointment->lname }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="col s1"> <i class="material-icons m-top-5">vpn_key</i></div>
                                                            <div class="col s10">{{ $appointment->room_name }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="col s1"> <i class="material-icons m-top-5">location_on</i></div>
                                                            <div class="col s10">{{ $appointment->location_name }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="col s1"> <i class="material-icons m-top-5">comment</i></div>
                                                            <div class="col s10">{{ $appointment->notes }}</div>
                                                        </li>
                                                    </ul>
                                                    <div style="clear: both"></div>
                                                </span></div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

<script>
    $(function(){
        $('.collapsible').collapsible();

    })
</script>