@extends('layout.app')
@section('page-title') Purchase Report @endsection
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
                                                        <h3 class="font-weight-semibold mb-0">{!! number_format($total_purchase) !!}</h3>
                                                        <span class="text-uppercase font-size-sm text-muted">total purchase</span>
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
                                                        <h3 class="font-weight-semibold mb-0">{!! number_format($total_purchase_amount) !!}</h3>
                                                        <span class="text-uppercase font-size-sm text-muted">total purchase amount</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-sm-6 col-xl-3">
                                            <div class="card card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h3 class="font-weight-semibold mb-0">{!! number_format($total_suppliers) !!}</h3>
                                                        <span class="text-uppercase font-size-sm text-muted">total suppliers</span>
                                                    </div>

                                                    <div class="ml-3 align-self-center">
                                                        <i class="icon-stats-decline2 icon-3x text-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                                <div class="card card-body">
                                                    <div id="revenue-chart"></div>
                                                </div>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Cost per Manufature</h5>
                                                </div>

                                                <div class="card-body">

                                                    <div id="supplier-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Purchase per top items</h5>
                                                </div>

                                                <div class="card-body">

                                                    <div id="purchase-per-chart"></div>
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
                                                            <a href="/inventory/reports/purchase?for=purchase&q=today" class="nav-link @if((request()->get('for')=="purchase" || request()->get('for')=="" ) && request()->get('q')!="week") active @endif ">
                                                                <div>
                                                                    <i class="icon-menu7 d-block mb-1 mt-1"></i>
                                                                    Today purchase
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="/inventory/reports/purchase?for=purchase&q=week" class="nav-link  @if(request()->get('for')=="purchase" && request()->get('q')=="week") active @endif" >
                                                                <div>
                                                                    <i class="icon-mention d-block mb-1 mt-1"></i>
                                                                    Last Week purchases
                                                                </div>
                                                            </a>
                                                        </li>

                                                    </ul>

                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="top-icon-tab1">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped purchase-order-list-table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Invoice No</th>

                                                                        <th>Manufacture Name</th>
                                                                        <th>Purchase order date</th>
                                                                        <th>Amount</th>
                                                                        <td>Number of Items</td>
                                                                        <th>Paid as</th>
                                                                        <th></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    @if(isset($orders) && $orders->count() > 0)
                                                                        @foreach($orders as $order)
                                                                            <tr>
                                                                                <td> {!! $order->id !!} </td>
                                                                                <td> {!! $order->invoice_no !!} </td>

                                                                                <td>{!! isset($order->manufactures)?$order->manufactures->name:"" !!}</td>
                                                                                <td>{!! \App\Helpers\CommonMethods::formatDate($order->purchase_date) !!}</td>
                                                                                <td>{!! $order->total_price !!}</td>
                                                                                <td> @if(isset($order->order_items) && $order->order_items->count() > 0) <a href="#!" class="badge badge-success" rel="item" data-id="{!! $order->id !!}">{!! $order->order_items->count() !!}</a>  @else <span class="badge badge-danger">0</span>  @endif </td>
                                                                                <td>{!! $order->cash_type !!}</td>
                                                                                <td>
                                                                                    <div class="ml-3">
                                                                                        <div class="list-icons">
                                                                                            <div class="list-icons-item dropdown">
                                                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                                                                    <a href="/order/edit/{!! $order->id !!}" class="dropdown-item" data-id="{!! $order->id !!}"><i class="icon-pencil"></i> Edit</a>
                                                                                                    <a href="#!" class="dropdown-item order-delete" data-action="" data-id="{!! $order->id !!}"><i class="icon-trash"></i> Delete</a>
                                                                                                    <div class="dropdown-divider"></div>
                                                                                                    <a href="/download/purchase/order/{!! $order->id !!}" class="dropdown-item product-view" data-id="{!! $order->id !!}"><i class="icon-credit-card"></i> Download Order</a>
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
                        ['Month', 'Purchase'],

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
                            title: 'purchase',
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
                    var line_chart_element = document.getElementById('purchase-per-chart');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Product', 'Amount'],
                            @if(isset($total_price_per_item) && $total_price_per_item->count() > 0)
                            @foreach($total_price_per_item as $item)
                        ['{!! $item->item_name !!}',  {!! $item->total_prices !!}],
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
                            title: 'Purchase Per Top Items',
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
                            0: { color: '#6894c9' },
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



        var GoogleManufactureBasic = function() {


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
                    var line_chart_element = document.getElementById('supplier-chart');

                    // Data
                    var data = google.visualization.arrayToDataTable([
                        ['Manufacture', 'Amount'],
                            @if(isset($total_purchase_per_manufatures) && $total_purchase_per_manufatures->count() > 0)
                            @foreach($total_purchase_per_manufatures as $price)
                        ['{!! $price->manufacture_name !!}',  {!! $price->total_price !!}],
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
                            title: 'Purchase Per Top Items',
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

        GoogleManufactureBasic.init();
    </script>





@endsection