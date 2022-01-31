<div class="table-responsive">
    <table class="table text-nowrap">
        <thead>
        <tr>
            <th style="width: 20%">Due</th>

            <th width="55%">Service</th>
            <th width="10%"></th>
            <th class="text-center" style="width: 10%;"><i class="icon-arrow-down12"></i></th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-active table-border-double">
            <td colspan="3">Patient's Appointments</td>

            <td class="text-right"> @if(isset($appointments) && $appointments->count() > 0)
                    <span class="badge bg-danger badge-pill">{!! $appointments->count() !!}</span> @endif
            </td>

        </tr>

        @if(isset($appointments) && $appointments->count() > 0)
            @foreach($appointments as $appointment)
            <tr>
                <td><span class="text-muted">{!! date('H:i A',strtotime($appointment->start_time)) !!} - {!! date('H:i A',strtotime($appointment->end_time)) !!}  </span>
                        <span class="font-weight-semibold font-size-lg ml-2">{!! date('d',strtotime($appointment->booking_date)) !!}</span>
                    <span class="font-size-base  ml-1">{!! date('M.Y, D',strtotime($appointment->booking_date)) !!}</span>
                </td>

                <td> {!! $appointment->doctor_services->service_name !!} with <span class="font-weight-semibold">Dr. {!! $appointment->doctors->fname !!} {!! $appointment->doctors->lname !!}</span></td>
                <td>
                    @php

                        $datetime = $appointment->booking_date.' '.$appointment->start_time;

                        $created = new \Carbon\Carbon($datetime);
                        $c = $created->format('Y-m-d');

                        $t = date('Y-m-d');
                        $today = $t==$c?"today":"";
                    $now = \Carbon\Carbon::now()->toDateString();;
                    $now = new \Carbon\Carbon($now);

                    $difference = ($created->diff($now)->days < 1)
                        ? 'today'
                        : $created->diffInDays($now,false);



                    @endphp
                    @if($appointment->status=='pending')
                        @if( $difference < 1 && $difference!='today')
                            <span class="badge bg-info-400">{!! $created->diff($now)->days !!} Days remaining</span>
                        @elseif( $difference == 'today')
                            <span class="badge bg-warning-400">Due today</span>
                            @elseif($difference >=1)

                            <span class="badge bg-danger-400">{!! $created->diff($now)->days !!} Day overdue </span>
                        @endif
                    @endif

                    @if($appointment->status=='completed')
                        <span class="badge bg-success-400">{!! $appointment->status !!}</span>
                    @endif
                    @if($appointment->status=='cancelled')
                        <span class="badge bg-warning-400">{!! $appointment->status !!}</span>
                    @endif

                </td>
                <td>
                    <div class="ml-3">
                        <div class="list-icons">
                            <div class="list-icons-item dropdown">
                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                    <a href="#!" class="dropdown-item appointment-actions" data-action="view" data-id="{!! $appointment->id !!}"><i class="icon-eye"></i> View Appointment</a>

                                    @if($appointment->status=='pending')

                                    <div class="dropdown-divider"></div>
                                    <a href="#!" class="dropdown-item appointment-actions" data-action="send-reminder" data-patient-id="{!! $appointment->patient !!}" data-id="{!! $appointment->id !!}"><i class="icon-envelop4"></i> Send Reminder</a>
                                        @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>

    </table>
</div>