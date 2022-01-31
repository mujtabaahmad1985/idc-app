@extends('layout.app')
@section('page-title') Calendar @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/prism/prism.css') !!}
    {!! Html::style('public/material/js/plugins/chartist-js/chartist.min.css') !!}
    {{--  {!! Html::style('public/material/css/timeline.css') !!}--}}
    {!! Html::style('public/material/js/plugins/fullcalendar/css/fullcalendar.min.css') !!}
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/js/plugins/jsgrid/css/jsgrid.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/material/plugins/context-menu/dist/jquery.contextMenu.css') !!}
    {!! Html::style('public/material/css/jquery.timepicker.min.css') !!}
    {!! Html::style('public/material/css/defaultTheme.css') !!}
@endsection

@section('content')
    <section id="content">
    </section>
    <!-- END CONTENT -->
@endsection



@section('js')
    {!! Html::script('public/material/js/materialize_new.js') !!}
    {!! Html::script('public/plugins/clockface/js/clockface.js') !!}
    {!! Html::script('public/plugins/jquery.slimscroll/js/jquery.slimscroll.min.js') !!}
    {!! Html::script('public/material/js/plugins/fullcalendar/lib/jquery-ui.custom.min.js') !!}
@endsection