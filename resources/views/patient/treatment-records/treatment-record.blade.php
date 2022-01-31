<style>
    #selected-flags {
        list-style: none;
        float: left;
        padding: 0;
        margin-left: 15px;
        margin-bottom: 0;
    }

    #selected-flags li {
        display: inline-block;
        margin-right: 10px
    }

    .card-header:not([class*=bg-]):not([class*=alpha-]) {

        padding-top: 0.625rem;
        padding-bottom: 0.625rem;

    }

    .nav-tabs-bottom .nav-link.active:before {
        background-color: #f44336;
    }

    .sessions .multiselect-native-select {
        position: relative;
        top: -6px;
    }

    .sessions a {
        color: #F00
    }

    .multiselect-selected-text {
        color: #F00
    }

    .multiselect:after {
        display: none;
    }
    .add-new-data{ display: none}


</style>

<div class="container">
    <div class="row mb-4">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <h4 class="heading">Treatment Record</h4>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6" style="position: relative">
            <form id="search-treatment-form">
                <div class="input-group">

                    <input type="text" class="form-control border-right-0" id="search-keywords" name="keywords"
                           placeholder="Search in treatment card">
                    <span class="input-group-prepend">
												<button class="btn bg-danger" id="search-patients" type="button"><i
                                                            class="icon-search4"></i> </button>
											</span>
                    <span class="input-group-prepend">
												<button class="btn bg-danger" type="button"><i
                                                            class="icon-plus3"></i></button>
											</span>

                </div>

            </form>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


            <div id="accordion-default">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card border-top-danger card-element">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">
                                    <a style="float:left;" data-toggle="collapse" class="text-default"
                                       href="#accordion-item-default1" aria-expanded="true">
                                        Patient's Flag
                                    </a>
                                    <ul id="selected-flags">

                                        @if(isset($patient_flags))
                                            @foreach($patient_flags as $f)
                                                <li><i class="icon-flag7" style="color: {!! $f->color !!}"></i> </li>
                                                @endforeach
                                        @endif

                                    </ul>
                                    <div style="clear:both"></div>
                                </h6>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item " data-toggle="collapse"
                                           href="#accordion-item-default1" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="add"
                                           data-container-for="patient-flag"><i class="icon-plus3"
                                                                                style="font-size: 12px"></i> </a>

                                    </div>
                                </div>
                            </div>

                            <div id="accordion-item-default1" class="collapse" data-parent="#accordion-default"
                                 style="">
                                <div class="card-body ">
                                    <div class="row">

                                        <div class="form-group">

                                            <select class="form-control multiselect-link patient-flags"
                                                    data-button-width="500" multiple="multiple" data-fouc>
                                                @if(isset($flags))
                                                @foreach($flags as $f)
                                                <option value="{!! $f->id !!}" @if(in_array($f->id,$patient_flags_ids)) selected @endif data-color="{!! $f->color !!}">{!! $f->name !!}</option>
                                                @endforeach
                                                @endif

                                            </select>
                                        </div>

                                        <div class="form-group col-sm-12 add-new-data">
                                            <div class="input-group">

                                                <input type="text" class="form-control bg-danger border-danger"
                                                       placeholder="Enter new flag with color">
                                                <span class="input-group-append">

    <button class="btn bg-danger-700 colorpicker-basic" type="button"><i class="icon-brush"></i></button><button class="btn bg-danger-700 save-new-data"
                                                                                               type="button"><i
                                                                class="icon-floppy-disk"></i></button>
								</span>

                                            </div>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card border-top-danger card-element">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">
                                    <a class="text-default collapsed" data-toggle="collapse"
                                       href="#accordion-item-default2" aria-expanded="false">Drug Allergies</a>
                                </h6>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item " data-toggle="collapse"
                                           href="#accordion-item-default2" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="add" data-container-for="drug-allergies"><i class="icon-plus3"
                                                                                        style="font-size: 12px"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div id="accordion-item-default2" class="collapse" data-parent="#accordion-default"
                                 style="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped table-no-padding drug-allergy-table">
                                                <tbody>
                                                @if(isset($allergies_data))
                                                    @foreach($allergies_data as $d)
                                                        <tr>
                                                            <td width="40%">{!! $d['created_at'] !!}</td>
                                                            <td>{!! $d['name'] !!}</td>
                                                            <td><a href="#!" class="delete-allergy text-danger" data-id="{!! $d['id'] !!}"><i class="icon-trash"></i></a>  </td>

                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>


                                                <tr class="drug-allergies" style="display: none">
                                                    <td colspan="3" style="padding: 10px 0 !important; ">
                                                        <select id="more-allergy" class="mt-1">
                                                            @if(isset($drug_allergies))
                                                                @foreach($drug_allergies as $d)
                                                            <option value="{!! $d->id !!}" @if(in_array($d->id,$allergies)) disabled @endif>{!! $d->name !!}</option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-right"><a href="#!" class="text-danger more-allergy btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-2" ><i class="icon-plus3"></i> </a> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-center">

                                                        <span class="text-danger d-message"></span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row mt-2">

                                            <div class="form-group col-sm-12 add-new-data">
                                                <div class="input-group">

                                                    <input type="text" class="form-control bg-danger border-danger"
                                                           placeholder="Enter new drug allergy">
                                                    <span class="input-group-append">

                                                     <button class="btn bg-danger-700 save-new-data" type="button"><i class="icon-floppy-disk"></i></button>
								                    </span>
                                                </div>
                                                <span class="text-danger"></span>
                                            </div>

                                    </div>





                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card border-top-danger card-element">
                            <div class="card-header  header-elements-inline">
                                <h6 class="card-title">
                                    <a data-toggle="collapse" class="text-default" href="#accordion-item-default3"
                                       aria-expanded="true">Current Medications</a>
                                </h6>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item " data-toggle="collapse"
                                           href="#accordion-item-default3" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="add"  data-container-for="medications" ><i class="icon-plus3"
                                                                                        style="font-size: 12px"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div id="accordion-item-default3" class="collapse" data-parent="#accordion-default"
                                 style="">
                                <div class="card-body ">
                                    <div class="form-group">

                                    <select class="form-control" multiple id="current-medications">
                                        @if(isset($patient->products) && $patient->products->count() > 0)
                                            @foreach($patient->products as $pre_medical)
                                                <option value="{!! $pre_medical->id !!}" selected>{!! $pre_medical->product_title !!}</option>
                                            @endforeach
                                            @endif
                                    </select>
                                    </div>
                                    <div class="row mt-2">

                                        <div class="form-group col-sm-12 add-new-data">
                                            <div class="input-group">

                                                <input type="text" class="form-control bg-danger border-danger"
                                                       placeholder="Enter new medications">
                                                <span class="input-group-append">

                                                     <button class="btn bg-danger-700 save-new-data" type="button"><i class="icon-floppy-disk"></i></button>
								                    </span>
                                            </div>
                                            <span class="text-danger"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card border-top-danger card-element">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">
                                    <a class="text-default collapsed" data-toggle="collapse"
                                       href="#accordion-item-default4" aria-expanded="false">Medical History</a>
                                </h6>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item " data-toggle="collapse"
                                           href="#accordion-item-default4" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="add"><i class="icon-plus3"
                                                                                        style="font-size: 12px"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div id="accordion-item-default4" class="collapse" data-parent="#accordion-default"
                                 style="">
                                <div class="card-body" >
                                    <div id="add-new-history" style="display: none;">
                                        <form id="save-new-medical-history" action="/save/medical/history" method="POST" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                                            <div class="form-group">
                                                <label>Medical Conditions</label>
                                                <select class="form-control multiselect-link illness-history"  name="illness[]"
                                                        data-button-width="500" multiple="multiple" data-fouc>

                                                    @if(isset($medical_conditions))
                                                        @foreach($medical_conditions as $t)
                                                            <option value="{!! $t->id !!}"> {!! $t->name !!} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control medical-history-card" name="description" required></textarea>
                                        </div>

                                        </form>
                                            <p class="mt-1">
                                                <a href="#!" class="btn btn-sm btn-danger save-history" style="padding: 3px 5px; font-size: 12px">Save History </a>
                                                <a href="#!" class="btn btn-sm btn-danger cancel-history" style="padding: 3px 5px; font-size: 12px">Cancel </a>
                                            </p>

                                        </div>
                                    </div>
                                    <div id="recent-history">
                                        @if(isset($patient->medical_histories) && $patient->medical_histories->count() > 0)
                                        <div class="form-group">
                                            <label>Recent History</label>
                                            <div class="list-feed">
                                                @for($i=1;$i<=3;$i++)
                                                <div class="list-feed-item border-warning-400">
                                                    <div class="text-muted font-size-sm mb-1">12 minutes ago</div>
                                                    <a href="#">David Linner</a> requested refund for a double card charge
                                                    <p>
                                                        <a href="#!" class="text-danger-300">Edit</a> |  <a href="#!" class="text-danger-300">Delete</a>
                                                    </p>

                                                </div>
@endfor

                                            </div>
                                        </div>
                                            @else
                                            <div class="alert bg-danger text-white text-center" style="display: block; padding: 3px">

                                                No history found!.
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-sm-12 text-right">
                                                @if(isset($patient->medical_histories) && $patient->medical_histories->count() > 1)
                                                <a href="#!" class="btn btn-sm btn-danger save-history" style="padding: 3px 5px; font-size: 12px">Load Previous History </a>
                                                @endif
                                                <a href="#!" class="btn btn-sm btn-danger add-new-history" style="padding: 3px 5px; font-size: 12px">Add New History </a>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card border-top-danger card-element">
                            <div class="card-header  header-elements-inline">
                                <h6 class="card-title">
                                    <a data-toggle="collapse" class="text-default" href="#accordion-item-default5"
                                       aria-expanded="true">Saved Items</a>
                                </h6>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item " data-toggle="collapse"
                                           href="#accordion-item-default5" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="add" data-container-for="saved-items"><i class="icon-plus3"
                                                                                        style="font-size: 12px"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div id="accordion-item-default5" class="collapse" data-parent="#accordion-default"
                                 style="">
                                <div class="card-body ">
                                    <div class="card add-new-data">
                                        <div class="card-header header-elements-inline">
                                            <h6 class="card-title">New Item</h6>


                                        </div>

                                        <div class="card-body ">
                                            <form action="#">
                                                <div class="form-group">
                                                    <label>Caption</label>
                                                    <input type="text" name="title" class="form-control" placeholder="Enter caption for item..." required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="enter-message" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your description..."></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>File</label>
                                                    <div class="uniform-uploader"><input type="file" class="form-control-uniform-custom"><span class="filename" style="user-select: none;">No file selected</span><span class="action btn bg-danger" style="user-select: none;">Choose File</span></div>
                                                </div>


                                                <div class="d-flex align-items-center">


                                                    <button type="button" class="btn bg-danger   ml-auto"><i class="icon-floppy-disk"></i></button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <hr/>
                                    <ul class="media-list">
                                        <li class="media">


                                            <div class="media-body">
                                                <div class="media-title font-weight-semibold">Clinical Files</div>
                                                One preparatory festive outran blatantly indecisively
                                                <div class="text-muted mt-1"><i class="icon-check"></i> Just now</div>
                                            </div>

                                            <div class="ml-3">
                                                <div class="list-icons">
                                                    <a href="#" class="list-icons-item dropdown-toggle"
                                                       data-toggle="dropdown" aria-expanded="true"><i
                                                                class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-eye2"></i> View</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-trash"></i>
                                                            Delete</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-share3"></i>
                                                            Share</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">


                                            <div class="media-body">
                                                <div class="media-title font-weight-semibold">Clinical Files</div>
                                                One preparatory festive outran blatantly indecisively
                                                <div class="text-muted mt-1"><i class="icon-check"></i> 1 hour ago</div>
                                            </div>

                                            <div class="ml-3">
                                                <div class="list-icons">
                                                    <a href="#" class="list-icons-item dropdown-toggle"
                                                       data-toggle="dropdown" aria-expanded="true"><i
                                                                class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-eye2"></i> View</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-trash"></i>
                                                            Delete</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-share3"></i>
                                                            Share</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">


                                            <div class="media-body">
                                                <div class="media-title font-weight-semibold">Clinical Files</div>
                                                One preparatory festive outran blatantly indecisively
                                                <div class="text-muted mt-1"><i class="icon-check"></i> 2 hour ago</div>
                                            </div>

                                            <div class="ml-3">
                                                <div class="list-icons">
                                                    <a href="#" class="list-icons-item dropdown-toggle"
                                                       data-toggle="dropdown" aria-expanded="true"><i
                                                                class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-eye2"></i> View</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-trash"></i>
                                                            Delete</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-share3"></i>
                                                            Share</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">


                                            <div class="media-body">
                                                <div class="media-title font-weight-semibold">Onto much less</div>
                                                As ouch lizard hurried less ingenuously malicious yikes belched agilely
                                                shrank more diabolically
                                                <div class="text-muted mt-1"><i class="icon-check"></i> Yesterday 11:59
                                                    PM
                                                </div>
                                            </div>

                                            <div class="ml-3">
                                                <div class="list-icons">
                                                    <a href="#" class="list-icons-item dropdown-toggle"
                                                       data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-eye2"></i> View</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-trash"></i>
                                                            Delete</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-share3"></i>
                                                            Share</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

                                    <button type="button" class="btn bg-danger mt-2 float-right" data-toggle="modal"
                                            data-target="#modal_theme_danger">Load More
                                    </button>
                                    <div style="clear: both"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card border-top-danger card-element">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">
                                    <a class="text-default collapsed" data-toggle="collapse"
                                       href="#accordion-item-default6" aria-expanded="false">Digital Images</a>
                                </h6>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item " data-toggle="collapse"
                                           href="#accordion-item-default6" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="add" data-container-for="digital-imaging"><i class="icon-plus3"
                                                                                        style="font-size: 12px"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div id="accordion-item-default6" class="collapse" data-parent="#accordion-default"
                                 style="">
                                <div class="card-body">
                                    <div class="row add-new-data">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="file-uploader"><span>Your browser doesn't have Flash installed.</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-img-actions px-1 pt-1 pb-1">
                                                    <img class="card-img img-fluid"
                                                         src="{!! url('/') !!}/bootstrap/images/placeholders/placeholder.jpg"
                                                         alt="">

                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn bg-danger mt-2 float-right" data-toggle="modal"
                                            data-target="#modal_theme_danger">Load More
                                    </button>
                                    <div style="clear: both"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">




                                @if(isset($patient->appointments) && $patient->appointments->count() > 0)




                                    @foreach($patient->appointments as $k=>$session)


                                        <div class="card">

                                            <div class="card-header bg-danger text-white d-flex justify-content-between">
                                                <h6 class="card-title"> Session on <span
                                                            class="badge badge-dark ml-auto">{!! $session->created_at !!}</span></h6>

                                            </div>
                                            <div class="card-body">
                                            <form action="/save/appointment/session" method="post" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                                                <input type="hidden" name="appointment_id" value="{!! $session->id !!}" />
                                                <input type="hidden" name="session_id" value="{!! isset($session->appointment_sessions)?$session->appointment_sessions->id:"" !!}" />
                                                <div class="row">
                                                    <div class="float-left ml-2"><h6 class="mb-0 font-weight-semibold">
                                                            Area:</h6></div>
                                                    <div class="float-left">
                                                        @php
                                                            $tooth_area_id = isset($session->appointment_sessions)?$session->appointment_sessions->tooth_area:"";
                                                            $ids = "";
                                                            if(!empty($tooth_area_id)){
                                                                $ids = explode(',',$tooth_area_id);

                                                            }

                                                        @endphp
                                                        <select class="form-control multiselect-link patient-teeth-area" name="tooth_area[]"
                                                                data-button-width="500" multiple="multiple" data-fouc>
                                                            @if(isset($tooth_areas))
                                                                @foreach($tooth_areas as $t)
                                                            <option value="{!! $t->id !!}" @if(!empty($ids) && in_array($t->id,$ids))) selected @endif> {!! $t->name !!} </option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>


                                                <p class="mb-0 text-muted">by <a href="#!">Dr {!! ucwords($session->doctors->fname.' '.$session->doctors->lname) !!}</a> at <a
                                                            href="#!">{!! $session->locations->name !!} </a></p>
                                                <p class="mb-3 text-muted"> N: Algie Forta</p>
                                                <hr class="mt-0">

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <dl class="mb-0">
                                                            <dt>Treatment Done</dt>
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <input type="text" class="form-control" name="treatment_done" value="{!! isset($session->appointment_sessions)?$session->appointment_sessions->treatment_done:"" !!}"/>
                                                            </dd>
                                                            <dt>Complaints</dt>
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <input type="text" class="form-control" name="complaints" value="{!! isset($session->appointment_sessions)?$session->appointment_sessions->complaints:"" !!}"/>
                                                            </dd>
                                                            <dt>Findings</dt>
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <input type="text" class="form-control" name="findings" value="{!! isset($session->appointment_sessions)?$session->appointment_sessions->findings:"" !!}"/>
                                                            </dd>
                                                            <dt>Radiographs</dt>
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <input type="text" class="form-control" name="radiographs" value="{!! isset($session->appointment_sessions)?$session->appointment_sessions->radiographs:"" !!}"/>
                                                            </dd>
                                                            <dt>Pre-Medications</dt>
                                                            @php
                                                            $pre_medications_id = isset($session->appointment_sessions)?$session->appointment_sessions->pre_medications:"";
                                                            $pre_medications = "";
                                                            if(!empty($pre_medications_id)){
                                                                $ids = explode(',',$pre_medications_id);
                                                                $pre_medications = \App\PreMedicals::whereIn('id',$ids)->get();
                                                            }
                                                            @endphp
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <select class="select2 pre-medication" multiple name="pre_medications[]">
                                                                    <option></option>
                                                                    @if(!empty($pre_medications))
                                                                        @foreach($pre_medications as $medication)
                                                                            <option value="{!! $medication->id !!}"selected>{!! $medication->name !!}</option>
                                                                            @endforeach
                                                                        @endif
                                                                </select>
                                                            </dd>




                                                            <dt>To Order</dt>
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <input type="text" class="form-control" name="to_order"  value="{!! isset($session->appointment_sessions)?$session->appointment_sessions->to_order:"" !!}"/>
                                                            </dd>

                                                        </dl>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <dl class="mb-0">
                                                            <dt>Pre Advice</dt>
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <input type="text" class="form-control" name="pre_advice"  value="{!! isset($session->appointment_sessions)?$session->appointment_sessions->pre_advice:"" !!}"/>
                                                            </dd>
                                                            <dt>Post Treatment Advice</dt>
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <input type="text" class="form-control" name="post_treatment_advice"  value="{!! isset($session->appointment_sessions)?$session->appointment_sessions->post_treatment_advice:"" !!}"/>
                                                            </dd>
                                                            <dt>Medications</dt>
                                                            @php
                                                                $medications_id = isset($session->appointment_sessions)?$session->appointment_sessions->medications:"";
                                                                $medications = "";
                                                                if(!empty($medications_id)){
                                                                    $ids = explode(',',$medications_id);
                                                                    $medications = \App\PreMedicals::whereIn('id',$ids)->get();
                                                                }
                                                            @endphp
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <select class="select2 medication" multiple name="medications[]" >
                                                                    <option></option>
                                                                    @if(!empty($medications))
                                                                        @foreach($medications as $medication)
                                                                            <option value="{!! $medication->id !!}"selected>{!! $medication->name !!}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </dd>
                                                            <dt>Next Visit</dt>
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <input type="text" class="form-control date" name="next_visit"  value="{!! isset($session->appointment_sessions)?$session->appointment_sessions->next_visit:"" !!}"/>
                                                            </dd>
                                                            <dt>Lab</dt>
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <select class="select2 lab" name="lab">
                                                                    <option></option>
                                                                </select>
                                                            </dd>
                                                            <dt>Communications</dt>
                                                            <dd class="mb-1" style="text-transform: none">
                                                                <div class="row">
                                                                    <div class="col-sm-1">
                                                                        <div class="form-group">
                                                                            <label>POST</label>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="communication[]"
                                                                                       value="email_receive"
                                                                                       class="custom-control-input"
                                                                                       id="email_receive1">
                                                                                <label class="custom-control-label"
                                                                                       for="email_receive1"></label>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-sm-1">
                                                                        <div class="form-group">
                                                                            <label>SMS</label>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="communication[]"
                                                                                       value="sms_receive"
                                                                                       class="custom-control-input"
                                                                                       id="sms_receive1">
                                                                                <label class="custom-control-label"
                                                                                       for="sms_receive1"></label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-1">
                                                                        <div class="form-group">
                                                                            <label>POST</label>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="communication[]"
                                                                                       value="post_receive"
                                                                                       class="custom-control-input"
                                                                                       id="post_receive1">
                                                                                <label class="custom-control-label"
                                                                                       for="post_receive1"></label>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </dd>


                                                        </dl>
                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-sm-12 text-center">
                                                        <button class="btn btn-danger  red save-session"><i
                                                                    class="icon-floppy-disk mr-1"></i> Save
                                                        </button>
                                                        <button class="btn btn-danger red go-to-payment" href="#!"><i
                                                                    class="icon-cash mr-1"></i> Go to Payment
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>

                                    @endforeach



                                    @else
                                    <div class="alert bg-danger text-white text-center" style="display: block">

                                        <span class="font-weight-semibold">No session found for this patient</span> .
                                    </div>
                                @endif

                        </div>

                </div>

            </div>
        </div>
    </div>
</div>


</div>


<div id="add-new-session" class="modal " style="width:70% !important">
    <div class="modal-content">
        <div class="row">

            <h4 class="left">Add New Session</h4>
            <div class="col s1 right-align no-padding right">
                <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
            </div>
        </div>
        <div class="row"></div>

    </div>

</div>


<div id="add-new-area" class="modal " style="width:500px !important; min-height: 150px !important;">
    <div class="modal-content">
        <div class="row">

            <h4 class="left">Add New Area</h4>
            <div class="col s1 right-align no-padding right">
                <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <input type="text" id="new_area"/>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center"><a href="#!" class="btn red white-text save-new-area">Save</a> <span
                        class="response"></span></div>
        </div>

    </div>

</div>

<div id="add-medical-history" class="modal " style="width:800px !important; min-height: 300px !important;">
    <div class="modal-content">
        <div class="row">

            <h4 class="left">Add New Medical History</h4>
            <div class="col s1 right-align no-padding right">
                <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
            </div>
        </div>

        <div class="row">
            <div class="col s12 editor">
                <form id="medical-history-form" action="/save/medical-history" method="POST"
                      enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="patient_id" value="{!! $patient->id !!}"/>
                    <input type="hidden" name="medical_id" id="medical_id" value=""/>
                    <div class="row" style="font-size: 12px !important;">
                        @php
                            $medi = isset($medical->illness)?json_decode($medical->illness):array();

                        @endphp

                        <div class="col s12">
                            <div class="row m-top-5">
                                <div class="col s3">High Blood Pressure</div>
                                <div class="col s3">
                                    <div class="switch" id="">

                                        <label>
                                            No
                                            <input type="checkbox" name="ilnessess[]"
                                                   @if(isset($medi) && !is_null($medi) && in_array('high_blood_pressure',$medi)) checked
                                                   @endif value="high_blood_pressure">
                                            <span class="lever"></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col s3">Gastric Problems</div>
                                <div class="col s3">
                                    <div class="switch" id="">

                                        <label>
                                            No
                                            <input type="checkbox" name="ilnessess[]"
                                                   @if(isset($medi) && !is_null($medi) && in_array('gastric_problems',$medi)) checked
                                                   @endif value="gastric_problems">
                                            <span class="lever"></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>

                            </div>


                            <div class="row m-top-5">
                                <div class="col s3">Asthma</div>
                                <div class="col s3">
                                    <div class="switch" id="">

                                        <label>
                                            No
                                            <input type="checkbox" name="ilnessess[]"
                                                   @if(isset($medi) && !is_null($medi) && in_array('asthma',$medi)) checked
                                                   @endif value="asthma">
                                            <span class="lever"></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col s3">Head/Neck Injuries</div>
                                <div class="col s3">
                                    <div class="switch" id="">

                                        <label>
                                            No
                                            <input type="checkbox" name="ilnessess[]"
                                                   @if(isset($medi) && !is_null($medi) && in_array('head_neck_injuries',$medi)) checked
                                                   @endif value="head_neck_injuries">
                                            <span class="lever"></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row m-top-5">
                                <div class="col s3">Diabetes</div>
                                <div class="col s3">
                                    <div class="switch" id="">

                                        <label>
                                            No
                                            <input type="checkbox" name="ilnessess[]"
                                                   @if(isset($medi) && !is_null($medi) && in_array('diabetes',$medi)) checked
                                                   @endif value="diabetes">
                                            <span class="lever"></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col s3">Heart Disease</div>
                                <div class="col s3">
                                    <div class="switch" id="">

                                        <label>
                                            No
                                            <input type="checkbox" name="ilnessess[]"
                                                   @if(isset($medi) && !is_null($medi) && in_array('heart_disease',$medi)) checked
                                                   @endif value="heart_disease">
                                            <span class="lever"></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-top-5">
                                <div class="col s3">Liver Problems</div>
                                <div class="col s3">
                                    <div class="switch" id="">

                                        <label>
                                            No
                                            <input type="checkbox" name="ilnessess[]"
                                                   @if(isset($medi) && !is_null($medi) && in_array('liver_problems',$medi)) checked
                                                   @endif value="liver_problems">
                                            <span class="lever"></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>

                                <div class="col s3">Epilepsy</div>
                                <div class="col s3">
                                    <div class="switch" id="">

                                        <label>
                                            No
                                            <input type="checkbox" name="ilnessess[]"
                                                   @if(isset($medi) && !is_null($medi) && in_array('eilepsy',$medi)) checked
                                                   @endif value="eilepsy">
                                            <span class="lever"></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-top-5">
                                <div class="col s3">Herpes</div>
                                <div class="col s3">
                                    <div class="switch" id="">
                                        <label>
                                            No
                                            <input type="checkbox" name="ilnessess[]"
                                                   @if(isset($medi) && !is_null($medi) && in_array('herpes',$medi)) checked
                                                   @endif value="herpes">
                                            <span class="lever"></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col s3">Respiratory</div>
                                <div class="col s3">
                                    <div class="switch" id="">

                                        <label>
                                            No
                                            <input type="checkbox" name="ilnessess[]"
                                                   @if(isset($medi) && !is_null($medi) && in_array('respiratory',$medi)) checked
                                                   @endif value="respiratory">
                                            <span class="lever"></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-top-5">
                                <div class="col s3">Allergic</div>
                                <div class="col s3">
                                    <div class="switch" id="">

                                        <label>
                                            No
                                            <input type="checkbox" name="ilnessess[]"
                                                   @if(isset($medi) && !is_null($medi) && in_array('allergie',$medi)) checked
                                                   @endif value="allergie">
                                            <span class="lever"></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 editor">
                            <textarea name="medical_history" id="medical_history"
                                      style="width: 100% !important;"></textarea>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center"><a href="#!" class="btn red save-medical-history">Save Medical History</a> <a
                        href="#!" class="modal-action red btn modal-close">Back to Treatment Card</a><br/><span
                        class="response"></span></div>
        </div>

    </div>

