@if(isset($appointment->appointment_sessions) && $appointment->appointment_sessions->count() > 0)

    @foreach($appointment->appointment_sessions as $k=>$session)
@php
    $tooth_area_id = isset($session)?$session->tooth_area:"";
    $ids = "";
    $tooth_areas="";
    if(!empty($tooth_area_id)){
        $ids = explode(',',$tooth_area_id);
        $t = \App\ToothAreas::whereIn('id',$ids)->pluck('name')->toArray();
        $tooth_areas = implode(', ',$t);
    }

@endphp

<div class="card border-left-danger  border-left-3 rounded-left-0  bg-light">
    <div class="card-body my-card-space">
        <blockquote class="blockquote  py-2 mb-0">
            <dl class="row mb-0">
                <dt class="col-sm-2 font-size-sm mb-0">Session{!! $k+1 !!} </dt>
                <dd class="col-sm-10 font-size-sm mb-0">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th width="10%">Date</th>
                                <th width="10%">Area</th>
                                <th width="40%">Description</th>
                                <th>By<a href="#!" class="change-doctor-by" data-doctor-id="{!! empty($session->doctor_by)?$appointment->doctors->id:$session->doctor_by !!}" data-session-id="{!! $session->id !!}"><span class="text-danger icon-pencil ml-1 font-size-sm"></span> </a></th>
                                <th width="12%">Items<a href="#!"><span class="text-danger icon-plus-circle2 ml-1 font-size-sm add-items" data-patient-id="{!! $session->patient_id !!}"  data-appointment-id="{!! $appointment->id !!}" data-session-id="{!! $session->id !!}" title="Add Items"></span> </a> </th>
                                <th width="10%">Amount</th>

                                <th>Paid</th>
                                <th>Bal/Bill</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td valign="top">{!! \App\Helpers\CommonMethods::formatDate($session->created_at) !!}</td>
                                <td valign="top">{!! $tooth_areas !!}</td>
                                <td valign="top">

                                        @if($session->complaints)
                                        <dl class="mb-0">
                                        <dt class="font-weight-black">Complaint </dt>
                                        <dd>{!! $session->complaints !!}</dd>
                                        </dl>
                                        @endif


                                        @if($session->findings)
                                         <dl class="mb-0">
                                        <dt  class="font-weight-black">Finding </dt>
                                        <dd>{!! $session->findings !!}</dd>
                                         </dl>
                                        @endif
                                        @if($session->radiographs)
                                                <dl class="mb-0">
                                        <dt  class="font-weight-black">Radiographs </dt>
                                        <dd>{!! $session->radiographs !!}</dd>
                                                </dl>
                                        @endif
                                            @if($session->pre_medications)
                                                <dl class="mb-0">
                                                <dt  class="font-weight-black">Pre-Medications </dt>
                                                    @php
                                                        $pre_medications_id = isset($session)?$session->pre_medications:"";

                                                        $pre_medications = "";
                                                        if(!empty($pre_medications_id)){
                                                            $ids = explode(',',$pre_medications_id);
                                                            $p = \App\Products::whereIn('id',$ids)->pluck('product_title')->toArray();
                                                          //  dd($p);
                                                            $pre_medications = implode(',',$p);
                                                          //  dd($pre_medications);
                                                        }
                                                    @endphp
                                                <dd>{!! $pre_medications !!}</dd>
                                                </dl>
                                            @endif
                                            @if($session->pre_advice)
                                                <dl class="mb-0">
                                                    <dt  class="font-weight-black">Pre Advice </dt>
                                                    <dd>{!! $session->pre_advice !!}</dd>
                                                </dl>
                                            @endif

                                            @if($session->post_treatment_advice)
                                                <dl class="mb-0">
                                                    <dt  class="font-weight-black">Post Treatment Advice </dt>
                                                    <dd>{!! $session->post_treatment_advice !!}</dd>
                                                </dl>
                                            @endif
                                            @if($session->medications)
                                                <dl class="mb-0">
                                                    <dt  class="font-weight-black">Medications </dt>
                                                    @php
                                                        $pre_medications_id = isset($session)?$session->medications:"";

                                                        $medications = "";
                                                        if(!empty($pre_medications_id)){
                                                            $ids = explode(',',$pre_medications_id);
                                                            $p = \App\Products::whereIn('id',$ids)->pluck('product_title')->toArray();
                                                          //  dd($p);
                                                            $medications = implode(',',$p);
                                                          //  dd($pre_medications);
                                                        }
                                                    @endphp
                                                    <dd>{!! $medications !!}</dd>
                                                </dl>
                                            @endif
                                            @if($session->materials)
                                                <dl class="mb-0">
                                                    <dt  class="font-weight-black">Materials </dt>
                                                    <dd>{!! isset($session->materials)?$session->materials->name:"" !!}</dd>
                                                </dl>
                                            @endif
                                            @if($session->labs)
                                                <dl class="mb-0">
                                                    <dt  class="font-weight-black">Labs </dt>
                                                    <dd>{!! isset($session->labs)?$session->labs->name:"" !!}</dd>
                                                </dl>
                                            @endif
                                            @if($session->to_order)
                                                <dl class="mb-0">
                                                    <dt  class="font-weight-black">To Order </dt>
                                                    <dd>{!! $session->to_order !!}</dd>
                                                </dl>
                                            @endif

                                            @if($session->next_visit)
                                                <dl class="mb-0">
                                                    <dt  class="font-weight-black">Next Visit </dt>
                                                    <dd>{!! \App\Helpers\CommonMethods::formatDate($session->next_visit) !!}</dd>
                                                </dl>
                                            @endif
                                            @if($session->notes)
                                                <dl class="mb-0">
                                                    <dt  class="font-weight-black">Notes </dt>
                                                    <dd>{!! $session->notes !!}</dd>
                                                </dl>
                                            @endif
                                            @if($session->treatment_done)
                                                <dl class="mb-0">
                                                    <dt  class="font-weight-black">Treatment Done </dt>
                                                    <dd>{!! $session->treatment_done !!}</dd>
                                                </dl>
                                            @endif

                                </td>
                                <td valign="top"> <span  rel="session-{!! $session->id  !!}">
                                        @if(isset($session->doctors))
                                            Dr. {!! $session->doctors->fname !!} {!! $session->doctors->lname !!}
                                            @else
                                        Dr. {!! $appointment->doctors->fname !!} {!! $appointment->doctors->lname !!}
                                            @endif
                                    </span></td>
                                <td valign="top">
                                    <ul class="list list-unstyled mb-0">
                                        @if(isset($session->session_items) && $session->count() > 0)
                                            @foreach($session->session_items as $item)
                                            <li>{!! $item->products->product_title !!}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </td>
                                <td valign="top">
                                    <ul class="list list-unstyled mb-0">
                                        @if(isset($session->session_items) && $session->count() > 0)
                                            @foreach($session->session_items as $item)
                                                <li>${!! is_numeric($item->products->product_purchases[0]->price_unit)?number_format($item->products->product_purchases[0]->price_unit,2):$item->products->product_purchases[0]->price_unit !!}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </td>
                                <td valign="top">
                                    ${!! \App\SessionItems::getSessionPaidAmount($appointment->id ,$session->id) - \App\SessionItems::getSessionDiscountAmount($appointment->id ,$session->id) !!}
                                </td>
                                <td>$0.00</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>

                </dd>
            </dl>
        </blockquote>
    </div>
    <div class="card-footer bg-transparent d-flex justify-content-between border-top-0 pb-2">
        <span class="text-muted">&nbsp;</span>

        <ul class="list-inline list-inline-condensed mb-0">
            <li class="list-inline-item mr-0  ">
                <a href="#!" class="badge bg-danger-400 edit-session" data-id="{!! $session->id !!}"><i class="icon-pencil  font-size-sm"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="#!" class="badge bg-danger-400 delete-session " data-id="{!! $session->id !!}"><i class="icon-trash  font-size-sm"></i></a>
            </li>

        </ul>
    </div>
</div>
    @endforeach
    @else
    <div class="alert bg-danger text-white text-center" style="display: block">

        <span class="font-weight-semibold">No session found</span> .
    </div>
@endif