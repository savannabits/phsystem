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
    <link rel="stylesheet" href="{{asset('vendors/animate.min.css')}}">
    @stack('styles')
    <script type="javascript">
        window.Laravel = {
            baseUrl: {{ url('') }},
            appUri: {{env('MIX_APP_URI')}},
            apiPrefix: {{env('MIX_API_PREFIX','api')}}
        };
    </script>
    <script src="{{asset('vendors/wow.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body class="bg-light">
<div class="p-0 m-0" id="app">
    @include('layouts.partials.header')
    <main class="">
        <div class="container">
            <div class="">
                <h3>@yield('page-title',"")</h3>
                <hr>
{{--                @yield('breadcrumbs')--}}
            </div>
            <div class="pt-0">
                <div  class="wow bounceIn">
                    <notifications  position="top center">
                        <template slot="body" slot-scope="props">
                            <div class="savbits-notification" :class="{'success' : props.item.type === 'success', 'error': props.item.type==='error','warn': props.item.type==='warn'}">
                                <a class="title">
                                    @{{props.item.title}}
                                </a>
                                <a class="close" @click="props.close">
                                    <i class="fa fa-fw fa-close"></i>
                                </a>
                                <div v-html="props.item.text"></div>
                            </div>
                        </template>
                    </notifications>
                </div>
                @yield('content')
            </div>
        </div>
    </main>
    <footer class="foi-footer bg-light text-white">
        <div class="container">
            <div class="row footer-widget-area">
                <div class="col-md-3">
                    <div class="py-3 bg-white">
                        <img src="{{asset("images/ph-transparent.png")}}" alt="PH" height="200">
                    </div>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <nav>
                        <ul class="nav flex-column">
                            @role('Administrator')
                            <li class="nav-item">
                                <a href="{{route('backend')}}" class="nav-link">Backend</a>
                            </li>
                            @endrole
                            @role('Facilitator')
                            <li class="nav-item">
                                <a href="#!" class="nav-link">My Lessons</a>
                            </li>
                            @endrole
                            @role('Parent')
                            <li class="nav-item">
                                <a href="#!" class="nav-link">My Children</a>
                            </li>
                            @endrole
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Edit profile</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-md-3 mt-3 mt-md-0">
                    <p>
                        &copy; savannabits 2020 <a href="https://www.bootstrapdash.com" target="_blank" rel="noopener noreferrer" class="text-reset">Savannabits</a>.
                    </p>
                    <p>All rights reserved.</p>
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
