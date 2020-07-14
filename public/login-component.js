(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["login-component"],{

/***/ "./resources/js/frontend-components/LoginComponent.js":
/*!************************************************************!*\
  !*** ./resources/js/frontend-components/LoginComponent.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _web_app_components_Form_AppForm__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../web/app-components/Form/AppForm */ "./resources/js/web/app-components/Form/AppForm.js");

var LoginComponent = {
  mixins: [_web_app_components_Form_AppForm__WEBPACK_IMPORTED_MODULE_0__["default"]],
  props: [],
  data: function data() {
    return {
      form: {
        email: "",
        password: "",
        remember: false
      }
    };
  },
  mounted: function mounted() {},
  methods: {
    login: function login() {
      var _this4 = this;

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
        })["catch"](function (errors) {
          return _this4.onFail(errors.response.data);
        });
      });
    }
  }
};
/* harmony default export */ __webpack_exports__["default"] = (LoginComponent);

/***/ })

}]);