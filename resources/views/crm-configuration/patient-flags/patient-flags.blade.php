@extends('layout.app')
@section('page-title') Patient Flags @endsection
@section('content')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Patients</span> - Flags</h4>
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
                <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="#!" class="breadcrumb-item">Hospital Configuration</a>
                <span class="breadcrumb-item active">Patient Flags</span>
            </div>

            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>


    </div>
</div>
<div class="content">


    <div class="card">
        <table class="table table-striped">
            <thead>
            <tr>
                <td width="5%">#</td>
                <td width="50%">Title</td>
                <td width="20%">Color</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>

            @foreach($flags as $f)
                <tr>
                    <td><i class="icon-flag7" style="color:{!! $f->color !!}"></i> </td>
                    <td>{!! $f->name !!}</td>
                    <td><div style="width: 20px; height: 20px; background-color: {!! $f->color !!}"></div> </td>
                    <td>
                        <div class="ml-3">
                            <div class="list-icons patient-flag-action">
                                <div class="list-icons-item dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                        <a href="#!" class="dropdown-item edit" data-action="edit" data-id="{!! $f->id !!}"><i class="icon-pencil3"></i> Edit</a>
                                        <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $f->id !!}"><i class="icon-trash"></i> Delete</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div id="add-new-flag" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Flag</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form  id="flag-form" method="post" action="/flag/add" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="flag-id" />

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="name">Name</label>
                            <input id="flag-name" name="name" type="text" required class="validate form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="zip_code">Color</label>
                            <input id="color" type="text" class="form-control" name="color"  >
                        </div>
                    </div>



                    <div class="card green success-message bg-green" style="display: none;">
                        <div class="card-content white-text">
                            <p></p>
                        </div>
                    </div>
                    <div class="card red error-message bg-red"  style="display: none;">
                        <div class="card-content white-text">
                            <p></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <a href="#!" class="btn btn-danger save-flag">Save Flag</a>
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

    <script>
        $(function () {

            $("table").DataTable({
                "paging": false, "info":     false,"searching": false,
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: '<i class="icon-plus2"></i>',
                        className:"btn bg-danger-400 btn-icon rounded-round",
                        action: function ( e, dt, node, config ) {
                            $(".success-message").hide();
                            $("#flag-form").resetForm();
                            $("#add-new-flag").modal();
                        }
                    }
                ]
            });
            $('#color').spectrum({
                change: function(c) {
                    $("#color").val(c.toHexString());
                }
            });

            $("body").on('click','.patient-flag-action .delete',function(){
                var id = $(this).attr('data-id');
                var _this = $(this);

                $.ajax({
                    url:"/patient-flags/delete/"+id,
                    success:function(response){
                        _this.parents('tr').remove()
                    }
                });
            });

            $(".save-flag").click(function(){
                if($("#flag-form").valid()){
                    $("#flag-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){
                                $("#add-new-flag").modal('hide');
                                $.ajax({
                                    url:"/treatment-card-settings/load/flags",
                                    success:function(response){
                                        location.reload();
                                    }
                                });
                            }, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
            });

            $("body").on('click','.patient-flag-action .edit',function(){
                var id = $(this).attr('data-id');
                var _this = $(this);
                $(".success-message").hide();
                $.ajax({
                    url:"/patient-flags/get/"+id,
                    success:function(response){
                        response = $.parseJSON(response);
                        console.log(response.id);
                        $("#flag-id").val(response.id);
                        $("#flag-name").val(response.name);
                        $("#color").val(response.color);
                        $('#color').spectrum({
                            color:response.color,
                            change: function(c) {
                                $("#color").val(c.toHexString());
                            }
                        });
                        $("#add-new-flag").modal();
                    }
                });
            });

        })
    </script>
    @endsection

