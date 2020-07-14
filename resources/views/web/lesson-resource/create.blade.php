@extends('web.layout.base.layout.default')

@section('title', trans('admin.lesson-resource.actions.create'))

@section('body')

    <div class="container-xl">

        
        <lesson-resource-form
            :action="'{{ url('lesson-resources') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus"></i> {{ trans('admin.lesson-resource.actions.create') }}
                            </div>
                            <div class="card-body">
                                @include('web.lesson-resource.components.form-elements')
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-4">
                        @include('web.lesson-resource.components.form-elements-right')
                    </div>
                </div>
                                
                <button type="submit" class="btn btn-primary fixed-cta-button button-save" :disabled="submiting">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-save'"></i>
                    {{ trans('savannabits/admin-ui::admin.btn.save') }}
                </button>
                <button type="submit" style="display: none" class="btn btn-success fixed-cta-button button-saved" :disabled="submiting" :class="">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-check'"></i>
                    <span>{{ trans('savannabits/admin-ui::admin.btn.saved') }}</span>
                </button>
                
            </form>

        </lesson-resource-form>

        </div>

    
@endsection
