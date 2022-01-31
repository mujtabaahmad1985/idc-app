<div class="table-responsive">
<table class="table table-striped">
    <thead>

    <tr>
        <td width="25px">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="all"  >
                <label class="custom-control-label" for="all"></label>
            </div>
        </td>
        <th width="75px">Unique ID</th>
        <th width="15%">Patient Name</th>
        <th width="85px"> D.O.B</th>
        <th  width="5%">Gender</th>
        <th>Medical Conditions</th>
        <th width="100px">Flags</th>
        <th width="100px">Last Visit</th>
        <th width="100px">Total Visits</th>
        <th>Media</th>


        <th width="70px">Register at</th>
        <th width="50px">Actions</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($patients) && ($patients)->count() > 0)

        @foreach($patients as $patient)
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="patient{!! $patient->id !!}"   value="{!! $patient->id !!}" >
                        <label class="custom-control-label" for="patient{!! $patient->id !!}"></label>
                    </div>
                </td>
                <td>{!! $patient->patient_unique_id !!}</td>
                <td>


                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false">{!! ucwords($patient->patient_name) !!}</a>
                    @if(in_array(42,$permissions_allowed) || Auth::user()->role=='administrator')           <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                        <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                        <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                        <div class="dropdown-divider"></div>
                        <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $patient->id !!}"><i class="icon-history"></i> Past Sessions</a>
                        <div class="dropdown-divider"></div>
                        <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(str_slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                        <a href="#!" class="dropdown-item patient-actions"  data-action="pending-appointment" data-patient-id="{!! $patient->id !!}"><i class="icon-alarm"></i>  Pending Appointments</a>
                        <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Consent Forms</a>
                        <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i> Media</a>
                        <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                        <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! \App\Helpers\CommonMethods::encrypt($patient->id) !!}"><i class="icon-address-book3"></i> Contact Patient </a>

                    </div>

                    @endif



                </td>
                <td>{!! !empty($patient->date_of_birth)?date('d.m.Y',strtotime($patient->date_of_birth)):"" !!}</td>
                <td>{!! $patient->gender !!}</td>
                <td>
                    @if(!empty($patient->medicals()->first()))
                        {!! is_array(json_decode($patient->medicals()->first()->illness))?str_replace('_',' ',implode(', ',json_decode($patient->medicals()->first()->illness))):"" !!}
                    @endif
                </td>
                <td>
                    @if(isset($patient->patient_assigned_flags) && $patient->patient_assigned_flags->count() > 0)

                        <span class="badge" title="{!! $patient->patient_assigned_flags[0]->name !!}"><i class="icon-flag7" style="color: {!! $patient->patient_assigned_flags[0]->color !!}"></i> </span>

                    @endif
                </td>
                <td >
                    {!! !empty($patient->appointments()->first())? date('d.m.Y',strtotime($patient->appointments()->first()->booking_date)):"" !!}</a>
                </td>


                <td>{!! $patient->appointments()->count() !!}</td>
                <td>@if($patient->media_files()->count() > 0) <a href="#!" class="get-media" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i></a>   @endif</td>
                <td>{!! date('d.m.Y',strtotime($patient->created_at)) !!}</td>
                <td>
                    @if(in_array(42,$permissions_allowed) || Auth::user()->role=='administrator')
                        <div class="ml-3">
                            <div class="list-icons">
                                <div class="list-icons-item dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                        <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                                        <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $patient->id !!}"><i class="icon-history"></i> Past Sessions</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(str_slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                                        <a href="#!" class="dropdown-item patient-actions"  data-action="pending-appointment" data-patient-id="{!! $patient->id !!}"><i class="icon-alarm"></i>  Pending Appointments</a>
                                        <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Consent Forms</a>
                                       <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                                        <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! \App\Helpers\CommonMethods::encrypt($patient->id) !!}"><i class="icon-address-book3"></i> Contact Patient </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach

    @endif
    </tbody>
</table>
</div>
