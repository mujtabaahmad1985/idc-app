@extends('layout.app')
@section('page-title') Service  Management @endsection
@section('css')

@endsection

@section('content')
    <style type="text/css">
        .input-field div.error{
            position: relative;
            top: -1rem;
            left: 0rem;
            font-size: 0.8rem;
            color:#FF0000;
            -webkit-transform: translateY(0%);
            -ms-transform: translateY(0%);
            -o-transform: translateY(0%);
            transform: translateY(0%);
        }
        .input-field label.active{
            width:100%;
        }
        .left-alert input[type=text] + label:after,
        .left-alert input[type=password] + label:after,
        .left-alert input[type=email] + label:after,
        .left-alert input[type=url] + label:after,
        .left-alert input[type=time] + label:after,
        .left-alert input[type=date] + label:after,
        .left-alert input[type=datetime-local] + label:after,
        .left-alert input[type=tel] + label:after,
        .left-alert input[type=number] + label:after,
        .left-alert input[type=search] + label:after,
        .left-alert textarea.materialize-textarea + label:after{
            left:0px;
        }
        .right-alert input[type=text] + label:after,
        .right-alert input[type=password] + label:after,
        .right-alert input[type=email] + label:after,
        .right-alert input[type=url] + label:after,
        .right-alert input[type=time] + label:after,
        .right-alert input[type=date] + label:after,
        .right-alert input[type=datetime-local] + label:after,
        .right-alert input[type=tel] + label:after,
        .right-alert input[type=number] + label:after,
        .right-alert input[type=search] + label:after,
        .right-alert textarea.materialize-textarea + label:after{
            right:70px;
        }
        .dropdown-content{
            background: #f5f2f0 !important; width: auto !important;
        }
        .dropdown-content a{color:rgba(0,0,0,0.54) !important;}
        .dropdown-content li{
            padding:10px !important;}
        .fixed-action-btn.horizontal ul li {
            display: inline-block;
            margin: 1px 2px 0 0;
        }
        .fixed-action-btn.horizontal ul{ right: 40px}
        .setup .card p {
            padding: 15px 0;
            min-height: 53px;
        }
        .setup .card .card-content
        {
            padding: 9px;
            border-radius: 0 0 2px 2px;
        }
        .card .card-content .card-title{ font-size: 17px;}
        .setup .card{margin: .5rem 0 0.2rem 0;}
    </style>
    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">
            <div class="row">
                <h4 class="header col s6">Services</h4>
                <div class="col s6 right-align" style="margin-top:20px">
                    <a href="javascript:;" class="waves-effect waves-light  btn red m-10 addservice">Add new service</a>
                </div>
                <div class="col s6 m3 l2 right m-top-5 right-align">
                    <a class="btn-floating red grid-view"><i class="material-icons">apps</i></a>
                    <a class="btn-floating yellow darken-1 list-view"><i class="material-icons">menu</i></a>


                </div>
            </div>


            <div class="row setup">
<div class="col s12">
    <input type="text" id="search-keywords" placeholder="Search for service..">
</div>
                @if(isset($services) && count($services) > 0)
                    @foreach($services as $service)
                        <div class="col s12 m12 l12 view">
                            <div class="card" data-id="{!! $service->id !!}" style="cursor: pointer">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col  s8 m10 l10 view-title">
                                            <div class="show-service" data-id="{!! $service->id !!}" style="cursor: pointer">
                                                <span class="card-title truncate">{{$service->service_name}}</span>


                                            </div>
                                        </div>
                                        <div class="col  s4 m2 l2 action">
                                            <a class="btn-floating grey right edit" data-service-id="{!! $service->id !!}" ><i class="material-icons">create</i></a>
                                            <a class="btn-floating red right delete" data-service-id="{!! $service->id !!}" style="margin-right: 5px"><i class="material-icons">delete</i></a>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <!--end container-->
        <style>
            .modal{ width: 48%;}
            .picker__holder{overflow: hidden; background: none}
        </style>
        <div id="modal-service" class="modal">
            <div class="modal-content">
                <div class="row">
                    <h4>Add Service</h4>
                </div>
                <div class="row">
                    <form class="" id="user-form" method="post" action="/service/add_service" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">local_hospital</i>
                                <input id="service_name" name="service_name" type="text" class=""  data-error=".errorTxt1">
                                <label for="service_name" class="">Service Name</label>
                                <div class="errorTxt1 error"></div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="input-field col s6" style="padding:0">
                                <i class="material-icons prefix">timer</i>
                                <input id="duration" name="duration" type="text" class=""  data-error=".errorTxt3">
                                <label for="duration" class="">Duration e.g 00:15</label>
                                <div class="errorTxt3 error"></div>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">payment</i>
                                <input id="price" name="price" type="text" class="">
                                <label for="price" class="">Price</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field">
                                <i class="mdi-editor-mode-edit prefix"></i>
                                <textarea id="description" name="description" class="materialize-textarea"></textarea>
                                <label for="description" class="">Description</label>

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

            </div>
            <div class="modal-footer">
                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Close</a>
                <a href="#" class="waves-effect waves-green btn-flat modal-action save-service">Add Service</a>
            </div>
        </div>

        <div id="edit-modal-service" class="modal">
            <div class="modal-content">
                <div class="row">
                    <h4>Update Service</h4>
                </div>
                <div class="row">
                    <form class="" id="update-user-form" method="post" action="/service/update_service" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="service_id" />
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">local_hospital</i>
                                <input id="service_name" name="service_name" type="text" class=""  data-error=".errorTxt1">
                                <label for="service_name" class="">Service Name</label>
                                <div class="errorTxt1 error"></div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="input-field col s6" style="padding: 0">
                                <i class="material-icons prefix">timer</i>
                                <input id="duration" name="duration" type="text" class=""  data-error=".errorTxt3">
                                <label for="duration" class="">Duration e.g 00:15</label>
                                <div class="errorTxt3 error"></div>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">payment</i>
                                <input id="price" name="price" type="text" class=""  data-error=".errorTxt5">
                                <label for="price" class="">Price</label>
                                <div class="errorTxt5 error"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field">
                                <i class="mdi-editor-mode-edit prefix"></i>
                                <textarea id="description" name="description" class="materialize-textarea"  data-error=".errorTxt6"></textarea>
                                <label for="description" class="">Description</label>
                                <div class="errorTxt6 error"></div>
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

            </div>
            <div class="modal-footer">
                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Close</a>
                <a href="#" class="waves-effect waves-green btn-flat modal-action update-service">Update Service</a>
            </div>
        </div>
        <div id="show-modal-service" class="modal">
            <div class="modal-content">
                <h3 class="heading" id="service-title" style="font-size: 2rem"></h3>
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card-panel red">

                            <span class="white-text" id="service-description"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s6 m6">
                        <div class="card-panel">
                            <span><i class="material-icons">credit_card</i></span>
                            <span id="service-price"></span>
                        </div>
                    </div>
                    <div class="col s6 m6">
                        <div class="card-panel">
                            <span><i class="material-icons">schedule</i></span>
                            <span id="service-time"></span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Close</a>
            </div>
        </div>


    </section>