</div>
<div id="add-saved-items" class="modal " style="width:800px !important; min-height: 300px !important;">
    <div class="modal-content">
        <div class="row">

            <h4 class="left">Add New Items</h4>
            <div class="col s1 right-align no-padding right">
                <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
            </div>
        </div>

        <div class="row">
            <div class="col s12 editor">
                <form id="saved-items-form" action="/save/saved-items" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="patient_id" value="{!! $patient->id !!}"/>
                    <input type="hidden" name="item_id" id="item_id" value=""/>
                    <div class="row">
                        <div class="col s12">Upload Document:</div>
                        <div class="col s12">
                            <input type="file" name="saved_item_document"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">Notes:</div>
                        <div class="col s12 editor">
                            <textarea name="notes" id="notes" style="width: 100% !important;"></textarea>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center"><a href="#!" class="btn red save-saved-item">Save Item</a> <a href="#!"
                                                                                                      class="modal-action red btn modal-close">Back
                    to Treatment Card</a><br/><span class="response"></span></div>
        </div>

    </div>

</div>


<div id="show-medical-history" class="modal " style="width:50% !important">
    <div class="modal-content">
        <div class="row">

            <h4 class="left">Medical History</h4>
            <div class="col s1 right-align no-padding right">
                <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <h5 class="heading">Illness</h5>
            </div>

            <div class="col s12" id="illness">

            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <h5 class="heading">Medical History</h5>
            </div>

            <div class="col s12" id="response-medical-history">

            </div>
        </div>

    </div>

</div>
<div id="show-saved-items-" class="modal " style="width:700px !important">
    <div class="modal-content">
        <div class="row">

            <h4 class="left">Saved Item</h4>
            <div class="col s1 right-align no-padding right">
                <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
            </div>
        </div>
        <div class="row">
            <div class="col s12" id="show-saved-items-data"></div>
        </div>


    </div>

</div>
<style>
    .dropzone {
        padding: 15px;
    }

    .dropzone .dz-message {
        text-align: center;
        margin-bottom: 15px;
    }
</style>
<div id="add-digital-imaging-model" class="modal " style="width:70% !important">
    <div class="modal-content">
        <div class="row">

            <h4 class="left">Add Digital Imaging</h4>
            <div class="col s1 right-align no-padding right">
                <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">

                <div class="card-panel">
                    <table>
                        <tr>
                            <td>Title</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="image-title"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="/digital-image-upload"
                                      class="dropzone"
                                      id="dropzone1">

                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col s12 center"><a href="#!" class="btn red upload-images"
                                                                   id="upload-images">Upload Images</a> <a href="#!"
                                                                                                           class="modal-action red btn modal-close">Back
                                            to Treatment Card</a><br/><span class="response"></span></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="card green message success-message" style="display: none;">
                                            <div class="card-content white-text">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="card red message error-message" style="display: none;">
                                            <div class="card-content white-text">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>


    </div>

</div>




