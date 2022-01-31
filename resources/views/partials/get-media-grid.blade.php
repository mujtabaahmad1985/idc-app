<style>

    .grid-item {
        width: 200px;
        margin-bottom: 3px;
        background-size: cover;
        min-height: 200px;
    }
</style>

@php
    $images = ['png','jpg','bmp','gif','jpeg'];

@endphp
<div class="row border-top-1" id="attachments">
    @if(!is_null($media))
        @foreach($media as $m)
            @php
                $infoPath = pathinfo((public_path() . '/uploads/media/'.$m->directory_name.'/'.$m->media_file_name));
            @endphp
    <div class="col-md-3 mt-2">
        @if(in_array($infoPath['extension'],$images))
            <div style="display: none">
                <a href="{!! env('APP_URL') !!}/uploads/media/{!! $m->directory_name !!}/{!! $m->media_file_name !!}" class="img-thumbnail" title="{!! $m->media_file_name !!}">
                    <img src="{!! env('APP_URL') !!}/uploads/media/{!! $m->directory_name !!}/{!! $m->media_file_name !!}" class="img-fluid" alt="{!! $m->media_file_name !!}"></a>
            </div>
        @endif
        <li class="media mb-2">
            <div class="mr-3">
                <a href="#">
                    <img src="{!! env('APP_URL') !!}/bootstrap/images/file-icons/{!! $infoPath['extension'] !!}.svg" class="rounded-circle" width="52" height="52" alt="">
                </a>
            </div>

            <div class="media-body">
                <h6 class="media-title"> {!! $m->media_file_name !!}</h6>
                @if(in_array($infoPath['extension'],$images))
                    <a href="" class="image-view text-danger">View</a> |@endif
                <a class="text-danger" href="{!! env('APP_URL') !!}/uploads/media/{!! $m->directory_name !!}/{!! $m->media_file_name !!}" download="{!! $m->media_file_name !!}">Download</a>
            </div>
        </li>
    </div>
        @endforeach
        @endif
</div>



<script>



</script>