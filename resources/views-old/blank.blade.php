@extends('layout.app')
@section('page-title') Blank Page @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/material/css/file-explore.css') !!}
@endsection

@section('content')

    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">




        </div>



        <!--end container-->


    </section>

@endsection


@section('js')




    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection