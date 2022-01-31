@extends('layout.app')
@section('page-title') Materials @endsection
@section('css')

@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Materials</span> - List</h4>

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
                    <span class="breadcrumb-item active">Materials</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card col-sm-12 col-md-12">


            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                        <table class="table table-striped materials-list-table">
                            <thead>
                            <tr>
                                <th width="50px"><div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="all"  >
                                        <label class="custom-control-label" for="all"></label>
                                    </div></th>
                                <th width="20%">Name</th>
                                <th width="20%">Price</th>
                                <th width="40%">Description</th>
                                <th width="20%" class="text-right">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if(isset($materails) && $materails->count() > 0)
                                @foreach($materails as $materail)
                                    <tr>
                                        <td><div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="material-{!! $materail->id !!}"   value="{!! $materail->id !!}" >
                                                <label class="custom-control-label" for="material-{!! $materail->id !!}-{!! $materail->id !!}"></label>
                                            </div></td>
                                        <td>{{$materail->name}}</td>
                                        <td>$ {{$materail->price}}</td>
                                        <td>{{$materail->description}}</td>

                                        <td  class="text-right">

                                            <div class="ml-3">
                                                <div class="list-icons">
                                                    <div class="list-icons-item dropdown">
                                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                                            <a href="#!" class="dropdown-item edit" data-action="edit" data-id="{!! $materail->id !!}"><i class="icon-pencil3"></i> Edit</a>
                                                            <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $materail->id !!}"><i class="icon-trash"></i> Delete</a>

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

    <div id="modal-material" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Material</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="col s12" id="material-form" method="post" action="/material/save" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="material-id" />
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name" class="">Name</label>
                                <input id="name" name="name" type="text" class="validate form-control" required  data-error=".errorTxt1">


                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="price">Price</label>
                                <input id="price" type="number" class="validate form-control" name="price" required data-error=".errorTxt2">


                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="description">Description</label>
                                <textarea id="description" type="text" class="validate form-control" name="description"  data-error=".errorTxt2"></textarea>


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

                    <a href="#!" class="btn btn-danger save-material">Save Material</a>
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
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/styling/uniform.min.js') !!}
    <script>


$(function () {
    $("form").attr('autocomplete', 'off');

    $(".edit").click(function(){
        var id = $(this).data('id');
        $("#material-form").resetForm();
        $("#material-id").val('');
       $.ajax({
           url:'/get/material/'+id,
           success:function (response) {
               response = $.parseJSON(response);

               $("#name").val(response.name);
               $("#price").val(response.price);
               $("#description").val(response.description);
               $("#material-id").val(response.id);
               $("#modal-material").modal();
           }
       });
    });

    $(".delete").click(function(){
        var id = $(this).data('id');
        var _this = $(this);
        bootbox.confirm({
            title: 'Confirmation',
            message: 'Do you want delete?.',
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-primary'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-link'
                }
            },
            callback: function (result) {
                if(result){
                    $.ajax({
                        url:"/delete/material/"+id,
                        success:function(){
                            _this.parents('tr').remove();

                        }
                    });
                }

            }
        });
    });

    $(".save-material").click(function(){
        if($("#material-form").valid()){
            $("#material-form").ajaxForm(function(response){
                response = $.parseJSON(response);
                if(response.type=='success' || response.type=='update') {

                    $("#material-form").find('.success-message').html(response.message);
                    $("#material-form").find('.success-message').show();
                    setTimeout(function(){
                        location.reload();
                    },2000)
                }else{
                    $("#material-form").find('.error-message').html(response.message);
                    $("#material-form").find('.error-message').show();
                }
            }).submit();
        }
    });

    $(".materials-list-table").DataTable({
        "paging": true, "info":     true,"searching": false,
        dom: 'Bfrtip',
        "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],
        buttons: [
            {
                text: '<i class="icon-plus2"></i>',
                className:"btn bg-danger-400 btn-icon rounded-round",

                action: function ( e, dt, node, config ) {
                    $("#material-form").resetForm();
                    $("#material-id").val('');

                    $("#modal-material").modal();
                }
            }
        ]
    });
})


    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection