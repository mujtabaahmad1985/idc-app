


<table>
    <thead>
        <tr>
            <th width="50%">Document Name</th>
            <th width="10%">Size</th>
            <th width="15%">Document Type</th>
            <th width="10%">For</th>
            <th width="15">Uploaded at</th>
        </tr>

    </thead>
    <tbody>
    @if(isset($documents) && !is_null($documents))
        @foreach($documents as $document)
        <tr>
            <td style="font-size: 12px; text-transform: lowercase !important; padding: 5px 0"><a
                        href="/public/uploads/documents/{!! $document->document  !!}"
                        class="truncate" style="font-size: 12px" title="Click to download"

                        download="{!! $document->document  !!}">{!! $document->document !!}</a></td>
            @php
                $file = public_path("uploads/documents/".$document->document);
                $size =  filesize($file);
                $size = round($size *  .0009765625,2);;
                $info = pathinfo($file);
                $type = $info['extension'];




            @endphp
            <td style="padding: 5px 0">{!! $size !!} KB</td>
            <td style="text-transform: lowercase !important; padding: 5px 0">{!! $type !!}</td>
            <td style="padding: 5px 0">{!! $document->document_type !!}</td>
            <td style="padding: 5px 0">{!! date('d.m.Y h:i:s', strtotime($document->created_at)) !!}</td>
        </tr>
        @endforeach
     @endif
    </tbody>
</table>

