<style>
    .grid-item { width: 200px;  margin-bottom: 3px; }
</style>
<div class="grid">
@if(!is_null($media))
    @foreach($media as $m)
<div class="grid-item">
    <img src="/public/uploads/media/{!! $m->directory_name !!}/{!! $m->media_file_name !!}" style="width: 100%" class="materialboxed" />
</div>
        @endforeach
    @endif
        </div>
<script>
    $(document).ready(function(){

        setTimeout(function(){
            $('.grid').masonry({
                // options
                itemSelector: '.grid-item',
                columnWidth: 200,
                gutter: 3
            });
        },200);


    });


</script>