
        <h5 class="card-title">
            <a href="#" class="text-default">
                <i class="icon-statistics mr-2"></i>
              Consent to {!! $form->consent_for !!}
            </a>
        </h5>
        <p class="mt-2 font-weight-bolder">Procedures</p>
        <p class="mb-3">{!! $form->procedures !!}</p>
        <p class="font-weight-bolder">Additional Procedures</p>
        @php
            $additionals = !empty($form->addtional_procedures)?explode(',',$form->addtional_procedures):NULL;

        @endphp
        @if(isset($additionals) && count($additionals) > 0)
        <ul class="list list-unstyled mb-3">
            @foreach($additionals as $a)
            <li>
                <i class="icon-checkmark-circle text-success mr-2"></i>
                {!! $a !!}
            </li>
            @endforeach
        </ul>
            @endif


        <p class="mt-2 font-weight-bolder">Medications</p>
        @php
            $medications = !empty($form->medications)?explode(',',$form->medications):NULL;

        @endphp
        @if(isset($medications) && count($medications) > 0)
            <ul class="list list-unstyled mb-3">
                @foreach($medications as $a)
                    <li>
                        <i class="icon-checkmark-circle text-success mr-2"></i>
                        {!! $a !!}
                    </li>
                @endforeach
            </ul>
        @endif

        <p class="mt-2 font-weight-bolder">Alternative Options</p>
        <p class="mb-3">{!! $form->alternative_options !!}</p>

        <p class="mt-2 font-weight-bolder">By Doctor</p>
        <p class="mb-3">{!! isset($form->doctors)?$form->doctors->fname.' '.$form->doctors->lname:"" !!}</p>

        <p class="mt-2 font-weight-bolder">Signature</p>
        <img src="{!! env('APP_URL') !!}/uploads/consent-signature/{!! $form->patient_signature !!}" class="img-thumbnail w-25" />
        <p class="mt-2">

            <button class="btn btn-danger btn-sm edit-form" data-id="{!! $form->id !!}"><i class="icon-pencil mr-2"></i> Edit</button>
            <button class="btn btn-danger btn-sm delete-form" data-id="{!! $form->id !!}"><i class="icon-trash mr-2"></i> Delete</button>
            <button class="btn btn-danger btn-sm print-form"  data-id="{!! \App\Helpers\CommonMethods::encrypt($form->id) !!}"><i class="icon-printer mr-2"></i> Print</button>
        </p>



