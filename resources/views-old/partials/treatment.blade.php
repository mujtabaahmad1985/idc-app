<style>
    #treatment-form
</style>

<form id="treatment-form" action="/save/treatment" enctype="multipart/form-data" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="patient_id" />
    <input type="hidden" name="appointment_id" value="{!! isset($treatment)?$treatment->appointment_id:"" !!}" />
    <input type="hidden" name="treatment_id" id="treatment_id" value="{!! isset($treatment)?$treatment->id:"" !!}" />
<div class="row m-top-10">

        <div class="input-field col s12 no-padding">
            <i class="material-icons prefix">local_hospital</i>
            <div class="chips treatment" id="treatment" name="treatment"></div>
            <input type="hidden" name="treatments_done"  value="{!! isset($treatment)?$treatment->treatment_done:"" !!}" />
        </div>



</div>
<div class="row">
    <div class="input-field col s12 no-padding">
        <i class="material-icons prefix">error</i>
        <input id="complaint" name="complaint" value="{!! isset($treatment)?$treatment->complaint:"" !!}" type="text">
        <label for="complaint" class="">Complaint</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s12 no-padding">
        <i class="material-icons prefix">airline_seat_flat_angled</i>
        <input id="finding" name="finding" value="{!! isset($treatment)?$treatment->finding:"" !!}" type="text">
        <label for="finding" class="">Finding</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s12 no-padding">
        <i class="material-icons prefix">description</i>
        <input id="x_rays" name="x_rays" value="{!! isset($treatment)?$treatment->x_rays:"" !!}" type="text">
        <label for="x_rays" class="">X-Ray</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s12 no-padding">
        <i class="material-icons prefix"></i>
        <input id="advice" name="advice" value="{!! isset($treatment)?$treatment->advice:"" !!}" type="text">
        <label for="advice" class="">Advice</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s12 no-padding">
        <i class="material-icons prefix"></i>
        <input id="pre_med" name="pre_med" value="{!! isset($treatment)?$treatment->pre_med:"" !!}" type="text">
        <label for="pre_med" class="">Pre Med.</label>
    </div>
</div>


    <div class="row">
        <div class="input-field col s12 no-padding">
            <i class="material-icons prefix"></i>
            <input id="recall" name="recall" value="{!! isset($treatment)?$treatment->recall:"" !!}" type="text">
            <label for="recall" class="">Recall</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12 no-padding">
            <i class="material-icons prefix"></i>
            <input id="post_treatment_advice" value="{!! isset($treatment)?$treatment->post_treatment_advice:"" !!}" name="post_treatment_advice" type="text">
            <label for="post_treatment_advice" class="">Post Treatment Advice</label>
        </div>
    </div>

    <div class="row">

        <div class="input-field col s12 no-padding">
            <i class="material-icons prefix">local_hospital</i>
            <div class="chips medication"></div>
            <input type="hidden" name="medication"  value="{!! isset($treatment)?$treatment->medication:"" !!}" />
        </div>
    </div>
<div class="row">
    <div class="col m12">
        <a href="#!" class="save-treatment-by-click red-text">Save Treatment Card</a>
    </div>
    <div class="col m12">
        <div class="card green message success-message" style="display: none;">
            <div class="card-content white-text">
                <p>d</p>
            </div>
        </div>
    </div>
</div>
    <div class="row">
       <ul class="button-links" @if(!isset($treatment)) style="display: none" @endif>
           <li><a href="#!"  id="consent" data-treatment-id="{!! isset($treatment)?$treatment->id:"" !!}"><i class="material-icons prefix">description</i> Patient Consent Form</a> </li>
           <li><a href="#!" id="product"  data-treatment-id="{!! isset($treatment)?$treatment->id:"" !!}"><i class="material-icons prefix">local_pharmacy</i> Products</a> </li>
           <li><a href="#!" id="next-appointment"  data-treatment-id="{!! isset($treatment)?$treatment->id:"" !!}"><i class="material-icons prefix">date_range</i> Next Appointment</a> </li>
       </ul>
    </div>
</form>
<script>
    var t = "{!! isset($treatment)?$treatment->treatment_done:"" !!}";
    var m = "{!! isset($treatment)?$treatment->medication:"" !!}";
