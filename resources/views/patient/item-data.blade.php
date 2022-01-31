<table>
    <tr>
        <td width="20%" style="font-weight: 700">File Name: </td>
    </tr>
    <tr>
        <td style="text-transform: none; text-align: center">
            @php
            $file = explode('.',$saved_item->file_name);
            $picture_array = ['jpg','gif','bmp','png','jpeg'];
            @endphp
            @if(in_array($file[1],$picture_array))

                <img class="materialboxed"  style="width: 100%" src="/uploads/saved-item/{!! $saved_item->file_name !!}">
            @endif

            @if($file[1]=="pdf")
                <div class="center">
                    <object data="/uploads/saved-item/{!! $saved_item->file_name !!}" type="application/pdf" width="600px" height="600">
                        alt : <a href="/uploads/saved-item/{!! $saved_item->file_name !!}">view-consent.pdf</a>
                    </object>
                </div>
            @endif


            {!! $saved_item->file_name !!}
        </td>
    </tr>
    <tr>
        <td width="" style="font-weight: 700">Notes: </td>
    </tr>
    <tr>
        <td style="text-transform: none; ">{!! $saved_item->notes !!}</td>
    </tr>
    <tr>
        <td colspan="2" class="center"> <a href="#!" class="modal-action red btn modal-close">Back to Treatment Card</a></td>
    </tr>
</table>