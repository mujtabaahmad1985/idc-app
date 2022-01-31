@php
    $image_ext  = ['jpg','png','jpeg'];
    $pdf = ['pdf'];
    $documents   = ['doc','docx','xls','xlsx'];
    $media      = ['avi','mp4','mp3'];
    $download   = ['zip'];
@endphp
<style>
    .mfp-wrap.my-custom-class .mfp-content {
        height: 800px;
        max-height: 90vh;
        width: 800px;
        max-width: 90vw;
    }
</style>
<div class="row">
    @if(isset($folder) && isset($folder->documents) && $folder->documents->count() > 0)
        @foreach($folder->documents as $document)
            @php

                $ext = File::extension($document->document_title);


            @endphp
        <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
            <div class="card  justify-content-center text-center  card-body">
                <div class="card-header bg-white header-elements-inline "  style="padding: 0; border-bottom: 0">

                    <div class="header-elements">
                        <div class="list-icons">
                            <a href="{!! url('/').'/uploads/documents/'.$document->document_title !!}" class="list-icons-item" download="{!! $document->document_title !!}" title="Download"><i class="icon-download font-size-sm text-success-600"></i></a>
                            <a href="#" class="list-icons-item" title="Delete"><i class="icon-trash font-size-sm text-danger-600"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12"> <img src="{!! url('/').'/bootstrap/assets/file-icons/'.$ext.'.svg' !!}" class="" width="40"  alt=""></div>
                    <div class="col-12 "><p class="font-weight-bold text-center text-nowrap document-title" title="     {!! $document->document_title !!}">
                            @if(in_array($ext,$image_ext))
                         <a  href="{!! url('/').'/uploads/documents/'.$document->document_title !!}"  class="text-blue-300 font-size-xs  image-file">   {!! $document->document_title !!}</a>
                        @elseif(in_array($ext,$pdf))
                                <a  href="{!! url('/').'/uploads/documents/'.$document->document_title !!}"  class="text-blue-300 font-size-xs  pdf-file">   {!! $document->document_title !!}</a>
                            @elseif(in_array($ext,$documents))
                                <a  href="https://docs.google.com/gview?url={!! url('/').'/uploads/documents/'.$document->document_title !!}&embedded=true"  class="text-blue-300 font-size-xs  document-file" data-link="{!! url('/').'/uploads/documents/'.$document->document_title !!}">   {!! $document->document_title !!}</a>
                            @endif
                        </p> </div>
                    <div class="col-12">
                        <span class="text-muted text-center font-size-xs">{!! date('d.m.Y',strtotime($document->created_at)) !!}  </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        @else
        <div class="col-md-12">
            <div class="alert bg-danger text-white text-center" style="display: block">

                No file found!
            </div>
        </div>
    @endif
</div>

<script>
var file_name = "";
    $('.image-file').magnificPopup({
        type: 'image',
        gallery:{
            enabled:true
        }
        // other options
    });
    $('.pdf-file').magnificPopup({
        type: 'iframe',
        mainClass: 'my-custom-class',
        // other options
    });
    $(".document-file").magnificPopup({


            type: 'iframe',
            mainClass: 'my-custom-class',
            // other options


    });



</script>