@extends('layout.app')
@section('page-title') Patient Report @endsection
@section('css')
    {!! Html::style(url('/').'/bootstrap/js/plugins/easyautocomplete/easy-autocomplete.css') !!}
    <style>
        .easy-autocomplete{ width: 100% !important;}
    </style>
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Patients</span> - Reports</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="/patients" class="btn btn-link btn-float text-body"><i class="icon-users text-primary"></i> <span>Patients</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/pharmacy" class="breadcrumb-item">Patients</a>
                    <span class="breadcrumb-item active">Report Summary</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Patient Reports</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">Patients Seen by doctors</h6>
                                    </div>

                                    <div class="card-body">
                                        @php
                                        $doctors = \App\Doctors::whereNull('deleted_at')
                                        ->withCount(['doctor_todays_patients','doctor_last_week_patients','doctor_last_month_patients','doctor_last_year_patients'])

                                        ->get();


                                        @endphp
                                        <ul class="nav nav-tabs nav-tabs-highlight">
                                            <li class="nav-item"><a href="#badge-tab1" class="nav-link active" data-toggle="tab"> Today</a></li>
                                            <li class="nav-item"><a href="#badge-tab2" class="nav-link " data-toggle="tab">Last Week </a></li>
                                            <li class="nav-item"><a href="#badge-tab3" class="nav-link " data-toggle="tab">Last Month </a></li>
                                            <li class="nav-item"><a href="#badge-tab4" class="nav-link " data-toggle="tab">Last Year </a></li>

                                        </ul>



                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="badge-tab1">







                                                @if(isset($doctors) && $doctors->count() > 0)

                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-sm">
                                                            <thead>
                                                            <tr>
                                                                <th>Doctor</th>
                                                                <th>Patients</th>
                                                            </tr>
                                                            </thead>
                                                            @foreach($doctors as $doctor)
                                                                <tr>
                                                                    <th><a class="text-muted" href="/doctor/profile/{!! $doctor->users->name !!}" target="_blank">Dr. {!! $doctor->fname.' '.$doctor->lname !!}</a> </th>
                                                                    <td>{!! isset($doctor->doctor_todays_patients)?$doctor->doctor_todays_patients_count:0 !!}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                @endif


                                            </div>
                                            <div class="tab-pane fade" id="badge-tab2">







                                                @if(isset($doctors) && $doctors->count() > 0)

                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>Doctor</th>
                                                                    <th>Patients</th>
                                                                </tr>
                                                            </thead>
                                                            @foreach($doctors as $doctor)
                                                                <tr>
                                                                    <th><a class="text-muted" href="/doctor/profile/{!! $doctor->users->name !!}" target="_blank">Dr. {!! $doctor->fname.' '.$doctor->lname !!}</a> </th>
                                                                    <td>{!! isset($doctor->doctor_last_week_patients)?$doctor->doctor_last_week_patients_count:0 !!}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                @endif


                                            </div>
                                            <div class="tab-pane fade" id="badge-tab3">







                                                @if(isset($doctors) && $doctors->count() > 0)

                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-sm">
                                                            <thead>
                                                            <tr>
                                                                <th>Doctor</th>
                                                                <th>Patients</th>
                                                            </tr>
                                                            </thead>
                                                            @foreach($doctors as $doctor)
                                                                <tr>
                                                                    <th><a class="text-muted" href="/doctor/profile/{!! $doctor->users->name !!}" target="_blank">Dr. {!! $doctor->fname.' '.$doctor->lname !!}</a> </th>
                                                                    <td>{!! isset($doctor->doctor_last_month_patients)?$doctor->doctor_last_month_patients_count:0 !!}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                @endif


                                            </div>
                                            <div class="tab-pane fade" id="badge-tab4">







                                                @if(isset($doctors) && $doctors->count() > 0)

                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-sm">
                                                            <thead>
                                                            <tr>
                                                                <th>Doctor</th>
                                                                <th>Patients</th>
                                                            </tr>
                                                            </thead>
                                                            @foreach($doctors as $doctor)
                                                                <tr>
                                                                    <th><a class="text-muted" href="/doctor/profile/{!! $doctor->users->name !!}" target="_blank">Dr. {!! $doctor->fname.' '.$doctor->lname !!}</a> </th>
                                                                    <td>{!! isset($doctor->doctor_last_year_patients)?$doctor->doctor_last_year_patients_count:0 !!}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                @endif


                                            </div>
                                        </div>






                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card card-body">
                                    <div class="row text-center">
                                        <div class="col-6">
                                            <p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
                                            <h5 class="font-weight-semibold mb-0">${!! number_format($today_sale->sale_amount,2) !!}</h5>
                                            <span class="text-muted font-size-sm">Total amount for today</span>
                                        </div>

                                        <div class="col-6">
                                            <p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
                                            <h5 class="font-weight-semibold mb-0">${!! number_format($last_week_wise_sale->sale_amount,2) !!}</h5>
                                            <span class="text-muted font-size-sm">Total amount for this week</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-body">
                                    <div class="row text-center">
                                        <div class="col-6">
                                            <p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
                                            <h5 class="font-weight-semibold mb-0">${!! number_format($last_month_wise_sale->sale_amount,2) !!}</h5>
                                            <span class="text-muted font-size-sm">Total amount for this month</span>
                                        </div>
                                        <div class="col-6">
                                            <p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
                                            <h5 class="font-weight-semibold mb-0">${!! number_format($total_sale_by_patients->sale_amount,2) !!}</h5>
                                            <span class="text-muted font-size-sm">Total amount</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>



        <div class="row">
            <div class="card col-sm-12 col-md-6">
                <div class="card-header">
                    <h5 class="card-title">Patient Register in last 12 months</h5>
                </div>

                <div class="card-body">

                        @if(isset($patients) && count($patients) > 0 )
                    <div class="chart-container">
                        <div class="chart" id="google-line"></div>
                    </div>
                            @endif
                </div>
            </div>

            <div class="card  col-sm-12 col-md-6">
                <div class="card-header">
                    <h5 class="card-title">Patient Visisted in last 12 months</h5>
                </div>

                <div class="card-body">

                    <div class="chart-container">
                        <div class="chart" id="google-area"></div>
                    </div>
                </div>
            </div>
        </div>





    </div>



    {{--    END BRAND MODAL --}}

@endsection

@section('js')
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>

        var GoogleLineBasic = function() {


            //
            // Setup module components
            //

            // Line chart
            var _googleLineBasic = function() {
                if (typeof google == 'undefined') {
                    console.warn('Warning - Google Charts library is not loaded.');
                    return;
                }

                // Initialize chart
                google.charts.load('current', {
                    callback: function () {

                        // Draw chart
                        drawLineChart();

                        // Resize on sidebar width change
                        var sidebarToggle = document.querySelectorAll('.sidebar-control');
                        if (sidebarToggle) {
                            sidebarToggle.forEach(function(togglers) {
                                togglers.addEventListener('click', drawLineChart);
                            });
                        }

                        // Resize on window resize
                        var resizeLineBasic;
                        window.addEventListener('resize', function() {
                            clearTimeout(resizeLineBasic);
                            resizeLineBasic = setTimeout(function () {
                                drawLineChart();
                            }, 200);
                        });
                    },
                    packages: ['corechart']
                });

                // Chart settings
                function drawLineChart() {

                    // Define charts element
                    var line_chart_element = document.getElementById('google-line');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Patients'],
                        @if(isset($patients) && count($patients))
                            @foreach($patients as $k=>$patient)
                                ['{!! $k !!}',  {!! $patient !!}],
                            @endforeach
                        @endif

                    ]);

                    // Options
                    var options = {
                        fontName: 'Roboto',
                        height: 400,
                        fontSize: 12,
                        chartArea: {
                            left: '5%',
                            width: '94%',
                            height: 350
                        },
                        pointSize: 7,
                        curveType: 'function',
                        backgroundColor: 'transparent',
                        tooltip: {
                            textStyle: {
                                fontName: 'Roboto',
                                fontSize: 13
                            }
                        },
                        vAxis: {
                            title: 'Registered Patients',
                            titleTextStyle: {
                                fontSize: 13,
                                italic: false,
                                color: '#333'
                            },
                            textStyle: {
                                color: '#333'
                            },
                            baselineColor: '#ccc',
                            gridlines:{
                                color: '#eee',
                                count: 10
                            },
                            minValue: 0
                        },
                        hAxis: {
                            textStyle: {
                                color: '#333'
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
                            0: { color: '#EF5350' },
                            1: { color: '#66BB6A' }
                        }
                    };

                    // Draw chart
                    var line_chart = new google.visualization.LineChart(line_chart_element);
                    line_chart.draw(data, options);
                }
            };


            //
            // Return objects assigned to module
            //

            return {
                init: function() {
                    _googleLineBasic();
                }
            }
        }();


        // Initialize module
        // ------------------------------

        GoogleLineBasic.init();
    </script>
    <script>
        var GoogleAreaBasic = function() {


            //
            // Setup module components
            //

            // Area chart
            var _googleAreaBasic = function() {
                if (typeof google == 'undefined') {
                    console.warn('Warning - Google Charts library is not loaded.');
                    return;
                }

                // Initialize chart
                google.charts.load('current', {
                    callback: function () {

                        // Draw chart
                        drawAreaChart();

                        // Resize on sidebar width change
                        var sidebarToggle = document.querySelectorAll('.sidebar-control');
                        if (sidebarToggle) {
                            sidebarToggle.forEach(function(togglers) {
                                togglers.addEventListener('click', drawAreaChart);
                            });
                        }

                        // Resize on window resize
                        var resizeAreaChart;
                        window.addEventListener('resize', function() {
                            clearTimeout(resizeAreaChart);
                            resizeAreaChart = setTimeout(function () {
                                drawAreaChart();
                            }, 200);
                        });
                    },
                    packages: ['corechart']
                });

                // Chart settings
                function drawAreaChart() {

                    // Define charts element
                    var area_basic_element = document.getElementById('google-area');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Patients'],
                            @if(isset($visited_patients) && count($patients))
                            @foreach($visited_patients as $k=>$patient)
                        ['{!! $k !!}',  {!! $patient !!}],
                        @endforeach
                        @endif
                    ]);


                    // Options
                    var options = {
                        fontName: 'Roboto',
                        height: 400,
                        fontSize: 12,
                        areaOpacity: 0.25,
                        chartArea: {
                            left: '5%',
                            width: '94%',
                            height: 350
                        },
                        pointSize: 7,
                        backgroundColor: 'transparent',
                        tooltip: {
                            textStyle: {
                                fontName: 'Roboto',
                                fontSize: 13
                            }
                        },
                        vAxis: {
                            title: 'Yearly Patients Visits',
                            titleTextStyle: {
                                fontSize: 13,
                                italic: false,
                                color: '#333'
                            },
                            textStyle: {
                                color: '#333'
                            },
                            baselineColor: '#ccc',
                            gridlines:{
                                color: '#eee',
                                count: 10
                            },
                            gridarea:{
                                count: 10
                            },
                            minValue: 0
                        },
                        hAxis: {
                            textStyle: {
                                color: '#333'
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
                            0: { color: '#2ec7c9' },
                            1: { color: '#b6a2de' }
                        }
                    };

                    // Draw chart
                    var area_chart = new google.visualization.AreaChart(area_basic_element);
                    area_chart.draw(data, options);
                }
            };


            //
            // Return objects assigned to module
            //

            return {
                init: function() {
                    _googleAreaBasic();
                }
            }
        }();


        // Initialize module
        // ------------------------------

        GoogleAreaBasic.init();
    </script>
    @endsection
