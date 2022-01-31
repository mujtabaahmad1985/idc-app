<style>
    .document-title{
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;

    }
    li.folder{
        cursor: pointer;}
    li.folder .ml-3{ display: none}
    li.folder:hover .ml-3{ display: block}
    .media{ margin-top:  0}
</style>
<div class="card" style="padding:.9375rem 1.25rem">
    <div class="card-header bg-white header-elements-sm-inline">
        <h6 class="card-title d-flex">
            Documents
            <a href="#" class="header-elements-toggle text-default d-sm-none"><i class="icon-more"></i></a>
        </h6>

        <div class="header-elements d-none">
            <form action="#">
                <div class="form-group-feedback form-group-feedback-right">
                    <input type="search" class="form-control wmin-sm-200" placeholder="Search...">
                    <div class="form-control-feedback">
                        <i class="icon-search4 font-size-base text-muted"></i>
                    </div>

                </div>
            </form>  <button type="button" class="btn bg-danger-400 btn-icon ml-3 upload-document"><i class="icon-upload"></i></button>
        </div>

    </div>

    <div class="card-body" style="padding:1.25rem 0">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body">


                    <ul class="media-list documents"> @if(isset($folderss) && $folderss->count() > 0)
                        @foreach($folderss as $k=>$folder)
                        <li class="media folder @if($k==0) active @endif" data-id="{!! $folder->id !!}">
                            <div class="mr-3">
                                <a href="#">
                                    <img src="{!! url('/').'/bootstrap/images/folder.svg' !!}" class="" width="32" height="32" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <p class="media-title font-size-md font-weight-bold">{!! $folder->folder_name !!}</p>
                                <span class="font-size-xs text-muted">{!! $folder->documents->count() !!} Files</span>
                            </div>
                            <div class="ml-3 mt-1 mr-1" >
                                <div class="list-icons">
                                    <a href="#" class="list-icons-item caret-0 edit-folder " data-id="{!! $folder->id !!}" data-toggle="dropdown" aria-expanded="false"><i class="icon-pencil font-size-xs"></i></a>
                                    <a href="#" class="list-icons-item caret-0 delete-folder" data-id="{!! $folder->id !!}" data-toggle="dropdown" aria-expanded="false"><i class="icon-trash  font-size-xs text-danger-600"></i></a>


                                </div>
                            </div>
                        </li>
@endforeach
                        @endif


                    </ul>
                    </div>

                    <div class="card-footer bg-white d-flex justify-content-between">
                        <span class="text-muted font-size-xs">Last updated 23.12.2017</span>

                        <ul class="list-inline mb-0">

                            <li class="list-inline-item"><a href="#" class="font-size-xs add-new-folder">New Folder</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                <div class="card card-body bg-light document-files">

            </div>
        </div>
    </div>
</div>
