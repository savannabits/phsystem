@extends('web.layout.base.layout.default')

@section('title', trans('admin.roll-call.actions.edit', ['name' => $rollCall->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <roll-call-form
                :action="'{{ $rollCall->resource_url }}'"
                :data="{{ $rollCall->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.roll-call.actions.edit', ['name' => $rollCall->id]) }}
                    </div>

                    <div class="card-body">
                        @include('web.roll-call.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('savannabits/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </roll-call-form>

        </div>
    
</div>

@endsection
