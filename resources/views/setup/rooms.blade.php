@extends('layout.app')
@section('page-title') Room  Management @endsection
@section('css')
    {!! Html::style('public/material/plugins/spectrum/spectrum.css') !!}
    @endsection

    @section('content')
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-lg-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Rooms</span> - List</h4>
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
                        <span class="breadcrumb-item active">Rooms</span>
                    </div>

                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>


            </div>
        </div>
        <div class="content">
            <div class="card col-sm-12 col-md-12">


                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger addroom">Add New Room</button> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                            <table class="table table-striped patient-list-table">
                                <thead>
                                <tr>
                                    <th width="50px"><div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="all"  >
                                            <label class="custom-control-label" for="all"></label>
                                        </div></th>
                                    <th width="40%">Name</th>
                                    <th width="30%">Short Name</th>
                                    <th width="30%">Room Color</th>
                                    <th width="20%" class="text-right">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(isset($rooms) && count($rooms) > 0)
                                    @foreach($rooms as $room)
                                        <tr>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="room-{!! $room->id !!}"   value="{!! $room->id !!}" >
                                                    <label class="custom-control-label" for="room-{!! $room->id !!}"></label>
                                                </div></td>
                                            <td>{{$room->name}}</td>
                                            <td>{{$room->short_name}}</td>
                                            <td><div style="width: 24px; height: 24px; background: {{$room->color}}"></div> </td>

                                            <td  class="text-right">

                                                <div class="ml-3">
                                                    <div class="list-icons">
                                                        <div class="list-icons-item dropdown">
                                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                                                <a href="#!" class="dropdown-item edit" data-action="edit" data-id="{!! $room->id !!}"><i class="icon-pencil3"></i> Edit</a>
                                                                <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $room->id !!}"><i class="icon-trash"></i> Delete</a>

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

        <div id="modal-room" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Room</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form class="col s12" id="user-form" method="post" action="/room/add_room" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="first_name" class="">Name</label>
                                    <input id="first_name" name="name" type="text" class="validate form-control"  data-error=".errorTxt1">


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="last_name">Short Name</label>
                                    <input id="last_name" type="text" class="validate form-control" name="short_name"  data-error=".errorTxt2">


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <i class="material-icons prefix">bursh</i>
                                    <input type="text" name="color" id="add-showPaletteOnly" value="#f00" style="display: none;">
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

                        <a href="#!" class="btn btn-danger save-room">Add Room</a>
                    </div>

                </div>
            </div>
        </div>
        <div id="edit-modal-room" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Room</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form class="col s12" id="edit-form" method="post" action="/room/edit_room" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="room_edit_id" />
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="name" class="">Name</label>
                                    <input id="name" name="name" type="text" class="validate form-control"  data-error=".errorTxt1">


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="short_name">Short Name</label>
                                    <input id="short_name" type="text" class="validate form-control" name="short_name"  data-error=".errorTxt2">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <i class="material-icons prefix">bursh</i>
                                    <input type="text" name="color" id="update-showPaletteOnly" value="#f00" style="display: none;">
                                </div>

                            </div>


                            <div class="card green success-message" style="display: none;">
                                <div class="card-content white-text">
                                    <p>d</p>
                                </div>
                            </div>
                            <div class="card red error-message"  style="display: none;">
                                <div class="card-content white-text">
                                    <p>d</p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                        <a href="#!" class="btn btn-danger edit-room">Update Room</a>
                    </div>

                </div>
            </div>
        </div>
        
@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/material/plugins/spectrum/spectrum.js') !!}
    <script>
        $(function(){


            $("#all").change(function () {
                /* if($(this).is(":checked"))
                 $(".patient-list-table > tbody input[type=checkbox]").attr('checked','checked');
                 else
                 $(".patient-list-table > tbody input[type=checkbox]").removeAttr('checked');*/
                $("table > tbody input[type=checkbox]").prop('checked', this.checked);
            });

            $("#update-showPaletteOnly").spectrum({
                /* showPaletteOnly: true,
                showPalette:true,
                color: "#3a87ad",
                palette: [
                        ["#3a87ad","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f","#0b5394"],
                    ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130","#6aa84f"]
                ]*/
            }).on("change",function(e, color) {
                $("#update-showPaletteOnly").val(color.toHexString()); // #ff0000
            });

            $("#add-showPaletteOnly").spectrum({
                /*showPaletteOnly: true,
                showPalette:true,
                color: "#3a87ad",
                palette: [
                    ["#3a87ad","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f","#0b5394"],
                    ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130","#6aa84f"]
                ]*/
            }).on("change",function(e, color) {
                $("#add-showPaletteOnly").val(color.toHexString()); // #ff0000
            });

            $(".addroom").click(function(){
                $("#modal-room").modal();;
            });
            $(".save-room").click(function(e){
                $(".alert").hide();
                $validation = $("#user-form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        name: {
                            required: true
                        },
                        short_name: {
                            required: true
                        },


                    },
                    // Error messages
                    messages: {
                        name: "Name is required",
                        short_name: "Short Name is required ",

                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    // Class that wraps error message
                    errorClass: "help-block",
                    focusInvalid: true,
                    // Element that wraps error message
                    errorElement : 'div',
                    errorPlacement: function(error, element) {
                        var placement = $(element).data('error');
                        if (placement) {
                            $(placement).append(error)
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    success: function(helpBlock) {
                        if( $(helpBlock).closest(".form-group").hasClass('has-error') ){
                            $(helpBlock).closest(".form-group").removeClass("has-error").addClass("has-success");
                        }
                    }
                });

                if($("#user-form").valid()){

                    $("#user-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){location.reload()}, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });

            $(".edit-room").click(function(e){
                $(".alert").hide();
                $validation = $("#edit-form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        name: {
                            required: true
                        },
                        short_name: {
                            required: true
                        },


                    },
                    // Error messages
                    messages: {
                        name: "Name is required",
                        short_name: "Short Name is required ",

                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    // Class that wraps error message
                    errorClass: "help-block",
                    focusInvalid: true,
                    // Element that wraps error message
                    errorElement : 'div',
                    errorPlacement: function(error, element) {
                        var placement = $(element).data('error');
                        if (placement) {
                            $(placement).append(error)
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    success: function(helpBlock) {
                        if( $(helpBlock).closest(".form-group").hasClass('has-error') ){
                            $(helpBlock).closest(".form-group").removeClass("has-error").addClass("has-success");
                        }
                    }
                });

                if($("#edit-form").valid()){

                    $("#edit-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){location.reload()}, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });

            $(".edit").click(function(){
                var id = $(this).attr('data-id');
                $("#room_edit_id").val(id);
                $.ajax({
                    url:"/room/get/"+id,
                    success:function(response){
                        response = $.parseJSON(response);
                        $("#edit-form input[name=name]").val(response.name);
                        $("#edit-form input[name=name]").focusin();
                        $("#edit-form input[name=short_name]").val(response.short_name);
                        $("#edit-form input[name=short_name]").focusin();

                        $("#edit-modal-room").modal();;

                    }
                });
            });

            $(".delete").click(function(){
                var id = $(this).attr('data-id');
                swal({    title: "Are you sure?",
                        text: "You will not be able to recover this detail!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false },
                    function(){

                        $.ajax({
                            url:"/room/delete/"+id,
                            success:function(){
                                swal("Deleted!", "Record has been deleted.", "success");
                                setTimeout(function(){location.reload()}, 2500);
                            }
                        });


                    });
            });
        })




    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection