<header class="app-header navbar pr-0">
    <button class="navbar-toggler sidebar-toggler d-lg-none" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
	@if(View::exists('web.layout.logo'))
        @include('web.layout.logo')
	@endif

    <ul class="nav navbar-nav ml-auto p-2 bg-info">
        <li class="nav-item dropdown">
            <a role="button" class="dropdown-toggle nav-link">
                <span>
                    @if(Auth::check() && Auth::user()->avatar_thumb)
                        <img src="{{ url(Auth::user()->avatar_thumb) }}" class="avatar-photo">
                    @elseif(Auth::check() && Auth::user()->first_name && Auth::user()->last_name)
                        <span class="avatar-initials">{{ mb_substr(Auth::user()->first_name, 0, 1) }}{{ mb_substr(Auth::user()->last_name, 0, 1) }}</span>
                    @elseif(Auth::check() && Auth::user()->name)
                        <span class="avatar-initials">{{ mb_substr(Auth::user()->name, 0, 1) }}</span>
                    @else
                        <span class="avatar-initials"><i class="fa fa-user"></i></span>
                    @endif

                    <span class="hidden-md-down">{{ Auth::check() ? Auth::user()->full_name : 'Anonymous' }}</span>
                </span>
                <span class="caret"></span>
            </a>
            @if(View::exists('web.layout.profile-dropdown'))
                @include('web.layout.profile-dropdown')
            @endif
        </li>
    </ul>
</header>
