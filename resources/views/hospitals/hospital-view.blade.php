@extends('layout.app')
@section('page-title') Hospital Management @endsection
@section('css')

    {!! Html::style(url('/').'/bootstrap/assets/icofont/icofont.min.css') !!}
    <style>
        .hospital-section .card span{
            font-size: 24px;
        }
        .hospital-section .card i{
            font-size: 34px;
        }
    </style>
@endsection



@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="mr-3">
                                <a href="#">
                                    <img src="{!! \Illuminate\Support\Facades\Storage::disk('images')->url($hospital->logo) !!}" class="rounded-circle" width="42" height="42" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{!! $hospital->hospital_name !!}</div>
                                <p>{!! $hospital->summary !!}</p>
                                <p class="m-0"><i class="icofont-phone"></i> {!! $hospital->phone !!}</p>
                                <p class="m-0"><i class="icofont-ui-email"></i> {!! isset($hospital->users)?$hospital->users->email:"" !!}</p>
                                <p class="m-0"><i class="icofont-address-book"></i> {!! $hospital->address !!}</p>

                            </div>
                        </div>
                    </div>

                </div>



            </div>

        </div>

        <div class="row hospital-section">




                            <div class="col-md-2 col-sm-6">
                                <div class="card bg-green-300">
                                    <div class="card-body text-center">
                                        <i class="icofont-patient-file fs-3 text-white"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-14">Total Appointment</h6>
                                        <span class="text-white"> {!! isset($hospital->total_appointments[0])?($hospital->total_appointments[0]->appointments):0 !!}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="card bg-danger-300">
                                    <div class="card-body  text-center">
                                        <i class="icofont-crutch fs-3 text-white"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-14">Total Patients</h6>
                                        <span class="text-white">{!! isset($hospital->users->hospital_patients)?($hospital->users->hospital_patients[0]->patient_count):0 !!}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="card bg-blue-800">
                                    <div class="card-body  text-center">
                                        <i class="icofont-doctor fs-3 text-white"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-14">Total Expense</h6>
                                        <span class="text-white">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="card bg-success-800">
                                    <div class="card-body  text-center">
                                        <i class="icofont-king-monster fs-3 text-white"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-14">Total Sale </h6>
                                        <span class="text-white">{!! isset($hospital->users->total_sales)?number_format($hospital->users->total_sales[0]->grand_total,2):0 !!}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="card bg-brown-800">
                                    <div class="card-body  text-center">
                                        <i class="icofont-doctor-alt fs-3 text-white"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-14">Total Doctor</h6>
                                        <span class="text-white">{!! isset($hospital->total_doctors)?($hospital->total_doctors[0]->doctors):0 !!}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="card">
                                    <div class="card-body  text-center">
                                        <i class="icofont-nurse-alt fs-3 color-light-success"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-14">Total Staff </h6>
                                        <span class="text-muted">{!! isset($hospital->total_staffs)?($hospital->total_staffs[0]->staffs):0 !!}</span>
                                    </div>
                                </div>
                            </div>


        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card card-body">
                    <div class="chart-container">
                        <div class="chart" id="google-bar"></div>
                    </div>
                </div>

            </div>

            <div class="col-sm-12 col-md-6">
                <div class="card card-body">
                    <div class="chart-container">
                        <div class="chart" id="patient-appointments-bar"></div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body" style="max-height: 400px; overflow: auto">
                        <div class="table-responsive">
                            <table class="table text-nowrap">
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
                                    <th>Total Paid</th>
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

                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                                    <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                                                    <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $patient->id !!}"><i class="icon-history"></i> Past Sessions</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(Illuminate\Support\Str::slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="pending-appointment" data-patient-id="{!! $patient->id !!}"><i class="icon-alarm"></i>  Pending Appointments</a>
                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Consent Forms</a>
                                                    <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i> Media</a>
                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! \App\Helpers\CommonMethods::encrypt($patient->id) !!}"><i class="icon-address-book3"></i> Contact Patient </a>

                                                </div>





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
                                            <td>
                                                @if(isset($patient->amount_from_sale))
                                                    <a href="#!" class="show-payment" data-patient-id="{!! $patient->id !!}">
                                                        <span class="badge badge-danger">{!! number_format($patient->amount_from_sale->sale_amount,2) !!}</span>
                                                    </a>
                                                @else
                                                    0
                                                @endif
                                            </td>
                                            <td>@if($patient->media_files()->count() > 0) <a href="#!" class="get-media" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i></a>   @endif</td>
                                            <td>{!! date('d.m.Y',strtotime($patient->created_at)) !!}</td>
                                            <td>

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
                                                                    <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(Illuminate\Support\Str::slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="pending-appointment" data-patient-id="{!! $patient->id !!}"><i class="icon-alarm"></i>  Pending Appointments</a>
                                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Consent Forms</a>
                                                                    <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i> Media</a>
                                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! \App\Helpers\CommonMethods::encrypt($patient->id) !!}"><i class="icon-address-book3"></i> Contact Patient </a>

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
                    </div>
                </div>
            </div>


        </div>

    </div>



@endsection


@section('js')
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
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
                    var bar_chart_element = document.getElementById('google-bar');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Sales', 'Expenses'],
                        @if(isset($anually_sale_expense_report) && count($anually_sale_expense_report))
                            @foreach($anually_sale_expense_report as $k=>$value)
                                ['{!! $k!!}',  {!! $value['sale'] !!},      {!! $value['expense'] !!}],
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
                            left: '10%',
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
                    var bar_chart_element = document.getElementById('patient-appointments-bar');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Patients', 'Appointments'],
                            @if(isset($annually_patients_appointments) && count($annually_patients_appointments))
                            @foreach($annually_patients_appointments as $k=>$value)
                        ['{!! $k!!}',  {!! $value['patients'] !!},      {!! $value['appointments'] !!}],
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
                            left: '10%',
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

@endsection