<script>
    var session_id = "";
    var patient_type = "{!! $patient->patient_type !!}";
    var patient_id = "{!! $patient->id !!}";
    var action_container = "";

    var autocollapse = function() {

        var tabs = $('#tabs');
        var tabsHeight = tabs.innerHeight();

        if (tabsHeight >= 50) {
            while(tabsHeight > 50) {
                //console.log("new"+tabsHeight);

                var children = tabs.children('li:not(:last-child)');
                var count = children.length;
                $(children[count-1]).prependTo('#collapsed');

                tabsHeight = tabs.innerHeight();
            }
            $('.dropdown-toggle').dropdown();
        }
        else {
            while(tabsHeight < 50 && (tabs.children('li').size()>0)) {

                var collapsed = $('#collapsed').children('li');
                var count = collapsed.size();
                $(collapsed[0]).insertBefore(tabs.children('li:last-child'));
                tabsHeight = tabs.innerHeight();
            }
            if (tabsHeight>50) { // double chk height again
                autocollapse();
            }
        }

    };
    $(function () {
        autocollapse(); // when document first loads

        $(".add-new-history").click(function(){
            $("#recent-history").hide();
            $("#add-new-history").show();
        });

        $(".cancel-history").click(function(){
            $("#recent-history").show();
            $("#add-new-history").hide();
        });


        $(".medical-history-card").focusout(function(){
           var _value = $(this).text();
            $.ajax({
                url: '/save/medical-history',
                type: 'POST',
                data: {
                    patient_id: "{!! $patient->id !!}",
                    '_token': "{!! csrf_token() !!}",
                    medical_conditions: medical_conditions
                },
                success: function (response) {
                    // console.log(response);
                    response = $.parseJSON(response);
                    // $(".response").addClass('green-text');
                    //  $(".response").html(response.message);
                    //  $(".response").show();


                }
            });
        });
        $(window).on('resize', autocollapse); // when window is resized
        $(".save-session").click(function(e){
            var _this = $(this);
            var _form = $(this).parents('form');

            _form.ajaxForm(function(response){
                response = $.parseJSON(response);
            }).submit();
            e.preventDefault();
        });

        $(".go-to-payment").click(function(e){
            e.preventDefault();
        });


        $('.file-uploader').pluploadQueue({
            runtimes: 'html5, html4, Flash, Silverlight',
            url: '/upload/file/saved/items',
            chunk_size: '3000Kb',
            unique_names: true,
            header: true,
            buttons : {browse:true,start:false,stop:false},
            filters: {
                max_file_size: '3000Kb',
                mime_types: [{
                    title: 'Image files',
                    extensions: 'jpg,gif,png'
                }]
            },
            views: {
                list: true,
                thumbs: true, // Show thumbs
                active: 'thumbs'
            },


        });

        $(".file-upload").click(function(){
            $("#upload-file").click();
        });

        $(".medical-history-card").focusin(function(){
            $(".history-btn").show()
        });

        $(".medical-history-card").focusout(function(){
            $(".history-btn").hide()
        });

        $("#more-allergy").select2().on('change',function(){
           var _value = $(this).val();
           var _text = $(this).find("option:selected").text();
            $(".text-danger.d-message").hide();
            $.ajax({
                url: '/save/drug/with/patient',
                type: 'POST',
                data: {patient_id: "{!! $patient->id !!}", '_token': "{!! csrf_token() !!}", drugs: _value},
                success: function (response) {

                    response = $.parseJSON(response);
                    // console.log(response);
                    if(response.type=="success"){


                        var str = "<tr>";
                        str+="<td>";
                        str+= response.created_at;
                        str+="</td>";

                        str+="<td>";
                        str+=_text;
                        str+="</td>";
                        str+='<td><a href="#!" class="delete-allergy text-danger" data-id="'+response.id+'"><i class="icon-trash"></i></a></td>';

                        str+="</tr>";

                        $(".drug-allergies").before(str);
                    }else{
                        $(".text-danger.d-message").html(response.message);
                        $(".text-danger.d-message").show();
                    }


                }
            });



        });

        $("body").on('click','.delete-allergy',function(){
            var id = $(this).attr('data-id');
            var _this = $(this);
            $.ajax({
                url :"/patient/drug/delete/"+id,
                success:function(){
                    _this.parents('tr').remove();
                }

            });


        });

        $(".more-allergy").click(function(){
                $(".drug-allergies").show()
        });

        $('.colorpicker-basic').spectrum({
            change: function(c) {
                $("i.icon-brush").css({color:c.toHexString()});
                $("i.icon-brush").attr('data-color',c.toHexString());
            }
        });

        $(".save-new-data").click(function(){
            $('span.text-danger').html("");
            var _this = $(this);
            var _parent =  _this.parents('.add-new-data')
            var _value = _parent.find('input[type=text]').val();
            var _place_holder = _parent.find('input[type=text]').attr('placeholder');
            if(_value==""){
                _parent.find('span.text-danger').html(_place_holder);
                return false;
            }
            if(action_container=="flags"){
                var _color =  $("i.icon-brush").attr('data-color');
                if(typeof(_color)=="undefined"){
                    _parent.find('span.text-danger').html("Choose Color");
                    return false
                }

                $.ajax({
                    url:"/save/new/flag",
                    type:"POST",
                    data:{value:_value,color:_color,'_token':"{!! csrf_token() !!}"},
                    success:function(response){
                        response = $.parseJSON(response);
                        var _newOption = ' <option value="'+response.id+'" data-color="'+_color+'">'+_value+'</option>';
                        $('.patient-flags').append(_newOption);
                        $('.patient-flags').multiselect('rebuild');
                        $("i.icon-brush").css({color:"#FFF"});
                    }
                });




            }

            if(action_container=="drug-allergies"){
                var newOption = new Option(_value, _value, true, true);
                // Append it to the select
                $('#more-allergy').append(newOption).trigger('change');
            }

            if(action_container=="medications"){
                var newOption = new Option(_value, _value, true, true);
                // Append it to the select
                $('#current-medications').append(newOption).trigger('change');
            }


            _parent.find('input[type=text]').val('');
        });

        $("a[data-toggle=collapse]").click(function(){
            $('.add-new-data').hide();
        });

        $(".list-icons-item").click(function () {
            var action = $(this).attr('data-action');
            var container = $(this).attr('data-container-for');

            if (action == "add") {
                var _this = $(this);
                _this.parents('.card-element').find('.add-new-data').show();
                switch (container) {
                    case "patient-flag":
                        action_container = "flags"
                     break;
                    case "drug-allergies":
                        action_container = "drug-allergies";
                    break;
                    case "medications":
                        action_container = "medications";
                    break;
                    case "saved-items":
                        action_container = "saved-items";
                    break;

                }
            }

        });

        $(".date").datepicker({dateFormat: 'dd.mm.yy'});

        $(".referral").select2({
            placeholder: "Search Referral"
        });

        $(".lab").select2({
            placeholder: "Search Lab"
        });

        $(".medication").select2({
            placeholder: "Search medications",

            minimumInputLength: 3,
            ajax: {
                url: function (params) {
                    return '/get/medications/by/name/' + params.term;
                },
                dataType: 'json',
                delay: 150,
                data: function (params) {
                    //   console.log(params);
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },

            },
        });
        $(".pre-medication").select2({
            placeholder: "Search medications",

            minimumInputLength: 3,
            ajax: {
                url: function (params) {
                    return '/get/medications/by/name/' + params.term;
                },
                dataType: 'json',
                delay: 150,
                data: function (params) {
                    //   console.log(params);
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },

            },
        });

        $(".consent").select2({
            placeholder: "Search consent form",
            minimumInputLength: 3,
            ajax: {
                url: function (params) {
                    return '/get/consent/by/name/' + params.term;
                },
                dataType: 'json',
                delay: 150,
                data: function (params) {
                    //   console.log(params);
                    var query = {
                        search: params.term,
                        patient_id : patient_id
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },

            },
        });

        $('.patient-flags').multiselect({
            buttonClass: 'btn btn-link',
            numberDisplayed: 8,
            onChange: function () {



                var selectedOptions = jQuery('.patient-flags option:selected');
                var _value = [];;

                var str = "";
                $.each(selectedOptions, function () {

                    str += '<li><i class="icon-flag7" style="color: ' + $(this).attr('data-color') + '"></i> </li>';
                    _value.push($(this).val());
                });

                $.ajax({
                    url:"/save/patient/flags",
                    data:{patient_id:patient_id,flags:_value,"_token":"{!! csrf_token() !!}"},
                    type:"POST",
                    success:function(response){

                    }
                });

                $("#selected-flags").html(str);
            }


        });


        $('.patient-teeth-area').multiselect({
            buttonClass: 'btn btn-link',
            numberDisplayed: 8,
            onChange: function () {
                var selectedOptions = jQuery('.patient-teeth-area option:selected');
                var str = "";
                $.each(selectedOptions, function () {

                    str += '<li><i class="icon-flag7" style="color: ' + $(this).attr('data-color') + '"></i> </li>';
                });


                $("#patient-teeth-area").html(str);
            }


        });

        $('.illness-history').multiselect({
            buttonClass: 'btn btn-link',
            numberDisplayed: 8,



        });


        $("#current-medications").select2({
            minimumInputLength: 3,
            ajax: {
                url: function (params) {
                    return '/get/medications/by/name/' + params.term;
                },
                dataType: 'json',
                delay: 150,
                data: function (params) {
                    //   console.log(params);
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },

            },
        }).on('change',function(){
            var id  = $(this).val();
            $.ajax({
                url:"/save/current-medication/with/treatment-card",
                type:"POST",
                data:{patient_id:patient_id,'_token':"{!! csrf_token() !!}",id:id},
                success:function(response){
                    console.log(response);
                }
            });
        });


        $('#products').select2({
            placeholder: "Enter Product ",
            allowClear: true,
            tags: true,
            minimumInputLength: 3,
            ajax: {
                url: function (params) {
                    return '/get/products/by-search/';
                },
                dataType: 'json',
                delay: 150,
                data: function (params) {
                    //   console.log(params);
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },

            },


        }).on('change', function () {
            //alert();
            var id = $(this).val();
            alert(id);


        });

        $('#tooth-area').select2({
            placeholder: "Enter Area ",
            allowClear: true,
            tags: true,
            minimumInputLength: 3,
            ajax: {
                url: function (params) {
                    return '/refferal/get_referral/' + params.term;
                },
                dataType: 'json',
                delay: 150,
                data: function (params) {
                    //   console.log(params);
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },

            },


        }).on('change', function () {
            //alert();
            var id = $(this).val();
            // alert(id);


        });
        var _description_array = [];

        $("#description-dropdown").on('change', function () {

            var table = $("#treatment-session-table");
            var description_section = table.find('tr:eq(1)').find("td:eq(2)");


            var _value = $(this).val();
            var element = "";
            var title = "";
            //alert($.inArray(_value,_description_array));
            if ($.inArray(_value, _description_array) < 0) {
                _description_array.push(_value);
                switch (_value) {
                    case "complaint":
                        element = "textarea";
                        title = "Complaint";
                        break;
                    case "treatment-done":
                        element = "textarea";
                        title = "Treatement-Done";
                        break;
                    case "post-treatment-advice":
                        element = "textarea";
                        title = "Post-Treatment-Advice";
                        break;
                    case "findings":
                        element = "textarea";
                        title = "Findings";
                        break;
                    case "advice":
                        element = "textarea";
                        title = "Advice";
                        break;
                    case "pre-meds":
                        element = "dropdown";
                        title = "Pre-Med";
                        break;
                    case "xrays":
                        element = "dropdown";
                        title = "Xrays";
                        break;
                    case "consent":
                        element = "dropdown";
                        title = "Consent";
                        break;
                    case "saved-items":
                        element = "dropdown";
                        title = "Saved-Items";
                        break;
                    case "recall":
                        element = "dropdown";
                        title = "Recall";
                        break;
                    case "referral":
                        element = "dropdown";
                        title = "Referral";
                        break;
                }
                if (element != "" && title != "") {
                    $.ajax({
                        url: "/get/form/element",
                        type: "POST",
                        data: {
                            _type: _value,
                            element: element,
                            title: title,
                            "_token": "{!! csrf_token() !!}",
                            patient_id: "{!! $patient->id !!}"
                        },
                        success: function (response) {
                            description_section.append(response);
                        }
                    });
                }

            }
        });

        $("body").on('click', ".save-description", function () {
            var _this = $(this);
            var data_title = $(this).attr('data-description');

            var data_text = "";


            switch (data_title.toLowerCase()) {
                case "complaint":
                case "findings":
                case "advice":
                case "treatment-done":
                case "post-treatment-advice":
                    data_text = $(this).parents('.description-table').find('textarea').val();
                    break;
                case "pre-meds":
                case "xrays":
                case 'recall':
                case 'saved-items':
                    element = "dropdown";
                    data_title = data_title.toLowerCase();
                    var text = _this.parents('.description-table').find('select').select2("data");
                    var d = [];
                    $.each(text, function (i, v) {
                        d.push(v.text);
                    });
                    data_text = d.join(", ");

                    break;
                case "consent":
                    element = "dropdown";
                    title = "Consent";
                    var text = _this.parents('.description-table').find('select').select2("data");
                    var d = [];
                    $.each(text, function (i, v) {
                        data_text = (v.text);
                    });

                    break;
                case "referral":
                    element = "dropdown";
                    title = "Referral";
                    var text = _this.parents('.description-table').find('select').select2("data");
                    var d = [];
                    $.each(text, function (i, v) {
                        data_text = (v.text);
                    });

                    break;
            }

            $.ajax({
                url: "/save/treatment/description",
                type: "POST",
                data: {
                    "_token": "{!! csrf_token() !!}",
                    title: data_title,
                    description: data_text
                },
                success: function (response) {

                    $(".description-table").before(response);
                    _this.parent().parent().parent().parent().remove();
                    $(".save-description").unbind();
                }
            });

        });

        $("body").on('click', ".cancel-description", function () {
            var removeItem = $(this).attr('data-description');
            //   console.log(_description_array);
            _description_array = jQuery.grep(_description_array, function (value) {
                return value != removeItem;
            });
            // console.log(_description_array);
            $(this).parent().parent().parent().parent().remove();
        });

        $("body").on('click', ".delete-saved-description", function () {
            var removeItem = $(this).attr('data-description');
            //   console.log(_description_array);
            _description_array = jQuery.grep(_description_array, function (value) {
                return value != removeItem;
            });
            // console.log(_description_array);
            $(this).parents('.description-box').remove();
        });

        $("body").on('click', ".edit-saved-description", function () {
            var _this = $(this);
            var table = $("#treatment-session-table");
            var description_section = table.find('tr:eq(1)').find("td:eq(2)");
            var title = $(this).parents('.description-box').find('.card-title').html();
            var description = $(this).parents('.description-box').find('.card-content p').html();

            switch (title) {
                case "complaint":
                    element = "textarea";
                    title = "Complaint";
                    break;
                case "treatment-done":
                    element = "textarea";
                    title = "Treatment-Done";
                    break;
                case "post-treatment-advice":
                    element = "textarea";
                    title = "Post-Treatment-Advice";
                    break;
                case "findings":
                    element = "textarea";
                    title = "Findings";
                    break;
                case "advice":
                    element = "textarea";
                    title = "Advice";
                    break;
                case "pre-meds":
                    element = "dropdown";
                    title = "Pre-Med";
                    break;
                case "xrays":
                    element = "dropdown";
                    title = "Xrays";
                    break;
                case "consent":
                    element = "dropdown";
                    title = "Consent";
                    break;
                case 'saved-items':
                    element = "dropdown";
                    title = "Saved-Items";
                    break;
                case "recall":
                    element = "dropdown";
                    title = "Recall";
                    break;
                case "referral":
                    element = "dropdown";
                    title = "Referral";
                    break;

            }
            if (element != "" && title != "") {
                $.ajax({
                    url: "/get/form/element",
                    type: "POST",
                    data: {
                        _type: title,
                        element: element,
                        description: description,
                        title: title,
                        "_token": "{!! csrf_token() !!}",
                        patient_id: patient_id
                    },
                    success: function (response) {
                        _this.parents('.description-box').remove();
                        description_section.append(response);
                    }
                });
            }


        });


        var obj = [];
       /* $("#patient-flags").select2({placeholder: "Choose Flag"}).on('change', function () {
            var color = $(this).find(':selected').attr('data-color');
            $(this).parents('.collapsible').find('.collapsible-header i').css('color', color);

            $.ajax({
                url: '/update/patient/type',
                type: 'POST',
                data: {patient_id: "{!! $patient->id !!}", type: $(this).val(), "_token": "{!! csrf_token() !!}"},
                success: function (response) {

                }

            });


            // header.html(val.join( ", " ) );
            //console.log(color);


            //                alert(val + color);
        });*/

      //  $('#patient-flags').val(patient_type).trigger('change');
        $('.patient-flags').trigger('change');

        $(".add-area").click(function () {
            var id = $(this).attr('data-session-id');
            session_id = id;
            var ths = $(this);
            $.ajax({
                url: "/new/area/" + id,
                success: function (response) {
                    ths.parents('.collapsible').find('.add-area-section').html(response);
                    $("#area-select" + id).select2({
                        placeholder: "Choose Area"
                    });
                }
            });

        });

        $(".add-description").click(function () {
            var id = $(this).attr('data-session-id');
            session_id = id;
            var ths = $(this);
            $.ajax({
                url: "/new/description/" + id,
                success: function (response) {
                    ths.parents('.collapsible').find('.add-description-section').html(response);

                }
            });

        });


        $(".save-new-area").click(function () {
            var value = $("#new_area").val();

            if (value == "") {
                $("#new_area").focus();
                return false;
            }

            $.ajax({
                url: "/save/area",
                type: "POST",
                data: {'_token': "{!! csrf_token() !!}", area: value},
                success: function (response) {
                    response = $.parseJSON(response);
                    if (response.type == 'success') {
                        var newOption = new Option(response.name, response.id, true, true);
                        // Append it to the select
                        $('#area-select' + session_id).append(newOption).trigger('change');

                        $(".response").addClass('green-text');
                        $(".response").html(response.message);
                        $(".response").show();

                        setTimeout(function () {
                            $("#add-new-area").modal('close');
                        }, 2000);

                    }
                }
            });

            //   var newOption = new Option(response.name, response.name, true, true);
            // Append it to the select
            //  $('#add-new-area').append(newOption).trigger('change');

        });

        /*$("#session-record .pagination a").click(function (e) {

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
         });*/

        $(".save-session").click(function () {
            if ($("#session-form").valid()) {

                $("#session-form").ajaxForm(function (response) {
                    var patient_id = "{!! $patient->id !!}";
                    response = $.parseJSON(response);
                    if (response.type == 'success') {
                        $(".message.success-message").html(response.message);
                        $(".message.success-message").show();
                        $('#session-record').html('<div class="progress"> <div class="indeterminate"></div></div>');
                        $.ajax({
                            url: '/get/sessions/' + patient_id,
                            success: function (response) {
                                $(".overlay .progress").hide();
                                $(".overlay").hide();
                                $('#session-record').html(response);
                            }
                        });

                        setTimeout(function () {
                            $(".message.success-message").hide();
                            $("#session-form").resetForm();
                        }, 2500);

                    } else {
                        $(".message.error-message").html(response.message);
                        $(".message.error-message").show();
                    }
                }).submit();
            }
        });


        $("#add-digital-imaging").click(function () {
            $("#add-digital-imaging-model").modal('open');
        });

        $("#get-digital-imaging-by-id").click(function () {

            $.ajax({
                url: '/get/digital-imaging/{!! $patient->id !!}',
                success: function (response) {
                    $("#show-digital-imaging").html(response);
                }
            });
        });


        var digital_image_drop_zone = Dropzone.options.dropzone1 = {

            // Prevents Dropzone from uploading dropped files immediately
            autoProcessQueue: false,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            maxFilesize: 10,
            uploadMultiple: true,
            parallelUploads: 10,

            init: function () {
                var submitButton = document.querySelector("#upload-images")
                dropzone1 = this; // closure

                submitButton.addEventListener("click", function (e) {
                    $(".message").hide();
                    var title = $("#image-title").val();


                    if (title != "")
                        dropzone1.processQueue(); // Tell Dropzone to process all queued files.
                    else {
                        $(".error-message").html('Title Field is required!');
                        $(".error-message").show();
                    }
                });

                this.on('success', function (file, response) {
                    response = $.parseJSON(response);

                    if (response.type == "success") {
                        $(".success-message").html(response.message);
                        $(".success-message").show();

                        setTimeout(function () {
                            $("#image-title").val('');
                            dropzone1.removeAllFiles(true);
                            $("#add-digital-imaging-model").modal('close');
                            $.ajax({
                                url: '/get/digital-imaging/{!! $patient->id !!}',
                                success: function (response) {
                                    $("#show-digital-imaging").html(response);
                                }
                            });
                            $(".message").hide();
                        }, 2000);
                    } else {
                        $(".error-message").html(response.message);
                        $(".error-message").show();
                    }


                });

                // You might want to show the submit button only when
                // files are dropped here:
                this.on("addedfile", function () {
                    // Show submit button here and/or inform user to click it.
                    //  alert('add');
                });

                this.on("removedfile", function (file) {
                    //  alert();
                });


            },
            sending: function (file, xhr, formData) {
                flag_file_media = true;
                formData.append('_token', '{!! csrf_token() !!}');
                formData.append('patient_id', "{!! $patient->id !!}");
                formData.append('title', $("#image-title").val());
            }
        };


        $(".save-allergy-with-patient").click(function () {
            var drugs = $("#drug-allergy").val();
            $(".response").removeClass('green-text');
            $(".response").removeClass('red-text');
            $(".response").hide();
            $.ajax({
                url: '/save/drug/with/patient',
                type: 'POST',
                data: {patient_id: "{!! $patient->id !!}", '_token': "{!! csrf_token() !!}", drugs: drugs},
                success: function (response) {
                    // console.log(response);
                    response = $.parseJSON(response);
                    $(".response").addClass('green-text');
                    $(".response").html(response.message);
                    $(".response").show();

                    setTimeout(function () {
                        $(".response").removeClass('green-text');
                        $(".response").removeClass('red-text');
                        $(".response").hide();
                    }, 2500);

                }
            });
        });

        //     var medical_history = new nicEditor({fullPanel : true}).panelInstance('medical_history',{hasPanel : true});
        //       var notes = new nicEditor({fullPanel : true}).panelInstance('notes',{hasPanel : true});

        $("#add-drug-item").click(function (e) {
            $("#drug_allergy").val('');
            $("#add-new-drug-allergies").modal('open');
            e.preventDefault();
            e.stopPropagation();

        });

        $(".save-drug-allergy").click(function () {
            var name = $("#drug_allergy").val();

            $.ajax({
                url: '/save/drug-allergye',
                type: 'POST',
                data: {name: name, '_token': '{!! csrf_token() !!}'},
                success: function (response) {
                    response = $.parseJSON(response);
                    if (response.type == 'success') {
                        var newOption = new Option(response.name, response.name, true, true);
                        // Append it to the select
                        $('#drug-allergy').append(newOption).trigger('change');

                        $(".response").addClass('green-text');
                        $(".response").html(response.message);
                        $(".response").show();

                        setTimeout(function () {
                            $("#add-new-drug-allergies").modal('close');
                        }, 2000);

                    }
                }
            });
        });


        $(".add-saved-items").click(function () {
            $(".response").removeClass('green-text');
            $(".response").removeClass('red-text');
            $(".response").hide();
            $("#saved-items-form").resetForm();
            $("#add-saved-items").modal('open');
        });

        $("#get-saved-items-by-id").click(function () {
            var patient_id = $(this).attr('data-patient-id');

            $.ajax({
                url: "/get/saved-items/patient/{!! $patient->id !!}",
                success: function (response) {
                    $("#saved-items-section").html(response);
                }
            });
        });


        $("#get-medical-history").click(function () {
            var patient_id = $(this).attr('data-patient-id');

            $.ajax({
                url: "/get/medical-history/patient/" + patient_id,
                success: function (response) {
                    $("#medical-history-section").html(response);
                }
            });
        });


        $(".add-medical-history").click(function () {
            // nicEditors.findEditor('medical_history').setContent('');
            $("#medical-history-form").resetForm();
            $("#add-medical-history").modal('open');
        });

        $(".save-medical-history").click(function () {
            $(".response").removeClass('green-text');
            $(".response").removeClass('red-text');
            $(".response").hide();
            //    var text = nicEditors.findEditor('medical_history').getContent();
            // $("#medical_history").val(text);
            $("#medical-history-form").ajaxForm(function (response) {
                response = $.parseJSON(response);
                if (response.type == "success") {
                    $(".response").addClass('green-text');
                    $(".response").html(response.message);
                    $(".response").show();

                    $.ajax({
                        url: "/get/medical-history/patient/{!! $patient->id !!}",
                        success: function (response) {
                            $("#medical-history-section").html(response);
                        }
                    });


                    setTimeout(function () {
                        $(".response").hide();
                        $("#add-medical-history").modal('close');
                    }, 2000);
                } else {
                    $(".response").addClass('red-text');
                    $(".response").html(response.message);
                    $(".response").show();
                }
            }).submit();
        });

        $(".save-saved-item").click(function () {
            $(".response").removeClass('green-text');
            $(".response").removeClass('red-text');
            $(".response").hide();
            //   var text = nicEditors.findEditor('notes').getContent();
            //   $("#notes").val(text);
            $("#saved-items-form").ajaxForm(function (response) {
                response = $.parseJSON(response);
                if (response.type == "success") {
                    $(".response").addClass('green-text');
                    $(".response").html(response.message);
                    $(".response").show();

                    $.ajax({
                        url: "/get/saved-items/patient/{!! $patient->id !!}",
                        success: function (response) {
                            $("#saved-items-section").html(response);
                        }
                    });


                    setTimeout(function () {
                        $(".response").hide();
                        $("#add-saved-items").modal('close');
                    }, 2000);
                } else {
                    $(".response").addClass('red-text');
                    $(".response").html(response.message);
                    $(".response").show();
                }
            }).submit();
        });


        // $("#medical_history").summernote();


        $("#date_of_birth").datepicker({
            dateFormat: 'dd.mm.yy',
            changeMonth: true,
            changeYear: true,
            yearRange: '-100:+0',
            maxDate: '-2Y'
        });


        /* $( "#session_date" ).datepicker({ dateFormat: 'dd.mm.yy',
         changeMonth: true,
         changeYear: true,
         yearRange: '0:+100'
         });*/

        $("#expiry_date").datepicker({
            dateFormat: 'dd.mm.yy',
            changeMonth: true,
            changeYear: true,
            yearRange: '0:+100'
        });
        $(".update").click(function () {
            var ths = $(this);
            $(".response").removeClass('green-text');
            $(".response").removeClass('red-text');


            var form = $(this).parents('.collapsible').find('.my-box  form');
            var current_address = "";
            var previous_address = "";

            if (form.attr('id') == "patient-contact-form") {
                current_address = $('#current_address').val();
                previous_address = $('#previous_address').val();
                $("#current_address").val(current_address);
                $("#previous_address").val(previous_address);
            }


            form.ajaxForm(function (response) {
                response = $.parseJSON(response);

                if (response.type == "success") {

                    $(".response").addClass('green-text');
                    $(".response").html(response.message);
                    $(".response").show();
                    if (form.attr('id') == "patient-update-form") {
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(0)').find("td:eq(1)").html($("#patient_name").val());
                        ;
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(1)').find("td:eq(1)").html($("#date_of_birth").val());
                        ;
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(2)').find("td:eq(1)").html($("#card_number").val());
                        ;
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(3)').find("td:eq(1)").html($("#family").val());
                        ;
                    }

                    if (form.attr('id') == "patient-contact-form") {
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(0)').find("td:eq(1)").html($("#patient_phone").val());
                        ;
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(1)').find("td:eq(1)").html($("#patient_email").val());
                        ;
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(2)').find("td:eq(1)").html($("#current_address").val());
                        ;
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(3)').find("td:eq(1)").html($("#previous_address").val());
                        ;
                    }

                    if (form.attr('id') == "patient-update-refferal") {
                        var data1 = $('select[name=referral_id]').select2('data');
                        var data2 = $('#insurance_by').select2('data');
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(0)').find("td:eq(1)").html(data1[0].text);
                        ;
                        if (data1[0].id) {
                            $("#referral_id").val(data1[0].id);
                        }

                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(1)').find("td:eq(1)").html($("#insurance_by").val() + "-" + $("#insurance_number").val());
                        ;
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(2)').find("td:eq(1)").html($("#expiry_date").val());
                        ;

                    }

                    if (form.attr('id') == "patient-update-medication") {
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(0)').find("td:eq(1)").html($("#medication").val());
                        ;
                        ths.parents('.collapsible').find('.my-box').first().find('table tr:eq(1)').find("td:eq(1)").html($("#allegric").val());
                        ;
                    }


                    setTimeout(function () {
                        $(".response").hide();
                        ths.parents('.collapsible').find('.my-box').last().removeClass('active');
                        ths.parents('.collapsible').find('.my-box').first().addClass('active');
                    }, 2000);

                }

            }).submit();
        });

        $(".cancel").click(function () {
            $(this).parents('.collapsible').find('.my-box').last().removeClass('active');
            $(this).parents('.collapsible').find('.my-box').first().addClass('active');
        });

        $(".main-row").click(function () {
            $(".colspan-row").removeClass('active');
            var id = $(this).attr('id');
            //  alert(id);
            $("." + id).addClass('active');
        });

        $("#drug-allergy").select2({}).on('change', function () {
            var val = $(this).val();
            //$("#span-drug-allergy").html(val.join( ", " ) );
            var drugs = val;//$("#drug-allergy").val();
            // $(".response").removeClass('green-text');
            // $(".response").removeClass('red-text');
            //  $(".response").hide();
            $.ajax({
                url: '/save/drug/with/patient',
                type: 'POST',
                data: {patient_id: "{!! $patient->id !!}", '_token': "{!! csrf_token() !!}", drugs: drugs},
                success: function (response) {
                    // console.log(response);
                    response = $.parseJSON(response);
                    // $(".response").addClass('green-text');
                    //  $(".response").html(response.message);
                    //  $(".response").show();


                }
            });
        });


        $("#insurance_by").select2();


        $("#patient-medical-conditions").select2().on('change', function () {
            var val = $(this).val();
            $("#medical-conditions-patient").html(val.join(", "));
            var medical_conditions = $("#patient-medical-conditions").val();
            // $(".response").removeClass('green-text');
            // $(".response").removeClass('red-text');
            //  $(".response").hide();
            $.ajax({
                url: '/save/medical-history',
                type: 'POST',
                data: {
                    patient_id: "{!! $patient->id !!}",
                    '_token': "{!! csrf_token() !!}",
                    medical_conditions: medical_conditions
                },
                success: function (response) {
                    // console.log(response);
                    response = $.parseJSON(response);
                    // $(".response").addClass('green-text');
                    //  $(".response").html(response.message);
                    //  $(".response").show();


                }
            });
        });
        ;

        $(".edit-btn").click(function () {

            $(this).parents('.collapsible').find('.my-box').first().removeClass('active');
            $(this).parents('.collapsible').find('.my-box').last().addClass('active');


        });


        $("input[name=patient_flag]").on('change', function () {
            var val = $(this).val();
            var type = "";
            var id = $(this).attr('id');

            if (id == "red-color") {
                $(this).parents('.collapsible').find(".collapsible-header").html('<i class="material-icons red-text">flag</i>' + val);
                type = "drug_allergy"
            }

            if (id == "yellow-color") {
                $(this).parents('.collapsible').find(".collapsible-header").html('<i class="material-icons yellow-text">flag</i>' + val);
                type = "vip"
            }

            if (id == "black-color") {
                $(this).parents('.collapsible').find(".collapsible-header").html('<i class="material-icons black-text">flag</i>' + val);
                type = "difficult";
            }

            $.ajax({
                url: '/update/patient/type',
                type: 'POST',
                data: {patient_id: "{!! $patient->id !!}", type: type, "_token": "{!! csrf_token() !!}"},
                success: function (response) {

                }

            });


        });


        $('select[name=referral_id]').select2({
            placeholder: "Enter Referral Name ",
            allowClear: true,
            tags: true,
            minimumInputLength: 3,
            ajax: {
                url: function (params) {
                    return '/refferal/get_referral/' + params.term;
                },
                dataType: 'json',
                delay: 150,
                data: function (params) {
                    //   console.log(params);
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },

            },


        }).on('change', function () {
            //alert();
            var id = $(this).val();
            if (id > 0) {
                $("#referral_id").val(id);
                $("#referral_code").val($(this).select2('data')[0].unique_id);
                $("#referral_code").focusin();
            }


        });

        $("#consent").select2({
            placeholder: "Choose Consent  ",

        });

        $("#recall").datepicker({dateFormat: 'dd.mm.yy', minDate: 'Now'});


        $(".show-control").click(function () {
            $(this).next(".control").toggle();
        });

        // $('.collapsible').collapsible();
        //   const medical_history = new PerfectScrollbar('#medical-history');
        // const treat_ment_card = new PerfectScrollbar('#treatment-card-info');

    })


</script>





