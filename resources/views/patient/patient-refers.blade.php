<ul>
    @foreach($patient as $p)
        <li>

                <a href="/patient/view/{!! $p->id !!}" target="_blank">

                        <div class="span3 well">
                                <div class="text-center">
                                        <img src="{!! url('/') !!}/img/no-user-image.gif" name="aboutme" width="40" height="40" class="rounded-circle">
                                        <h6 style="margin-bottom: 2px"> {!! $p->salutation.' '.$p->patient_name !!}</h6>
                                        <em>idcsg-{!! $p->patient_unique_id !!} |
                                                @php
                                                        $years = \Carbon\Carbon::parse($p->date_of_birth)->age;
                                                    echo $years.' years old';
                                                @endphp
                                        </em>
                                </div>
                        </div>


                </a>
        </li>
        @if(isset($p->patient_refers) && $p->patient_refers->count() > 0)
            @include('patient.patient-refers', ['patient' => $p->patient_refers])
        @endif
    @endforeach
</ul>

