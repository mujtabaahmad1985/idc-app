
@foreach($patient_medical_history as $patient_history)
    <div class="list-feed-item border-warning-400">
        <div class="text-muted font-size-sm mb-1">  @php
                $created_at = \Carbon\Carbon::parse($patient_history->created_at);
                    echo $created_at->diffForHumans(\Carbon\Carbon::now());
            $illness_id = isset($patient_history->illness) && !empty($patient_history->illness)?explode(',',$patient_history->illness):NULL;
           $illness = \App\MedicalConditions::whereIn('id',$illness_id)->pluck('name')->all();

            @endphp</div>
        <mark>{!! implode(', ',$illness) !!}</mark> {!! $patient_history->medical_history_text !!} {{--<a href="#!" class="badge  no-position text-muted" style="padding: 2px"><i class="icon-pencil font-size-xs"></i> </a>--}} <a href="#!" style="padding:2px" class="badge text-danger  delete-action-button"><i class="icon-trash font-size-xs"></i> </a>

    </div>
@endforeach