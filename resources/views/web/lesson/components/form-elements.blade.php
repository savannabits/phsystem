<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ph_class_id'), 'has-success': fields.ph_class_id && fields.ph_class_id.valid }">
    <label for="ph_class_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.ph_class_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ph_class_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ph_class_id'), 'form-control-success': fields.ph_class_id && fields.ph_class_id.valid}" id="ph_class_id" name="ph_class_id" placeholder="{{ trans('admin.lesson.columns.ph_class_id') }}">
        <div v-if="errors.has('ph_class_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ph_class_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('facilitator_id'), 'has-success': fields.facilitator_id && fields.facilitator_id.valid }">
    <label for="facilitator_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.facilitator_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.facilitator_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('facilitator_id'), 'form-control-success': fields.facilitator_id && fields.facilitator_id.valid}" id="facilitator_id" name="facilitator_id" placeholder="{{ trans('admin.lesson.columns.facilitator_id') }}">
        <div v-if="errors.has('facilitator_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('facilitator_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('lesson_date'), 'has-success': fields.lesson_date && fields.lesson_date.valid }">
    <label for="lesson_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.lesson_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.lesson_date" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('lesson_date'), 'form-control-success': fields.lesson_date && fields.lesson_date.valid}" id="lesson_date" name="lesson_date" placeholder="{{ trans('savannabits/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('lesson_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lesson_date') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_time'), 'has-success': fields.start_time && fields.start_time.valid }">
    <label for="start_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.start_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.start_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('start_time'), 'form-control-success': fields.start_time && fields.start_time.valid}" id="start_time" name="start_time" placeholder="{{ trans('savannabits/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('start_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_time') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_time'), 'has-success': fields.end_time && fields.end_time.valid }">
    <label for="end_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.end_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.end_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('end_time'), 'form-control-success': fields.end_time && fields.end_time.valid}" id="end_time" name="end_time" placeholder="{{ trans('savannabits/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('end_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end_time') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('objective'), 'has-success': fields.objective && fields.objective.valid }">
    <label for="objective" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.objective') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.objective" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('objective'), 'form-control-success': fields.objective && fields.objective.valid}" id="objective" name="objective" placeholder="{{ trans('admin.lesson.columns.objective') }}">
        <div v-if="errors.has('objective')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('objective') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('activities'), 'has-success': fields.activities && fields.activities.valid }">
    <label for="activities" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.activities') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.activities" v-validate="''" id="activities" name="activities" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('activities')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activities') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('biblical_passage'), 'has-success': fields.biblical_passage && fields.biblical_passage.valid }">
    <label for="biblical_passage" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.biblical_passage') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.biblical_passage" v-validate="''" id="biblical_passage" name="biblical_passage" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('biblical_passage')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('biblical_passage') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('homework'), 'has-success': fields.homework && fields.homework.valid }">
    <label for="homework" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.homework') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.homework" v-validate="''" id="homework" name="homework" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('homework')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('homework') }}</div>
    </div>
</div>
<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.lesson.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

