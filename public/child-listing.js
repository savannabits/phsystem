(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["child-listing"],{

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

/***/ }),

/***/ "./resources/js/web/child/Listing.js":
/*!*******************************************!*\
  !*** ./resources/js/web/child/Listing.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _app_components_Listing_AppListing__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../app-components/Listing/AppListing */ "./resources/js/web/app-components/Listing/AppListing.js");
/* harmony import */ var _mixins_ImageUtils__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../mixins/ImageUtils */ "./resources/js/mixins/ImageUtils.js");


function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }



/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_app_components_Listing_AppListing__WEBPACK_IMPORTED_MODULE_1__["default"], _mixins_ImageUtils__WEBPACK_IMPORTED_MODULE_2__["default"]],
  data: function data() {
    return {
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
        relatives: []
      },
      relativeData: {
        user: null,
        relationship_type: null,
        custom_relationship: null
      },
      usersRepo: {
        data: []
      },
      relationshipTypes: []
    };
  },
  mounted: function mounted() {
    this.fetchUsers();
    this.fetchRelationshipTypes();
  },
  methods: {
    resetForm: function resetForm() {
      this.form = {
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
        relatives: []
      };
    },
    uploadCroppedAvatar: function uploadCroppedAvatar(_ref) {
      var _this = this;

      var coordinates = _ref.coordinates,
          canvas = _ref.canvas;
      var vm = this;
      var img = canvas.toDataURL(); // this.$refs.avatarThumb.src = img;

      this.loading = true;
      this.uploadImage(img, "/api/children/".concat(vm.form.id, "/avatar"), 'avatar').then(function (res) {// this.$root.$emit("avatar-changed");
      })["finally"](function (res) {
        vm.fetchChild(vm.form.id);
        _this.loading = false;
      }); // this.form.avatar[0].path ="";
    },
    showChildCreateModal: function showChildCreateModal() {
      var vm = this;
      vm.resetForm();
      vm.$nextTick(function () {
        vm.$refs.childCreateModal.show();
      });
    },
    showChildEditModal: function showChildEditModal(e, item) {
      var vm = this;
      vm.fetchChild(item.id).then(function (res) {
        vm.$refs.childCreateModal.show();
      });
    },
    onChildCreateModalShown: function onChildCreateModalShown() {},
    onChildCreateModalHidden: function onChildCreateModalHidden() {
      var vm = this;
      vm.resetForm();
    },
    addRelative: function addRelative() {
      var relative = {
        user: null,
        relationship_type: null,
        custom_relationship: null
      };
      this.form.relatives.push(relative);
    },
    removeRelative: function removeRelative(e, relative, index) {
      var vm = this;
      var loading = vm.$loading.show();

      if (relative.id) {
        // Call server to remove
        axios["delete"]("/api/relatives/".concat(relative.id)).then(function (res) {
          vm.$notify({
            type: "success",
            title: "Relative deleted",
            text: res.data.message
          });
        })["catch"](function (err) {
          var _err$response, _err$response$data;

          vm.$notify({
            type: "error",
            title: "ERROR",
            text: ((_err$response = err.response) === null || _err$response === void 0 ? void 0 : (_err$response$data = _err$response.data) === null || _err$response$data === void 0 ? void 0 : _err$response$data.message) || err.message || err
          });
        })["finally"](function (res) {
          if (vm.form.id) {
            vm.fetchChild(vm.form.id);
          }

          loading.hide();
        });
      } else {
        vm.form.relatives.splice(index, 1);
        loading.hide();
      }
    },
    fetchChild: function fetchChild(id) {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                vm = _this2;
                return _context.abrupt("return", new Promise(function (resolve, reject) {
                  axios.get("/api/children/".concat(id)).then(function (res) {
                    vm.form = _objectSpread({}, res.data.payload);
                    resolve(res);
                  })["catch"](function (err) {
                    var _err$response2, _err$response2$data;

                    vm.resetForm();
                    vm.$notify({
                      title: "Server Error",
                      type: "error",
                      text: ((_err$response2 = err.response) === null || _err$response2 === void 0 ? void 0 : (_err$response2$data = _err$response2.data) === null || _err$response2$data === void 0 ? void 0 : _err$response2$data.message) || err.message || err
                    });
                    reject(err);
                  });
                }));

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    fetchRelationshipTypes: function fetchRelationshipTypes() {
      var _this3 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                vm = _this3;
                return _context2.abrupt("return", new Promise(function (resolve, reject) {
                  axios.get("/api/relationship-types").then(function (res) {
                    vm.relationshipTypes = res.data.payload;
                    resolve(res);
                  })["catch"](function (err) {
                    vm.relationshipTypes = [];
                    reject(err);
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
    fetchUsers: function fetchUsers() {
      var _arguments = arguments,
          _this4 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        var query, vm, nextPage;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                query = _arguments.length > 0 && _arguments[0] !== undefined ? _arguments[0] : null;
                vm = _this4;
                nextPage = vm.usersRepo.current_page ? vm.usersRepo.current_page + 1 : 1;
                return _context3.abrupt("return", new Promise(function (resolve, reject) {
                  if (vm.usersRepo.current_page && !vm.usersRepo.next_page_url) {
                    resolve(false);
                  }

                  var params = {};

                  if (query && query.length) {
                    params.search = query;
                    params.page = 1;
                  } else {
                    params.page = nextPage;
                  }

                  axios.get("/api/users", {
                    params: params
                  }).then(function (res) {
                    if (!query) {
                      var data = [].concat(_toConsumableArray(vm.usersRepo.data), _toConsumableArray(res.data.payload.data));
                      vm.usersRepo = _objectSpread({}, res.data.payload);
                      vm.usersRepo.data = data;
                    } else {
                      vm.usersRepo = _objectSpread({}, res.data.payload);
                    }

                    resolve(res);
                  })["catch"](function (err) {
                    vm.usersRepo = {
                      data: []
                    };
                    reject(err);
                  });
                }));

              case 4:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3);
      }))();
    },
    submitChildForm: function submitChildForm() {
      var vm = this;
      var loader = vm.$loading.show();

      if (vm.form.id) {
        //Update
        vm.ajaxSubmit("/api/children/".concat(vm.form.id), vm.form, 'put').then(function (res) {
          vm.$notify({
            title: "SUCCESS",
            type: 'success',
            text: res.data.message
          });
        })["catch"](function (err) {
          var _err$response3, _err$response3$data;

          vm.$notify({
            title: "ERROR",
            type: "error",
            text: ((_err$response3 = err.response) === null || _err$response3 === void 0 ? void 0 : (_err$response3$data = _err$response3.data) === null || _err$response3$data === void 0 ? void 0 : _err$response3$data.message) || err.message || err
          });
        })["finally"](function (res) {
          vm.fetchChild(vm.form.id);
          vm.loadData();
          loader.hide();
        });
      } else {
        // Create
        vm.ajaxSubmit("/api/children", vm.form, 'post').then(function (res) {
          vm.$notify({
            title: "SUCCESS",
            type: 'success',
            text: res.data.message
          });
        })["catch"](function (err) {
          var _err$response4, _err$response4$data;

          vm.$notify({
            title: "ERROR",
            type: "error",
            text: ((_err$response4 = err.response) === null || _err$response4 === void 0 ? void 0 : (_err$response4$data = _err$response4.data) === null || _err$response4$data === void 0 ? void 0 : _err$response4$data.message) || err.message || err
          });
        })["finally"](function (res) {
          vm.loadData();
          loader.hide();
        });
      }
    }
  }
});

/***/ })

}]);