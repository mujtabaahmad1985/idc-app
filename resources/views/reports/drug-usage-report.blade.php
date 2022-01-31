@extends('layout.app')
@section('page-title') Drug Usage Report @endsection
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
                        <h6 class="card-title">Drug Usage Reports</h6>
                    </div>

                    <div class="card-body">
                        <div class="d-lg-flex">
                            @include('reports.report-menu')
                            <div class="tab-content flex-lg-fill">
                                <div class="tab-pane fade active show " id="vertical-left-tab1">
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
                                    <div class="card card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th width="70%">Drug Name</th>
                                                    <th>Usage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($most_drug_usage))
                                                    @foreach($most_drug_usage as $k=>$drug)
                                                        <tr>
                                                            <td>{!! $k !!}</td>
                                                            <td>{!! $drug !!}</td>
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





@endsection