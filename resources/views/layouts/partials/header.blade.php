<header-component :action="'/'" v-cloak inline-template>
    <header class="foi-header @yield('header-classes', '')">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light foi-navbar">
                <a class="navbar-brand" href="{{url("/")}}">
                    <img src="{{asset("template/assets/images/logo.svg")}}" alt="FOI">
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="features.html">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        @auth
                            @can('backend.browse')
                                <li class="nav-item">
                                    <b-button class="nav-link nav-link-primary" href="{{url('backend')}}">
                                        Backend
                                    </b-button>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <b-button class="mx-2 nav-link text-white" href="{{url('profile')}}" variant="primary">
                                    <template>
                                        <i class="fa fa-user"></i>
                                        {{auth()->user()->username}}
                                    </template>
                                </b-button>
                            </li>
                            <li class="nav-item">
                                <b-button class="mx-2 nav-link" v-b-modal:logout-modal variant="danger"><i class="fa fa-sign-out"></i> Logout</b-button>
                                <b-modal id="logout-modal" @ok="logout"></b-modal>
                            </li>
                        @elseauth
                            <li class="nav-item mr-2 mb-3 mb-lg-0">
                                <a class="btn btn-secondary" href="{{url('/register')}}">Sign up</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-secondary" href="{{route("login")}}">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
            @yield('header-content')
        </div>
    </header>
</header-component>
