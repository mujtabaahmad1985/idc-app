@extends('layout.app')
@section('page-title') Consent Form  Management @endsection
@section('css')

@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Consent Forms</span> - List</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>
                    <a href="#" class="breadcrumb-item">Setup</a>
                    <span class="breadcrumb-item active">Consent Forms</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card col-sm-12 col-md-12">


            <div class="card-body">
                {{--<div class="row">
                    <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger addroom">Add New Consent Form</button> </div>
                </div>--}}
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped patient-list-table">
                            <thead>
                            <tr>
                                <th width="50px"><div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="all"  >
                                        <label class="custom-control-label" for="all"></label>
                                    </div></th>
                                <th width="70%">Name</th>

                                <th width="20%" class="text-right">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if(isset($consents) && count($consents) > 0)
                                @foreach($consents as $consent)
                                    <tr>
                                        <td><div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="room-{!! $consent->id !!}"   value="{!! $consent->id !!}" >
                                                <label class="custom-control-label" for="room-{!! $consent->id !!}"></label>
                                            </div></td>

                                        <td>{!! $consent->name !!} </td>

                                        <td  class="text-right">

                                            <div class="ml-3">
                                                <div class="list-icons">
                                                    <div class="list-icons-item dropdown">
                                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">



                                                            <a href="/consent/download/{!! $consent->id !!}" class="dropdown-item download" data-action="download" data-id="{!! $consent->id !!}"><i class="icon-download"></i> Download</a>

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

    <div id="modal-consent-form" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Consent Form</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="col s12" id="user-form" method="post" action="/consent/form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="first_name" class="">Name</label>
                                <input id="first_name" name="name" type="text" class="validate form-control"  data-error=".errorTxt1">


                            </div>
                        </div>


                        <div class="card green success-message bg-green" style="display: none;">
                            <div class="card-content white-text">
                                <p>d</p>
                            </div>
                        </div>
                        <div class="card red error-message bg-danger"  style="display: none;">
                            <div class="card-content white-text">
                                <p>d</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger update-form">Update</a>
                </div>

            </div>
        </div>
    </div>


@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}

@endsection