@extends('layout.app')
@section('page-title') Doctor Dashboard @endsection
@section('css')

@endsection
@php
    $doctor = \Illuminate\Support\Facades\Auth::user()->doctors;

@endphp

@section('content')

    <div class="content">



        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="card card-body">
                        <div class="row text-center">


                            <div class="col-6">
                                <p><i class="icon-accessibility2 icon-2x d-inline-block text-warning"></i></p>
                                <h5 class="font-weight-semibold mb-0">{!! isset($doctor->doctor_patients)?$doctor->doctor_patients->count() :0!!}</h5>
                                <span class="text-muted font-size-sm">Served Patients</span>
                            </div>

                            <div class="col-6">
                                <p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
                                <h5 class="font-weight-semibold mb-0">{!! isset($doctor->doctor_appointments)?$doctor->doctor_appointments->count() :0!!}</h5>
                                <span class="text-muted font-size-sm">Appointments</span>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th style="width: 50px">Due</th>
                                <th style="width: 300px;">User</th>
                                <th>Description</th>
                                <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-active table-border-double">
                                <td colspan="3">Today's Appointments</td>

                                <td class="text-right"> @if(isset($today_appointments) && $today_appointments->count() > 0)
                                    <span class="badge bg-danger badge-pill">{!! $today_appointments->count() !!}</span> @endif
                                </td>

                            </tr>
                            @if(isset($today_appointments) && $today_appointments->count() > 0)
                                @foreach($today_appointments as $app)
                                    <tr>
                                        <td class="text-center">
                                            <i class="icon-cross2 text-danger-400"></i>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        @if($app->patients->gender=='Male')
                                                        <img src="/images/male.png" class="rounded-circle" width="32" height="32" alt="">
                                                            @else
                                                            <img src="/images/female.png" class="rounded-circle" width="32" height="32" alt="">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold">{!! $app->patients->first_name.' '. $app->patients->last_name !!}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-default">
                                                <div> {!! $app->doctor_services->service_name !!}f</div>
                                                <span class="text-muted"> {!! date('H:i A',strtotime($app->start_time)) !!} &nbsp; {!! date('d.m.Y',strtotime($app->booking_date)) !!}</span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-comment"></i> Send Reminder</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-user"></i> Patient Profile</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-spinner11 text-blue"></i> Re-Schedule Appointment</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-trash text-grey"></i> Cancel Appointment</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3"><span class="text-danger">You have no appointment for today!</span> </td>
                                </tr>
                            @endif

                            <tr class="table-active table-border-double">
                                <td colspan="3">Pending Appointments</td>
                                <td class="text-right">
                                    @if(isset($pending_appointment) && $pending_appointment->count() > 0)
                                    <span class="badge bg-blue badge-pill">{!! $pending_appointment->count() !!}</span>
                                        @endif
                                </td>
                            </tr>
                            @if(isset($pending_appointment) && $pending_appointment->count() > 0)

                                @foreach($pending_appointment as $app)

                                    <tr>
                                        <td class="text-center">
                                            <i class="icon-cross2 text-danger-400"></i>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        @if($app->patients->gender=='Male')
                                                            <img src="/images/male.png" class="rounded-circle" width="32" height="32" alt="">
                                                        @else
                                                            <img src="/images/female.png" class="rounded-circle" width="32" height="32" alt="">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold">{!! $app->patients->first_name.' '. $app->patients->last_name !!}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-default">
                                                <div> {!! $app->doctor_services->service_name !!}f</div>
                                                <span class="text-muted"> {!! date('H:i A',strtotime($app->start_time)) !!} &nbsp; {!! date('d.m.Y',strtotime($app->booking_date)) !!}</span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-undo"></i> Send Reminder</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-history"></i> Patient Profile</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-spinner11 text-blue"></i> Re-Schedule Appointment</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-trash text-grey"></i> Cancel Appointment</a>
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
            <div class="col-xl-4">
                <!-- Daily financials -->
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><i class="icon-calendar text-warning icon-2x mt-1"></i></a>
                        </div>


                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold mt-2"><a href="#" class="text-body">Pending Appointments ({!! \App\Appointments::whereNull('deleted_at')->where('doctor',$doctor->id)->where('status','pending')->count() !!})</a></h6>

                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><i class="icon-alarm  text-success icon-2x mt-1"></i></a>
                        </div>

                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold mt-2"><a href="#" class="text-body">Completed Appointments ({!! \App\Appointments::whereNull('deleted_at')->where('doctor',$doctor->id)->where('status','completed')->count() !!})</a></h6>

                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><i class="icon-close2  text-danger icon-2x mt-1"></i></a>
                        </div>

                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold mt-2"><a href="#" class="text-body">Completed Appointments ({!! \App\Appointments::whereNull('deleted_at')->where('doctor',$doctor->id)->where('status','cancelled')->count() !!})</a></h6>

                        </div>
                    </div>
                </div>


                <!-- /daily financials -->
            </div>
        </div>


    </div>


