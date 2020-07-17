<b-modal
    @ok.prevent="submitChildForm" ok-title="Create" cancel-title="Close" size="xl"
    v-cloak ref="childCreateModal" scrollable v-if="form && !form.id">
    <template v-slot:modal-title>
        <strong class="text-primary">Create a new Child Profile</strong>
    </template>
    <template v-slot:default="{ok}">
        <b-form @submit.stop.prevent="ok()">
            <b-form-group label="Names">
                <b-input-group>
                    <b-form-input v-validate="'required'" :state="validateState('first_name')"
                                  placeholder="First Name"
                                  name="first_name" v-model="form.first_name"></b-form-input>
                    <b-form-input v-validate="''" :state="validateState('middle_names')"
                                  placeholder="Middle Name"
                                  name="middle_names" v-model="form.middle_names"></b-form-input>
                    <b-form-input v-validate="'required'" :state="validateState('last_name')"
                                  placeholder="Surname"
                                  name="last_name" v-model="form.last_name"></b-form-input>
                    <b-form-invalid-feedback v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</b-form-invalid-feedback>
                    <b-form-invalid-feedback v-if="errors.has('middle_names')">@{{ errors.first('middle_names') }}</b-form-invalid-feedback>
                    <b-form-invalid-feedback v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</b-form-invalid-feedback>
                </b-input-group>
            </b-form-group>

            <b-row>
                <b-col md="6">
                    <b-form-group label="Date of Birth">
                        <b-input-group prepend-html="<i class='icon-calendar'></i>">
                            {{--                    <b-input-group-prepend><i class="icon-calendar"></i></b-input-group-prepend>--}}
                            <datetime
                                v-model="form.dob" v-validate="'required'" class="flatpickr"
                                :class="{'form-control-danger': errors.has('dob'), 'form-control-success': fields.dob && fields.dob.valid}" id="dob"
                                name="dob" placeholder="{{ trans('Date of Birth') }}"></datetime>
                        </b-input-group>
                    </b-form-group>
                </b-col>
                <b-col md="6">
                    <b-form-group label="Gender">
                        <b-form-select :state="validateState('gender')" name="gender"
                                       v-model="form.gender" v-validate="'required'">
                            <b-form-select-option value="Male">Male</b-form-select-option>
                            <b-form-select-option value="Female">Female</b-form-select-option>
                        </b-form-select>
                        <b-form-invalid-feedback v-if="errors.has('gender')">@{{ errors.first('gender_name') }}</b-form-invalid-feedback>
                    </b-form-group>
                </b-col>
            </b-row>

            <b-row>
                <b-col md="6">
                    <b-form-group label="Physical Address">
                        <b-form-input v-validate="''" :state="validateState('location')" name="location"
                                      v-model="form.location" placeholder="Where does the child live?"
                        ></b-form-input>
                        <b-form-invalid-feedback v-if="errors.has('location')">@{{ errors.first('location') }}</b-form-invalid-feedback>
                    </b-form-group>
                </b-col>
                <b-col md="6">
                    <b-form-group label="School">
                        <b-form-input v-validate="''" :state="validateState('school')" name="school"
                                      v-model="form.school" placeholder="Where does the child attend school?"
                        ></b-form-input>
                        <b-form-invalid-feedback v-if="errors.has('school')">@{{ errors.first('school') }}</b-form-invalid-feedback>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-form-group label="Relatives">
                <b-input-group v-for="(relative,key) of form.relatives" :key="key" prepend="Name -> Relationship">
                    <multiselect :options="usersRepo.data" label="name" track-by="id"
                                 placeholder="Search or Select a User"
                                 v-validate="'required'"
                                 class="form-control"
                                 :internal-search="false"
                                 @search-change="fetchUsers"
                                 :class="{'is-valid': validateState(`relative_${key}`) ===true, 'is-invalid': validateState(`relative_${key}`) ===false}"
                                 v-model="relative.user" :name="`relative_${key}`">
                    </multiselect>
                    <multiselect :options="relationshipTypes" label="name" track-by="id"
                                 placeholder="How are they related?"
                                 v-validate="'required'"
                                 class="form-control"
                                 :class="{'is-valid': validateState(`relationship_type_${key}`) ===true, 'is-invalid': validateState(`relationship_type_${key}`) ===false}"
                                 v-model="relative.relationship_type" :name="`relationship_type_${key}`">
                    </multiselect>
                    <b-form-input
                        size="lg"
                        class="py-4"
                        v-if="relative.relationship_type && relative.relationship_type.name ==='Custom'"
                        placeholder="Specify" v-validate="'required'" :name="`custom_relationship_${key}`"
                        v-model="relative.custom_relationship"
                        :state="validateState(`custom_relationship_${key}`)"
                    ></b-form-input>
                    <b-input-group-append>
                        <b-button @click="removeRelative($event, relative,key)"><i class="fa fa-remove text-danger"></i></b-button>
                    </b-input-group-append>
                    <b-form-invalid-feedback v-if="errors.has(`relative_${key}`)">@{{ errors.first(`relative_${key}`) }}</b-form-invalid-feedback>
                    <b-form-invalid-feedback v-if="errors.has(`relationship_type_${key}`)">@{{ errors.first(`relationship_type_${key}`) }}</b-form-invalid-feedback>
                    <b-form-invalid-feedback v-if="errors.has(`custom_relationship_${key}`)">@{{ errors.first(`custom_relationship_${key}`) }}</b-form-invalid-feedback>
                </b-input-group>
                <b-button @click="addRelative" variant="info"><i class="fa fa-plus"></i> Add Relative</b-button>
                <hr>
                <b-form-group label="Hobbies">
                    <b-form-tags
                        name="hobbies" :state="validateState('hobbies')" tag-class="bg-info"
                        placeholder="Type & Enter to add a hobby" v-model="form.hobbies" v-validate="''"
                    ></b-form-tags>
                </b-form-group>

                <div class="form-group" :class="{'has-danger': errors.has('bio'), 'has-success': fields.bio && fields.bio.valid }">
                    <label for="bio" class="font-weight-bolder">Biography|Info</label>
                    <div>
                        <div>
                            <wysiwyg v-model="form.bio" v-validate="'required'" id="bio" name="bio"></wysiwyg>
                        </div>
                        <div v-if="errors.has('bio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bio') }}</div>
                    </div>
                </div>
            </b-form-group>
            <b-button class="d-none" type="submit"></b-button>
        </b-form>
    </template>
</b-modal>
