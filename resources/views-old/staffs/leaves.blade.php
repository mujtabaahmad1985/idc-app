@extends('layout.app')
@section('page-title') Leaves Request | Staff Management @endsection
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
            background: #f5f2f0 !important; width: 210px !important;
        }
        .dropdown-content a{color:rgba(0,0,0,0.54) !important;}
        /*.dropdown-content li{
            padding:10px !important;}*/
        .actions > a{
            padding:3px !important;}

        .leave-request-table td, .leave-request-table th{ padding: 0}


        .leave-request-table tbody p{ margin:2px 0 0 0;}
        .leave-request-table tbody .dropdown-content li{ min-height: 15px;}
        .leave-request-table tbody .dropdown-content li > a, .dropdown-content li > span{font-size: 14px;}
        .leave-request-table tbody .material-icons{ font-size: 20px}
        .leave-request-table tbody .dropdown-content li > a > i{     margin: 0 30px 0 0;}
        td, th {
            font-size: 0.8rem
        }

        label.error{
            display: none !important;}
        textarea.error{ border-bottom: 2px solid #F00;}

    </style>
    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">
            <div class="row">
                <h4 class="header col s6">Leave Requests</h4>

            </div>
            <div class="row">

                <div class="s12 m12 l12">
                    <table class="responsive-table leave-request-table" style="margin-top: 30px">
                        <thead>
                        <tr>
                            <td width="45px"><p>
                                    <input type="checkbox" class="filled-in" id="all"/>
                                    <label for="all"></label>
                                </p></td>
                           
                            <th>Staff Name</th>
                            <th> Number of Leaves </th>
                            <th>Request Date </th>
                            <th>Status</th>
                            <th>Leave Start date</th>
                            <th>Leave End Date</th>
                            <th>Approved Date</th>
                            <th>Approved By</th>


                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if(isset($leaves) && count($leaves) > 0)
                            @foreach($leaves as $leave)
                                <tr>
                                    <td><p>
                                            <input type="checkbox" class="selected_patient filled-in"
                                                   value="{!! $leave->id !!}"
                                                   id="staff{!! $leave->id !!}"/>
                                            <label for="staff{!! $leave->id !!}"></label>
                                        </p></td>
                                   
                                    <td><a href="/staffs/profile/{!! $leave->user_id !!}" class="red-text">{{$leave->users->staffs->first_name.' '.$leave->users->staffs->last_name}}</a> </td>
                                    <td>{!! $leave->number_of_leave !!}</td>
                                    <td>{{ date('d.m.Y',strtotime($leave->created_at)) }}</td>
                                    <td> {{$leave->status}}</td>
                                    <td>{!! !is_null($leave->leave_start_date)?date('d.m.Y',strtotime($leave->leave_start_date)):"" !!}</td>
                                    <td>{!! !is_null($leave->leave_end_date)?date('d.m.Y',strtotime($leave->leave_end_date)):date('d.m.Y',strtotime($leave->leave_start_date)) !!}</td>
                                    <td>{{!is_null($leave->approved_date)?date('d.m.Y',strtotime($leave->approved_date)):""}}</td>
                                    <td>{{$leave->approved_by}}</td>



                                    <td class="actions">

                                        <div class="btn-group">

                                            <ul id='dropdown{!! $leave->id !!}' class='dropdown-content'>
                                                <li><a href="#!" class="status" data-action="approve" data-id="{!! $leave->id !!}"><i class="material-icons">assignment_ind</i>Approve</a></li>
                                                <li><a href="javascript:;" class="status" data-action="rejected" data-id="{!! $leave->id !!}"><i class="material-icons">delete</i>Reject</a></li>

                                            </ul>
                                        </div>


                                        <a class=" dropdown-button waves-effect waves-light" href="#!" data-activates="dropdown{!! $leave->id !!}"><i class="material-icons">more_vert</i></a>


                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="9">
                                    {{ $leaves->links() }}
                                </td>

                            </tr>
                            <tr>
                                <td colspan="3">

                                </td>
                                <td colspan="6"></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end container-->
        <style>
            .modal{ width: 48%;}
            .picker__holder{overflow: hidden; background: none}
        </style>

    </section>

    <div id="leave-status" class="modal " style="width:400px !important; min-height: 240px !important;" >
        <div class="modal-content">
            <div class="row">

                 <h4 class="left">Reason of Rejection </h4>
                 <div class="col s1 right-align no-padding right">
                     <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                 </div>
             </div>
            <div >
                <form id="reason-form" action="/leave/status/update" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="leave_id" />
                    <input type="hidden" name="status" value="rejected" />
                    {!! csrf_field() !!}

                    <div class="row">
                        <div class="input-field col s12">

                            <textarea id="reason_of_rejection" name="reason_of_rejection" required  class="materialize-textarea" length="120"></textarea>
                            <label for="reason_of_rejection" class="">Reason of rejection </label>

                        </div>
                    </div>
                    <a href="#!" class="update-status red right white-text" style="padding: 5px 20px"> Update</a>
                    <div class="row">
                        <div class="col s12">
                            <div class="card green message success-message" style="display: none;">
                                <div class="card-content white-text">
                                    <p>d</p>
                                </div>
                            </div>
                            <div class="card red message error-message"  style="display: none;">
                                <div class="card-content white-text">
                                    <p>d</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>

        </div>

    </div>
@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    <script>

$(function(){
    var update_row;

    $(".update-status").click(function () {

        if($("#reason-form").valid()){
            $(".overlay").show();
            $(".overlay .progress").show();
            $(".overlay .message").hide();

            $("#reason-form").ajaxForm(function (response) {
                $(".overlay .progress").hide();
                $(".overlay .message").html('Leave is rejected successfully.');
                $(".overlay .message").show();
                setTimeout(function(){
                    $(".overlay").hide();
                    $("#leave-status").modal('close');
                },2500);


                update_row.parents('tr').find('td:nth-child(5)').text('Rejected');
            }).submit()
        }

    });

    $(".status").click(function(){

        var id = $(this).attr('data-id');
        var action = $(this).attr('data-action');
        var ths = $(this);
        update_row = ths;






        if(action=="approve"){

            $(".overlay").show();
            $(".overlay .progress").show();
            $(".overlay .message").hide();

            $.ajax({
                url:"/leave/status/update",
                type:"POST",
                data:{id:id,status:"approved","_token":"{!! csrf_token() !!}"},
                success:function (response) {
                    $(".overlay .progress").hide();
                    $(".overlay .message").html('Leave is approved successfully.');
                    $(".overlay .message").show();
                    setTimeout(function(){
                        $(".overlay").hide();
                    },2500);


                    ths.parents('tr').find('td:nth-child(5)').text('approved');
                }
            });
        }

        if(action=="rejected"){
            $("#leave_id").val(id);
            $("#leave-status").modal('open');
        }


    });

    $("#all").change(function () {
        /* if($(this).is(":checked"))
         $(".leave-request-table > tbody input[type=checkbox]").attr('checked','checked');
         else
         $(".leave-request-table > tbody input[type=checkbox]").removeAttr('checked');*/
        $(".leave-request-table > tbody input[type=checkbox]").prop('checked', this.checked);
    });




})



    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection