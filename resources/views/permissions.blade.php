@extends('layout.app')
@section('page-title') Permissions @endsection
@section('css')

@endsection

   {{--
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{!! $child->permission_title !!}</td>
                        <td>{!! $child->permission_description !!}</td>
                        <td></td>
                    </tr>
              --}}

}

@section('content')

    <div class="content">@if(isset($staff) && $staff->deleted_at=="")
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Permissions</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    @if(isset($permissions))
                        @foreach($permissions as $permission)
                    <div class="col-md-4">
                        <div class="mb-3 permissions">
                            <h6 class="font-weight-semibold mt-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input permission parent" @if(in_array($permission->id, $user_permissions)) checked @endif id="permission{!! $permission->id !!}"   value="{!! $permission->id !!}" >
                                    <label class="custom-control-label" for="permission{!! $permission->id !!}"> {!! $permission->permission_title !!} <span class="ml-1">({!! $permission->children->count() !!})</span></label>
                                </div>
                               </h6>
                            <div class="dropdown-divider mb-2"></div>
                            @if($permission->children->count() > 0)
                                @foreach($permission->children as $child)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" @if(in_array($child->id, $user_permissions)) checked @endif class="custom-control-input permission child" id="permission{!! $child->id !!}"   value="{!! $child->id !!}" >
                                        <label class="custom-control-label" for="permission{!! $child->id !!}">{!! $child->permission_title !!}</label>
                                    </div>

                                @endforeach
                            @endif

                        </div>
                    </div>

                        @endforeach



                </div>
            </div>
            <div class="card-footer">
                <div class="row">

                    <div class="col-sm-3">
                        <button class="btn btn-danger save-permissions" data-user-id="{!! $id !!}"><i class="icon-floppy-disk"></i> Save Permissions</button>
                    </div>
                    <div class="col-sm-9">
                        <div class="alert bg-success text-default permission-success"></div>
                    </div>
                </div>

            </div>
        </div>@endif
        @else
            <div class="card">
                <div class="card-header header-elements-inline">

                </div>

                <div class="card-body">
                    <ul class="media-list">


                        <li class="media">
                            <div class="mr-3">
                                <a href="#" class="btn bg-transparent border-danger text-danger rounded-round border-2 btn-icon"><i class="icon-cross2"></i></a>
                            </div>

                            <div class="media-body mt-2">
                                Selected user either deleted or not found!


                            </div>


                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </div>


@endsection


@section('js')
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}

    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}

    <script>
        $(function () {
            $(".save-permissions").click(function(){
                var user_id = $(this).attr('data-user-id');
                var permissions = $('.permission:checkbox:checked').map(function() {
                    return this.value;
                }).get();

                if(permissions.length > 0){
                    $.ajax({
                        url:"/save/user/permissions",
                        type:"POST",
                        data:{
                            user_id:user_id,
                            permissions:permissions,
                            '_token':"{!! csrf_token() !!}"
                        },
                        success:function(response){
                            $(".permission-success").html('Permissions are assigned with selected user.');
                            $(".permission-success").show();

                            setTimeout(function(){
                                $(".permission-success").fadeOut();

                            },2000);
                        }
                    });
                }
            });

            $(".child").on('change',function(){



                var selected_permissions = $(this).parents('.permissions').find('.permission.child:checkbox:checked').map(function() {
                    return this.value;
                }).get();
               if(selected_permissions.length > 0)
                   $(this).parents('.permissions').find('.parent').prop('checked','checked');
               else
                   $(this).parents('.permissions').find('.parent').prop('checked',false);
            });
        })
    </script>
@endsection



