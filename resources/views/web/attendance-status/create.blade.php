@extends('web.layout.base.layout.default')

@section('title', trans('admin.attendance-status.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <attendance-status-form
            :action="'{{ url('attendance-statuses') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.attendance-status.actions.create') }}
                </div>

                <div class="card-body">
                    @include('web.attendance-status.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('savannabits/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </attendance-status-form>

        </div>

        </div>
    
@endsection
