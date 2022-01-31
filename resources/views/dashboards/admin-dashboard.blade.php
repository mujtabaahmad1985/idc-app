@extends('layout.app')
@section('page-title') Dashboard @endsection
@section('css')

@endsection

@section('content')

    <!-- Content area -->
    <div class="content">


    <div class="card card-body">
        <div class="row text-center">
            <div class="col-4">
                <p><i class="icon-users2 icon-2x d-inline-block text-info"></i></p>
                <h5 class="font-weight-semibold mb-0">{!! $hospitals->count() !!}</h5>
                <span class="text-muted font-size-sm">Active Hospitals</span>
            </div>

            <div class="col-4">
                <p><i class="icon-accessibility2 icon-2x d-inline-block text-warning"></i></p>
                <h5 class="font-weight-semibold mb-0">{!! \App\Patients::whereNull('deleted_at')->count() !!}</h5>
                <span class="text-muted font-size-sm">Active Patients</span>
            </div>

            <div class="col-4">
                <p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
                <h5 class="font-weight-semibold mb-0">{!! \App\Invoices::where('status','paid')->count() !!} / <span class="small text-muted">${!! \App\Invoices::where('status','paid')->sum('total_amount')  !!}</span> </h5>
                <span class="text-muted font-size-sm">All Hospital's Paid Invoices</span>
            </div>

        </div>
    </div>


        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-8">





                <!-- Support tickets -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Patient by Hospital</h5>
                    </div>

                    <div class="card-body">

                        <div class="chart-container">
                            <div class="chart" id="patient-by-hospital"></div>
                        </div>
                    </div>
                </div>
                <!-- /support tickets -->




                <!-- Latest posts -->
                <div class="card">
                <div class="card-body">
                    <div class="chart-container">
                        <div class="chart has-fixed-height" id="columns_basic"></div>
                    </div>
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
                            @if(in_array(41,$permissions_allowed) || Auth::user()->role=='administrator')
                                @php
                                $name = "";
                                $recent_logins = \App\LoginActivities::orderBy('id','DESC')->paginate('15');
                                @endphp
                            @if(isset($recent_logins))
                                @foreach($recent_logins as $login)
                                    @php
                                        if($login->users->role=="administrator")
                                            $name = "Administrator";
                                         if($login->users->role=="hospital-administrator")
                                            $name = $login->users->hospitals->hospital_name;
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

                                            <span class="font-weight-semibold">Oh snap!</span> You are not authorized to see login list, please <a href="#" class="alert-link">contact administrator</a>.
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
                        <h4 class="card-title">Most Income from Hospitals</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="chart-container has-scroll text-center mb-3">
                                <div class="d-inline-block" id="most-income"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /my messages -->




            </div>
        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /content area -->
@endsection



