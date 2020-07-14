@extends('layouts.app')

@section('content')
<home-component :action="''" v-cloak inline-template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Welcome <b>{{auth()->user()->first_name}}!</b> Let's nurture our children together.
                    </div>
                </div>
            </div>
        </div>
    </div>
</home-component>
@endsection
