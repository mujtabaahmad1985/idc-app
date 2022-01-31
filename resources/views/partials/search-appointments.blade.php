@if(isset($appointments) && $appointments->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped appointments-table">
            <thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($appointments as $appointment)
                <tr class="searched-show-appointment" data-appointment-id="{!! $appointment->id !!}" style="cursor: pointer">
                    <td width="5%"><span class="font-weight-semibold font-size-lg">{!! date('d',strtotime($appointment->booking_date)) !!}</span></td>
                    <td width="10%"><span class="font-size-base">{!! date('M.Y, D',strtotime($appointment->booking_date)) !!}</span> </td>
                    <td width="15%"><span class="text-muted">{!! date('H:i A',strtotime($appointment->start_time)) !!} - {!! date('H:i A',strtotime($appointment->end_time)) !!}</span> </td>
                    <td width="55%"> {!! $appointment->doctor_services->service_name !!} with <span class="font-weight-semibold">Dr. {!! $appointment->doctors->fname !!} {!! $appointment->doctors->lname !!}</span></td>
                    <td width="15%">
                        <div class="ml-3 text-right">
                            <div class="list-icons">
                                <div class="list-icons-item dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                        <a href="#!" class="dropdown-item edit" data-action="edit" data-id="{!! $appointment->id !!}"><i class="icon-pencil3"></i> Re-Schedule</a>
                                        <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $appointment->id !!}"><i class="icon-trash"></i> Cancel</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="alert bg-danger text-white text-center" style="display: block">

        No appointment found!.
    </div>
@endif