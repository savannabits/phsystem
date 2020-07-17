@extends('layouts.app')

@section('page-title')
  My Profile
@endsection

@section('content')
    <profile-component
        :data="{}"
        :url="'{{ url('profile') }}'"
        inline-template
        v-cloak
    >
        <div>
            <b-card class="card-flat" v-if="profile && profile.id">
                <b-row>
                    <b-col md="6" class="text-center">
                        <div>
                            <b-img-lazy width="300" rounded :src="profile.avatar_url" alt="avatar"></b-img-lazy>
                        </div>
                        <b-button size="sm" class="m-2" v-b-modal:profile-avatar-modal style="min-width: 300px" variant="warning">Change Profile Pic</b-button>
                        <b-modal no-close-on-esc no-close-on-backdrop id="profile-avatar-modal">
                            <avatar-uploader :initial-avatar="profile.avatar_url" @crop="uploadCroppedAvatar"></avatar-uploader>
                        </b-modal>
                    </b-col>
                    <b-col md="6">
                        <b-form-group label="First Name">
                            <b-input-group>
                                <b-form-input
                                    v-if="editing==='first_name'"
                                    v-validate="'required'" :state="validateState('first_name')"
                                    name="first_name" ref="first_name" v-model="profile.first_name"
                                    @blur="updateProfile($event,'first_name')"
                                    @keyup.enter="updateProfile($event,'first_name')"
                                ></b-form-input>
                                <span v-else class="form-control">
                                @{{ profile.first_name }}
                            </span>
                                <template v-slot:append>
                                    <b-button @click="editField($event,'first_name')" :disabled="editing==='first_name'" class="pull-right m-0">
                                        <i class="fa fa-spin fa-spinner" v-if="editing==='first_name'"></i>
                                        <i class="icon-pencil" v-else></i>
                                    </b-button>
                                </template>
                            </b-input-group>
                        </b-form-group>
                        <b-form-group label="Middle Name">
                            <b-input-group>
                                <b-form-input
                                    v-if="editing==='middle_name'"
                                    v-validate="'required'" :state="validateState('middle_name')"
                                    name="middle_name" ref="middle_name" v-model="profile.middle_name"
                                    @blur="updateProfile($event,'middle_name')"
                                    @keyup.enter="updateProfile($event,'middle_name')"
                                ></b-form-input>
                                <span v-else class="form-control">
                                @{{ profile.middle_name }}
                            </span>
                                <template v-slot:append>
                                    <b-button @click="editField($event,'middle_name')" :disabled="editing==='middle_name'" class="pull-right m-0">
                                        <i class="fa fa-spin fa-spinner" v-if="editing==='middle_name'"></i>
                                        <i class="icon-pencil" v-else></i>
                                    </b-button>
                                </template>
                            </b-input-group>
                        </b-form-group>
                        <b-form-group label="Last Name">
                            <b-input-group>
                                <b-form-input
                                    v-if="editing==='last_name'"
                                    v-validate="'required'" :state="validateState('last_name')"
                                    name="last_name" ref="last_name" v-model="profile.last_name"
                                    @blur="updateProfile($event,'last_name')"
                                    @keyup.enter="updateProfile($event,'last_name')"
                                ></b-form-input>
                                <span v-else class="form-control">
                                @{{ profile.last_name }}
                            </span>
                                <template v-slot:append>
                                    <b-button @click="editField($event,'last_name')" :disabled="editing==='last_name'" class="pull-right m-0">
                                        <i class="fa fa-spin fa-spinner" v-if="editing==='last_name'"></i>
                                        <i class="icon-pencil" v-else></i>
                                    </b-button>
                                </template>
                            </b-input-group>
                        </b-form-group>
                    </b-col>
                </b-row>
                <hr>
                <b-row>
                    <b-col md="6">
                        <b-form-group label="Gender">
                            <b-input-group>
                                <b-form-input
                                    v-if="editing==='gender'"
                                    v-validate="'required'" :state="validateState('gender')"
                                    name="gender" ref="gender" v-model="profile.gender"
                                    @blur="updateProfile($event,'gender')"
                                    @keyup.enter="updateProfile($event,'gender')"
                                ></b-form-input>
                                <span v-else class="form-control">
                                @{{ profile.gender }}
                            </span>
                                <template v-slot:append>
                                    <b-button @click="editField($event,'gender')" :disabled="editing==='gender'" class="pull-right m-0">
                                        <i class="fa fa-spin fa-spinner" v-if="editing==='gender'"></i>
                                        <i class="icon-pencil" v-else></i>
                                    </b-button>
                                </template>
                            </b-input-group>
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group label="Date of Birth">
                            <b-input-group>
                                <datetime
                                    v-if="editing==='dob'"
                                    v-validate="''"
                                    name="dob" ref="dob" v-model="profile.dob"
                                    v-on:input="updateProfile($event,'dob')"
                                    v-on:on-close="stopEditing"
                                ></datetime>
                                <span v-else class="form-control">
                                @{{ profile.dob }}
                            </span>
                                <template v-slot:append>
                                    <b-button @click="editField($event,'dob')" :disabled="editing==='dob'" class="pull-right m-0">
                                        <i class="fa fa-spin fa-spinner text-danger" v-if="editing==='dob'"></i>
                                        <i class="icon-pencil" v-else></i>
                                    </b-button>
                                </template>
                            </b-input-group>
                        </b-form-group>
                    </b-col>
                </b-row>
            </b-card>
            <b-card class="card-flat">
                <b-button variant="danger" v-b-modal:change-password-modal>Change Password</b-button>
                <b-modal ok-title="Submit"
                         centered
                         v-on:shown="onPasswordModalShown"
                         no-close-on-backdrop no-close-on-esc
                         @ok.prevent="updatePassword"
                         ref="passwordModal" id="change-password-modal"
                         @hidden="onPasswordModalHidden" title="Change Password">
                    <template v-slot:default="{ok}">
                        <b-form @submit.prevent="ok()">
                            <b-form-group label-cols-md="4" label="Current Password">
                                <b-form-input
                                    v-model="pwdForm.current_password"
                                    type="password" v-validate="'required'"
                                    :state="validateState('current_password')"
                                    name="current_password"
                                    ref="currentPassword"
                                ></b-form-input>
                                <b-form-invalid-feedback v-if="errors.has('current_password')">@{{ errors.first('current_password') }}</b-form-invalid-feedback>
                            </b-form-group>
                            <b-form-group label-cols-md="4" label="New Password">
                                <b-form-input
                                    v-model="pwdForm.new_password"
                                    type="password" v-validate="{required: true}"
                                    :state="validateState('new_password')"
                                    name="new_password"
                                    ref="new_password"
                                ></b-form-input>
                                <b-form-invalid-feedback v-if="errors.has('new_password')">@{{ errors.first('new_password') }}</b-form-invalid-feedback>
                            </b-form-group>
                            <b-form-group label-cols-md="4" label="Repeat New Password">
                                <b-form-input
                                    v-model="pwdForm.new_password_confirmation"
                                    type="password" v-validate="{required: true, is: pwdForm.new_password}"
                                    :state="validateState('new_password_confirmation')"
                                    name="new_password_confirmation"
                                    ref="new_password_confirmation"
                                ></b-form-input>
                                <b-form-invalid-feedback v-if="errors.has('new_password_confirmation')">@{{ errors.first('new_password_confirmation') }}</b-form-invalid-feedback>
                            </b-form-group>
                            <b-button class="d-none" type="submit"></b-button>
                        </b-form>
                    </template>
                </b-modal>
            </b-card>
        </div>
    </profile-component>
@endsection
