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
                <div class="card card-body">
                    <div class="form-group col-sm-4">
                        <label>Hospital</label>
                        <select id="hospitals" class="form-control">
                            <option value="" selected disabled="">Choose Any</option>
                            @foreach(\App\Hospitals::whereNull('deleted_at')->where('status',1)->get()  as $hospital1)
                                <option @if($hospital1->id==request()->get('hospital-id')) selected @endif value="{!! $hospital1->id !!}">{!! $hospital1->hospital_name !!}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">

                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-img-actions d-inline-block mb-3">
                            @if(isset($hospital) && !empty(\Illuminate\Support\Facades\Storage::disk('images')->url($hospital->logo)))
                            <img class="img-fluid rounded-circle" src="{!! \Illuminate\Support\Facades\Storage::disk('images')->url($hospital->logo) !!}" alt="">
                                @endif

                        </div>

                        <h6 class="font-weight-semibold mb-0">{!! isset($hospital)?$hospital->hospital_name:"" !!}</h6>
                        <span class="d-block opacity-75">{!! isset($hospital) && isset($hospital->hospital_types)?$hospital->hospital_types->type_name:"" !!}</span>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="media">
                        <div class="media-body">

                            <h4 class="media-title font-weight-semibold">{!! isset($hospital) && isset($hospital->users->hospital_patients)?number_format($hospital->users->hospital_patients[0]->patient_count):0 !!}</h4>
                            <span class="text-muted">Total Patients</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <i class="icon-home2 icon-2x text-purple"></i>
                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-title font-weight-semibold">{!! isset($hospital) && isset($hospital->users->hospital_patients)?number_format($hospital->users->hospital_patients[0]->patient_count):0 !!}</h4>
                            <span class="text-muted">Total Patients Served</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <i class="icon-home2 icon-2x text-purple"></i>
                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-title font-weight-semibold">{!! isset($hospital) && isset($hospital->users->total_sales)?round($hospital->users->total_sales[0]->grand_total):0 !!}</h4>
                            <span class="text-muted">Total Revenue</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <i class="icon-home2 icon-2x text-purple"></i>
                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-title font-weight-semibold">{!! isset($hospital) && isset($hospital->users->hospital_doctors)?number_format($hospital->users->hospital_doctors[0]->total_doctors):0 !!}</h4>
                            <span class="text-muted">Doctors</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <i class="icon-home2 icon-2x text-purple"></i>
                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-title font-weight-semibold">{!! isset($hospital) && isset($hospital->users->hospital_staffs)?number_format($hospital->users->hospital_staffs[0]->total_staff):0 !!}</h4>
                            <span class="text-muted">Staffs</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <i class="icon-home2 icon-2x text-purple"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="card col-sm-12 col-md-12">
                        <div class="card-header">
                            <h5 class="card-title">Patient Register in last 12 months</h5>
                        </div>

                        <div class="card-body">

                            <div class="chart-container">
                                <div class="chart" id="google-line"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card col-sm-12 col-md-6">
                        <div class="card-header"><h3 class="">Most Services Used</h3> </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @if(isset($most_used_services) && $most_used_services->count() > 0)
                                     @foreach($most_used_services as $service)
                                    <tr>
                                        <td>{!! $service->service_name !!}</td>
                                        <td>{!! $service->services !!}</td>
                                    </tr>
                                    @endforeach
                                  @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card col-sm-12 col-md-6">
                        <div class="card-header"><h3>Last 6 Months appointments</h3></div>
                        <div class="card-body">
                            <div class="chart-container">
                                <div class="chart" id="google-area"></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>



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
    <script>
        $(function () {
            $("select").select2().on('change',function () {
                var id = $(this).val();
               window.location.href = "/hospital/summary/reports?hospital-id="+id;
            });
        })
    </script>

@endsection