@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    <script>
        $(function(){
            $("#search-keywords").keyup(function(){
                var filter = $(this).val();
                filter = filter.toUpperCase();
                var view = $(".view");
                console.log(view);

               $.each(view, function(){
                  var txt = $(this).find('.card-title').text().toUpperCase();
                   if (txt.indexOf(filter) > -1) {
                       $(this).show();
                   } else {
                       $(this).hide();
                   }
               });

            });
                $(".grid-view").click(function(){
                    $(".view").removeClass('l12').addClass('l3');
                    $(".view-title").removeClass('l10').addClass('l12');
                    $(".action").removeClass('l2').addClass('l12');
                });
            $(".list-view").click(function(){
                $(".view").removeClass('l3').addClass('l12');
                $(".view-title").removeClass('l12').addClass('l10');
                $(".action").removeClass('l12').addClass('l2');
            });
                $(".show-service").click(function(){
                    var service_id = $(this).attr('data-id');
                    $.post("/service/get",{id:service_id,"_token":"{{ csrf_token() }}"}, function (response) {
                        response  =$.parseJSON(response);
                        $("#service-title").html(response.name);
                        $("#service-description").html(response.description);
                        $("#service-price").html(response.price+".00 SGD");
                        $("#service-time").html(response.duration);

                    })
                    $("#show-modal-service").modal('open');
                });

            $(".addservice").click(function(){
                $("#modal-service").modal('open');;
            });
            $(".edit").click(function(){
                var service_id = $(this).attr('data-service-id');
              //  $("#show-modal-service").modal('close');
             //   return false;
               $.post("/service/get",{id:service_id,"_token":"{{ csrf_token() }}"}, function (response) {
                   response  =$.parseJSON(response);
                   $("#update-user-form input[name=service_name]").val(response.name);
                   $("#update-user-form input[name=service_name]").focusin();

                   $("#update-user-form select[name=service_type]").val(response.service_type);

                   $('#update-user-form select[name=service_type]').material_select('destroy')
                   $('#update-user-form select[name=service_type]').material_select()

                   $("#update-user-form select[name=buffer_time]").val(response.buffer_time);

                   $('#update-user-form select[name=buffer_time]').material_select('destroy')
                   $('#update-user-form select[name=buffer_time]').material_select()

                   $("#update-user-form input[name=duration]").val(response.duration);
                   $("#update-user-form input[name=duration]").focusin();
                   $("#update-user-form input[name=price]").val(response.price);
                   $("#update-user-form input[name=price]").focusin();

                   $("#update-user-form textarea[name=description]").val(response.description);
                   $("#update-user-form textarea[name=description]").focusin();

                   $("#service_id").val(response.id);
               })

                $("#edit-modal-service").modal('open');;
            });
            $(".delete").click(function(){
                var service_id = $(this).attr('data-service-id');
                swal({    title: "Are you sure?",
                        text: "You will not be able to recover this service!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false },
                    function(){
                        $.post("/service/delete",{id:service_id,"_token":"{{ csrf_token() }}"}, function (response) {
                            response  =$.parseJSON(response);
                            swal("Deleted!", "Service has been deleted.", "success");
                            setTimeout(function(){location.reload()}, 2500);
                        })

                    });
            });

            $(".delete-service").click(function(){
                var service_id = $(this).attr('data-service-id');
                $.post("/service/delete",{id:service_id,"_token":"{{ csrf_token() }}"}, function (response) {
                    response  =$.parseJSON(response);

                })
                $("#edit-modal-service").modal('open');;
            });

            $(".save-service").click(function(e){
                $(".alert").hide();




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

                e.preventDefault();
            });

            $(".update-service").click(function(e){
                $(".alert").hide();
                $validation = $("#update-user-form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {


                        service_name: {
                            required: true
                        },
                        description: {
                            required: true
                        },
                        buffer_time: {
                            required: true
                        },
                        price: {
                            required: true
                        },
                        duration: {
                            required: true
                        },

                    },
                    // Error messages
                    messages: {
                        service_name: "Servoce name is required",
                        description: "Description is required ",
                        buffer_time: "Buffer time is required ",
                        price: "Price is required ",
                        duration: "Duration is required ",

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

                if($("#update-user-form").valid()){

                    $("#update-user-form").ajaxForm(function(response){
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