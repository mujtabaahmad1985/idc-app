<style>
    .collection .collection-item {

        padding: 7px;}
    a.delete-consent{ cursor: pointer}
</style>


<ul class="nav nav-tabs nav-tabs-highlight mb-0">
    @if(isset($consents) && !is_null($consents))
        @foreach($consents as $k=>$consent)
    <li class="nav-item show-consent-form" data-id="{!! \App\Helpers\CommonMethods::encrypt($consent->id) !!}"><a href="#bordered-tab1"   class="nav-link @if($k==0) active show @endif" data-toggle="tab">{!! $consent->consent_for !!}</a></li>
        @endforeach
        @else

    @endif
        <li class="nav-item"><a href="#bordered-tab1" data-patient-id="{!! request()->route('patient_id') !!}" class="nav-link add-new-consent-form  @if(!isset($consents))  active show @endif" data-toggle="tab"><i class="icon-plus-circle2 mr-2"></i> New</a></li>
</ul>


<div class="tab-content card card-body border-top-0 rounded-top-0 mb-0">

    <div class="tab-pane fade  @if(isset($consents) && !is_null($consents)) active show @endif" id="bordered-tab1">

    </div>


</div>



<script>
    var appointment_id="{!! isset($appointment_id)?$appointment_id:0 !!}";
    var patient_id = "{!! request()->route('patient_id') !!}";
    $(function(){

        $("body").on('click','.show-consent-form',function () {
            var id = $(this).data('id');

            $.ajax({
                url:'/show/patient/consent/'+id,
                success:function (response) {
                    $("#bordered-tab1").html(response);
                    $("#bordered-tab1").addClass('active show');
                }
            });
        });

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
            var patient_id = $(this).data('patient-id');

            $.ajax({
                url:"/patient/show/consent/"+patient_id+"/"+appointment_id,
                success:function(response){
                    $("#bordered-tab1").html(response);
                    $("#bordered-tab1").addClass('active show');
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