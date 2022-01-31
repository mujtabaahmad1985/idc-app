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
        <div class="card col-sm-12 col-md-12">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Pharmacy Report</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Daily Sale</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="area_multiple" style="height: 240px;"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Monthly Sale</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="columns_timeline" style="height: 240px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Daily Purchase</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="chart-container">
                            <div class="chart has-fixed-height" id="area_multiple" style="height: 240px;"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Monthly Purchase</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="chart-container">
                            <div class="chart has-fixed-height" id="columns_timeline" style="height: 240px;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">Recent sales stats</h6>
                            <div class="header-elements">
                                <span class="font-weight-bold text-danger-600 ml-2">$4,378</span>
                                <div class="list-icons ml-3">
                                    <div class="list-icons-item dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                            <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                            <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart" id="sales-heatmap"></div>
                        </div>

                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th class="w-100">Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(isset($recent_sale) && $recent_sale->count() > 0)
                                    @foreach($recent_sale as $proudct)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="mr-3">
                                                        <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                            <span class="letter-icon">S</span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">{!! $proudct->products->product_title !!}</a>
                                                        <div class="text-muted font-size-sm"><i class="icon-checkmark3 font-size-sm mr-1"></i> New order</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-muted font-size-sm">{!! $proudct->total_quantity !!}</span>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-semibold mb-0">${!! $proudct->total_price !!}</h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">Daily sales stats</h6>
                            <div class="header-elements">
                                <span class="font-weight-bold text-danger-600 ml-2">$4,378</span>
                                <div class="list-icons ml-3">
                                    <div class="list-icons-item dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                            <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                            <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart" id="sales-heatmap"></div>
                        </div>

                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th class="w-100">Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(isset($recent_sale) && $recent_sale->count() > 0)
                                    @foreach($recent_sale as $proudct)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="mr-3">
                                                        <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                            <span class="letter-icon">S</span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">{!! $proudct->products->product_title !!}</a>
                                                        <div class="text-muted font-size-sm"><i class="icon-checkmark3 font-size-sm mr-1"></i> New order</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-muted font-size-sm">{!! $proudct->total_quantity !!}</span>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-semibold mb-0">${!! $proudct->total_price !!}</h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">Recent Purchase stats</h6>
                            <div class="header-elements">
                                <span class="font-weight-bold text-danger-600 ml-2">$4,378</span>
                                <div class="list-icons ml-3">
                                    <div class="list-icons-item dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                            <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                            <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart" id="sales-heatmap"></div>
                        </div>

                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th class="w-100">Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(isset($recent_sale) && $recent_sale->count() > 0)
                                    @foreach($recent_sale as $proudct)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="mr-3">
                                                        <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                            <span class="letter-icon">S</span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">{!! $proudct->products->product_title !!}</a>
                                                        <div class="text-muted font-size-sm"><i class="icon-checkmark3 font-size-sm mr-1"></i> New order</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-muted font-size-sm">{!! $proudct->total_quantity !!}</span>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-semibold mb-0">${!! $proudct->total_price !!}</h6>
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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Future Prediction</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="chart-container">
                            <div class="chart has-fixed-height" id="columns_change_waterfall"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>



    {{--    END BRAND MODAL --}}

@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/datatables.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/dataTables.buttons.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/styling/uniform.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/easyautocomplete/jquery.easy-autocomplete.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/visualization/echarts/echarts.min.js') !!}

