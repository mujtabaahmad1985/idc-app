@extends('layout.app')
@section('page-title') Dashboard @endsection
@section('css')

@endsection

@section('content')
@php
    $hospital_id = 0;
    if(\Illuminate\Support\Facades\Auth::user()->role=='hospital-administrator')
        $hospital_id = \Illuminate\Support\Facades\Auth::id();
    else
        $hospital_id = \Illuminate\Support\Facades\Auth::user()->hospital_id;
@endphp
    <!-- Content area -->
    <div class="content">


    <div class="card card-body">
        <div class="row text-center">
            <div class="col-3">
                <p><i class="icon-users2 icon-2x d-inline-block text-info"></i></p>
                <h5 class="font-weight-semibold mb-0">{!! \App\Doctors::whereNull('deleted_at')->where('hospital_id',$hospital_id)->count() !!}</h5>
                <span class="text-muted font-size-sm">Active Doctors</span>
            </div>

            <div class="col-3">
                <p><i class="icon-accessibility2 icon-2x d-inline-block text-warning"></i></p>
                <h5 class="font-weight-semibold mb-0">{!! \App\Patients::whereNull('deleted_at')->where('hospital_id',$hospital_id)->count() !!}</h5>
                <span class="text-muted font-size-sm">Active Patients</span>
            </div>

            <div class="col-3">
                <p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
                <h5 class="font-weight-semibold mb-0">{!! \App\Appointments::whereNull('deleted_at')->where('hospital_id',$hospital_id)->count() !!}</h5>
                <span class="text-muted font-size-sm">Appointments</span>
            </div>
            <div class="col-3">
                <p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
                <h5 class="font-weight-semibold mb-0">{!! \App\DoctorServices::where('hospital_id',$hospital_id)->count() !!}</h5>
                <span class="text-muted font-size-sm">Services</span>
            </div>
        </div>
    </div>


        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-8">

                <!-- Marketing campaigns -->
                <div class="card" style="max-height: 400px; overflow: auto">
                    <div class="card-header header-elements-sm-inline">
                        <h6 class="card-title">Recent Patients</h6>
                        <div class="header-elements">


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
                                @if(in_array(43,$permissions_allowed) || Auth::user()->role=='hospital-administrator')
                                <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                                    @endif
                            </tr>
                            </thead>
                            <tbody>
                            @if(in_array(40,$permissions_allowed) || Auth::user()->role=='hospital-administrator')
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
                                                        <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(Illuminate\Support\Str::slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>


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
                                        @if(in_array(43,$permissions_allowed) || Auth::user()->role=='hospital-administrator')
                                        <td>
                                            <div class="ml-3">
                                                <div class="list-icons">
                                                    <div class="list-icons-item dropdown">
                                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                                            <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                                                            <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(Illuminate\Support\Str::slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>


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

                                            <span class="font-weight-semibold">Oh snap!</span> You are not authorized to see patient list, please <a href="#" class="alert-link">contact hospital-administrator</a>.
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /marketing campaigns -->




                <!-- Support tickets -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Most usage of product</h5>
                    </div>

                    <div class="card-body">

                        <div class="chart-container">
                            <div class="chart" id="most-usage-product-bar"></div>
                        </div>
                    </div>
                </div>
                <!-- /support tickets -->




                <!-- Latest posts -->
                <div class="row">
                    <div class="col-sm-12">
                        @php
                                $appointments = \App\Appointments::whereNull('deleted_at')->orderBy('id','DESC')->where('appointment_type','appointment')->where('booking_date',\Carbon\Carbon::today()->format('Y-m-d'))->get();


                        @endphp
                        <div class="card">
                            <div class="card-header bg-white header-elements-inline">
                                <h4 class="card-title">Today's Appointments</h4>
                            </div>
                            <div class="card-body">

                                @if(isset($appointments) && $appointments->count() > 0)

                                    <table class="table table-borderless">

                                        @foreach($appointments as $appointment)
                                            <tr class="mb-2">
                                                <td>
                                                    <h5 class="m-0"><span>{!! $appointment->doctor_services->service_name !!}</span></h5>
                                                    <p class="badge badge-secondary">{!! $appointment->patients->first_name.' '.$appointment->patients->last_name !!}</p>
                                                    <p class="m-0 badge badge-light">Booked at {!! $appointment->booking_date !!} , {!! date('H:i a',strtotime($appointment->start_time)) !!}-{!! date('H:i a',strtotime($appointment->end_time)) !!}</p>





                                                </td>

                                            </tr>
                                        @endforeach
                                    </table>
                                    @else
                                    <p class="text-center text-danger">No appointment found</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-4">

                    </div>
                </div>




                <!-- /latest posts -->

            </div>

            <div class="col-xl-4">


                <!-- Daily sales -->
                <div class="card" style="max-height: 400px; overflow: auto">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Recent Logins</h6>

                    </div>

                    <div class="card-body">
                        <div class="chart" id="sales-heatmap"></div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-100">Login Activities (recent 30)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(in_array(41,$permissions_allowed) || Auth::user()->role=='hospital-administrator')
                                @php
                                $name = "";
                                $recent_logins = \App\LoginActivities::where('hospital_id',$hospital_id)->orderBy('id','DESC')->paginate('15');
                                @endphp
                            @if(isset($recent_logins))
                                @foreach($recent_logins as $login)
                                    @php
                                        if($login->users->role=="hospital-administrator")
                                            $name = "hospital-administrator";
                                         if($login->users->role=="subadmin" || $login->users->role=="receptionist")
                                            $name = $login->users->staffs->first_name.' '.$login->users->staffs->last_name;
                                    @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                <span class="letter-icon"></span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#" class="text-default font-weight-semibold letter-icon-title">{!! ucwords($name) !!} </a>logged at {!! $login->device !!}
                                            <div class="text-muted font-size-sm"><i class="icon-watch2 font-size-sm mr-1"></i> {!! \App\Helpers\CommonMethods::formatDateTime($login->created_at) !!}</div>

                                        </div>
                                    </div>
                                </td>


                            </tr>
                                @endforeach
                            @endif
                            @else
                                <tr>
                                    <td colspan="2">
                                        <div class="alert bg-danger text-white text-center" style="display: block">

                                            <span class="font-weight-semibold">Oh snap!</span> You are not authorized to see login list, please <a href="#" class="alert-link">contact hospital-administrator</a>.
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
                <div class="card " style="max-height: 400px; overflow: auto">
                    <div class="card-header bg-white header-elements-inline">
                        <h4 class="card-title">Low Stock Drugs</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">  <table class="table table-striped product-list-table">
                                    <thead>
                                    <tr>

                                        <th>Name</th>

                                        <th>Stock</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(isset($low_drugs) && $low_drugs->count() > 0)
                                        @foreach($low_drugs as $product)
                                            <tr >


                                                <td>{!! $product->product_title !!}</td>
                                                <td>
                                                    @if($product->quantity_signal > $product->in_stock)
                                                        <span class="badge bg-danger-600" style="width: 30px"> {!! $product->in_stock !!}</span>
                                                    @else
                                                        <span class="badge bg-green-600"  style="width: 30px"> {!! $product->in_stock !!}</span>
                                                    @endif

                                                </td>



                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /my messages -->


                <!-- Daily financials -->
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><i class="icon-calendar text-warning icon-2x mt-1"></i></a>
                        </div>

                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold mt-2"><a href="#" class="text-body">Pending Appointments ({!! \App\Appointments::whereNull('deleted_at')->where('status','pending')->count() !!})</a></h6>

                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><i class="icon-alarm  text-success icon-2x mt-1"></i></a>
                        </div>

                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold mt-2"><a href="#" class="text-body">Completed Appointments ({!! \App\Appointments::whereNull('deleted_at')->where('status','completed')->count() !!})</a></h6>

                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><i class="icon-close2  text-danger icon-2x mt-1"></i></a>
                        </div>

                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold mt-2"><a href="#" class="text-body">Completed Appointments ({!! \App\Appointments::whereNull('deleted_at')->where('status','cancelled')->count() !!})</a></h6>

                        </div>
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
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        /* ------------------------------------------------------------------------------
 *
 *  # Google Visualization - bars
 *
 *  Google Visualization bar chart demonstration
 *
 * ---------------------------------------------------------------------------- */


        // Setup module
        // ------------------------------

        var GoogleBarBasic = function() {


            //
            // Setup module components
            //

            // Bar chart
            var _googleBarBasic = function() {
                if (typeof google == 'undefined') {
                    console.warn('Warning - Google Charts library is not loaded.');
                    return;
                }

                // Initialize chart
                google.charts.load('current', {
                    callback: function () {

                        // Draw chart
                        drawBar();

                        // Resize on sidebar width change
                        var sidebarToggle = document.querySelectorAll('.sidebar-control');
                        if (sidebarToggle) {
                            sidebarToggle.forEach(function(togglers) {
                                togglers.addEventListener('click', drawBar);
                            });
                        }

                        // Resize on window resize
                        var resizeBarBasic;
                        window.addEventListener('resize', function() {
                            clearTimeout(resizeBarBasic);
                            resizeBarBasic = setTimeout(function () {
                                drawBar();
                            }, 200);
                        });
                    },
                    packages: ['corechart']
                });

                // Chart settings
                function drawBar() {

                    // Define charts element
                    var bar_chart_element = document.getElementById('most-usage-product-bar');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Drug', 'Usage Count'],
                            @if(isset($most_drug_usage))
                            @foreach($most_drug_usage as $k=>$drug)
                        ["{!! $k !!}",  {!! $drug !!}],
                        @endforeach
                        @endif

                    ]);


                    // Options
                    var options_bar = {
                        fontName: 'Roboto',
                        height: 400,
                        fontSize: 12,
                        backgroundColor: 'transparent',
                        chartArea: {
                            left: '18%',
                            width: '95%',
                            height: 350
                        },
                        tooltip: {
                            textStyle: {
                                fontName: 'Roboto',
                                fontSize: 13
                            }
                        },
                        vAxis: {
                            textStyle: {
                                color: '#333'
                            },
                            gridlines:{
                                count: 10
                            },
                            minValue: 0
                        },
                        hAxis: {
                            baselineColor: '#ccc',
                            textStyle: {
                                color: '#333'
                            },
                            gridlines:{
                                color: '#eee'
                            }
                        },
                        legend: {
                            position: 'top',
                            alignment: 'center',
                            textStyle: {
                                color: '#333'
                            }
                        },
                        series: {
                            0: { color: '#ffb980' },
                            1: { color: '#66BB6A' }
                        }
                    };

                    // Draw chart
                    var bar = new google.visualization.BarChart(bar_chart_element);
                    bar.draw(data, options_bar);

                }
            };


            //
            // Return objects assigned to module
            //

            return {
                init: function() {
                    _googleBarBasic();
                }
            }
        }();


        // Initialize module
        // ------------------------------

        GoogleBarBasic.init();
    </script>

    <script>
        $(function() {
        })
    </script>
@endsection