<form id="consent_form" method="post" action="/save/patient/consent" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <input type="hidden" name="patient_id" value="{!! $patient->id !!}">
    <input type="hidden" name="doctor_id" value="{!! $doctor->id !!}">
    <input type="hidden" name="id" id="consent_id">
    <input type="hidden" name="treatment_id" value="{!! $treatment_id !!}">
<div class="row">
    <div class="input-field col s12 no-padding">
        <i class="material-icons prefix">account_box</i>
        <input id="patient_name" value="{!! $patient->patient_name !!}" readonly="readonly" type="text">
        <label for="patient_name" class="">Patient Name</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s12 no-padding">
        <i class="material-icons prefix">account_box</i>
        <input id="doctor_name" value="{!! ucwords($doctor->fname.' '.$doctor->lname) !!}" readonly="readonly" type="text">
        <label for="doctor_name" class="">Doctor Name</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s12 no-padding">
        <i class="material-icons prefix">call</i>
        <input id="contact_number" name="contact_number" value="{!! $patient->patient_phone !!}"  type="text">
        <label for="contact_number" class="">Contact No</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s12 no-padding">
        <i class="material-icons prefix">account_box</i>
        <input id="family_member" name="family_member"  type="text">
        <label for="family_member" class="">Family Member's Name</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s12 no-padding">
        <i class="material-icons prefix">call</i>
        <input id="family_contact_number" name="family_contact_number"  type="text">
        <label for="family_contact_number" class="">Family Member's Contact</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s12 no-padding">
        <i class="material-icons prefix">create</i>
        <textarea id="notes" name="notes" class="materialize-textarea"></textarea>
        <label for="notes" class="">Notes</label>
    </div>
</div>

{{--<div class="row">
    <input type="file" name="consent_document" style="display: none">
    <div class="input-field col s6 no-padding">
        <a href="#!">Upload Consent Document If You Have...</a>
    </div>


</div>--}}
</form>