<script>
    $(function(){
        var area_multiple_element = document.getElementById('area_multiple');
        var columns_timeline_element = document.getElementById('columns_timeline');
        var columns_timeline = echarts.init(columns_timeline_element);
        var area_multiple = echarts.init(area_multiple_element);
        var columns_change_waterfall_element = document.getElementById('columns_change_waterfall');
        var columns_change_waterfall = echarts.init(columns_change_waterfall_element);
        area_multiple.setOption({

            // Define colors
            color: ['#f17a52'],

            // Global text styles
            textStyle: {
                fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                fontSize: 13
            },

            // Chart animation duration
            animationDuration: 750,

            // Setup grid
            grid: [
                {
                    left: 0,
                    right: 20,
                    top: 40,
                    height: 160,
                    containLabel: true
                },

            ],

            // Title
            title: [
                {
                    left: 'center',
                    text: 'Last 7 days sale',
                    top: 0,
                    textStyle: {
                        fontSize: 15,
                        fontWeight: 500
                    }
                },

            ],

            // Tooltip
            tooltip: {
                trigger: 'axis',
                backgroundColor: 'rgba(0,0,0,0.75)',
                padding: [10, 15],
                textStyle: {
                    fontSize: 13,
                    fontFamily: 'Roboto, sans-serif'
                },
                formatter: function (a) {
                    return (
                        a[0]['axisValueLabel'] + "<br>" +
                        '<span class="badge badge-mark mr-2" style="border-color: ' + a[0]['color'] + '"></span>' +
                        a[0]['seriesName'] + ': ' + a[0]['value'] + ' sales' + "<br>" +
                        '<span class="badge badge-mark mr-2" style="border-color: ' + a[1]['color'] + '"></span>' +
                        a[1]['seriesName'] + ': ' + a[1]['value'] + ' sales'
                    );
                }
            },

            // Connect axis pointers
            axisPointer: {
                link: {
                    xAxisIndex: 'all'
                }
            },

            // Horizontal axis
            xAxis: [
                {
                    type: 'category',
                    boundaryGap: false,
                    axisLine: {
                        onZero: true,
                        lineStyle: {
                            color: '#999'
                        }
                    },
                    axisLabel: {
                        textStyle: {
                            color: '#333'
                        }
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: '#eee',
                            width: 1,
                            type: 'dashed'
                        }
                    },
                    splitArea: {
                        show: true,
                        areaStyle: {
                            color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                        }
                    },
                    data: [@foreach($weekly_sale as $sale)'{!! $sale->day_name !!}',@endforeach],
                },

            ],

            // Vertical axis
            yAxis: [
                {
                    type: 'value',
                    axisLine: {
                        onZero: true,
                        lineStyle: {
                            color: '#999'
                        }
                    },
                    axisLabel: {
                        textStyle: {
                            color: '#333'
                        }
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: '#eee',
                            width: 1,
                            type: 'dashed'
                        }
                    }
                },

            ],

            // Add series
            series: [
                {
                    name: 'Daily Sale',
                    type: 'line',
                    smooth: true,
                    symbolSize: 7,
                    areaStyle: {
                        normal: {
                            opacity: 0.25
                        }
                    },
                    itemStyle: {
                        normal: {
                            borderWidth: 2
                        }
                    },
                    data: [@foreach($weekly_sale as $sale)'{!! $sale->total_price !!}',@endforeach],
                }
            ]
        });
        var dataMap = {};
        dataMap.dataGDP = ({
            "June 20":[16251.93,11307.28,24515.76,11237.55,14359.88,22226.7,10568.83,12582,19195.69,49110.27],
            "May 20":[16251.93,11307.28,24515.76,11237.55,14359.88,22226.7,10568.83,12582,19195.69,49110.27],
            "April 20":[14113.58,9224.46,20394.26,9200.86,11672,18457.27,8667.58,10368.6,17165.98,41425.48],
            "March 20":[12153.03,7521.85,17235.48,7358.31,9740.25,15212.49,7278.75,8587,15046.45,34457.3],
            "Febraury 20":[11115,6719.01,16011.97,7315.4,8496.2,13668.58,6426.1,8314.37,14069.87,30981.98],
            "January 20":[9846.81,5252.76,13607.32,6024.45,6423.18,11164.3,5284.69,7104,12494.01,26018.48]
        });
        dataMap.dataEstate = ({
            "June 20":[1074.93,411.46,918.02,224.91,384.76,876.12,238.61,492.1,1019.68,2747.89],
            "May 20":[1006.52,377.59,697.79,192,309.25,733.37,212.32,391.89,1002.5,2600.95],
            "April 20":[1062.47,308.73,612.4,173.31,286.65,605.27,200.14,301.18,1237.56,2025.39],
            "March 20":[844.59,227.88,513.81,166.04,273.3,500.81,182.7,244.47,939.34,1626.13],
            "Febraury 20":[821.5,183.44,467.97,134.12,191.01,410.43,153.03,225.81,958.06,1365.71],
            "January 20":[821.5,183.44,467.97,134.12,191.01,410.43,153.03,225.81,958.06,1365.71]
        });
        dataMap.dataFinancial = ({
            "June 20":[1074.93,411.46,918.02,224.91,384.76,876.12,238.61,492.1,1019.68,2747.89],
            "May 20":[1006.52,377.59,697.79,192,309.25,733.37,212.32,391.89,1002.5,2600.95],
            "April 20":[1062.47,308.73,612.4,173.31,286.65,605.27,200.14,301.18,1237.56,2025.39],
            "March 20":[844.59,227.88,513.81,166.04,273.3,500.81,182.7,244.47,939.34,1626.13],
            "Febraury 20":[821.5,183.44,467.97,134.12,191.01,410.43,153.03,225.81,958.06,1365.71],
            "January 20":[821.5,183.44,467.97,134.12,191.01,410.43,153.03,225.81,958.06,1365.71]
        });


        // Options
        columns_timeline.setOption({

            // Setup timeline
            timeline: {
                axisType: 'category',
                data: ['January 20', 'Febraury 20', 'March 20', 'April 20', 'May 20','June 20'],
                left: 0,
                right: 0,
                bottom: 0,
                label: {
                    normal: {
                        fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                        fontSize: 11
                    }
                },
                autoPlay: true,
                playInterval: 3000
            },

            // Config
            options: [
                {

                    // Global text styles
                    textStyle: {
                        fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                        fontSize: 13
                    },

                    // Chart animation duration
                    animationDuration: 750,

                    // Setup grid
                    grid: {
                        left: 10,
                        right: 10,
                        top: 35,
                        bottom: 60,
                        containLabel: true
                    },

                    // Add legend
                    legend: {
                        data: ['Sale','Purchase','Profit'],
                        itemHeight: 8,
                        itemGap: 20
                    },

                    // Tooltip
                    tooltip: {
                        trigger: 'axis',
                        backgroundColor: 'rgba(0,0,0,0.75)',
                        padding: [10, 15],
                        textStyle: {
                            fontSize: 13,
                            fontFamily: 'Roboto, sans-serif'
                        },
                        axisPointer: {
                            type: 'shadow',
                            shadowStyle: {
                                color: 'rgba(0,0,0,0.025)'
                            }
                        }
                    },

                    // Horizontal axis
                    xAxis: [{
                        type: 'category',
                        data: ['1st Week','2nd Week','3rd Week','Last Week'],
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
                        },
                        splitArea: {
                            show: true,
                            areaStyle: {
                                color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.015)']
                            }
                        }
                    }],

                    // Vertical axis
                    yAxis: [
                        {
                            type: 'value',
                            name: 'Sale（SGD)',
                            max: 53500,
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
                                    color: '#eee'
                                }
                            }
                        },
                        {
                            type: 'value',
                            name: 'Other（SGD)',
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
                                    color: '#f5f5f5'
                                }
                            }
                        }
                    ],

                    // Add series
                    series: [
                        {
                            name: 'Profit',
                            type: 'bar',
                            markLine: {
                                symbol: ['arrow','none'],
                                symbolSize: [4, 2],
                                itemStyle: {
                                    normal: {
                                        lineStyle: {color: 'orange'},
                                        barBorderColor: 'orange',
                                        label: {
                                            position: 'left',
                                            formatter: function(params) {
                                                return Math.round(params.value);
                                            },
                                            textStyle: {color: 'orange'}
                                        }
                                    }
                                },
                                data: [{type: 'average', name: 'Average'}]
                            },
                            data: dataMap.dataGDP['January 20']
                        },
                        {
                            name: 'Sale',
                            yAxisIndex: 1,
                            type: 'bar',
                            data: dataMap.dataFinancial['January 20']
                        },
                        {
                            name: 'Pruchase',
                            yAxisIndex: 1,
                            type: 'bar',
                            data: dataMap.dataEstate['January 20']
                        }
                    ]
                },

                // 2011 data
                {
                    series: [
                        {data: dataMap.dataGDP['Febraury 20']},
                        {data: dataMap.dataFinancial['Febraury 20']},
                        {data: dataMap.dataEstate['Febraury 20']}
                    ]
                },

                // 2012 data
                {
                    series: [
                        {data: dataMap.dataGDP['March 20']},
                        {data: dataMap.dataFinancial['March 20']},
                        {data: dataMap.dataEstate['March 20']}
                    ]
                },

                // 2013 data
                {
                    series: [
                        {data: dataMap.dataGDP['April 20']},
                        {data: dataMap.dataFinancial['April 20']},
                        {data: dataMap.dataEstate['April 20']}
                    ]
                },

                // 2014 data
                {
                    series: [
                        {data: dataMap.dataGDP['May 20']},
                        {data: dataMap.dataFinancial['May 20']},
                        {data: dataMap.dataEstate['May 20']}
                    ]
                }
                ,

                // 2014 data
                {
                    series: [
                        {data: dataMap.dataGDP['June 20']},
                        {data: dataMap.dataFinancial['June 20']},
                        {data: dataMap.dataEstate['June 20']}
                    ]
                }
            ]
        });
        columns_change_waterfall.setOption({

            // Define colors
            color: ['#f17a52', '#03A9F4'],

            // Global text styles
            textStyle: {
                fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                fontSize: 13
            },

            // Chart animation duration
            animationDuration: 750,

            // Setup grid
            grid: {
                left: 10,
                right: 10,
                top: 35,
                bottom: 0,
                containLabel: true
            },

            // Add legend
            legend: {
                data: ['Expenses', 'Income'],
                itemHeight: 8,
                itemGap: 20,
                textStyle: {
                    padding: [0, 5]
                }
            },

            // Tooltip
            tooltip: {
                trigger: 'axis',
                backgroundColor: 'rgba(0,0,0,0.75)',
                padding: [10, 15],
                textStyle: {
                    fontSize: 13,
                    fontFamily: 'Roboto, sans-serif'
                },
                axisPointer: {
                    type: 'shadow',
                    shadowStyle: {
                        color: 'rgba(0,0,0,0.025)'
                    }
                },
                formatter: function (params) {
                    var tar;
                    if (params[1].value != '-') {
                        tar = params[1];
                    }
                    else {
                        tar = params[0];
                    }
                    return tar.name + '<br/>' + tar.seriesName + ': ' + tar.value;
                }
            },

            // Horizontal axis
            xAxis: [{
                type: 'category',
                data: ['January','February','March','April','May','June','July','August','September','October','November','December'],
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
                        color: '#eee'
                    }
                },
                splitArea: {
                    show: true,
                    areaStyle: {
                        color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.015)']
                    }
                }
            }],

            // Add series
            series: [
                {
                    name: 'Aid',
                    type: 'bar',
                    stack: 'Total',
                    itemStyle: {
                        normal: {
                            barBorderColor: 'rgba(0,0,0,0)',
                            color: 'rgba(0,0,0,0)'
                        },
                        emphasis: {
                            barBorderColor: 'rgba(0,0,0,0)',
                            color: 'rgba(0,0,0,0)'
                        }
                    },
                    data: [0, 900, 1245, 1530, 1376, 1376, 1511, 1689, 1856, 1495, 1292, 992]
                },
                {
                    name: 'Income',
                    type: 'bar',
                    stack: 'Total',
                    itemStyle: {
                        normal: {
                            barBorderRadius: 3,
                            label: {
                                show: true,
                                position: 'top'
                            }
                        }
                    },
                    data: [900, 345, 393, '-', '-', 135, 178, 286, '-', '-', '-']
                },
                {
                    name: 'Expenses',
                    type: 'bar',
                    stack: 'Total',
                    itemStyle: {
                        normal: {
                            barBorderRadius: 3,
                            label: {
                                show: true,
                                position: 'bottom'
                            }
                        }
                    },
                    data: ['-', '-', '-', 108, 154, '-', '-', '-', 119, 361, 203,300]
                }
            ]
        });
    })
</script>
@endsection