<style>
    #get-permissions h2{ font-size: 14px}
    #get-permissions label{
        font-size:12px;}
    #get-permissions h2 label{
        font-size:14px;}
</style>
@if(isset($permissions))
    @foreach($permissions as $permission)
        <div class="parents">
        <h2>
            <p>
                <input type="checkbox" class="filled-in permission parent" name="permission[]" value="{!! $permission->id !!}"
                       id="permission{!! $permission->id !!}" data-id="{!! $permission->id !!}" @if(in_array($permission->id,$allow_permissions)) checked="checked" @endif/>
                <label class="red-text" for="permission{!! $permission->id !!}">{!! $permission->permission_title !!}</label>
            </p>
        </h2>
        @if($permission->children->count() > 0)
            <div class="row">
                @foreach($permission->children as $child)
                   <div class="col s4">
                       <p >
                           <input type="checkbox" class="permission child" name="permission[]" @if(in_array($child->id,$allow_permissions)) checked="checked" @endif value="{!! $child->id !!}"
                                  id="permission{!! $child->id !!}" data-id="{!! $child->id !!}"/>
                           <label for="permission{!! $child->id !!}">{!! $child->permission_title !!}</label>
                       </p>
                   </div>
                @endforeach
         @endif
            </div>
        </div>
    @endforeach
@endif

<script>
    var user_id = "{!! $id !!}";
    const permissions_scroll = new PerfectScrollbar('#get-permissions');
    $(function(){
        $('.tooltipped').tooltip();
        $(".permission").on('change', function(){





            var permission_id = $(this).val();
            if($(this).is(":checked")){
                $.ajax({
                    url:"/assign/permission/"+permission_id+"/"+user_id+"/save",
                    success:function(){}
                });

                if($(this).hasClass('child')){
                    $(this).parents('.parents').find('.parent').attr('checked','checked');
                    $(this).parents('.parents').find('.parent').trigger('change');
                }

            }else{
                $.ajax({
                    url:"/assign/permission/"+permission_id+"/"+user_id+"/delete",
                    success:function(){}
                });
            }


        });
    })
</script>