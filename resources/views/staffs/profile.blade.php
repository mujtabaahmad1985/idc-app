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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{!! $staff->first_name.' '.$staff->last_name !!}</span> -  Profile</h4>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="/staffs" class="btn btn-link btn-float text-body"><i class="icon-user text-primary"></i><span>Staffs</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>
                    <a href="/staffs" class="breadcrumb-item">Staffs</a>
                    <span class="breadcrumb-item active">{!! $staff->first_name.' '.$staff->last_name !!}</span>
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
                <div class="col-sm-12 col-md-4 col-lg-4 p-3">
                    <div class="card border-0 mb-3 rounded shadow">
                        <div class="card-body p-0">


                            <div class="doc-profile-bg bg-danger" style="height:150px;"> </div>
                            <div class="doctor-profile text-center">
                                @if(\Illuminate\Support\Facades\Storage::disk('images')->has($staff->profile_picture))
                                    <img src="{!! \Illuminate\Support\Facades\Storage::disk('images')->url($staff->profile_picture) !!}" alt="profile-img" class="avatar-130 img-fluid">
                                @else
                                    <img src="{!! '/images/avatar-placeholder.png' !!}" alt="profile-img" class="avatar-130 img-fluid">
                                @endif
                            </div>
                            <div class="text-center mt-3 pl-3 pr-3">
                                <h4><b>{!! $staff->salutation.' '.$staff->first_name.' '.$staff->last_name !!}</b></h4>
                                <p>{!! $staff->users->role !!}</p>
                                <p class="mb-1">{!! $staff->about_me !!}</p>
                            </div>
                            <hr />
                            <ul class="doctoe-sedual d-flex align-items-center justify-content-between p-0 mb-3">
                                <li class="text-center">
                                    <h3 class="counter">{!! isset($staff->users->appointments)?$staff->users->appointments->count() :0!!}</h3>
                                    <span>Booked Appointments</span>
                                </li>

                                <li class="text-center">
                                    <h3 class="counter">{!! isset($staff->users->patients_added_by_staff)?$staff->users->patients_added_by_staff->count() :0!!}</h3>
                                    <span>Patients Added</span>
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
                                    <td>{!! $staff->first_name !!}</td>
                                </tr>
                                <tr>
                                    <th width="30%">Last Name</th>
                                    <td>{!! $staff->last_name !!}</td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>{!! $staff->date_of_birth !!}</td>
                                </tr>
                                <tr>
                                    <th>Position</th>
                                    <td>{!! $staff->users->role !!}</td>
                                </tr>
                                <tr>
                                    <th>Contact</th>
                                    <td>{!! $staff->contact_number !!}</td>
                                </tr>

                                <tr>
                                    <th>Address</th>
                                    <td>{!! nl2br($staff->address) !!}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-sm-12 col-md-8 col-lg-8 p-3">


                    <div class="row">
                        <div class="col-sm-12 col-md-6">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-white header-elements-inline">
                                            <h4 class="card-title">Today Appointments</h4>
                                        </div>
                                        <div class="card-body">

                                            @if(isset($staff) && isset($staff->users->appointments))
                                            <table class="table table-borderless">

                                                @foreach($staff->users->appointments as $appointment)
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-white header-elements-inline">
                                            <h4 class="card-title">Recent Patients Added</h4>
                                        </div>
                                        <div class="card-body">


                                            @if(isset($staff) && isset($staff->users->patients_added_by_staff))
                                                <table class="table table-borderless">

                                                    @foreach($staff->users->patients_added_by_staff as $patient)
                                                        <tr class="">
                                                            <td>
                                                                <h5 class="m-0"><span>{!! $patient->first_name.' '.$patient->last_name !!}</span></h5>
                                                                <p class="badge badge-danger align-top ml-2">{!! $patient->patient_unique_id !!}</p>
                                                                <p class="m-0 badge badge-light">Added at {!! \App\Helpers\CommonMethods::formatDate($patient->created_at) !!}</p>





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
                                            <h4 class="card-title">Permissions</h4>
                                        </div>
                                        <div class="card-body" style="max-height: 400px; overflow: auto;">

                                             <div class="row">
                                                 @if(isset($staff->users->permissions))
                                                     @foreach($staff->users->permissions as $permission)
                                                         <div class="col-sm-6 mb-2">
                                                             <div class="custom-control custom-checkbox">
                                                                 <input type="checkbox" class="custom-control-input permission parent"  checked disabled id="permission{!! $permission->id !!}"   value="1" >
                                                                 <label class="custom-control-label" for="permissionpermission{!! $permission->id !!}"> {!! $permission->permission_title !!} </label>
                                                             </div>
                                                         </div>
                                                         @endforeach
                                                 @endif
                                             </div>



                                        </div></div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-white header-elements-inline">
                                            <h4 class="card-title">Recent Activities</h4>
                                        </div>
                                        <div class="card-body">
                                            @if(isset($staff->users->activities))

                                            <ul class="media-list">
                                                @foreach($staff->users->activities->take(30) as $activity)
                                                <li class="media">
                                                    <div class="mr-3">
                                                        <a href="#" class="btn bg-transparent border-pink text-pink rounded-pill border-2 btn-icon"><i class="icon-watch2"></i></a>
                                                    </div>

                                                    <div class="media-body">
                                                        {!! $activity->activity_description !!}
                                                        <div class="text-muted">{!! $activity->created_at !!}</div>
                                                    </div>


                                                </li>
                                                @endforeach



                                            </ul>
                                                    @endif
                                        </div>
                                    </div>
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