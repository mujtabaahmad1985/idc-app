@extends('layout.app')
@section('page-title') Doctors Management @endsection
@section('css')
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    <style>
        .table-responsive{overflow: inherit}
    </style>
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Doctors</span> - List</h4>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="/new/doctor" class="btn btn-link btn-float text-body"><i class="icon-user text-primary"></i><span>Add Doctor</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>
                    <a href="#" class="breadcrumb-item">Setup</a>
                    <span class="breadcrumb-item active">Doctors</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card">


            <div class="card-body">
                @if(Auth::user()->role=='hospital-administrator' || in_array(51,$permissions_allowed) )
                <div class="row">
                    <div class="col-sm-12 text-right float-sm-right"><a href="/new/doctor" class="btn btn-danger">Add New Doctor</a> </div>
                </div>
                @endif
                <div class="table-responsive">
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
                                    <td><a href="mailto:{!! $doctor->users->email !!}" class="text-danger email">{!! $doctor->users->email !!}</a> </td>
                                    <td>{!! $doctor->mobile_number !!}</td>
                                    <td></td>
                                    <td>

                                        <div class="ml-3">
                                            <div class="list-icons">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                        @if(Auth::user()->role=='hospital-administrator' || in_array(53,$permissions_allowed) )
                                                            <a href="/doctor/profile/{!! $doctor->users->name !!}" class="dropdown-item " data-user-id="{!! $doctor->doctor_id !!}"  data-id="{!! \App\Helpers\CommonMethods::encrypt($doctor->id) !!}"><i class="icon-eye"></i> View</a>
                                                        @endif
                                                        @if(Auth::user()->role=='hospital-administrator' || in_array(52,$permissions_allowed) )
                                                            <a href="/edit/doctor/{!! $doctor->id !!}" class="dropdown-item" data-id="{!! $doctor->id !!}"><i class="icon-pencil3"></i> Edit</a>
                                                        @endif
                                                        @if(Auth::user()->role=='hospital-administrator' || in_array(55,$permissions_allowed) )
                                                            <a href="#!" class="dropdown-item delete" data-action="delete" data-id="{!! $doctor->id !!}"><i class="icon-trash"></i> Delete</a>
                                                        @endif
                                                        <div class="dropdown-divider"></div>
                                                        @if(Auth::user()->role=='hospital-administrator' || in_array(58,$permissions_allowed) )
                                                            <a href="/doctor/appointments/{!! $doctor->id !!}" class="dropdown-item" data-action="appointments" data-id="{!! $doctor->doctor_id !!}"><i class="icon-calendar"></i>Appointments</a>
                                                        @endif
                                                        @if(Auth::user()->role=='hospital-administrator' || in_array(57,$permissions_allowed) )
                                                            <a href="#!" class="dropdown-item availability" data-action="availability" data-id="{!! $doctor->doctor_id !!}"><i class="icon-calendar5"></i> Availability</a>
                                                        @endif
                                                        {{--        @if(Auth::user()->role=='hospital-administrator' || in_array(56,$permissions_allowed) )
                                                   {{-- <div class="dropdown-divider"></div>
                                                        <a href="/set/doctor/permissions/{!! $doctor->doctor_id !!}" class="dropdown-item permissions"><i class="icon-qrcode"></i> Setup Permissions</a>
                                                                @endif--}}
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



    <div id="doctor-availability" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="icon-menu7 mr-2"></i>Availbility</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <table class="table table-borderless" id="availabilty-details">
                    </table>

                </div>
                <div class="modal-footer">

                    <a href="/setup/availability" class="btn btn-danger"><i class="icon-plus-circle2 font-size-base mr-1"></i> Add Availabilty</a>
                </div>


            </div>
        </div>
    </div>

    <div id="doctor-appointments" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="icon-menu7 mr-2"></i>Appointments</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <table class="table table-borderless" id="appointments-details">
                    </table>

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

            $(".dropdown-item").click(function(){
                var doctor_id = $(this).attr('data-id');
                var action = $(this).attr('data-action');

                switch(action){

                    case "edit":
                        $.ajax({
                            url:"/doctor/"+doctor_id,
                            success:function(response){
                                response = $.parseJSON(response);
                                $("#doctor-modal #doctor_id").val(doctor_id);
                                $("#doctor-modal #first_name").val(response.fname);
                                $("#doctor-modal #last_name").val(response.lname);
                                $("#doctor-modal #phone_number").val(response.phone_number);
                                $("#doctor-modal #mobile_number").val(response.mobile_number);
                                $("#doctor-modal #email").val(response.email);
                                $("#doctor-modal #notes").val(response.notes);
                                $("#doctor-modal").modal();;
                            }
                        });
                        break;
                    case "delete":
                    if(confirm("Do you want delete?")){
                        $.ajax({
                            url:"/doctor/delete/"+doctor_id,
                            success:function(response){
                                location.reload();
                            }
                        });
                    }

                        break;
                    case "view":
                       $.ajax({
                           url:"/get/doctor/detail/"+doctor_id,
                           success:function (response) {
                               $("#doctor-modal-view .modal-body").html(response);
                           }
                       });
                        $("#doctor-modal-view").modal();
                    break;
                }
            });


            $(".adddoctor").click(function(){

                $("#doctor-modal").modal();;
            });
            $(".save-doctor").click(function(e){
                $(".alert").hide();


                if($("#user-form").valid()){

                    $("#user-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){
                                window.location = "/doctors";
                            }, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });

            $("body").on("click",".availability",function () {
                var doctor_id = $(this).attr('data-id');

                $.ajax({
                    url:"/get/doctor/availability/details/"+doctor_id,
                    success:function (response) {

                        response = $.parseJSON(response);

                        if(response){
                            $.each(response,function(i,v){
                                console.log(v.start_time);
                                str="<tr>";
                                str+='<td>';
                                str+='<h5  class="m-0">'+(v.locations?v.locations.name:"N/A")+'</h5>';
                                str+=' <span class="badge badge-danger">'+moment(v.start_time,'hh:mm a').format('hh:mm a')+'- '+moment(v.end_time,'hh:mm a').format('hh:mm a')+' </span>';
                                str+=' <span class="badge badge-light">'+moment(v.start_date,'DD-MM-YYYY').format('DD.MM.YYYY')+' - '+moment(v.end_date,'DD-MM-YYYY').format('DD.MM.YYYY')+' </span>';
                                str+='</td>';
                                str+='</tr>';

                                $("#availabilty-details").append(str);
                            });

                        }

                        $("#doctor-availability").modal();

                    }


                });
            });
        })




    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection