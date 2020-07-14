import { BaseForm } from 'craftable';

export default {
	mixins: [BaseForm],
    methods: {
        validateState(ref) {
            if (
                this.fields[ref] &&
                (this.fields[ref].dirty || this.fields[ref].validated)
            ) {
                return !this.errors.has(ref);
            }
            return null;
        },
        getPostData: function getPostData() {
            var _this3 = this;

            if (this.mediaCollections) {
                console.log(this.mediaCollections);
                this.mediaCollections.forEach(function (collection, index, arr) {
                    if (_this3.form[collection]) {
                        console.warn("MediaUploader warning: Media input must have a unique name, '" + collection + "' is already defined in regular inputs.");
                    }

                    if (_this3.$refs[collection + '_uploader']) {
                        _this3.form[collection] = _this3.$refs[collection + '_uploader'].getFiles();
                    }
                });
            }
            this.form['wysiwygMedia'] = this.wysiwygMedia;

            return this.form;
        },
        onSubmit() {
            let _this4 = this;

            return this.$validator.validateAll().then(function (result) {
                if (!result) {
                    _this4.$notify({
                        type: 'error',
                        title: 'Validation',
                        text: 'The form contains invalid fields.'
                    });
                    return false;
                }

                var data = _this4.form;
                if (!_this4.sendEmptyLocales) {
                    data = _.omit(_this4.form, _this4.locales.filter(function (locale) {
                        return _.isEmpty(_this4.form[locale]);
                    }));
                }

                _this4.submiting = true;

                axios.post(_this4.action, _this4.getPostData()).then(function (response) {
                    return _this4.onSuccess(response.data);
                }).catch(function (errors) {
                    return _this4.onFail(errors.response.data);
                });
            });
        },
    }
};
