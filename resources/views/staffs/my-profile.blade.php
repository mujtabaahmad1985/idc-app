@extends('layout.app')
@section('page-title') {!! $staff->salutation !!} {!! $staff->first_name !!} {!! $staff->last_name !!} @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/material/css/file-explore.css') !!}
@endsection

@section('content')
    <style type="text/css">
        .input-field div.error {
            position: relative;
            top: -1rem;
            left: 0rem;
            font-size: 0.8rem;
            color: #FF0000;
            -webkit-transform: translateY(0%);
            -ms-transform: translateY(0%);
            -o-transform: translateY(0%);
            transform: translateY(0%);
        }

        .input-field label.active {
            width: 100%;
        }

        .card-panel:last-child {

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
        .left-alert textarea.materialize-textarea + label:after {
            left: 0px;
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
        .right-alert textarea.materialize-textarea + label:after {
            right: 70px;
        }

        .dropdown-content {
            background: #f5f2f0 !important;
            width: 100% !important;
        }

        .dropdown-content a {
            color: rgba(0, 0, 0, 0.54) !important;
        }

        .dropdown-content li {
            padding: 10px !important;
        }

        .mandatory {
            color: #e32;
            content: ' *' !important;
            display: inline;
        }

        textarea.materialize-textarea {
            padding: 0;
        }

        .input-field {
            margin-top: 0.7rem;
        }

        .input-field input[type=text], .input-field input[type=email] {
            height: 2rem;
        }

        .input-field.col label, .select-wrapper input.select-dropdown {
            font-size: 0.8rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            font-size: 0.8rem
        }

        .select2 {
            width: 80% !important;

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

        .collection {
            border: none
        }

        .collection .small {
            font-size: 0.8rem
        }

        .phone, .new-phone {
            position: relative
        }

        .add-button, .remove-button {
            position: absolute;
            right: 0;
            background: none;
            border: none;
            top: 6px;
            background-color: #FFF !important;

        }

        .remove-file {

            background: none;
            border: none;
            top: 6px;
            background-color: #FFF !important;
        }

        .patient-picture{ width: 80px; border-radius: 50%; height: 80px; background: url("/public/img/medium-default-avatar.png") no-repeat; background-position: center; background-size: cover; margin: auto}
        .patient-info .card-title{ margin-top: 10px;}
        .patient-info .card-title:after{
            content: "";
            display: block;
            width: 30px;
            height: 1px;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 10px;
            background-color: #FFF;}
        .m-right-5{ margin-right: 5px;}
        .m-right-10{ margin-right: 10px;}
        .illness{ margin-left:40px;}
        .illness li:before{ content: '-'; padding-right: 5px;}

        .appointment-info{
            padding: 5px 10px;
            font-size: 1.0rem;
        }
        .appointment-info li{ display: inline-block; width: 100%}
        .appointment-info .appointment-booking-date{ font-size: 1.0rem;}
        .appointment-info .appointment-time-slots{ font-size: 0.8rem;}
        .appointment-info i{
            font-size: 1.5rem;
            position: relative;
            top: -3px;
        }
        .appointment-info .s10{ margin-left: 10px}
        #profile-page-wall .tab-profile .tab i {

            position: relative;
            top: 3px;
            margin-right: 5px;
        }
        .collapsible-header{
            background: #d32f2f;
            color: #FFF;
        }
        ul.tab-profile{ padding:0}
        ul.tab-profile li.selected{ background: #d32f2f}
        .staff-info li i{
            position: relative;
            top:5px; margin-right: 30px}
        .staff-info{ margin: 0}
        .staff-info li{ padding: 5px 0}

       .staff-detail button{     display: inline-block;
            font-size: 12px;
            background: #F44336;
            border: none;
            padding: 5px 10px;
            color: #FFF;
            margin-left: 5px;}
        .staff-detail button > i{
            position: relative;
            font-size: 16px;
            top: 3px;
            left: -4px;
        }
        .staff-nav .dropdown-content{     width: 250px !important;
            left: inherit !important;
            right: 37px;}
        .staff-nav .dropdown-content i{ font-size: 1rem; margin: 0 !important; position: relative;top: 2px;}
        .staff-nav .dropdown-content li a{ padding: 5px; font-size: 14px;}
        .tab a.active{ font-weight: bold}
       #update-staff-form input[type=text]{
           width: 80% !important;
           height: 1rem;
           padding: 5px 0;
       }
        .tabs .indicator{
            display: none;}
        .card{ margin-top: 0px !important;}
        .vertical-tab { display: none}
        .vertical-tab.active{ display: block}
        .vertical-tab-items{ padding: 0; margin: 0}
        .vertical-tab-items li{ padding: 10px 15px}
        .vertical-tab-items li a{ color:#FFF;}
        .vertical-tab-items li.active a,.vertical-tab-items li:hover a{  color: #FFF}
        .tab-items{ padding: 0 !important;}
        .vertical-tab-items li.active,.vertical-tab-items li:hover{ background: #b71c1c ; }



        .vertical-tab-items i{     position: relative;
            top: 6px;
            margin-right: 11px;}
        .file-list .folder-root a{ text-transform: none}
        tr.table-header{ font-size: 14px}
        label.badge{ padding: 3px;}
        #payment-information table td{ padding: 5px;}
        .month-wise{    background-color: rgba(0,0,0,.015); font-weight: 500}
        #leave-information h3{ font-size: 18px; font-weight: 500; margin: 5px 0}
        #leave-information h4{margin: 0}
        #leave-information p{ margin: 5px 0}


    </style>
    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">

            <div class="row">



                <div class="col s12 m12 l8  text-center">
                    <div class="card red center">
                        <div class="card-content white-text">
                            <div class="row top-nav staff-nav">



                                <div class="col s1 right"><a class="dropdown-button white-text" href="#" data-activates="dropdown1"><i class="material-icons">more_vert</i></a><ul id="dropdown1" class="dropdown-content" style="width: 24px; opacity: 1; left: 210.5px; position: absolute; top: 26px; display: none;">

                                        <li><a href="#!" class="change-password" data-action="change-password"><i class="material-icons">lock</i> &nbsp; Change Password</a></li>


                                    </ul>


                                </div>



                            </div>
                    <div class="patient-picture"></div>
                    <span class="card-title">{!! $staff->salutation !!} {!! $staff->first_name !!} {!! $staff->last_name !!}<br>

                    </span>

                </div>
            </div>
                </div>
            </div>

            <div class="row">



                <div class="vertical-tab active" data-tab="personal">
                    <div class="col s12 m12 l8 ">

                        <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
                            <li class="tab"><a class="active" href="#personal-information">Staff Biodata</a></li>
                            <li class="tab"><a  href="#update-information">Update Data</a></li>
                            <li class="tab revised-information"  data-id="{!! Auth::id() !!}" ><a href="#revised-information">Revised Data</a></li>
                        </ul>
                        <div class="card-panel">
                            <div id="personal-information">
                                <ul class="staff-info">
                                    <li title="Staff name"><i class="material-icons">account_box</i> {!! $staff->salutation !!} {!! $staff->first_name !!} {!! $staff->last_name !!}</li>

                                    <li  title="ID No."><i class="material-icons">local_offer</i> {!! $staff->id_no !!} </li>

                                    @if(!empty($staff->date_of_birth))  <li title="Date of birth">
                                        <i class="material-icons">cake</i> {!! date('d.M.Y', strtotime($staff->date_of_birth)) !!}

                                    </li>@endif
                                    <li style="text-transform: none" >
                                        <i class="material-icons">email</i> <a href="mailto:{!! $staff->email !!}">{!! $staff->email !!}</a>

                                    </li>
                                    @if(!empty($staff->contact_number)) <li title="Phone No.">

                                        <i class="material-icons">call</i>{!! $staff->contact_number !!}

                                    </li> @endif
                                    @if(!empty($staff->city))
                                        <li title="City, Zipcode">

                                            <i class="material-icons">location_on</i>{!! $staff->zipcode !!} {!! $staff->city !!}, {!! $staff->nationality !!}

                                        </li>@endif

                                    @if(!empty($staff->gender))
                                        <li title="Gender">

                                            <i class="material-icons">wc</i>{!! $staff->gender !!}

                                        </li>@endif


                                    @if(!empty($staff->designation))
                                        <li title="Occupation">

                                            <i class="material-icons">work</i>{!! $staff->designation !!}

                                        </li>@endif

                                    @if(!empty($staff->start_date))
                                        <li title="Start Date and End Date">

                                            <i class="material-icons">date_range</i>{!! date('d.m.Y',strtotime($staff->start_date)) !!}  @if(!empty($staff->end_date)) <strong>-</strong>  {!! date('d.m.Y',strtotime($staff->end_date)) !!}  @endif

                                        </li>@endif
                                    <li title="Status">

                                        <i class="material-icons">notifications</i>{!! $staff->users->status !!}

                                    </li>
                                </ul>
                            </div>
                            <div id="update-information">
                                <form id="update-staff-form" action="/update/staff" enctype="multipart/form-data" method="post">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="id" value="{!! $staff->id !!}" />
                                    <ul class="staff-info">
                                        <li title="Staff name"><i class="material-icons">account_box</i> <input type="text" value="{!! $staff->salutation !!}" name="salutation" placeholder="Mr , Mrs" /></li>
                                        <li title="Staff name"><i class="material-icons">account_box</i> <input type="text" value="{!! $staff->first_name !!}" name="first_name" placeholder="e.g John" /></li>
                                        <li title="Staff name"><i class="material-icons">account_box</i> <input type="text" value="{!! $staff->last_name !!}" name="last_name" placeholder="e.g. Doe" /></li>


                                        <li  title="ID No."><i class="material-icons">local_offer</i> <input type="text" value="{!! $staff->id_no !!}" name="id_no" placeholder="e.g. 12345678" /> </li>

                                        <li title="Date of birth">
                                            <i class="material-icons">cake</i> <input type="text" id="date_of_birth" name="date_of_birth" placeholder="e.g. 10.12.1990" autocomplete="off" value="@if(!empty($staff->date_of_birth)) {!! date('d.m.Y', strtotime($staff->date_of_birth)) !!}@endif" class="datetimepicker" />

                                        </li>
                                        <li style="text-transform: none" >
                                            <i class="material-icons">email</i> <input type="text"  autocomplete="off" style="text-transform: none" value="{!! $staff->email !!}" placeholder="e.g test@example.com" name="email" />

                                        </li>
                                        <li title="Phone No.">

                                            <i class="material-icons">call</i> <input type="text" autocomplete="off"  value="{!! $staff->contact_number !!}" placeholder="e.g +65123456789" name="contact_number" />

                                        </li>

                                        <li title="Zipcode">

                                            <i class="material-icons">location_on</i> <input type="text" autocomplete="off"  value="{!! $staff->zip_code !!}" placeholder="Zipcode e.g. AB0923" name="zipcode" />

                                        </li>



                                        <li title="City">

                                            <i class="material-icons">location_on</i> <input type="text" autocomplete="off"  value="{!! $staff->city !!}" placeholder="City e.g. Signapore" name="city" />

                                        </li>


                                        <li title="Nationality">

                                            <i class="material-icons">location_on</i> <input type="text" autocomplete="off"  value="{!! $staff->nationality !!}"  placeholder="Nationality e.g. Signapore"  name="nationality" />
                                        </li>







                                        <li title="Address">

                                            <i class="material-icons">location_on</i> <input type="text" autocomplete="off"  value="{!! $staff->address !!}" placeholder="Address" name="address" />
                                        </li>



                                        <li title="Gender">

                                            <i class="material-icons">wc</i>  <select name="gender" id="gender">
                                                <option value="Male" @if($staff->gender=="Male") selected @endif>Male</option>
                                                <option value="Female" @if($staff->gender=="Female") selected @endif>Female</option>
                                            </select>

                                        </li>



                                        <li title="Occupation">

                                            <i class="material-icons">work</i> <input type="text" autocomplete="off" name="designation" placeholder="e.g. Doctor, Software Engineer" value="{!! $staff->designation !!}" />

                                        </li>


                                        <li title="Start Date and End Date">

                                            <i class="material-icons">date_range</i>  <input type="text" autocomplete="off" placeholder="Start Date e.g. 10.12.2015" name="start_date" value="@if(!empty($staff->start_date)) {!! date('d.m.Y', strtotime($staff->start_date)) !!} @endif" class="datetimepicker" />
                                        </li>



                                        <li title="Start Date and End Date">

                                            <i class="material-icons">date_range</i> <input type="text" autocomplete="off"  placeholder="End Date e.g. 10.12.2015"  name="end_date" value="@if(!empty($staff->end_date)) {!! date('d.m.Y', strtotime($staff->end_date)) !!} @endif" class="datetimepicker" />
                                        </li>

                                        <li class="center">
                                            <button class="btn red white-text update-staff-button">Update</button>
                                        </li>

                                    </ul>

                                </form>
                            </div>
                            <div id="revised-information">

                            </div>




                        </div>
                    </div>
                </div>


            </div>


        </div>



        <!--end container-->


    </section>

    <div id="get-revised-data-by-id" class="modal " style="width:400px !important;" >
        <div class="modal-content">
            <div class="row">

                <h4 class="left">Revised Data </h4>
                <div class="col s1 right-align no-padding right">
                    <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                </div>
            </div>
            <div id="show-revised-data">
                <div class="progress"> <div class="indeterminate"></div></div>
            </div>

        </div>

    </div>
@endsection


@section('js')

    {!! Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek') !!}
    {!! Html::script('/public/material/js/file-explore.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}

    <script>


$(function(){
    $(".file-tree").filetree();

    $(".revised-information").click(function(){

        var id = $(this).attr('data-id');
        $(".overlay").show();
        $(".overlay .progress").show();
        $(".overlay .message").hide();
        $.ajax({
            url:"/get/revised-data/"+id,
            success:function(response){
                $(".overlay .progress").hide();
                $(".overlay").hide();
                $("#revised-information").html(response);
            }
        });

    });

    $(".update-staff-button").click(function(e){
        $(".overlay").show();
        $(".overlay .progress").show();
        $(".overlay .message").hide();
        if($("#update-staff-form").valid()){
            $("#update-staff-form").ajaxForm(function(response){
                $(".overlay .progress").hide();
                $(".overlay .message").show();

                setTimeout(function(){
                    $(".overlay").hide();
                },2000);
            }).submit();
        }

        e.preventDefault();
    });

    $("input[name=start_date]").datepicker({ dateFormat: 'dd.mm.yy',

        changeMonth: true,
        changeYear: true,
        yearRange: '-100:+0',
        onSelect: function(dateText, inst){
            $("input[name=end_date]").datepicker("option","minDate",
                $("input[name=start_date]").datepicker("getDate"));
        }
    });
    $("input[name=end_date]").datepicker({ dateFormat: 'dd.mm.yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '-100:+0',
    });
    $("input[name=date_of_birth]").datepicker({ dateFormat: 'dd.mm.yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '-100:+0',
    });

    $("#gender").material_select('destroy');
    $("#gender").select2();

    $(".vertical-tab-items li").click(function(){
        $(".vertical-tab-items li").removeClass('active');
        var tab = $(this).find('a').attr('data-item');
        $(this).addClass('active');
        $(".vertical-tab").hide();
        $(".vertical-tab[data-tab="+tab+"]").show();



    });

    $(".delete").click(function(){
        var id = $(this).attr('data-id');
        var ths = $(this);

        $.ajax({
            url:"/staffs/delete/"+id,
            success:function(response){
                window.location="/staffs"
            }

        });
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
})


    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection