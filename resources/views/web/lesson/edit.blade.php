@extends('web.layout.base.layout.default')

@section('title', trans('admin.lesson.actions.edit', ['name' => $lesson->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <lesson-form
                :action="'{{ $lesson->resource_url }}'"
                :data="{{ $lesson->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.lesson.actions.edit', ['name' => $lesson->id]) }}
                    </div>

                    <div class="card-body">
                        @include('web.lesson.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('savannabits/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </lesson-form>

        </div>
    
</div>

@endsection
