(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["child-form"],{

/***/ "./resources/js/web/child/Form.js":
/*!****************************************!*\
  !*** ./resources/js/web/child/Form.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _app_components_Form_AppForm__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../app-components/Form/AppForm */ "./resources/js/web/app-components/Form/AppForm.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }


/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_app_components_Form_AppForm__WEBPACK_IMPORTED_MODULE_1__["default"]],
  props: [],
  data: function data() {
    return {
      loading: false,
      form: {
        first_name: '',
        middle_names: '',
        last_name: '',
        bio: '',
        gender: '',
        dob: '',
        school: '',
        hobbies: [],
        location: '',
        active: false,
        enrollment_date: '',
        avatar: [{
          id: 1,
          'collection_name': 'avatar',
          'path': null,
          'action': 'add'
        }]
      }
    };
  },
  mounted: function mounted() {
    console.log(this.form);
  },
  methods: {
    onAvatarCropped: function onAvatarCropped(_ref) {
      var _this = this;

      var coordinates = _ref.coordinates,
          canvas = _ref.canvas;
      var img = canvas.toDataURL(); // this.$refs.avatarThumb.src = img;

      console.log("uploading");
      this.loading = true;
      this.uploadImage(img).then(function (res) {
        _this.$root.$emit("avatar-changed");
      })["finally"](function (res) {
        _this.loading = false;
      }); // this.form.avatar[0].path ="";
    },
    uploadImage: function uploadImage(dataURL) {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var vm, form, config;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                vm = _this2;
                console.log("Beginning upload");
                form = new FormData();
                form.append("avatar", _this2.dataURItoBlob(dataURL));
                config = {
                  headers: {
                    'content-type': 'multipart/form-data'
                  }
                };
                return _context.abrupt("return", new Promise(function (resolve, reject) {
                  axios.post("/api/avatars/".concat(vm.form.id, "/upload"), form, config).then(function (res) {
                    resolve(res.data.payload);
                  })["catch"](function (err) {
                    reject(err.message || err);
                  });
                }));

              case 6:
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