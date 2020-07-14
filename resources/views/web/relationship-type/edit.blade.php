@extends('web.layout.base.layout.default')

@section('title', trans('admin.relationship-type.actions.edit', ['name' => $relationshipType->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <relationship-type-form
                :action="'{{ $relationshipType->resource_url }}'"
                :data="{{ $relationshipType->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.relationship-type.actions.edit', ['name' => $relationshipType->name]) }}
                    </div>

                    <div class="card-body">
                        @include('web.relationship-type.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('savannabits/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </relationship-type-form>

        </div>
    
</div>

@endsection
