<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-base-url" content="{{ env('APP_URL') }}">
    <meta name="app-uri" content="{{ env('MIX_APP_URI', '') }}">
    <meta name="api-prefix" content="{{ env('MIX_API_PREFIX','api') }}">
    <title>{{ config('app.name', 'PH') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("template/assets/vendors/fontawesome-free/css/all.min.css")}}">
    <link href="{{ mix('/css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("template/assets/css/style.css")}}">
    @stack('styles')
    <script type="javascript">
        window.Laravel = {
            baseUrl: {{ url('') }},
            appUri: {{env('MIX_APP_URI')}},
            apiPrefix: {{env('MIX_API_PREFIX','api')}}
        };
    </script>
</head>

<body>
<div class="p-0 m-0" id="app">
    @include('layouts.partials.header')
    <main class="page-about">
        <div class="container">
            <section class="page-header">
                <h1>@yield('page-title',"")</h1>
                @yield('breadcrumbs')
            </section>
            <section class="foi-page-section pt-0">
                @yield('content')
            </section>
        </div>
    </main>
    <footer class="foi-footer text-white">
        <div class="container">
            <div class="row footer-content">
                <div class="col-xl-6 col-lg-7 col-md-8">
                    <h2 class="mb-0">Do you want to know more or just have a question? write to us.</h2>
                </div>
                <div class="col-md-4 col-lg-5 col-xl-6 py-3 py-md-0 d-md-flex align-items-center justify-content-end">
                    <a href="contact.html" class="btn btn-danger btn-lg">Contact form</a>
                </div>
            </div>
            <div class="row footer-widget-area">
                <div class="col-md-3">
                    <div class="py-3">
                        <img src="{{asset("template/assets/images/logo-white.svg")}}" alt="FOI">
                    </div>
                    <p class="font-os font-weight-semibold mb3">Get our mobile app</p>
                    <div>
                        <button class="btn btn-app-download mr-2"><img src="{{asset("template/assets/images/ios.svg")}}" alt="App store"></button>
                        <button class="btn btn-app-download"><img src="{{asset("template/assets/images/android.svg")}}" alt="play store"></button>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Account</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">My tasks</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Edit profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Activity</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#!" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Careers <span class="badge badge-pill badge-secondary ml-3">Hiring</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Shop with us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <p>
                        &copy; savannabits 2020 <a href="https://www.bootstrapdash.com" target="_blank" rel="noopener noreferrer" class="text-reset">Savannabits</a>.
                    </p>
                    <p>All rights reserved.</p>
                    <nav class="social-menu">
                        <a href=""><img src="{{asset("template/assets/images/facebook.svg")}}" alt="facebook"></a>
                        <a href=""><img src="{{asset("template/assets/images/instagram.svg")}}" alt="instagram"></a>
                        <a href=""><img src="{{asset("template/assets/images/twitter.svg")}}" alt="twitter"></a>
                        <a href=""><img src="{{asset("template/assets/images/youtube.svg")}}" alt="youtube"></a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</div>
{{--<script src="{{asset("template/assets/vendors/jquery/jquery.min.js")}}"></script>
<script src="{{asset("template/assets/vendors/popper.js/popper.min.js")}}"></script>
<script src="{{asset("template/assets/vendors/bootstrap/dist/js/bootstrap.min.js")}}"></script>--}}
<script src="//cdn.polyfill.io/v2/polyfill.min.js"></script>
<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
