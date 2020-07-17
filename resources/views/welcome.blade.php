@extends('layouts.frontend')
@section('title','Welcome Home')
@section('description',"Project Heritage, a place where our children will grow to experience love from God and the world")
@section('content')
    <!-- Start slides -->
    <div id="slides" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="{{asset('front/images/slider-01.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Project Heritage</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view  <br>
                                trends to see any changes in performance over time.</p>
                            <p><a class="btn btn-lg btn-circle btn-primary" href="#">Reservation</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-left">
                <img src="{{asset('front/images/slider-02.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Live Dinner Restaurant</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view  <br>
                                trends to see any changes in performance over time.</p>
                            <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-left">
                <img src="{{asset('front/images/slider-03.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Yamifood Restaurant</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view  <br>
                                trends to see any changes in performance over time.</p>
                            <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End slides -->

    <!-- Start About -->
    <div class="about-section-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                    <div class="inner-column">
                        <h1>Welcome To <span>Live Dinner Restaurant</span></h1>
                        <h4>Little Story</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                        <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem pulvinar.</p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="{{asset('front/images/about-img.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start QT -->
    <div class="qt-box qt-background" style="background: url('{{asset('front/images/qt-bg.jpg')}}') no-repeat; background-size: cover; background-attachment: fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <p class="lead ">
                        " If you're not the one cooking, stay out of the way and compliment the chef. "
                    </p>
                    <span class="lead">Michael Strahan</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End QT -->

    <!-- Start Menu -->
    <div class="menu-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Special Menu</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                    </div>
                </div>
            </div>

            <div class="row inner-menu-box">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Drinks</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Lunch</</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Dinner</a>
                    </div>
                </div>

                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 special-grid drinks">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-01.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Drinks 1</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $7.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid drinks">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-02.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Drinks 2</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $9.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid drinks">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-03.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Drinks 3</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $10.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid lunch">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-04.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Lunch 1</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $15.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid lunch">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-05.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Lunch 2</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $18.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid lunch">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-06.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Lunch 3</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $20.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid dinner">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-07.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Dinner 1</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $25.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid dinner">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-08.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Dinner 2</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $22.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid dinner">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-09.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Dinner 3</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $24.79</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 special-grid drinks">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-01.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Drinks 1</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $7.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid drinks">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-02.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Drinks 2</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $9.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid drinks">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-03.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Drinks 3</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $10.79</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 special-grid lunch">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-04.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Lunch 1</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $15.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid lunch">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-05.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Lunch 2</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $18.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid lunch">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-06.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Lunch 3</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $20.79</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 special-grid dinner">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-07.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Dinner 1</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $25.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid dinner">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-08.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Dinner 2</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $22.79</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid dinner">
                                    <div class="gallery-single fix">
                                        <img src="{{asset('front/images/img-09.jpg')}}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4>Special Dinner 3</h4>
                                            <p>Sed id magna vitae eros sagittis euismod.</p>
                                            <h5> $24.79</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Menu -->

    <!-- Start Gallery -->
    <div class="gallery-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Gallery</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                    </div>
                </div>
            </div>
            <div class="tz-gallery">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <a class="lightbox" href="{{asset('front/images/gallery-img-01.jpg')}}">
                            <img class="img-fluid" src="{{asset('front/images/gallery-img-01.jpg')}}" alt="Gallery Images">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <a class="lightbox" href="{{asset('front/images/gallery-img-02.jpg')}}">
                            <img class="img-fluid" src="{{asset('front/images/gallery-img-02.jpg')}}" alt="Gallery Images">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <a class="lightbox" href="{{asset('front/images/gallery-img-03.jpg')}}">
                            <img class="img-fluid" src="{{asset('front/images/gallery-img-03.jpg')}}" alt="Gallery Images">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <a class="lightbox" href="{{asset('front/images/gallery-img-04.jpg')}}">
                            <img class="img-fluid" src="{{asset('front/images/gallery-img-04.jpg')}}" alt="Gallery Images">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <a class="lightbox" href="{{asset('front/images/gallery-img-05.jpg')}}">
                            <img class="img-fluid" src="{{asset('front/images/gallery-img-05.jpg')}}" alt="Gallery Images">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <a class="lightbox" href="{{asset('front/images/gallery-img-06.jpg')}}">
                            <img class="img-fluid" src="{{asset('front/images/gallery-img-06.jpg')}}" alt="Gallery Images">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Gallery -->

    <!-- Start Customer Reviews -->
    <div class="customer-reviews-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Customer Reviews</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center">
                    <div id="reviews" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner mt-4">
                            <div class="carousel-item text-center active">
                                <div class="img-box p-1 border rounded-circle m-auto">
                                    <img class="d-block w-100 rounded-circle" src="{{asset('front/images/quotations-button.png')}}" alt="">
                                </div>
                                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
                                <h6 class="text-dark m-0">Web Developer</h6>
                                <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                            </div>
                            <div class="carousel-item text-center">
                                <div class="img-box p-1 border rounded-circle m-auto">
                                    <img class="d-block w-100 rounded-circle" src="{{asset('front/images/quotations-button.png')}}" alt="">
                                </div>
                                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
                                <h6 class="text-dark m-0">Web Designer</h6>
                                <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                            </div>
                            <div class="carousel-item text-center">
                                <div class="img-box p-1 border rounded-circle m-auto">
                                    <img class="d-block w-100 rounded-circle" src="{{asset('front/images/quotations-button.png')}}" alt="">
                                </div>
                                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
                                <h6 class="text-dark m-0">Seo Analyst</h6>
                                <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Customer Reviews -->

    <!-- Start Contact info -->
    <div class="contact-imfo-box">
        <div class="container">
            <div class="row">
                <div class="col-md-4 arrow-right">
                    <i class="fa fa-volume-control-phone"></i>
                    <div class="overflow-hidden">
                        <h4>Phone</h4>
                        <p class="lead">
                            +01 123-456-4590
                        </p>
                    </div>
                </div>
                <div class="col-md-4 arrow-right">
                    <i class="fa fa-envelope"></i>
                    <div class="overflow-hidden">
                        <h4>Email</h4>
                        <p class="lead">
                            yourmail@gmail.com
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-map-marker"></i>
                    <div class="overflow-hidden">
                        <h4>Location</h4>
                        <p class="lead">
                            800, Lorem Street, US
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact info -->
@stop
