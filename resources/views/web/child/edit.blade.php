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


                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-pencil"></i> {{ trans('admin.child.actions.edit', ['name' => $child->first_name]) }}
                        </div>
                        <b-img-lazy ref="avatarThumb" class="" width="100" thumbnail rounded="circle" src="{{$child->avatarUrl ? url($child->avatarUrl) : null}}"></b-img-lazy>
                    </div>

                    <div class="card-body">
                        <b-row class="text-center">
                            <b-col md="6" class="text-white mx-auto rounded">
                                {{--@include('savannabits/admin-ui::admin.includes.avatar-uploader', [
                                    'mediaCollection' => app(\App\Child::class)->getMediaCollection('avatar'),
                                    'media' => $child->getThumbs200ForCollection('avatar'),
                                    'label' => 'Avatar'
                                ])--}}
                                <avatar-uploader :loading="loading" initial-avatar="{{$child->avatarUrl? url($child->avatarUrl): ''}}" @crop="onAvatarCropped"></avatar-uploader>
                            </b-col>
                        </b-row>
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
