
@if(in_array(48,$permissions_allowed) || Auth::user()->role=='hospital-administrator')

<div class="row">
    <div class="col-sm-12">
        <form id="form" method="post" action="/patient/save" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="patient_id" id="patient_id" value="{!! $patient->id !!}"/>
            <input type="hidden" name="updated_field"/>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">{!! $patient->patient_name !!} Biodata</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>


                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group input-group-sm">
                                <label for="unique_id">Unique Code</label>
                                <input id="unique_id" class="alphanumaric long-value-restriction form-control input-sm"  name="patient_unique_id" value="{!! $patient->patient_unique_id !!}" type="text"  readonly="readonly">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="custom-control custom-checkbox" style="margin-top: 36px">
                                <input type="checkbox" class="custom-control-input" id="unique-id-operator"  >
                                <label class="custom-control-label" for="unique-id-operator">Allow to change</label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group  input-group-sm">
                                <label for="unique_id">Custom Code</label>
                                <input id="custom_code" name="custom_code" value="{!! $patient->custom_code !!}" type="text"
                                       class="alphanumaric form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12 form-group input-group-sm">
                            <label>Salutation</label>
                            <select name="salutation" class="select2 form-control input-sm">
                                <option value="Mr" {!! $patient->salutation=="Mr"?"selected":"" !!}>Mr</option>
                                <option value="Mrs" {!! $patient->salutation=="Mrx"?"selected":"" !!}>Mrs</option>
                                <option value="Miss" {!! $patient->salutation=="Miss"?"selected":"" !!}>Miss</option>
                            </select>
                        </div>
                    </div>
                    @php
                        $name =  explode(' ',$patient->patient_name)
                    @endphp

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group input-group-sm">
                                <label for="first_name">First Name</label>
                                <input id="first_name" name="first_name" type="text"  value="{!! $patient->first_name !!}"   required  class="input-sm alphanumaric long-value-restriction form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group input-group-sm">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" name="last_name" type="text"   value="{!!$patient->last_name !!}"  required  class="input-sm alphanumaric long-value-restriction form-control">
                            </div>
                        </div>
                    </div>
                    @php
                        $year = $month = $day = "";
                        if(!empty($patient->date_of_birth)){
                         $d = explode('-',$patient->date_of_birth);

                        $year = $d[0];
                        $month = $d[1]<9?str_replace('0','',$d[1]):$d[1];

                        $day = $d[2]<9?str_replace('0','',$d[2]):$d[2];;
                        }

                    @endphp
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group input-group-sm">
                                <label for="last_name">Date of Birth</label>
                                <select name="day" id="day-date-of-birth" class="input-sm" required>
                                    <option value=""> Day</option>
                                    @for($m=1; $m<=31; ++$m)
                                    <option @if($m==$day) selected @endif  value="{!! $m !!}">{!! $m !!}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="month-date-of-birth" style="visibility: hidden" class="">Date of Birth </label>
                                <select name="month" id="month-date-of-birth" required>
                                    <option value=""> Month</option>
                                    @for($m=1; $m<=12; ++$m)
                                    <option @if($m==$month) selected @endif  value="{!! $m !!}">{!!  date('F', mktime(0, 0, 0, $m, 1)) !!} </option>
                                    @endfor
                                </select>

                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="year-date-of-birth" style="visibility: hidden" class="">Date of Birth </label>
                                <select name="year" id="year-date-of-birth" required>
                                    <option value="">Year</option>
                                    @for($i=2016; $i>=1910; $i--)
                                        <option  @if($i==$year) selected @endif  value="{!! $i !!}">{!! $i !!}</option>
                                    @endfor
                                </select>

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group input-group-sm">
                                <label for="last_name">Gender</label>
                                <select name="gender" id="gender" class="gender">
                                    <option value="">Choose Gender</option>
                                    <option value="Male" @if($patient->gender == 'Male') selected @endif>Male</option>
                                    <option value="Female" @if($patient->gender == 'Female') selected @endif>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                            @if(in_array(44,$permissions_allowed) || Auth::user()->role=='hospital-administrator')
                    <div class="row phone">
                        @php
                            $number = explode(' ',$patient->patient_phone);
                        @endphp
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="last_name">Code</label>
                                <select class="icons" name="country_area_code" id="country_area_code">
                                    <option value="">Choose Country</option>
                                    @foreach($countries as $country)
                                        <option  @if($current_country==$country->name || $country->code == $patient->code) selected
                                                 @endif  value="{!! $country->code !!}" data-code="{!! $country->code !!}" class="left circle">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="last_name">Number</label>
                                <input id="contact_number" name="contact_number[]"  value="{!! $patient->patient_phone !!}"   type="text" class="alphanumaric long-value-restriction form-control">
                            </div>
                        </div> <div class="col-sm-1">
                            <label for="last_name" style="visibility: hidden;">Add more</label>
                            <a href="#!" class="add-button text-danger"><i class="icon-plus-circle2"></i> </a>
                        </div>
                    </div>

                                @if(isset($phones))
                                    @foreach($phones as $k=>$ph)
                                <div class="row phone">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="last_name">Code</label>
                                            <select class="icons" name="country_area_code" id="country_area_code">
                                                <option value="">Choose Country</option>
                                                @foreach($countries as $country)
                                                    <option @if($current_country==$country->name || $country->code == $ph->code ) selected
                                                            @endif  value="{!! $country->code !!}" data-code="{!! $country->code !!}" class="left circle">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label for="last_name">Number</label>
                                            <input id="contact_number" name="contact_number[]"   value="{!! $ph->contact_number !!}"     type="text" class="alphanumaric long-value-restriction form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="last_name" style="visibility: hidden;">Add more</label>

                                            <a href="#!" class="remove-button text-danger"  data-id="{!! $ph->id !!}"><i class="icon-trash"></i> </a>

                                    </div>
                                </div>

                                    @endforeach
                                @endif



                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="last_name">Email</label>
                                <input id="email" name="patient_email" type="email"  value="{!! $patient->patient_email !!}" class="validate form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="last_name">Choose Nationality</label>
                                <select class="icons" name="nationality" >
                                    <option value="">Choose Nationality</option>
                                    @foreach($countries as $country)
                                        <option value="{!! $country->name !!}" @if($patient->nationality==$country->name) selected @endif data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg" class="left circle">{!! $country->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="last_name">Card Type</label>
                                <select class="icons" name="card_type"  >
                                    {{--<option value="">Choose Card Type</option>--}}
                                    <option value="IC Number" @if($patient->card_type=="IC Number") selected @endif>IC Number</option>
                                    <option value="FIN Number" @if($patient->card_type=="FIN Number") selected @endif>FIN Number</option>
                                    <option value="Passport Number" @if($patient->card_type=="Passport Number") selected @endif>PASSPORT Number</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="last_name">Card Number</label>
                                <input id="card_number" name="card_number" placeholder="IC Number" type="text" value="{!! $patient->card_number !!}" class="alphanumaric form-control">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="last_name">Occupation</label>
                                <input id="occupation" name="occupation" type="text" class="alphanumaric form-control"  value="{!! $patient->occupation !!}" placeholder="e.g. Engineer, Manager, Doctor">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="last_name">Company Name</label>
                                <input id="company_name" name="comapny_name"  value="{!! $patient->comapny_name !!}" placeholder="e.g. Sony, Dell, Toshiba"  type="text" class="alphanumaric long-value-restriction form-control">
                            </div>
                        </div>
                    </div>

                            @if(isset($patient->addresses))
                                @foreach($patient->addresses as $address)
                                    <input type="hidden" name="address_id[]" value="{!! $address->id !!}" />
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="last_name">Block/House No</label>
                                            <input id="company_name" name="house_no[]"  type="text" value="{!! $address->house_no !!}"  placeholder="e.g. House No 123#" class="alphanumaric form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="last_name">Appartment/Unit No</label>
                                            <input id="apartments_no" name="apartments_no[]"  value="{!! $address->apartments_no !!}" type="text" placeholder="e.g. Apartment No 123#" class="alphanumaric form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="last_name">Street</label>
                                            <input id="street_no" name="street_no[]"  value="{!! $address->street_no !!}" type="text" placeholder="e.g. Jurong West, Hougang" class="alphanumaric form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="last_name">City</label>
                                            <input id="city" name="city[]" type="text" placeholder="e.g. Singapore, Newyork, Islamabad"  value="{!! $address->city !!}" class="alphanumaric form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="last_name">Country</label>
                                            <select class="icons" name="country[]" >
                                                <option value="">Choose Country</option>
                                                @foreach($countries as $country)
                                                    <option value="{!! $country->name !!}" @if($address->country==$country->name) selected @endif >{!! $country->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="last_name">Zipcode</label>
                                            <input id="zipcode" name="zipcode[]"  value="{!! $address->zipcode !!}" type="text" class="alphanumaric form-control" placeholder="e.g 408600, 560252">
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea id="address" name="address[]"  class="form-control" length="120">{!! $address->address !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="last_name">Block/House No</label>
                                                <input id="company_name" name="house_no[]"  type="text"  placeholder="e.g. House No 123#" class="alphanumaric form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="last_name">Appartment/Unit No</label>
                                                <input id="apartments_no" name="apartments_no[]" type="text" placeholder="e.g. Apartment No 123#" class="alphanumaric form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="last_name">Street</label>
                                                <input id="street_no" name="street_no[]" type="text" placeholder="e.g. Jurong West, Hougang" class="alphanumaric form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="last_name">City</label>
                                                <input id="city" name="city[]" type="text" placeholder="e.g. Singapore, Newyork, Islamabad"  value="{!! $patient->city !!}" class="alphanumaric form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="last_name">Zipcode</label>
                                                <input id="zipcode" name="zipcode[]" type="text" class="alphanumaric form-control" placeholder="e.g 408600, 560252">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea id="address" name="address[]"  class="form-control" length="120"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @if($patient->addresses->count() <2)
                    <div class="row address">
                        <div class="col s12 right-align"><a href="#!" class="btn btn-danger white-text add-more-address">Add More Address</a> </div>
                    </div>
@endif
                    <div id="add-new-address" class="mt-2"></div>@endif
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
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
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Referral Name</label>
                                            <select class="patient validate" name="referral_id" data-error=".errorTxt2">
                                                @if(isset($referral) && !is_null($referral) && !empty($referral))
                                                    <option value="{!! $referral->id !!}">{{ $referral->patient_name}} </option>
                                                @endif

                                                @if(!empty($patient->referral_name))
                                                    <option value="0">{{ $patient->referral_name}} </option>
                                                @endif

                                            </select>
                                            <input type="hidden" name="referral" id="referral_id" @if(isset($referral) && !is_null($referral) && !empty($referral)) value="{!! $referral->id !!}"  @endif/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Referral Code</label>

                                            <input id="referral_code" name="referral_code"
                                                   value="{!! $patient->referral_code !!}"  readonly type="text"
                                                   class=" form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Insurance By</label>

                                            <select name="insurance_by" id="insurance_by">
                                                <option value="AIA" @if( $patient->insurance_by == 'AIA') selected @endif>AIA</option>
                                                <option value="AXA"  @if( $patient->insurance_by == 'AXA') selected @endif>AXA</option>
                                                <option value="SHENTON"  @if( $patient->insurance_by == 'SHENTON') selected @endif>SHENTON</option>
                                                <option value="CHAS"  @if( $patient->insurance_by == 'CHAS') selected @endif>CHAS</option>
                                                <option value="MEDICLAIM"  @if( $patient->insurance_by == 'MEDICLAIM') selected @endif>MEDICLAIM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Referral Code</label>

                                            <input id="insurance_number" name="insurance_number"
                                                   value="{!! $patient->insurance_number !!}" type="text" class=" form-control ">
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
                                                <input type="checkbox" @if(isset($medical->is_medication) && $medical->is_medication == "Yes") checked @endif class="custom-control-input" name="is_medication" id="is_medication"  >
                                                <label class="custom-control-label" for="is_medication"></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                @php
                                    $medi = isset($medical->illness)?json_decode($medical->illness):array();

                                @endphp

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>if yes, please state all the medication you are taking.</label>
                                            <textarea id="medication" name="medication"  class="form-control" length="120">{!! isset($medical->medication) && !is_null($medical->medication)?$medical->medication:"" !!}</textarea>
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
                                                <input type="checkbox" class="custom-control-input" name="is_allergic"  id="is_allergic" @if(isset($medical->is_allegric) && $medical->is_allegric == "Yes") checked @endif  >
                                                <label class="custom-control-label" for="is_allergic"></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>if yes, please state all possible allergic.</label>
                                            <textarea id="allergic" name="allergic"  class="form-control" length="120">{!! isset($medical->allegric) && !is_null($medical->allegric)?$medical->allegric:"" !!}</textarea>
                                        </div>
                                    </div>


                                </div>
                                <h5>Do you suffer from any of the following ilnessess?</h5>

                                @if(isset($medical_conditions) && $medical_conditions->count() > 0)
                                    @foreach($medical_conditions as $medication_condition)
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>{!! $medication_condition->name !!}</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="ilnessess[]"  @if(isset($medi) && ( in_array(($medication_condition->name),$medi) || in_array((strtolower($medication_condition->name)),$medi))   ) checked @endif value="{!! strtolower($medication_condition->name) !!}" class="custom-control-input" id="medication_condition_{!! $medication_condition->id !!}"  >
                                                        <label class="custom-control-label" for="medication_condition_{!! $medication_condition->id !!}"></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                @endif


                                <div class="row"  id="gendar-check" style="display: none;">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>If female, are you pregnant</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="ilnessess[]" @if(isset($medi) && !is_null($medi) && in_array('pregnant',$medi)) checked
                                                       @endif  value="pregnant" class="custom-control-input" id="pregnant"  >
                                                <label class="custom-control-label" for="pregnant"></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>If others</label>
                                            <textarea id="allergic" name="others"  class="form-control" length="120">@if(isset($medical) && !is_null($medical)) {!! $medical->others !!} @endif</textarea>
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
                                @php
                                    $reminder = $patient->reminder;
                                    $reminder_array = !empty($reminder)?explode(',',$reminder):array();

                                @endphp


                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label>POST</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="reminder[]" value="email_receive" @if(in_array('email',$reminder_array)) checked @endif class="custom-control-input" id="email_receive"  >
                                                <label class="custom-control-label" for="email_receive"></label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label>SMS</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="reminder[]" value="sms_receive" @if(in_array('sms_receive',$reminder_array)) checked @endif class="custom-control-input" id="sms_receive"  >
                                                <label class="custom-control-label" for="sms_receive"></label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label>POST</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="reminder[]" value="post_receive" @if(in_array('post_receive',$reminder_array)) checked @endif class="custom-control-input" id="post_receive"  >
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
                </div>
            </div>



        </form>
    </div>
</div>






    <script>
        $(function () {

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


            $("select").select2();
            $(".gender").select2().on('change',function(){

                if($(this).val() =='Female'){

                    $("#gendar-check").show();
                }else{
                    $("#gendar-check input[type=checkbox]").removeProp('checked');
                    $("#gendar-check").hide();
                }



            });

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
                var file = $('<input type="file" style="display:none" id="medical_files'+insurance_file_counter+'" name="medical_files[]" class="medical_files">');
                $("#upload-medical-file-here").append(file);
                $(file).click();

                $(file).change(function(){
                    var files = $(this)[0].files[0];
                    $("#upload-medical-file-here ol").append('<li>'+files.name+'<a href="#!" class="medical-remove-file right" data-remove-id="'+medical_file_counter+'"><i class="material-icons" style="font-size: 18px">delete</i></a><div style="clear:both"></div></li>');

                    $(".medical-remove-file").off('click').on('click',function(){
                        var file_index = ($(this).attr('data-remove-id'));

                        $("#medical_files"+file_index).remove();
                        $(this).parent().remove();
                    });
                    medical_file_counter++;
                });

            });

            $( "#date_of_birth" ).datepicker({ dateFormat: 'dd.mm.yy',
                changeMonth: true,
                changeYear: true,
                yearRange: '-100:+0',
                maxDate : '-2Y'
            });

            $(".cancel-user").click(function(){


                window.location = "/patient/list";
            });
            var valid_year = new Date().getFullYear()-2;




            $("#country_area_code").select2();
            $(".add-more-address").click(function(){
                $(".row.add-new-address").after($('.row.add-new-address').clone().removeClass('add-new-address')).find('textarea').val('');



            });

            $("select[name=nationality]").select2({dropdownAutoWidth : 'true',}).on('change',function(){

            });

            $(".datepicker1").focusout(function(){
                // alert($(this).val());
                $(this).datepicker("setDate",new Date($(this).val()));
            });

            $(".remove-file").click(function(e){
                var id = ($(this).attr('data-remove-id'));


                $(this).parent().remove();
                $(".overlay").show();
                $.ajax({
                    url:"/document/delete/"+id,
                    success:function () {
                        $(".overlay").hide();
                        $("#insurance_files"+id).remove();
                    }
                });

                e.preventDefault();
            });

            $(".medical-remove-file").click(function(e){
                var id = ($(this).attr('data-remove-id'));


                $(this).parent().remove();
                $(".overlay").show();
                $.ajax({
                    url:"/document/delete/"+id,
                    success:function () {
                        $(".overlay").hide();
                        $("#medical_files"+id).remove();
                    }
                });

                e.preventDefault();
            });

  var _target = null;
            $(".upload-document").click(function () {
                $("input[name=document_type]").val($(this).attr('data-type'));
                _target = $(this).parent().parent().find('.add-file-here');
                $("input[name=document_file]").click();
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

            $("select.country-code").on('change', function () {
                var val = $(this).val();

                $(this).parents('.new-phone').find('.contact_number').val("+" + val);
            });

            var changed_field = [];
            $("input").change(function () {
                changed_field.push($(this).attr('name'));
                changed_field = $.unique(changed_field);
                $("input[name=updated_field]").val(changed_field.toString());
                // console.log(changed_field.toString());
            });


            $(".show-address").click(function () {
                $("#show-address").modal('open');
                ;
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

            $(".datepicker").datepicker({dateFormat: 'dd.mm.yy'});
            var timeoutId;
            $("#unique-id-operator").change(function () {
                if ($(this).is(':checked')) {
                    $("#unique_id").removeAttr('readonly');
                } else {
                    $("#unique_id").attr('readonly', 'readonly');
                }
            });
           /* $('#form input, #form textarea').on('input propertychange change', function () {
                var first_name = $("#first_name").val();
                if (first_name == "") return false;

                clearTimeout(timeoutId);
                timeoutId = setTimeout(function () {
                    // Runs 1 second (1000 ms) after the last change
                    //$(".progress").show();
                    $(".ajax-loading").hide();
                    if( $("#form").valid()){
                        $("#form").ajaxForm(function (response) {
                            $(".progress").hide();
                            $(".ajax-loading").show();
                            $("#patient_id").val(response);
                            setTimeout(function () {
                                $(".ajax-loading").hide();
                                changed_field = [];
                                $("input[name=updated_field]").val('');
                            }, 1500);
                        }).submit();
                    }


                }, 2000);
            });*/


            $(".addservice").click(function () {
                $("#modal-service").modal('open');
                ;
            });
            //   var area_code_default = $("#country_area_code option:selected").val();
            //   if(area_code_default)
            //$("#contact_number").val("+"+area_code_default+" ");
            $("select#country_area_code").change(function () {
                var area_code = $(this).val();
                //    alert(area_code);
                $("#contact_number").val("+" + area_code);
                $("#contact_number").focus();
            });
            var c = 1;
            $(".payment-type").change(function () {
                if (c == 1) {
                    $(".payment-type-section").fadeOut();
                    var type = $(this).find('option:selected').attr('data-type');
                    $("#" + type).fadeIn();
                    c++;
                } else {
                    c = 1;
                }


            });

            $("#is_under_17").find("input[type=checkbox]").on("change", function () {
                var status = $(this).prop('checked');

                if (status)
                    $("#show_gaurdian").fadeIn();
                else
                    $("#show_gaurdian").fadeOut();
            });

            $("#medication").find("input[type=checkbox]").on("change", function () {
                var status = $(this).prop('checked');

                if (status)
                    $("#medication-section").fadeIn();
                else
                    $("#medication-section").fadeOut();
            });
            $(".medication").find("input[type=checkbox]").on("change", function () {
                var status = $(this).prop('checked');

                if (status)
                    $(this).parents('.section').find('textarea').removeAttr('disabled');
                else
                    $(this).parents('.section').find('textarea').attr('disabled', 'disabled');
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
        })


    </script>
@else
    <div class="alert bg-danger text-white text-center" style="display: block">

        <span class="font-weight-semibold">Oh snap!</span> You are not authorized to edit patient, please <a href="#" class="alert-link">contact administrator</a>.
    </div>
@endif