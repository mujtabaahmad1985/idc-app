@extends('layout.app')
@section('page-title') Tooth Areas @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/material/css/file-explore.css') !!}
@endsection

<style>
    #new-field{ height: 30px}
    .list-table td, .list-table th{    padding: 3px !important;
        font-size: 14px;}
    .list-table thead{ border: none !important;}
    #drug-allergies-section .pagination{ text-align: center}
   #drug-allergies-section .pagination li a {
        color: #444;
        display: inline-block;
        font-size: 12px;
        padding: 0px 7px;
        line-height: 20px;
    }
   #drug-allergies-section .pagination li {
        display: inline-block;
        border-radius: 2px;
        text-align: center;
        /* vertical-align: top; */
       padding: 2px 5px;
        height: 22px;
    }
    #drug-allergies-section .page-item.active{ color: #FFF}

</style>
@section('content')

    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">


            <div class="row">
                 <div class="col s12 m10 l7">
                    <div class="card-panel">
                        <table class="list-table">
                            <thead>

                            <tr>
                                <td colspan="2">
                                    <div class="row">
                                        <div class="col s12"> <h4 class="header">Anatomical location</h4></div>

                                        <div class="col s8 m8 l10" style="position: relative"> <input type="text" style="text-transform: none;" id="new-field" name="name"
                                                                                                      placeholder="Enter New Area..">
                                        </div>
                                        <div class="col s4 m4 l2">
                                            <a href="#!" id="save-new-area" class="btn red white-text save">Save</a>
                                        </div>


                                    </div>
                                </td>

                            </tr>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    <div id="response-section">

                    </div>
                    </div>
                </div>

            </div>
        </div>


        <!--end container-->


    </section>

@endsection


@section('js')
    <script>
        $(function(){

            $.ajax({
                url:'/get/tooth-areas',
                success:function(response){
                    $("#response-section").html(response);
                }
            });

            $("body").on('click','.edit',function(){
                $(this).parents('tr').find('span').hide();
                $(this).parents('tr').find('input').show();
                $(this).parents('tr').find('.edit-delete-buttons').hide();
                $(this).parents('tr').find('.save-cancel-buttons').show();
            });


            $("body").on('click','.cancle',function(){
                $(this).parents('tr').find('span').show();
                $(this).parents('tr').find('input').hide();
                $(this).parents('tr').find('.edit-delete-buttons').show();
                $(this).parents('tr').find('.save-cancel-buttons').hide();
            });

            $(".save").click(function(){
                var _value = $(this).parents('tr').find('input').val();
                $(this).parents('tr').find('input').val('');
                if(_value.trim()==""){
                    $(this).parents('tr').find('input').focus();
                    return;
                }

                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();

                $.ajax({
                    url:'/save/tooth-areas',
                    type:'Post',
                    data:{"_token":"{!! csrf_token() !!}",value:_value},
                    success:function(response){
                        $(".overlay .progress").hide();
                        $(".overlay").hide();

                        $.ajax({
                            url:'/get/tooth-areas',
                            success:function(response){
                                $("#response-section").html(response);
                            }
                        });

                    }
                });

            });

            $("body").on('click','.delete',function(){
                var _id = $(this).parents('tr').find('input').attr('data-id');

                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();

                $.ajax({
                    url:'/delete/tooth-areas',
                    type:'Post',
                    data:{"_token":"{!! csrf_token() !!}",id:_id},
                    success:function(response){
                        $(".overlay .progress").hide();
                        $(".overlay").hide();

                        $.ajax({
                            url:'/get/tooth-areas',
                            success:function(response){
                                $("#response-section").html(response);
                            }
                        });

                    }
                });

            });

            $("body").on('click','.update',function(){
                var _value = $(this).parents('tr').find('input').val();
                var _this = $(this);
                var _id = $(this).parents('tr').find('input').attr('data-id');

                if(_value.trim()==""){
                    $(this).parents('tr').find('input').focus();
                    return;
                }

                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();

                $.ajax({
                    url:'/update/tooth-areas',
                    type:'Post',
                    data:{id:_id,"_token":"{!! csrf_token() !!}",value:_value},
                    success:function(response){
                        $(".overlay .progress").hide();
                        $(".overlay").hide();

                        _this.parents('tr').find('span').html(_value);
                        _this.parents('tr').find('span').show();
                        _this.parents('tr').find('input').hide();
                        _this.parents('tr').find('.edit-delete-buttons').show();
                        _this.parents('tr').find('.save-cancel-buttons').hide();

                    }
                });

            });


            $("body").on('click','nav[role=navigation]  a',function(e){
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
                            $('#response-section').html(response);
                        }
                    });
                }

                e.stopPropagation();
                e.preventDefault();
            });
        })
    </script>




    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection