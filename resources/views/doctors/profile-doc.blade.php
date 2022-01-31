@extends('layout.app')
@section('page-title') Profile @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/css/croppie.css') !!}
@endsection

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Inner container -->
        <div class=" container">

            <div class="row">
                <div class="col-12">
                    <div class="card border-0 rounded shadow">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-5 position-relative">
                                <img src="{!! \Illuminate\Support\Facades\Storage::disk('images')->url($doctor->profile_picture) !!}" class="img-fluid dr-profile-img" alt="">
                            </div>

                            <div class="col-xl-8 col-lg-8 col-md-7">
                                <div class="p-lg-5 p-4">
                                    <small class="text-muted">{!! date('jS F - h:ia') !!}</small>

                                    <h4 class="my-3">{!! \App\Helpers\CommonMethods::timingMessages() !!} ! <br> <span class="text-primary h2">Dr. {!! $doctor->fname.' '.$doctor->lname !!}</span></h4>
                                    <p class="para-desc text-muted">{!! $doctor->about_me !!}</p>
                                    @if(isset($doctor->doctor_recent_pending_appointments))
                                        @if($doctor->doctor_recent_pending_appointments->count() > 0)
                                    <h6 class="mb-0">You have <span class="text-primary">{!! $doctor->doctor_recent_pending_appointments->count() !!} appointments</span> remaining !</h6>
                                       @else
                                            <h6 class="mb-0">You have no pending appointment!</h6>
                                        @endif
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div>
            <!-- /right content -->

            <div class="row">
                <div class="col-12 mt-4 pt-2">
                    <div class="card border-0 shadow rounded p-4">

                        <ul class="nav nav-tabs nav-tabs-highlight mb-0">
                            <li class="nav-item"><a href="#bordered-tab1" class="nav-link active" data-toggle="tab">Active</a></li>
                            <li class="nav-item"><a href="#bordered-tab2" class="nav-link" data-toggle="tab">Inactive</a></li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#bordered-tab3" class="dropdown-item" data-toggle="tab">Dropdown tab</a>
                                    <a href="#bordered-tab4" class="dropdown-item" data-toggle="tab">Another tab</a>
                                </div>
                            </li>
                        </ul>


                        <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded shadow overflow-hidden bg-light" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link rounded-0 active" id="overview-tab" data-bs-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="true">
                                    <div class="text-center pt-1 pb-1">
                                        <h4 class="title fw-normal mb-0">Overview</h4>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item">
                                <a class="nav-link rounded-0" id="experience-tab" data-bs-toggle="pill" href="#pills-experience" role="tab" aria-controls="pills-experience" aria-selected="false">
                                    <div class="text-center pt-1 pb-1">
                                        <h4 class="title fw-normal mb-0">Experience</h4>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item">
                                <a class="nav-link rounded-0" id="review-tab" data-bs-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">
                                    <div class="text-center pt-1 pb-1">
                                        <h4 class="title fw-normal mb-0">Reviews</h4>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item">
                                <a class="nav-link rounded-0" id="location-tab" data-bs-toggle="pill" href="#pills-location" role="tab" aria-controls="pills-location" aria-selected="false">
                                    <div class="text-center pt-1 pb-1">
                                        <h4 class="title fw-normal mb-0">Location</h4>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item">
                                <a class="nav-link rounded-0" id="timetable-tab" data-bs-toggle="pill" href="#pills-timetable" role="tab" aria-controls="pills-timetable" aria-selected="false">
                                    <div class="text-center pt-1 pb-1">
                                        <h4 class="title fw-normal mb-0">Time Table</h4>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                        </ul><!--end nav pills-->

                        <div class="tab-content mt-2" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-overview" role="tabpanel" aria-labelledby="overview-tab">
                                <h5 class="mb-1">Dr. Christopher Burrell</h5>
                                <a href="#" class="text-primary">Gynecologist</a>, &nbsp;
                                <a href="#" class="text-primary">Ph.D</a>
                                <p class="text-muted mt-4">A gynecologist is a surgeon who specializes in the female reproductive system, which includes the cervix, fallopian tubes, ovaries, uterus, vagina and vulva. Menstrual problems, contraception, sexuality, menopause and infertility issues are diagnosed and treated by a gynecologist; most gynecologists also provide prenatal care, and some provide primary care.</p>

                                <h6>Specialties: </h6>

                                <ul class="list-unstyled mt-4">
                                    <li class="mt-1"><i class="uil uil-arrow-right text-primary"></i> Women's health services</li>
                                    <li class="mt-1"><i class="uil uil-arrow-right text-primary"></i> Pregnancy care</li>
                                    <li class="mt-1"><i class="uil uil-arrow-right text-primary"></i> Surgical procedures</li>
                                    <li class="mt-1"><i class="uil uil-arrow-right text-primary"></i> Specialty care</li>
                                    <li class="mt-1"><i class="uil uil-arrow-right text-primary"></i> Conclusion</li>
                                </ul>

                                <h6>My Team: </h6>

                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6 mt-4 pt-2">
                                        <div class="card team border-0 rounded shadow overflow-hidden">
                                            <div class="team-person position-relative overflow-hidden">
                                                <img src="../assets/images/doctors/05.jpg" class="img-fluid" alt="">
                                                <ul class="list-unstyled team-like">
                                                    <li><a href="#" class="btn btn-icon btn-pills btn-soft-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart icons"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <a href="#" class="title text-dark h5 d-block mb-0">Jessica McFarlane</a>
                                                <small class="text-muted speciality">M.B.B.S, Dentist</small>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    </ul>
                                                    <p class="text-muted mb-0">5 Star</p>
                                                </div>
                                                <ul class="list-unstyled mt-2 mb-0">
                                                    <li class="d-flex">
                                                        <i class="ri-map-pin-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">63, PG Shustoke, UK</small>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <i class="ri-time-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">Mon: 2:00PM - 6:00PM</small>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <i class="ri-money-dollar-circle-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">$ 75 USD / Visit</small>
                                                    </li>
                                                </ul>
                                                <ul class="list-unstyled mt-2 mb-0">
                                                    <li class="list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook icons"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin icons"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github icons"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter icons"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-xl-3 col-lg-3 col-md-6 mt-4 pt-2">
                                        <div class="card team border-0 rounded shadow overflow-hidden">
                                            <div class="team-person position-relative overflow-hidden">
                                                <img src="../assets/images/doctors/06.jpg" class="img-fluid" alt="">
                                                <ul class="list-unstyled team-like">
                                                    <li><a href="#" class="btn btn-icon btn-pills btn-soft-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart icons"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <a href="#" class="title text-dark h5 d-block mb-0">Elsie Sherman</a>
                                                <small class="text-muted speciality">M.B.B.S, Gastrologist</small>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    </ul>
                                                    <p class="text-muted mb-0">5 Star</p>
                                                </div>
                                                <ul class="list-unstyled mt-2 mb-0">
                                                    <li class="d-flex">
                                                        <i class="ri-map-pin-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">63, PG Shustoke, UK</small>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <i class="ri-time-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">Mon: 2:00PM - 6:00PM</small>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <i class="ri-money-dollar-circle-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">$ 75 USD / Visit</small>
                                                    </li>
                                                </ul>
                                                <ul class="list-unstyled mt-2 mb-0">
                                                    <li class="list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook icons"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin icons"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github icons"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter icons"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-xl-3 col-lg-3 col-md-6 mt-4 pt-2">
                                        <div class="card team border-0 rounded shadow overflow-hidden">
                                            <div class="team-person position-relative overflow-hidden">
                                                <img src="../assets/images/doctors/07.jpg" class="img-fluid" alt="">
                                                <ul class="list-unstyled team-like">
                                                    <li><a href="#" class="btn btn-icon btn-pills btn-soft-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart icons"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <a href="#" class="title text-dark h5 d-block mb-0">Bertha Magers</a>
                                                <small class="text-muted speciality">M.B.B.S, Urologist</small>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    </ul>
                                                    <p class="text-muted mb-0">5 Star</p>
                                                </div>
                                                <ul class="list-unstyled mt-2 mb-0">
                                                    <li class="d-flex">
                                                        <i class="ri-map-pin-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">63, PG Shustoke, UK</small>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <i class="ri-time-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">Mon: 2:00PM - 6:00PM</small>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <i class="ri-money-dollar-circle-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">$ 75 USD / Visit</small>
                                                    </li>
                                                </ul>
                                                <ul class="list-unstyled mt-2 mb-0">
                                                    <li class="list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook icons"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin icons"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github icons"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter icons"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-xl-3 col-lg-3 col-md-6 mt-4 pt-2">
                                        <div class="card team border-0 rounded shadow overflow-hidden">
                                            <div class="team-person position-relative overflow-hidden">
                                                <img src="../assets/images/doctors/08.jpg" class="img-fluid" alt="">
                                                <ul class="list-unstyled team-like">
                                                    <li><a href="#" class="btn btn-icon btn-pills btn-soft-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart icons"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <a href="#" class="title text-dark h5 d-block mb-0">Louis Batey</a>
                                                <small class="text-muted speciality">M.B.B.S, Neurologist</small>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    </ul>
                                                    <p class="text-muted mb-0">5 Star</p>
                                                </div>
                                                <ul class="list-unstyled mt-2 mb-0">
                                                    <li class="d-flex">
                                                        <i class="ri-map-pin-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">63, PG Shustoke, UK</small>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <i class="ri-time-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">Mon: 2:00PM - 6:00PM</small>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <i class="ri-money-dollar-circle-line text-primary align-middle"></i>
                                                        <small class="text-muted ms-2">$ 75 USD / Visit</small>
                                                    </li>
                                                </ul>
                                                <ul class="list-unstyled mt-2 mb-0">
                                                    <li class="list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook icons"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin icons"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github icons"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></a></li>
                                                    <li class="mt-2 list-inline-item"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter icons"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end teb pane-->

                            <div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="experience-tab">
                                <h5 class="mb-1">Experience:</h5>

                                <p class="text-muted mt-4">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. Lorem Ipsum is composed in a pseudo-Latin language which more or less corresponds to 'proper' Latin. It contains a series of real Latin words. This ancient dummy text is also incomprehensible, but it imitates the rhythm of most European languages in Latin script. The advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's attention from the layout.</p>

                                <h6>Professional Experience:</h6>

                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <div class="col-md-12">
                                            <div class="tns-outer" id="tns2-ow"><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">1 to 4</span>  of 5</div><div id="tns2-mw" class="tns-ovh"><div class="tns-inner" id="tns2-iw"><div class="slider-range-four tiny-timeline  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" id="tns2" style="transform: translate3d(0%, 0px, 0px);">
                                                            <div class="tiny-slide text-center tns-item tns-slide-active" id="tns2-item0">
                                                                <div class="card border-0 p-4 item-box mb-2 shadow rounded">
                                                                    <p class="text-muted mb-0">2010 - 2014</p>
                                                                    <h6 class="mt-1">Master Of Science</h6>
                                                                    <p class="text-muted mb-0">X.Y.Z Hospital (NZ)</p>
                                                                </div>
                                                            </div>

                                                            <div class="tiny-slide text-center tns-item tns-slide-active" id="tns2-item1">
                                                                <div class="card border-0 p-4 item-box mb-2 shadow rounded">
                                                                    <p class="text-muted mb-0">2014 - 2016</p>
                                                                    <h6 class="mt-1">Gynecology Test</h6>
                                                                    <p class="text-muted mb-0">X.Y.Z Hospital (NZ)</p>
                                                                </div>
                                                            </div>

                                                            <div class="tiny-slide text-center tns-item tns-slide-active" id="tns2-item2">
                                                                <div class="card border-0 p-4 item-box mb-2 shadow rounded">
                                                                    <p class="text-muted mb-0">2016 - 2019</p>
                                                                    <h6 class="mt-1">Master Of Medicine</h6>
                                                                    <p class="text-muted mb-0">X.Y.Z Hospital (NZ)</p>
                                                                </div>
                                                            </div>

                                                            <div class="tiny-slide text-center tns-item tns-slide-active" id="tns2-item3">
                                                                <div class="card border-0 p-4 item-box mb-2 shadow rounded">
                                                                    <p class="text-muted mb-0">2019 - 2020</p>
                                                                    <h6 class="mt-1">Orthopedics</h6>
                                                                    <p class="text-muted mb-0">X.Y.Z Hospital (NZ)</p>
                                                                </div>
                                                            </div>

                                                            <div class="tiny-slide text-center tns-item" id="tns2-item4" aria-hidden="true" tabindex="-1">
                                                                <div class="card border-0 p-4 item-box mb-2 shadow rounded">
                                                                    <p class="text-muted mb-0">2020 to continue..</p>
                                                                    <h6 class="mt-1">Gynecologist (Final)</h6>
                                                                    <p class="text-muted mb-0">X.Y.Z Hospital (NZ)</p>
                                                                </div>
                                                            </div>
                                                        </div></div></div><div class="tns-nav" aria-label="Carousel Pagination"><button type="button" data-nav="0" aria-controls="tns2" style="" aria-label="Carousel Page 1 (Current Slide)" class="tns-nav-active"></button><button type="button" data-nav="1" aria-controls="tns2" style="" aria-label="Carousel Page 2" class="" tabindex="-1"></button><button type="button" data-nav="2" tabindex="-1" aria-controls="tns2" style="display:none" aria-label="Carousel Page 3"></button><button type="button" data-nav="3" tabindex="-1" aria-controls="tns2" style="display:none" aria-label="Carousel Page 4"></button><button type="button" data-nav="4" tabindex="-1" aria-controls="tns2" style="display:none" aria-label="Carousel Page 5"></button></div></div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end teb pane-->

                            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mt-4 pt-2 text-center">
                                        <div class="tns-outer" id="tns1-ow"><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">1</span>  of 6</div><div id="tns1-mw" class="tns-ovh"><div class="tns-inner" id="tns1-iw"><div class="client-review-slider  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" id="tns1" style="transform: translate3d(0%, 0px, 0px);">
                                                        <div class="tiny-slide text-center tns-item tns-slide-active" id="tns1-item0">
                                                            <p class="text-muted h6 fw-normal fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                                                            <img src="../assets/images/client/01.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            </ul>
                                                            <h6 class="text-primary">- Thomas Israel <small class="text-muted">C.E.O</small></h6>
                                                        </div><!--end customer testi-->

                                                        <div class="tiny-slide text-center tns-item" id="tns1-item1" aria-hidden="true" tabindex="-1">
                                                            <p class="text-muted h6 fw-normal fst-italic">" The advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's attention from the layout. "</p>
                                                            <img src="../assets/images/client/02.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            </ul>
                                                            <h6 class="text-primary">- Carl Oliver <small class="text-muted">P.A</small></h6>
                                                        </div><!--end customer testi-->

                                                        <div class="tiny-slide text-center tns-item" id="tns1-item2" aria-hidden="true" tabindex="-1">
                                                            <p class="text-muted h6 fw-normal fst-italic">" There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or nonsensical stories. "</p>
                                                            <img src="../assets/images/client/03.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            </ul>
                                                            <h6 class="text-primary">- Barbara McIntosh <small class="text-muted">M.D</small></h6>
                                                        </div><!--end customer testi-->

                                                        <div class="tiny-slide text-center tns-item" id="tns1-item3" aria-hidden="true" tabindex="-1">
                                                            <p class="text-muted h6 fw-normal fst-italic">" According to most sources, Lorum Ipsum can be traced back to a text composed by Cicero in 45 BC. Allegedly, a Latin scholar established the origin of the text by compiling all the instances of the unusual word 'consectetur' he could find "</p>
                                                            <img src="../assets/images/client/04.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            </ul>
                                                            <h6 class="text-primary">- Christa Smith <small class="text-muted">Manager</small></h6>
                                                        </div><!--end customer testi-->

                                                        <div class="tiny-slide text-center tns-item" id="tns1-item4" aria-hidden="true" tabindex="-1">
                                                            <p class="text-muted h6 fw-normal fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                                                            <img src="../assets/images/client/05.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            </ul>
                                                            <h6 class="text-primary">- Dean Tolle <small class="text-muted">Developer</small></h6>
                                                        </div><!--end customer testi-->

                                                        <div class="tiny-slide text-center tns-item" id="tns1-item5" aria-hidden="true" tabindex="-1">
                                                            <p class="text-muted h6 fw-normal fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text. "</p>
                                                            <img src="../assets/images/client/06.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            </ul>
                                                            <h6 class="text-primary">- Jill Webb <small class="text-muted">Designer</small></h6>
                                                        </div><!--end customer testi-->
                                                    </div></div></div><div class="tns-nav" aria-label="Carousel Pagination"><button type="button" data-nav="0" aria-controls="tns1" style="" aria-label="Carousel Page 1 (Current Slide)" class="tns-nav-active"></button><button type="button" data-nav="1" aria-controls="tns1" style="" aria-label="Carousel Page 2" class="" tabindex="-1"></button><button type="button" data-nav="2" aria-controls="tns1" style="" aria-label="Carousel Page 3" class="" tabindex="-1"></button><button type="button" data-nav="3" aria-controls="tns1" style="" aria-label="Carousel Page 4" class="" tabindex="-1"></button><button type="button" data-nav="4" aria-controls="tns1" style="" aria-label="Carousel Page 5" class="" tabindex="-1"></button><button type="button" data-nav="5" aria-controls="tns1" style="" aria-label="Carousel Page 6" class="" tabindex="-1"></button></div></div><!--end carousel-->
                                    </div><!--end col-->
                                </div><!--end row-->

                                <div class="row justify-content-center">
                                    <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                                        <img src="../assets/images/client/amazon.png" class="avatar avatar-client" alt="">
                                    </div><!--end col-->

                                    <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                                        <img src="../assets/images/client/google.png" class="avatar avatar-client" alt="">
                                    </div><!--end col-->

                                    <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                                        <img src="../assets/images/client/lenovo.png" class="avatar avatar-client" alt="">
                                    </div><!--end col-->

                                    <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                                        <img src="../assets/images/client/paypal.png" class="avatar avatar-client" alt="">
                                    </div><!--end col-->

                                    <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                                        <img src="../assets/images/client/shopify.png" class="avatar avatar-client" alt="">
                                    </div><!--end col-->

                                    <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                                        <img src="../assets/images/client/spotify.png" class="avatar avatar-client" alt="">
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end teb pane-->

                            <div class="tab-pane fade" id="pills-location" role="tabpanel" aria-labelledby="location-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card map border-0">
                                            <div class="card-body p-0">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" style="border:0" class="rounded" allowfullscreen=""></iframe>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end teb pane-->

                            <div class="tab-pane fade" id="pills-timetable" role="tabpanel" aria-labelledby="timetable-tab">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card border-0 p-3 rounded shadow">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex justify-content-between">
                                                    <p class="text-muted mb-0"><i class="ri-time-fill text-primary align-middle h5 mb-0"></i> Monday</p>
                                                    <p class="text-primary mb-0"><span class="text-dark">Time:</span> 8.00 - 20.00</p>
                                                </li>
                                                <li class="d-flex justify-content-between mt-2">
                                                    <p class="text-muted mb-0"><i class="ri-time-fill text-primary align-middle h5 mb-0"></i> Tuesday</p>
                                                    <p class="text-primary mb-0"><span class="text-dark">Time:</span> 8.00 - 20.00</p>
                                                </li>
                                                <li class="d-flex justify-content-between mt-2">
                                                    <p class="text-muted mb-0"><i class="ri-time-fill text-primary align-middle h5 mb-0"></i> Wednesday</p>
                                                    <p class="text-primary mb-0"><span class="text-dark">Time:</span> 8.00 - 20.00</p>
                                                </li>
                                                <li class="d-flex justify-content-between mt-2">
                                                    <p class="text-muted mb-0"><i class="ri-time-fill text-primary align-middle h5 mb-0"></i> Thursday</p>
                                                    <p class="text-primary mb-0"><span class="text-dark">Time:</span> 8.00 - 20.00</p>
                                                </li>
                                                <li class="d-flex justify-content-between mt-2">
                                                    <p class="text-muted mb-0"><i class="ri-time-fill text-primary align-middle h5 mb-0"></i> Friday</p>
                                                    <p class="text-primary mb-0"><span class="text-dark">Time:</span> 8.00 - 20.00</p>
                                                </li>
                                                <li class="d-flex justify-content-between mt-2">
                                                    <p class="text-muted mb-0"><i class="ri-time-fill text-primary align-middle h5 mb-0"></i> Saturday</p>
                                                    <p class="text-primary mb-0"><span class="text-dark">Time:</span> 8.00 - 18.00</p>
                                                </li>
                                                <li class="d-flex justify-content-between mt-2">
                                                    <p class="text-muted mb-0"><i class="ri-time-fill text-primary align-middle h5 mb-0"></i> Sunday</p>
                                                    <p class="text-primary mb-0"><span class="text-dark">Time:</span> 8.00 - 14.00</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-4 col-md-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                        <div class="card border-0 text-center features feature-primary">
                                            <div class="icon text-center mx-auto rounded-md">
                                                <span class="mb-0"><i class="uil uil-phone h3"></i></span>
                                            </div>

                                            <div class="card-body p-0 mt-4">
                                                <h5 class="title fw-bold">Phone</h5>
                                                <p class="text-muted">Great doctor if you need your family member to get effective immediate assistance</p>
                                                <a href="tel:+152534-468-854" class="link">+152 534-468-854</a>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-4 col-md-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                        <div class="card border-0 text-center features feature-primary">
                                            <div class="icon text-center mx-auto rounded-md">
                                                <span class="mb-0"><i class="uil uil-envelope h3"></i></span>
                                            </div>

                                            <div class="card-body p-0 mt-4">
                                                <h5 class="title fw-bold">Email</h5>
                                                <p class="text-muted">Great doctor if you need your family member to get effective immediate assistance</p>
                                                <a href="mailto:contact@example.com" class="link">contact@example.com</a>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end teb pane-->
                        </div><!--end tab content-->
                    </div>
                </div><!--end col-->
            </div>

        </div>
        <!-- /inner container -->

    </div>
    <!-- /content area -->

@endsection


@section('js')


    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('/public/material/js/file-explore.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/js/croppie.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/visualization/echarts/echarts.min.js') !!}
    <script>


        // Setup module
        // ------------------------------

        var UserProfileTabbed = function() {


            //
            // Setup module components
            //

            // Charts
            var _componentEcharts = function() {
                if (typeof echarts == 'undefined') {
                    console.warn('Warning - echarts.min.js is not loaded.');
                    return;
                }

                // Define elements
                var weekly_statistics_element = document.getElementById('weekly_statistics');
                var balance_statistics_element = document.getElementById('balance_statistics');
                var available_hours_element = document.getElementById('available_hours');

                // Weekly statistics chart config
                if (weekly_statistics_element) {

                    // Initialize chart
                    var weekly_statistics = echarts.init(weekly_statistics_element);


                    //
                    // Chart config
                    //

                    // Options
                    weekly_statistics.setOption({

                        // Define colors
                        color: ['#2ec7c9','#5ab1ef','#b6a2de',],

                        // Global text styles
                        textStyle: {
                            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                            fontSize: 13
                        },

                        // Chart animation duration
                        animationDuration: 750,

                        // Setup grid
                        grid: {
                            left: 0,
                            right: 10,
                            top: 35,
                            bottom: 0,
                            containLabel: true
                        },

                        // Add legend
                        legend: {
                            data: ['Patients', 'Appointments', 'Income'],
                            itemHeight: 8,
                            itemGap: 20,
                            textStyle: {
                                padding: [0, 5]
                            }
                        },

                        // Add tooltip
                        tooltip: {
                            trigger: 'axis',
                            backgroundColor: 'rgba(0,0,0,0.75)',
                            padding: [10, 15],
                            textStyle: {
                                fontSize: 13,
                                fontFamily: 'Roboto, sans-serif'
                            },
                            axisPointer: {
                                type: 'shadow',
                                shadowStyle: {
                                    color: 'rgba(0,0,0,0.025)'
                                }
                            }
                        },

                        // Horizontal axis
                        xAxis: [{
                            type: 'value',
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: '#eee',
                                    type: 'dashed'
                                }
                            }
                        }],

                        // Vertical axis
                        yAxis: [{
                            type: 'category',
                            data: ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
                            axisTick: {
                                show: false
                            },
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: ['#eee']
                                }
                            },
                            splitArea: {
                                show: true,
                                areaStyle: {
                                    color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.015)']
                                }
                            }
                        }],

                        // Add series
                        series: [
                            {
                                name: 'Patients',
                                type: 'bar',
                                barWidth: 26,
                                itemStyle: {
                                    normal: {
                                        label: {
                                            show: true,
                                            position: 'inside',
                                            textStyle: {
                                                fontSize: 12
                                            }
                                        }
                                    }
                                },
                                data: [200, 170, 240, 244, 200, 220, 210]
                            },
                            {
                                name: 'Income',
                                type: 'bar',
                                stack: 'Total',
                                barWidth: 5,
                                itemStyle: {
                                    normal: {
                                        label: {
                                            show: true,
                                            position: 'right',
                                            textStyle: {
                                                fontSize: 12
                                            }
                                        }
                                    }
                                },
                                data: [320, 302, 341, 374, 390, 450, 420]
                            },
                            {
                                name: 'Appointments',
                                type: 'bar',
                                stack: 'Total',
                                itemStyle: {
                                    normal: {
                                        label: {
                                            show: true,
                                            position: 'left',
                                            textStyle: {
                                                fontSize: 12
                                            }
                                        }
                                    }
                                },
                                data: [-120, -132, -101, -134, -190, -230, -210]
                            }
                        ]
                    });
                }

                // Balance chart
                if (balance_statistics_element) {

                    // Initialize chart
                    var balance_statistics = echarts.init(balance_statistics_element);


                    //
                    // Chart config
                    //

                    // Common styles
                    var labelRight = {
                        normal: {
                            color: '#FF7043',
                            label: {
                                position: 'right'
                            }
                        }
                    };

                    // Options
                    balance_statistics.setOption({

                        // Global text styles
                        textStyle: {
                            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                            fontSize: 13
                        },

                        // Chart animation duration
                        animationDuration: 750,

                        // Setup grid
                        grid: {
                            left: 0,
                            right: 10,
                            top: 30,
                            bottom: 0,
                            containLabel: true
                        },

                        // Add legend
                        legend: {
                            data: ['Income', 'Outcome'],
                            itemHeight: 8,
                            itemGap: 20,
                            textStyle: {
                                padding: [0, 5]
                            }
                        },

                        // Add tooltip
                        tooltip: {
                            trigger: 'axis',
                            backgroundColor: 'rgba(0,0,0,0.75)',
                            padding: [10, 15],
                            textStyle: {
                                fontSize: 13,
                                fontFamily: 'Roboto, sans-serif'
                            },
                            axisPointer: {
                                type: 'shadow',
                                shadowStyle: {
                                    color: 'rgba(0,0,0,0.025)'
                                }
                            }
                        },

                        // Horizontal axis
                        xAxis: [{
                            type: 'category',
                            data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: ['#eee']
                                }
                            },
                            splitArea: {
                                show: true,
                                areaStyle: {
                                    color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.015)']
                                }
                            }
                        }],

                        // Vertical axis
                        yAxis: [{
                            type: 'value',
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: '#eee',
                                    type: 'dashed'
                                }
                            }
                        }],

                        // Add series
                        series: [
                            {
                                name: 'Income',
                                type: 'bar',
                                barCategoryGap: '50%',
                                label: {
                                    normal: {
                                        textStyle: {
                                            color: '#682d19'
                                        },
                                        position: 'left',
                                        show: false,
                                        formatter: '{b}',
                                        height: 30
                                    }
                                },
                                itemStyle: {
                                    normal: {
                                        color: '#6bca6f',
                                        barBorderRadius: 3
                                    }
                                },
                                data: [190, 122, 160, 240, 110, 180, 280]
                            },
                            {
                                name: 'Outcome',
                                type: 'line',
                                smooth: true,
                                symbolSize: 7,
                                silent: true,
                                data: [120, 180, 30, 137, 90, 230, 120],
                                itemStyle: {
                                    normal: {
                                        color: '#2f4553',
                                        borderWidth: 2
                                    }
                                }
                            }
                        ]
                    });
                }

                // Basic columns chart
                if (available_hours_element) {

                    // Initialize chart
                    var available_hours = echarts.init(available_hours_element);


                    //
                    // Chart config
                    //

                    // Options
                    available_hours.setOption({

                        // Define colors
                        color: ['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80'],

                        // Global text styles
                        textStyle: {
                            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                            fontSize: 13
                        },

                        // Chart animation duration
                        animationDuration: 750,

                        // Setup grid
                        grid: {
                            left: 0,
                            right: 10,
                            top: 30,
                            bottom: 0,
                            containLabel: true
                        },

                        // Add legend
                        legend: {
                            data: ['Booked hours', 'Available hours'],
                            itemHeight: 8,
                            itemGap: 20,
                            textStyle: {
                                padding: [0, 5]
                            }
                        },

                        // Add tooltip
                        tooltip: {
                            trigger: 'axis',
                            backgroundColor: 'rgba(0,0,0,0.75)',
                            padding: [10, 15],
                            axisPointer: {
                                type: 'shadow',
                                shadowStyle: {
                                    color: 'rgba(0,0,0,0.025)'
                                }
                            },
                            textStyle: {
                                fontSize: 13,
                                fontFamily: 'Roboto, sans-serif'
                            }
                        },

                        // Horizontal axis
                        xAxis: [{
                            type: 'category',
                            data : ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: '#eee',
                                    type: 'dashed'
                                }
                            }
                        }],

                        // Vertical axis
                        yAxis: [{
                            type: 'value',
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                lineStyle: {
                                    color: '#eee'
                                }
                            },
                            splitArea: {
                                show: true,
                                areaStyle: {
                                    color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                                }
                            }
                        }],

                        // Add series
                        series: [
                            {
                                name: 'Booked hours',
                                type: 'bar',
                                data: [4, 8, 6, 4, 7, 5, 9],
                                itemStyle: {
                                    normal: {
                                        color: '#B0BEC5',
                                        label: {
                                            show: true,
                                            position: 'top',
                                            textStyle: {
                                                fontWeight: 500
                                            }
                                        }
                                    }
                                }
                            },
                            {
                                name: 'Available hours',
                                type: 'bar',
                                data: [6, 2, 4, 6, 3, 5, 1],
                                itemStyle: {
                                    normal: {
                                        color: '#29B6F6',
                                        label: {
                                            show: true,
                                            position: 'top',
                                            textStyle: {
                                                fontWeight: 500
                                            }
                                        }
                                    }
                                }
                            }
                        ]
                    });
                }


                //
                // Resize charts
                //

                // Resize function
                var triggerChartResize = function() {
                    weekly_statistics_element && weekly_statistics.resize();
                    balance_statistics_element && balance_statistics.resize();
                    available_hours_element && available_hours.resize();
                };

                // On sidebar width change
                $(document).on('click', '.sidebar-control, .navbar-toggler', function() {
                    setTimeout(function () {
                        triggerChartResize();
                    }, 0);
                });

                // On window resize
                var resizeCharts;
                window.onresize = function () {
                    clearTimeout(resizeCharts);
                    resizeCharts = setTimeout(function () {
                        triggerChartResize();
                    }, 200);
                };

                // Resize charts when hidden element becomes visible
                $('.nav-link[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    triggerChartResize();
                });
            };

            // Uniform
            var _componentUniform = function() {
                if (!$().uniform) {
                    console.warn('Warning - uniform.min.js is not loaded.');
                    return;
                }

                // Initialize
                $('.form-input-styled').uniform({
                    fileButtonClass: 'action btn bg-warning'
                });
            };

            // Select2
            var _componentSelect2 = function() {
                if (!$().select2) {
                    console.warn('Warning - select2.min.js is not loaded.');
                    return;
                }

                // Initialize
                $('.form-control-select2').select2({
                    minimumResultsForSearch: Infinity
                });
            };

            // Schedule
            var _componentFullCalendar = function() {
                if (typeof FullCalendar == 'undefined') {
                    console.warn('Warning - Fullcalendar files are not loaded.');
                    return;
                }

                // Add events
                var eventColors = [
                    {
                        title: 'Day off',
                        start: '2014-11-01',
                        color: '#DB7272'
                    },
                    {
                        title: 'University',
                        start: '2014-11-07',
                        end: '2014-11-10',
                        color: '#42A5F5'
                    },
                    {
                        id: 999,
                        title: 'Shopping',
                        start: '2014-11-09T13:00:00',
                        color: '#8D6E63'
                    },
                    {
                        id: 999,
                        title: 'Shopping',
                        start: '2014-11-15T16:00:00',
                        color: '#00BCD4'
                    },
                    {
                        title: 'Conference',
                        start: '2014-11-11',
                        end: '2014-11-13',
                        color: '#26A69A'
                    },
                    {
                        title: 'Meeting',
                        start: '2014-11-14T08:30:00',
                        end: '2014-11-14T12:30:00',
                        color: '#7986CB'
                    },
                    {
                        title: 'Meeting',
                        start: '2014-11-11T09:30:00',
                        color: '#78909C'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2014-11-12T14:30:00',
                        color: '#26A69A'
                    },
                    {
                        title: 'Dinner',
                        start: '2014-11-13T19:00:00',
                        color: '#FF7043'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2014-11-13T03:00:00',
                        color: '#4CAF50'
                    }
                ];

                // Define element
                var myScheduleElement = document.querySelector('.my-schedule');

                // Initialize
                if(myScheduleElement) {
                    var myScheduleInit = new FullCalendar.Calendar(myScheduleElement, {
                        plugins: [ 'dayGrid', 'timeGrid', 'interaction' ],
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        defaultDate: '2014-11-12',
                        defaultView: 'timeGridWeek',
                        businessHours: true,
                        events: eventColors
                    });

                    // Render if inside hidden element
                    $('.nav-link[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                        myScheduleInit.render();
                    });
                }
            };

            // Row link
            var _componentRowLink = function() {
                if (!$().rowlink) {
                    console.warn('Warning - rowlink.js is not loaded.');
                    return;
                }

                // Initialize
                $('tbody.rowlink').rowlink();
            };

            // Inbox table
            var _componentTableInbox = function() {

                // Define variables
                var highlightColorClass = 'alpha-slate';

                // Highlight row when checkbox is checked
                $('.table-inbox').find('tr > td:first-child').find('input[type=checkbox]').on('change', function() {
                    if($(this).is(':checked')) {
                        $(this).parents('tr').addClass(highlightColorClass);
                    }
                    else {
                        $(this).parents('tr').removeClass(highlightColorClass);
                    }
                });

                // Grab first letter and insert to the icon
                $('.table-inbox tr').each(function (i) {

                    // Title
                    var $title = $(this).find('.letter-icon-title'),
                        letter = $title.eq(0).text().charAt(0).toUpperCase();

                    // Icon
                    var $icon = $(this).find('.letter-icon');
                    $icon.eq(0).text(letter);
                });
            };


            //
            // Return objects assigned to module
            //

            return {
                init: function() {
                    _componentEcharts();
                    _componentUniform();
                    _componentSelect2();
                    _componentFullCalendar();
                    _componentRowLink();
                    _componentTableInbox();
                }
            }
        }();


        // Initialize module
        // ------------------------------

        document.addEventListener('DOMContentLoaded', function() {
            UserProfileTabbed.init();
        });



    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection