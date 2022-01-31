@extends('layout.app')
@section('page-title') Treatment Card @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/material/css/file-explore.css') !!}
@endsection

@section('content')




    <section id="content">
        

    @include('partials.breadcrumb')

        <section id="content">


            <!--start container-->
            <div class="container patient-profile" id="patient-profile-section">

                <div class="row">
                    <div class="col col s12 m6 l4">
                        <h4 class="header">{!! $patient->salutation !!} {!! $patient->patient_name !!}'s Treatment Record</h4>
                    </div>
                    <div class="col s12 m3 l3  m-top-20 no-padding right-align action-buttons">
                        <a class="btn orange white-text pulse"><i class="material-icons">notifications_active</i> </a> <a class="btn red white-text ">Print</a>  <a class="btn red white-text ">Export as PDF</a>  <a class="btn red white-text ">Share</a>
                    </div>
                    <div class="col s12 m3 l5" style="position: relative"> <form><input type="text" style="text-transform: none;" id="search-keywords" name="keywords" value="(In process)"
                                                                                 placeholder="Search for patient..">
                            <button  id="search-patients"><i class="material-icons">search</i></button>
                        </form>
                    </div>
                </div>
                    <div class="row">
                    <div class="col s12 m6 lg6  no-padding">
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header"><i class="material-icons">flag</i>  <select id="patient-flags">
                                        <option></option>
                                        <option value="VIP" data-color="#5e35b1">VIP</option>
                                        <option value="Drug Allergy, Critical Medical History" data-color="#d50000">Drug Allergy, Critical Medical History</option>
                                        <option value="Difficult Patient" data-color="#ffeb3b">Difficult Patient</option>
                                        <option value="Banned Patient" data-color="#212121">Banned Patient</option>
                                        <option value="Deceased"  data-color="#3949ab">Deceased</option>
                                        <option value="Special Needs"  data-color="#00897b">Special Needs</option>

                                    </select></div>

                            </li>

                        </ul>
                    </div>

                    <div class="col s12 m6 lg6   no-padding">
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header">

                                    <i class="material-icons">filter_drama</i> <span class="red-text">Drug Allergy</span> : <span id="span-drug-allergy" style="font-weight: 300">@isset($patient_drug_allergies) {!! implode(',',$patient_drug_allergies) !!} @endif</span>


                                </div>
                                <div class="collapsible-body"><span>
                                        <div class="row">
                                            <div class="col s10">
                                                <select id="drug-allergy" name="drug-allergy[]" multiple="multiple">
                                                    <option></option>
                                                    @if(isset($drug_allergies))
                                                        @foreach($drug_allergies as $d)
                                                    <option value="{!! $d->name !!}" @if(isset($patient_drug_allergies) && in_array($d->name,$patient_drug_allergies)) selected @endif>{!! $d->name !!}</option>
                                                        @endforeach
                                                        @endif

                                                </select>
                                                <span class="response"></span>
                                            </div>
                                           {{-- <div class="col s1"><a href="#!" class="btn red white-text save-allergy-with-patient">Save</a></div>--}}
                                            <div class="col s1 right">
                                                <a  href='#!' id="add-drug-item" ><i class="material-icons">add</i></a>

                                            </div>
                                        </div>


                                    </span></div>
                            </li>

                        </ul>
                    </div>
                </div>
                    <div class="row">
                        <div class="col s12 m6 lg6   no-padding">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">account_box</i> Patient Information : {!! $patient->salutation !!} {!! $patient->patient_name !!} - Idcsg-{!! $patient->patient_unique_id !!} </div>
                                    <div class="collapsible-body"><span>
                                            <div class="row">
                                                <div class="col s10">
                                                  <div class="my-box active">
                                                      <table border="0" style="border: none">
                                                        <tr>
                                                            <td width="30%">Name </td>
                                                            <td>
                                                                {!! $patient->salutation !!} {!! $patient->patient_name !!}




                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Birth </td>
                                                            <td>{!! date('d.M.Y', strtotime($patient->date_of_birth)) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>I/C </td>
                                                            <td>{!! $patient->card_number !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Family </td>
                                                            <td>{!! $patient->family !!}</td>
                                                        </tr>
                                                    </table>
                                                  </div>
                                                  <div class="my-box">
                                                      <form id="patient-update-form" action="/update/patient/chunk" method="post" enctype="multipart/form-data">
                                                          <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                                                          {!! csrf_field() !!}
                                                          <table border="0" style="border: none">
                                                          <tr>
                                                              <td>Salutation</td>
                                                              <td><input type="text" name="salutation" id="salutation" value="{!! $patient->salutation !!}" autocomplete="off" /> </td>
                                                          </tr>

                                                          <tr>
                                                              <td>Name</td>
                                                              <td><input type="text" name="patient_name" id="patient_name" value="{!! $patient->patient_name !!}" autocomplete="off" /> </td>
                                                          </tr>

                                                          <tr>
                                                              <td>Date of Birth</td>
                                                              <td><input type="text" value="{!! date('d.M.Y', strtotime($patient->date_of_birth)) !!}" id="date_of_birth" autocomplete="off" name="date_of_birth" /> </td>
                                                          </tr>
                                                          <tr>
                                                              <td>I/C</td>
                                                              <td><input type="text" id="card_number" name="card_number" value="{!! $patient->card_number !!}" autocomplete="off" /></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Family</td>
                                                              <td><input type="text" id="family" name="family" value="{!! $patient->family !!}" autocomplete="off" /></td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2" class="center"><a href="#!" class="btn red white-text update">Update</a>   &nbsp; <a href="#!" class="btn red white-text cancel">Cancel</a> <span class="response"></span></td>
                                                          </tr>

                                                      </table>
                                                      </form>

                                                  </div>
                                                </div>
                                                <div class="col s1 right">
                                                <a href="#!" class="edit-btn" data-action="edit-patient"><i class="material-icons">create</i> </a>
                                            </div>
                                            </div>

                                    </span></div>
                                </li>

                            </ul>
                        </div>
                        <div class="col s12 m6 lg6   no-padding">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">account_box</i>Referral and Insurance Information </div>
                                    <div class="collapsible-body"><span>
                                            <div class="row">
                                                  <div class="my-box active">
                                                        <div class="col s10" id="show-referral-info">
                                                    <table>
                                                        <tr>
                                                            <td width="35%">Referral</td>
                                                            <td>
                                                                 @if((isset($referral) && !is_null($referral) && !empty($referral)) || !empty($patient->referral_name))
                                                                    @if(isset($referral) && !is_null($referral) && !empty($referral))
                                                                        <a href="/patient/view/{!! $referral->id !!}" target="_blank">{{ $referral->patient_unique_id}} - {{ $referral->patient_name}}</a>
                                                                    @endif
                                                                    @if(!empty($patient->referral_name))
                                                                        {{ $patient->referral_name}}
                                                                    @endif
                                                                @else
                                                                    <span class="red-text">No referral is found!</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Insurance Details</td>
                                                            <td><span id="insurance_by_span">
                                                                  @if(!empty($patient->insurance_by) && !empty($patient->insurance_number))
                                                                    {{ $patient->insurance_by }} - {{ $patient->insurance_number }}
                                                                @else
                                                                    <span class="red-text">No insurance record is found!</span>
                                                                @endif</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Insurance Expiry Date</td>
                                                            <td>
                                                                  @if(!empty($patient->expiry_date) && !empty($patient->expiry_date))
                                                                    {{ date('d.m.Y',strtotime($patient->expiry_date)) }}
                                                                @else
                                                                    <span class="red-text">No insurance expiry record is found!</span>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>
                                                  </div>
                                                  <div class="my-box">
                                                      <div class="col s10" id="show-referral-info">
                                                             <form id="patient-update-refferal" action="/update/patient/referral" method="post" enctype="multipart/form-data">
                                                          <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                                                                <input type="hidden" name="referral" id="referral_id" @if(isset($referral) && !is_null($referral) && !empty($referral)) value="{!! $referral->id !!}"  @endif/>
                                                                 {!! csrf_field() !!}
                                                                <table>
                                                        <tr>
                                                            <td width="35%">Referral</td>
                                                            <td>
                                                                                             <select class="patient validate" name="referral_id" data-error=".errorTxt2">
                                        @if(isset($referral) && !is_null($referral) && !empty($referral))
                                                                                                     <option value="{!! $referral->id !!}">{{ $referral->patient_name}} </option>
                                                                                                 @endif

                                                                                                 @if(!empty($patient->referral_name))
                                                                                                     <option value="0">{{ $patient->referral_name}} </option>
                                                                                                 @endif

                                    </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Insurance By</td>
                                                            <td>
                                                                <select name="insurance_by" id="insurance_by">
                                        <option value="">Insurance By</option>
                                        <option value="AIA" @if( $patient->insurance_by == 'AIA') selected @endif>AIA</option>
                                        <option value="AXA"  @if( $patient->insurance_by == 'AXA') selected @endif>AXA</option>
                                        <option value="SHENTON"  @if( $patient->insurance_by == 'SHENTON') selected @endif>SHENTON</option>
                                        <option value="CHAS"  @if( $patient->insurance_by == 'CHAS') selected @endif>CHAS</option>
                                        <option value="MEDICLAIM"  @if( $patient->insurance_by == 'MEDICLAIM') selected @endif>MEDICLAIM</option>
                                    </select>
                                                            </td>
                                                        </tr>
                                                                    <tr>
                                                            <td>Insurance Number</td>
                                                            <td>
                                                                 <input  value="{!! $patient->insurance_number !!}" id="insurance_number" name="insurance_number"
                                                                        value="" type="text" class=" " style="height: 25px !important;">
                                                            </td>
                                                        </tr>
                                                                    </tr>
                                                                    <tr>
                                                            <td>Expiry Date</td>
                                                            <td>
                                                                 <input autocomplete="off"  value="@if(!empty($patient->expiry_date)){!! date('d.m.Y',strtotime($patient->expiry_date)) !!} @endif" id="expiry_date" name="expiry_date"
                                                                         value="" type="text" class=" " style="height: 25px !important;">
                                                            </td>
                                                        </tr>
                                                                     <tr>
                                                              <td colspan="2" class="center"><a href="#!" class="btn red white-text update">Update</a>   &nbsp; <a href="#!" class="btn red white-text cancel">Cancel</a> <span class="response"></span></td>
                                                          </tr>

                                                    </table>
                                                             </form>
                                                </div>
                                                  </div>
                                                <div class="col s1 right">
                                                <a href="#!" class="edit-btn" data-action="edit-referral"><i class="material-icons">create</i> </a>
                                            </div>
                                            </div>

                                    </span></div>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col s12 m6 lg6  no-padding">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header" id="get-medication" data-patient-id="{!! $patient->id !!}"><i class="material-icons">local_hospital</i> Current Medications </div>
                                    <div class="collapsible-body"><span>
                                             <div class="row">
                                                 <div class="col s10" id="medicals-section">
                                                     <div class="my-box active">
                                                    <table>
                                                        <tr>
                                                            <td width="35%">Medications</td>
                                                            <td>{!! isset($medical->medication) && !is_null($medical->medication)?$medical->medication:'<span class="red-text">No description found!</span>' !!}</td>
                                                        </tr>

                                                        {{--<tr>
                                                            <td width="35%">Allergies</td>
                                                            <td>{!! isset($medical->allegric) && !is_null($medical->allegric)?$medical->allegric:'<span class="red-text">No description found!</span>' !!}</td>
                                                        </tr>--}}
                                                    </table>
                                                     </div>
                                                     <div class="my-box">
                                                           <form id="patient-update-medication" action="/update/patient/medication" method="post" enctype="multipart/form-data">
                                                          <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                                                               {!! csrf_field() !!}
                                                           <table>
                                                        <tr>
                                                            <td width="35%">Medications</td>
                                                            <td><textarea name="medication" id="medication">{!! isset($medical->medication) && !is_null($medical->medication)?$medical->medication:'' !!}</textarea>
                                                                </td>
                                                        </tr>

                                                        {{--<tr>
                                                            <td width="35%">Allergies</td>
                                                            <td>
                                                                <textarea name="allegric" id="allegric">{!! isset($medical->allegric) && !is_null($medical->allegric)?$medical->allegric:'' !!}</textarea></td>
                                                        </tr>--}}
                                                               <tr>
                                                              <td colspan="2" class="center"><a href="#!" class="btn red white-text update">Update</a>   &nbsp; <a href="#!" class="btn red white-text cancel">Cancel</a> <span class="response"></span></td>
                                                          </tr>
                                                    </table>
                                                           </form>
                                                     </div>
                                                 </div>
                                                 <div class="col s1 right">
                                                 <a href="#!" class="edit-btn" data-action="edit-patient"><i class="material-icons">create</i> </a>
                                            </div>

                                             </div>


                                    </span></div>
                                </li>

                            </ul>
                        </div>
                        <div class="col s12 m6 lg6   no-padding">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header" id="get-medical-history1" data-patient-id="{!! $patient->id !!}"><i class="material-icons">local_hospital</i> Medical History : <span id="medical-conditions-patient" style="font-weight: 300"> {!! $history !!}</span></div>
                                    <div class="collapsible-body"><span>
                                            @php
                                            if(!empty($history) && isset($history))
                                            $history_array = explode(', ',$history);
                                            else
                                            $history_array = NULL;

                                            @endphp
                                             <div class="row">
                                                 <div class="col s10" id="medical-history-section">
                                        <select id="patient-medical-conditions" multiple>
                                            <option></option>
                                            @if(isset($medical_conditions))
                                                @foreach($medical_conditions as $m)
                                                    <option value="{!! $m->name !!}" @if(isset($history_array) && in_array($m->name,$history_array)))) selected @endif>{!! $m->name !!}</option>
                                                @endforeach
                                            @endif


                                        </select>
                                                 </div>
                                                {{-- <div class="col s1 right">
                                                <a class='add-medical-history' href='#!'><i class="material-icons">add</i></a>

                                            </div>--}}

                                             </div>


                                    </span></div>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m6 lg6  no-padding">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header" id="get-saved-items-by-id" data-patient-id="{!! $patient->id !!}"><i class="material-icons">shopping_cart</i> Saved Items </div>
                                    <div class="collapsible-body"><span>
                                            <div class="row">
                                                <div class="col s10" id="saved-items-section">

                                                 </div>
                                                 <div class="col s1 right">
                                                        <a class='add-saved-items' href='#!' data-activates='dropdown-saved-items'><i class="material-icons">add</i></a>

                                                    </div></div>
                                    </span></div>
                                </li>

                            </ul>
                        </div>

                        <div class="col s12 m6 lg6   no-padding">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header"  id="get-digital-imaging-by-id" data-patient-id="{!! $patient->id !!}"><i class="material-icons">image</i> Digital Imaging </div>
                                    <div class="collapsible-body"><span>
                                          <div class="row">
                                                <div class="col s10" id="show-digital-imaging">

                                                 </div>
                                                 <div class="col s1 right">
                                                        <a href="#!" id="add-digital-imaging"><i class="material-icons">add</i></a>

                                                    </div></div>
                                    </span></div>
                                </li>

                            </ul>
                        </div>
                    </div>
    @if(Auth::user()->role=='administrator')
                       <div class="row">
                           <div class="col s12 m6 lg6   no-padding">
                               <ul class="collapsible">
                                   <li>
                                       <div class="collapsible-header"><i class="material-icons">import_contacts</i> Contact Information </div>
                                       <div class="collapsible-body"><span>
                                             <div class="row">
                                                   <div class="col s10">
                                                       <div class="my-box active">


                                                    <table border="0" style="border: none">
                                           <tr>
                                               <td width="130px">Telephone </td>
                                               <td>{!! $patient->patient_phone !!} </td>
                                           </tr>
                                           <tr>
                                               <td>Email </td>
                                               <td  style="text-transform: lowercase !important;">{!! $patient->patient_email !!}</td>
                                           </tr>
                                           <tr>
                                               <td>Current Address</td>
                                               <td>{!! isset($addresses[0])?$addresses[0]->address:"" !!}</td>
                                           </tr>
                                           <tr>
                                               <td>Previous Address </td>
                                               <td>{!! isset($addresses[1])?$addresses[1]->address:"" !!}</td>
                                           </tr>
                                       </table>
                                                       </div>
                                                       <div class="my-box">

                                                           <form id="patient-contact-form" action="/update/patient/contact" method="post" enctype="multipart/form-data">
                                                             <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                                                               {!! csrf_field() !!}
                                                               <table border="0" style="border: none">
                                                             <tr>
                                                                 <td>Telephone</td>
                                                                 <td><input type="text" name="patient_phone" id="patient_phone" value="{!! $patient->patient_phone !!}" autocomplete="off" /> </td>
                                                             </tr>

                                                             <tr>
                                                                 <td>Email</td>
                                                                 <td><input type="text" name="patient_email"  style="text-transform: lowercase !important;" id="patient_email" value="{!! $patient->patient_email !!}" autocomplete="off" /> </td>
                                                             </tr>

                                                             <tr>
                                                                 <td>Current Address</td>
                                                                 <td><textarea name="current_address" id="current_address">
                                                                         {!! isset($addresses[0])?$addresses[0]->address:"" !!}
                                                                     </textarea> </td>
                                                             </tr>
                                                             <tr>
                                                                 <td>Previous Address</td>
                                                                 <td>
                                                                     <textarea name="previous_address" id="previous_address">
                                                                        {!! isset($addresses[1])?$addresses[1]->address:"" !!}
                                                                     </textarea>
                                                                 </td>
                                                             </tr>

                                                             <tr>
                                                                 <td colspan="2" class="center"><a href="#!" class="btn red white-text update">Update</a>   &nbsp; <a href="#!" class="btn red white-text cancel">Cancel</a> <span class="response"></span></td>
                                                             </tr>

                                                         </table>
                                                         </form>

                                                       </div>
                                                    </div>
                                                    <div class="col s1 right">
                                                           <a href="#!" class="edit-btn" data-action="edit-patient"><i class="material-icons">create</i> </a>
                                                       </div></div>
                                       </span></div>
                                   </li>

                               </ul>
                           </div>
                       </div>
                @endif
                       <h4 class="heading">Treatment Records</h4>
                       <div class="row">
                       <div class="col s12  no-padding">
                           <ul class="collapsible">
                               <li>
                                   <div class="collapsible-header"><i class="material-icons">directions_walk</i> Treatment Sessions </div>
                                   <div class="collapsible-body"><span>
                                           <form id="session-form" action="/save/sessions" method="post" enctype="multipart/form-data" />
                                           {!! csrf_field() !!}
                                           <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                                       <table>


                                           <tr>
                                               <td>
                                                   <table id="treatment-session-table">
                                                       <thead>
                                                       <tr>
                                                           <td width="15%">Session</td>
                                                           <td width="10%">Area</td>
                                                           <td width="25%">Description</td>
                                                           <td width="10%">Item</td>
                                                           <td  width="7%">Amount</td>
                                                           <td width="7%">Paid</td>
                                                           <td width="7%">Bill</td>
                                                       </tr>
                                                       </thead>
                                                       <tbody>
                                                       <tr>
                                                           <td valign="top">
                                                               <input type="text" name="session_date" value="{!! date('d.m.Y H:i:s') !!}" style="font-size: 12px" required readonly id="session_date" />
                                                           </td>
                                                            <td  valign="top">
                                                                                <select id="tooth-area" name="tooth_area">

                                                                                </select>
                                                           </td>
                                                            <td  valign="top" >
                                                                 <select id="description-dropdown">
                                                                     <option value="" selected>Choose Description</option>

                                                                     <option value="complaint">Complaint</option>
                                                                     <option value="findings">Findings</option>
                                                                     <option value="xrays">XRays</option>
                                                                     <option value="advice">Advice</option>
                                                                     <option value="pre-meds">Pre-Meds</option>
                                                                     <option value="consent">Consent</option>
                                                                     <option value="treatment-done">Treatment Done</option>
                                                                     <option value="medication-and-products">Medication and Products</option>
                                                                     <option value="post-treatment-advice">Post Treatment Advice</option>
                                                                     <option value="recall">Recall</option>
                                                                     <option value="saved-items">Saved Items</option>
                                                                     <option value="lab">Lab</option>
                                                                     <option value="referral">Referral</option>
                                                                </select>
                                                           </td>
                                                           <td  valign="top">
                                                               <span>Product</span>
                                                               <select id="products">

                                                                                    <option>Choose Product</option>

                                                                </select>
                                                           </td>
                                                           <td  valign="top">
                                                                <input type="text">
                                                           </td>
                                                           <td  valign="top">
                                                                <input type="text">
                                                           </td>
                                                            <td width="7%"  valign="top">

                                                           </td>
                                                       </tr>
                                                       </tbody>
                                                   </table>
                                               </td>
                                           </tr>

                                           <tr>
                                               <td class="center"><a href="#!" class="btn red white-text save-session">Save Session</a> <a href="#!" class="btn red white-text cancel-session">Cancel Session</a></td>

                                           </tr>
                                           <tr>
                                               <td>
                                                   <div class="row">
                                               <div class="col s12">
                                                   <div class="card green message success-message" style="display: none;">
                                                       <div class="card-content white-text">
                                                           <p></p>
                                                       </div>
                                                   </div>
                                                   <div class="card red message error-message"  style="display: none;">
                                                       <div class="card-content white-text">
                                                           <p></p>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                               </td>
                                           </tr>
                                       </table>
                                       </form>
                                       </span></div>
                               </li>

                           </ul>
                       </div>

                           <div class="row">
                               <div class="col s12" id="session-record">
                                   @if(isset($sessions))
                                       @foreach($sessions as $k=>$s)
                                           <ul class="collapsible">
                                               <li>
                                                   <div class="collapsible-header">

                                                       <i class="material-icons">directions_walk</i> Session on &nbsp; <span class="red-text">{!! date('m.d.Y H:i:s', strtotime($s->session_date_time)) !!}</span>


                                                   </div>
                                                   <div class="collapsible-body">
                                                       <span>

                                                           <div class="row">
                                                               <div class="col s12 right-align">
                                                                   <a href="#!" class="btn red white-text add-area" data-session-id="{!! $s->id !!}">Add Area</a>
                                                                   <a href="#!" class="btn red white-text add-description"  data-session-id="{!! $s->id !!}">Add Description</a>
                                                                   <a href="#!" class="btn red white-text add-items"  data-session-id="{!! $s->id !!}">Add Item</a>
                                                               </div>
                                                           </div>


                                                           <div class="row">
                                                               <div class="col s12">
                                                                   <p style="margin: 0"><strong>Treatment Notes</strong></p>
                                                                   <hr/>
                                                                   <p style="font-size: 14px">
                                                                      {!! $s->treatment_done !!}
                                                                   </p>
                                                                   @if(is_array($s->areas()->pluck('name')->toArray()))
                                                                 <p style="margin: 0"><strong>Area</strong></p>
                                                                   <hr/>
                                                                   <p style="font-size: 14px">

                                                                      {{ implode(', ',$s->areas()->pluck('name')->toArray())  }}

                                                                   </p>
                                                                   @endif
                                                                   <div class="add-area-section"></div>
                                                                   @php
                                                                       $description = isset($s->session_descriptions)?$s->session_descriptions:NULL;;
                                                                   @endphp
                                                                   @if(isset($description[0]))
                                                                     <p style="margin: 0"><strong>Description</strong></p>
                                                                   <hr/>
                                                                   <p style="font-size: 14px">

                                                                       {{ isset($description[0])&&!empty($description) && !is_null($description)?$description[0]->description:NULL }}
                                                                   </p>
                                                                   @endif
                                                                   <div class="add-description-section"></div>

                                                               </div>
                                                           </div>

                                                       </span></div>
                                               </li>

                                           </ul>
                                       @endforeach
                                       <div class="row">
                                           <div class="col s12 center">{{ $sessions->links() }}</div>
                                       </div>
                                   @endif

                               </div>
                           </div>
                   </div>










               </div>
           </section>


           <div id="add-new-session" class="modal " style="width:70% !important">
           <div class="modal-content">
               <div class="row">

                   <h4 class="left">Add New Session</h4>
                   <div class="col s1 right-align no-padding right">
                       <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                   </div>
               </div>
               <div class="row"></div>

           </div>

           </div>




           <div id="add-new-drug-allergies" class="modal " style="width:500px !important; min-height: 150px !important;">
               <div class="modal-content">
                   <div class="row">

                       <h4 class="left">Add New Drug Allergy</h4>
                       <div class="col s1 right-align no-padding right">
                           <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col s12">
                           <input  type="text" id="drug_allergy"/>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col s12 center"><a href="#!" class="btn red white-text save-drug-allergy">Save</a> <span class="response"></span> </div>
                   </div>

               </div>

           </div>

           <div id="add-new-area" class="modal " style="width:500px !important; min-height: 150px !important;">
               <div class="modal-content">
                   <div class="row">

                       <h4 class="left">Add New Area</h4>
                       <div class="col s1 right-align no-padding right">
                           <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col s12">
                           <input  type="text" id="new_area"/>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col s12 center"><a href="#!" class="btn red white-text save-new-area">Save</a> <span class="response"></span> </div>
                   </div>

               </div>

           </div>

           <div id="add-medical-history" class="modal " style="width:800px !important; min-height: 300px !important;">
               <div class="modal-content">
                   <div class="row">

                       <h4 class="left">Add New Medical History</h4>
                       <div class="col s1 right-align no-padding right">
                           <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                       </div>
                   </div>

                   <div class="row">
                       <div class="col s12 editor">
                           <form id="medical-history-form" action="/save/medical-history" method="POST" enctype="multipart/form-data">
                               {!! csrf_field() !!}
                               <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                               <input type="hidden" name="medical_id" id="medical_id" value="" />
                               <div class="row" style="font-size: 12px !important;">
                                   @php
                                       $medi = isset($medical->illness)?json_decode($medical->illness):array();

                                   @endphp

                                   <div class="col s12">
                                       <div class="row m-top-5">
                                           <div class="col s3">High Blood Pressure</div>
                                           <div class="col s3">
                                               <div class="switch" id="">

                                                   <label>
                                                       No
                                                       <input type="checkbox" name="ilnessess[]"
                                                              @if(isset($medi) && !is_null($medi) && in_array('high_blood_pressure',$medi)) checked
                                                              @endif value="high_blood_pressure">
                                                       <span class="lever"></span>
                                                       Yes
                                                   </label>
                                               </div>
                                           </div>
                                           <div class="col s3">Gastric Problems</div>
                                           <div class="col s3">
                                               <div class="switch" id="">

                                                   <label>
                                                       No
                                                       <input type="checkbox" name="ilnessess[]"
                                                              @if(isset($medi) && !is_null($medi) && in_array('gastric_problems',$medi)) checked
                                                              @endif value="gastric_problems">
                                                       <span class="lever"></span>
                                                       Yes
                                                   </label>
                                               </div>
                                           </div>

                                       </div>


                                       <div class="row m-top-5">
                                           <div class="col s3">Asthma</div>
                                           <div class="col s3">
                                               <div class="switch" id="">

                                                   <label>
                                                       No
                                                       <input type="checkbox" name="ilnessess[]"
                                                              @if(isset($medi) && !is_null($medi) && in_array('asthma',$medi)) checked
                                                              @endif value="asthma">
                                                       <span class="lever"></span>
                                                       Yes
                                                   </label>
                                               </div>
                                           </div>
                                           <div class="col s3">Head/Neck Injuries</div>
                                           <div class="col s3">
                                               <div class="switch" id="">

                                                   <label>
                                                       No
                                                       <input type="checkbox" name="ilnessess[]"
                                                              @if(isset($medi) && !is_null($medi) && in_array('head_neck_injuries',$medi)) checked
                                                              @endif value="head_neck_injuries">
                                                       <span class="lever"></span>
                                                       Yes
                                                   </label>
                                               </div>
                                           </div>
                                       </div>


                                       <div class="row m-top-5">
                                           <div class="col s3">Diabetes</div>
                                           <div class="col s3">
                                               <div class="switch" id="">

                                                   <label>
                                                       No
                                                       <input type="checkbox" name="ilnessess[]"
                                                              @if(isset($medi) && !is_null($medi) && in_array('diabetes',$medi)) checked
                                                              @endif value="diabetes">
                                                       <span class="lever"></span>
                                                       Yes
                                                   </label>
                                               </div>
                                           </div>
                                           <div class="col s3">Heart Disease</div>
                                           <div class="col s3">
                                               <div class="switch" id="">

                                                   <label>
                                                       No
                                                       <input type="checkbox" name="ilnessess[]"
                                                              @if(isset($medi) && !is_null($medi) && in_array('heart_disease',$medi)) checked
                                                              @endif value="heart_disease">
                                                       <span class="lever"></span>
                                                       Yes
                                                   </label>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="row m-top-5">
                                           <div class="col s3">Liver Problems</div>
                                           <div class="col s3">
                                               <div class="switch" id="">

                                                   <label>
                                                       No
                                                       <input type="checkbox" name="ilnessess[]"
                                                              @if(isset($medi) && !is_null($medi) && in_array('liver_problems',$medi)) checked
                                                              @endif value="liver_problems">
                                                       <span class="lever"></span>
                                                       Yes
                                                   </label>
                                               </div>
                                           </div>

                                           <div class="col s3">Epilepsy</div>
                                           <div class="col s3">
                                               <div class="switch" id="">

                                                   <label>
                                                       No
                                                       <input type="checkbox" name="ilnessess[]"
                                                              @if(isset($medi) && !is_null($medi) && in_array('eilepsy',$medi)) checked
                                                              @endif value="eilepsy">
                                                       <span class="lever"></span>
                                                       Yes
                                                   </label>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="row m-top-5">
                                           <div class="col s3">Herpes</div>
                                           <div class="col s3">
                                               <div class="switch" id="">
                                                   <label>
                                                       No
                                                       <input type="checkbox" name="ilnessess[]"
                                                              @if(isset($medi) && !is_null($medi) && in_array('herpes',$medi)) checked
                                                              @endif value="herpes">
                                                       <span class="lever"></span>
                                                       Yes
                                                   </label>
                                               </div>
                                           </div>
                                           <div class="col s3">Respiratory</div>
                                           <div class="col s3">
                                               <div class="switch" id="">

                                                   <label>
                                                       No
                                                       <input type="checkbox" name="ilnessess[]"
                                                              @if(isset($medi) && !is_null($medi) && in_array('respiratory',$medi)) checked
                                                              @endif value="respiratory">
                                                       <span class="lever"></span>
                                                       Yes
                                                   </label>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="row m-top-5">
                                           <div class="col s3">Allergic</div>
                                           <div class="col s3">
                                               <div class="switch" id="">

                                                   <label>
                                                       No
                                                       <input type="checkbox" name="ilnessess[]"
                                                              @if(isset($medi) && !is_null($medi) && in_array('allergie',$medi)) checked
                                                              @endif value="allergie">
                                                       <span class="lever"></span>
                                                       Yes
                                                   </label>
                                               </div>
                                           </div>
                                       </div>

                                   </div>
                               </div>

                               <div class="row">
                                   <div class="col s12 editor">
                                       <textarea name="medical_history" id="medical_history"  style="width: 100% !important;"></textarea>
                                   </div>
                               </div>

                           </form>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col s12 center"><a href="#!" class="btn red save-medical-history">Save Medical History</a>  <a href="#!" class="modal-action red btn modal-close">Back to Treatment Card</a><br /><span class="response"></span> </div>
                   </div>

               </div>

           </div>
           <div id="add-saved-items" class="modal " style="width:800px !important; min-height: 300px !important;">
               <div class="modal-content">
                   <div class="row">

                       <h4 class="left">Add New Items</h4>
                       <div class="col s1 right-align no-padding right">
                           <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                       </div>
                   </div>

                   <div class="row">
                       <div class="col s12 editor">
                           <form id="saved-items-form" action="/save/saved-items" method="POST" enctype="multipart/form-data">
                               {!! csrf_field() !!}
                               <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                               <input type="hidden" name="item_id" id="item_id" value="" />
                            <div class="row">
                                <div class="col s12">Upload Document:</div>
                                <div class="col s12">
                                    <input type="file" name="saved_item_document" />
                                </div>
                            </div>

                               <div class="row">
                                   <div class="col s12">Notes:</div>
                                   <div class="col s12 editor">
                                       <textarea name="notes" id="notes"  style="width: 100% !important;"></textarea>
                                   </div>
                               </div>

                           </form>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col s12 center"><a href="#!" class="btn red save-saved-item">Save Item</a>  <a href="#!" class="modal-action red btn modal-close">Back to Treatment Card</a><br /><span class="response"></span> </div>
                   </div>

               </div>

           </div>



           <div id="show-medical-history" class="modal " style="width:50% !important">
               <div class="modal-content">
                   <div class="row">

                       <h4 class="left">Medical History</h4>
                       <div class="col s1 right-align no-padding right">
                           <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col s12">
                           <h5 class="heading">Illness</h5>
                       </div>

                       <div class="col s12" id="illness">

                       </div>
                   </div>
                   <div class="row">
                       <div class="col s12">
                           <h5 class="heading">Medical History</h5>
                       </div>

                       <div class="col s12" id="response-medical-history">

                       </div>
                   </div>

               </div>

           </div>
           <div id="show-saved-items-" class="modal " style="width:700px !important">
               <div class="modal-content">
                   <div class="row">

                       <h4 class="left">Saved Item</h4>
                       <div class="col s1 right-align no-padding right">
                           <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col s12" id="show-saved-items-data"></div>
                   </div>


               </div>

           </div>
           <style>
               .dropzone{ padding: 15px;}
               .dropzone .dz-message{ text-align: center; margin-bottom: 15px;}
           </style>
           <div id="add-digital-imaging-model" class="modal " style="width:70% !important">
               <div class="modal-content">
                   <div class="row">

                       <h4 class="left">Add Digital Imaging</h4>
                       <div class="col s1 right-align no-padding right">
                           <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col s12">

                           <div class="card-panel">
                               <table>
                                   <tr>
                                       <td>Title</td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <input type="text" id="image-title" />
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <form action="/digital-image-upload"
                                                 class="dropzone"
                                                 id="dropzone1">

                                           </form>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <div class="row">
                                               <div class="col s12 center"><a href="#!" class="btn red upload-images" id="upload-images">Upload Images</a>  <a href="#!" class="modal-action red btn modal-close">Back to Treatment Card</a><br /><span class="response"></span> </div>
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <div class="row">
                                               <div class="col s12">
                                                   <div class="card green message success-message" style="display: none;">
                                                       <div class="card-content white-text">
                                                           <p></p>
                                                       </div>
                                                   </div>
                                                   <div class="card red message error-message"  style="display: none;">
                                                       <div class="card-content white-text">
                                                           <p></p>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </td>
                                   </tr>
                               </table>


                           </div>
                       </div>
                   </div>


               </div>

           </div>

           <div id="show-digital-imaging-model" class="modal " style="width:70% !important">
               <div class="modal-content">
                   <div class="row">

                       <h4 class="left">Digital Imaging for <span class="red-text" id="title-name"></span></h4>
                       <div class="col s1 right-align no-padding right">
                           <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col s12">

                           <div class="card-panel" id="show-digital">



                           </div>
                       </div>
                   </div>


               </div>

           </div>




   @endsection


   @section('js')
       {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
               {!! Html::script('public/js/jquery.form.js') !!}
               {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
       <script>
           var session_id = "";
           var patient_type = "{!! $patient->patient_type !!}";
           var patient_id = "{!! $patient->id !!}";


           $(function () {

               $("select").material_select('destroy');
               $("select").select2();


               $('#products').select2({
                   placeholder: "Enter Product ",
                   allowClear: true,
                   tags: true,
                   minimumInputLength: 3,
                   ajax: {
                       url: function (params) {
                           return '/get/products/by-search/';
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
                   alert(id);


               });

               $('#tooth-area').select2({
                   placeholder: "Enter Area ",
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
                  // alert(id);


               });
               var _description_array = [];

               $("#description-dropdown").on('change',function(){

                   var table = $("#treatment-session-table");
                   var description_section = table.find('tr:eq(1)').find("td:eq(2)");


                   var _value = $(this).val();
                   var element = "";
                   var title = "";
                   //alert($.inArray(_value,_description_array));
                   if($.inArray(_value,_description_array)<0){
                   _description_array.push(_value);
                   switch(_value){
                       case "complaint":
                            element = "textarea";
                            title = "Complaint";
                       break;
                       case "treatment-done":
                           element = "textarea";
                           title = "Treatement-Done";
                           break;
                       case "post-treatment-advice":
                           element = "textarea";
                           title = "Post-Treatment-Advice";
                           break;
                       case "findings":
                           element = "textarea";
                           title = "Findings";
                       break;
                       case "advice":
                           element = "textarea";
                           title = "Advice";
                       break;
                       case "pre-meds":
                           element = "dropdown";
                           title = "Pre-Med";
                       break;
                       case "xrays":
                           element = "dropdown";
                           title = "Xrays";
                           break;
                       case "consent":
                           element = "dropdown";
                           title = "Consent";
                           break;
                       case "saved-items":
                           element = "dropdown";
                           title = "Saved-Items";
                           break;
                       case "recall":
                           element = "dropdown";
                           title = "Recall";
                       break;
                       case "referral":
                           element = "dropdown";
                           title = "Referral";
                           break;
                   }
                        if(element!="" && title!=""){
                            $.ajax({
                                url:"/get/form/element",
                                type:"POST",
                                data:{_type:_value,element:element,title:title,"_token":"{!! csrf_token() !!}",patient_id:"{!! $patient->id !!}"},
                                success:function(response){
                                    description_section.append(response);
                                }
                            });
                        }

               }
               });

               $("body").on('click',".save-description",function(){
                   var _this = $(this);
                   var data_title = $(this).attr('data-description');

                   var data_text = "";


                   switch(data_title.toLowerCase()){
                       case "complaint":
                       case "findings":
                       case "advice":
                       case "treatment-done":
                       case "post-treatment-advice":
                           data_text =  $(this).parents('.description-table').find('textarea').val();
                       break;
                       case "pre-meds":
                       case "xrays":
                       case 'recall':
                       case 'saved-items':
                           element = "dropdown";
                           data_title = data_title.toLowerCase();
                           var text = _this.parents('.description-table').find('select').select2("data");
                           var d = [];
                           $.each(text,function(i,v){
                               d.push(v.text);
                           });
                           data_text = d.join(", ");

                           break;
                       case "consent":
                           element = "dropdown";
                           title = "Consent";
                           var text = _this.parents('.description-table').find('select').select2("data");
                           var d = [];
                           $.each(text,function(i,v){
                               data_text = (v.text);
                           });

                           break;
                       case "referral":
                           element = "dropdown";
                           title = "Referral";
                           var text = _this.parents('.description-table').find('select').select2("data");
                           var d = [];
                           $.each(text,function(i,v){
                               data_text = (v.text);
                           });

                           break;
                   }

                   $.ajax({
                        url:"/save/treatment/description",
                       type:"POST",
                       data:{
                            "_token":"{!! csrf_token() !!}",
                           title:data_title,
                           description:data_text
                        },
                        success:function(response){

                          $(".description-table").before(response);
                            _this.parent().parent().parent().parent().remove();
                            $(".save-description").unbind();
                        }
                   });

               });

               $("body").on('click',".cancel-description",function(){
                   var removeItem = $(this).attr('data-description');
                //   console.log(_description_array);
                   _description_array = jQuery.grep(_description_array, function(value) {
                       return value != removeItem;
                   });
                  // console.log(_description_array);
                    $(this).parent().parent().parent().parent().remove();
               });

               $("body").on('click',".delete-saved-description",function(){
                   var removeItem = $(this).attr('data-description');
                   //   console.log(_description_array);
                   _description_array = jQuery.grep(_description_array, function(value) {
                       return value != removeItem;
                   });
                   // console.log(_description_array);
                   $(this).parents('.description-box').remove();
               });

               $("body").on('click',".edit-saved-description",function(){
                   var _this = $(this);
                   var table = $("#treatment-session-table");
                   var description_section = table.find('tr:eq(1)').find("td:eq(2)");
                   var title            = $(this).parents('.description-box').find('.card-title').html();
                   var description      = $(this).parents('.description-box').find('.card-content p').html();

                   switch(title){
                       case "complaint":
                           element = "textarea";
                           title = "Complaint";
                           break;
                       case "treatment-done":
                           element = "textarea";
                           title = "Treatment-Done";
                           break;
                       case "post-treatment-advice":
                           element = "textarea";
                           title = "Post-Treatment-Advice";
                           break;
                       case "findings":
                           element = "textarea";
                           title = "Findings";
                           break;
                       case "advice":
                           element = "textarea";
                           title = "Advice";
                           break;
                       case "pre-meds":
                           element = "dropdown";
                           title = "Pre-Med";
                           break;
                       case "xrays":
                           element = "dropdown";
                           title = "Xrays";
                           break;
                       case "consent":
                           element = "dropdown";
                           title = "Consent";
                           break;
                       case 'saved-items':
                           element = "dropdown";
                           title = "Saved-Items";
                           break;
                       case "recall":
                           element = "dropdown";
                           title = "Recall";
                           break;
                       case "referral":
                           element = "dropdown";
                           title = "Referral";
                           break;

                   }
                   if(element!="" && title!=""){
                       $.ajax({
                           url:"/get/form/element",
                           type:"POST",
                           data:{_type:title,element:element,description:description,title:title,"_token":"{!! csrf_token() !!}",patient_id:patient_id},
                           success:function(response){
                               _this.parents('.description-box').remove();
                               description_section.append(response);
                           }
                       });
                   }



               });


              var  obj = [];
               $("#patient-flags").select2({placeholder:"Choose Flag"}).on('change',function(){
                  var color =  $(this).find(':selected').attr('data-color');
                   $(this).parents('.collapsible').find('.collapsible-header i').css('color',color);

                   $.ajax({
                       url:'/update/patient/type',
                       type:'POST',
                       data:{patient_id:"{!! $patient->id !!}",type:$(this).val(),"_token":"{!! csrf_token() !!}"},
                       success:function (response) {

                       }

                   });



                  // header.html(val.join( ", " ) );
                   //console.log(color);



   //                alert(val + color);
               });

               $('#patient-flags').val(patient_type).trigger('change');

               $(".add-area").click(function(){
                   var id= $(this).attr('data-session-id');
                   session_id  = id;
                   var ths = $(this);
                   $.ajax({
                       url:"/new/area/"+id,
                       success:function (response) {
                           ths.parents('.collapsible').find('.add-area-section').html(response);
                           $("#area-select"+id).select2({
                               placeholder:"Choose Area"
                           });
                       }
                   });

               });

               $(".add-description").click(function(){
                   var id= $(this).attr('data-session-id');
                   session_id  = id;
                   var ths = $(this);
                   $.ajax({
                       url:"/new/description/"+id,
                       success:function (response) {
                           ths.parents('.collapsible').find('.add-description-section').html(response);

                       }
                   });

               });


               $(".save-new-area").click(function(){
                   var value = $("#new_area").val();

                   if(value==""){
                       $("#new_area").focus();
                       return false;
                   }

                   $.ajax({
                       url:"/save/area",
                       type:"POST",
                       data:{'_token':"{!! csrf_token() !!}",area:value},
                       success:function (response) {
                           response = $.parseJSON(response);
                           if(response.type=='success'){
                               var newOption = new Option(response.name, response.id, true, true);
                               // Append it to the select
                               $('#area-select'+session_id).append(newOption).trigger('change');

                               $(".response").addClass('green-text');
                               $(".response").html(response.message);
                               $(".response").show();

                               setTimeout(function(){
                                   $("#add-new-area").modal('close');
                               },2000);

                           }
                       }
                   });

                //   var newOption = new Option(response.name, response.name, true, true);
                   // Append it to the select
                 //  $('#add-new-area').append(newOption).trigger('change');

               });

               /*$("#session-record .pagination a").click(function (e) {

                   var url  = $(this).attr('href');

                   if(url){
                       $(".overlay").show();
                       $(".overlay .progress").show();
                       $(".overlay .message").hide();
                       $.ajax({
                           url:url,
                           success:function(response){
                               $(".overlay .progress").hide();
                               $(".overlay").hide();
                               $('#sessions-record').html(response);
                           }
                       });
                   }

                   e.stopPropagation();
                   e.preventDefault();
               });*/

               $(".save-session").click(function(){
                   if($("#session-form").valid()){

                       $("#session-form").ajaxForm(function(response){
                           var patient_id = "{!! $patient->id !!}";
                           response = $.parseJSON(response);
                           if(response.type=='success'){
                               $(".message.success-message").html(response.message);
                               $(".message.success-message").show();
                               $('#session-record').html('<div class="progress"> <div class="indeterminate"></div></div>');
                               $.ajax({
                                   url:'/get/sessions/'+patient_id,
                                   success:function (response) {
                                       $(".overlay .progress").hide();
                                       $(".overlay").hide();
                                       $('#session-record').html(response);
                                   }
                               });

                               setTimeout(function(){
                                   $(".message.success-message").hide();
                                   $("#session-form").resetForm();
                               },2500);

                           }else{
                               $(".message.error-message").html(response.message);
                               $(".message.error-message").show();
                           }
                       }).submit();
                   }
               });



               $("#add-digital-imaging").click(function(){
                   $("#add-digital-imaging-model").modal('open');
               });

               $("#get-digital-imaging-by-id").click(function(){

                   $.ajax({
                       url:'/get/digital-imaging/{!! $patient->id !!}',
                       success:function(response){
                           $("#show-digital-imaging").html(response);
                       }
                   });
               });


              var digital_image_drop_zone= Dropzone.options.dropzone1 = {

                   // Prevents Dropzone from uploading dropped files immediately
                   autoProcessQueue: false,
                   acceptedFiles: "image/*",
                   addRemoveLinks: true,
                   maxFilesize: 10,
                  uploadMultiple: true,
                  parallelUploads: 10,

                   init: function() {
                       var submitButton = document.querySelector("#upload-images")
                       dropzone1 = this; // closure

                       submitButton.addEventListener("click", function(e) {
                           $(".message").hide();
                           var title = $("#image-title").val();


                           if(title!="")
                           dropzone1.processQueue(); // Tell Dropzone to process all queued files.
                           else{
                               $(".error-message").html('Title Field is required!');
                               $(".error-message").show();
                           }
                       });

                       this.on('success', function( file, response ){
                           response = $.parseJSON(response);

                           if(response.type=="success"){
                               $(".success-message").html(response.message);
                               $(".success-message").show();

                               setTimeout(function(){
                                   $("#image-title").val('');
                                     dropzone1.removeAllFiles( true );
                                   $("#add-digital-imaging-model").modal('close');
                                     $.ajax({
                                         url:'/get/digital-imaging/{!! $patient->id !!}',
                                         success:function(response){
                                             $("#show-digital-imaging").html(response);
                                         }
                                     });
                                   $(".message").hide();
                               },2000);
                           }else{
                               $(".error-message").html(response.message);
                               $(".error-message").show();
                           }


                       });

                       // You might want to show the submit button only when
                       // files are dropped here:
                       this.on("addedfile", function() {
                           // Show submit button here and/or inform user to click it.
                         //  alert('add');
                       });

                       this.on("removedfile", function (file) {
                         //  alert();
                       });



                   },
                   sending:function(file, xhr, formData){
                       flag_file_media = true;
                       formData.append('_token','{!! csrf_token() !!}' );
                       formData.append('patient_id',"{!! $patient->id !!}" );
                       formData.append('title',$("#image-title").val() );
                   }
               };




               $(".save-allergy-with-patient").click(function () {
                   var drugs = $("#drug-allergy").val();
                   $(".response").removeClass('green-text');
                   $(".response").removeClass('red-text');
                   $(".response").hide();
                   $.ajax({
                       url:'/save/drug/with/patient',
                       type:'POST',
                       data:{patient_id:"{!! $patient->id !!}",'_token':"{!! csrf_token() !!}",drugs:drugs},
                       success:function(response){
                          // console.log(response);
                           response = $.parseJSON(response);
                           $(".response").addClass('green-text');
                           $(".response").html(response.message);
                           $(".response").show();

                           setTimeout(function(){
                               $(".response").removeClass('green-text');
                               $(".response").removeClass('red-text');
                               $(".response").hide();
                           },2500);

                       }
                   });
               });

         //     var medical_history = new nicEditor({fullPanel : true}).panelInstance('medical_history',{hasPanel : true});
        //       var notes = new nicEditor({fullPanel : true}).panelInstance('notes',{hasPanel : true});

               $("#add-drug-item").click(function(){
                   $("#drug_allergy").val('');
                   $("#add-new-drug-allergies").modal('open');
                   $(".response").hide();

               });

               $(".save-drug-allergy").click(function(){
                   var name = $("#drug_allergy").val();

                   $.ajax({
                       url:'/save/drug-allergye',
                       type:'POST',
                       data:{name:name,'_token':'{!! csrf_token() !!}'},
                       success:function (response) {
                           response = $.parseJSON(response);
                           if(response.type=='success'){
                               var newOption = new Option(response.name, response.name, true, true);
                               // Append it to the select
                               $('#drug-allergy').append(newOption).trigger('change');

                               $(".response").addClass('green-text');
                               $(".response").html(response.message);
                               $(".response").show();

                               setTimeout(function(){
                                   $("#add-new-drug-allergies").modal('close');
                               },2000);

                           }
                       }
                   });
               });


               $(".add-saved-items").click(function(){
                   $(".response").removeClass('green-text');
                   $(".response").removeClass('red-text');
                   $(".response").hide();
                   $("#saved-items-form").resetForm();
                   $("#add-saved-items").modal('open');
               });

               $("#get-saved-items-by-id").click(function(){
                   var patient_id = $(this).attr('data-patient-id');

                   $.ajax({
                       url:"/get/saved-items/patient/{!! $patient->id !!}",
                       success:function (response) {
                           $("#saved-items-section").html(response);
                       }
                   });
               });


               $("#get-medical-history").click(function(){
                   var patient_id = $(this).attr('data-patient-id');

                   $.ajax({
                       url:"/get/medical-history/patient/"+patient_id,
                       success:function (response) {
                           $("#medical-history-section").html(response);
                       }
                   });
               });




               $(".add-medical-history").click(function(){
                  // nicEditors.findEditor('medical_history').setContent('');
                   $("#medical-history-form").resetForm();
                   $("#add-medical-history").modal('open');
               });

               $(".save-medical-history").click(function(){
                   $(".response").removeClass('green-text');
                   $(".response").removeClass('red-text');
                   $(".response").hide();
               //    var text = nicEditors.findEditor('medical_history').getContent();
                  // $("#medical_history").val(text);
                   $("#medical-history-form").ajaxForm(function(response){
                       response = $.parseJSON(response);
                       if(response.type=="success"){
                           $(".response").addClass('green-text');
                           $(".response").html(response.message);
                           $(".response").show();

                           $.ajax({
                               url:"/get/medical-history/patient/{!! $patient->id !!}",
                               success:function (response) {
                                   $("#medical-history-section").html(response);
                               }
                           });


                           setTimeout(function(){
                               $(".response").hide();
                               $("#add-medical-history").modal('close');
                           },2000);
                       }else{
                           $(".response").addClass('red-text');
                           $(".response").html(response.message);
                           $(".response").show();
                       }
                   }).submit();
               });

               $(".save-saved-item").click(function(){
                   $(".response").removeClass('green-text');
                   $(".response").removeClass('red-text');
                   $(".response").hide();
                //   var text = nicEditors.findEditor('notes').getContent();
                //   $("#notes").val(text);
                   $("#saved-items-form").ajaxForm(function(response){
                       response = $.parseJSON(response);
                       if(response.type=="success"){
                           $(".response").addClass('green-text');
                           $(".response").html(response.message);
                           $(".response").show();

                           $.ajax({
                               url:"/get/saved-items/patient/{!! $patient->id !!}",
                               success:function (response) {
                                   $("#saved-items-section").html(response);
                               }
                           });


                           setTimeout(function(){
                               $(".response").hide();
                               $("#add-saved-items").modal('close');
                           },2000);
                       }else{
                           $(".response").addClass('red-text');
                           $(".response").html(response.message);
                           $(".response").show();
                       }
                   }).submit();
               });


              // $("#medical_history").summernote();


               $( "#date_of_birth" ).datepicker({ dateFormat: 'dd.mm.yy',
                   changeMonth: true,
                   changeYear: true,
                   yearRange: '-100:+0',
                   maxDate : '-2Y'
               });



              /* $( "#session_date" ).datepicker({ dateFormat: 'dd.mm.yy',
                   changeMonth: true,
                   changeYear: true,
                   yearRange: '0:+100'
               });*/

               $( "#expiry_date" ).datepicker({ dateFormat: 'dd.mm.yy',
                   changeMonth: true,
                   changeYear: true,
                   yearRange: '0:+100'
               });
               $(".update").click(function(){
                   var ths = $(this);
                   $(".response").removeClass('green-text');
                   $(".response").removeClass('red-text');


                   var form = $(this).parents('.collapsible').find('.my-box  form');
                   var current_address = "";
                   var previous_address = "";

                   if(form.attr('id')=="patient-contact-form"){
                       current_address = $('#current_address').val();
                       previous_address = $('#previous_address').val();
                       $("#current_address").val(current_address);
                       $("#previous_address").val(previous_address);
                   }


                   form.ajaxForm(function(response){
                     response = $.parseJSON(response);

                     if(response.type=="success"){

                         $(".response").addClass('green-text');
                         $(".response").html(response.message);
                         $(".response").show();
                         if(form.attr('id')=="patient-update-form"){
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(0)').find("td:eq(1)").html($("#patient_name").val());;
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(1)').find("td:eq(1)").html($("#date_of_birth").val());;
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(2)').find("td:eq(1)").html($("#card_number").val());;
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(3)').find("td:eq(1)").html($("#family").val());;
                         }

                         if(form.attr('id')=="patient-contact-form"){
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(0)').find("td:eq(1)").html($("#patient_phone").val());;
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(1)').find("td:eq(1)").html($("#patient_email").val());;
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(2)').find("td:eq(1)").html($("#current_address").val());;
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(3)').find("td:eq(1)").html($("#previous_address").val());;
                         }

                         if(form.attr('id')=="patient-update-refferal"){
                             var data1 = $('select[name=referral_id]').select2('data');
                             var data2 = $('#insurance_by').select2('data');
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(0)').find("td:eq(1)").html(data1[0].text);;
                             if(data1[0].id){
                                 $("#referral_id").val(data1[0].id);
                             }

                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(1)').find("td:eq(1)").html($("#insurance_by").val() +"-"+ $("#insurance_number").val());;
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(2)').find("td:eq(1)").html($("#expiry_date").val());;

                         }

                         if(form.attr('id')=="patient-update-medication"){
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(0)').find("td:eq(1)").html($("#medication").val());;
                             ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(1)').find("td:eq(1)").html($("#allegric").val());;
                         }





                         setTimeout(function(){
                             $(".response").hide();
                             ths.parents('.collapsible').find('.my-box').last().removeClass('active');
                             ths.parents('.collapsible').find('.my-box').first().addClass('active');
                         },2000);

                     }

                   }).submit();
               });

               $(".cancel").click(function(){
                   $(this).parents('.collapsible').find('.my-box').last().removeClass('active');
                   $(this).parents('.collapsible').find('.my-box').first().addClass('active');
               });

               $(".main-row").click(function(){
                   $(".colspan-row").removeClass('active');
                   var id = $(this).attr('id');
                 //  alert(id);
                   $("."+id).addClass('active');
               });

               $("#drug-allergy").select2({

               }).on('change',function(){
                       var val = $(this).val();
                       $("#span-drug-allergy").html(val.join( ", " ) );
                   var drugs = $("#drug-allergy").val();
                  // $(".response").removeClass('green-text');
                  // $(".response").removeClass('red-text');
                 //  $(".response").hide();
                   $.ajax({
                       url:'/save/drug/with/patient',
                       type:'POST',
                       data:{patient_id:"{!! $patient->id !!}",'_token':"{!! csrf_token() !!}",drugs:drugs},
                       success:function(response){
                           // console.log(response);
                           response = $.parseJSON(response);
                          // $(".response").addClass('green-text');
                         //  $(".response").html(response.message);
                         //  $(".response").show();



                       }
                   });
               });

   $("#insurance_by").material_select('destroy');
   $("#insurance_by").select2();

               $("#patient-medical-conditions").material_select('destroy');
               $("#patient-medical-conditions").select2().on('change',function(){
                   var val = $(this).val();
                   $("#medical-conditions-patient").html(val.join( ", " ) );
                   var medical_conditions = $("#patient-medical-conditions").val();
                   // $(".response").removeClass('green-text');
                   // $(".response").removeClass('red-text');
                   //  $(".response").hide();
                   $.ajax({
                       url:'/save/medical-history',
                       type:'POST',
                       data:{patient_id:"{!! $patient->id !!}",'_token':"{!! csrf_token() !!}",medical_conditions:medical_conditions},
                       success:function(response){
                           // console.log(response);
                           response = $.parseJSON(response);
                           // $(".response").addClass('green-text');
                           //  $(".response").html(response.message);
                           //  $(".response").show();



                       }
                   });
               });;

               $(".edit-btn").click(function () {

                   $(this).parents('.collapsible').find('.my-box').first().removeClass('active');
                   $(this).parents('.collapsible').find('.my-box').last().addClass('active');


               });


               $("input[name=patient_flag]").on('change',function(){
                   var val = $(this).val();
                   var type = "";
                   var id = $(this).attr('id');

                   if(id=="red-color"){
                       $(this).parents('.collapsible').find(".collapsible-header").html('<i class="material-icons red-text">flag</i>'+val);
                       type="drug_allergy"
                   }

                   if(id=="yellow-color"){
                       $(this).parents('.collapsible').find(".collapsible-header").html('<i class="material-icons yellow-text">flag</i>'+val);
                       type = "vip"
                   }

                   if(id=="black-color"){
                       $(this).parents('.collapsible').find(".collapsible-header").html('<i class="material-icons black-text">flag</i>'+val);
                       type = "difficult";
                   }

                   $.ajax({
                       url:'/update/patient/type',
                       type:'POST',
                       data:{patient_id:"{!! $patient->id !!}",type:type,"_token":"{!! csrf_token() !!}"},
                       success:function (response) {

                       }

                   });


               });


             /*  $("#area").select2({
                   placeholder: "Enter/Choose Area ",
                   allowClear: true,
                   tags: true,
               });
               $("#patient_type").select2({
                   placeholder: "Enter/Choose Patient Type ",
                   allowClear: true,
                   tags: true,
               });
               $("#complaint").select2({
                   placeholder: "Enter Complaint ",
                   allowClear: true,
                   tags: true,
               });
               $("#findings").select2({
                   placeholder: "Enter Findings  ",
                   allowClear: true,
                   tags: true,
               });
               $("#xrays").select2({
                   placeholder: "Enter/Choose X-Rays  ",
                   allowClear: true,
                   tags: true,
               });
               $("#advice").select2({
                   placeholder: "Enter/Choose Advice  ",
                   allowClear: true,
                   tags: true,
               });
               $("#pre-meds").select2({
                   placeholder: "Enter/Choose Pre-Medications  ",
                   allowClear: true,
                   tags: true,
               });
               $("#medication_product").select2({
                   placeholder: "Enter Medications and Products  ",
                   allowClear: true,
                   tags: true,
               });
               $("#post_treatment_advice").select2({
                   placeholder: "Enter Post Treatment Advice ",
                   allowClear: true,
                   tags: true,
               });

               $("#saved_items").select2({
                   placeholder: "Enter Saved Items",
                   allowClear: true,
                   tags: true,
               });

               $("#lab").select2({
                   placeholder: "Enter Lab",
                   allowClear: true,
                   tags: true,
               });*/

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

               $("#consent").select2({
                   placeholder: "Choose Consent  ",

               });

               $( "#recall" ).datepicker({ dateFormat: 'dd.mm.yy',minDate:'Now' });



               $(".show-control").click(function(){
                   $(this).next(".control").toggle();
               });

               $('.collapsible').collapsible();
            //   const medical_history = new PerfectScrollbar('#medical-history');
              // const treat_ment_card = new PerfectScrollbar('#treatment-card-info');

           })
       </script>




       {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
   @endsection