@endsection


@section('js')


    <script>
        $(function(){
            var _BarChart = function(element, barQty, height, animate, easing, duration, delay, color, tooltip) {
                if (typeof d3 == 'undefined') {
                    console.warn('Warning - d3.min.js is not loaded.');
                    return;
                }

                // Initialize chart only if element exsists in the DOM
                if($(element).length > 0) {


                    // Basic setup
                    // ------------------------------

                    // Add data set
                    var bardata = [];
                    for (var i=0; i < barQty; i++) {
                        bardata.push(Math.round(Math.random()*10) + 10);
                    }

                    // Main variables
                    var d3Container = d3.select(element),
                        width = d3Container.node().getBoundingClientRect().width;



                    // Construct scales
                    // ------------------------------

                    // Horizontal
                    var x = d3.scale.ordinal()
                        .rangeBands([0, width], 0.3);

                    // Vertical
                    var y = d3.scale.linear()
                        .range([0, height]);



                    // Set input domains
                    // ------------------------------

                    // Horizontal
                    x.domain(d3.range(0, bardata.length));

                    // Vertical
                    y.domain([0, d3.max(bardata)]);



                    // Create chart
                    // ------------------------------

                    // Add svg element
                    var container = d3Container.append('svg');

                    // Add SVG group
                    var svg = container
                        .attr('width', width)
                        .attr('height', height)
                        .append('g');



                    //
                    // Append chart elements
                    //

                    // Bars
                    var bars = svg.selectAll('rect')
                        .data(bardata)
                        .enter()
                        .append('rect')
                        .attr('class', 'd3-random-bars')
                        .attr('width', x.rangeBand())
                        .attr('x', function(d,i) {
                            return x(i);
                        })
                        .style('fill', color);



                    // Tooltip
                    // ------------------------------

                    var tip = d3.tip()
                        .attr('class', 'd3-tip')
                        .offset([-10, 0]);

                    // Show and hide
                    if(tooltip == 'hours' || tooltip == 'goal' || tooltip == 'patients') {
                        bars.call(tip)
                            .on('mouseover', tip.show)
                            .on('mouseout', tip.hide);
                    }

                    // Daily meetings tooltip content
                    if(tooltip == 'hours') {
                        tip.html(function (d, i) {
                            return '<div class="text-center">' +
                                '<h6 class="m-0">' + d + '</h6>' +
                                '<span class="font-size-sm">meetings</span>' +
                                '<div class="font-size-sm">' + i + ':00' + '</div>' +
                                '</div>'
                        });
                    }

                    // Statements tooltip content
                    if(tooltip == 'goal') {
                        tip.html(function (d, i) {
                            return '<div class="text-center">' +
                                '<h6 class="m-0">' + d + '</h6>' +
                                '<span class="font-size-sm">statements</span>' +
                                '<div class="font-size-sm">' + i + ':00' + '</div>' +
                                '</div>'
                        });
                    }

                    // Online members tooltip content
                    if(tooltip == 'patients') {
                        tip.html(function (d, i) {
                            return '<div class="text-center">' +
                                '<h6 class="m-0">' + d + '0' + '</h6>' +
                                '<span class="font-size-sm">patients</span>' +
                                '<div class="font-size-sm">' + i + ':00' + '</div>' +
                                '</div>'
                        });
                    }



                    // Bar loading animation
                    // ------------------------------

                    // Choose between animated or static
                    if(animate) {
                        withAnimation();
                    } else {
                        withoutAnimation();
                    }

                    // Animate on load
                    function withAnimation() {
                        bars
                            .attr('height', 0)
                            .attr('y', height)
                            .transition()
                            .attr('height', function(d) {
                                return y(d);
                            })
                            .attr('y', function(d) {
                                return height - y(d);
                            })
                            .delay(function(d, i) {
                                return i * delay;
                            })
                            .duration(duration)
                            .ease(easing);
                    }

                    // Load without animateion
                    function withoutAnimation() {
                        bars
                            .attr('height', function(d) {
                                return y(d);
                            })
                            .attr('y', function(d) {
                                return height - y(d);
                            })
                    }



                    // Resize chart
                    // ------------------------------

                    // Call function on window resize
                    $(window).on('resize', barsResize);

                    // Call function on sidebar width change
                    $(document).on('click', '.sidebar-control', barsResize);

                    // Resize function
                    //
                    // Since D3 doesn't support SVG resize by default,
                    // we need to manually specify parts of the graph that need to
                    // be updated on window resize
                    function barsResize() {

                        // Layout variables
                        width = d3Container.node().getBoundingClientRect().width;


                        // Layout
                        // -------------------------

                        // Main svg width
                        container.attr('width', width);

                        // Width of appended group
                        svg.attr('width', width);

                        // Horizontal range
                        x.rangeBands([0, width], 0.3);


                        // Chart elements
                        // -------------------------

                        // Bars
                        svg.selectAll('.d3-random-bars')
                            .attr('width', x.rangeBand())
                            .attr('x', function(d,i) {
                                return x(i);
                            });
                    }
                }
            };
            var _chartSparkline = function(element, chartType, qty, height, interpolation, duration, interval, color) {
                if (typeof d3 == 'undefined') {
                    console.warn('Warning - d3.min.js is not loaded.');
                    return;
                }

                // Initialize chart only if element exsists in the DOM
                if($(element).length > 0) {


                    // Basic setup
                    // ------------------------------

                    // Define main variables
                    var d3Container = d3.select(element),
                        margin = {top: 0, right: 0, bottom: 0, left: 0},
                        width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right,
                        height = height - margin.top - margin.bottom;


                    // Generate random data (for demo only)
                    var data = [];
                    for (var i=0; i < qty; i++) {
                        data.push(Math.floor(Math.random() * qty) + 5)
                    }


                    // Construct scales
                    // ------------------------------

                    // Horizontal
                    var x = d3.scale.linear().range([0, width]);

                    // Vertical
                    var y = d3.scale.linear().range([height - 5, 5]);


                    // Set input domains
                    // ------------------------------

                    // Horizontal
                    x.domain([1, qty - 3])

                    // Vertical
                    y.domain([0, qty])



                    // Construct chart layout
                    // ------------------------------

                    // Line
                    var line = d3.svg.line()
                        .interpolate(interpolation)
                        .x(function(d, i) { return x(i); })
                        .y(function(d, i) { return y(d); });

                    // Area
                    var area = d3.svg.area()
                        .interpolate(interpolation)
                        .x(function(d, i) {
                            return x(i);
                        })
                        .y0(height)
                        .y1(function(d) {
                            return y(d);
                        });



                    // Create SVG
                    // ------------------------------

                    // Container
                    var container = d3Container.append('svg');

                    // SVG element
                    var svg = container
                        .attr('width', width + margin.left + margin.right)
                        .attr('height', height + margin.top + margin.bottom)
                        .append("g")
                        .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')');



                    // Add mask for animation
                    // ------------------------------

                    // Add clip path
                    var clip = svg.append('defs')
                        .append('clipPath')
                        .attr('id', function(d, i) { return 'load-clip-' + element.substring(1) })

                    // Add clip shape
                    var clips = clip.append('rect')
                        .attr('class', 'load-clip')
                        .attr('width', 0)
                        .attr('height', height);

                    // Animate mask
                    clips
                        .transition()
                        .duration(1000)
                        .ease('linear')
                        .attr('width', width);



                    //
                    // Append chart elements
                    //

                    // Main path
                    var path = svg.append('g')
                        .attr('clip-path', function(d, i) { return 'url(#load-clip-' + element.substring(1) + ')'})
                        .append('path')
                        .datum(data)
                        .attr('transform', 'translate(' + x(0) + ',0)');

                    // Add path based on chart type
                    if(chartType == 'area') {
                        path.attr('d', area).attr('class', 'd3-area').style('fill', color); // area
                    }
                    else {
                        path.attr('d', line).attr('class', 'd3-line d3-line-medium').style('stroke', color); // line
                    }

                    // Animate path
                    path
                        .style('opacity', 0)
                        .transition()
                        .duration(750)
                        .style('opacity', 1);



                    // Set update interval. For demo only
                    // ------------------------------

                    setInterval(function() {

                        // push a new data point onto the back
                        data.push(Math.floor(Math.random() * qty) + 5);

                        // pop the old data point off the front
                        data.shift();

                        update();

                    }, interval);



                    // Update random data. For demo only
                    // ------------------------------

                    function update() {

                        // Redraw the path and slide it to the left
                        path
                            .attr('transform', null)
                            .transition()
                            .duration(duration)
                            .ease('linear')
                            .attr('transform', 'translate(' + x(0) + ',0)');

                        // Update path type
                        if(chartType == 'area') {
                            path.attr('d', area).attr('class', 'd3-area').style('fill', color)
                        }
                        else {
                            path.attr('d', line).attr('class', 'd3-line d3-line-medium').style('stroke', color);
                        }
                    }



                    // Resize chart
                    // ------------------------------

                    // Call function on window resize
                    $(window).on('resize', resizeSparklines);

                    // Call function on sidebar width change
                    $(document).on('click', '.sidebar-control', resizeSparklines);

                    // Resize function
                    //
                    // Since D3 doesn't support SVG resize by default,
                    // we need to manually specify parts of the graph that need to
                    // be updated on window resize
                    function resizeSparklines() {

                        // Layout variables
                        width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right;


                        // Layout
                        // -------------------------

                        // Main svg width
                        container.attr('width', width + margin.left + margin.right);

                        // Width of appended group
                        svg.attr('width', width + margin.left + margin.right);

                        // Horizontal range
                        x.range([0, width]);


                        // Chart elements
                        // -------------------------

                        // Clip mask
                        clips.attr('width', width);

                        // Line
                        svg.select('.d3-line').attr('d', line);

                        // Area
                        svg.select('.d3-area').attr('d', area);
                    }
                }
            };
            var _DailyRevenueLineChart = function(element, height) {
                if (typeof d3 == 'undefined') {
                    console.warn('Warning - d3.min.js is not loaded.');
                    return;
                }

                // Initialize chart only if element exsists in the DOM
                if($(element).length > 0) {


                    // Basic setup
                    // ------------------------------

                    // Add data set
                    var dataset = [
                        {
                            'date': '04/13/14',
                            'alpha': '60'
                        }, {
                            'date': '04/14/14',
                            'alpha': '35'
                        }, {
                            'date': '04/15/14',
                            'alpha': '65'
                        }, {
                            'date': '04/16/14',
                            'alpha': '50'
                        }, {
                            'date': '04/17/14',
                            'alpha': '65'
                        }, {
                            'date': '04/18/14',
                            'alpha': '20'
                        }, {
                            'date': '04/19/14',
                            'alpha': '60'
                        }
                    ];

                    // Main variables
                    var d3Container = d3.select(element),
                        margin = {top: 0, right: 0, bottom: 0, left: 0},
                        width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right,
                        height = height - margin.top - margin.bottom,
                        padding = 20;

                    // Format date
                    var parseDate = d3.time.format('%m/%d/%y').parse,
                        formatDate = d3.time.format('%a, %B %e');



                    // Add tooltip
                    // ------------------------------

                    var tooltip = d3.tip()
                        .attr('class', 'd3-tip')
                        .html(function (d) {
                            return '<ul class="list-unstyled mb-1">' +
                                '<li>' + '<div class="font-size-base my-1"><i class="icon-check2 mr-2"></i>' + formatDate(d.date) + '</div>' + '</li>' +
                                '<li>' + 'Sales: &nbsp;' + '<span class="font-weight-semibold float-right">' + d.alpha + '</span>' + '</li>' +
                                '<li>' + 'Revenue: &nbsp; ' + '<span class="font-weight-semibold float-right">' + '$' + (d.alpha * 25).toFixed(2) + '</span>' + '</li>' +
                                '</ul>';
                        });



                    // Create chart
                    // ------------------------------

                    // Add svg element
                    var container = d3Container.append('svg');

                    // Add SVG group
                    var svg = container
                        .attr('width', width + margin.left + margin.right)
                        .attr('height', height + margin.top + margin.bottom)
                        .append('g')
                        .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')')
                        .call(tooltip);



                    // Load data
                    // ------------------------------

                    dataset.forEach(function (d) {
                        d.date = parseDate(d.date);
                        d.alpha = +d.alpha;
                    });



                    // Construct scales
                    // ------------------------------

                    // Horizontal
                    var x = d3.time.scale()
                        .range([padding, width - padding]);

                    // Vertical
                    var y = d3.scale.linear()
                        .range([height, 5]);



                    // Set input domains
                    // ------------------------------

                    // Horizontal
                    x.domain(d3.extent(dataset, function (d) {
                        return d.date;
                    }));

                    // Vertical
                    y.domain([0, d3.max(dataset, function (d) {
                        return Math.max(d.alpha);
                    })]);



                    // Construct chart layout
                    // ------------------------------

                    // Line
                    var line = d3.svg.line()
                        .x(function(d) {
                            return x(d.date);
                        })
                        .y(function(d) {
                            return y(d.alpha)
                        });



                    //
                    // Append chart elements
                    //

                    // Add mask for animation
                    // ------------------------------

                    // Add clip path
                    var clip = svg.append('defs')
                        .append('clipPath')
                        .attr('id', 'clip-line-small');

                    // Add clip shape
                    var clipRect = clip.append('rect')
                        .attr('class', 'clip')
                        .attr('width', 0)
                        .attr('height', height);

                    // Animate mask
                    clipRect
                        .transition()
                        .duration(1000)
                        .ease('linear')
                        .attr('width', width);



                    // Line
                    // ------------------------------

                    // Path
                    var path = svg.append('path')
                        .attr({
                            'd': line(dataset),
                            'clip-path': 'url(#clip-line-small)',
                            'class': 'd3-line d3-line-medium'
                        })
                        .style('stroke', '#fff');

                    // Animate path
                    svg.select('.line-tickets')
                        .transition()
                        .duration(1000)
                        .ease('linear');



                    // Add vertical guide lines
                    // ------------------------------

                    // Bind data
                    var guide = svg.append('g')
                        .selectAll('.d3-line-guides-group')
                        .data(dataset);

                    // Append lines
                    guide
                        .enter()
                        .append('line')
                        .attr('class', 'd3-line-guides')
                        .attr('x1', function (d, i) {
                            return x(d.date);
                        })
                        .attr('y1', function (d, i) {
                            return height;
                        })
                        .attr('x2', function (d, i) {
                            return x(d.date);
                        })
                        .attr('y2', function (d, i) {
                            return height;
                        })
                        .style('stroke', 'rgba(255,255,255,0.3)')
                        .style('stroke-dasharray', '4,2')
                        .style('shape-rendering', 'crispEdges');

                    // Animate guide lines
                    guide
                        .transition()
                        .duration(1000)
                        .delay(function(d, i) { return i * 150; })
                        .attr('y2', function (d, i) {
                            return y(d.alpha);
                        });



                    // Alpha app points
                    // ------------------------------

                    // Add points
                    var points = svg.insert('g')
                        .selectAll('.d3-line-circle')
                        .data(dataset)
                        .enter()
                        .append('circle')
                        .attr('class', 'd3-line-circle d3-line-circle-medium')
                        .attr('cx', line.x())
                        .attr('cy', line.y())
                        .attr('r', 3)
                        .style('stroke', '#fff')
                        .style('fill', '#29B6F6');



                    // Animate points on page load
                    points
                        .style('opacity', 0)
                        .transition()
                        .duration(250)
                        .ease('linear')
                        .delay(1000)
                        .style('opacity', 1);


                    // Add user interaction
                    points
                        .on('mouseover', function (d) {
                            tooltip.offset([-10, 0]).show(d);

                            // Animate circle radius
                            d3.select(this).transition().duration(250).attr('r', 4);
                        })

                        // Hide tooltip
                        .on('mouseout', function (d) {
                            tooltip.hide(d);

                            // Animate circle radius
                            d3.select(this).transition().duration(250).attr('r', 3);
                        });

                    // Change tooltip direction of first point
                    d3.select(points[0][0])
                        .on('mouseover', function (d) {
                            tooltip.offset([0, 10]).direction('e').show(d);

                            // Animate circle radius
                            d3.select(this).transition().duration(250).attr('r', 4);
                        })
                        .on('mouseout', function (d) {
                            tooltip.direction('n').hide(d);

                            // Animate circle radius
                            d3.select(this).transition().duration(250).attr('r', 3);
                        });

                    // Change tooltip direction of last point
                    d3.select(points[0][points.size() - 1])
                        .on('mouseover', function (d) {
                            tooltip.offset([0, -10]).direction('w').show(d);

                            // Animate circle radius
                            d3.select(this).transition().duration(250).attr('r', 4);
                        })
                        .on('mouseout', function (d) {
                            tooltip.direction('n').hide(d);

                            // Animate circle radius
                            d3.select(this).transition().duration(250).attr('r', 3);
                        })



                    // Resize chart
                    // ------------------------------

                    // Call function on window resize
                    $(window).on('resize', revenueResize);

                    // Call function on sidebar width change
                    $(document).on('click', '.sidebar-control', revenueResize);

                    // Resize function
                    //
                    // Since D3 doesn't support SVG resize by default,
                    // we need to manually specify parts of the graph that need to
                    // be updated on window resize
                    function revenueResize() {

                        // Layout variables
                        width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right;


                        // Layout
                        // -------------------------

                        // Main svg width
                        container.attr('width', width + margin.left + margin.right);

                        // Width of appended group
                        svg.attr('width', width + margin.left + margin.right);

                        // Horizontal range
                        x.range([padding, width - padding]);


                        // Chart elements
                        // -------------------------

                        // Mask
                        clipRect.attr('width', width);

                        // Line path
                        svg.selectAll('.d3-line').attr('d', line(dataset));

                        // Circles
                        svg.selectAll('.d3-line-circle').attr('cx', line.x());

                        // Guide lines
                        svg.selectAll('.d3-line-guides')
                            .attr('x1', function (d, i) {
                                return x(d.date);
                            })
                            .attr('x2', function (d, i) {
                                return x(d.date);
                            });
                    }
                }
            };
            _BarChart('#members-online', 24, 50, true, 'elastic', 1200, 50, 'rgba(255,255,255,0.5)', 'patients');
            _BarChart('#server-load',  24, 50, true, 'elastic', 1200, 50, 'rgba(255,255,255,0.5)', 'appointments');
            _DailyRevenueLineChart('#today-revenue', 50);
        })
    </script>
@endsection