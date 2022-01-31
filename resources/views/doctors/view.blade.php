<div class="row">
    <div class="col-sm-12">
        <div class="card-body bg-blue text-center card-img-top" style="background-image: url({!! env('APP_URL') !!}global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
            <div class="card-img-actions d-inline-block mb-3">
                <img class="img-fluid rounded-circle" src="{!! env('APP_URL') !!}global_assets/images/placeholders/placeholder.jpg" width="170" height="170" alt="">
                <div class="card-img-actions-overlay card-img rounded-circle">
                    <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                        <i class="icon-plus3"></i>
                    </a>

                </div>
            </div>

            <h6 class="font-weight-semibold mb-0">Dr. {!! ucwords($doctor->fname.' '.$doctor->lname) !!}</h6>
            <span class="d-block opacity-75">Doctor</span>

            <ul class="list-inline list-inline-condensed mt-3 mb-0">
                <li class="list-inline-item">
                    <a href="#" class="btn btn-outline bg-white btn-icon text-white border-white border-2 rounded-round">
                        <i class="icon-envelop5"></i>
                    </a>
                </li>

            </ul>
        </div>


        <div class="card-body border-top-0">
            <div class="d-sm-flex flex-sm-wrap mb-3">
                <div class="font-weight-semibold">Full name:</div>
                <div class="ml-sm-auto mt-2 mt-sm-0">{!! ucwords($doctor->fname.' '.$doctor->lname) !!}</div>
            </div>

            <div class="d-sm-flex flex-sm-wrap mb-3">
                <div class="font-weight-semibold">Phone number:</div>
                <div class="ml-sm-auto mt-2 mt-sm-0">{!! $doctor->mobile_number !!}</div>
            </div>

            <div class="d-sm-flex flex-sm-wrap mb-3">
                <div class="font-weight-semibold">Corporate Email:</div>
                <div class="ml-sm-auto mt-2 mt-sm-0"><a href="#" class="email">{!! $doctor->email  !!}</a></div>
            </div>


        </div>

        <div class="card-body border-top-0">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified bg-teal-400 border-x-0 border-bottom-0 border-top-teal-300 mb-0">
                <li class="nav-item">
                    <a href="#today" class="nav-link font-size-sm text-uppercase font-weight-semibold" data-toggle="tab">
                        Recent Appointments
                    </a>
                </li>


            </ul>
        </div>

        <div class="tab-content card-body">
            <div class="tab-pane fade active show" id="today">
                <ul class="media-list">
                    @if(isset($doctor->doctor_recent_pending_appointments) && $doctor->doctor_recent_pending_appointments->count() > 0)
                        @foreach($doctor->doctor_recent_pending_appointments as $appointment)
                    <li class="media">


                        <div class="media-body">
                            <div class="d-flex justify-content-between">
                                <a href="/patient/view/{!! $appointment->patient !!}" class="text-danger" target="_blank"> {!! $appointment->patients->patient_name !!} </a>
                                <span class="font-size-sm text-muted">{!! date('H:i A',strtotime($appointment->start_time)) !!} - {!! date('H:i A',strtotime($appointment->end_time)) !!}</span>
                            </div>

                            {!! $appointment->doctor_services->service_name !!}
                        </div>
                    </li>
                        @endforeach
@endif

                </ul>
            </div>


        </div>
        <div class="card card-body bg-light mb-0 text-center">
            <ul class="list-inline list-inline-dotted mb-0">
                <li class="list-inline-item"><a href="/get/doctor/patients/{!! \App\Helpers\CommonMethods::encrypt($doctor->id) !!}" target="_blank" class="text-danger">Patients</a> </li>
                <li class="list-inline-item"><a href="/setup/availability?id={!! \App\Helpers\CommonMethods::encrypt($doctor->doctor_id) !!}" target="_blank" class="text-danger">Availability Setting</a> </li>
            </ul>
        </div>


    </div>
</div>