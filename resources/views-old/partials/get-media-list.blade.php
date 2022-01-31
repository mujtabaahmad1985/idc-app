
<table class="table table-striped ">
    <thead>
    <tr>
        <th>File Name</th>
        <th>Type</th>
        <th>Size</th>
        <th>Uploaded DateTime</th>
        <th></th>
    </tr>

    </thead>
    <tbody>
    @if(!is_null($media))
        @foreach($media as $m)


            <tr>
                <td><span style="text-transform: lowercase">{!! $m->media_file_name !!}</span> </td>
                <td><span style="text-transform: lowercase">{!! $m->media_file_type !!}</span></td>
                <td></td>
                <td>{!! date('m.d.Y H:i:s', strtotime($m->created_at)) !!}</td>
                <td><a href="/uploads/media/{!! $m->directory_name !!}/{!! $m->media_file_name !!}" download="{!! $m->media_file_name !!}" data-id="{!! $m->id !!}" class="download-media"><i class="icon-file-download text-danger"></i> </a>  <a href="#!" data-id="{!! $m->id !!}" class="delete-media"><i class="icon-trash text-danger"></i> </a> </td>

            </tr>
        @endforeach
        <td colspan="5">
            {{ $media->links() }}
        </td>
    @else
        <tr>
            <td colspan="5">No media found</td>

        </tr>

    @endif
    </tbody>
</table>

        <script>
            $(function(){
                $(".delete-media").click(function(){
                    var id = $(this).attr('data-id');
                    var ths = $(this);

                    $.ajax({
                        url:"/media/delete/"+id,
                        success:function () {
                            ths.parents('tr').remove();
                        }
                    });
                });
            })
        </script>



