@extends('layout.app')
@section('page-title') Labs @endsection
@section('css')

@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Labs</span> - List</h4>
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
                    <span class="breadcrumb-item active">Labs</span>
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
                        <table class="table table-striped labs-list-table">
                            <thead>
                            <tr>
                                <th width="50px"><div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="all"  >
                                        <label class="custom-control-label" for="all"></label>
                                    </div></th>
                                <th width="20%">Name</th>
                                <th width="15%">Registration No#</th>
                                <th width="15%">Email</th>
                                <th width="15%">Phone Number</th>
                                <th width="15%">Bank AC#</th>
                                <th>Address</th>
                                <th width="10%">Materials</th>
                                <th width="5%" class="text-right">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if(isset($labs) && $labs->count() > 0)
                                @foreach($labs as $lab)
                                    <tr>
                                        <td><div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="lab-{!! $lab->id !!}"   value="{!! $lab->id !!}" >
                                                <label class="custom-control-label" for="lab-{!! $lab->id !!}-{!! $lab->id !!}"></label>
                                            </div></td>
                                        <td>{{$lab->name}}</td>
                                        <td>{{$lab->registration_number}}</td>
                                        <td><span class="email">{{$lab->email}}</span> </td>
                                        <td>{{$lab->phone_number}}</td>
                                        <td>{{$lab->bank_account}}</td>
                                        <td>{{$lab->address}}</td>
                                        <td></td>

                                        <td  class="text-right">

                                            <div class="ml-3">
                                                <div class="list-icons">
                                                    <div class="list-icons-item dropdown">
                                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                                            <a href="#!" class="dropdown-item edit" data-action="edit" data-id="{!! $lab->id !!}"><i class="icon-pencil3"></i> Edit</a>
                                                            <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $lab->id !!}"><i class="icon-trash"></i> Delete</a>

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

    <div id="modal-lab" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Lab</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="col s12" id="lab-form" method="post" action="/lab/save" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="lab-id" />
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="registration_number" class="">Registration Number</label>
                                <input id="registration_number" name="registration_number" type="text" class="validate form-control" required  data-error=".errorTxt1">


                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="validate form-control" name="name" required data-error=".errorTxt2">


                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="validate form-control" name="email" required data-error=".errorTxt2">


                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="phone_number">Phone</label>
                                <input id="phone_number" type="text" class="validate form-control" name="phone_number"  data-error=".errorTxt2">


                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="bank_account">Bank Account#</label>
                                <input id="bank_account" type="text" class="validate form-control" name="bank_account"  data-error=".errorTxt2">


                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="address">Address</label>
                                <textarea id="address" type="text" class="validate form-control" name="address"  data-error=".errorTxt2"></textarea>


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

                    <a href="#!" class="btn btn-danger save-lab">Save Lab</a>
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
        $("#lab-form").resetForm();
        $("#lab-id").val('');
       $.ajax({
           url:'/get/lab/'+id,
           success:function (response) {
               response = $.parseJSON(response);

               $("#name").val(response.name);
               $("#registration_number").val(response.registration_number);
               $("#bank_account").val(response.bank_account);
               $("#phone_number").val(response.phone_number);
               $("#email").val(response.email);
               $("#address").val(response.address);
               $("#lab-id").val(response.id);
               $("#modal-lab").modal();
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
                        url:"/delete/lab/"+id,
                        success:function(){
                            _this.parents('tr').remove();

                        }
                    });
                }

            }
        });
    });

    $(".save-lab").click(function(){
        if($("#lab-form").valid()){
            $("#lab-form").ajaxForm(function(response){
                response = $.parseJSON(response);
                if(response.type=='success' || response.type=='update') {

                    $("#lab-form").find('.success-message').html(response.message);
                    $("#lab-form").find('.success-message').show();
                    setTimeout(function(){
                        location.reload();
                    },2000)
                }else{
                    $("#lab-form").find('.error-message').html(response.message);
                    $("#lab-form").find('.error-message').show();
                }
            }).submit();
        }
    });

    $(".labs-list-table").DataTable({
        "paging": true, "info":     true,"searching": false,
        dom: 'Bfrtip',
        "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],
        buttons: [
            {
                text: '<i class="icon-plus2"></i>',
                className:"btn bg-danger-400 btn-icon rounded-round",

                action: function ( e, dt, node, config ) {
                    $("#lab-form").resetForm();
                    $("#lab-id").val('');

                    $("#modal-lab").modal();
                }
            }
        ]
    });
})


    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection