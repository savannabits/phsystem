@extends('layouts.app')
@section('page-title',"My Dashboard")
@section('content')
<home-component :action="''" v-cloak inline-template>
    <div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <b-row>
            @foreach(myChildren() as $child)
                <b-col lg="6">
                    <b-card class="card-flat" no-body class="overflow-hidden" style="max-width: 540px;">
                        <b-row no-gutters>
                            <b-col md="6">
                                <b-img blank-color="#777" width="200" src="{{$child->avatarUrl}}" alt="Thumb" class="rounded-0"></b-img>
                            </b-col>
                            <b-col md="6">
                                <b-card-body title="{{$child->last_name." ".$child->middle_names." ".$child->first_name}}">
                                    <b-card-text>
                                        Age: <strong>{{ $child->age }} {{str_plural("year", $child->age)}}</strong>
                                    </b-card-text>
                                </b-card-body>
                            </b-col>
                        </b-row>
                    </b-card>
                </b-col>
            @endforeach
        </b-row>
        @can("ph-class.index")
            <h3 class="text-primary">Heritage Classes</h3>
            <b-card class="card-flat">
                <b-row>
                    @foreach (phClasses() as $class)
                        <b-col md="6" lg="4">
                            <b-card>
                                <a href="{{route("app.classes.manage",$class->slug)}}"><h4>{{$class->name}}</h4></a>
                                <hr>
                                <span>Minimum Age: </span><strong>{{$class->minimum_age}} {{str_plural("year",$class->minimum_age)}}</strong>
                                <hr>
                                <span>Maximum Age: </span><strong>{{$class->maximum_age}} {{str_plural("year",$class->maximum_age)}}</strong>
                            </b-card>
                        </b-col>
                    @endforeach
                </b-row>
            </b-card>
        @endcan
    </div>
</home-component>
@endsection
