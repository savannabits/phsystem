@extends('web.layout.base.layout.default')

@section('title', trans('admin.enrollment.actions.edit', ['name' => $enrollment->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <enrollment-form
                :action="'{{ $enrollment->resource_url }}'"
                :data="{{ $enrollment->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.enrollment.actions.edit', ['name' => $enrollment->id]) }}
                    </div>

                    <div class="card-body">
                        @include('web.enrollment.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('savannabits/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </enrollment-form>

        </div>
    
</div>

@endsection
