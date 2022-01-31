@extends('layout.app')
@section('page-title') Dashboard @endsection
@section('css')

@endsection

@section('content')

    <!-- Content area -->
    <div class="content">


    <div class="card card-body">
        <div class="row text-center">
            <div class="col-3">
                <p><i class="icon-users2 icon-2x d-inline-block text-info"></i></p>
                <h5 class="font-weight-semibold mb-0">{!! \App\Doctors::whereNull('deleted_at')->count() !!}</h5>
                <span class="text-muted font-size-sm">Active Doctors</span>
            </div>

            <div class="col-3">
                <p><i class="icon-accessibility2 icon-2x d-inline-block text-warning"></i></p>
                <h5 class="font-weight-semibold mb-0">{!! \App\Patients::whereNull('deleted_at')->count() !!}</h5>
                <span class="text-muted font-size-sm">Active Patients</span>
            </div>

            <div class="col-3">
                <p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
                <h5 class="font-weight-semibold mb-0">{!! \App\Appointments::whereNull('deleted_at')->count() !!}</h5>
                <span class="text-muted font-size-sm">Appointments</span>
            </div>
            <div class="col-3">
                <p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
                <h5 class="font-weight-semibold mb-0">{!! \App\DoctorServices::count() !!}</h5>
                <span class="text-muted font-size-sm">Services</span>
            </div>
        </div>
    </div>


        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-8">

                <!-- Marketing campaigns -->
                <div class="card">
                    <div class="card-header header-elements-sm-inline">
                        <h6 class="card-title">Recent Patients</h6>
                        <div class="header-elements">

                            <div class="list-icons ml-3">
                                <div class="list-icons-item dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th > D.O.B</th>
                                <th  >Gender</th>
                                <th >Flags</th>
                                <th >Register at</th>
                                @if(in_array(43,$permissions_allowed) || Auth::user()->role=='administrator')
                                <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                                    @endif
                            </tr>
                            </thead>
                            <tbody>
                            @if(in_array(40,$permissions_allowed) || Auth::user()->role=='administrator')
                            @if(isset($patients) && $patients->count() > 0)
                                @foreach($patients as $patient)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <img src="/img/no-user-image.gif" class="rounded-circle" width="32" height="32" alt="">
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-default list-icons-item dropdown-toggle caret-0 font-weight-semibold"  data-toggle="dropdown" aria-expanded="false">{!! ucwords($patient->patient_name) !!}</a>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                                        <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                                                        <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $patient->id !!}"><i class="icon-history"></i> Past Sessions</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(str_slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                                                        <a href="#!" class="dropdown-item"><i class="icon-alarm"></i>  Pending Appointments</a>
                                                        <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Add Form</a>
                                                        <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i> Add Media</a>
                                                        <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                                                        <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-address-book3"></i> Contact Patient </a>

                                                    </div>
                                                    <div class="text-muted font-size-sm">
                                                        <span class="badge badge-mark border-blue mr-1"></span>
                                                        {!! $patient->patient_unique_id !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>{!! !empty($patient->date_of_birth)?date('d.m.Y',strtotime($patient->date_of_birth)):"" !!}</td>
                                        <td>{!! $patient->gender !!}</td>

                                        <td><div class="purple-text"><i class="icon-flag7"></i> </div> </td>
                                        <td>{!! date('d.m.Y',strtotime($patient->created_at)) !!}</td>
                                        @if(in_array(43,$permissions_allowed) || Auth::user()->role=='administrator')
                                        <td>
                                            <div class="ml-3">
                                                <div class="list-icons">
                                                    <div class="list-icons-item dropdown">
                                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                                            <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                                                            <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="/view/treatment-cards/{!! $patient->id !!}" class="dropdown-item"><i class="icon-book2"></i> Treatment Record</a>
                                                            <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $patient->id !!}"><i class="icon-history"></i> Past Sessions</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(str_slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                                                            <a href="#!" class="dropdown-item"><i class="icon-alarm"></i>  Pending Appointments</a>
                                                            <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Add Form</a>
                                                            <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i> Add Media</a>
                                                            <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                                                            <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-address-book3"></i> Contact Patient </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                            @endif
                            </tr>
                            @endforeach
                                @endif
                                @else
                                <tr>
                                    <td colspan="6">
                                        <div class="alert bg-danger text-white text-center" style="display: block">

                                            <span class="font-weight-semibold">Oh snap!</span> You are not authorized to see patient list, please <a href="#" class="alert-link">contact administrator</a>.
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /marketing campaigns -->


                <!-- Quick stats boxes -->
                <div class="row">
                    <div class="col-lg-4">

                        <!-- Total Patients -->
                        <div class="card bg-teal-400">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h3 class="font-weight-semibold mb-0">{!! number_format($total_patients) !!}</h3>
                                    <span class="badge bg-teal-800 badge-pill align-self-center ml-auto">+53,6%</span>
                                </div>

                                <div>
                                    Total Patients
                                    <div class="font-size-sm opacity-75">489 avg</div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div id="members-online"></div>
                            </div>
                        </div>
                        <!-- /Total Patients online -->

                    </div>

                    <div class="col-lg-4">

                        <!-- Current server load -->
                        <div class="card bg-pink-400">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h3 class="font-weight-semibold mb-0">{!! number_format($total_appointments) !!}</h3>

                                </div>

                                <div>
                                   Total Appointments
                                    <div class="font-size-sm opacity-75">34.6% avg</div>
                                </div>
                            </div>

                            <div id="server-load"></div>
                        </div>
                        <!-- /current server load -->

                    </div>

                    <div class="col-lg-4">

                        <!-- Today's revenue -->
                        <div class="card bg-blue-400">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h3 class="font-weight-semibold mb-0">$18,390</h3>
                                    <div class="list-icons ml-auto">
                                        <a class="list-icons-item" data-action="reload"></a>
                                    </div>
                                </div>

                                <div>
                                    Today's revenue
                                    <div class="font-size-sm opacity-75">$37,578 avg</div>
                                </div>
                            </div>

                            <div id="today-revenue"></div>
                        </div>
                        <!-- /today's revenue -->

                    </div>
                </div>
                <!-- /quick stats boxes -->


                <!-- Support tickets -->
                <div class="card">
                    <div class="card-header header-elements-sm-inline">
                        <h6 class="card-title">Sale Insight</h6>
                        <div class="header-elements">
                            <a class="text-default daterange-ranges font-weight-semibold cursor-pointer dropdown-toggle">
                                <i class="icon-calendar3 mr-2"></i>
                                <span></span>
                            </a>
                        </div>
                    </div>

                    <div class="card-body d-md-flex align-items-md-center justify-content-md-between flex-md-wrap">
                        <div class="d-flex align-items-center mb-3 mb-md-0">
                            <div id="tickets-status"></div>
                            <div class="ml-3">
                                <h5 class="font-weight-semibold mb-0">14,327 <span class="text-success font-size-sm font-weight-normal"><i class="icon-arrow-up12"></i> (+2.9%)</span></h5>
                                <span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">Jun 16, 10:00 am</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mb-md-0">
                            <a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon">
                                <i class="icon-alarm-add"></i>
                            </a>
                            <div class="ml-3">
                                <h5 class="font-weight-semibold mb-0">1,132</h5>
                                <span class="text-muted">total tickets</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mb-md-0">
                            <a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon">
                                <i class="icon-spinner11"></i>
                            </a>
                            <div class="ml-3">
                                <h5 class="font-weight-semibold mb-0">06:25:00</h5>
                                <span class="text-muted">response time</span>
                            </div>
                        </div>

                        <div>
                            <a href="#" class="btn bg-teal-400"><i class="icon-statistics mr-2"></i> Report</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-100">Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-active table-border-double">
                                <td colspan="2">Recent Sale</td>
                                <td class="text-right">
                                    <span class="badge bg-blue badge-pill">{!!  $recent_sale->count() !!}</span>
                                </td>
                            </tr>
                            @if(isset($recent_sale) && $recent_sale->count() > 0)
                                @foreach($recent_sale as $proudct)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3">
                                                    <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                        <span class="letter-icon">S</span>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title">{!! $proudct->products->product_title !!}</a>
                                                    <div class="text-muted font-size-sm"><i class="icon-checkmark3 font-size-sm mr-1"></i> New order</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted font-size-sm">{!! $proudct->total_quantity !!}</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-semibold mb-0">${!! $proudct->total_price !!}</h6>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            <tr class="table-active table-border-double">
                                <td colspan="2">Weekly Sale</td>
                                <td class="text-right">
                                    <span class="badge bg-success badge-pill">{!! $weekly_sale->count() !!}</span>
                                </td>
                            </tr>

                            @if(isset($weekly_sale) && $weekly_sale->count() > 0)
                                @foreach($weekly_sale as $proudct)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3">
                                                    <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                        <span class="letter-icon">S</span>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title">{!! $proudct->products->product_title !!}</a>
                                                    <div class="text-muted font-size-sm"><i class="icon-checkmark3 font-size-sm mr-1"></i> New order</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted font-size-sm">{!! $proudct->total_quantity !!}</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-semibold mb-0">${!! $proudct->total_price !!}</h6>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /support tickets -->


                <!-- Latest posts -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Latest posts</h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="media flex-column flex-sm-row mt-0 mb-3">
                                    <div class="mr-sm-3 mb-2 mb-sm-0">
                                        <div class="card-img-actions">
                                            <a href="#">
                                                <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid img-preview rounded" alt="">
                                                <span class="card-img-actions-overlay card-img"><i class="icon-play3 icon-2x"></i></span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="media-body">
                                        <h6 class="media-title"><a href="#">Up unpacked friendly</a></h6>
                                        <ul class="list-inline list-inline-dotted text-muted mb-2">
                                            <li class="list-inline-item"><i class="icon-book-play mr-2"></i> Video tutorials</li>
                                        </ul>
                                        The him father parish looked has sooner. Attachment frequently terminated son hello...
                                    </div>
                                </div>

                                <div class="media flex-column flex-sm-row mt-0 mb-3">
                                    <div class="mr-sm-3 mb-2 mb-sm-0">
                                        <div class="card-img-actions">
                                            <a href="#">
                                                <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid img-preview rounded" alt="">
                                                <span class="card-img-actions-overlay card-img"><i class="icon-play3 icon-2x"></i></span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="media-body">
                                        <h6 class="media-title"><a href="#">It allowance prevailed</a></h6>
                                        <ul class="list-inline list-inline-dotted text-muted mb-2">
                                            <li class="list-inline-item"><i class="icon-book-play mr-2"></i> Video tutorials</li>
                                        </ul>
                                        Alteration literature to or an sympathize mr imprudence. Of is ferrars subject enjoyed...
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="media flex-column flex-sm-row mt-0 mb-3">
                                    <div class="mr-sm-3 mb-2 mb-sm-0">
                                        <div class="card-img-actions">
                                            <a href="#">
                                                <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid img-preview rounded" alt="">
                                                <span class="card-img-actions-overlay card-img"><i class="icon-play3 icon-2x"></i></span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="media-body">
                                        <h6 class="media-title"><a href="#">Case read they must</a></h6>
                                        <ul class="list-inline list-inline-dotted text-muted mb-2">
                                            <li class="list-inline-item"><i class="icon-book-play mr-2"></i> Video tutorials</li>
                                        </ul>
                                        On it differed repeated wandered required in. Then girl neat why yet knew rose spot...
                                    </div>
                                </div>

                                <div class="media flex-column flex-sm-row mt-0 mb-3">
                                    <div class="mr-sm-3 mb-2 mb-sm-0">
                                        <div class="card-img-actions">
                                            <a href="#">
                                                <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid img-preview rounded" alt="">
                                                <span class="card-img-actions-overlay card-img"><i class="icon-play3 icon-2x"></i></span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="media-body">
                                        <h6 class="media-title"><a href="#">Too carriage attended</a></h6>
                                        <ul class="list-inline list-inline-dotted text-muted mb-2">
                                            <li class="list-inline-item"><i class="icon-book-play mr-2"></i> FAQ section</li>
                                        </ul>
                                        Marianne or husbands if at stronger ye. Considered is as middletons uncommonly...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /latest posts -->

            </div>

            <div class="col-xl-4">

                <!-- Progress counters -->
                <div class="row">
                    <div class="col-sm-6">

                        <!-- Available hours -->
                        <div class="card text-center">
                            <div class="card-body">

                                <!-- Progress counter -->
                                <div class="svg-center position-relative" id="hours-available-progress"></div>
                                <!-- /progress counter -->


                                <!-- Bars -->
                                <div id="hours-available-bars"></div>
                                <!-- /bars -->

                            </div>
                        </div>
                        <!-- /available hours -->

                    </div>

                    <div class="col-sm-6">

                        <!-- Productivity goal -->
                        <div class="card text-center">
                            <div class="card-body">

                                <!-- Progress counter -->
                                <div class="svg-center position-relative" id="goal-progress"></div>
                                <!-- /progress counter -->

                                <!-- Bars -->
                                <div id="goal-bars"></div>
                                <!-- /bars -->

                            </div>
                        </div>
                        <!-- /productivity goal -->

                    </div>
                </div>
                <!-- /progress counters -->


                <!-- Daily sales -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Recent Appointments</h6>
                        <div class="header-elements">
                            <span class="font-weight-bold text-danger-600 ml-2">$4,378</span>
                            <div class="list-icons ml-3">
                                <div class="list-icons-item dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="chart" id="sales-heatmap"></div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-100">Appointment</th>

                                <th>By Doctor</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(in_array(41,$permissions_allowed) || Auth::user()->role=='administrator')
                            @if(isset($appointment))
                                @foreach($appointment as $app)

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                <span class="letter-icon"></span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#" class="text-default font-weight-semibold letter-icon-title"> @if(!empty($app->service_name))  {!! $app->service_name !!} @endif</a>
                                            <div class="text-muted font-size-sm"><i class="icon-watch2 font-size-sm mr-1"></i> {!! date('H:i A',strtotime($app->start_time)) !!} {!! date('d.m.Y',strtotime($app->booking_date)) !!}</div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <h6 class="font-weight-semibold mb-0">Dr. {!! $app->fname.' '.$app->lname !!}</h6>
                                </td>
                            </tr>
                                @endforeach
                            @endif
                            @else
                                <tr>
                                    <td colspan="2">
                                        <div class="alert bg-danger text-white text-center" style="display: block">

                                            <span class="font-weight-semibold">Oh snap!</span> You are not authorized to see appointment list, please <a href="#" class="alert-link">contact administrator</a>.
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /daily sales -->


                <!-- My messages -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">My messages</h6>
                        <div class="header-elements">
                            <span><i class="icon-history text-warning mr-2"></i> Jul 7, 10:30</span>
                            <span class="badge bg-success align-self-start ml-3">Online</span>
                        </div>
                    </div>

                    <!-- Numbers -->
                    <div class="card-body py-0">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="mb-3">
                                    <h5 class="font-weight-semibold mb-0">2,345</h5>
                                    <span class="text-muted font-size-sm">this week</span>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <h5 class="font-weight-semibold mb-0">3,568</h5>
                                    <span class="text-muted font-size-sm">this month</span>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <h5 class="font-weight-semibold mb-0">32,693</h5>
                                    <span class="text-muted font-size-sm">all messages</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /numbers -->


                    <!-- Area chart -->
                    <div id="messages-stats"></div>
                    <!-- /area chart -->


                    <!-- Tabs -->
                    <ul class="nav nav-tabs nav-tabs-solid nav-justified bg-indigo-400 border-x-0 border-bottom-0 border-top-indigo-300 mb-0">
                        <li class="nav-item">
                            <a href="#messages-tue" class="nav-link font-size-sm text-uppercase active" data-toggle="tab">
                                Tuesday
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#messages-mon" class="nav-link font-size-sm text-uppercase" data-toggle="tab">
                                Monday
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#messages-fri" class="nav-link font-size-sm text-uppercase" data-toggle="tab">
                                Friday
                            </a>
                        </li>
                    </ul>
                    <!-- /tabs -->


                    <!-- Tabs content -->
                    <div class="tab-content card-body">
                        <div class="tab-pane active fade show" id="messages-tue">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                        <span class="badge bg-danger-400 badge-pill badge-float border-2 border-white">8</span>
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">James Alexander</a>
                                            <span class="font-size-sm text-muted">14:58</span>
                                        </div>

                                        The constitutionally inventoried precariously...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                        <span class="badge bg-danger-400 badge-pill badge-float border-2 border-white">6</span>
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Margo Baker</a>
                                            <span class="font-size-sm text-muted">12:16</span>
                                        </div>

                                        Pinched a well more moral chose goodness...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Jeremy Victorino</a>
                                            <span class="font-size-sm text-muted">09:48</span>
                                        </div>

                                        Pert thickly mischievous clung frowned well...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Beatrix Diaz</a>
                                            <span class="font-size-sm text-muted">05:54</span>
                                        </div>

                                        Nightingale taped hello bucolic fussily cardinal...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Richard Vango</a>
                                            <span class="font-size-sm text-muted">01:43</span>
                                        </div>

                                        Amidst roadrunner distantly pompously where...
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane fade" id="messages-mon">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Isak Temes</a>
                                            <span class="font-size-sm text-muted">Tue, 19:58</span>
                                        </div>

                                        Reasonable palpably rankly expressly grimy...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Vittorio Cosgrove</a>
                                            <span class="font-size-sm text-muted">Tue, 16:35</span>
                                        </div>

                                        Arguably therefore more unexplainable fumed...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Hilary Talaugon</a>
                                            <span class="font-size-sm text-muted">Tue, 12:16</span>
                                        </div>

                                        Nicely unlike porpoise a kookaburra past more...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Bobbie Seber</a>
                                            <span class="font-size-sm text-muted">Tue, 09:20</span>
                                        </div>

                                        Before visual vigilantly fortuitous tortoise...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Walther Laws</a>
                                            <span class="font-size-sm text-muted">Tue, 03:29</span>
                                        </div>

                                        Far affecting more leered unerringly dishonest...
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane fade" id="messages-fri">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Owen Stretch</a>
                                            <span class="font-size-sm text-muted">Mon, 18:12</span>
                                        </div>

                                        Tardy rattlesnake seal raptly earthworm...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Jenilee Mcnair</a>
                                            <span class="font-size-sm text-muted">Mon, 14:03</span>
                                        </div>

                                        Since hello dear pushed amid darn trite...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Alaster Jain</a>
                                            <span class="font-size-sm text-muted">Mon, 13:59</span>
                                        </div>

                                        Dachshund cardinal dear next jeepers well...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Sigfrid Thisted</a>
                                            <span class="font-size-sm text-muted">Mon, 09:26</span>
                                        </div>

                                        Lighted wolf yikes less lemur crud grunted...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Sherilyn Mckee</a>
                                            <span class="font-size-sm text-muted">Mon, 06:38</span>
                                        </div>

                                        Less unicorn a however careless husky...
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /tabs content -->

                </div>
                <!-- /my messages -->


                <!-- Daily financials -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Daily financials</h6>
                        <div class="header-elements">
                            <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-input-switchery" id="realtime" checked data-fouc>
                                    Realtime
                                </label>
                            </div>
                            <span class="badge bg-danger-400 badge-pill">+86</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="chart mb-3" id="bullets"></div>

                        <ul class="media-list">
                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-pink text-pink rounded-round border-2 btn-icon"><i class="icon-statistics"></i></a>
                                </div>

                                <div class="media-body">
                                    Stats for July, 6: <span class="font-weight-semibold">1938</span> orders, <span class="font-weight-semibold text-danger">$4220</span> revenue
                                    <div class="text-muted">2 hours ago</div>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <a href="#" class="list-icons-item"><i class="icon-more"></i></a>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon"><i class="icon-checkmark3"></i></a>
                                </div>

                                <div class="media-body">
                                    Invoices <a href="#">#4732</a> and <a href="#">#4734</a> have been paid
                                    <div class="text-muted">Dec 18, 18:36</div>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <a href="#" class="list-icons-item"><i class="icon-more"></i></a>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon"><i class="icon-alignment-unalign"></i></a>
                                </div>

                                <div class="media-body">
                                    Affiliate commission for June has been paid
                                    <div class="text-muted">36 minutes ago</div>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <a href="#" class="list-icons-item"><i class="icon-more"></i></a>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-warning-400 text-warning-400 rounded-round border-2 btn-icon"><i class="icon-spinner11"></i></a>
                                </div>

                                <div class="media-body">
                                    Order <a href="#">#37745</a> from July, 1st has been refunded
                                    <div class="text-muted">4 minutes ago</div>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <a href="#" class="list-icons-item"><i class="icon-more"></i></a>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-teal text-teal rounded-round border-2 btn-icon"><i class="icon-redo2"></i></a>
                                </div>

                                <div class="media-body">
                                    Invoice <a href="#">#4769</a> has been sent to <a href="#">Robert Smith</a>
                                    <div class="text-muted">Dec 12, 05:46</div>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <a href="#" class="list-icons-item"><i class="icon-more"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /daily financials -->

            </div>
        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /content area -->
@endsection



@section('js')


    {!! Html::script(url('/').'/bootstrap/js/demo_pages/dashboard.js') !!}


    <script>
        $(function() {
        })
    </script>
@endsection