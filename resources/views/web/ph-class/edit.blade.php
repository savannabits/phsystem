@extends('web.layout.base.layout.default')

@section('title', trans('admin.ph-class.actions.edit', ['name' => $phClass->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <ph-class-form
                :action="'{{ $phClass->resource_url }}'"
                :data="{{ $phClass->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.ph-class.actions.edit', ['name' => $phClass->name]) }}
                    </div>

                    <div class="card-body">
                        @include('web.ph-class.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('savannabits/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </ph-class-form>

        </div>
    
</div>

@endsection
