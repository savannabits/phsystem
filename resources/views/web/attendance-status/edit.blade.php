@extends('web.layout.base.layout.default')

@section('title', trans('admin.attendance-status.actions.edit', ['name' => $attendanceStatus->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <attendance-status-form
                :action="'{{ $attendanceStatus->resource_url }}'"
                :data="{{ $attendanceStatus->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.attendance-status.actions.edit', ['name' => $attendanceStatus->name]) }}
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
