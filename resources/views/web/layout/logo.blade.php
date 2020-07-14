<a href="{{ url('/') }}" class="d-sm-down-none p-0 m-0">
    {{-- You may use plain text as a logo instead of image --}}
    <img src="{{asset('images/ph-transparent.png')}}" height="50" alt="PH">
    {{--Text Logo--}}
</a>

<a href="{{url('/')}}" class="navbar-brand">
    <strong class="text-primary text-uppercase font-2xl">{{config('app.name','PH')}}</strong>
</a>
