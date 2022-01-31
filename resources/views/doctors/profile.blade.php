@extends('layout.app')
@section('page-title') Profile @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/css/croppie.css') !!}
    <style>
        .doc-profile-bg {

        }
        .doctor-profile {
            margin-top: -70px;
        }
        .avatar-130 {
            height: 130px;
            width: 130px;
            line-height: 130px;
            font-size: 1.6rem;
            border-radius: 80px;
        }
        ul.doctoe-sedual li:first-child {
            border-left: none;
        }
        ul.doctoe-sedual li {
            list-style: none;
            flex: 1;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Dr. {!! $doctor->fname.' '.$doctor->lname !!}</span> - Profile</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>
                    <a href="#" class="breadcrumb-item">Setup</a>
                    <a href="/doctors" class="breadcrumb-item">Doctors</a>
                    <span class="breadcrumb-item active">Dr. {!! $doctor->fname.' '.$doctor->lname !!}</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <!-- Content area -->
    <div class="content">

        <!-- Inner container -->
        <div class="">

            <div class="row">
                <div class=" col-sm-12 col-md-4 col-lg-4 p-3">
                    <div class="card border-0 mb-3 rounded shadow">
                        <div class="card-body p-0">


                        <div class="doc-profile-bg bg-danger" style="height:150px;"> </div>
                        <div class="doctor-profile text-center">
                            @if(\Illuminate\Support\Facades\Storage::disk('images')->has($doctor->profile_picture))
                            <img src="{!! \Illuminate\Support\Facades\Storage::disk('images')->url($doctor->profile_picture) !!}" alt="profile-img" class="avatar-130 img-fluid">
                                @else
                                <img src="{!! '/images/avatar-placeholder.png' !!}" alt="profile-img" class="avatar-130 img-fluid">
                                @endif
                        </div>
                        <div class="text-center mt-3 pl-3 pr-3">
                            <h4><b>Dr. {!! $doctor->fname.' '.$doctor->lname !!}</b></h4>
                            <p>Doctor</p>
                            <p class="mb-1">{!! $doctor->about_me !!}</p>
                        </div>
                        <hr />
                        <ul class="doctoe-sedual d-flex align-items-center justify-content-between p-0 mb-3">
                            <li class="text-center">
                                <h3 class="counter">{!! isset($doctor->doctor_appointments)?$doctor->doctor_appointments->count() :0!!}</h3>
                                <span>Appointments</span>
                            </li>

                            <li class="text-center">
                                <h3 class="counter">{!! isset($doctor->doctor_patients)?$doctor->doctor_patients->count() :0!!}</h3>
                                <span>Patients</span>
                            </li>
                        </ul></div>
                    </div>

                    <div class="card border-0 rounded shadow">
                       <div class="card-header bg-white header-elements-inline">
                           <h4 class="card-title">Personal Information</h4>
                       </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="30%">First Name</th>
                                    <td>{!! $doctor->fname !!}</td>
                                </tr>
                                <tr>
                                    <th width="30%">Last Name</th>
                                    <td>{!! $doctor->lname !!}</td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>{!! $doctor->date_of_birth !!}</td>
                                </tr>
                                <tr>
                                    <th>Position</th>
                                    <td>{!! isset($doctor->doctor_roles)?$doctor->doctor_roles->role_name:"-" !!}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{!! $doctor->phone_number !!}</td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{!! $doctor->mobile_number !!}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{!! nl2br($doctor->address) !!}</td>
                                </tr>
                            </table>
                            @php
                                $specialities = NULL;
                                $specialities_1 = $doctor->specialities;
                                if($specialities_1!=""){
                                    $specialities = explode(', ',$specialities_1);
                                }
                            @endphp
                            @if(isset($specialities))
                            <hr />
                            <h3>Specialities</h3>
                            <ul class="list list-unstyled mb-0">
                                @foreach($specialities as $speciality)
                                <li>
                                    <i class="icon-checkmark-circle text-success mr-2"></i>
                                    {!! $speciality !!}
                                </li>
                                @endforeach
                            </ul>
                                @endif
                        </div>
                    </div>
                </div><!--end col-->
                <div class=" col-sm-12 col-md-8 col-lg-8 p-3">


                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-white header-elements-inline">
                                            <h4 class="card-title">Doctor Experience</h4>
                                        </div>
                                        <div class="card-body">

                                            @if(isset($doctor) && isset($doctor->doctor_experience))

                                                <table class="table table-borderless">

                                                    @foreach($doctor->doctor_experience as $experience)
                                                        <tr class="mb-2">
                                                            <td>
                                                                <h5 class="m-0">{!! $experience->hospital !!} <span style="font-size: 12px; font-style: italic">({!! $experience->year !!})</span></h5>
                                                                <p class="m-0">{!! $experience->position !!} at {!! $experience->department !!}</p>
                                                                <p class="text-muted m-0 text-lowercase">{!! $experience->summary !!}</p>



                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </table>
                                            @endif
                                        </div></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-white header-elements-inline">
                                            <h4 class="card-title">Doctor's Today Appointments</h4>
                                        </div>
                                        <div class="card-body">



                                            @if(isset($doctor) && isset($doctor->doctor_todays_appointments))

                                                <table class="table table-borderless">

                                                    @foreach($doctor->doctor_todays_appointments as $appointment)
                                                        <tr class="mb-2">
                                                            <td>
                                                                <h5 class="m-0"><span>{!! $appointment->doctor_services->service_name !!}</span></h5>
                                                                <p class="badge badge-secondary">{!! $appointment->patients->first_name.' '.$appointment->patients->last_name !!}</p>
                                                                <p class="m-0 badge badge-light">Booked at {!! $appointment->booking_date !!} , {!! date('H:i a',strtotime($appointment->start_time)) !!}-{!! date('H:i a',strtotime($appointment->end_time)) !!}</p>





                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </table>
                                            @endif
                                        </div></div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-white header-elements-inline">
                                            <h4 class="card-title">Doctor Schedule</h4>
                                        </div>
                                        <div class="card-body">
                                            @php
                                                $availabilities = \App\Availabilities::whereNull('deleted_at')->where('doctors_id',$doctor->doctor_id)->get();

                                            @endphp
                                            @if(isset($availabilities) && $availabilities->count() > 0)

                                                <table class="table table-borderless">

                                                    @foreach($availabilities as $avail)
                                                        <tr>
                                                            <td>
                                                                <h5 class="m-0">{!! isset($avail->locations)?$avail->locations->name:"" !!}</h5>
                                                                <span class="badge badge-danger"> {!! date('H:i',strtotime($avail->start_time)) !!} - {!! date('H:i',strtotime($avail->end_time)) !!}</span>
                                                                <span class="badge badge-light">{!! \App\Helpers\CommonMethods::formatDate($avail->start_date) !!} - {!! \App\Helpers\CommonMethods::formatDate($avail->end_date) !!}</span>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </table>
                                            @endif
                                        </div></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-white header-elements-inline">
                                            <h4 class="card-title">This Month Appointments</h4>
                                        </div>
                                        <div class="card-body">


                                            @if(isset($doctor) && isset($doctor->doctor_this_month_appointments))

                                                <table class="table table-borderless">

                                                    @foreach($doctor->doctor_this_month_appointments as $appointment)
                                                        <tr class="mb-2">
                                                            <td>
                                                                <h5 class="m-0"><span>{!! $appointment->doctor_services->service_name !!}</span></h5>
                                                                <p class="badge badge-secondary">{!! $appointment->patients->first_name.' '.$appointment->patients->last_name !!}</p>
                                                                <p class="m-0 badge badge-light">Booked at {!! $appointment->booking_date !!} , {!! date('H:i a',strtotime($appointment->start_time)) !!}-{!! date('H:i a',strtotime($appointment->end_time)) !!}</p>




                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </table>
                                            @endif
                                        </div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /right content -->


        </div>
        <!-- /inner container -->

    </div>
    <!-- /content area -->

@endsection


@section('js')



    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection