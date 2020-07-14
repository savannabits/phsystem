<div class="form-group row align-items-center" :class="{'has-danger': errors.has('child_id'), 'has-success': fields.child_id && fields.child_id.valid }">
    <label for="child_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.enrollment.columns.child_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.child_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('child_id'), 'form-control-success': fields.child_id && fields.child_id.valid}" id="child_id" name="child_id" placeholder="{{ trans('admin.enrollment.columns.child_id') }}">
        <div v-if="errors.has('child_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('child_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ph_class_id'), 'has-success': fields.ph_class_id && fields.ph_class_id.valid }">
    <label for="ph_class_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.enrollment.columns.ph_class_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ph_class_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ph_class_id'), 'form-control-success': fields.ph_class_id && fields.ph_class_id.valid}" id="ph_class_id" name="ph_class_id" placeholder="{{ trans('admin.enrollment.columns.ph_class_id') }}">
        <div v-if="errors.has('ph_class_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ph_class_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('enrollment_date'), 'has-success': fields.enrollment_date && fields.enrollment_date.valid }">
    <label for="enrollment_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.enrollment.columns.enrollment_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.enrollment_date" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('enrollment_date'), 'form-control-success': fields.enrollment_date && fields.enrollment_date.valid}" id="enrollment_date" name="enrollment_date" placeholder="{{ trans('savannabits/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('enrollment_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enrollment_date') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('graduation_date'), 'has-success': fields.graduation_date && fields.graduation_date.valid }">
    <label for="graduation_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.enrollment.columns.graduation_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.graduation_date" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('graduation_date'), 'form-control-success': fields.graduation_date && fields.graduation_date.valid}" id="graduation_date" name="graduation_date" placeholder="{{ trans('savannabits/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('graduation_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('graduation_date') }}</div>
    </div>
</div>

