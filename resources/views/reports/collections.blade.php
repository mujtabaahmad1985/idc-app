@extends('layout.app')
@section('page-title') Inventory Management @endsection
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
                        <h6 class="card-title">
                            Collections
                        </h6>
                    </div>

                    <div class="card-body">
                        <div class="d-lg-flex">
                            @include('reports.report-menu')
                            <div class="tab-content flex-lg-fill">
                                <div class="tab-pane fade active show " id="vertical-left-tab1">
                                    @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-monthly-collections")
<div class="card card-body">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div id="revenue-chart"></div>
            </div>

        </div>
    </div>
</div>
                                    @endif
                                    <div class="card card-body">
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
            </div>


        </div>




        </div>
    </div>





{{--    END BRAND MODAL --}}

@endsection


@section('js')
    @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-monthly-collections")
    <script src="https://www.gstatic.com/charts/loader.js"></script>
@endif
<script>
    $(function () {





        @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-monthly-collections")

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
                        ['Day', 'Sales'],

                            @if(isset($last_week_sales) && $last_week_sales->count() > 0)
                            @foreach($last_week_sales as $sale)
                        ['{!! $sale->day_name !!}',  {!! $sale->sale_amount !!}],
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


@endif


        $(".product-list-table").DataTable({
            "paging": true, "info":     true,"searching": true,

            "aaSorting": [],
            "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],

        });


    })
</script>
@endsection