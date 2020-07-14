@extends('web.layout.base.layout.default')

@section('title', trans('admin.attendance.actions.edit', ['name' => $attendance->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <attendance-form
                :action="'{{ $attendance->resource_url }}'"
                :data="{{ $attendance->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.attendance.actions.edit', ['name' => $attendance->id]) }}
                    </div>

                    <div class="card-body">
                        @include('web.attendance.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('savannabits/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </attendance-form>

        </div>
    
</div>

@endsection
