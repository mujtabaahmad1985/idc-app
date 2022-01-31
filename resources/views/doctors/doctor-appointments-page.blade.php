@extends('layout.app')
@section('page-title') Dr. {!! $doctor->fname.' '.$doctor->lname !!}'s Appointments @endsection
@section('css')

@endsection


@section('content')

    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Dr. {!! $doctor->fname.' '.$doctor->lname !!}</span> - Appointments</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-calculator text-primary"></i> <span>Appointments</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/doctors" class="breadcrumb-item">Doctors</a>
                    <span class="breadcrumb-item active">Dr. {!! $doctor->fname.' '.$doctor->lname !!}'s Appointments</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>

    <div class="content">
        <div class="card">


            <div class="card-body">

            </div>
        </div>
    </div>


@endsection


@section('js')

@endsection