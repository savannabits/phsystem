<header-component :action="'/'" v-cloak inline-template>
    <header class="foi-header @yield('header-classes', '')">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light foi-navbar">
                <a class="navbar-brand" href="{{url("/")}}">
                    <img src="{{asset("images/ph-banner.png")}}" alt="FOI" height="50">
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        @hasanyrole('Administrator|Facilitator')
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('app/classes')}}">Enter Class</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('app/lessons')}}">Manage Lessons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('app/resources')}}">Manage Resources</a>
                        </li>
                        @endhasanyrole

                        @role('Parent')
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('app/my-children')}}">My Heritage</a>
                        </li>
                        @endrole
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
                                <b-button class="mx-2 pl-0 py-1 pr-2 nav-link text-white" href="{{url('profile')}}" variant="primary">
                                    @if (auth()->user()->avatar_thumb)
                                        <b-img-lazy height="40" rounded class="pl-0 ml-1" src="{{auth()->user()->avatar_thumb}}"></b-img-lazy>
                                    @else
                                        <i class="icon-user my-2 py-1 ml-2"></i>
                                    @endif
                                    <span class="my-2 py-2">
                                        {{ auth()->user()->username }}
                                    </span>
                                </b-button>
                            </li>
                            <li class="nav-item">
                                <b-button class="mx-2 nav-link" v-b-modal:logout-modal variant="danger"><i class="fa fa-sign-out"></i> Logout</b-button>
                                <b-modal title="Log out" id="logout-modal" @ok="logout">
                                    Are you sure you want to logout?
                                </b-modal>
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
