@extends('layout.app')
@section('page-title') Doctors Management @endsection
@section('css')
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
@endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Doctor List</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger adddoctor">Add New Doctor</button> </div>
                </div>
                <table class="table table-striped patient-list-table">
                    <thead>
                    <tr>
                        <th width="50px"><div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="all"  >
                                <label class="custom-control-label" for="all"></label>
                            </div></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Services</th>

                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($doctors) && count($doctors) > 0)
                        @foreach($doctors as $doctor)
                            <tr>
                                <td><div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="doctor-{!! $doctor->doctor_id !!}"   value="{!! $doctor->doctor_id !!}" >
                                        <label class="custom-control-label" for="doctor-{!! $doctor->doctor_id !!}"></label>
                                    </div></td>
                                <td>Dr. {{$doctor->fname.' '.$doctor->lname}}</td>
                                <td><a href="mailto:{!! $doctor->email !!}" class="text-danger email">{!! $doctor->email !!}</a> </td>
                                <td>{!! $doctor->mobile_number !!}</td>
                                <td></td>
                                <td>

                                    <div class="ml-3">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                                    <a href="#!" class="dropdown-item view" data-action="view" data-id="{!! $doctor->doctor_id !!}"><i class="icon-eye"></i> View</a>
                                                    <a href="#!" class="dropdown-item edit" data-action="edit" data-id="{!! $doctor->doctor_id !!}"><i class="icon-pencil3"></i> Edit</a>
                                                    <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $doctor->doctor_id !!}"><i class="icon-trash"></i> Delete</a>

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



    <div id="doctor-modal" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="col s12" id="user-form" method="post" action="/doctor/add_doctor" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="first_name" class="">First Name</label>
                                <input id="first_name" name="first_name" type="text" class="validate form-control"  data-error=".errorTxt1">


                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" type="text" class="validate form-control" name="last_name"  data-error=".errorTxt2">

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="phone_number" class="">Phone Number</label>
                                <input id="phone_number" name="phone_number" type="text" class="validate form-control"   data-error=".errorTxt3">

                            </div>
                            <div class="form-group col-sm-6">
                                <label for="mobile_number" class="">Mobile Number</label>
                                <input id="mobile_number" name="mobile_number" type="text" class="validate form-control"   data-error=".errorTxt3">


                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="small-text-formatting email form-control" name="email"   data-error=".errorTxt4">


                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="notes" class="">Note</label>
                                <textarea id="notes" name="notes" class="form-control"></textarea>

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

                    <a href="#!" class="btn btn-danger save-doctor">Save Doctor</a>
                </div>

            </div>
        </div>
    </div>

@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    <script>

        $(function(){



            $('.doctor_service').select2({dropdownAutoWidth : 'true'});;
            var timeoutId;
            $('form input, form textarea').on('input propertychange change', function() {
                console.log($(this));
                var frm = $(this).parent().parent().parent().parent().parent();
               // console.log(frm.attr('id'));
               // return false;
                clearTimeout(timeoutId);
                timeoutId = setTimeout(function() {
                    // Runs 1 second (1000 ms) after the last change
                    //$(".progress").show();
                    $(".ajax-loading").hide();
                    frm.ajaxForm(function(response){
                        $(".progress").hide();
                        $(".ajax-loading").show();
                      //  $("#patient_id").val(response);
                        setTimeout(function(){
                            $(".ajax-loading").hide();
                        },1500);
                    }).submit();

                }, 2000);
            });

            $(".adddoctor").click(function(){

                $("#doctor-modal").modal();;
            });
            $(".save-doctor").click(function(e){
                $(".alert").hide();
                $validation = $("#user-form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        first_name: {
                            required: true
                        },
                        last_name: {
                            required: true
                        },
                        email: {
                            email: true,
                            required: true
                        },
                        phone_number: {
                            required: true,
                        },

                    },
                    // Error messages
                    messages: {

                        email: "Email Address is required",
                        first_name: "First name is required ",
                        last_name: "Last name is required",

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
        })




    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection