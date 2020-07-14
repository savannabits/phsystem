(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["lesson-form"],{

/***/ "./resources/js/web/lesson/Form.js":
/*!*****************************************!*\
  !*** ./resources/js/web/lesson/Form.js ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _app_components_Form_AppForm__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../app-components/Form/AppForm */ "./resources/js/web/app-components/Form/AppForm.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_app_components_Form_AppForm__WEBPACK_IMPORTED_MODULE_0__["default"]],
  props: [],
  data: function data() {
    return {
      form: {
        ph_class_id: '',
        facilitator_id: '',
        lesson_date: '',
        start_time: '',
        end_time: '',
        objective: '',
        activities: '',
        biblical_passage: '',
        homework: '',
        enabled: false
      }
    };
  },
  mounted: function mounted() {},
  methods: {}
});

/***/ })

}]);