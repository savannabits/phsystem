<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>@yield('title') - Project Heritage</title>
    <meta name="keywords" content="@yield("keywords")">
    <meta name="description" content="@yield("description")">
    <meta name="author" content="Savannabits">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('front/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('front/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">

    @stack('styles')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- Start header -->
<header class="top-navbar">
    <nav id="main-nav" class="navbar navbar-expand-lg navbar-light text-light bg-transparent">
        <div class="container">
            <a class="navbar-brand rounded rounded-lg bg-light" href="{{url('')}}">
                <img id="site-logo" class="" src="{{asset('images/ph-transparent.png')}}" height="150" alt="" />
                <strong id="site-banner" class="text-primary px-2 d-none">Project Heritage</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto text-light">
                    <li class="nav-item active"><a class="nav-link" href="{{url('')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/classes')}}">Classes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('about')}}">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="blog.html">blog</a>
                            <a class="dropdown-item" href="blog-details.html">blog Single</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdown-a" data-toggle="dropdown">My Dashboard</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="{{route('home')}}">Dashboard</a>
                                <a class="dropdown-item" href="{{url('app/my-children')}}">My Chidren</a>
                                <a class="dropdown-item" href="{{url('app/classes')}}">Classes</a>
                                <a class="dropdown-item" href="{{url('app/lessons')}}">Lessons</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link btn btn-sm alert-danger" href="{{url('profile')}}">{{Auth::user()->username}}</a></li>
                        <li class="nav-item"><a class="nav-link ml-2 btn btn-sm btn-danger" href="{{url('logout')}}">Logout</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{route('home')}}">My Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-sm alert-danger rounded-pill" href="{{route('login')}}">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->

@yield('content')

<!-- Start Footer -->
<footer class="footer-area bg-f">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3>About Us</h3>
                <p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui.</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Subscribe</h3>
                <div class="subscribe_form">
                    <form class="subscribe_form">
                        <input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
                        <button type="submit" class="submit">SUBSCRIBE</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <ul class="list-inline f-social">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Contact information</h3>
                <p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
                <p class="lead"><a href="#">+01 2000 800 9999</a></p>
                <p><a href="#"> info@admin.com</a></p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Opening hours</h3>
                <p><span class="text-color">Monday: </span>Closed</p>
                <p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
                <p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
                <p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="company-name">All Rights Reserved. &copy; {{now()->year}} <a href="https://savannabits.com">Savannabits</a>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

<!-- ALL JS FILES -->
<script src="{{asset('front/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('front/js/popper.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<!-- ALL PLUGINS -->
<script src="{{asset('front/js/jquery.superslides.min.js')}}"></script>
<script src="{{asset('front/js/images-loded.min.js')}}"></script>
<script src="{{asset('front/js/isotope.min.js')}}"></script>
<script src="{{asset('front/js/baguetteBox.min.js')}}"></script>
<script src="{{asset('front/js/form-validator.min.js')}}"></script>
<script src="{{asset('front/js/contact-form-script.js')}}"></script>
<script src="{{asset('front/js/custom.js')}}"></script>
@stack('script')
</body>
</html>
