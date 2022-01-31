@extends('layout.app')
@section('page-title') Patient Dashboard @endsection
@section('css')

@endsection


@section('content')

    <div class="content">

        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Recent Appointments</h6>
                <div class="header-elements">
                    <span class="font-weight-bold text-danger-600 ml-2">$4,378</span>
                    <div class="list-icons ml-3">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>

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
                        <th width="50%">Appointment</th>

                        <th width="30%">By Doctor</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @if(isset($appointment))
                            @foreach($appointment as $app)

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                    <span class="letter-icon"></span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" class="text-default font-weight-semibold letter-icon-title"> @if(!empty($app->doctor_services->service_name))  {!! $app->doctor_services->service_name !!} @endif</a>
                                                <div class="text-muted font-size-sm"><i class="icon-watch2 font-size-sm mr-1"></i> {!! date('H:i A',strtotime($app->start_time)) !!} {!! date('d.m.Y',strtotime($app->booking_date)) !!}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <h6 class="font-weight-semibold mb-0">Dr. {!! $app->fname.' '.$app->lname !!}</h6>
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">
                                    <div class="alert bg-danger text-white text-center" style="display: block">

                                        <span class="font-weight-semibold">No Appointment found! </span>
                                    </div>
                                </td>
                            </tr>

                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection


@section('js')

@endsection