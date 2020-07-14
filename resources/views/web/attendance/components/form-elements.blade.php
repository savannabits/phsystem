<div class="form-group row align-items-center" :class="{'has-danger': errors.has('enrollment_id'), 'has-success': fields.enrollment_id && fields.enrollment_id.valid }">
    <label for="enrollment_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.attendance.columns.enrollment_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.enrollment_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('enrollment_id'), 'form-control-success': fields.enrollment_id && fields.enrollment_id.valid}" id="enrollment_id" name="enrollment_id" placeholder="{{ trans('admin.attendance.columns.enrollment_id') }}">
        <div v-if="errors.has('enrollment_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enrollment_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('roll_call_id'), 'has-success': fields.roll_call_id && fields.roll_call_id.valid }">
    <label for="roll_call_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.attendance.columns.roll_call_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.roll_call_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('roll_call_id'), 'form-control-success': fields.roll_call_id && fields.roll_call_id.valid}" id="roll_call_id" name="roll_call_id" placeholder="{{ trans('admin.attendance.columns.roll_call_id') }}">
        <div v-if="errors.has('roll_call_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('roll_call_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('attendance_status_id'), 'has-success': fields.attendance_status_id && fields.attendance_status_id.valid }">
    <label for="attendance_status_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.attendance.columns.attendance_status_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.attendance_status_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('attendance_status_id'), 'form-control-success': fields.attendance_status_id && fields.attendance_status_id.valid}" id="attendance_status_id" name="attendance_status_id" placeholder="{{ trans('admin.attendance.columns.attendance_status_id') }}">
        <div v-if="errors.has('attendance_status_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('attendance_status_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('comment'), 'has-success': fields.comment && fields.comment.valid }">
    <label for="comment" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.attendance.columns.comment') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.comment" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('comment'), 'form-control-success': fields.comment && fields.comment.valid}" id="comment" name="comment" placeholder="{{ trans('admin.attendance.columns.comment') }}">
        <div v-if="errors.has('comment')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comment') }}</div>
    </div>
</div>

