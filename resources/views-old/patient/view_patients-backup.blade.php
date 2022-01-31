@extends('layout.app')
@section('page-title') View Patient @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
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
            margin-bottom: 100px
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
            width: 94% !important;
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

        .patient-picture{ width: 150px; border-radius: 50%; height: 150px; background: url("/public/img/medium-default-avatar.png") no-repeat; background-position: center; background-size: cover; margin: auto}
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

    </style>
    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">

            <div id="profile-page" class="section">


                <!-- profile-page-content -->
                <div id="profile-page-content" class="row">
                    <!-- profile-page-sidebar-->
                    <div id="profile-page-sidebar" class="col s12 m3 patient-info">
                        <!-- Profile About  -->
                        <div class="card red center">
                            <div class="card-content white-text">
                              {{--  <img src="/public/img/no-image-available.jpg" alt="No Image" />--}}
                                <div class="patient-picture"></div>
                                <span class="card-title">{!! $patient->salutation !!} {!! $patient->patient_name !!}<br>
                                    <i class="fa fa-key m-right-5"></i> {!! $patient->patient_unique_id !!} </span>



                                <address>
                                    @if(!empty($patient->date_of_birth))
                                    <i class="fa fa-calendar m-right-5"></i> {!! date('d.M.Y', strtotime($patient->date_of_birth)) !!} <br>
                                    @endif
                                        @if(!empty($patient->city))
                                    <i class="fa fa-map-marker m-right-5"></i> {!! $patient->zipcode !!} {!! $patient->city !!}, {!! $patient->nationality !!} <br>
                                        @endif
                                        @if(!empty($patient->patient_phone))
                                    <i class="fa fa-phone m-right-5"></i>{!! $patient->patient_phone !!}
                                            @endif
                                </address>
                            </div>
                        </div>
                        <!-- Profile About  -->

                        <!-- Profile About Details  -->
                        <ul id="profile-page-about-details" class="collection z-depth-1">
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="fa fa-user-circle m-right-10"></i> Gender</div>
                                    <div class="col s7 grey-text text-darken-4 right-align" id="gender">{!! $patient->gender !!}</div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="fa fa-envelope m-right-10"></i> Email</div>
                                    <div class="col s7 grey-text text-darken-4 right-align" style="text-transform: lowercase !important;" id="patient_email">{!! $patient->patient_email !!}</div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="fa fa-briefcase m-right-10"></i> Occupation</div>
                                    <div class="col s7 grey-text text-darken-4 right-align" id="occupation">{!! $patient->occupation !!}</div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="fa fa-building m-right-10"></i> Company</div>
                                    <div class="col s7 grey-text text-darken-4 right-align" id="company">{!! $patient->comapny_name !!}</div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="fa fa-id-card-o m-right-10"></i> Card Type</div>
                                    <div class="col s7 grey-text text-darken-4 right-align" id="card_type">{!! $patient->card_type !!}</div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="fa fa-id-card-o m-right-10"></i> Card#</div>
                                    <div class="col s7 grey-text text-darken-4 right-align" id="card_number">{!! $patient->card_number !!}</div>
                                </div>
                            </li>

                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="fa fa-address-card m-right-10"></i> Address</div>
                                    <div class="col s7 grey-text text-darken-4 right-align" id="address">{!! $address !!}</div>
                                </div>
                            </li>

                        </ul>
                        <!--/ Profile About Details  -->

                        <!-- Profile About  -->
                        <div class="card red darken-2">
                            <div class="card-content white-text center-align">

                                <p>Referral and Insurance</p>
                            </div>
                        </div>
                        <!-- Profile About  -->
                        <ul id="profile-referral-about-details" class="collection z-depth-1">
                            @if(isset($refferal))
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="fa fa-tag m-right-10"></i> Referral Code</div>
                                    <div class="col s7 grey-text text-darken-4 right-align">{!! $referral->patient_unique_id !!}</div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="fa fa-tag m-right-10"></i> Referral Name</div>
                                    <div class="col s7 grey-text text-darken-4 right-align">{!! $referral->patient_name !!}</div>
                                </div>
                            </li>
                            @endif
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="fa fa-shield m-right-10"></i> Insurance By</div>
                                    <div class="col s7 grey-text text-darken-4 right-align" id="insurance_by">{!! $patient->insurance_by !!}</div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="fa fa-shield m-right-10"></i> Insurance #</div>
                                    <div class="col s7 grey-text text-darken-4 right-align" id="insurance_number">{!! $patient->insurance_number !!}</div>
                                </div>
                            </li>


                        </ul>


                        <div class="card red darken-2">
                            <div class="card-content white-text center-align">

                                <p>Medical Information</p>
                            </div>
                        </div>
                        <!-- Profile About  -->
                        <ul id="profile-referral-about-details" class="collection z-depth-1">
                            @if(isset($medical) && !is_null($medical))
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s9 grey-text darken-1"><i class="fa fa-tag m-right-10"></i>Are you on medication?</div>
                                        <div class="col s2 grey-text text-darken-4 right-align" id="is_medication">{!! $medical->is_medication !!}</div>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s5 grey-text darken-1"><i class="fa fa-tag m-right-10"></i>Medications</div>
                                        <div class="col s7 grey-text text-darken-4 right-align">{!! $medical->medication !!}</div>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s10 grey-text darken-1"><i class="fa fa-tag m-right-10"></i>Are you allegric to any medication?</div>
                                        <div class="col s1 grey-text text-darken-4 right-align" id="is_allegric">{!! $medical->is_allegric !!}</div>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s5 grey-text darken-1"><i class="fa fa-tag m-right-10"></i>Allegric</div>
                                        <div class="col s7 grey-text text-darken-4 right-align">{!! $medical->allegric !!}</div>
                                    </div>
                                </li>
                                @php
                                    $medi = isset($medical->illness)?json_decode($medical->illness):array();
