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




<script>
    $('.collapsible').collapsible();

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

    $(".add-area").click(function(){
        var id= $(this).attr('data-session-id');
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
    $("#session-record .pagination a").click(function (e) {

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
    });
</script>