<form id="form" method="post" action="/patient/save" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="card">


        <div class="card-body">
            <div class="container">

                <input type="hidden" name="patient_id" id="patient_id" />
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="unique_id">Unique Code</label>
                            <input id="unique_id" class="alphanumaric long-value-restriction form-control"  name="patient_unique_id" value="{!! $unique_id !!}" type="text"  readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="custom-control custom-checkbox" style="margin-top: 36px">
                            <input type="checkbox" class="custom-control-input" id="unique-id-operator"  >
                            <label class="custom-control-label" for="unique-id-operator">Allow to change patient unique id</label>
                        </div>
                    </div>


                </div>

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <label>Salutation</label>
                        <select name="salutation" class="select2 form-control">
                            <option value="Mr">Mr</option>
                            <option value="Mr">Mrs</option>
                            <option value="Mr">Miss</option>
                            <option value="Dr">Dr</option>
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

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="last_name">Number</label>
                            <input id="contact_number" name="contact_number"    type="text" class="alphanumaric long-value-restriction form-control">
                        </div>
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
                            <input id="company_name" name="house_no[]" placeholder="e.g. Sony, Dell, Toshiba"  type="text"  placeholder="e.g. House No 123#" class="alphanumaric form-control">
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
                            <label>if yes, please state all the medication you are taking.</label>
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