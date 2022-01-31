@extends('layout.app')
@section('page-title') Pharmacy Report @endsection
@section('css')
    {!! Html::style(url('/').'/bootstrap/js/plugins/easyautocomplete/easy-autocomplete.css') !!}
    <style>
        .easy-autocomplete{ width: 100% !important;}
    </style>
@endsection

@section('content')
    <div class="content">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Inventory Reports</h6>
                    </div>

                    <div class="card-body">
                        <div class="d-lg-flex">
                            @include('reports.report-menu')


                            <div class="tab-content flex-lg-fill">
                                <div class="tab-pane fade active show " id="vertical-left-tab1">

                                    <div class="row">
                                        <div class="col-sm-6 col-xl-3">
                                            <div class="card card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="icon-cart4 icon-3x text-success"></i>
                                                    </div>

                                                    <div class="media-body text-right">
                                                        <h3 class="font-weight-semibold mb-0">{!! $total_sale !!}</h3>
                                                        <span class="text-uppercase font-size-sm text-muted">total sale</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xl-3">
                                            <div class="card card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="icon-cash icon-3x text-indigo"></i>
                                                    </div>

                                                    <div class="media-body text-right">
                                                        <h3 class="font-weight-semibold mb-0">{!! number_format($total_revenue) !!}</h3>
                                                        <span class="text-uppercase font-size-sm text-muted">total revenue</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xl-3">
                                            <div class="card card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h3 class="font-weight-semibold mb-0">{!! number_format($total_revenue - $total_expense) !!}</h3>
                                                        <span class="text-uppercase font-size-sm text-muted">total profit</span>
                                                    </div>

                                                    <div class="ml-3 align-self-center">
                                                        <i class="icon-coins icon-3x text-primary"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xl-3">
                                            <div class="card card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h3 class="font-weight-semibold mb-0">{!! number_format(100) !!}</h3>
                                                        <span class="text-uppercase font-size-sm text-muted">total loss</span>
                                                    </div>

                                                    <div class="ml-3 align-self-center">
                                                        <i class="icon-stats-decline2 icon-3x text-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="card card-body">
                                                <div id="revenue-chart"></div>
                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Sale Breakdown</h5>
                                                </div>

                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-lg-9">
                                                            <div class="chart-container  text-center mb-3">
                                                                <div class="d-inline-block" id="google-pie-3d"></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="chart-container  text-center mb-3">
                                                                <div class="d-inline-block" id="google-3d-exploded"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul class="nav nav-tabs nav-tabs-highlight">
                                                        <li class="nav-item">
                                                            <a href="/inventory/reports/sale?for=sale&q=today" class="nav-link @if((request()->get('for')=="sale" || request()->get('for')=="" ) && request()->get('q')!="week") active @endif ">
                                                                <div>
                                                                    <i class="icon-menu7 d-block mb-1 mt-1"></i>
                                                                    Today Sales
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="/inventory/reports/sale?for=sale&q=week" class="nav-link  @if(request()->get('for')=="sale" && request()->get('q')=="week") active @endif" >
                                                                <div>
                                                                    <i class="icon-mention d-block mb-1 mt-1"></i>
                                                                    Last Week Sales
                                                                </div>
                                                            </a>
                                                        </li>

                                                    </ul>

                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="top-icon-tab1">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped product-list-table">
                                                                    <thead>
                                                                    <tr>

                                                                        <th>Type</th>
                                                                        <th>No.</th>
                                                                        <th>Customer</th>
                                                                        <th>Date</th>
                                                                        <th>Paid Via</th>
                                                                        <th>Total</th>
                                                                        <th>Status</th>



                                                                        <th class="text-right">Actions</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    @if(isset($sales) && $sales->count() > 0)
                                                                        @foreach($sales as $sale)
                                                                            <tr>
                                                                                <td>Invoice</td>
                                                                                <td>{!! \App\Helpers\CommonMethods::invoiceFormatID($sale->id) !!}</td>
                                                                                <td>{!! $sale->person_name !!}</td>
                                                                                <td>{!! \App\Helpers\CommonMethods::formatDate($sale->created_at) !!}</td>
                                                                                <td>{!! $sale->status !!}</td>
                                                                                <td>${!! number_format($sale->grand_total,2) !!}</td>
                                                                                <td><span class="badge badge-success">paid</span> </td>
                                                                                <td>
                                                                                    <div class="ml-3">
                                                                                        <div class="list-icons">
                                                                                            <div class="list-icons-item dropdown">
                                                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                                                                    <a href="/download/invoice/{!! $sale->appointment_id !!}" class="dropdown-item sale-print" data-id="{!! $sale->id !!}"><i class="icon-pencil"></i> Print</a>

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
                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-header">Top sold items</div>
                                                <div class="card-body">

                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th width="60%">Item</th>
                                                                <th>Sale</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Teeth moose</td>
                                                                <td>104</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Teeth moose</td>
                                                                <td>104</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Teeth moose</td>
                                                                <td>104</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Teeth moose</td>
                                                                <td>104</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
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
        /* ------------------------------------------------------------------------------
 *
 *  # Google Visualization - area
 *
 *  Google Visualization area chart demonstration
 *
 * ---------------------------------------------------------------------------- */


        // Setup module
        // ------------------------------

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
                    var area_basic_element = document.getElementById('revenue-chart');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Month', 'Sales'],

                        @if(isset($month_wise_sale) && $month_wise_sale->count() > 0)
                            @foreach($month_wise_sale as $sale)
                        ['{!! $sale->month_name !!}',  {!! $sale->sale_amount !!}],
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
                            title: 'Sales',
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
                    var pie_3d_element = document.getElementById('google-pie-3d');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Appointments',     11],
                        ['Patients',      2],
                        ['Sales',  2],
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
                            left: 0,
                            width: '85%',
                            height: '85%'
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

        /* ------------------------------------------------------------------------------
 *
 *  # Google Visualization - bars
 *
 *  Google Visualization bar chart demonstration
 *
 * ---------------------------------------------------------------------------- */

    </script>





@endsection