@extends('web.layout.base.layout.default')

@section('title', trans('admin.child.actions.edit', ['name' => $child->first_name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <child-form
                :action="'{{ $child->resource_url }}'"
                :data="{{ $child->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.child.actions.edit', ['name' => $child->first_name]) }}
                    </div>

                    <div class="card-body">
                        @include('web.child.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('savannabits/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </child-form>

        </div>
    
</div>

@endsection
