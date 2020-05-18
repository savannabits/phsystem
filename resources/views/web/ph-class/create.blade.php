@extends('web.layout.base.layout.default')

@section('title', trans('admin.ph-class.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <ph-class-form
            :action="'{{ url('ph-classes') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.ph-class.actions.create') }}
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
