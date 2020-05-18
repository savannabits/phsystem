<div class="form-group row align-items-center" :class="{'has-danger': errors.has('first_name'), 'has-success': fields.first_name && fields.first_name.valid }">
    <label for="first_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.child.columns.first_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.first_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('first_name'), 'form-control-success': fields.first_name && fields.first_name.valid}" id="first_name" name="first_name" placeholder="{{ trans('admin.child.columns.first_name') }}">
        <div v-if="errors.has('first_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('first_name') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('middle_names'), 'has-success': fields.middle_names && fields.middle_names.valid }">
    <label for="middle_names" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.child.columns.middle_names') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.middle_names" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('middle_names'), 'form-control-success': fields.middle_names && fields.middle_names.valid}" id="middle_names" name="middle_names" placeholder="{{ trans('admin.child.columns.middle_names') }}">
        <div v-if="errors.has('middle_names')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('middle_names') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('last_name'), 'has-success': fields.last_name && fields.last_name.valid }">
    <label for="last_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.child.columns.last_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.last_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('last_name'), 'form-control-success': fields.last_name && fields.last_name.valid}" id="last_name" name="last_name" placeholder="{{ trans('admin.child.columns.last_name') }}">
        <div v-if="errors.has('last_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_name') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bio'), 'has-success': fields.bio && fields.bio.valid }">
    <label for="bio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.child.columns.bio') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.bio" v-validate="'required'" id="bio" name="bio" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('bio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bio') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('gender'), 'has-success': fields.gender && fields.gender.valid }">
    <label for="gender" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.child.columns.gender') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.gender" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('gender'), 'form-control-success': fields.gender && fields.gender.valid}" id="gender" name="gender" placeholder="{{ trans('admin.child.columns.gender') }}">
        <div v-if="errors.has('gender')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gender') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('dob'), 'has-success': fields.dob && fields.dob.valid }">
    <label for="dob" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.child.columns.dob') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.dob" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('dob'), 'form-control-success': fields.dob && fields.dob.valid}" id="dob" name="dob" placeholder="{{ trans('savannabits/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('dob')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('dob') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('school'), 'has-success': fields.school && fields.school.valid }">
    <label for="school" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.child.columns.school') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.school" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('school'), 'form-control-success': fields.school && fields.school.valid}" id="school" name="school" placeholder="{{ trans('admin.child.columns.school') }}">
        <div v-if="errors.has('school')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('school') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('hobbies'), 'has-success': fields.hobbies && fields.hobbies.valid }">
    <label for="hobbies" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.child.columns.hobbies') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.hobbies" v-validate="''" id="hobbies" name="hobbies" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('hobbies')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('hobbies') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('location'), 'has-success': fields.location && fields.location.valid }">
    <label for="location" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.child.columns.location') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.location" v-validate="''" id="location" name="location" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('location')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('location') }}</div>
    </div>
</div>
<div class="form-check row" :class="{'has-danger': errors.has('active'), 'has-success': fields.active && fields.active.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="active" type="checkbox" v-model="form.active" v-validate="''" data-vv-name="active"  name="active_fake_element">
        <label class="form-check-label" for="active">
            {{ trans('admin.child.columns.active') }}
        </label>
        <input type="hidden" name="active" :value="form.active">
        <div v-if="errors.has('active')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('active') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('enrollment_date'), 'has-success': fields.enrollment_date && fields.enrollment_date.valid }">
    <label for="enrollment_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.child.columns.enrollment_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.enrollment_date" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('enrollment_date'), 'form-control-success': fields.enrollment_date && fields.enrollment_date.valid}" id="enrollment_date" name="enrollment_date" placeholder="{{ trans('savannabits/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('enrollment_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enrollment_date') }}</div>
    </div>
</div>

