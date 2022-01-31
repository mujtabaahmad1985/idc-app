@extends('layout.app')
@section('page-title') Service  Management @endsection
@section('css')

@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Services</span> - List</h4>
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
                    <span class="breadcrumb-item active">Services</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>

    <div class="content">
        <div class="card">


            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 text-right float-sm-right mb-2"><button class="btn btn-danger addservice">Add New Service</button> </div>
                </div>
                <div class="table-responsive">
                <table class="table table-striped patient-list-table">
                    <thead>
                    <tr>
                        <th width="50px"><div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="all"  >
                                <label class="custom-control-label" for="all"></label>
                            </div></th>
                        <th>Name</th>
                        <th>Price</th>

                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if(isset($services) && count($services) > 0)
                        @foreach($services as $service)
                            <tr>
                                <td><div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="location-{!! $service->id !!}"   value="{!! $service->id !!}" >
                                        <label class="custom-control-label" for="location-{!! $service->id !!}"></label>
                                    </div></td>
                                <td>{{$service->service_name}}</td>
                                <td>${{number_format($service->price,2)}}</td>

                                <td>

                                    <div class="ml-3">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                                    <a href="#!" class="dropdown-item edit" data-action="edit" data-service-id="{!! $service->id !!}"><i class="icon-pencil3"></i> Edit</a>
                                                    <a href="#!" class="dropdown-item delete" data-action="" data-service-id="{!! $service->id !!}"><i class="icon-trash"></i> Delete</a>

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

    <div id="modal-service" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Service</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="" id="user-form" method="post" action="/service/add_service" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="service_name" class="">Service Name</label>
                                <input id="service_name" name="service_name" type="text" class="form-control" required data-error=".errorTxt1">

                                <div class="errorTxt1 error"></div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="service_name" class="">Service Price</label>
                                <input id="price" name="price" type="number" class="form-control"  required data-error=".errorTxt2">

                                <div class="errorTxt2 error"></div>
                            </div>
                        </div>


                        <div class="alert bg-success text-white success-message" style="display: none;">
                            <div class="card-content white-text">
                                <p>d</p>
                            </div>
                        </div>
                        <div class="alert bg-danger text-white error-message"  style="display: none;">
                            <div class="card-content white-text">
                                <p>d</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger save-service">Add Service</a>
                </div>

            </div>
        </div>
    </div>
    <div id="edit-modal-service" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Service</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="" id="update-user-form" method="post" action="/service/update_service" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="service_id" />
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="service_name" class="">Service Name</label>
                                <input id="edit_service_name" name="service_name" type="text" class="form-control"  data-error=".errorTxt1">

                                <div class="errorTxt1 error"></div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="service_name" class="">Service Price</label>
                                <input id="edit_service_price" name="price" type="number" class="form-control"  required data-error=".errorTxt2">

                                <div class="errorTxt2 error"></div>
                            </div>
                        </div>


                        <div class="alert bg-success text-white success-message" style="display: none;">
                            <div class="card-content white-text">
                                <p>d</p>
                            </div>
                        </div>
                        <div class="alert bg-danger text-white error-message"  style="display: none;">
                            <div class="card-content white-text">
                                <p>d</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger update-service">Update Service</a>
                </div>

            </div>
        </div>
    </div>
    <section id="content">

    @include('partials.breadcrumb')







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
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/datatables.min.js') !!}
    <script>
        $(function(){

            $('table').DataTable({
                pagingType: "simple",
                "bInfo" : false,
                "lengthChange": false,
                "lengthMenu": [[75, 150,-1], [75, 150,  "All"]],
                language: {
                    paginate: {'next': $('html').attr('dir') == 'rtl' ? 'Next &larr;' : 'Next &rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr; Prev' : '&larr; Prev'}
                }
            });

            $("#all").change(function () {
                /* if($(this).is(":checked"))
                 $(".patient-list-table > tbody input[type=checkbox]").attr('checked','checked');
                 else
                 $(".patient-list-table > tbody input[type=checkbox]").removeAttr('checked');*/
                $("table > tbody input[type=checkbox]").prop('checked', this.checked);
            });

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
                    $("#show-modal-service").modal();
                });

            $(".addservice").click(function(){
                $("#modal-service").modal();;
            });
            $(".edit").click(function(){
                var service_id = $(this).attr('data-service-id');
              //  $("#show-modal-service").modal('close');
             //   return false;
               $.post("/service/get",{id:service_id,"_token":"{{ csrf_token() }}"}, function (response) {
                   response  =$.parseJSON(response);
                   $("#update-user-form input[name=service_name]").val(response.name);
                   $("#update-user-form input[name=price]").val(response.price);
                   $("#update-user-form input[name=service_name]").focusin();

                   /*$("#update-user-form select[name=service_type]").val(response.service_type);

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
                   $("#update-user-form textarea[name=description]").focusin();*/

                   $("#update-user-form   #service_id").val(response.id);
               })

                $("#edit-modal-service").modal();;
            });
            $("body").on("click",'.delete',function(){
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
                $("#edit-modal-service").modal();;
            });

            $(".save-service").click(function(e){
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