@extends('layout.app')
@section('page-title') Setup - Clinical Detail @endsection
@section('css')

@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Clinical Details</span> - List</h4>
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
                    <span class="breadcrumb-item active">Clinical Details</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card">


            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger add-detail">Add New Clinical Detail</button> </div>
                </div>
                <div class="table-responsive">
                <table class="table table-striped patient-list-table">
                    <thead>
                        <tr>
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="all"  >
                                    <label class="custom-control-label" for="all"></label>
                                </div>
                            </th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($detail) && count($detail)>0)

                        @foreach($detail as $d)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="clinical-detail-{!! $d->clinical_detail_id !!}"   value="{!! $d->clinical_detail_id !!}" >
                                <label class="custom-control-label" for="clinical-detail-{!! $d->clinical_detail_id !!}"></label>
                            </div>
                        </td>
                        <td>{!! $d->name !!}</td>
                        <td>{!! $d->contact_number !!}</td>
                        <td><span class="email">{!! $d->email !!}</span> </td>
                        <td>{!! $d->address !!}</td>
                        <td>
                            <div class="ml-3">
                                <div class="list-icons">
                                    <div class="list-icons-item dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                            <a href="#!" class="dropdown-item action" data-action="view" data-clinical-id="{!! $d->clinical_detail_id !!}"><i class="icon-eye"></i> Detail</a>
                                            <a href="#!" class="dropdown-item action" data-action="edit" data-clinical-id="{!! $d->clinical_detail_id !!}"><i class="icon-pencil3"></i> Edit</a>
                                            <a href="#!" class="dropdown-item action delete" data-action="delete" data-clinical-id="{!! $d->clinical_detail_id !!}"><i class="icon-trash"></i> Delete</a>

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
    <div id="modal-detail" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Clinical Detail</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form class="col s12" id="form" method="post" action="/setup/add_clinical_detail" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Name</label>
                                <select class="icons" id="country_area_code" required name="location" >
                                    <option value="" selected disabled="disabled">Choose Location</option>
                                    @foreach($locations as $location)
                                        <option value="{!! $location->id !!}">{!! $location->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Country Code</label>
                                <select class="icons country_area_code" name="contact_code" required id="phone">
                                    <option value="">Choose Country</option>
                                    @foreach($countries as $country)
                                        <option value="{!! $country->code !!}">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input id="contact_number" name="contact_number" type="text" required class="validate contact_number form-control"  data-error=".errorTxt2">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Country Code</label>
                                <select class="icons country_area_code" name="mobile_code" id="mobile">
                                    <option value="">Choose Country</option>
                                    @foreach($countries as $country)
                                        <option @if($current_country==$country->name) selected  @endif value="{!! $country->code !!}" data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg" data-code="{!! $country->code !!}" class="left circle">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input id="mobile_number" name="mobile_number" type="text" class="validate mobile_number form-control" >
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" name="email" type="email" class="validate small-text-formatting form-control email"  data-error=".errorTxt6">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Website</label>
                                <input id="website" name="website" type="url" class="validate small-text-formatting form-control" style="text-transform: lowercase !important;"  data-error=".errorTxt4">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">

                                <button class="btn btn-danger  save-detail" style="width:100%;">Save Clinical Detail</button>
                            </div>

                        </div>

                    </div>
                </form>
            </div>


        </div>
    </div>
    </div>

    <div id="modal-detail-edit" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit - <span id="edit-name" class="text-danger-800 bold"></span> </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="col s12" id="update-form" method="post" action="/setup/update/clinical" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id" />
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <select class="icons" id="edit-country_area_code" required name="location" >
                                        <option value="" selected disabled="disabled">Choose Location</option>
                                        @foreach($locations as $location)
                                            <option value="{!! $location->id !!}">{!! $location->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Country Code</label>
                                    <select class="icons country_area_code" name="contact_code" required id="edit-phone">
                                        <option value="">Choose Country</option>
                                        @foreach($countries as $country)
                                            <option value="{!! $country->code !!}">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input id="edit-contact_number" name="contact_number" type="text" required class="validate contact_number form-control"  data-error=".errorTxt2">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Country Code</label>
                                    <select class="icons country_area_code" name="mobile_code" id="edit-mobile">
                                        <option value="">Choose Country</option>
                                        @foreach($countries as $country)
                                            <option @if($current_country==$country->name) selected  @endif value="{!! $country->code !!}" data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg" data-code="{!! $country->code !!}" class="left circle">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input id="edit-mobile_number" name="mobile_number" type="text" class="validate mobile_number form-control" >
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="edit-email" name="email" type="email" class="validate small-text-formatting form-control email"  data-error=".errorTxt6">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input id="edit-website" name="website" type="url" class="validate small-text-formatting form-control"  style="text-transform: lowercase !important;"   data-error=".errorTxt4">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">

                                    <button class="btn btn-danger  update-detail" style="width:100%;">Save Clinical Detail</button>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <div id="modal-detail-view" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Clinical Detail</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-body border-top-danger">
                                <h6 class="mb-0 font-weight-semibold" id="name"></h6>
                                <p class="mb-1 text-muted" id="phone_number"></p>
                                <p class="mb-3 text-muted" id="address-view"></p>
                                <hr class="mt-0">

                                <blockquote class="blockquote blockquote-bordered py-2 pl-3 mb-0">

                                    <ul class="list list-unstyled mb-0">
                                        <li id="mobile-number"></li>
                                        <li class="email" id="email-view"></li>
                                        <li id="website-view" class="email" ></li>

                                    </ul>


                                </blockquote>
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

    <script>
        $(function(){

            $(".action").click(function(){
                var action = $(this).attr('data-action');
                var id = $(this).attr('data-clinical-id');

                switch(action){
                    case "view":
                        $("#modal-detail-view").modal();
                        $.ajax({
                            url:"/clinical/get/"+id,
                            success:function(response){
                                response = $.parseJSON(response);
                                $("#name").html(response.name);
                                $("#phone_number").html('<i class="icon-phone mr-2"></i> '+response.contact_number);
                                $("#mobile-number").html('<i class="icon-mobile3 mr-2"></i> '+response.mobile_number);
                                $("#email-view").html('<i class="icon-mail5 mr-2"></i> '+response.email);
                                $("#website-view").html('<a href="'+response.website+'" target="_blank" class="text-danger email"><i class="icon-browser mr-2"></i> '+response.website+'</a>');
                                $("#address-view").html('<i class="icon-location3 mr-2"></i> '+response.address);
                            }
                        });
                        break;
                    case "edit":
                        $("#modal-detail-edit").modal();

                        $.ajax({
                            url:"/clinical/get/"+id,
                            success:function(response){
                                response = $.parseJSON(response);
                                $("#edit-name").html(response.name);
                                $("#edit-contact_number").val(response.contact_number);
                                $("#edit-mobile_number").val(response.mobile_number);
                                $("#edit-email").val(response.email);
                                $("#edit-website").val(response.website);
                                $("#id").val(response.id);

                                $("#edit-country_area_code").select2().val(response.location_id).trigger('change');
                                $("#edit-phone").select2().val(response.contact_code).trigger('change');
                                $("#edit-mobile").select2().val(response.mobile_code).trigger('change');


                            }
                        });
                        break;
                }
            });

            $("#all").change(function () {
                /* if($(this).is(":checked"))
                 $(".patient-list-table > tbody input[type=checkbox]").attr('checked','checked');
                 else
                 $(".patient-list-table > tbody input[type=checkbox]").removeAttr('checked');*/
                $("table > tbody input[type=checkbox]").prop('checked', this.checked);
            });

            $("select").select2();

          //  var card_body = new PerfectScrollbar('.card-body');

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
                $(".add-detail").click(function(){
                    $("#modal-detail").modal();
                });

                $(".delete").click(function(){
                    var id = $(this).attr('data-clinical-id');
                    swal({    title: "Are you sure?",
                            text: "You will not be able to recover this detail!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            closeOnConfirm: false },
                        function(){

                            $.ajax({
                                url:"/clinical/delete/"+id,
                                success:function(){
                                    swal("Deleted!", "Clinical record has been deleted.", "success");
                                    setTimeout(function(){location.reload()}, 2500);
                                }
                            });


                        });
                });


            var c =1;
            $(".phone").change(function(){

                    var area_code = $(this).val();
                    $(".contact_number").val('+'+area_code+' ');
            });
            $(".mobile").change(function(){

                var area_code = $(this).val();
                $(".mobile_number").val('+'+area_code+' ');
            });

            $("#phone").change(function(){

                var area_code = $(this).val();
                $("#contact_number").val('+'+area_code+' ');
            });
            $("#mobile").change(function(){

                var area_code = $(this).val();
                $("#mobile_number").val('+'+area_code+' ');
            });

            $(".save-detail").click(function(e){



                if($("#form").valid()){

                    $("#form").ajaxForm(function(response){
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
            $(".update-detail").click(function(e){
                $(".alert").hide();


                if($("#update-form").valid()){

                    $("#update-form").ajaxForm(function(response){
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