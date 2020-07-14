@extends('web.layout.base.layout.default')

@section('title', trans('admin.resource-type.actions.edit', ['name' => $resourceType->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <resource-type-form
                :action="'{{ $resourceType->resource_url }}'"
                :data="{{ $resourceType->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.resource-type.actions.edit', ['name' => $resourceType->name]) }}
                    </div>

                    <div class="card-body">
                        @include('web.resource-type.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('savannabits/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </resource-type-form>

        </div>
    
</div>

@endsection
