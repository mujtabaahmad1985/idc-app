@extends('layout.app')
@section('page-title') Staff Management @endsection
@section('css')
<style>
    .table-responsive {

        overflow-x: inherit;
    }
    @media (max-width: 414px){


        .col-4.align-self-center{
            text-align: center!important;
            flex: 0 0 100% !important;
            max-width: 100% !important;
            margin-bottom: 20px !important;
        }
    }
</style>
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Staffs</span> - List</h4>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-user text-primary"></i><span>Staffs</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>
                    <a href="#" class="breadcrumb-item">Staffs</a>
                    <span class="breadcrumb-item active">Staffs List</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">




        @php
            $keyword = isset($_GET['keywords'])?$_GET['keywords']:"";
        @endphp


        <div class="card">


            <div class="card-body">
                <div class="row">

                    <div class="col align-self-center text-right">
                        <a href="/staffs/add" id="add_patient_link" class="btn btn-danger">Add New Staff</a>
                    </div>
                    <div class="col align-self-end">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" style="text-transform: none;" id="search-keywords" name="keywords" value="{!! $keyword !!}"
                                       placeholder="Search for staff..">
                                <span class="input-group-append">
                                                        <button class="btn btn-danger"  id="search-patients"><i class="icon-search4"></i></button>
                                                    </span>
                            </div>


                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>

                        <tr>
                            <th width="50px"><div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="all"  >
                                    <label class="custom-control-label" for="all"></label>
                                </div></th>
                            <th>Unique ID</th>
                            <th>Staff Name</th>
                            <th>Role</th>
                            <th> D.O.B </th>
                            <th>Address </th>
                            <th>Email</th>
                            <th>Mobile No</th>
                            <th>ID No.</th>
                            <th>Start date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($staffs) && count($staffs) > 0)
                            @foreach($staffs as $staff)
                                <tr>
                                    <td><div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="staff-{!! $staff->id !!}"   value="{!! $staff->id !!}" >
                                            <label class="custom-control-label" for="staff-{!! $staff->id !!}"></label>
                                        </div></td>
                                    <td>IDCSG-{{str_pad($staff->user_id,6,0,STR_PAD_LEFT)}}</td>
                                    <td><a href="/staffs/profile/{!! $staff->user_id !!}" class="red-text">{{$staff->first_name.' '.$staff->last_name}}</a> </td>
                                    <td>{!! $staff->users->role !!}</td>
                                    <td>{!! !is_null($staff->date_of_birth)?date('d.m.Y',strtotime($staff->date_of_birth)):"" !!}</td>
                                    <td>{{$staff->address}}</td>
                                    <td><span style="text-transform: lowercase !important;"> {{$staff->users->email}}</span></td>

                                    <td>{{$staff->contact_number}}</td>
                                    <td>{{$staff->id_no}}</td>
                                    <td>{!! !is_null($staff->start_date)?date('d.m.Y',strtotime($staff->start_date)):"" !!}</td>
                                    <td>{!! !is_null($staff->end_date)?date('d.m.Y',strtotime($staff->end_date)):"" !!}</td>

                                    <td>{{$staff->users->status}}</td>

                                    <td class="actions">

@if($staff->user_id!=1)
                                        <div class="ml-3">
                                            <div class="list-icons">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                        <a href="/staffs/edit/{!! $staff->id !!}" class="dropdown-item "><i class="icon-pencil"></i> Edit</a>

                                                        <a href="/staffs/profile/{!! $staff->user_id !!}" class="dropdown-item edit" data-id="{!! $staff->user_id !!}"><i class="icon-eye"></i> Profile</a>
                                                        <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $staff->id !!}"><i class="icon-trash"></i> Delete</a>
                                                        <a href="/set/permissions/{!! $staff->user_id !!}" class="dropdown-item permissions" data-action="" data-id="{!! $staff->user_id !!}"><i class="icon-qrcode"></i> Setup Permissions</a>
                                                        @if($staff->users->status=='approved')
                                                            <li><a href="javascript:;" class="dropdown-item change-status" data-id="{!! $staff->id !!}"><i class="icon-close2"></i>Suspend</a></li>
                                                        @else
                                                            <li><a href="javascript:;" class="dropdown-item approve-account" data-id="{!! $staff->id !!}"><i class="icon-checkmark4"></i>Approve</a></li>
                                                        @endif
                                                        <div class="dropdown-divider"></div>
                                                        <li><a href="/activities/{!! $staff->user_id !!}" class="dropdown-item " data-id=""><i class="icon-checkmark4"></i>Activities</a></li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

@endif


                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="12">
                                    {{ $staffs->links() }}
                                </td>

                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>


        </div>





    </div>



    <div id="get-permissions" class="modal " style="width:800px !important;" >
        <div class="modal-content">
            <div class="row">

                 <h4 class="left">Permissions </h4>
                 <div class="col s1 right-align no-padding right">
                     <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                 </div>
             </div>
            <div id="show-permissions">
                <div class="progress"> <div class="indeterminate"></div></div>
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
    $(".approve-account").click(function(){

        var id = $(this).attr('data-id');
        var ths = $(this);




        $(".overlay").show();
        $(".overlay .progress").show();
        $(".overlay .message").hide();
        $.ajax({
            url:"/approve/account/"+id,
            success:function (response) {
                $(".overlay .progress").hide();
                $(".overlay .message").html('Staff account has been approve and credentials sent to email.');
                $(".overlay .message").show();
                setTimeout(function(){
                    $(".overlay").hide();
                },2500);


                ths.parents('tr').find('td:nth-child(11)').text('approved');
            }
        });
    });

    $("#all").change(function () {
        /* if($(this).is(":checked"))
         $(".staff-table > tbody input[type=checkbox]").attr('checked','checked');
         else
         $(".staff-table > tbody input[type=checkbox]").removeAttr('checked');*/
        $(".staff-table > tbody input[type=checkbox]").prop('checked', this.checked);
    });

    $(".permissions").click(function(){
        var id = $(this).attr('data-id');
        $("#get-permissions").modal('open');
        $.ajax({
            url:"/get/permissions/"+id,
            success:function(response){
                $("#show-permissions").html(response);
            }

        });


    });

    $(".change-status").click(function(){


        var id = $(this).attr('data-id');
        var ths = $(this);




        $(".overlay").show();
        $(".overlay .progress").show();
        $(".overlay .message").hide();
        $.ajax({
            url:"/suspend/account/"+id,
            success:function (response) {
                $(".overlay .progress").hide();
                $(".overlay .message").html('Staff account has been suspended.');
                $(".overlay .message").show();
                setTimeout(function(){
                    $(".overlay").hide();
                },2500);

                ths.parents('tr').find('td:nth-child(11)').text('suspended');
            }
        });
    });

    $(".delete").click(function(){
        var id = $(this).attr('data-id');
        var ths = $(this);

        $.ajax({
            url:"/staffs/delete/"+id,
            success:function(response){
                ths.parents('.actions').parent().remove();
            }

        });
    });
})



    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection