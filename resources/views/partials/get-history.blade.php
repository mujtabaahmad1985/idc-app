<style>
    h4.task-card-title {
        font-size: 1rem;
    }
    span.title{ font-size: 0.8rem; text-transform: lowercase !important;}
    span.title a{text-transform:capitalize !important;}

#card-history .collection.with-header{
    height:65px;}
    #card-history .card .card-content{ padding: 0;}
    #treatment-card .collapsible-body{ padding: 0.5rem; font-size: 12px;}
    #treatment-card .collection .collection-item{ padding: 10px 8px;}
    #treatment-card .collection .collection-item .material-icons{font-size: 14px;
        top:4px; position: relative}
    #treatment-card ul.extra-treatment-record{ padding-left: 0px;}
    #treatment-card ul.extra-treatment-record li{ padding-right:0px; display: inline-block}
    #activity .collection-item.avatar p{font-size: 0.8rem;
        line-height: 17px;
        color: gray;}
    #activity .collection-item.avatar .time{
        width: 100%;
        text-align: right;
        font-size: 0.7rem;}

</style>
<div id="card-history">
    <div class="row">
        <div class="col s12">
            <ul id="task-card" class="collection with-header">
                <li class="collection-header red">
                    <div class="row">
                        <h4 class="task-card-title col s10 m-top-5">{!! $patient->patient_name !!}'s Detail</h4>
                        <div class="col s1">
                            <a href="javascript:;" class="close-task-panel white-text"><i class="material-icons">close</i></a>
                        </div>
                    </div>

                </li>



            </ul>
        </div>
    </div>
    <div class="card">

        <div class="card-tabs">
            <ul class="tabs tabs-fixed-width">
                <li class="tab"><a href="#treatment-card">Treatment Card</a></li>
                <li class="tab"><a href="#activity">Activity</a></li>
            </ul>
        </div>
        <div class="card-content grey lighten-4">
            <div id="treatment-card">
                <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                    @if(isset($treatments))
                        @foreach($treatments as $key=>$treatment)
                    <li class="">
                        <div class="collapsible-header"><i class="material-icons">local_hospital</i> {!! date('d.m.Y',strtotime($treatment->created_at)) !!}</div>
                        <div class="collapsible-body" style="display: none;"><span>
                                <ul class="collection">
                                    @if($key==0)
                                        <li  class="collection-item"><i class="material-icons prefix">remove</i> <strong> Last Visit: </strong> {!! date('d.m.Y',strtotime($appointments->created_at)) !!}</li>
                                    @endif
                                     <li class="collection-item"><i class="material-icons prefix">remove</i> <strong> Treatment Done: </strong> {!! $treatment->treatment_done !!}</li>
                                    @if(!empty($treatment->finding))
                                        <li class="collection-item"><i class="material-icons prefix">remove</i> <strong> Finding: </strong> {!! $treatment->finding !!}</li>
                                    @endif
                                    @if(!empty($treatment->x_rays))
                                        <li class="collection-item"><i class="material-icons prefix">remove</i> <strong> X-Rays: </strong> {!! $treatment->x_rays !!}</li>
                                    @endif
                                    @if(!empty($treatment->complaint))
                                        <li class="collection-item"><i class="material-icons prefix">remove</i> <strong> Complaint: </strong> {!! $treatment->complaint !!}</li>
                                    @endif
                                    @if(!empty($treatment->recall))
                                        <li class="collection-item"><i class="material-icons prefix">remove</i> <strong> Recall: </strong> {!! $treatment->recall !!}</li>
                                    @endif
                                    @if(!empty($treatment->advice))
                                        <li class="collection-item"><i class="material-icons prefix">remove</i> <strong> Advice: </strong> {!! $treatment->advice !!}</li>
                                    @endif
                                    @if(!empty($treatment->pre_med))
                                        <li class="collection-item"><i class="material-icons prefix">remove</i> <strong> Pre-Meds: </strong> {!! $treatment->pre_med !!}</li>
                                    @endif
                                    @if(!empty($treatment->post_treatment_advice))
                                        <li class="collection-item"><i class="material-icons prefix">remove</i> <strong> Post Treatment Advice: </strong> {!! $treatment->post_treatment_advice !!}</li>
                                    @endif
                                    @if(!empty($treatment->medication))
                                        <li class="collection-item"><i class="material-icons prefix">remove</i> <strong> Medicine: </strong> {!! $treatment->medication !!}</li>
                                    @endif
                                        <li class="collection-item">
                                            <ul class="extra-treatment-record m-top-10">

                                <li><a href="#!"  class="consent" data-treatment-id="{!! $treatment->id !!}"><i class="material-icons prefix">description</i> Patient Consent</a> </li>
                                <li><a href="#!" class="product" data-treatment-id="{!! $treatment->id !!}"><i class="material-icons prefix">local_pharmacy</i> Products</a> </li>
                                                @if($key==0)
                                                    <li><a href="#!" class="next-appointment"  data-treatment-id="{!! $treatment->id !!}"><i class="material-icons prefix">date_range</i> Next Appointment</a> </li>
                                                @endif
                            </ul>
                                        </li>
                                </ul>
                            </span></div>
                    </li>
                        @endforeach
                    @else
                    @endif
                </ul>
            </div>
            <div id="activity">
                <ul class="collection">
                @if(isset($activities))
                    @foreach($activities as $activity)
                        <li  class="collection-item avatar">
                            <div class="time">{!!date('d.m.Y H:i',strtotime( $activity->created_at)) !!}</div>
                            <i class="material-icons circle red">account_circle</i>
                            <span class="title"><a href="#!">You</a> {!! $activity->activity_title !!}</span>
                            <p>
                                {!! $activity->activity_description !!}
                            </p>


                        </li>
                    @endforeach
                 @endif
                </ul>
            </div>

        </div>
    </div>


</div>

<script>
    $(function(){
        $('#card-history ul.tabs').tabs();
        $('#card-history .collapsible').collapsible();

        $("#treatment-card .product").click(function () {

            $("#saved-product-modal").modal('open');
            var id = $(this).attr('data-treatment-id');
            $.ajax({
                url:"/treatment/products/"+id,
                success: function (response) {
                    $("#product-saved").html(response);
                }
            });
        });

        $("#treatment-card .consent").click(function () {

            $("#consent-modal").modal('open');
            var id = $(this).attr('data-treatment-id');
            $.ajax({
                url:"/treatment/consent/"+id,
                success: function (response) {
                    $("#consent-saved").html(response);
                }
            });
        });
    })
</script>