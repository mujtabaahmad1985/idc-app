<div class="row">

    @if(isset($digitals))

        @foreach($digitals as $k=>$d)
            @if($k%6==0)
            </div><div class="row">
                @endif
            <div class="col s2">
                <img class="materialboxed"  style="width: 100%" src="/uploads/digital-imaging/patient-{!! $patient_id !!}/{!! $d->file_name !!}">


            </div>
        @endforeach
    @endif
</div>

<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
        $('.dropdown-trigger').dropdown();
    });

</script>