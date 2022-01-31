@extends('layout.app')
@section('page-title') View Patient @endsection
@section('css')
    {!! Html::style('/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('/material/css/file-explore.css') !!}
    {!! Html::style('/css/croppie.css') !!}
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
            padding: 0; font-size: 12px; margin-top: 5px;
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
            width: 100% !important;
            top: 0px;
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
            border-bottom: 1px solid #9e9e9e;
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
            right: 10px;
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

        ul.tab-profile{ padding:0}
        ul.tab-profile li.selected{ background: #d32f2f}
        .patient-info li i{
            position: relative;
            top:5px; margin-right: 30px}
        .patient-info{ margin: 0}
        .patient-info li{padding: 0;
            font-size: 12px;}

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
        #update-patient-form input[type=text]{

            height: 1rem;
            padding: 5px 0;
        }
        .datetimepicker{ width: inherit !important;}
        .tabs .indicator{
            display: none;}
        .card{ margin-top: 0px !important;}
        .vertical-tab { display: none}
        .vertical-tab.active{ display: block}
        .vertical-tab-items{ padding: 0; margin: 0; height: 40px}
        .vertical-tab-items li{ padding: 10px 15px; display: inline;    font-size: 12px;}
        /* .vertical-tab-items li a{ color:#FFF;}*/
        /*.vertical-tab-items li.active a,.vertical-tab-items li:hover a{  color: #FFF}*/
        .tab-items{ padding: 0 !important;}
      /*  .vertical-tab-items li.active,.vertical-tab-items li:hover{ border-bottom:2px solid #b71c1c ; }*/



        .vertical-tab-items i{     position: relative;
            top: 6px;
            margin-right: 11px;}
        .file-list .folder-root a{ text-transform: none}
        tr.table-header{ font-size: 14px}
        div.badge{ padding: 3px; font-size: 12px; width: 80px;}
        #payment-information table td{ padding: 5px;}
        .month-wise{    background-color: rgba(0,0,0,.015); font-weight: 500}
        #leave-information h3{ font-size: 18px; font-weight: 500; margin: 5px 0}
        #leave-information h4{margin: 0}
        #leave-information p{ margin: 5px 0}
        *::placeholder{text-transform: none !important;}
        .card {
            overflow: inherit !important;
        }
        /*.input-field.col.s4 .select2{ width:85% !important;left: 15px;}*/
        /*.input-field.col.s3 .select2{ width: 85% !important;}*/
        #update-information input[type=text]{ margin: 0 !important;
            height:inherit !important; font-size: 12px;padding:5px 0}
        /*.phone     .input-field.col.s4 .select2{ width:85% !important;left: 5px !important;}*/
        span.badge{ margin-left: 0; float: none}
        .card-image .image-overlay{
            position: absolute;
            background-color: rgba(0,0,0,0.7);
            left: 0;
            right: 0;
            height: 75px;
            bottom: 0;
            display: none;
            padding-top: 4px;
            line-height: 13px;
            font-size: 12px;
            text-align: center;
        }
        .card-image:hover .image-overlay{ display: block}
        .card.horizontal .card-image img{ width: 88px}
        .card.horizontal .card-content{ padding: 10px 24px}
        .card.horizontal h5{ margin: 0}
        .card.horizontal .card-content p{ margin-top: 5px; font-size: 12px;}
        .card.horizontal h5{ font-size:20px}
        .card-panel{ padding: 10px; font-size: 12px}

        .vertical-tab .tabs{
            height:33px;}
        .vertical-tab .tabs .tab {

            line-height: 33px;
            height: 31px;}

        .single-col{ width: 502px !important;}
        .two-col{ width:239px !important;}
        .one-two-three{ width: 305px !important;}
        .three-line{ width: 160px !important;}
        #update-patient-form .col i{ margin-right: 10px}
        #leave-information .card-panel{ width: 100% !important;}

        @media screen and  (max-width:1920px) {
            .box-content{ width: 629px}
            .profile-content{ width: 50%}
        }

        @media screen and  (max-width:1680px) {
            .box-content{ width: 629px}
        }

        @media screen and  (max-width:1600px) {
            .profile-content{ width:70%}
            .box-content{ width: 629px}
        }

        @media screen and  (max-width:1440px) {
            .profile-content{ width: 100%}
            .box-content{ width: 629px}
        }
        @media screen and  (max-width:1366px) {
            .box-content{ width: 629px}
        }
        @media screen and  (max-width:1280px) {
            .box-content{ width: 629px}
        }
        .card.horizontal{ width: 100%}
        .card.error-message .card-content, .card.success-message .card-content{ padding: 5px !important;}
        .card.message{ margin-top: 5px !important;}
        label.error{
            color: red;
            position: absolute;
            top: 20px;
        }
        h5 {
            font-size: 14px;
            line-height: 110%;
            margin: .82rem 0 .656rem 0;
            font-weight: bold;
        }

        /*
        TABS
        */
        .vertical-tab-items>li.active>a, .vertical-tab-items>li.active>a:hover, .vertical-tab-items>li.active>a:focus {
            color: #555;
            cursor: default;
            background-color: #fff;
            border: 1px solid #ddd;
            border-bottom-color: transparent;
        }
        .vertical-tab-items>li>a {
            margin-right: 2px;
            line-height: 1.42857143;
            border: 1px solid transparent;
            border-radius: 4px 4px 0 0;
        }
        .vertical-tab-items>li>a {
            position: relative;
            display: inline-block;
            padding: 4px 15px;
        }

    </style>
    <!-- START CONTENT -->
    <section id="content">

        <!--start container-->
        <div class="container patient-profile" id="patient-profile">
            <div class="profile-content">


                <div class="row">

                    <div class="">

                        <div class="card horizontal">
                            <div class="card-image">
                                @if(!empty($patient->profile_picture))
                                    <img id="uploadedimage" src="{!! Storage::disk('images')->url($patient->profile_picture) !!}">
                                @else
                                    <img id="uploadedimage" src="{!! url('/').'/img/no-user-image.gif' !!}">
                                @endif
                                <div class="image-overlay">
                                    <a href="#!" class="white-text change-profile-picture">
                                        <i class="material-icons">camera_alt</i>
                                    </a>

                                    <input type="hidden" name="staff_id" value="{!! $patient->id !!}" />
                                    <input style="display: none;" type="file" name="profile_picture" id="profile_picture"/>

                                </div>
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                    <div class="row top-nav staff-nav">


                                        <div class="col s11 left"><h5>{!! $patient->salutation !!} {!! $patient->first_name !!} {!! $patient->last_name !!}</h5>
                                            <p>{!! $patient->patient_unique_id !!}</p>
                                            <p>{!! date('d.m.Y', strtotime($patient->date_of_birth)) !!}</p>



                                        </div>

                                            <div class="col s1 right m-top-5"><a class="dropdown-button red-text" href="#" data-activates="dropdown1"><i class="material-icons">more_vert</i></a><ul id="dropdown1" class="dropdown-content" style="width: 24px; opacity: 1; left: 210.5px; position: absolute; top: 26px; display: none;">
                                                    {{--<li><a href="/staffs/edit/{!! $patient->id !!}"><i class="material-icons">border_color</i> &nbsp; Edit</a></li>--}}
                                                    <li>  <a href="/patient/list" ><i class="material-icons">arrow_back</i> &nbsp; Go Back To Patient List </a></li>

                                                    {{--@if(Auth::user()->role=='administrator')
                                                        <li>  <a href="#!" class="permissions" data-id="{!! $patient->id !!}" ><i class="material-icons">playlist_add</i> &nbsp; Set Permission</a></li>
                                                        <li>  <a href="#!" class="location" data-id="{!! $patient->id !!}" ><i class="material-icons">location_on</i> &nbsp; Set Location Availability </a></li>
                                                        <li><a href="#!" class="change-password" data-action="change-password"><i class="material-icons">lock</i> &nbsp; Change Password</a></li>
                                                    @endif--}}

                                                </ul>


                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>



                </div>

                <div class="row">

                    <div class="col s12 m12 l12 ">
                        <div class="card  ">
                            <div class="card-content red-text tab-items">
                                <ul class="vertical-tab-items">
                                    <li class="active"><a href="#!" data-item="personal"><i class="material-icons">account_circle</i> Biodata</a> </li>
                                    <li><a href="#!" data-item="documents"  data-id="{!! $patient->id !!}" ><i class="material-icons">folder</i> Documents</a> </li>
                                    <li><a href="#!" data-item="appointments"  data-id="{!! $patient->id !!}" ><i class="material-icons">date_range</i> Appointments</a> </li>
                                    <li><a href="#!" data-item="treatment-cards"  data-id="{!! $patient->id !!}" ><i class="material-icons">local_hospital</i> Treatment Cards</a> </li>
                                    <li><a href="#!" data-item="payments"  data-id="{!! $patient->id !!}" ><i class="material-icons">payment</i> Payments</a> </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-tab active" data-tab="personal">
                        <div class="col s12 m12 l12 ">

                            <ul class="tabs z-depth-1">
                                <li class="tab"><a class="active" href="#personal-information" id="get-personal-biodata">Patient Biodata</a></li>
                                {{--<li class="tab"><a  href="#medica-history-information" id="get-medical-history">Medical History</a></li>--}}

                                <li class="tab update-data"><a  href="#update-information">Update Data</a></li>
                                <li class="tab revised-information"  data-id="{!! $patient->id !!}" ><a href="#revised-information">Past Data</a></li>
                            </ul>
                            <div class="card-panel">
                                <div id="personal-information">
                                    <div class="row">
                                        <div class="col s10">
                                    <ul class="patient-info">
                                        <li title="Patient name"><i class="material-icons">account_box</i> {!! $patient->salutation !!} {!! $patient->first_name !!} {!! $patient->last_name !!}</li>



                                        @if(!empty($patient->date_of_birth))  <li title="Date of birth">
                                            <i class="material-icons">cake</i> {!! date('d.m.Y', strtotime($patient->date_of_birth)) !!}

                                        </li>@endif
                                        <li style="text-transform: none" >
                                            <i class="material-icons">email</i> <a href="mailto:{!! $patient->patient_email !!}">{!! $patient->patient_email !!}</a>

                                        </li>

                                        @if(!empty($patient->patient_phone)) <li title="Phone No.">

                                            <i class="material-icons">call</i>{!! $patient->patient_phone !!}

                                        </li> @endif
                                        @if(!empty($patient->addresses[0]))
                                            <li title="City, Zipcode">

                                                <i class="material-icons">location_on</i> {!! $patient->addresses[0]->house_no !!},{!! $patient->addresses[0]->apartments_no !!},{!! $patient->addresses[0]->street_no !!},
                                                {!! $patient->city !!}, {!! $patient->addresses[0]->country !!},{!! $patient->addresses[0]->zipcode !!} @if(isset($patient->addresses[0]) && ($patient->addresses->count()) > 1) <a style=" height: 18px; line-height: 17px; font-size: 11px;
"  href="#!" class="btn red white-text view-all-address">Show all address</a>  @endif

                                            </li>@endif
                                        @if(!empty($patient->address))
                                            <li title="Address">

                                                <i class="material-icons">location_on</i>{!! $patient->address !!}

                                            </li>@endif


                                        @if(!empty($patient->gender))
                                            <li title="Gender">

                                                <i class="material-icons">wc</i>{!! $patient->gender !!}

                                            </li>@endif


                                        @if(!empty($patient->occupation))
                                            <li title="Occupation">

                                                <i class="material-icons">work</i>{!! $patient->occupation !!}

                                            </li>@endif
                                        @if(!empty($patient->comapny_name))
                                            <li title="Occupation">

                                                <i class="material-icons">work</i>{!! $patient->comapny_name !!}

                                            </li>@endif


                                    </ul>
                                    <hr />
                                    <h5>Referral and Insurance Information</h5>
                                    <ul class="patient-info">

                                        <li title="Referral name">
                                            <i class="material-icons">accessibility</i>
                                            @if((isset($referral) && !is_null($referral) && !empty($referral)) || !empty($patient->referral_name))
                                            @if(isset($referral) && !is_null($referral) && !empty($referral))
                                                    {{ $referral->patient_unique_id}} - {{ $referral->patient_name}}
                                                @endif
                                                @if(!empty($patient->referral_name))
                                                   {{ $patient->referral_name}}
                                                @endif
                                            @else
                                                <span class="red-text">Referral : No Information found</span>
                                            @endif
                                        </li>

                                        <li title="Insurance information"><i class="material-icons">account_balance</i>
                                            @if(!empty($patient->insurance_by) && !empty($patient->insurance_number))
                                                {{ $patient->insurance_by }} - {{ $patient->insurance_number }}
                                                @else
                                                <span class="red-text">Insurance: No information found</span>
                                            @endif


                                        </li>
                                    </ul>
                                    <hr />
                                    <h5>Medical  Information</h5>
                                    <ul class="patient-info">
                                        <li title="Medication Description">
                                            <i class="material-icons">chevron_right</i>
                                            <strong>Medications : </strong> {!! isset($medical->medication) && !is_null($medical->medication)?$medical->medication:'<span class="red-text">None!</span>' !!}
                                        </li>


                                        <li title="Allergic Description">
                                            <i class="material-icons">chevron_right</i>
                                            <strong>Allergies :</strong> {!! isset($medical->allegric) && !is_null($medical->allegric)?$medical->allegric:'<span class="red-text">None!</span>' !!}
                                        </li>

                                        @php
                                            $medi = '';
                                        if(isset($medical->illness) && !is_null($medical->illness)){
                                        $m = json_decode($medical->illness);
                                         if(is_array($m)){
                                       $medi = isset($medical->illness) && !is_null($medical->illness) && !empty($medical->illness)?implode(', ',json_decode($medical->illness)):'<span class="red-text">No disease found!</span>';


                                         }
                                         }



                                        @endphp

                                        <li title="Allergic Description">
                                            <i class="material-icons">chevron_right</i>
                                            <strong>Medical Conditions : </strong>@if(!empty($medi)) {!! $medi !!} @else <span class="red-text">None!</span> @endif
                                        </li>

                                    </ul>
                                    <hr />
                                    <h5>Medical  History</h5>
                                    <ul class="collapsible">
                                        <li>
                                            <div class="collapsible-header" id="get-medical-history" data-patient-id="{!! $patient->id !!}"><i class="material-icons">local_hospital</i> Medical History : <span style="font-weight: 300"> {!! str_replace('_',' ',$history) !!}</span></div>
                                            <div class="collapsible-body"><span>
                                             <div class="row">
                                                 <div class="col s10" id="medical-history-section">

                                                 </div>

                                             </div>


                                    </span></div>
                                        </li>

                                    </ul>
                                        </div></div>

                                </div>
                                <div id="update-information">


                                    <div class="box-content">
                                        <form id="form" method="post" action="/patient/save" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <input type="hidden" name="patient_id" id="patient_id" value="{!! $patient->id !!}"/>
                                            <input type="hidden" name="updated_field"/>
                                            <div class="row">
                                                <div class="col s12 ">
                                                    <h4 class="header">Personal Information</h4>
                                                    <div class="card-panel">

                                                        <div class="row">
                                                            <div class="col s1">
                                                                <i class="material-icons prefix">fingerprint</i>
                                                            </div>
                                                            <div class="col s5 set-tool-tip"  data-position="right" data-tooltip="Unique ID for Patient">
                                                                <input id="unique_id" name="patient_unique_id" type="text"
                                                                       value="{!! $patient->patient_unique_id !!}"
                                                                       class="alphanumaric">

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col s1">
                                                                <i class="material-icons prefix">textsms</i>
                                                            </div>
                                                            <div class="col s11">
                                                                <input type="text" id="" name="salutation" placeholder="Salutation"
                                                                       value="{!! $patient->salutation !!}" class="alphanumaric single-col">

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s1">
                                                                <i class="material-icons">account_box</i>
                                                            </div>
                                                            <div class="col s5 set-tool-tip"  data-position="right" data-tooltip="Enter First Name for Patient">
                                                                <input type="text" value="{!! $patient->first_name !!}"  class="two-col" name="first_name" placeholder="e.g John" />
                                                            </div>
                                                            <div class="col s5 set-tool-tip"  data-position="right" data-tooltip="Enter Last Name for Staff">
                                                                <input type="text" value="{!! $patient->last_name !!}"  class="two-col" name="last_name" placeholder="e.g. Doe" />
                                                            </div>

                                                        </div>
                                                        {{--<div class="row">
                                                            <div class="input-field col s12">
                                                                <i class="material-icons prefix">access_time</i>
                                                                <input id="date_of_birth" name="date_of_birth"  style="text-transform:uppercase"  placeholder="dd.mm.yyyy" autocomplete="off"
                                                                       value="{!! isset($patient->date_of_birth) && !is_null($patient->date_of_birth) && !empty($patient->date_of_birth)?date('d.m.Y',strtotime($patient->date_of_birth)):"" !!}"
                                                                       type="text" required>
                                                                <label for="date_of_birth" class="">Date of Birth <span class="mandatory">*</span></label>
                                                            </div>--}}
                                                        @php
                                                            $year = $month = $day = "";
                                                            if(!empty($patient->date_of_birth)){
                                                             $d = explode('-',$patient->date_of_birth);

                                                            $year = $d[0];
                                                            $month = $d[1];
                                                            $day = $d[2];
                                                            }

                                                        @endphp
                                                        <div class="row">
                                                            <div class="col s1">
                                                                <i class="material-icons">cake</i>
                                                            </div>
                                                            <div class=" col s3">

                                                                <select name="month" id="month-date-of-birth">
                                                                    <option value="">Choose Month</option>
                                                                    @for($m=1; $m<=12; ++$m){
                                                                    <option @if($m==$month) selected @endif value="{!! $m !!}">{!!  date('F', mktime(0, 0, 0, $m, 1)) !!}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col s1"></div>
                                                            <div class="col s3">
                                                                <select name="day" id="day-date-of-birth">
                                                                    <option value="">Choose Day</option>

                                                                    @for($d=1; $d<=31; ++$d){
                                                                    <option @if($d==$day) selected @endif value="{!! $d !!}">{!! $d !!}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class=" col s3">
                                                                <select name="year" id="year-date-of-birth">

                                                                    @for($i=2016; $i>=1910; $i--)
                                                                        <option @if($i==$year) selected @endif value="{!! $i !!}">{!! $i !!}</option>

                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s1"><i class="material-icons">wc</i></div>
                                                            <div class="col s3">
                                                                <select name="gender" id="gender">
                                                                    <option value="Male" @if($patient->gender=="Male") selected @endif>Male</option>
                                                                    <option value="Female" @if($patient->gender=="Female") selected @endif>Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="col s1"><i class="material-icons">location_on</i></div>
                                                            <div class="col s6">
                                                                <select class="icons" name="nationality">
                                                                    <option value="">Choose Nationality</option>
                                                                    @foreach($countries as $country)
                                                                        <option value="{!! $country->name !!}"
                                                                                data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg"
                                                                                class="left circle" @if($patient->nationality==$country->name) selected @endif>{!! $country->name !!}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row phone">
                                                            <div class="col s1"><i class="material-icons">call</i></div>
                                                            <div class="col s5">

                                                                @php
                                                                    $number = explode(' ',$patient->patient_phone);
                                                                @endphp

                                                                <select class="icons" name="country_area_code" id="country_area_code">
                                                                    <option value="">Choose Country</option>
                                                                    @foreach($countries as $country)
                                                                        <option @if($current_country==$country->name || $country->code == $patient->code) selected
                                                                                @endif value="{!! $country->code !!}"
                                                                                data-code="{!! $country->code !!}"
                                                                                class="left circle">{!! trim($country->name) !!} ( +{!! trim($country->code) !!}
                                                                            )
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="col s5">
                                                                <input id="contact_number" name="contact_number"
                                                                       value="{!! $patient->patient_phone !!}" class="alphanumaric long-value-restriction" pattern="[+0-9]" type="text">
                                                            </div>
                                                            <button class="add-button"><i class="material-icons">add_circle</i></button>
                                                        </div>

                                                        @if(isset($phones))
                                                            @foreach($phones as $ph)
                                                                <div class="row new-phone">
                                                                    <div class="col s1"><i class="material-icons">call</i></div>
                                                                    <div class="col s5">



                                                                        <select class="icons country-code" name="country_code[]"
                                                                                id="country_area_code{!! $ph->id !!}">
                                                                            <option value="">Choose Country</option>
                                                                            @foreach($countries as $country)
                                                                                <option @if($current_country==$country->name || $country->code == $ph->code ) selected
                                                                                        @endif value="{!! $country->code !!}"
                                                                                        data-code="{!! $country->code !!}"
                                                                                        class="left circle">{!! trim($country->name) !!} (+{!! trim($country->code) !!})</option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>
                                                                    <div class="col s5">
                                                                        <input id="new_contact_number{!! $ph->id !!}" name="new_contact_number[]"
                                                                               value="{!! $ph->contact_number !!}" type="text"
                                                                               class="validate contact_number">
                                                                    </div>
                                                                    <button class="remove-button" data-id="{!! $ph->id !!}"><i
                                                                                class="material-icons">delete</i></button>
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                        <div class="row">
                                                            <div class="col s1">
                                                                <i class="material-icons">mail</i>
                                                            </div>
                                                            <div class="col s11 set-tool-tip" data-position="right" data-tooltip="Enter Email Address">
                                                                <input type="text" value="{!! $patient->patient_email !!}" style="text-transform: lowercase" class="single-col" name="patient_email" placeholder="jhondoe@example.com" />
                                                            </div>


                                                        </div>

                                                        <div class="row">
                                                            <div class="col s1">
                                                                <i class="material-icons">card_membership</i>
                                                            </div>
                                                            <div class="col s5">

                                                                <select class="icons" name="card_type">
                                                                    {{-- <option value="">Choose Card Type</option>--}}
                                                                    <option value="IC Number" @if($patient->card_type=="IC Number") selected @endif>IC Number</option>
                                                                    <option value="FIN Number"
                                                                            @if($patient->card_type=="FIN Number") selected @endif>FIN Number</option>
                                                                    <option value="PASSPORT Number"
                                                                            @if($patient->card_type=="Passport Number") selected @endif>Passport
                                                                        Number
                                                                    </option>

                                                                </select>

                                                            </div>
                                                            <div class="col s5">
                                                                <input id="card_number" name="card_number" value="{!! $patient->card_number !!}"
                                                                       type="text" placeholder="IC Number" class="alphanumaric">


                                                            </div>


                                                        </div>

                                                        <div class="row">
                                                            <div class="col s1">
                                                                <i class="material-icons prefix">work
                                                                </i>
                                                            </div>
                                                            <div class="col s5 set-tool-tip" data-position="right" data-tooltip="Enter Occupation">
                                                                <input id="occupation" name="occupation"  placeholder="e.g. Engineer, Manager, Doctor" value="{!! $patient->occupation !!}"
                                                                       type="text" class="alphanumaric two-col">


                                                            </div>
                                                            <div class="col s5 set-tool-tip" data-position="right" data-tooltip="Enter Company">

                                                                <input id="comapny_name"  placeholder="e.g. Sony, Dell, Toshiba"  value="{!! $patient->comapny_name !!}"  name="comapny_name"
                                                                       type="text" class=" long-value-restriction two-col">


                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class=" col s1">
                                                                <i class="material-icons prefix">location_city</i>
                                                            </div>
                                                            <div class="col s5 set-tool-tip" data-position="right" data-tooltip="Enter House No">
                                                                <input id="house_no" name="house_no[]" placeholder="e.g. House No" value="{!! $patient->house_no !!}" type="text"
                                                                       class=" two-col">


                                                            </div>
                                                            <div class="col s5 set-tool-tip" data-position="right" data-tooltip="Enter Apartment">
                                                                <input id="apartments_no" name="apartments_no[]" value="{!! $patient->apartments_no !!}"  placeholder="e.g Enter Apartment No" type="text"
                                                                       class=" two-col">


                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class=" col s1">
                                                                <i class="material-icons prefix">location_city</i>
                                                            </div>
                                                            <div class="col s5 set-tool-tip" data-position="right" data-tooltip="Enter Street">
                                                                <input id="street_no" name="street_no[]" placeholder="e.g. Singapore, Newyork, Islamabad" value="{!! $patient->street_no !!}" type="text"
                                                                       class=" two-col">


                                                            </div>

                                                            <div class="col s5 set-tool-tip" data-position="right" data-tooltip="Enter City">
                                                                <input id="city" name="city[]" placeholder="e.g. Singapore, Newyork, Islamabad" value="{!! $patient->city !!}" type="text"
                                                                       class="alphanumaric two-col">


                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class=" col s1">
                                                                <i class="material-icons prefix">location_city</i>
                                                            </div>
                                                            <div class="col s5">
                                                            <select class="icons" name="nationality">
                                                                <option value="">Choose Nationality</option>
                                                                @foreach($countries as $country)
                                                                    <option value="{!! $country->name !!}"
                                                                            data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg"
                                                                            class="left circle" @if($patient->nationality==$country->name) selected @endif>{!! $country->name !!}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                            <div class="col s5 set-tool-tip" data-position="right" data-tooltip="Enter Zip Code">
                                                                <input id="zipcode" name="zipcode" value="{!! $patient->zipcode !!}"  placeholder="e.g 408600, 560252" type="text"
                                                                       class="alphanumaric two-col">


                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                        </div>

                                                        <div class="row add-new-address">
                                                            <div class=" col s1">
                                                                <i class="prefix"></i>
                                                            </div>
                                                            <div class="col s10 set-tool-tip" data-position="right" data-tooltip="Enter Complete Address">

                                                                <textarea id="address" name="address[]" class="materialize-textarea"
                                                                          length="120">{!! isset($previous_address[0])?$previous_address[0]->address:"" !!}</textarea>


                                                            </div>
                                                        </div>



                                                        <div class="row">
                                                            <div class=" col s12 right-align">
                                                                <a href="#!" class="add-more-address">Add Alternative Address</a>  @if(isset($previous_address) && count($previous_address) > 1)| <a href="javascript:;" class="show-address">Show Alternative Address</a>  @endif
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <h4 class="header">Referral and Insurance Information</h4>
                                                    <div class="card-panel">
                                                        <div class="row">
                                                            <div class="col s1">
                                                                <i class="material-icons prefix">account_circle</i>
                                                            </div>
                                                            <div class="col s10 set-tool-tip" data-position="right" data-tooltip="Enter Referral">

                                                            <select class="" name="referral_id">
                                                                    @if(isset($referral) && !is_null($referral) && !empty($referral))
                                                                        <option value="{!! $referral->id !!}">{{ $referral->patient_name}} </option>
                                                                    @endif

                                                                    @if(!empty($patient->referral_name))
                                                                        <option value="0">{{ $patient->referral_name}} </option>
                                                                    @endif

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="referral" id="referral_id" @if(isset($referral) && !is_null($referral) && !empty($referral)) value="{!! $referral->id !!}"  @endif/>
                                                        <div class="row">
                                                            <div class=" col s1">
                                                                <i class="material-icons prefix">insert_link</i>
                                                            </div>
                                                            <div class="col s10">

                                                            <input id="referral_code" name="referral_code"
                                                                       value="{!! $patient->referral_code !!}" readonly="readonly" type="text"
                                                                       class=" ">


                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class=" col s1">
                                                                <i class="material-icons prefix">assistant_photo</i>
                                                            </div>
                                                            <div class="col s10 set-tool-tip" data-position="right" data-tooltip="Choose Insurance Type">


                                                                <select name="insurance_by" id="insurance_by">
                                                                    <option value="">Insurance By</option>
                                                                    <option value="AIA" @if( $patient->insurance_by == 'AIA') selected @endif>AIA</option>
                                                                    <option value="AXA"  @if( $patient->insurance_by == 'AXA') selected @endif>AXA</option>
                                                                    <option value="SHENTON"  @if( $patient->insurance_by == 'SHENTON') selected @endif>SHENTON</option>
                                                                    <option value="CHAS"  @if( $patient->insurance_by == 'CHAS') selected @endif>CHAS</option>
                                                                    <option value="MEDICLAIM"  @if( $patient->insurance_by == 'MEDICLAIM') selected @endif>MEDICLAIM</option>
                                                                </select>


                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col s1">
                                                                <i class="material-icons prefix">border_color</i>
                                                            </div>
                                                            <div class="col s10 set-tool-tip" data-position="right" data-tooltip="Enter Insurance Number">
                                                                <input id="insurance_number" name="insurance_number"
                                                                       value="{!! $patient->insurance_number !!}" type="text" class=" ">


                                                            </div>
                                                        </div>






                                                    </div>

                                                    <h4 class="header">Medical Information</h4>
                                                    <div class="card-panel">
                                                        <div class="row">
                                                            <div class="col s8">Are you on medication?</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="is_medication">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="is_medication"
                                                                               @if(isset($medical->is_medication) && $medical->is_medication == "Yes") checked @endif >
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $medi = isset($medical->illness)?json_decode($medical->illness):array();

                                                        @endphp

                                                        <div class="row">
                                                            <div class="input-field col s12">
                                    <textarea id="medication" name="medication" class="materialize-textarea"
                                              length="120">{!! isset($medical->medication) && !is_null($medical->medication)?$medical->medication:"" !!}</textarea>
                                                                <label for="medication" class="">if yes, please state all the medication you are
                                                                    talking. </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col s8">Are you allergic to any medication?</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="is_allergic"
                                                                               @if(isset($medical->is_allegric) && $medical->is_allegric == "Yes") checked @endif >
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="input-field col s12">
                                    <textarea id="allergic" name="allegric" class="materialize-textarea"
                                              length="120">{!! isset($medical->allegric) && !is_null($medical->allegric)?$medical->allegric:"" !!}</textarea>
                                                                <label for="allergic" class="">if yes, please state all possible allergic. <span
                                                                            class="mandatory">*</span></label>
                                                            </div>
                                                        </div>

                                                        <div class="row" style="margin-bottom: 10px">
                                                            <div class="col s12">Do you suffer from any of the following ilnessess?</div>
                                                        </div>

                                                        <div class="row m-top-5">
                                                            <div class="col s8">Allergic</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('allergie',$medi)) checked
                                                                               @endif value="allergie">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row m-top-5">
                                                            <div class="col s8">High Blood Pressure</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('high_blood_pressure',$medi)) checked
                                                                               @endif value="high_blood_pressure">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row m-top-5">
                                                            <div class="col s8">Asthma</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('asthma',$medi)) checked
                                                                               @endif value="asthma">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m-top-5">
                                                            <div class="col s8">Gastric Problems</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('gastric_problems',$medi)) checked
                                                                               @endif value="gastric_problems">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m-top-5">
                                                            <div class="col s8">Head/Neck Injuries</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('head_neck_injuries',$medi)) checked
                                                                               @endif value="head_neck_injuries">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m-top-5">
                                                            <div class="col s8">Diabetes</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('diabetes',$medi)) checked
                                                                               @endif value="diabetes">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m-top-5">
                                                            <div class="col s8">Heart Disease</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('heart_disease',$medi)) checked
                                                                               @endif value="heart_disease">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m-top-5">
                                                            <div class="col s8">Liver Problems</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('liver_problems',$medi)) checked
                                                                               @endif value="liver_problems">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m-top-5">
                                                            <div class="col s8">Epilepsy</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('eilepsy',$medi)) checked
                                                                               @endif value="eilepsy">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m-top-5">
                                                            <div class="col s8">Herpes</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('herpes',$medi)) checked
                                                                               @endif value="herpes">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m-top-5">
                                                            <div class="col s8">Respiratory</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('respiratory',$medi)) checked
                                                                               @endif value="respiratory">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row m-top-5" id="gendar-check"  @if($patient->gender=='Male') style="display:none" @endif>
                                                            <div class="col s8">If female, are you pragnent</div>
                                                            <div class="col s4">
                                                                <div class="switch" id="">

                                                                    <label>
                                                                        No
                                                                        <input type="checkbox" name="ilnessess[]"
                                                                               @if(isset($medi) && !is_null($medi) && in_array('pregnant',$medi)) checked
                                                                               @endif value="pregnant">
                                                                        <span class="lever"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <textarea id="other" name="others" class="materialize-textarea" length="120" >@if(isset($medical) && !is_null($medical)) {!! $medical->others !!} @endif</textarea>
                                                                <label for="other" class="">If others. </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="input-field col s12">

                                                                <p for="other" class="">I would like to recive a regular check-up reminder by </p>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $reminder = $patient->reminder;
                                                            $reminder_array = !empty($reminder)?explode(',',$reminder):array();

                                                        @endphp
                                                        <div class="row">
                                                            <p class=" col s2">
                                                                <input type="checkbox" class="filled-in" name="reminder[]" @if(in_array('email',$reminder_array)) checked @endif value="email"
                                                                       id="email_receive" />
                                                                <label for="email_receive">Email</label>
                                                            </p>
                                                            <p class=" col s2">
                                                                <input type="checkbox" class="filled-in" name="reminder[]" value="sms"
                                                                       id="sms_receive" @if(in_array('sms',$reminder_array)) checked @endif/>
                                                                <label for="sms_receive">SMS</label>
                                                            </p>
                                                            <p class=" col s2">
                                                                <input type="checkbox" class="filled-in" name="reminder[]" value="post"
                                                                       id="post_receive" @if(in_array('post',$reminder_array)) checked @endif/>
                                                                <label for="post_receive">POST</label>
                                                            </p>
                                                        </div>

                                                        <div class="row m-top-30">
                                                            <div class="col s12 center-align">
                                                                <a class="btn save-user red" href="#!" id="selenium-add-patient-save">Update</a>
                                                                <a class="btn cancel-user red" href="#!" id="selenium-add-patient-cancel">Cancel</a>
                                                            </div>
                                                        </div>

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
                                                    </div>

                                                </div>


                                            </div>
                                        </form>

                                    </div>


                                </div>
                                <div id="revised-information">

                                </div>

                                <div id="medica-history-information">

                                </div>




                            </div>
                        </div>
                    </div>
                    <div class="vertical-tab" data-tab="documents">
                        <div class="col s12 m12 l12 ">


                            <div class="card-panel">
                                <div class="row">
                                    <div class="col s8">
                                        <ul class="file-tree">

                                            @if(isset($f_folders))
                                                @foreach($f_folders as $folder)
                                            <li><a href="#">{!! $folder->folder_name !!}</a>
                                                <ul>
                                                    @if(!empty($folder->documents))
                                                        @foreach($folder->documents as $d)
                                                            <li><a href="{!! url('/').'/uploads/documents/'.$d->document !!}" download="{!! $d->document !!}">{!! $d->document_title !!}</a> </li>
                                                            @endforeach

                                                        @endif
                                                </ul>
                                            </li>
                                                @endforeach
                                                @endif

                                        </ul>
                                    </div>
                                    <div class="col s4">
                                        <a href="#!" class="btn upload-documents red right">Upload Documents</a>
                                    </div>
                                </div>






                            </div>
                        </div>
                    </div>
                    <div class="vertical-tab" data-tab="payments">
                        <div class="col s12 m12 l12 ">


                            <div class="card-panel">
                                <div id="payment-information">
                                    <table class="invoicing striped">
                                        <thead>
                                        <tr>
                                            <th colspan="7">Invoice archive</th>
                                        </tr>
                                        <tr class="table-header">
                                            <th width="5%">#</th>
                                            <th width="25%">Issued on</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Issue Date</th>
                                            <th width="10%">Due Date</th>
                                            <th width="10%">Amount Due</th>
                                            <th width="10%">Paid By</th>
                                            <th width="10%">Paid For</th>
                                            <th width="10%">Paid Via</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="10" class="month-wise">September 2018</td>
                                        </tr>
                                        @for($i=1;$i<=3;$i++)
                                            <tr>
                                                <td></td>
                                                <td><a href="#!" class="text-red">Mujtaba Ahmad</a> </td>

                                                <td>@if($i==1) <div class="badge green white-text">paid</div> @endif
                                                    @if($i==2) <div class="badge orange white-text">on hold</div> @endif
                                                    @if($i==3) <div class="badge red white-text">Over Due</div> @endif</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endfor

                                        <tr>
                                            <td colspan="10" class="month-wise">October 2018</td>
                                        </tr>
                                        @for($i=1;$i<=3;$i++)
                                            <tr>
                                                <td></td>
                                                <td><a href="#!" class="text-red">Mujtaba Ahmad</a> </td>

                                                <td>@if($i==1) <div class="badge green white-text">paid</div> @endif
                                                    @if($i==2) <div class="badge orange white-text">on hold</div> @endif
                                                    @if($i==3) <div class="badge red white-text">Over Due</div> @endif</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>





                            </div>
                        </div>
                    </div>
                    <div class="vertical-tab" data-tab="treatment-cards">
                        <div class="col s12 m12 l12">


                            <div class="card-panel">
                                <div class="row">
                                    <div class="col s12">
                                        <a href="/view/treatment-cards/{!! $patient->id !!}" class="btn  red right">Add New Treatment Card</a>
                                    </div>
                                </div>
                                <div id="treatment-card-information">

                                </div>




                            </div>
                        </div>
                    </div>
                    <div class="vertical-tab" data-tab="activities">
                        <div class="col s12 m12 l12 ">


                            <div class="card-panel">
                                <div id="activities-information">

                                </div>





                            </div>
                        </div>
                    </div>
                    <div class="vertical-tab" data-tab="sessions">
                        <div class="col s12 m12 l12">


                            <div class="card-panel">
                                <div class="row">
                                    <div class="col s12">
                                        <a href="#!" class="btn add-new-session red right">Add New Session</a>
                                    </div>
                                </div>
                                <div id="sessions-information">



                                </div>





                            </div>
                        </div>
                    </div>
                    <div class="vertical-tab" data-tab="referrals">
                        <div class="col s12 m12 l12 ">


                            <div class="card-panel">
                                <div id="referrals-information">

                                </div>





                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        </div>
            <div id="show-address" class="modal">
                <div class="modal-content">
                    <div class="row">
                        <h4 class="left">Patient's Addresses</h4>
                        <div class="col s1 right-align no-padding right">
                            <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                        </div>
                    </div>
                    <div class="row">
                        <ul class="collection">

                            @if(isset($patient->addresses))
                                @foreach($patient->addresses as $key=>$address)
                                    <li class="collection-item avatar m-top-5 ">
                                        <i class="material-icons circle">home</i>
                                        <p class="col s8">{!! $address->house_no !!}, {!! $address->apartments_no !!},{!! $address->street_no !!} , {!! $address->city !!}, {!! $address->country !!},{!! $address->zipcode !!}</p>
                                        <p class="right">
                                            <input name="group1" @if($address->set_as_main=="Yes")) checked @endif type="radio" id="address{!! $address->id !!}" class="set_as_main" value="{!! $address->id !!}" />
                                            <label for="address{!! $address->id !!}" style="font-size:12px">Set Main Address</label>
                                        </p>
                                        <div style="clear:both"></div>
                                        <p class="col s5 small">{!! date('d.m.Y H:i:s',strtotime($address->created_at)) !!}</p>
                                        <div style="clear:both"></div>


                                    </li>
                                @endforeach
                            @endif

                        </ul>

                    </div>

                </div>

            </div>

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
            <div id="upload-profile-image-modal" class="modal " style="width:400px !important;" >
                <div class="modal-content">
                    <div class="row">

                        <h4 class="left">Profile Picture </h4>
                        <div class="col s1 right-align no-padding right">
                            <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div id="image_profile" style="width:350px; margin-top:30px"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn btn-success crop_image">Crop & Upload Image</button>
                        </div>
                    </div>


                </div>

            </div>
            <div id="upload-document" class="modal" style="width:400px !important; height: 250px" >
            <div class="modal-content">
                <div class="row">
                    <h4 class="left">Patient's Documents</h4>
                    <div class="col s1 right-align no-padding right">
                        <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                    </div>
                </div>
                <form id="document-form" action="/uploads/document" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user_type" value="patient" />
                    {!! csrf_field() !!}
                <div class="row">
                    <div class="col s12">Choose Directory</div>
                    <div class="col s12">
                        <select id="folder" name="folder_id" class="folder">
                            <option></option>
                            <option value="0">Add New</option>
                            @if(isset($f_folders))
                                @foreach($f_folders as $folder)
                                    <option value="{!! $folder->id !!}">{!! $folder->folder_name !!}</option>
                                    @endforeach
                                @endif
                        </select>
                    </div>
                </div>
                    <div class="row">
                        <div class="col s12">Document Title</div>
                        <div class="col s12">
                            <input type="text" name="document_title" required />

                        </div>
                    </div>
                <div class="row">
                    <div class="col s12">Upload Document</div>
                    <div class="col s12">
                       <input type="file" name="document_file" />
                    </div>
                </div>
                </form>
                <a href="#!" class="upload-new-document red right white-text" style="padding: 5px 20px"><i class="material-icons" style="position: relative; top: 5px;  margin-right: 8px; line-height: 15px;">upload_file</i> Upload Document</a>
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
            <div id="add-new-directory" class="modal z-depth-1" style="width: 40% !important; min-height: 130px !important;">
            <div class="modal-content">
                <div class="row">

                    <h4 class="left">Add New Directory</h4>
                    <div class="col s1 right-align no-padding right">
                        <a href="#!" class="modal-action modal-close close-media"><i class="material-icons">close</i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="input-field">
                            <input id="add_new_directory" name="add_new_directory" value="">
                        </div>
                        <a href="#!" class="save-new-directory red right white-text" style="padding: 5px 20px"><i class="material-icons" style="position: relative; top: 5px;  margin-right: 8px; line-height: 15px;">new_folder</i> Create new folder</a>
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
            </div>
        </div>

            <div id="appointment-edit-detail" class="modal " style="width:700px !important;" >
            <div class="modal-content">
                {{-- <div class="row">

                     <h4 class="left">Show Appointment </h4>
                     <div class="col s1 right-align no-padding right">
                         <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                     </div>
                 </div>--}}
                <div id="edit-appointment">
                    <div class="progress"> <div class="indeterminate"></div></div>
                </div>

            </div>

        </div>

        <div id="add-treatment-modal" class="modal ">
            <div class="modal-content">
                <div class="row">

                    <h4 class="left">Add Treatment</h4>
                    <div class=" col s1 right-align no-padding right">
                        <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                    </div>
                </div>
                <div id="treatment-card">
                    <div class="progress"> <div class="indeterminate"></div></div>
                </div>

            </div>

        </div>
        <div id="show-medical-history" class="modal " style="width:50% !important">
            <div class="modal-content">
                <div class="row">

                    <h4 class="left">Medical History</h4>
                    <div class="col s1 right-align no-padding right">
                        <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <h5 class="heading">Illness</h5>
                    </div>

                    <div class="col s12" id="illness">

                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <h5 class="heading">Medical History</h5>
                    </div>

                    <div class="col s12" id="response-medical-history">

                    </div>
                </div>

            </div>

        </div>


        </div>



    </section>

    @endsection

@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('/public/material/js/file-explore.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/js/croppie.js') !!}
    <script>
        function patient_result_template(patient){

            if(patient.id > 0)
                var $patient = $('<div class="patient-container">'+
                    '<div class="avatar"><img src="/public/img/user.svg" alt="user"></div>'+
                    '<div class="patient-info">'+
                    '<h4>'+patient.text+'</h4>'+
                    '<p class="inner-text"><i class="material-icons prefix">fingerprint</i> '+patient.patient_unique_id+'  '+
                    '<i class="material-icons prefix" style="margin-left: 20px">contact_phone</i> '+patient.patient_phone+'</p>'+
                    '</div>'+
                    '</div>');
            else
                var $patient = patient.text;
            return $patient;
        }
        $(function(){

            $("select").material_select('destroy');
            $("select").select2();


            $(".view-all-address").click(function(){
                $("#show-address").modal('open');
            });

            $("#get-medical-history").click(function(){
                if(!$(this).hasClass('active')) {
                    var patient_id = "{!! $patient->id !!}";
                    $(".overlay").show();
                    $(".overlay .progress").show();
                    $(".overlay .message").html('');
                    $.ajax({
                        url: "/show/profile/medical-history/" + patient_id,
                        success: function (response) {
                            $(".overlay .progress").hide();
                            $(".overlay").hide();

                            $("#medical-history-section").html(response);
                        }
                    });
                }
            });

            $("#get-personal-biodata").click(function(){
                var patient_id = "{!! $patient->id !!}";
                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").html('Loading...');
                $.ajax({
                    url:"/show/patient/bio-data/"+patient_id,
                    success:function (response) {
                        $(".overlay .progress").hide();
                        $(".overlay").hide();

                        $("#personal-information").html(response);
                    }
                });
            });



            $('.add-new-treatment-card').click(function(){
                $("#add-treatment-modal").modal({
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '4%', // Starting top style attribute
                    endingTop: '10%', // Ending top style attribute

                    complete: function() {
                        $(".overlay").show();
                        $("#patient-treatment-card .modal-content .patient-result").html('<div class="progress"> <div class="indeterminate"></div></div>');

                        $.ajax({
                            url:"/patient/treatment-cards/"+patient_id,
                            success:function(response){
                                $(".overlay").hide();
                                $("#patient-treatment-card .modal-content .patient-result").html(response);
                            }
                        });
                    } // Callback for Modal close
                });
                $("#add-treatment-modal").modal('open');
                var patient_id = "{!! $patient->id !!}";
                $.ajax({
                    url:"/treatment/card",
                    success:function (response) {
                        $("#treatment-card").html(response);
                        $("#treatment-card input[name=patient_id]").val(patient_id);

                    }
                });
            });

            $(".save-new-session").click(function () {
                $(".message").hide();

                if($("#session-form").valid()){

                    $("#session-form").ajaxForm(function(response){
                        var patient_id = "{!! $patient->id !!}";
                    response = $.parseJSON(response);
                    if(response.type=='success'){
                        $(".message.success-message").html(response.message);
                        $(".message.success-message").show();

                        $.ajax({
                            url:'/get/sessions/'+patient_id,
                            success:function (response) {
                                $(".overlay .progress").hide();
                                $(".overlay").hide();
                                $('#sessions-information').html(response);
                            }
                        });

                        setTimeout(function(){
                            $(".message.success-message").hide();
                            $("#add-new-session").modal('close');
                        },2500);

                    }else{
                        $(".message.error-message").html(response.message);
                        $(".message.error-message").show();
                    }
                    }).submit();
                }

            });
            $(".add-new-session").click(function(){
                $("#session-form").ajaxForm().clearForm();
                $("#add-new-session").modal('open');
            });

            $(".upload-new-document").click(function(e){
                if($("#document-form").valid()){

                    $(".overlay").show();
                    $(".overlay .progress").show();
                    $(".overlay .message").hide();

                    $("#document-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.id > 0){
                            $(".success-message p").html('Document is uploaded successfully');
                            $(".success-message").show();
                            $(".overlay .progress").hide();
                            $(".overlay .message").show();

                            setTimeout(function(){
                                $("#add-new-document").modal('close');
                                $(".overlay").hide();
                                location.reload();
                            },2000);
                        }
                    }).submit();
                }
                e.preventDefault();

            });

            $(".save-new-directory").click(function(){
                var add_new_folder = $("input[name=add_new_directory]").val();
                if(add_new_folder!=""){
                    var staff_id = "{!! Auth::id() !!}";
                    $(".message").hide();
                    $.ajax({
                        url:'/create/directory',
                        type:'post',
                        data:{"_token":"{!! csrf_token() !!}",patient_id:"{!! $patient->id !!}",add_new_folder:add_new_folder},
                        success:function (response) {
                            response = $.parseJSON(response);

                            if(response.type=="success"){
                                $(".success-message  p").html(response.message);
                                $(".success-message").show();

                                var newOption = new Option(response.data.name, response.data.id, true, true);

                               // $(".file-tree").filetree();
                                $('#folder').append(newOption).trigger('change');
                                $(".file-tree").append('<li><a href="#">'+response.data.text+'</a><ul></ul></li>');
                                $(".file-tree").filetree({
                                    collapsed: true,

                                });

                                 setTimeout(function(){
                                    $(".success-message").hide();
                                    $("#add-new-directory").modal('close');
                                },2000);
                            }else{
                                $(".error-message > p").html(response.message);
                                $(".error-message").show();
                            }
                        }
                    });
                }else{
                    $("input[name=add_new_folder]").focus();
                }

            });

            $(".show-address").click(function () {
                $("#show-address").modal('open');
                ;
            });

            $(".upload-documents").click(function(){
                $("#upload-document").modal('open');
            });

            $("#month-date-of-birth").select2().change(function(){
                var year = $("#year-date-of-birth").val();
                var days = new Date(year, $(this).val(), 0).getDate();
                // $("#day-date-of-birth").select2('destroy');
                $("#day-date-of-birth").html('');
                for(var i=1;i<=days;i++){
                    var data = {
                        id: i,
                        text: i
                    };

                    var newOption = new Option(data.text, data.id, false, false);
                    $('#day-date-of-birth').append(newOption).trigger('change');

                }
                //$("#day-date-of-birth").select2();
            });

            $(".set_as_main").on('change',function(){
                var id = ($(this).val());
                var address = $(this).parent().parent().find('p').first().html();
                // alert(address);
                $.ajax({
                    url:"/update/address/status/"+id,
                    success:function (response) {
                        $("#address").val(address);
                    }
                });
            });

            $(".gender").select2().on('change',function(){

                if($(this).val() =='Female'){

                    $("#gendar-check").show();
                }else{
                    $("#gendar-check input[type=checkbox]").removeProp('checked');
                    $("#gendar-check").hide();
                }



            });
            $("#folder").select2().on('change',function(){

                if($(this).val() ==0){

                    $("#add-new-directory").modal('open');
                }



            });
            $(".long-value-restriction").characterCounter();

            $( "#date_of_birth" ).datepicker({ dateFormat: 'dd.mm.yy',
                changeMonth: true,
                changeYear: true,
                yearRange: '-100:+0',
                maxDate : '-2Y'
            });

            $( "#session-date" ).datepicker({ dateFormat: 'dd.mm.yy',
                changeMonth: true,

                minDate : 'now'
            });

            $(".add-more-address").click(function(){
                $(".row.add-new-address").after($('.row.add-new-address').clone().removeClass('add-new-address')).find('textarea').val('');



            });

            $('input.autocomplete').autocomplete({
                data: {
                    "Mr": null,
                    "Mrs": null,
                    "Madam": null,
                    "Mas": null,
                    "Prof.": null,
                },

                onAutocomplete: function (val) {
                    // Callback function when value is autcompleted.
                },
                minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
            });
            var counter = 1;
            $(".add-button").click(function (e) {

                $.ajax({
                    url: '/add/new/phone',
                    success: function (response) {
                        $(".phone").after(response);
                        $(".country-code").material_select('destroy');
                        $(".country-code").select2();

                        $(".remove-button").click(function () {
                            //var id = $(this).attr('data-id');
                            $(this).parents('.new-phone').remove();
                        });

                        $(".contact_number").change(function () {
                            clearTimeout(timeoutId);
                            timeoutId = setTimeout(function () {
                                // Runs 1 second (1000 ms) after the last change
                                //$(".progress").show();
                                $(".ajax-loading").hide();


                            }, 1000);
                        });

                        $("select.country-code").on('change', function () {
                            var val = $(this).val();

                            $(this).parents('.new-phone').find('.contact_number').val("+" + val);
                        });
                        $(".contact_number").keydown(function (e) {
                            // Allow: backspace, delete, tab, escape, enter and .
                            if ($.inArray(e.keyCode, [187,107,46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                                // Allow: Ctrl+A, Command+A
                                (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
                                // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {
                                // let it happen, don't do anything
                                return;
                            }
                            // Ensure that it is a number and stop the keypress
                            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                e.preventDefault();
                            }
                        });
                        $(".long-value-restriction").characterCounter();
                    }
                });


                /* var new_contact = $(".phone").clone();
                 new_contact.find('ul').remove();
                 new_contact.find('select.icons').material_select('destroy');
                 new_contact.find('.add-button').addClass('remove-button').removeClass('add-button');
                 new_contact.addClass('new-phone').removeClass('phone');
                 new_contact.addClass('new-phone').find('.remove-button > i').html('delete');
                 new_contact.find('select.icons').attr('id','country_area_code'+counter++);

                 new_contact.find('select.icons').material_select();

                 $(".phone").after(new_contact);
                 $(".remove-button").on('click', function(b){
                 $(this).parents('.new-phone').remove();
                 b.preventDefault();
                 });*/
                e.preventDefault();
            });

            $(".remove-button").click(function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "/phone/delete/" + id,
                    success: function (response) {

                    }
                });
                $(this).parents('.new-phone').remove();
            });

            $('select[name=referral_id]').select2({
                placeholder: "Enter Referral Name ",
                allowClear: true,
                tags: true,
                minimumInputLength: 3,
                ajax: {
                    url: function (params) {
                        return '/refferal/get_referral/' + params.term;
                    },
                    dataType: 'json',
                    delay: 150,
                    data: function (params) {
                        //   console.log(params);
                        var query = {
                            search: params.term,
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },

                },


            }).on('change', function () {
                //alert();
                var id = $(this).val();
                if (id > 0) {
                    $("#referral_id").val(id);
                    $("#referral_code").val($(this).select2('data')[0].unique_id);
                    $("#referral_code").focusin();
                }


            });

            $(".save-user").click(function(e){
                $(".message").hide();
                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();
                if($("#form").valid()){
                    $("#form").ajaxForm(function(response){
                        $(".overlay .progress").hide();
                        $(".overlay .message").show();

                        response = $.parseJSON(response);
                        if(response.type=="success"){

                            $(".success-message  p").html(response.message);
                            $(".success-message").show();

                            setTimeout(function(){
                                $(".success-message").hide();
                                $(".overlay").hide();
                            },2000);
                        }else{
                            $(".success-message  p").html(response.message);
                            $(".error-message").show();
                        }




                    }).submit();
                }

                e.preventDefault();
            });

            $image_crop = $('#image_profile').croppie({
                enableExif: true,
                viewport: {
                    width:200,
                    height:200,
                    type:'square' //circle
                },
                boundary:{
                    width:300,
                    height:300
                }
            });

            $(".revised-information").click(function(){

                var id = $(this).attr('data-id');
                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();
                $.ajax({
                    url:"/get/patient/revised-data/"+id,
                    success:function(response){
                        $(".overlay .progress").hide();
                        $(".overlay").hide();
                        $("#revised-information").html(response);
                    }
                });

            });

            $('.crop_image').click(function(event){
                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response){
                    $.ajax({
                        url:"/upload/patient/profile/picture",
                        type: "POST",
                        data:{"image": response,patient_id:"{!! $patient->id !!}","_token":"{!! csrf_token() !!}"},
                        success:function(data)
                        {
                            $(".overlay .progress").hide();
                            $(".overlay .message").show();
                            $(".overlay").hide();
                            $('#upload-profile-image-modal').modal('close');
                            $('#uploadedimage').attr('src',response);
                        }
                    });
                })
            });

            $('#profile_picture').on('change', function(){
                var reader = new FileReader();
                reader.onload = function (event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#upload-profile-image-modal').modal('open');
            });

            $(".change-profile-picture").click(function(){
                $("#profile_picture").click();
            });

            $("#country_area_code").on('change', function () {
                var val = $(this).val();

                $('#contact_number').val("+"+val);
            });


            $(".vertical-tab-items li").click(function(){
                $(".vertical-tab-items li").removeClass('active');
                var tab = $(this).find('a').attr('data-item');
                $(this).addClass('active');
                $(".vertical-tab").hide();
                $(".vertical-tab[data-tab="+tab+"]").show();
                var patient_id = "{!! $patient->id !!}";

                switch(tab){
                    case 'activities':
                        $(".overlay").show();
                        $(".overlay .progress").show();
                        $(".overlay .message").hide();
                        $.ajax({
                            url:'/get/activities/'+patient_id,
                            success:function (response) {
                                $(".overlay .progress").hide();
                                $(".overlay").hide();
                                $('#activities-information').html(response);
                            }
                        });
                        break;
                    case 'sessions':

                        $(".overlay").show();
                        $(".overlay .progress").show();
                        $(".overlay .message").hide();

                        $.ajax({
                            url:'/get/sessions/'+patient_id,
                            success:function (response) {
                                $(".overlay .progress").hide();
                                $(".overlay").hide();
                                $('#sessions-information').html(response);
                            }
                        });
                        break;

                }



            });

            $(".patient-actions").click(function(){
                var patient_id = $(this).attr('data-patient-id');
                var value = $(this).attr('data-value');
                if(!$(this).hasClass('active')) {
                    if (value == "visits") {
                        $.ajax({
                            url: '/get/appointments/patient/' + patient_id,
                            success: function (response) {
                                $("div.visits > span").html(response);
                            }
                        });
                    }

                    if(value=='documents'){
                        $.ajax({
                            url: '/patient/documents/' + patient_id,
                            success: function (response) {
                                $("div.documents > span").html(response);
                            }
                        });
                    }

                }
            });

            $(".all-visits").click(function (response) {
                var patient_id = $(this).attr('data-patient-id');
                $.ajax({
                    url: '/get/all/appointments/patient/' + patient_id,
                    success: function (response) {
                        //$("div.visits > span").html(response);\
                        $("#modal-response  h4").html('<i class="material-icons">local_hospital</i> Patient All Visits');
                        $("#modal-response  .response").html(response);
                        $("#modal-response").modal('open');
                    }
                });
            });

            $(".delete-patient").click(function () {
                var ths = $(this);
                var patient_id = $(this).attr('data-patient-id');
                if (confirm('Do you want to delete?')) {
                    $.ajax({
                        url: "/patient/delete/" + patient_id,
                        success: function (response) {
                            window.location ="/patient/list";
                        }
                    });
                }
            });
            $(".file-tree").filetree({
                collapsed: true,

            });
        })
    </script>
@endsection