@section('js')


    {!! Html::script(url('/').'/bootstrap/js/demo_pages/dashboard.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/visualization/echarts/echarts.min.js') !!}
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
                    var bar_chart_element = document.getElementById('patient-by-hospital');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Hopsital', 'Patient Count'],
                            @if(isset($hospitals))
                            @foreach($hospitals as $k=>$hospital)
                        ["{!! $hospital->hospital_name !!}",  {!! isset($hospital->users->hospital_patients)?($hospital->users->hospital_patients[0]->patient_count):0 !!}],
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
        /* ------------------------------------------------------------------------------
 *
 *  # Google Visualization - 3D pie
 *
 *  Google Visualization 3D pie chart demonstration
 *
 * ---------------------------------------------------------------------------- */


        // Setup module
        // ------------------------------

        var GooglePie3d = function() {


            //
            // Setup module components
            //

            // 3D pie chart
            var _googlePie3d = function() {
                if (typeof google == 'undefined') {
                    console.warn('Warning - Google Charts library is not loaded.');
                    return;
                }

                // Initialize chart
                google.charts.load('current', {
                    callback: function () {

                        // Draw chart
                        drawPie3d();

                        // Resize on sidebar width change
                        var sidebarToggle = document.querySelectorAll('.sidebar-control');
                        if (sidebarToggle) {
                            sidebarToggle.forEach(function(togglers) {
                                togglers.addEventListener('click', drawPie3d);
                            });
                        }

                        // Resize on window resize
                        var resizePie3d;
                        window.addEventListener('resize', function() {
                            clearTimeout(resizePie3d);
                            resizePie3d = setTimeout(function () {
                                drawPie3d();
                            }, 200);
                        });
                    },
                    packages: ['corechart']
                });

                // Chart settings
                function drawPie3d() {

                    // Define charts element
                    var pie_3d_element = document.getElementById('most-income');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        @if(isset($hospitals))
                        @foreach($hospitals as $k=>$hospital)
                        ["{!! $hospital->hospital_name !!}",  {!! isset($hospital->users->total_sales)?round($hospital->users->total_sales[0]->grand_total):0 !!}],
                        @endforeach
                        @endif
                    ]);

                    // Options
                    var options_pie_3d = {
                        fontName: 'Roboto',
                        is3D: true,
                        height: 300,
                        width: 540,
                        backgroundColor: 'transparent',
                        colors: [
                            '#2ec7c9','#b6a2de','#5ab1ef','#ffb980',
                            '#d87a80','#8d98b3','#e5cf0d','#97b552'
                        ],
                        chartArea: {
                            left: 10,
                            width: '90%',
                            height: '95%'
                        }
                    };

                    // Instantiate and draw our chart, passing in some options.
                    var pie_3d = new google.visualization.PieChart(pie_3d_element);
                    pie_3d.draw(data, options_pie_3d);
                }
            };


            //
            // Return objects assigned to module
            //

            return {
                init: function() {
                    _googlePie3d();
                }
            }
        }();


        // Initialize module
        // ------------------------------

        GooglePie3d.init();
    </script>

    <script>
        /* ------------------------------------------------------------------------------
 *
 *  # Echarts - Basic column example
 *
 *  Demo JS code for basic column chart [light theme]
 *
 * ---------------------------------------------------------------------------- */


        // Setup module
        // ------------------------------

        var EchartsColumnsBasicLight = function() {


            //
            // Setup module components
            //

            // Basic column chart
            var _columnsBasicLightExample = function() {
                if (typeof echarts == 'undefined') {
                    console.warn('Warning - echarts.min.js is not loaded.');
                    return;
                }

                // Define element
                var columns_basic_element = document.getElementById('columns_basic');


                //
                // Charts configuration
                //

                if (columns_basic_element) {

                    // Initialize chart
                    var columns_basic = echarts.init(columns_basic_element);


                    //
                    // Chart config
                    //

                    // Options
                    columns_basic.setOption({

                        // Define colors
                        color: ['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80'],

                        // Global text styles
                        textStyle: {
                            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                            fontSize: 13
                        },

                        // Chart animation duration
                        animationDuration: 750,

                        // Setup grid
                        grid: {
                            left: 0,
                            right: 40,
                            top: 35,
                            bottom: 0,
                            containLabel: true
                        },

                        // Add legend
                        legend: {
                            data: ['Patients', 'Appointments'],
                            itemHeight: 8,
                            itemGap: 20,
                            textStyle: {
                                padding: [0, 5]
                            }
                        },

                        // Add tooltip
                        tooltip: {
                            trigger: 'axis',
                            backgroundColor: 'rgba(0,0,0,0.75)',
                            padding: [10, 15],
                            textStyle: {
                                fontSize: 13,
                                fontFamily: 'Roboto, sans-serif'
                            }
                        },

                        // Horizontal axis
                        xAxis: [{
                            type: 'category',
                            data: [
                                @if(isset($hospitals))
                                        @foreach($hospitals as $k=>$hospital)
                                '{!! $hospital->hospital_name !!}',
                                @endforeach
                                @endif
                            ],
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: '#eee',
                                    type: 'dashed'
                                }
                            }
                        }],

                        // Vertical axis
                        yAxis: [{
                            type: 'value',
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                lineStyle: {
                                    color: ['#eee']
                                }
                            },
                            splitArea: {
                                show: true,
                                areaStyle: {
                                    color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                                }
                            }
                        }],

                        // Add series
                        series: [
                            {
                                name: 'Patients',
                                type: 'bar',
                                data: [
                                    @if(isset($hospitals))
                                    @foreach($hospitals as $k=>$hospital)
                                    {!! isset($hospital->users->hospital_patients)?($hospital->users->hospital_patients[0]->patient_count):0 !!},
                                    @endforeach
                                    @endif
                                ],
                                itemStyle: {
                                    normal: {
                                        label: {
                                            show: true,
                                            position: 'top',
                                            textStyle: {
                                                fontWeight: 500
                                            }
                                        }
                                    }
                                },
                                markLine: {
                                    data: [{type: 'average', name: 'Average'}]
                                }
                            },
                            {
                                name: 'Appointments',
                                type: 'bar',
                                data: [
                                    @if(isset($hospitals))
                                    @foreach($hospitals as $k=>$hospital)
                                    {!! isset($hospital->users->hospital_patients)?($hospital->users->hospital_appointments[0]->appointment_count):0 !!},
                                    @endforeach
                                    @endif
                                ],
                                itemStyle: {
                                    normal: {
                                        label: {
                                            show: true,
                                            position: 'top',
                                            textStyle: {
                                                fontWeight: 500
                                            }
                                        }
                                    }
                                },
                                markLine: {
                                    data: [{type: 'average', name: 'Average'}]
                                }
                            }
                        ]
                    });
                }


                //
                // Resize charts
                //

                // Resize function
                var triggerChartResize = function() {
                    columns_basic_element && columns_basic.resize();
                };

                // On sidebar width change
                var sidebarToggle = document.querySelectorAll('.sidebar-control');
                if (sidebarToggle) {
                    sidebarToggle.forEach(function(togglers) {
                        togglers.addEventListener('click', triggerChartResize);
                    });
                }

                // On window resize
                var resizeCharts;
                window.addEventListener('resize', function() {
                    clearTimeout(resizeCharts);
                    resizeCharts = setTimeout(function () {
                        triggerChartResize();
                    }, 200);
                });
            };


            //
            // Return objects assigned to module
            //

            return {
                init: function() {
                    _columnsBasicLightExample();
                }
            }
        }();


        // Initialize module
        // ------------------------------

        document.addEventListener('DOMContentLoaded', function() {
            EchartsColumnsBasicLight.init();
        });
    </script>
@endsection