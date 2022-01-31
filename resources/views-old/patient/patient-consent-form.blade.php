<style>
    #patient-consent-form .select2 {
        width: 395px !important;
        float: right;
        margin-bottom: 15px;
    }
    .select2-container--default .select2-selection--single{ background: none; border-color: #9e9e9e !important}
    .select2-container--default .select2-selection {
        border: none;
        border-bottom: 1px solid #000;
        border-radius: 0;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field {
        height: 30px !important;
    }
    canvas#thecanvas{border: dashed 1px #333; cursor:pointer; background-color: rgba(255,255,255,.85); width: 440px; height: 135px;}
    .m-right-5{ margin-right: 5px;}
    #patient-consent-form .btn{    height: 26px; line-height: 29px;}
    .multiple-selection.input-field input[type=search]{ height: 0rem !important;}
    .multiple-selection.input-field .select2-container--default .select2-selection{ height: auto !important;}
    .multiple-selection.input-field .select2-container--default .select2-selection {

        border-bottom: 1px solid #9e9e9e !important;
    }
    .multiple-selection.input-field .select2-container--default.select2-container--focus .select2-selection--multiple {
        border:1px solid  #9e9e9e !important ;
    }


</style>
    <div class="card-panel">
        <form id="consent-form" action="/save/consent/form" enctype="multipart/form-data" method="post">
            <input type="hidden" name="patient_signature" id="patient_signature" />
            {{ csrf_field() }}
            <input type="hidden" name="patient_id" id="patient_id" value="{!! $patient_id !!}" />
            <input type="hidden" name="signature" id="signature" />
            <input type="hidden" name="appointment_id" id="appointment_id" value="{!! $appointment_id> 0 && !empty($appointment_id)?$appointment_id:NULL !!}" />
            <input type="hidden" name="treatment_id" id="treatment_id" />
        <div class="row">
            <div class="input-field col s12 no-padding">
                <i class="material-icons prefix">event_note</i>
                <input id="consent_for" value="" name="consent_for" type="text">
                <label for="consent_for" class="">Consent For</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 select2-patient no-padding">
                <i class="material-icons prefix">local_hospital</i>
                <select class="doctors_staff" name="doctor_id"  data-error=".errorTxt4">

                    <option value="" disabled="" selected>Choose doctor</option>
                    @if(isset($doctors) && count($doctors) > 0)

                        @foreach($doctors as $doctor)
                            <option value="{!! $doctor->id !!}">{!! $doctor->fname.' '.$doctor->lname !!}</option>
                        @endforeach
                    @endif
                </select>
                <div class="errorTxt4 error un_available_doctor_id"></div>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s12 no-padding ">
                <i class="material-icons prefix">local_pharmacy</i>

                <select class="procedure validate" required name="procedures" data-error=".errorTxt1">

                    <option value=""  selected disabled>Choose Procedure</option>

                    @if(isset($services) && count($services) > 0)



                        @foreach($services as $service)

                            <option value="{!! $service->service_name !!}" data-duration="{!! date('H:i', strtotime($service->duration)) !!}">{!! $service->service_name !!}</option>

                        @endforeach
                    @endif

                </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 no-padding multiple-selection">
                <i class="material-icons prefix">local_pharmacy</i>

                <select class="addtional_procedure validate" required name="addtional_procedures[]" multiple data-error=".errorTxt1">

                    <option value=""   disabled="">Choose Additional Procedure</option>

                    @if(isset($services) && count($services) > 0)



                        @foreach($services as $service)

                            <option value="{!! $service->service_name !!}" data-duration="{!! date('H:i', strtotime($service->duration)) !!}">{!! $service->service_name !!}</option>

                        @endforeach
                    @endif

                </select>
            </div>
        </div>
        <h4>Medications</h4>
        <div class="row">
            <div class="input-field col s12 no-padding">
                <i class="material-icons prefix">local_hospital</i>
                <input id="medications_a" value="" autocomplete="off" name="medications[]" type="text">
                <label for="medications_a">1. I’m the following medication/s</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 no-padding">
                <i class="material-icons prefix">local_hospital</i>
                <input id="medications_b"  autocomplete="off"  value="" name="medications[]" type="text">
                <label for="medications_b">2. Pre-Op Medication Taken</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 no-padding">
                <i class="material-icons prefix">local_hospital</i>
                <input id="medications_c"  autocomplete="off"  value="" name="medications[]" type="text">
                <label for="medications_c">3. Post-Op Medication Taken</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 no-padding">
                <i class="material-icons prefix">local_hospital</i>
                <input id="medications_d"  autocomplete="off"  value="" name="medications[]" type="text">
                <label for="medications_c">4. Post-Op Medication Taken</label>
            </div>
        </div>
            <div class="row">
                <div class="input-field col s12 no-padding">
                    <i class="material-icons prefix">local_hospital</i>
                    <input id="medications_d"  autocomplete="off"  value="" name="medications[]" type="text">
                    <label for="medications_c">5. Add Preception</label>
                </div>
            </div>

        <div class="row">
            <div class="input-field col s12 no-padding">
                <i class="material-icons prefix"></i>
                <textarea name="alternative_options" id="alternative_options" class="materialize-textarea" />
                <label for="alternative_options" class="">Alternative Options</label>
            </div>
        </div>

        <div class="row">
            <label>Sign On the Line Below:</label><br/>
            <canvas id="thecanvas" width="440px" height="135px"></canvas>
            <a href="#!" class="clear-canvas">Clear Signature Pad</a>
        </div>
        <div class="row m-top-15">


                <a href="#!" class="btn red print-consent-form right">Print Form</a>
                <a href="#!" class="btn red save-consent-form right m-right-5">Save Form</a>


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
                //$(".overlay").hide();
                setTimeout(function(){
                    $(".ajax-loading").hide();
                    $("#patient-consent-form").modal('close');
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

            $("#consent-form").ajaxForm(function(response){
             //   alert(response);
                $(".ajax-loading").show();
                $(".overlay").hide();
                $(".patient-consent-show").html('<div class="progress"> <div class="indeterminate"></div></div>');
                $("#patient-consent").modal('open');
                //   $("#patient-consent-form").modal('open');

                $.ajax({
                    url:"/patient/lists/consent/"+patient_id+"/"+appointment_id,
                    success:function(response){
                        $(".patient-consent-show").html(response);
                    }
                });
                setTimeout(function(){
                    $(".ajax-loading").hide();
                    $("#patient-consent-form").modal('close');
                },2000);
            }).submit();
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