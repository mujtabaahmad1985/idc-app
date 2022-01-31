@extends('layout.app')
@section('page-title') Staff Management | My Leave @endsection
@section('css')
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
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

        .staff-table td, .staff-table th{ padding: 0}


        .staff-table tbody p{ margin:2px 0 0 0;}
        .staff-table tbody .dropdown-content li{ min-height: 15px;}
        .staff-table tbody .dropdown-content li > a, .dropdown-content li > span{font-size: 14px;}
        .staff-table tbody .material-icons{ font-size: 20px}
        .staff-table tbody .dropdown-content li > a > i{     margin: 0 30px 0 0;}
        td, th {
            font-size: 0.8rem
        }
        .btn i{ position: relative;
            top:5px;}
        .btn{ line-height: 30px}
        label.error{ color: #F00;
            top:20px;}
        #add-new-leave.modal .modal-content{ overflow: hidden !important;}
        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            font-size: 0.8rem
        }

        .select2 {
            width: 91% !important;
            float: right;
            margin-bottom: 30px;
            font-size: 0.8rem;
        }
        .select2-container .select2-selection--single .select2-selection__rendered{ padding-left: 0}

        .select2-container--default .select2-search--dropdown .select2-search__field {
            height: 30px !important
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #000 transparent transparent transparent;
        }

        .select2-search.select2-search--dropdown {
            width: 100%;
        }

        .select2-container--default .select2-selection {
            border: none;
            border-bottom: 1px solid #000;
            border-radius: 0
        }

        .select-wrapper input.select-dropdown {
            font-size: 0.8rem;
            height: 2rem;
            line-height: 2rem
        }
        .reason-of-leave{ padding: 5px; background: #F00; color: #FFF}

    </style>
    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">
            <div class="row">
                <h4 class="header col s6">My Leave</h4>
                <div class="col s6 right-align" style="margin-top:20px">
                    <a href="#!" class="waves-effect waves-light  btn red m-10 add-new-leave"><i class="material-icons">add</i> Add New Leave</a>
                </div>
            </div>
            <div class="row">

                <div class="s12 m12 l12">
                    <div class="card-panel">
                        <div id="leave-information">
                            <div class="row">
                                <div class="col s3">
                                    <div class="card-panel red white-text center" style="padding: 10px">
                                        <h3>Sick Leave</h3>
                                        <h4 class="white black-text sick-leave">{!! $sick_leave !!}</h4>
                                        <p class="white-text">available of <strong>5</strong> </p>
                                    </div>
                                </div>
                                <div class="col s3">
                                    <div class="card-panel red white-text center" style="padding: 10px">
                                        <h3>Vacations</h3>
                                        <h4 class="white black-text vacations">{!! $vacations !!}</h4>
                                        <p class="white-text">available of <strong>5</strong> </p>
                                    </div>
                                </div>
                                <div class="col s3">
                                    <div class="card-panel red white-text center" style="padding: 10px">
                                        <h3>Emergency</h3>
                                        <h4 class="white black-text emergancy">{!! $emergancy !!}</h4>
                                        <p class="white-text">available of <strong>5</strong> </p>
                                    </div>
                                </div>
                                <div class="col s3">
                                    <div class="card-panel red white-text center" style="padding: 10px">
                                        <h3>Unpaid</h3>
                                        <h4 class="white black-text un-paid">{!! $un_paid !!}</h4>
                                        <p class="white-text">available of <strong>5</strong> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="invoicing striped">
                                        <thead>
                                        <tr>
                                            <th colspan="5">Leave History<br /><hr /></th>
                                        </tr>
                                        <tr class="table-header">
                                            <th  width="16%">Date of Leave</th>

                                            <th width="16%">Unpaid</th>
                                            <th  width="16%" >Sick</th>
                                            <th  width="16%">Vecation</th>
                                            <th  width="16%" >Emergancy</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="5" class="month-wise"><strong>September 2018</strong></td>
                                        </tr>
                                        @if(isset($leaves))
                                        @foreach($leaves as $leave)
                                            <tr>
                                                <td>{!! date('d.m.Y', strtotime($leave->leave_start_date)) !!}</td>


                                                <td>{!! $leave->leave_type=='un-paid'?'<a href="#!" class="reason-of-leave">'.$leave->number_of_leave.'</a>':0 !!}</td>
                                                <td>{!! $leave->leave_type=='sick-leave'?'<a href="#!" class="reason-of-leave">'.$leave->number_of_leave.'</a>':0 !!}</td>
                                                <td>{!! $leave->leave_type=='vacations'?'<a href="#!" class="reason-of-leave">'.$leave->number_of_leave.'</a>':0 !!}</td>
                                                <td>{!! $leave->leave_type=='emergancy'?'<a href="#!" class="reason-of-leave">'.$leave->number_of_leave.'</a>':0 !!}</td>

                                            </tr>
                                        @endforeach
                                        @endif


                                        <tr>

                                            <td colspan="3"></td>
                                            <td colspan="2">
                                                <select id="leave-months">
                                                    <option value="">This Month</option>
                                                    <option value="">Last Month</option>
                                                    <option value="">Last 3 Months</option>
                                                    <option value="">Last 6 Months</option>
                                                    <option value="">Last 12 Months</option>
                                                </select> </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>





                    </div>

                </div>
            </div>
        </div>
        <!--end container-->
        <style>
            .modal{ width: 48%;}
            .picker__holder{overflow: hidden; background: none}
        </style>

    </section>

    <div id="add-new-leave" class="modal z-depth-1" style="width: 450px !important; min-height: 130px !important;">
        <div class="modal-content">
            <div class="row">

                <h4 class="left">New Leave</h4>
                <div class="col s1 right-align no-padding right">
                    <a href="#!" class="modal-action modal-close close-media"><i class="material-icons">close</i></a>
                </div>
            </div>
            <form id="leave-form" action="/add/new/leave" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="hidden" name="user_id" value="{!! Auth::id() !!}" />

            <div class="row">
                <div class="col s12">

                        <i class="material-icons prefix"></i>
                        <div class="switch">
                            <label>
                                Single Day
                                <input type="checkbox" id="is-multiple-days">
                                <span class="lever"></span>
                                Multiple Days
                            </label>
                        </div>

<hr />

                        <div class="input-field m-top-25">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" autocomplete="off" name="leave_start_date" id="leave_start_date" required />
                            <label for="leave_start_date">Leave Start Date</label>
                        </div>
                    <div class="leave-date-range" style="display: none;">
                        <div class="input-field">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" autocomplete="off" name="leave_end_date" id="leave_end_date" />
                            <label for="leave_end_date">Leave End Date</label>
                        </div>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">forward_5</i>
                        <input type="text" name="number_of_leave" id="number_of_leave" value="1" readonly="" />
                        <label for="number_of_leave">Number of leave</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">layers</i>
                        <select name="leave_type">
                            <option value="">Choose leave type</option>
                            <option value="sick-leave">Sick Leave</option>
                            <option value="emergancy">Emergancy</option>
                            <option value="vacations">Vacations</option>
                            <option value="un-paid">Un-paid</option>
                        </select>
                    </div>
<div style="clear: both"></div>
                    <div class="input-field">
                        <i class="material-icons prefix">comments</i>
                        <textarea class="materialize-textarea" name="reason_of_leave" id="reason_of_leave"></textarea>
                        <label for="reason_of_leave">Reason of Leave</label>
                    </div>




                    <a href="#!" class="submit-new-leave red right white-text" style="padding: 5px 20px"><i class="material-icons" style="position: relative; top: 5px;  margin-right: 8px; line-height: 15px;">add</i> Submit Leave</a>
                    <div style="clear:both"></div>
                    <div class="row m-top-10">
                        <div class="col s12">
                            <div class="card green message success-message" style="display: none;">
                                <div class="card-content white-text">
                                    <p></p>
                                </div>
                            </div>
                            <div class="card red message error-message"  style="display: none;">
                                <div class="card-content white-text">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
<script>
    $(function(){
        var maximum_number_leaves = 5;

        $("select").material_select('destroy');
        $("select").select2({dropdownAutoWidth : 'true'});

        $( "#leave_start_date" ).datepicker({ dateFormat: 'dd.mm.yy',
            minDate:'NOW',
            onSelect: function(dateText, inst){
                $( "#leave_start_date" ).focusin();
                $("#leave_end_date").datepicker("option","minDate",
                    $("#leave_start_date").datepicker("getDate"));
            }
        });

        $("#leave_end_date").datepicker({ dateFormat: 'dd.mm.yy',
            onSelect: function(dateText, inst){
                $( "#leave_end_date" ).focusin();
               var start_date =  $("#leave_start_date").datepicker("getDate");
                var end_date =  $("#leave_end_date").datepicker("getDate");

                var days = datediff(start_date,end_date);
                days = days+1;

                if(days > maximum_number_leaves){
                    $(".error-message").html('Maximum number of leaves are '+maximum_number_leaves);
                    $(".error-message").show();
                    $(".submit-new-leave").hide();
                }else{
                    $(".error-message").html('');
                    $(".error-message").hide();
                    $(".submit-new-leave").show();
                }

                $("#number_of_leave").val(days);

            }
        });

        $("#is-multiple-days").change(function () {
            if($(this).is(":checked")){
                $(".leave-date-range").show();
                $("#leave_end_date").attr('required','required');
            }else{
                $(".leave-date-range").hide();
                $("#leave_end_date").removeAttr('required');
            }
        });

        $(".add-new-leave").click(function(){
            $(".message").hide();
            $("#leave-form").resetForm();
            $("#add-new-leave").modal('open');
        });

        $(".submit-new-leave").click(function(e){
            $(".message").hide();
            if($("#leave-form").valid()){

                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();

                $("#leave-form").ajaxForm(function(response){
                   response = $.parseJSON(response);
                    $(".overlay .progress").hide();
                    $(".overlay .message").show();
                    $(".overlay").hide();
                   if(response.type == 'success'){
                       $(".success-message p").html(response.message);
                        $(".success-message").show();
                        $("h4."+response.data.leave_type).html(response.data.remaining_leave);
                        /*if(response.leave_type=='sick-leave')
                        $("h4.sick-leave").html(response.remaining_leave);

                       if(response.leave_type=='emergancy')
                           $("h4.emergancy").html(response.remaining_leave);

                       if(response.leave_type=='un-paid')
                           $("h4.un-paid").html(response.remaining_leave);

                       if(response.leave_type=='vacations')
                           $("h4.vacations").html(response.remaining_leave);*/


                       setTimeout(function(){
                           $("#add-new-leave").modal('close');

                       },2000);
                   }else{
                       $(".error-message").html(response.message);
                       $(".error-message").show();
                   }
                }).submit();
            }
            e.preventDefault();

        });
    })

    function parseDate(str) {

    }

    function datediff(date1, date2) {
        // Take the difference between the dates and divide by milliseconds per day.
        // Round to nearest whole number to deal with DST.
        var ONEDAY = 1000 * 60 * 60 * 24;
        // Convert both dates to milliseconds
        var date1_ms = date1.getTime();
        var date2_ms = date2.getTime();
        // Calculate the difference in milliseconds
        var difference_ms = Math.abs(date1_ms - date2_ms);

        // Convert back to days and return
        return Math.round(difference_ms/ONEDAY);
    }
</script>

    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection