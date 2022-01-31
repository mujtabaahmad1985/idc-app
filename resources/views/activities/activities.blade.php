@extends('layout.app')
@section('page-title') User Activities @endsection
@section('css')

@endsection

@section('content')
    <div class="content">
        <div class="card col-sm-12 col-md-12">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Activities</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                {{--<div class="row">
                    <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger addroom">Add New Consent Form</button> </div>
                </div>--}}
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        <li class="nav-item"><a href="#login-activities" class="nav-link active show" data-toggle="tab">Login Activities <i class="icon-menu7 ml-2"></i></a></li>
                        <li class="nav-item"><a href="#user-system-activities" class="nav-link" data-toggle="tab">User System Activities <i class="icon-mention ml-2"></i></a></li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="login-activities">
                            <table class="table table-striped login-activity-list-table">
                                <thead>
                                <tr>

                                    <th>Login At</th>
                                    <th>IP Address</th>
                                    <th>Device</th>
                                    <th>Plateform</th>
                                    <th>Browser</th>

                                </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="user-system-activities">
                            <table class="table table-striped system-activity-list-table">
                                <thead>
                                <tr>
                                    <th width="50px"><div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="all"  >
                                            <label class="custom-control-label" for="all"></label>
                                        </div></th>
                                    <th>Activity</th>
                                    <th>Module</th>
                                    <th>Action</th>
                                    <th>Date Time</th>


                                </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>





@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/datatables.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/dataTables.buttons.min.js') !!}
    <script>

        var user_id="{!! $id !!}";

        $.ajax({
            url:"/get/login/activities/"+user_id,
            success:function(response){
                $(".login-activity-list-table > tbody").html(response);

                $(".login-activity-list-table").DataTable({
                    "paging": true, "info":     false,"searching": false,

                    "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],

                });
            }
        });

    </script>
@endsection