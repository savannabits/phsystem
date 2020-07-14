@extends('web.layout.base.layout.master')

@section('title', trans('Login'))

@section('content')
    <div class="container" id="app">
        <div class="row align-items-center justify-content-center auth">
            <div class="col-md-10 col-lg-9">
                <div class="card">
                    <div class="card-block">
                        <signup-form
                            :action="'{{ route('login') }}'"
                            :data="{{json_encode(old())}}"
                            inline-template
                            v-cloak
                        >
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}" novalidate>
                                @csrf
                                <div class="auth-header">
                                    <h1 class="auth-title">{{ trans('Sign Up') }}</h1>
                                    <p class="auth-subtitle">{{ trans('Create a new account') }}</p>
                                </div>
                                <div class="auth-body">
                                    @include('savannabits/admin-auth::admin.auth.includes.messages')
                                    <b-row>
                                        <b-col lg="6">
                                            <div class="form-group" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
                                                <label for="email">{{ trans('savannabits/admin-auth::admin.auth_global.email') }}</label>
                                                <div class="input-group input-group--custom">
                                                    <div class="input-group-addon"><i class="input-icon input-icon--mail"></i></div>
                                                    <input type="text" v-model="form.email" v-validate="'required|email'" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('savannabits/admin-auth::admin.auth_global.email') }}">
                                                </div>
                                                <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
                                            </div>
                                        </b-col>
                                        <b-col lg="6">
                                            <div class="form-group" :class="{'has-danger': errors.has('username'), 'has-success': fields.username && fields.username.valid }">
                                                <label for="username">{{ trans('Username') }}</label>
                                                <div class="input-group input-group--custom">
                                                    <div class="input-group-addon"><i class="icon-user-female"></i></div>
                                                    <input type="text" v-model="form.username" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('username'), 'form-control-success': fields.username && fields.username.valid}" id="username" name="username" placeholder="{{ trans('Username') }}">
                                                </div>
                                                <div v-if="errors.has('username')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('username') }}</div>
                                            </div>
                                        </b-col>
                                    </b-row>


                                    <div class="form-group" :class="{'has-danger': errors.has('last_name'), 'has-success': fields.last_name && fields.last_name.valid }">
                                        <label for="last_name">{{ trans('Surname') }}</label>
                                        <div class="input-group input-group--custom">
                                            <div class="input-group-addon"><i class="text-muted icon-note"></i></div>
                                            <input type="text" v-model="form.last_name" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('last_name'), 'form-control-success': fields.last_name && fields.last_name.valid}" id="last_name" name="last_name" placeholder="{{ trans('Last Name') }}">
                                        </div>
                                        <div v-if="errors.has('last_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_name') }}</div>
                                    </div>


                                    <b-row>
                                        <b-col lg="6">
                                            <div class="form-group" :class="{'has-danger': errors.has('first_name'), 'has-success': fields.first_name && fields.first_name.valid }">
                                                <label for="first_name">{{ trans('First Name') }}</label>
                                                <div class="input-group input-group--custom">
                                                    <div class="input-group-addon"><i class="icon-note"></i></div>
                                                    <input type="text" v-model="form.first_name" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('first_name'), 'form-control-success': fields.first_name && fields.first_name.valid}" id="first_name" name="first_name" placeholder="{{ trans('First Name') }}">
                                                </div>
                                                <div v-if="errors.has('first_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('first_name') }}</div>
                                            </div>
                                        </b-col>
                                        <b-col lg="6">
                                            <div class="form-group" :class="{'has-danger': errors.has('middle_name'), 'has-success': fields.middle_name && fields.middle_name.valid }">
                                                <label for="middle_name">{{ trans('Middle Name') }}</label>
                                                <div class="input-group input-group--custom">
                                                    <div class="input-group-addon"><i class="icon-note"></i></div>
                                                    <input type="text" v-model="form.middle_name" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('middle_name'), 'form-control-success': fields.middle_name && fields.middle_name.valid}" id="middle_name" name="middle_name" placeholder="{{ trans('Middle Name') }}">
                                                </div>
                                                <div v-if="errors.has('middle_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('middle_name') }}</div>
                                            </div>
                                        </b-col>
                                    </b-row>
                                    <div class="form-group" :class="{'has-danger': errors.has('password'), 'has-success': fields.password && fields.password.valid }">
                                        <label for="password">{{ trans('savannabits/admin-auth::admin.auth_global.password') }}</label>
                                        <div class="input-group input-group--custom">
                                            <div class="input-group-addon"><i class="input-icon input-icon--lock"></i></div>
                                            <input type="password" v-model="form.password" v-validate="'required|min:5'"  class="form-control" :class="{'form-control-danger': errors.has('password'), 'form-control-success': fields.password && fields.password.valid}" id="password" name="password" placeholder="{{ trans('savannabits/admin-auth::admin.auth_global.password') }}">
                                        </div>
                                        <div v-if="errors.has('password')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('password') }}</div>
                                    </div>

                                    <div class="form-group" :class="{'has-danger': errors.has('password_confirmation'), 'has-success': fields.password_confirmation && fields.password_confirmation.valid }">
                                        <label for="password_confirmation">{{ trans('Confirm Password') }}</label>
                                        <div class="input-group input-group--custom">
                                            <div class="input-group-addon"><i class="input-icon input-icon--lock"></i></div>
                                            <input type="password" v-model="form.password_confirmation" v-validate="{required: true, is : form.password}"  class="form-control" :class="{'form-control-danger': errors.has('password_confirmation'), 'form-control-success': fields.password_confirmation && fields.password_confirmation.valid}" id="password_confirmation" name="password_confirmation" placeholder="{{ trans('Repeat Password') }}">
                                        </div>
                                        <div v-if="errors.has('password_confirmation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('password_confirmation') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="remember" value="1">
                                        <button type="submit" class="btn btn-primary btn-block btn-spinner"><i class="fa"></i> Register</button>
                                    </div>
                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ route('login') }}" class="">{{ trans('Already have an account') }}</a>
                                        <a href="{{ url('/password-reset') }}" class="auth-ghost-link">{{ trans('savannabits/admin-auth::admin.login.forgot_password') }}</a>
                                    </div>
                                </div>
                            </form>
                        </signup-form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('bottom-scripts')
    <script type="text/javascript">
        // fix chrome password autofill
        // https://github.com/vuejs/vue/issues/1331
        document.getElementById('password').dispatchEvent(new Event('input'));
    </script>
@endsection
