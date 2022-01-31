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
                        <h6 class="card-title">Expense Reports</h6>
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
                                                        <h3 class="font-weight-semibold mb-0">{!! $total_expense !!}</h3>
                                                        <span class="text-uppercase font-size-sm text-muted">total expense</span>
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
                                                        <h3 class="font-weight-semibold mb-0">{!! number_format($total_expense_amount) !!}</h3>
                                                        <span class="text-uppercase font-size-sm text-muted">total expense amount</span>
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
                                        <div class="col-6">
                                            <div class="card card-body">
                                                <div id="revenue-chart"></div>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Expense per Category</h5>
                                                </div>

                                                <div class="card-body">

                                                    <div id="expense-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul class="nav nav-tabs nav-tabs-highlight">
                                                        <li class="nav-item">
                                                            <a href="/inventory/reports/expenses?for=expense&q=today" class="nav-link @if((request()->get('for')=="expense" || request()->get('for')=="" ) && request()->get('q')!="week") active @endif ">
                                                                <div>
                                                                    <i class="icon-menu7 d-block mb-1 mt-1"></i>
                                                                    Today expenses
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="/inventory/reports/expenses?for=expense&q=week" class="nav-link  @if(request()->get('for')=="expense" && request()->get('q')=="week") active @endif" >
                                                                <div>
                                                                    <i class="icon-mention d-block mb-1 mt-1"></i>
                                                                    Last Week expenses
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
                                                                    @if(isset($expenses) && $expenses->count() > 0)
                                                                        @foreach($expenses as $expense)
                                                                            <tr>
                                                                                <td>Invoice</td>
                                                                                <td>{!! \App\Helpers\CommonMethods::invoiceFormatID($expense->id) !!}</td>
                                                                                <td>{!! $expense->person_name !!}</td>
                                                                                <td>{!! \App\Helpers\CommonMethods::formatDate($expense->created_at) !!}</td>
                                                                                <td>{!! $expense->status !!}</td>
                                                                                <td>${!! number_format($expense->grand_total,2) !!}</td>
                                                                                <td><span class="badge badge-success">paid</span> </td>
                                                                                <td>
                                                                                    <div class="ml-3">
                                                                                        <div class="list-icons">
                                                                                            <div class="list-icons-item dropdown">
                                                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                                                                    <a href="/download/invoice/{!! $expense->appointment_id !!}" class="dropdown-item expense-print" data-id="{!! $expense->id !!}"><i class="icon-pencil"></i> Print</a>

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
                        ['Month', 'expenses'],

                            @if(isset($month_wise_expenses) && $month_wise_expenses->count() > 0)
                            @foreach($month_wise_expenses as $expense)
                        ['{!! $expense->month_name !!}',  {!! $expense->expense_amount !!}],
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
                            left: '10%',
                            width: '80%',
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
                            title: 'expenses',
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



        /* ------------------------------------------------------------------------------
    *
    *  # Google Visualization - columns
    *
    *  Google Visualization column chart demonstration
    *
    * ---------------------------------------------------------------------------- */


        // Setup module
        // ------------------------------

        var GoogleColumnBasic = function() {


            //
            // Setup module components
            //

            // Column chart
            var _googleColumnBasic = function() {
                if (typeof google == 'undefined') {
                    console.warn('Warning - Google Charts library is not loaded.');
                    return;
                }

                // Initialize chart
                google.charts.load('current', {
                    callback: function () {

                        // Draw chart
                        drawColumn();

                        // Resize on sidebar width change
                        var sidebarToggle = document.querySelectorAll('.sidebar-control');
                        if (sidebarToggle) {
                            sidebarToggle.forEach(function(togglers) {
                                togglers.addEventListener('click', drawColumn);
                            });
                        }

                        // Resize on window resize
                        var resizeColumn;
                        window.addEventListener('resize', function() {
                            clearTimeout(resizeColumn);
                            resizeColumn = setTimeout(function () {
                                drawColumn();
                            }, 200);
                        });
                    },
                    packages: ['corechart']
                });

                // Chart settings
                function drawColumn() {

                    // Define charts element
                    var line_chart_element = document.getElementById('expense-chart');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Category', 'Amount'],
                        @if(isset($expenses_per_categories) && $expenses_per_categories->count() > 0)
                            @foreach($expenses_per_categories as $category)
                        ['{!! $category->category_name !!}',  {!! $category->expense_amount !!}],
                        @endforeach
                        @endif

                    ]);


                    // Options
                    var options_column = {
                        fontName: 'Roboto',
                        height: 400,
                        fontSize: 12,
                        backgroundColor: 'transparent',
                        chartArea: {
                            left: '5%',
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
                            title: ' Expenses per categories',
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
                            0: { color: '#2ec7c9' },
                            1: { color: '#b6a2de' }
                        }
                    };

                    // Draw chart
                    var column = new google.visualization.ColumnChart(line_chart_element);
                    column.draw(data, options_column);
                }
            };


            //
            // Return objects assigned to module
            //

            return {
                init: function() {
                    _googleColumnBasic();
                }
            }
        }();


        // Initialize module
        // ------------------------------

        GoogleColumnBasic.init();

    </script>





@endsection