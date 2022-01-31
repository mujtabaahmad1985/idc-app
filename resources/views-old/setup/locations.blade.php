@extends('layout.app')
@section('page-title') Location Management @endsection
@section('css')

@endsection


@section('content')

    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Location List</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger addlocation">Add New Location</button> </div>
                </div>
                <table class="table table-striped patient-list-table">
                    <thead>
                    <tr>
                        <th><div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="all"  >
                                <label class="custom-control-label" for="all"></label>
                            </div></th>
                        <th>Name</th>
                        <th>Zipcode</th>
                        <th>Address</th>

                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($locations) && count($locations) > 0)
                        @foreach($locations as $location)
                            <tr>
                                <td><div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="location-{!! $location->id !!}"   value="{!! $location->id !!}" >
                                        <label class="custom-control-label" for="location-{!! $location->id !!}"></label>
                                    </div></td>
                                <td>{{$location->name}}</td>
                                <td>{{$location->zip_code}}</td>
                                <td>{{$location->address}}</td>

                                <td>

                                    <div class="ml-3">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                                    <a href="#!" class="dropdown-item edit" data-action="edit" data-id="{!! $location->id !!}"><i class="icon-pencil3"></i> Edit</a>
                                                    <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $location->id !!}"><i class="icon-trash"></i> Delete</a>

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

    <div id="modal-location" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Location</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="col s12" id="user-form" method="post" action="/location/add_location" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" required class="validate form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="zip_code">Zipcode</label>
                                <input id="zip_code" type="text" class="form-control" name="zip_code"  >
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" class="form-control"></textarea>
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

                    <a href="#!" class="btn btn-danger save-location">Add Location</a>
                </div>

            </div>
        </div>
    </div>
    <div id="modal-location-edit" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Location</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="col s12" id="edit-form" method="post" action="/location/edit_location" enctype="multipart/form-data">
                        <input type="hidden" id="location_edit_id" name="id" />
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="validate form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="zip_code">Zipcode</label>
                                <input id="zip_code" type="text" class="validate form-control" name="zip_code"  data-error=".errorTxt2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="card green success-message bg-green" style="display: none;">
                            <div class="card-content white-text">
                                <p></p>
                            </div>
                        </div>
                        <div class="card red error-message bg-danger"  style="display: none;">
                            <div class="card-content white-text">
                                <p></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger edit-location">Update Location</a>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    <script>
        $(function(){

            $("#all").change(function () {
                /* if($(this).is(":checked"))
                 $(".patient-list-table > tbody input[type=checkbox]").attr('checked','checked');
                 else
                 $(".patient-list-table > tbody input[type=checkbox]").removeAttr('checked');*/
                $("table > tbody input[type=checkbox]").prop('checked', this.checked);
            });


            $(".addlocation").click(function(){
                $("#modal-location").modal();;
            });
            $(".save-location").click(function(e){
                $(".alert").hide();


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

            $(".edit-location").click(function(e){
                $(".alert").hide();
                $validation = $("#edit-form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        name: {
                            required: true
                        },
                        zip_code: {
                            required: true
                        },
                        address: {
                            required: true
                        },

                    },
                    // Error messages
                    messages: {
                        name: "Name is required",
                        zip_code: "Zipcode is required ",
                        address: "Address is required",

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
                $("#location_edit_id").val(id);
                $.ajax({
                    url:"/location/get/"+id,
                    success:function(response){
                        response = $.parseJSON(response);
                       $("#edit-form input[name=name]").val(response.name);
                        $("#edit-form input[name=name]").focusin();
                        $("#edit-form input[name=zip_code]").val(response.zip_code);
                        $("#edit-form input[name=zip_code]").focusin();
                        $("#edit-form textarea[name=address]").val(response.address);
                        $("#edit-form textarea[name=address]").focusin();
                        $("#modal-location-edit").modal();;

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
                            url:"/location/delete/"+id,
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