//echo "<pre>"; print_r($medi); echo "</pre>;

                                @endphp
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s12 grey-text darken-1"><i class="fa fa-tag m-right-10"></i>Do you suffer from any of the following ilnessess?</div>
                                        @if(isset($medi))
                                        <ul class="illness">
                                           @foreach($medi as $m)
                                               <li>{{ $m }}</li>
                                               @endforeach

                                        </ul>
                                        @endif
                                    </div>
                                </li>

                            @endif



                        </ul>

                    </div>
                    <!-- profile-page-sidebar-->

                    <!-- profile-page-wall -->
                    <div id="profile-page-wall" class="col s12 m9">
                        <!-- profile-page-wall-share -->
                        <div id="profile-page-wall-share" class="row">
                            <div class="col s12">
                                <ul class="tabs tab-profile z-depth-1 red">
                                    <li class="tab col s3 selected"><a class="white-text waves-effect waves-light active " id="appointment-panel" role="tab-action" data-tab="appointments"><i class="material-icons">date_range</i> Appointment History</a>
                                    </li>
                                    <li class="tab col s2"><a class="white-text waves-effect waves-light" id="treatment-cards-panel" role="tab-action" data-tab="treatment-card"><i class="material-icons">local_hospital</i> Treatment Cards</a>
                                    </li>
                                    <li class="tab col s2"><a class="white-text waves-effect waves-light"  role="tab-action" id="documents-panel" data-tab="documents"><i class="material-icons">insert_drive_file</i> Documents</a>
                                    </li>
                                    <li class="tab col s2"><a class="white-text waves-effect waves-light" id="activity-panel"  role="tab-action" data-tab="activity-log"><i class="material-icons">list</i> Activity Log</a>
                                    </li>
                                    <li class="tab col s2"><a class="white-text waves-effect waves-light" id="invoices"  role="tab-action" data-tab="invoices"><i class="material-icons">monetization_on</i> Invoices History</a>
                                    </li>
                                </ul>
                                <!-- UpdateStatus-->

                            </div>
                        </div>
                        <!--/ profile-page-wall-share -->
                        <div class="show-section-detail">
                            <div class="card">
                                <div class="card-content">
                                    @if(isset($appointments) && !is_null($appointments))
                                    <ul class="collapsible popout">
                                        @foreach($appointments as $key=>$appointment)

                                        <li @if($key==0) class="active" @endif>
                                            <div class="collapsible-header @if($key==0) active @endif"><i class="material-icons">date_range</i> {!! $appointment->service_name !!} at {!! date('d.M.Y', strtotime($appointment->booking_date)) !!}</div>
                                            <div class="collapsible-body" @if($key==0) style="display: block" @endif><span>
                                                     <ul class="appointment-info">
                                                        <li >
                                                           <div class="col s1"><i class="material-icons m-top-10">access_time</i></div>  <div class="col s10">

                                                                    <div class="appointment-booking-date">{{ date('l d.m.Y', strtotime($appointment->booking_date)) }} </div>


                                                                <div class="appointment-time-slots blue-grey-text lighten-5">{{ date('H:i A', strtotime($appointment->start_time)) }} -   {{ date('H:i A', strtotime($appointment->end_time)) }}</div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col s1"> <i class="material-icons m-top-5">local_hospital</i></div>
                                                            <div class="col s10">Dr. {{ $appointment->fname.' '.$appointment->lname }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="col s1"> <i class="material-icons m-top-5">vpn_key</i></div>
                                                            <div class="col s10">{{ $appointment->room_name }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="col s1"> <i class="material-icons m-top-5">location_on</i></div>
                                                            <div class="col s10">{{ $appointment->location_name }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="col s1"> <i class="material-icons m-top-5">comment</i></div>
                                                            <div class="col s10">{{ $appointment->notes }}</div>
                                                        </li>
                                                    </ul>
                                                    <div style="clear: both"></div>
                                                </span></div>
                                        </li>
                                       @endforeach
                                    </ul>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <!-- profile-page-wall-posts -->

                        <!--/ profile-page-wall-posts -->

                    </div>
                    <!--/ profile-page-wall -->

                </div>
            </div>
        </div>



        <!--end container-->


    </section>
@endsection


@section('js')

    {!! Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek') !!}

    <script>

$(function(){
    $("a[role=tab-action]").click(function(){
        $("ul.tab-profile li").removeClass('selected');
        $(this).parent().addClass('selected');
        var tab = $(this).attr('data-tab');
        var patient_id = parseInt("{!! $patient_id !!}");
        $(".overlay").show();
        $(".show-section-detail").html('');
        switch(tab){
            case "appointments":
                $.ajax({
                    url:"/patient/appointments/"+patient_id,
                    success:function(response){
                        $(".overlay").hide();
                        $(".show-section-detail").html(response);
                    }
                });
            break;

            case "treatment-card":
                $.ajax({
                    url:"/patient/treatment-cards/"+patient_id,
                    success:function(response){
                        $(".overlay").hide();
                        $(".show-section-detail").html(response);
                    }
                });
            break;

            case "documents":
                $.ajax({
                    url:"/patient/documents/"+patient_id,
                    success:function(response){
                        $(".overlay").hide();
                        $(".show-section-detail").html(response);
                    }
                });
                break;

        }
    });
})



    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection