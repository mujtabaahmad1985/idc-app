<div class="row">
    @if(isset($titles))
    @foreach($titles as $title)
            <a href="#!" class="get-digital-imaging-by-title" data-title="{!! $title->title !!}" data-patient-id="{!! $patient_id !!}"> <div class="col s2 center"> <img src="/images/directory-icon.png"> <br /> {!! $title->title !!}  </div></a>
        @endforeach
        @endif


</div>

<script>
    $(function(){
        $(".get-digital-imaging-by-title").click(function(){
            var title = $(this).attr('data-title');
            var id = $(this).attr('data-patient-id');
            $("#title-name").html(title);
            $("#show-digital").html('<div class="progress"> <div class="indeterminate"></div></div>');
            $.ajax({
                url:"/get/digital-images/by/title/"+title+"/"+id,
                success:function(response){
                    $("#show-digital").html(response);

                    $("#show-digital-imaging-model").modal('open');
                }
            });
        });
    })
</script>