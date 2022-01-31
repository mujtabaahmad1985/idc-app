<style>
    .collection .collection-item {

        padding: 7px;}
    a.delete-consent{ cursor: pointer}
</style>
<div class="row" id="work-collections">
    <div class="col s4">
        <div class="card-panel">
            <ul id="issues-collection" class="collection">
                <li class="collection-item avatar">
                    <i class="material-icons circle pink darken-2">cloud_done</i>
                    <span class="collection-header">Consent Forms</span>
                    <p>{!! $patient_name !!}</p>
                    <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                </li>
                @if(isset($consents) && !is_null($consents))
                @foreach($consents as $consent)

                <a class="collection-item" href="#!" data-id="{!! $consent->id !!}">
                    <div class="row">
                        <div class="col s10">
                            <p class="collections-title">{!! $consent->consent_for !!}</p>
                            <p class="collections-content small">{!! date('d.m.Y H:i:s', strtotime($consent->created_at)) !!} </p>
                        </div>
                        <div class="col s2">
                            <span class="task-cat red-text center delete-consent"  data-id="{!! $consent->id !!}" title="delete consent form"><i class="material-icons">delete</i> </span>
                        </div>

                    </div>
                </a>
                    @endforeach
                    @else
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s10">
                                        <p class="collections-title">No consent form found !</p>

                                    </div>


                                </div>
                            </li>
                @endif
            </ul>
            <hr />
            <a href="#!" class="add-new-consent-form red-text" data-patient-id="{!! $id !!}" data-appointment-id="{!! isset($appointment_id)?$appointment_id:NULL !!}">Add New Consent Form</a>
        </div>
    </div>
    <div class="col s8">
        <div class="card-panel show-detail-consent">
            {{--<div>
                <object data="{{ url('/') }}/consent-form.pdf" type="application/pdf" width="700" height="1000">
                    alt : <a href="consent-form.pdf">test.pdf</a>
                </object>
            </div>--}}
        </div>
    </div>
</div>

<script>
    var appointment_id="{!! isset($appointment_id)?$appointment_id:0 !!}";
    $(function(){
        const patient_consent_form = new PerfectScrollbar('#patient-consent');
        $("a.collection-item").click(function(){
            var id = $(this).attr('data-id');
            $(".show-detail-consent").html('<div class="progress"> <div class="indeterminate"></div></div>');
            $.ajax({
                url:"/consent/detail/"+id,
                success:function(response){

                    $(".show-detail-consent").html(response);
                }
            });
        });

        $(".add-new-consent-form").click(function(){
            var patient_id = $(this).attr('data-patient-id');
            $("#patient-consent-form").modal('open');
            $.ajax({
                url:"/patient/show/consent/"+patient_id+"/"+appointment_id,
                success:function(response){
                    $(".patient-consent-result").html(response);
                }
            });
        });

        $(".delete-consent").click(function(e){
            var id = $(this).attr('data-id');
            var ths = $(this);
            $.ajax({
                url:"/consent/delete/"+id,
                success:function () {
                    ths.parents('.collection-item').remove();
                }
            });
            e.preventDefault();
            e.stopPropagation();
        });
    })
</script>