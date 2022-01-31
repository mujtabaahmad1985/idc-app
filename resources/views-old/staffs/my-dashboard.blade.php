@extends('layout.app')
@section('page-title') Dashboard @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/prism/prism.css') !!}
    {!! Html::style('public/material/js/plugins/chartist-js/chartist.min.css') !!}
    {!! Html::style('public/material/js/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
    {!! Html::style('public/material/js/plugins/fullcalendar/css/fullcalendar.min.css') !!}
    {!! Html::style('public/material/js/plugins/chartist-js/chartist.min.css') !!}
    {!! Html::style('public/material/js/plugins/jsgrid/css/jsgrid.min.css') !!}
@endsection

@section('content')
    <style>
        .title-letter{ font-size: 1.4rem; padding-top: 10px}
    </style>
    <!-- START CONTENT -->
    <section id="content">

        <!--start container-->
        <div class="container">

            <!--chart dashboard start-->

            <!--chart dashboard end-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!--card stats start-->
            <div id="card-stats">
                <div class="row">
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content  green white-text">
                                <p class="card-stats-title"><i class="mdi-social-group-add"></i> New Patients</p>
                                <h4 class="card-stats-number">566</h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="green-text text-lighten-5">from yesterday</span>
                                </p>
                            </div>
                            <div class="card-action  green darken-2">
                                <div id="clients-bar"><canvas width="290" height="25" style="display: inline-block; width: 290px; height: 25px; vertical-align: top;"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content purple white-text">
                                <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Total Appointments</p>
                                <h4 class="card-stats-number">8854</h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 70% <span class="purple-text text-lighten-5">last month</span>
                                </p>
                            </div>
                            <div class="card-action purple darken-2">
                                <div id="sales-compositebar"><canvas width="286" height="25" style="display: inline-block; width: 286px; height: 25px; vertical-align: top;"></canvas></div>

                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content blue-grey white-text">
                                <p class="card-stats-title"><i class="mdi-action-trending-up"></i> Today Income</p>
                                <h4 class="card-stats-number">$806.52</h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 80% <span class="blue-grey-text text-lighten-5">from yesterday</span>
                                </p>
                            </div>
                            <div class="card-action blue-grey darken-2">
                                <div id="profit-tristate"><canvas width="290" height="25" style="display: inline-block; width: 290px; height: 25px; vertical-align: top;"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content pink lighten-2 white-text">
                                <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i> New Invoice</p>
                                <h4 class="card-stats-number">1806</h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i> 3% <span class="deep-purple-text text-lighten-5">from last month</span>
                                </p>
                            </div>
                            <div class="card-action  pink darken-2">
                                <div id="invoice-line"><canvas style="display: inline-block; width: 265px; height: 25px; vertical-align: top;" width="265" height="25"></canvas></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--card stats end-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!--card widgets start-->
            <div id="card-widgets">
                <div class="row">

                    <div class="col s12 m4 l4">
                        <ul id="task-card" class="collection with-header">
                            <li class="collection-header cyan">
                                <h4 class="task-card-title">Recent Appointments</h4>
                                <p class="task-card-date">{!! date('d M, Y') !!}</p>
                            </li>
                            @if(isset($appointment))
                                @foreach($appointment as $app)
                            <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                <input type="checkbox" id="task{!! $app->appointment_id !!}">
                                <label for="task{!! $app->appointment_id !!}" style="text-decoration: none;">
                                    @if(!empty($app->service_name))  {!! $app->service_name !!} @endif
                                    <a href="#" class="secondary-content"><span class="ultra-small">{!! date('d.m.Y',strtotime($app->booking_date)) !!}</span></a>
                                </label>
                                @if(!empty($app->fname))
                                <span class="task-cat teal">Dr. {!! $app->fname.' '.$app->lname !!}</span>
                                    @endif
                            </li>
                                @endforeach
                            @endif
                            </ul>
                    </div>
                    <div class="col s12 m8 l8">
                        <ul id="task-card" class="collection with-header">
                            <li class="collection-header red white-text">
                                <h4 class="task-card-title">Messages</h4>
                                <p class="task-card-date">{!! date('d M, Y') !!}</p>
                            </li>
                            @php
                             $color = array('pink accent-3','blue darken-3','teal darken-3','light-blue accent-4','lime darken-3','yellow darken-4','brown darken-3');
                            @endphp
                            @for($i=1;$i<=5;$i++)
                            <li class="collection-item avatar email-unread">
                                <span class="circle title-letter center white-text {!! $color[rand(0,6)] !!}">T</span>
                                <span class="email-title">Tuts+</span>
                                <p class="truncate grey-text ultra-small">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                <a href="#!" class="secondary-content email-time"><span class="blue-text ultra-small">2:05 am</span></a>
                            </li>
                           @endfor
                        </ul>

                    </div>




                </div>


                <!--card widgets end-->

                <!-- //////////////////////////////////////////////////////////////////////////// -->

                <!--work collections start-->
                <div id="work-collections">
                    <div class="row">
                        <div class="col s12 m4 l4">
                            <ul id="projects-collection" class="collection">
                                <li class="collection-item avatar">
                                    <i class="material-icons circle light-blue darken-2">local_hospital</i>
                                    <span class="collection-header">Recommended Services</span>
                                    <p>Highly used</p>
                                    <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                </li>
                                @if(isset($services))
                                @foreach($services as $service)
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s9">
                                            <p class="collections-title">{!! $service->service_name !!}</p>

                                        </div>
                                        <div class="col s3">
                                            <span class="task-cat cyan">{!! rand(30,80) !!}%</span>
                                        </div>

                                    </div>
                                </li>
                              @endforeach
                                    @endif
                            </ul>
                        </div>
                        <div class="col s12 m4 l4">
                            <ul id="issues-collection" class="collection">
                                <li class="collection-item avatar">
                                    <i class="material-icons circle red darken-2">event_available</i>
                                    <span class="collection-header">Doctors Un-Availability</span>
                                    <p>Current Week</p>
                                    <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                </li>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s7">
                                            <p class="collections-title"><strong>Dr</strong> Marlar</p>
                                            <p class="collections-content">Web Project</p>
                                        </div>
                                        <div class="col s2">
                                            <span class="task-cat pink accent-2">P1</span>
                                        </div>
                                        <div class="col s3">
                                            <div class="progress">
                                                <div class="determinate" style="width: 70%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s7">
                                            <p class="collections-title"><strong>#108</strong> API Fix</p>
                                            <p class="collections-content">API Project </p>
                                        </div>
                                        <div class="col s2">
                                            <span class="task-cat yellow darken-4">P2</span>
                                        </div>
                                        <div class="col s3">
                                            <div class="progress">
                                                <div class="determinate" style="width: 40%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s7">
                                            <p class="collections-title"><strong>#205</strong> Profile page css</p>
                                            <p class="collections-content">New Project </p>
                                        </div>
                                        <div class="col s2">
                                            <span class="task-cat light-green darken-3">P3</span>
                                        </div>
                                        <div class="col s3">
                                            <div class="progress">
                                                <div class="determinate" style="width: 95%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s7">
                                            <p class="collections-title"><strong>#188</strong> SAP Changes</p>
                                            <p class="collections-content">SAP Project</p>
                                        </div>
                                        <div class="col s2">
                                            <span class="task-cat pink accent-2">P1</span>
                                        </div>
                                        <div class="col s3">
                                            <div class="progress">
                                                <div class="determinate" style="width: 10%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col s12 m4 l4">
                            <ul id="issues-collection" class="collection">
                                <li class="collection-item avatar">
                                    <i class="material-icons circle pink darken-2">cloud_done</i>
                                    <span class="collection-header">Recent Patientd added</span>
                                    <p>Current Month</p>
                                    <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                </li>
                                @if(isset($patients))
                                @foreach($patients as $person)
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s10">
                                            <p class="collections-title">{!! $person->patient_name !!}</p>
                                            <p class="collections-content">{!! date('d.m.Y', strtotime($person->created_at)) !!}</p>
                                        </div>
                                        <div class="col s2">
                                            <span class="task-cat white-text {!! $color[rand(0,6)] !!}" title="Appointments">{!! rand(1,10) !!}</span>
                                        </div>

                                    </div>
                                </li>
                                @endforeach
                             @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <!--work collections end-->

                <!-- Floating Action Button -->
                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-large red">
                        <i class="large material-icons">edit</i>
                    </a>
                    <ul>
                        <li><a href="#" class="btn-floating red" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="large material-icons">account_circle</i></a></li>
                        <li><a href="#" class="btn-floating yellow darken-1" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="large material-icons">add_box</i></a></li>
                        <li><a href="#" class="btn-floating blue" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="large material-icons">email</i></a></li>
                    </ul>
                </div>
                <!-- Floating Action Button -->

            </div>
            <!--end container-->
        </div></section>
    <!-- END CONTENT -->
@endsection



@section('js')

    {!! Html::script('public/material/js/materialize_new.js') !!}
    {!! Html::script('public/plugins/jquery.slimscroll/js/jquery.slimscroll.min.js') !!}
    {!! Html::script('public/material/js/plugins/fullcalendar/lib/moment.min.js') !!}
    {!! Html::script('public/material/js/plugins/chartjs/chart.min.js') !!}

    {!! Html::script('public/material/js/plugins/chartjs/chart-script.js') !!}
    {!! Html::script('public/material/js/plugins/editable-table/numeric-input-example.js') !!}


    <script>
        $(function() {
        })
    </script>
@endsection