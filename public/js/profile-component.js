(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/profile-component"],{

/***/ "./resources/js/frontend-components/ProfileComponent.js":
/*!**************************************************************!*\
  !*** ./resources/js/frontend-components/ProfileComponent.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _mixins_ImageUtils__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../mixins/ImageUtils */ "./resources/js/mixins/ImageUtils.js");
/* harmony import */ var _web_app_components_Listing_AppListing__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../web/app-components/Listing/AppListing */ "./resources/js/web/app-components/Listing/AppListing.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }



var ProfileComponent = {
  mixins: [_web_app_components_Listing_AppListing__WEBPACK_IMPORTED_MODULE_2__["default"], _mixins_ImageUtils__WEBPACK_IMPORTED_MODULE_1__["default"]],
  props: [],
  data: function data() {
    return {
      profile: {},
      loading: false,
      editing: null,
      pwdForm: {
        current_password: null,
        new_password: null,
        new_password_confirmation: null
      }
    };
  },
  mounted: function mounted() {
    var _this = this;

    return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.next = 2;
              return _this.fetchProfile();

            case 2:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    }))();
  },
  methods: {
    editField: function editField(e, editing) {
      var vm = this;
      this.editing = editing;
      this.$nextTick(function () {
        if (vm.$refs[editing]) {
          vm.$refs[editing].focus();
        }
      });
    },
    stopEditing: function stopEditing() {
      var e = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      this.editing = null;
    },
    updateProfile: function updateProfile(e) {
      var field = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
      var vm = this;
      var data = {};

      if (field) {
        data[field] = this.profile[field];
      } else {
        data = _objectSpread({}, this.profile);
      }

      return new Promise(function (resolve, reject) {
        vm.ajaxSubmit("/api/profile", data, 'put').then(function (res) {
          vm.$notify({
            text: "Profile updated",
            type: 'success'
          });
          resolve(res);
        })["catch"](function (err) {
          var _err$response, _err$response$data;

          vm.$notify({
            type: 'error',
            text: ((_err$response = err.response) === null || _err$response === void 0 ? void 0 : (_err$response$data = _err$response.data) === null || _err$response$data === void 0 ? void 0 : _err$response$data.message) || err.message || err
          });
          reject(err);
        })["finally"](function (res) {
          vm.stopEditing();
          vm.fetchProfile();
        });
      });
    },
    fetchProfile: function fetchProfile() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                vm = _this2;
                return _context2.abrupt("return", new Promise(function (resolve, reject) {
                  // let loading = vm.$loading.show();
                  axios.get("/api/profile").then(function (res) {
                    vm.profile = _objectSpread({}, res.data.payload);
                    resolve(res);
                  })["catch"](function (err) {
                    vm.profile = null;
                    reject(err);
                  })["finally"](function (res) {// loading.hide();
                  });
                }));

              case 2:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    uploadCroppedAvatar: function uploadCroppedAvatar(_ref) {
      var _this3 = this;

      var coordinates = _ref.coordinates,
          canvas = _ref.canvas;
      var vm = this;
      var img = canvas.toDataURL();
      this.loading = true;
      this.uploadImage(img, "/api/profile/avatar", 'avatar').then(function (res) {
        _this3.$root.$emit("avatar-changed");
      })["finally"](function (res) {
        vm.fetchProfile();
        _this3.loading = false;
      });
    },
    resetPwdForm: function resetPwdForm() {
      this.pwdForm = {
        current_password: null,
        new_password: null,
        new_password_confirmation: null
      };
    },
    onPasswordModalHidden: function onPasswordModalHidden() {
      this.resetPwdForm();
    },
    onPasswordModalShown: function onPasswordModalShown() {
      var vm = this;
      this.$nextTick(function () {
        this.resetPwdForm();
        vm.$refs.currentPassword.focus();
      });
    },
    updatePassword: function updatePassword() {
      var vm = this;
      vm.ajaxSubmit("api/profile/password", vm.pwdForm, 'put').then(function (res) {
        vm.$refs.passwordModal.hide();
        vm.$notify({
          type: "success",
          text: "Password has been updated."
        });
      })["catch"](function (err) {
        console.log(err);
      })["finally"](function (res) {
        vm.resetPwdForm();
      });
    }
  }
};
/* harmony default export */ __webpack_exports__["default"] = (ProfileComponent);

/***/ }),

/***/ "./resources/js/mixins/ImageUtils.js":
/*!*******************************************!*\
  !*** ./resources/js/mixins/ImageUtils.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      loading: false
    };
  },
  methods: {
    uploadImage: function uploadImage(dataURL, endpoint) {
      var _arguments = arguments,
          _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var inputName, vm, form, config;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                inputName = _arguments.length > 2 && _arguments[2] !== undefined ? _arguments[2] : 'image';
                vm = _this;
                console.log("Beginning upload");
                form = new FormData();
                form.append(inputName, _this.dataURItoBlob(dataURL));
                config = {
                  headers: {
                    'content-type': 'multipart/form-data'
                  }
                };
                return _context.abrupt("return", new Promise(function (resolve, reject) {
                  axios.post(endpoint, form, config).then(function (res) {
                    resolve(res.data.payload);
                  })["catch"](function (err) {
                    reject(err.message || err);
                  });
                }));

              case 7:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    dataURItoBlob: function dataURItoBlob(dataURI) {
      // convert base64 to raw binary data held in a string
      // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
      var byteString = atob(dataURI.split(',')[1]); // separate out the mime component

      var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]; // write the bytes of the string to an ArrayBuffer

      var ab = new ArrayBuffer(byteString.length);
      var ia = new Uint8Array(ab);

      for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
      } //Old Code
      //write the ArrayBuffer to a blob, and you're done
      //var bb = new BlobBuilder();
      //bb.append(ab);
      //return bb.getBlob(mimeString);
      //New Code


      return new Blob([ab], {
        type: mimeString
      });
    }
  }
});

/***/ })

}]);