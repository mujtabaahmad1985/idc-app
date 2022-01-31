@extends('layout.app')
@section('page-title') Messages @endsection
@section('css')
    {!! Html::style(url('/').'/bootstrap/js/plugins/editors/summernote/summernote.css') !!}
@endsection

@section('content')
    <style>
        .table .letter-icon-title, .table .table-inbox-subject{
            color: #000 !important;
        }
        .table-inbox-time {
            text-align: right;
            width: 9rem;
        }
    </style>

    <!-- Content area -->





        <div class="content">

            <!-- Inner container -->
            <div class="d-md-flex align-items-md-start">

@include('messages.message-sidebar')


                <!-- Right content -->
                <div class="flex-fill overflow-auto" id="message-section">






                </div>
                <!-- /right content -->

            </div>
            <!-- /inner container -->

        </div>


    <!-- /content area -->
@endsection



@section('js')

<script>
    $(function(){
        var hashfull = document.location.hash;

        var message_type = hashfull.split('#')[1];

        $(".nav-link").removeClass('active');
        $("a[data-type="+message_type+"]").addClass('active');


        $.ajax({
            url:"/load/messages",
            type:"POST",
            data:{
                '_token':"{!! csrf_token() !!}",
                message_type:message_type
            },
            success:function(response){

                $("#message-section").html(response);
            }
        });

        $("body").on('click','.read-message',function(){
            var message_id = $(this).attr('data-message-id');
            window.history.pushState('messages', message_type.toUpperCase(), '/messages#read?id='+message_id);

            $.ajax({
                url:"/message/read/"+message_id,
                success:function(response){

                    $("#message-section").html(response);
                }
            });

        });

        $("body").on('click','.cancel-message',function(){
            window.history.pushState('messages', message_type.toUpperCase(), '/messages#inbox');
            //alert(message_type);
            $(".nav-link").removeClass('active');
            $("a[data-type="+message_type+"]").addClass('active');
            $.ajax({
                url:"/load/messages",
                type:"POST",
                data:{
                    '_token':"{!! csrf_token() !!}",
                    message_type:'inbox'
                },
                success:function(response){

                    $("#message-section").html(response);
                }
            });
        });

        $("body").on('click','.message-folders',function(){
         //   var hashfull = document.location.hash;

           var message_type = $(this).attr('data-type');
           var message_id = $(this).attr('data-message-id');
           message_id = message_id?message_id:0;
             window.history.pushState('messages', message_type.toUpperCase(), '/messages#'+message_type);
            //alert(message_type);
            $(".nav-link").removeClass('active');
            $("a[data-type="+message_type+"]").addClass('active');
            $.ajax({
                url:"/load/messages",
                type:"POST",
                data:{
                    '_token':"{!! csrf_token() !!}",
                    message_type:message_type,
                    message_id:message_id
                },
                success:function(response){

                    $("#message-section").html(response);
                }
            });
        });

       // $(".message-folders").trigger('click');
    })
</script>
@endsection