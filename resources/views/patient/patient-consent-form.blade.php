
    <div class="card-panel">
        <form id="consent-form" action="/save/consent/form" enctype="multipart/form-data" method="post">
            <input type="hidden" name="patient_signature" id="patient_signature" />
            {{ csrf_field() }}
            <input type="hidden" name="patient_id" id="patient_id" value="{!! $patient_id !!}" />
            <input type="hidden" name="id" id="id" value="{!! isset($consent_form)?$consent_form->id:'' !!}" />

            <input type="hidden" name="appointment_id" id="appointment_id" value="{!! $appointment_id> 0 && !empty($appointment_id)?$appointment_id:NULL !!}" />
            <input type="hidden" name="treatment_id" id="treatment_id" />

            <div class="row">

                <div class="form-group col-sm-12 mb-2">
                   @foreach($consent_forms as $form)
                    <div class="custom-control custom-radio">
                        <input type="radio" name="consent_form_id" value="{!! $form->id !!}" @if(isset($consent_form) && $consent_form->consent_form_id==$form->id) checked @endif class="custom-control-input" id="form{!! $form->id !!}"  >
                        <label class="custom-control-label" for="form{!! $form->id !!}">{!! $form->name !!}</label>
                    </div>
                    @endforeach

                </div>

            </div>
        <div class="row mt-2">

            <div class="form-group col-sm-12">
                <label for="first_name" class="">Consent For</label>
                <input id="consent_for" name="consent_for" type="text" value="{!! isset($consent_form)?$consent_form->consent_for:'' !!}" class="form-control" required  data-error=".errorTxt1">


            </div>

        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="doctor_id" class="">Doctor</label>
                <select class="doctors_staff form-control input-sm" name="doctor_id"  data-error=".errorTxt4">

                    <option value="" disabled="" selected>Choose doctor</option>
                    @if(isset($doctors) && count($doctors) > 0)

                        @foreach($doctors as $doctor)
                            <option  @if(isset($consent_form) && $consent_form->doctor_id==$doctor->id) selected @endif  value="{!! $doctor->id !!}">{!! $doctor->fname.' '.$doctor->lname !!}</option>
                        @endforeach
                    @endif
                </select>

            </div>


            <div class="form-group col-sm-6">
                <label for="doctor_id" class="">Choose Service</label>

                <select class="procedure validate" required name="procedures" data-error=".errorTxt1">

                    <option value=""  selected disabled>Choose Procedure</option>

                    @if(isset($services) && count($services) > 0)



                        @foreach($services as $service)

                            <option @if(isset($consent_form) && $consent_form->procedures==$service->service_name) selected @endif value="{!! $service->service_name !!}" data-duration="{!! date('H:i', strtotime($service->duration)) !!}">{!! $service->service_name !!}</option>

                        @endforeach
                    @endif

                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="doctor_id" class="">Additional Procedures</label>
                @php
                    $additional_procedures = [];
                        if(isset($consent_form)){
                            $a_p = $consent_form->addtional_procedures;
                            if(!empty($a_p)){
                                $additional_procedures = explode(',',$a_p);

                            }
                        }
                @endphp

                <select class="addtional_procedure validate form-control" required name="addtional_procedures[]" multiple data-error=".errorTxt1">

                    <option value=""   disabled="">Choose Additional Procedure</option>

                    @if(isset($services) && count($services) > 0)



                        @foreach($services as $service)

                            <option value="{!! $service->service_name !!}" @if(isset($consent_form) && in_array($service->service_name,$additional_procedures)) selected @endif  data-duration="{!! date('H:i', strtotime($service->duration)) !!}">{!! $service->service_name !!}</option>

                        @endforeach
                    @endif

                </select>
            </div>
        </div>
        <h4>Medications</h4>
            @php
                $medications = [];
                    if(isset($consent_form)){
                        $m = $consent_form->medications;
                        if(!empty($m)){
                            $medications = explode(',',$m);
                         //   dd($medications);

                        }
                    }
            @endphp
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="medications_a">1. I’m the following medication/s</label>
                <input id="medications_a" class="form-control" value="{!! isset($consent_form) && isset($medications) && count($medications) > 0  && isset($medications[0])?$medications[0]:'' !!}" autocomplete="off" name="medications[]" type="text">


            </div>

            <div class="form-group col-sm-6">
                <label for="medications_b">2. Pre-Op Medication Taken</label>
                <input id="medications_b" class="form-control"  autocomplete="off"  value="{!! isset($consent_form) && isset($medications) && count($medications) > 0 && isset($medications[1])?$medications[1]:'' !!}" name="medications[]" type="text">

            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="medications_c">3. Post-Op Medication Taken</label>
                <input id="medications_c"  class="form-control"    autocomplete="off"  value="{!! isset($consent_form) && isset($medications) && count($medications) > 0  && isset($medications[2])?$medications[2]:'' !!}" name="medications[]" type="text">

            </div>

            <div class="form-group col-sm-6">
                <label for="medications_c">4. Post-Op Medication Taken</label>
                <input id="medications_d"  class="form-control"    autocomplete="off"  value="{!! isset($consent_form) && isset($medications) && count($medications) > 0  && isset($medications[3])?$medications[3]:'' !!}" name="medications[]" type="text">

            </div>
        </div>
            <div class="row">
            <div class="form-group col-sm-12">
                <label for="medications_c">5. Add Preception</label>
                    <input id="medications_d"   class="form-control"   autocomplete="off"  value="{!! isset($consent_form) && isset($medications) && count($medications) > 0  && isset($medications[4])?$medications[4]:'' !!}" name="medications[]" type="text">

                </div>
            </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="alternative_options" class="">Alternative Options</label>
                <textarea name="alternative_options" id="alternative_options" class="form-control">{!! isset($consent_form)?$consent_form->alternative_options:'' !!}</textarea>

            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
            <label class="mb-2">Sign On the Line Below:</label><br />
            <canvas id="thecanvas" width="440px" height="135px"></canvas>
            <br /><a href="#!" class="clear-canvas">Clear Signature Pad</a>
            </div>
        </div>
        <div class="row m-top-15">


                <a href="#!" class="btn btn-danger print-consent-form mr-1">Print Form</a>
            @if(isset($consent_form))
                <a href="#!" class="btn btn-danger save-consent-form right m-right-5">Update Form</a>

                @else
                <a href="#!" class="btn btn-danger save-consent-form right m-right-5">Save Form</a>
            @endif



        </div>

        </form>
    </div>
