<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.relative.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.relative.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('child_id'), 'has-success': fields.child_id && fields.child_id.valid }">
    <label for="child_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.relative.columns.child_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.child_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('child_id'), 'form-control-success': fields.child_id && fields.child_id.valid}" id="child_id" name="child_id" placeholder="{{ trans('admin.relative.columns.child_id') }}">
        <div v-if="errors.has('child_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('child_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('relationship_type_id'), 'has-success': fields.relationship_type_id && fields.relationship_type_id.valid }">
    <label for="relationship_type_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.relative.columns.relationship_type_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.relationship_type_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('relationship_type_id'), 'form-control-success': fields.relationship_type_id && fields.relationship_type_id.valid}" id="relationship_type_id" name="relationship_type_id" placeholder="{{ trans('admin.relative.columns.relationship_type_id') }}">
        <div v-if="errors.has('relationship_type_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('relationship_type_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('custom_relationship'), 'has-success': fields.custom_relationship && fields.custom_relationship.valid }">
    <label for="custom_relationship" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.relative.columns.custom_relationship') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.custom_relationship" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('custom_relationship'), 'form-control-success': fields.custom_relationship && fields.custom_relationship.valid}" id="custom_relationship" name="custom_relationship" placeholder="{{ trans('admin.relative.columns.custom_relationship') }}">
        <div v-if="errors.has('custom_relationship')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('custom_relationship') }}</div>
    </div>
</div>

