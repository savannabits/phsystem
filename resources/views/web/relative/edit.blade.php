@extends('web.layout.base.layout.default')

@section('title', trans('admin.relative.actions.edit', ['name' => $relative->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <relative-form
                :action="'{{ $relative->resource_url }}'"
                :data="{{ $relative->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.relative.actions.edit', ['name' => $relative->id]) }}
                    </div>

                    <div class="card-body">
                        @include('web.relative.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('savannabits/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </relative-form>

        </div>
    
</div>

@endsection
