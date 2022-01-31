@extends('layout.app')
@section('page-title') View Patient @endsection
@section('css')
    {!! Html::style('/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('/material/css/file-explore.css') !!}
    {!! Html::style('/css/croppie.css') !!}
    {!! Html::style(url('/').'/bootstrap/js/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css') !!}
    {!! Html::style(url('/').'/bootstrap/js/plugins/bootstrap-datepicker/css/datepicker.css') !!}
    {!! Html::style(url('/').'/bootstrap/assets/css/components.min.css') !!}

    <style>

        .img-preview {
            max-height: 3rem;
        }
        .editable.email ~ .editable-container input{ text-transform: lowercase !important;}
    </style>
@endsection

@section('content')

    <!-- START CONTENT -->
    <div class="content profile-page">
        <div class="card card-body">
            <div class="media flex-column flex-sm-row">
                <div class="mr-sm-2 mb-2 mb-sm-0">
                    <div class="card-img-actions">
                        <a href="#">
                            @if(!empty($patient->profile_picture))
                                <img id="uploadedimage"  class="img-fluid img-preview rounded" src="{!! Storage::disk('images')->url($patient->profile_picture) !!}">
                            @else
                                <img id="uploadedimage"  class="img-fluid img-preview rounded" src="{!! url('/').'/img/no-user-image.gif' !!}">
                            @endif

                            <span class="card-img-actions-overlay card-img"><i class="icon-play3"></i></span>
                        </a>
                    </div>
                </div>

                <div class="media-body">
                    <h6 class="media-title">{!! $patient->salutation !!} {!! $patient->first_name !!} {!! $patient->last_name !!}</h6>
                    <ul class="list-inline list-inline-dotted text-muted mb-2">
                        <li class="list-inline-item"><i class="icon-key mr-1"></i> idcsg-{!! $patient->patient_unique_id !!}</li>
                        <li class="list-inline-item"><i class="icon-calendar2 mr-1"></i> {!! date('d.m.Y',strtotime($patient->created_at)) !!}</li>
                    </ul>
                </div>

                <div class="ml-3 align-self-center">
                    <div class="list-icons">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(16px, 16px, 0px);">
                                <a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Send Reminder</a>
                                <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send An Email</a>
                                <a href="#" class="dropdown-item"><i class="icon-trash"></i> Move to archive</a>
                                <div class="dropdown-divider"></div>
                                <a href="/patient/list" class="dropdown-item text-danger"><i class="icon-arrow-left8"></i> Back to Patient List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-solid bg-danger-400 border-0">
                            <li class="nav-item"><a href="#biodata" class="nav-link active" data-toggle="tab" ><i class="icon-profile mr-1"></i> Biodate</a></li>
                            <li class="nav-item"><a href="#documents" class="nav-link" data-toggle="tab"><i class="icon-book2 mr-1"></i> Documents</a></li>
                            <li class="nav-item"><a href="#appointments" class="nav-link" data-toggle="tab"><i class="icon-calendar2 mr-1"></i> Appointments</a></li>
                            <li class="nav-item"><a href="#treatment-records"  data-item="treatment-cards"  data-id="{!! $patient->id !!}"  class="nav-link" data-toggle="tab"><i class="icon-list3 mr-1"></i> Treatment Record</a></li>
                            <li class="nav-item"><a href="#payments" class="nav-link" data-toggle="tab"><i class="icon-cash mr-1"></i> Payments</a></li>
                            <li class="nav-item"><a href="#communications" class="nav-link" data-toggle="tab"><i class="icon-comment mr-1"></i> Communications</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="biodata">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#personal-information" id="get-personal-biodata" class="nav-link active show" data-toggle="tab">Patient Biodata</a></li>
                                    <li class="nav-item"><a href="#update-information" class="nav-link" id="update-data" data-toggle="tab">Update Data</a></li>
                                    <li class="nav-item"><a href="#revised-information"   data-id="{!! $patient->id !!}"  class="nav-link revised-information" data-toggle="tab">Past Data</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="personal-information">
                                        <div class="row">
                                    <div class="col-sm-10">

                                        <div class="table-responsive">
                                            <table class="table table-borderless table-no-padding">
                                                <tbody>
                                                    <tr>
                                                        <td width="160px"><strong>Name: </strong></td>
                                                        <td><a href="#" class="editable" data-name="patient_name" data-type="text"  data-pk="{!! $patient->id !!}" data-url="/update/patient" data-title="Enter Patient Name">{!! $patient->salutation !!} {!! $patient->first_name !!} {!! $patient->last_name !!}</a></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Date of birth: </strong></td>
                                                        <td> @if(!empty($patient->date_of_birth)) <a href="#" class="editable" data-name="date_of_birth" data-format="dd.mm.yyyy" data-type="date"  data-pk="{!! $patient->id !!}" data-url="/update/patient" data-title="Enter Patient Date of Birth"> {!! date('d.m.Y', strtotime($patient->date_of_birth)) !!}</a>@endif</td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Email: </strong></td>
                                                        <td><a href="#" class="editable email" data-name="patient_email" data-type="text"  data-pk="{!! $patient->id !!}" data-url="/update/patient" data-title="Enter Patient Email">{!! $patient->patient_email !!} </a></td>
                                                         </td>
                                                    </tr>

                                                        <tr>
                                                            <td><strong>Phone: </strong></td>
                                                            <td>{!! $patient->patient_phone !!}</td>
                                                        </tr>

                                                    @if(!empty($patient->addresses[0]))
                                                        <tr>
                                                            <td><strong>Address: </strong></td>
                                                            <td>{!! $patient->addresses[0]->house_no !!},{!! $patient->addresses[0]->apartments_no !!},{!! $patient->addresses[0]->street_no !!},
                                                                {!! $patient->city !!}, {!! $patient->addresses[0]->country !!},{!! $patient->addresses[0]->zipcode !!} @if(isset($patient->addresses[0]) && ($patient->addresses->count()) > 1) <a style=" height: 18px; line-height: 17px; font-size: 11px;
"  href="#!" class="btn red white-text view-all-address">Show all address</a>@endif </td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <td><strong>Gender: </strong></td>
                                                        <td>{!! $patient->gender !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Occupation: </strong></td>
                                                        <td>{!! $patient->occupation !!}</td>
                                                    </tr>


                                                    <tr>
                                                        <td><strong>Company: </strong></td>
                                                        <td>{!! $patient->comapny_name !!}</td>
                                                    </tr>

                                                </tbody>

                                        </table>
                                        </div>



                                        <hr />
                                        <h5>Referral and Insurance Information</h5>
                                        <div class="table-responsive">
                                          <table class="table table-borderless table-no-padding">

                                                    <tbody>
                                                    <tr>
                                                        <td width="160px"><strong>Referral: </strong></td>

                                                        <td>@if((isset($referral) && !is_null($referral) && !empty($referral)) || !empty($patient->referral_name))
                                                                @if(isset($referral) && !is_null($referral) && !empty($referral))
                                                                    {{ $referral->patient_unique_id}} - {{ $referral->patient_name}}
                                                                @endif
                                                                @if(!empty($patient->referral_name))
                                                                    {{ $patient->referral_name}}
                                                                @endif
                                                            @else
                                                                <span class="red-text">Referral : No Information found</span>
                                                            @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Insurance By: </strong></td>
                                                        <td> @if(!empty($patient->insurance_by) && !empty($patient->insurance_number))
                                                                {{ $patient->insurance_by }} - {{ $patient->insurance_number }}
                                                            @else
                                                                <span class="text-danger">No information found</span>
                                                            @endif</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                        </div>

                                        <hr />
                                        <h5>Medical  Information</h5>
                                        @php
                                            $medi = '';
                                        if(isset($medical->illness) && !is_null($medical->illness)){
                                        $m = json_decode($medical->illness);
                                         if(is_array($m)){
                                       $medi = isset($medical->illness) && !is_null($medical->illness) && !empty($medical->illness)?implode(', ',json_decode($medical->illness)):'<span class="red-text">No disease found!</span>';


                                         }
                                         }



                                        @endphp
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-no-padding">

                                                <tbody>
                                                <tr>
                                                    <td width="160px"><strong>Medications: </strong></td>

                                                    <td>{!! isset($medical->medication) && !is_null($medical->medication)?$medical->medication:'<span class="text-danger">None!</span>' !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Allergies: </strong></td>
                                                    <td> {!! isset($medical->allegric) && !is_null($medical->allegric)?$medical->allegric:'<span class="text-danger">None!</span>' !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Medical Conditions: </strong></td>
                                                    <td> @if(!empty($medi)) {!! str_replace('_',' ',$medi) !!} @else <span class="text-danger">None!</span> @endif</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <hr />
                                        <h5>Medical  History</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-no-padding">

                                                <tbody>
                                                <tr>
                                                    <td width="160px"><strong>Medical History: </strong></td>

                                                    <td>{!! str_replace('_',' ',$history) !!}</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    </div>
                                    </div>
                                    <div class="tab-pane fade" id="update-information"></div>
                                    <div class="tab-pane fade" id="revised-information"></div>
                                </div>
                            </div>
                                <div class="tab-pane fade" id="documents">
                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                                </div>

                                <div class="tab-pane fade" id="appointments">
                                    DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg whatever.
                                </div>

                                <div class="tab-pane fade" id="treatment-records">

                                </div>
                            <div class="tab-pane fade" id="payments">
                                Payments
                            </div>

                            <div class="tab-pane fade" id="communications">
                                Communications
                            </div>

                        </div>

                    </div>

                </div>
            </div>



    </div>

    </div>

    <div id="get-revised-data-by-id" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

            </div>


        </div>
    </div>
    </div>



    @endsection

@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('/public/material/js/file-explore.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/js/croppie.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/selects/bootstrap_multiselect.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/pickers/color/spectrum.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/uploaders/plupload/plupload.full.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/uploaders/plupload/plupload.queue.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/uploaders/fileinput/plugins/purify.min.js') !!}
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

           $.fn.editable.defaults.mode = 'inline';
            $('.editable').editable();
            $("#update-data").click(function(){
                var patient_id = "{!! $patient->id !!}";

                $.ajax({
                    url:'/patient/edit/'+patient_id,
                    success:function(response){
                        $("#update-information").html(response);
                    }
                });
            });


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


            var counter = 1;
            $(".add-button").click(function (e) {

                $.ajax({
                    url: '/add/new/phone',
                    success: function (response) {
                        $(".phone").after(response);

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





            $("body").on('click','.save-user',function(e){
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

                            $(".success-message").html(response.message);
                            $(".success-message").show();

                            setTimeout(function(){
                                $(".success-message").hide();
                                $(".overlay").hide();
                            },2000);
                        }else{
                            $(".success-message").html(response.message);
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
                //$(".vertical-tab-items li").removeClass('active');
                //var tab = $(this).find('a').attr('data-item');
                //alert(tab);
                //$(this).addClass('active');
                //$(".vertical-tab").hide();
               // $(".vertical-tab[data-tab="+tab+"]").show();
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
                    case "treatment-cards":
                        $(".overlay").show();
                        $(".overlay .progress").show();
                        $(".overlay .message").hide();
                        $.ajax({
                            url:"/load/treatment-card/"+patient_id,
                            success:function(response){
                                $("#treatment-card-information").html(response);
                                $(".overlay").hide();
                            }
                        });
                        break;

                }



            });

            $("body").on('click','a[data-item=treatment-cards]',function(){
                var patient_id = "{!! $patient->id !!}";
                $.ajax({
                    url:"/load/treatment-card/"+patient_id,
                    success:function(response){
                        $("#treatment-records").html(response);
                        $(".overlay").hide();

                    }
                });
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
