@extends('layout.app')
@section('page-title') View Patient @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
@endsection

@section('content')
    <style>
        #patient-profile .card .card-content{ padding: 5px;}


        #patient-profile .patient-icon{ width: 80px;
            margin-top: -4px;}
        #patient-profile h5 > span {
            font-size: 15px;
            margin-left: 0px;}
        #patient-profile .patient-link-1{ list-style: none}
        #patient-profile .patient-link-1 li{ display: inline-block; border-right: 1px solid #8A99A8; padding: 0 10px;}
        #patient-profile .patient-link-1 li:last-child{ border: none; padding-right: 0 !important;}
        #patient-profile .patient-link-1 li a{ font-size: 12px; color: #0c80df}
        #patient-profile .margin-left-align{ margin-left: 18px}
        #patient-profile .heading{ font-size: 14px; font-weight: bold}
        #patient-profile .patient-detail button{     display: inline-block;
            font-size: 12px;
            background: #F44336;
            border: none;
            padding: 5px 10px;
            color: #FFF;
            margin-left: 5px;}
        #patient-profile table td,#patient-profile table th{     padding: 0 5px 7px 5px; border-bottom: 1px solid #ddd; font-size: 12px}
        #patient-profile table td.label{ width: 250px; text-align: right}
        #patient-profile table td.text{ padding-top: 10px}
        #patient-profile table i{    position: relative;
            top: 7px;}
        #patient-profile button > i{
            position: relative;
            font-size: 16px;
            top: 3px;
            left: -4px;
        }
        .select2-container--default .select2-selection--single .select2-selection__placeholder{font-size: 0.8rem}



        .select2-container--default .select2-search--dropdown .select2-search__field{ height: 30px !important}
        .select2-container--default .select2-selection--single .select2-selection__arrow b{border-color: #000 transparent transparent transparent;}
        .select2-search.select2-search--dropdown{ width:100%;}
        .select2-container--default .select2-selection{ border:none; border-bottom:1px solid #000; border-radius: 0}
        .select-wrapper input.select-dropdown{
            font-size:0.8rem; height: 2rem; line-height: 2rem}
        #update-booking-form{ padding: 0}
        .card.horizontal .card-image{ max-width: 25%}
        .card.horizontal .card-image img {

            max-width: 100%;

        }
         .card .card-action{ padding: 5px;}
        .card-action a{ font-size: 12px;}
        .card-content ul{ margin: 0; padding: 0}
        .small-text{ font-size: 12px; color:#828486}
        .patient-info-1 .material-icons{ font-size: 20px; position: relative;
            top:3px;}
       #patient-profile .tabs{ height: 30px}
        #patient-profile .tabs .tab{ height: 30px;    line-height: 26px;}
        #patient-profile  .tabs .tab a{ padding: 5px 10px}
        .medical-digital .tab-content, .patient-info-1{ min-height: 90px;}
        #patient-profile .card-panel{ padding: 5px;border-top: 2px solid #F00;}
        .heading a{ font-size: 12px !important;color:#0c80df}
        .card-panel .card-content p{ padding: 5px; border: 1px solid #C3C3C3; font-size: 12px}
    </style>
    <!-- START CONTENT -->
    <section id="content">

        <!--start container-->
        <div class="container patient-profile" id="patient-profile">
            <div class="row">
                <div class=" col s4">
                    <div class="card horizontal">
                        <div class="card-image">

                                <img id="uploadedimage" src="{!! url('/').'/img/no-user-image.gif' !!}">


                        </div>
                        <div class="card-stacked">
                            <div class="card-content patient-info-1">

                                <ul>
                                    <li>{!! $patient->salutation !!} {!! $patient->patient_name !!}</li>
                                    <li class="small-text"> <i class="material-icons">fingerprint</i> {!! $patient->patient_unique_id !!}</li>
                                    <li class="small-text">  <i class="material-icons">cake</i> {!! date('d.M.Y', strtotime($patient->date_of_birth)) !!}</li>
                                </ul>
                                <hr />

                                <address>

                                    @if(!empty($patient->city))
                                        <i class="fa fa-map-marker m-right-5"></i> {!! $patient->zipcode !!} {!! $patient->city !!}, {!! $patient->nationality !!} <br>
                                    @endif
                                    @if(!empty($patient->patient_phone))
                                        <i class="fa fa-phone m-right-5"></i>{!! $patient->patient_phone !!}
                                    @endif
                                </address>


                            </div>


                        </div>
                    </div>

                </div>


                <div class=" col s8 medical-digital">
                    <div class="card ">
                        <div class="card-content ">


                            <div class="card-tabs">
                                <ul class="tabs ">
                                    <li class="tab"><a class="active" href="#drug-allergy">Drug Allergy </a></li>
                                    <li class="tab"><a  href="#medical-history">Medical History</a></li>
                                    <li class="tab"><a href="#digital-imaging">Digital Imaging</a></li>
                                    <li class="tab"><a href="#saved-items">Saved Items</a></li>
                                </ul>
                            </div>
                            <div class="card-content grey lighten-4">
                                <div id="drug-allergy" class="tab-content">Test 1</div>
                                <div id="medical-history"  class="tab-content">Test 2</div>
                                <div id="digital-imaging"  class="tab-content">Test 3</div>
                                <div id="saved-items"  class="tab-content">Test 3</div>
                            </div>




                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col s12">
                    <div class="card-panel">

                            <div class="heading">Notes and Attachments <a href="#!">New Notes</a> | <a href="#!">Attach File</a> </div>
                        <div class="card-content"><p>No records to display</p></div>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">

                        <div class="heading">Appointments <a href="#!">New appointment</a>  </div>
                        <div class="card-content"><p>No records to display</p></div>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">

                        <div class="heading">Activity History </div>
                        <div class="card-content"><p>No records to display</p></div>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">

                        <div class="heading">Patient History </div>
                        <div class="card-content">
                            <table>
                                <thead>
                                <tr>
                                    <th width="20%">Date</th>
                                    <th width="20%">User</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>25.11.2018</td>
                                        <td>Marlar</td>
                                        <td>Change <strong>Occupation</strong> from <strong>Non Specified</strong> to Software Engineer</td>
                                    </tr>
                                    <tr>
                                        <td>25.11.2018</td>
                                        <td>Marlar</td>
                                        <td>Change <strong>Occupation</strong> from <strong>Non Specified</strong> to Software Engineer</td>
                                    </tr>
                                    <tr>
                                        <td>25.11.2018</td>
                                        <td>Marlar</td>
                                        <td>Change <strong>Occupation</strong> from <strong>Non Specified</strong> to Software Engineer</td>
                                    </tr>
                                    <tr>
                                        <td>25.11.2018</td>
                                        <td>Marlar</td>
                                        <td>Change <strong>Occupation</strong> from <strong>Non Specified</strong> to Software Engineer</td>
                                    </tr>
                                    <tr>
                                        <td>25.11.2018</td>
                                        <td>Marlar</td>
                                        <td>Change <strong>Occupation</strong> from <strong>Non Specified</strong> to Software Engineer</td>
                                    </tr>
                                    <tr>
                                        <td>25.11.2018</td>
                                        <td>Marlar</td>
                                        <td>Change <strong>Occupation</strong> from <strong>Non Specified</strong> to Software Engineer</td>
                                    </tr>
                                </tbody>


                            </table>
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
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
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
        })
    </script>
@endsection