<script>
    var is_draw = false;
    var appointment_id = parseInt("{!! $appointment_id> 0 && !empty($appointment_id)?$appointment_id:0 !!}");
    var patient_id = {!! $patient_id !!}
    $(function(){

        $("select.procedure").select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',

        });

        $("select.addtional_procedure").select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',

        });

        $('select.doctors_staff').select2({
            //  placeholder: "Choose Start Time ",
            dropdownAutoWidth : 'true',

        });

        var canvas = document.getElementById('thecanvas');
        var signaturePad = new SignaturePad(canvas);
        var signaturePad_dummy = new SignaturePad(canvas);
        drawSignatureLine();
        $('button.save').click(function(){
            window.open(signaturePad.toDataURL("image/png"));
        });
        $('a.clear-canvas').click(function(){
            signaturePad.clear();
            drawSignatureLine();
        });

        $(".print-consent-form").click(function(){
            var image = signaturePad.toDataURL("image/png");
            var blank = document.createElement('canvas');
            blank.width = canvas.width;
            blank.height = canvas.height;
            if(image!= blank.toDataURL()){
               // alert('not');
                $("#patient_signature").val(image);
            }
            else{
                //alert('yes');
                $("#patient_signature").val('');
            }

           // return;
           // $(".overlay").show();
            $("#consent-form").attr('action','/print/consent/form');
            $("#consent-form").ajaxForm(function(response){
                $(".theme_radar").hide();
                setTimeout(function(){
                    $(".theme_radar").hide()
                    $("#patient-consent-form").modal('hide');
                },2000);
               // alert(response);
            }).submit();
        });

        $(".save-consent-form").click(function(){
            var image = signaturePad.toDataURL("image/png");
            var blank = document.createElement('canvas');
            blank.width = canvas.width;
            blank.height = canvas.height;
            if(image!= blank.toDataURL()){
                // alert('not');
                $("#patient_signature").val(image);
            }
            else{
                //alert('yes');
                $("#patient_signature").val('');
            }
            $(".overlay").show();
            $("#consent-form").attr('action','/save/consent/form');

            if( $("#consent-form").valid()){
                $("#consent-form").ajaxForm(function(response){
                    //   alert(response);
                    $(".ajax-loading").show();
                    $(".overlay").hide();
                    $(".patient-consent-show").html('<div class="progress"> <div class="indeterminate"></div></div>');
                    $("#patient-consent").modal();
                    //   $("#patient-consent-form").modal('open');

                    $.ajax({
                        url:"/patient/lists/consent/"+patient_id+"/"+appointment_id,
                        success:function(response){
                            $(".patient-consent-show").html(response);
                        }
                    });
                    setTimeout(function(){
                        $(".ajax-loading").hide();
                        $.ajax({
                            url:"/patient/lists/consent/"+patient_id+"/0",
                            success:function(response){
                                $("#patient-consent-result").html(response);

                                $(".add-new-consent-form").data('patient-id',patient_id);
                            }
                        });
                    },2000);
                }).submit();
            }

        });

        function drawSignatureLine(){
            var context = canvas.getContext('2d');
            context.lineWidth = .5;
            context.strokeStyle = '#333';
            context.beginPath();
            context.moveTo(0, 150);
            context.lineTo(500, 150);
            context.stroke();
            is_draw = true;
        }

        $("a.save-consent-form").click(function(){

        });

    })
</script>