var p =[];
var m_p = [];
var ex = [];
var m_ex = [];
    if(t!=""){
        t = t.split(',');

        $.each(t,function(i,v){
            var obj = {tag:v};
            ex.push(v);
            p.push(obj);
        });
       t=p;

    }
    if(m!=""){
        m = m.split(',');

        $.each(m,function(i,v){
            var obj = {tag:v};
            m_ex.push(v);
            m_p.push(obj);
        });
        m=m_p;

    }
    $(function(){




        var existing_treatment = (t==""?[]:t);
        var treatment = (ex==""?[]:ex);
        var existing_medication = (m==""?[]:m);
        var medication = (m_ex==""?[]:m_ex);

        $('.treatment').material_chip({
            placeholder: 'Enter Treatment',
            data:existing_treatment
        });


        $('.treatment').on('chip.add', function(e, chip){
            // you have the added chip here
            // console.log(chip);
            treatment.push(chip.tag);
            $("#treatment-card input[name=treatments_done]").val(treatment.join());
        });

        $('.treatment').on('chip.delete', function(e, chip){
            // you have the added chip here
            treatment = jQuery.grep(treatment, function(value) {
                return value != chip.tag;
            });
            $("#treatment-card input[name=treatments_done]").val(treatment.join());
        });


        $('.medication').material_chip({
            placeholder: 'Enter Medication',
            data:existing_medication
        });

        $('.medication').on('chip.add', function(e, chip){
            // you have the added chip here
            // console.log(chip);
            medication.push(chip.tag);
            $("#treatment-card input[name=medication]").val(medication.join());
        });
        $('.medication').on('chip.delete', function(e, chip){
            // you have the added chip here
            treatment = jQuery.grep(medication, function(value) {
                return value != chip.tag;
            });
            $("#treatment-card input[name=medication]").val(medication.join());
        });

        $("#consent").click(function(){
            $("#patient-consent-modal").modal('open');
            var id = $(this).attr('data-treatment-id');
            $.ajax({
                url:"/get/patient/consent/"+id,
                success:function (response) {
                    $("#consent-form").html(response);
                    $("#consent-form input[type=text]").focusin();
                    var timeoutId;
                    $('#consent_form input, #consent_form textarea').on('input propertychange change', function() {



                        clearTimeout(timeoutId);
                        timeoutId = setTimeout(function() {
// Runs 1 second (1000 ms) after the last change
//$(".progress").show();
                            $(".ajax-loading").hide();
                            $("#consent_form").ajaxForm(function(response){
                                $(".progress").hide();
                                $(".ajax-loading").show();
                               // $("#consent_id").val(response);

                                setTimeout(function(){
                                    $(".ajax-loading").hide();
                                },1500);
                            }).submit();

                        }, 2000);
                    });
                }
            });

        });

        $("#product").on('click', function () {
            //if($(this).is(":checked")){
            var treatment_id = $(this).attr('data-treatment-id');
                $.ajax({
                    url:"/get/patient/product/"+treatment_id,
                    success:function (response) {
                        $("#product-form").html(response);
                        $("#treament_id_for_product").attr('treatment-id',treatment_id);
                    }
                });
                $("#patient-product-modal").modal('open');
          //  }
        });

        $("#next-appointment").on('click', function () {
            //if($(this).is(":checked")){
           /* var treatment_id = $(this).attr('data-treatment-id');
            $.ajax({
                url:"/get/patient/product/"+treatment_id,
                success:function (response) {
                    $("#product-form").html(response);
                    $("#treament_id_for_product").attr('treatment-id',treatment_id);
                }
            });*/
            $("#next-appointment-modal").modal('open');
            //  }
        });

        var timeoutId;
        $('#treatment-form input, #treatment-form textarea').on('input propertychange change', function() {



            clearTimeout(timeoutId);
            timeoutId = setTimeout(function() {
// Runs 1 second (1000 ms) after the last change
//$(".progress").show();
                $(".ajax-loading").hide();
                $("#treatment-form").ajaxForm(function(response){
                    $(".progress").hide();
                    $(".ajax-loading").show();
                    $("#treatment_id").val(response);
                    $("#consent").attr('data-treatment-id', response);
                    $("#product").attr('data-treatment-id', response);
                    $("#next-appointment").attr('data-treatment-id', response);
                    $(".button-links").fadeIn();
                    setTimeout(function(){
                        $(".ajax-loading").hide();
                    },1500);
                }).submit();

            }, 2000);
        });
       // if(t!=""){
            $("input[type=text]").focusin();

     //   }

        $(".save-treatment-by-click").click(function(){
            $(".ajax-loading").hide();
            $("#treatment-form").ajaxForm(function(response){
                $(".progress").hide();
                $(".ajax-loading").show();
                $("#treatment_id").val(response);
                $("#consent").attr('data-treatment-id', response);
                $("#product").attr('data-treatment-id', response);
                $("#next-appointment").attr('data-treatment-id', response);
                $(".button-links").fadeIn();
                $(".message p").html('Treatment card is saved.');
                $(".message").show();
                setTimeout(function(){
                    $(".ajax-loading").hide();
                    $(".message").hide();
                    $("#add-treatment-modal").modal('close');
                },2500);


            }).submit();
        });
    })
</script>