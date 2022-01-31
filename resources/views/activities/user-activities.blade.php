@extends('layout.app')
@section('page-title') My Activities @endsection
@section('css')
    <style>
        .sp-container.sp-light{
            z-index:99999;}

    </style>
@endsection


@section('content')

    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">My Activities and System Log </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                        <div class="d-md-flex">
                            <ul class="nav nav-tabs nav-tabs-vertical flex-column mr-md-3 wmin-md-200 mb-md-0 border-bottom-0">
                                <li class="nav-item"><a href="#security" data-tab="security" class="nav-link  active show" data-toggle="tab"><i class="icon-triangle2 mr-2"></i> Security</a></li>
                                <li class="nav-item"><a href="#system-activities" data-tab="system-activities" class="nav-link" data-toggle="tab"><i class="icon-flag7 mr-2"></i> System Activities</a></li>


                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade"  id="system-activities">




                                </div>

                                <div class="tab-pane fade   active show" id="security">

                                </div>


                            </div>
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
    {!! Html::script(url('/').'/bootstrap/js/plugins/pickers/color/spectrum.js') !!}




@endsection