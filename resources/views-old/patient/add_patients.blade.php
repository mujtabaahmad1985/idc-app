@extends('layout.app')
@section('page-title') Add Patient @endsection
@section('css')

@endsection

@section('content')

    <!-- START CONTENT -->
    <div class="content">
        <form id="form" method="post" action="/patient/save" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">New Patient Biodata</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                    <div class="container">

                            <input type="hidden" name="patient_id" id="patient_id" />
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="unique_id">Unique Code</label>
                                        <input id="unique_id" class="alphanumaric long-value-restriction form-control"  name="patient_unique_id" value="{!! $unique_id !!}" type="text"  readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="custom-control custom-checkbox" style="margin-top: 36px">
                                        <input type="checkbox" class="custom-control-input" id="unique-id-operator"  >
                                        <label class="custom-control-label" for="unique-id-operator">Allow to change</label>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="unique_id">Custom Code</label>
                                        <input id="custom_code" name="custom_code" type="text"
                                               class="alphanumaric form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <label>Salutation</label>
                                    <select name="salutation" class="select2 form-control">
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input id="first_name" name="first_name" type="text"    required  class="alphanumaric long-value-restriction form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input id="last_name" name="last_name" type="text"    required  class="alphanumaric long-value-restriction form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="last_name">Date of Birth</label>
                                        <select name="day" id="day-date-of-birth" required>
                                            <option value=""> Day</option>
                                            @for($m=1; $m<=31; ++$m){
                                            <option value="{!! $m !!}">{!! $m !!}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="month-date-of-birth" style="visibility: hidden" class="">Date of Birth </label>
                                        <select name="month" id="month-date-of-birth" required>
                                            <option value=""> Month</option>
                                            @for($m=1; $m<=12; ++$m){
                                            <option value="{!! $m !!}">{!!  date('F', mktime(0, 0, 0, $m, 1)) !!}</option>
                                            @endfor
                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="year-date-of-birth" style="visibility: hidden" class="">Date of Birth </label>
                                        <select name="year" id="year-date-of-birth" required>
                                            <option value="">Year</option>
                                            @for($i=2016; $i>=1910; $i--)
                                                <option value="{!! $i !!}">{!! $i !!}</option>
                                            @endfor
                                        </select>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name">Gender</label>
                                        <select name="gender" id="gender" class="gender">
                                            <option value="">Choose Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row phone">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="last_name">Code</label>
                                        <select class="icons" name="country_area_code" id="country_area_code">
                                            <option value="">Choose Country</option>
                                            @foreach($countries as $country)
                                                <option @if($current_country==$country->name) selected  @endif value="{!! $country->code !!}" data-code="{!! $country->code !!}" class="left circle">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="last_name">Number</label>
                                        <input id="contact_number" name="contact_number"    type="text" class="alphanumaric long-value-restriction form-control">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <label for="last_name" style="visibility: hidden;">Add more</label>
                                    <a href="#!" class="add-button text-danger mt-1"><i class="icon-plus-circle2"></i> </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name">Email</label>
                                        <input id="email" name="patient_email" type="email"  class="validate form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name">Choose Nationality</label>
                                        <select class="icons" name="nationality" >
                                            <option value="">Choose Nationality</option>
                                            @foreach($countries as $country)
                                                <option value="{!! $country->name !!}" data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg" class="left circle">{!! $country->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="last_name">Card Type</label>
                                        <select class="icons" name="card_type"  >
                                            {{--<option value="">Choose Card Type</option>--}}
                                            <option value="IC Number">IC Number</option>
                                            <option value="FIN Number">FIN Number</option>
                                            <option value="Passport Number">PASSPORT Number</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="last_name">Card Number</label>
                                        <input id="card_number" name="card_number" placeholder="IC Number" type="text" class="alphanumaric form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name">Occupation</label>
                                        <input id="occupation" name="occupation" type="text" class="alphanumaric form-control" placeholder="e.g. Engineer, Manager, Doctor">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name">Company Name</label>
                                        <input id="company_name" name="comapny_name" placeholder="e.g. Sony, Dell, Toshiba"  type="text" class="alphanumaric long-value-restriction form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="last_name">Block/House No</label>
                                        <input id="company_name" name="house_no[]"   type="text"  placeholder="e.g. House No 123#" class="alphanumaric form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="last_name">Appartment/Unit No</label>
                                        <input id="apartments_no" name="apartments_no[]" type="text" placeholder="e.g. Apartment No 123#" class="alphanumaric form-control">
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="last_name">Street</label>
                                        <input id="street_no" name="street_no[]" type="text" placeholder="e.g. Jurong West, Hougang" class="alphanumaric form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="last_name">City</label>
                                        <input id="city" name="city[]" type="text" placeholder="e.g. Singapore, Newyork, Islamabad" class="alphanumaric form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="last_name">Country</label>
                                        <select class="icons" name="country[]" >
                                            <option value="">Choose Country</option>
                                            @foreach($countries as $country)
                                                <option value="{!! $country->name !!}" data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg" class="left circle">{!! $country->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="last_name">Zipcode</label>
                                        <input id="zipcode" name="zipcode[]" type="text" class="alphanumaric form-control" placeholder="e.g 408600, 560252">
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea id="address" name="address[]"  class="form-control" length="120"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row address">
                                <div class="col s12 right-align"><a href="#!" class="btn btn-danger white-text add-more-address">Add More Address</a> </div>
                            </div>

                            <div id="add-new-address" class="mt-2"></div>




                    </div>
            </div>


        </div>

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Referral and Insurance Information</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Referral Name</label>
                                <select class="patient validate" name="referral_id">
                                    <option>Search Name</option>
                                    @if(isset($referral) && !is_null($referral) && !empty($referral))
                                        <option value="{!! $referral->id !!}">{{ $referral->patient_name}} </option>
                                    @endif



                                </select><input type="hidden" name="referral" id="referral_id"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Referral Code</label>

                                <input id="referral_code" name="referral_code"
                                       value="" readonly type="text"
                                       class=" form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Insurance By</label>

                                <select name="insurance_by" id="insurance_by">
                                    <option value="">Insurance By</option>
                                    <option value="AIA">AIA</option>
                                    <option value="AXA">AXA</option>
                                    <option value="SHENTON">SHENTON</option>
                                    <option value="CHAS">CHAS</option>
                                    <option value="MEDICLAIM">MEDICLAIM</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Referral Code</label>

                                <input id="insurance_number" name="insurance_number"
                                       value="" type="text" class=" form-control ">
                            </div>
                        </div>

                    </div>





                </div>
            </div>


        </div>

            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Medical Information</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>


                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container">

                        <div class="row">
                            <div class="col-sm-3">
                            <div class="form-group">
                                <label>Are you on medication?</label>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="is_medication"  >
                                        <label class="custom-control-label" for="is_medication"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>if yes, please state all the medication you are talking.</label>
                                    <textarea id="medication" name="medication"  class="form-control" length="120"></textarea>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Are you allergic to any medication?</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="is_allergic"  >
                                        <label class="custom-control-label" for="is_allergic"></label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>if yes, please state all possible allergic.</label>
                                    <textarea id="allergic" name="allergic"  class="form-control" length="120"></textarea>
                                </div>
                            </div>


                        </div>
                        <h5>Do you suffer from any of the following ilnessess?</h5>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Allergic</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="allergie" class="custom-control-input" id="allergie"  >
                                        <label class="custom-control-label" for="allergie"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>High Blood Pressure</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="high_blood_pressure" class="custom-control-input" id="high_blood_pressure"  >
                                        <label class="custom-control-label" for="high_blood_pressure"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Gastric Problems</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="gastric_problems" class="custom-control-input" id="gastric_problems"  >
                                        <label class="custom-control-label" for="gastric_problems"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Asthma</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="asthma" class="custom-control-input" id="asthma"  >
                                        <label class="custom-control-label" for="asthma"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Head/Neck Injuries</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="head_neck_injuries" class="custom-control-input" id="head_neck_injuries"  >
                                        <label class="custom-control-label" for="head_neck_injuries"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Diabetes</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="diabetes" class="custom-control-input" id="diabetes"  >
                                        <label class="custom-control-label" for="diabetes"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Heart Disease</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="heart_disease" class="custom-control-input" id="heart_disease"  >
                                        <label class="custom-control-label" for="heart_disease"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Liver Problems</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="heart_disease" class="custom-control-input" id="liver_problems"  >
                                        <label class="custom-control-label" for="liver_problems"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Epilepsy</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="heart_disease" class="custom-control-input" id="epilepsy"  >
                                        <label class="custom-control-label" for="epilepsy"></label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Herpes</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="herpes" class="custom-control-input" id="herpes"  >
                                        <label class="custom-control-label" for="herpes"></label>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Respiratory</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="respiratory" class="custom-control-input" id="respiratory"  >
                                        <label class="custom-control-label" for="respiratory"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row"  id="gendar-check" style="display: none;">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>If female, are you pregnant</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ilnessess[]" value="pregnant" class="custom-control-input" id="pregnant"  >
                                        <label class="custom-control-label" for="pregnant"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>If others</label>
                                    <textarea id="allergic" name="others"  class="form-control" length="120"></textarea>
                                </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>I would like to recive a regular check-up reminder by</label>

                                </div>

                            </div>


                        </div>



                        <div class="row">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label>POST</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="reminder[]" value="email_receive" class="custom-control-input" id="email_receive"  >
                                        <label class="custom-control-label" for="email_receive"></label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label>SMS</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="reminder[]" value="sms_receive" class="custom-control-input" id="sms_receive"  >
                                        <label class="custom-control-label" for="sms_receive"></label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                <label>POST</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="reminder[]" value="post_receive" class="custom-control-input" id="post_receive"  >
                                        <label class="custom-control-label" for="post_receive"></label>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a class="btn btn-danger save-user red" href="#!" id="selenium-add-patient-save"><i class="icon-floppy-disk mr-1"></i> Save</a>
                                <a class="btn btn-danger cancel-user red" href="#!" id="selenium-add-patient-cancel"><i class="icon-undo mr-1"></i> Cancel</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success success-message mt-2"></div>
                                <div class="alert alert-danger error-message mt-2"></div>
                            </div>
                        </div>




                    </div>


                </div>


            </div>

        </form>
    </div>

@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}

    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}

    <script>
        $(function(){

            /*$("#month-date-of-birth").select2().change(function(){
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
            });*/

            //$(".long-value-restriction").characterCounter();

            var insurance_file_counter = 1;
            $("#upload-insurance-document").click(function(){
                var file = $('<input type="file" style="display:none" id="insurance_files'+insurance_file_counter+'" name="insurance_files[]" class="insurance_files">');
                $("#upload-insurance-file-here").append(file);
                $(file).click();

                $(file).change(function(){
                   var files = $(this)[0].files[0];
                   $("#upload-insurance-file-here ol").append('<li>'+files.name+'<a href="#!" class="remove-file right" data-remove-id="'+insurance_file_counter+'"><i class="material-icons" style="font-size: 18px">delete</i></a><div style="clear:both"></div></li>');

                    $(".remove-file").off('click').on('click',function(){
                        var file_index = ($(this).attr('data-remove-id'));

                        $("#insurance_files"+file_index).remove();
                        $(this).parent().remove();
                    });
                    insurance_file_counter++;
                });

            });

            var medical_file_counter = 1;
            $("#upload-medical-document").click(function(){
                var file = $('<input type="file" style="display:none" id="medical_files'+medical_file_counter+'" name="medical_files[]" class="medical_files">');
                $("#upload-insurance-file-here").append(file);
                $(file).click();

                $(file).change(function(){
                    var files = $(this)[0].files[0];
                    $("#upload-medical-file-here ol").append('<li>'+files.name+'<a href="#!" class="medical-remove-file right" data-remove-id="'+medical_file_counter+'"><i class="material-icons" style="font-size: 18px">delete</i></a><div style="clear:both"></div></li>');

                    $(".medical-remove-file").off('click').on('click',function(){
                        var file_index = ($(this).attr('data-remove-id'));

                        $("#imedical_files"+file_index).remove();
                        $(this).parent().remove();
                    });
                    insurance_file_counter++;
                });

            });


            $("select").select2();

            $(".gender").select2().on('change',function(){
                if($(this).val() =='Female')
                    $("#gendar-check").show();
                else
                    $("#gendar-check").hide();
            });
           /* $("#unique_id").focusout(function(){
                var unique_id = $(this).val();
                var ths = $(this);
                if(unique_id !=""){
                    $.ajax({
                        url:"/check/unique_id/"+unique_id,
                        success:function (response) {
                            response = $.parseJSON(response);
                            if(response.type=="error"){
                                $("input[type=text]").focusin();
                                $("input[name=patient_id]").val(response.data[0].id);
                                $("input[name=salutation]").val(response.data[0].salutation);
                                $("input[name=first_name]").val(response.data[0].patient_name.split(' ')[0]);
                                $("input[name=last_name]").val(response.data[0].patient_name.split(' ')[1]);
                                $("input[name=date_of_birth]").val(response.data[0].date_of_birth);
                                $("input[name=contact_number]").val(response.data[0].patient_phone);
                              //  $("select.gender").val(response.data[0].gender);
                             //   $("select.gender").select2().trigger('change');

                                $("input[name=patient_email]").val(response.data[0].patient_email);
                                $("input[name=card_number]").val(response.data[0].card_number);
                                $("input[name=occupation]").val(response.data[0].occupation);
                                $("input[name=comapny_name]").val(response.data[0].comapny_name);
                                $("input[name=state]").val(response.data[0].state);
                                $("input[name=zipcode]").val(response.data[0].zipcode);
                                $("textarea[name=address]").val(response.data[0].address);
                                $("input[name=city]").val(response.data[0].city);
                               // alert(response.data[0].gender);

                                //$(".save-user").hide();   $(".cancel-user").hide();

                            }else{
                               //  $("#form")[0].reset();
                               //  ths.val(unique_id);
                                $(".save-user").show();   $(".cancel-user").show();
                            }


                        }

                    });
                }

            });*/

            $(".cancel-user").click(function(){

                window.location = "/patient/list";
            });


            $("#country_area_code").select2();
            $(".add-more-address").click(function(){

                $.ajax({
                    url:'/add/new/address',
                    success:function(response){
                        $("#add-new-address").prepend(response);
                    }
                });



            });




            $("select[name=nationality]").select2({dropdownAutoWidth : 'true',}).on('change',function(){

            });

            var _target = null;
            $(".upload-document").click(function () {
                $("input[name=document_type]").val($(this).attr('data-type'));
                _target = $(this).parent().parent().find('.add-file-here');
                $("input[name=document_file]").click();
            });



            $(".add-button").click(function(e){

                $.ajax({
                    url:'/add/new/phone',
                    success:function(response){
                        $(".phone").after(response);

                        $(".country-code").select2();

                        $(".remove-button").click(function(){
                            //var id = $(this).attr('data-id');
                            $(this).parents('.new-phone').remove();
                        });

                        $(".contact_number").change(function(){
                            clearTimeout(timeoutId);
                            timeoutId = setTimeout(function() {
// Runs 1 second (1000 ms) after the last change
//$(".progress").show();
                                $(".ajax-loading").hide();


                            }, 1000);
                        });

                        $("select.country-code").on('change', function () {
                            var val = $(this).val();

                            $(this).parents('.new-phone').find('.contact_number').val("+"+val);
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

            $(".remove-button").click(function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    url:"/phone/delete/"+id,
                    success:function(response){

                    }
                });
                $(this).parents('.new-phone').remove();
            });

            $("select.country-code").on('change', function () {
                var val = $(this).val();
                var old_value = $(this).parents('.new-phone').find('.contact_number').val();
                var pos = old_value.indexOf("+"+val); // 2
              //  alert(pos);
                $(this).parents('.new-phone').find('.contact_number').val("+"+val);
            });


            $( "#date_of_birth" ).datepicker({ dateFormat: 'dd.mm.yy',maxDate:'-2Y' });

            var timeoutId;
            $("#unique-id-operator").change(function(){
                if($(this).is(':checked')){
                    $("#unique_id").removeAttr('readonly');
                }else{
                    $("#unique_id").attr('readonly','readonly');
                }
            });
           /* $('form input, form textarea').on('input propertychange change', function() {


                clearTimeout(timeoutId);
                timeoutId = setTimeout(function() {
                    // Runs 1 second (1000 ms) after the last change
                    //$(".progress").show();
                    $(".ajax-loading").hide();
                    if( $("#form").valid()) {
                        $("#form").ajaxForm(function (response) {
                            $(".progress").hide();
                            $(".ajax-loading").show();
                            $("#patient_id").val(response);
                            $("#document_patient_id").val(response);
                            setTimeout(function () {
                                $(".ajax-loading").hide();
                            }, 1500);
                        }).submit();
                    }

                }, 2000);
            });*/


            $(".addservice").click(function(){
                $("#modal-service").modal('open');;
            });
            var area_code_default = $("#country_area_code option:selected").val();
            if(area_code_default)
            $("#contact_number").val("+"+area_code_default);
            $("#country_area_code").change(function(){
                var area_code = $(this).val();
                var old_value = $('#contact_number').val();
                var pos = old_value.indexOf("+"+area_code); // 2
                if(old_value=="")
                $("#contact_number").val("+"+area_code);
                else if(old_value!="" && pos<0)
                $("#contact_number").val("+"+area_code+old_value);
                $("#contact_number").focus();
            });
var c =1;
            $(".payment-type").change(function(){
                if(c==1){
                    $(".payment-type-section").fadeOut();
                    var type = $(this).find('option:selected').attr('data-type');
                    $("#"+type).fadeIn();
                    c++;
                }else{
                    c=1;
                }


            });



            $("#is_under_17").find("input[type=checkbox]").on("change",function() {
                var status = $(this).prop('checked');

               if(status)
                   $("#show_gaurdian").fadeIn();
               else
                   $("#show_gaurdian").fadeOut();
            });



            $("#is_medication").find("input[type=checkbox]").on("change",function() {
                var status = $(this).prop('checked');

                if(status)
                    $("#medication-section").fadeIn();
                else
                    $("#medication-section").fadeOut();
            });
            $(".medication").find("input[type=checkbox]").on("change",function() {
                var status = $(this).prop('checked');

                if(status)
                    $(this).parents('.section').find('textarea').removeAttr('disabled');
                else
                    $(this).parents('.section').find('textarea').attr('disabled','disabled');
            });
            var valid_year = new Date().getFullYear()-2;
            $(".save-user").click(function(e){
                $(".alert").hide();
                $validation = $("#form").validate({

                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        


                    },
                    // Error messages
                    messages: {

                    },
                    highlight: function(element, errorClass, validClass) {
                        var elem = $(element);

                        $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    // Class that wraps error message
                    errorClass: "error",
                    focusInvalid: true,
                    // Element that wraps error message
                    errorElement : 'label',
                    errorPlacement: function(error, element) {
                        console.log(element);
                        var placement = $(element).data('error');
                        console.log(placement);
                        if (placement) {
                            $(placement).append(error)
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    success: function(helpBlock) {
                        if( $(helpBlock).closest(".form-group").hasClass('has-error') ){
                            $(helpBlock).closest(".form-group").removeClass("has-error").addClass("has-success");
                        }
                    }
                });



               /* jQuery.validator.addMethod("alphanumeric", function(value, element) {
                    return this.optional(element) || /^[a-z\d\+\-_\(\)\/\s]+$/i.test(value);
                }, "Letters, numbers, and underscores only please");*/

                jQuery.validator.addMethod("noSpace", function(value, element) {
                    var index = value.indexOf(" ");
                    return   value != " " && value[0] != " ";
                }, "No space please and don't leave it empty");



                jQuery.validator.addMethod("validDate", function(value, element) {
                            var value1 = value.toString().split('.');

                           // console.log(value1[2]+'-'+value1[1]+'-'+value1[0]);
                            value1 = value1[2]+'-'+value1[1]+'-'+value1[0];
                    var date_ = new Date(value1);


                    if(date_=="Invalid Date")
                    return false;

                    var d_text = value.toString().split('.');

                    if(d_text.length != 3)
                        return false;

                    if(typeof(d_text[2])=="undefined" || d_text[2]=="")
                        return false;

                    if(parseInt(d_text[2])>valid_year || parseInt(d_text[2]) < 1920 )
                        return false;

                    return true;

                }, "Invalid Date");

                $("#date_of_birth").rules('add', {
                    validDate:true,
                        messages:{
                         validDate:"Please enter valid date till to dd.mm."+valid_year
                        }

                });


                /*$('.alphanumaric').each(function() {
                    $(this).rules('add', {
                        alphanumeric: true,
                        messages: {
                            alphanumeric:  "Letters, numbers, and underscores only please",
                        },
                        noSpace: true,
                        messages: {
                            noSpace:  "No space please and don't leave it empty",
                        }
                    });
                });*/








                    if( $("#form").valid()) {
                       // alert();
                        $(".message").hide();
                        $("#form").ajaxForm(function (response) {

                            response = $.parseJSON(response);
                            if(response.type=="success"){
                                $(".progress").hide();
                                $(".ajax-loading").show();
                                $(".overlay").hide();
                                $(".success-message").html('Patient information is updated.');
                                $(".success-message").show();
                                setTimeout(function () {
                                    $(".success-message").hide();
                                    window.location = "/patient/view/"+response.id;
                                }, 2500);
                            }else{
                                $(".error-message").html(response.message);
                                $(".error-message").show();
                            }
                        }).submit();
                    }

                e.preventDefault();
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

            $("input[name=contact_number],.contact_number").keydown(function (e) {
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

           // $("#date_of_birth").removeAttr('readonly');
        })


        function formatDate(date) {

            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }

    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection