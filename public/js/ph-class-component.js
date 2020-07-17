(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/ph-class-component"],{

/***/ "./resources/js/frontend-components/PhClassComponent.js":
/*!**************************************************************!*\
  !*** ./resources/js/frontend-components/PhClassComponent.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _web_app_components_Listing_AppListing__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../web/app-components/Listing/AppListing */ "./resources/js/web/app-components/Listing/AppListing.js");
/* harmony import */ var vue_cal__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-cal */ "./node_modules/vue-cal/dist/vuecal.common.js");
/* harmony import */ var vue_cal__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_cal__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var vue_cal_dist_vuecal_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-cal/dist/vuecal.css */ "./node_modules/vue-cal/dist/vuecal.css");
/* harmony import */ var vue_cal_dist_vuecal_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(vue_cal_dist_vuecal_css__WEBPACK_IMPORTED_MODULE_3__);


function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }




/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_web_app_components_Listing_AppListing__WEBPACK_IMPORTED_MODULE_1__["default"]],
  components: {
    VueCal: vue_cal__WEBPACK_IMPORTED_MODULE_2___default.a
  },
  props: {
    "phClass": {
      required: true,
      type: Object
    }
  },
  data: function data() {
    return {
      classForm: {},
      rollCalls: [],
      currentRollCall: null,
      enrollments: [],
      attendances: [],
      attendanceStatuses: []
    };
  },
  mounted: function mounted() {
    var vm = this;
    this.classForm = _objectSpread({}, this.phClass);
    this.$nextTick(function () {
      vm.fetchClassRollCalls();
      vm.fetchAttendanceStatuses();
    });
  },
  methods: {
    fetchClassRollCalls: function fetchClassRollCalls() {
      var _arguments = arguments,
          _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var year, vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                year = _arguments.length > 0 && _arguments[0] !== undefined ? _arguments[0] : null;
                vm = _this;
                return _context.abrupt("return", new Promise(function (resolve, reject) {
                  axios.get("/api/ph-classes/".concat(vm.classForm.id, "/roll-calls"), {
                    params: {
                      year: year
                    }
                  }).then(function (res) {
                    vm.rollCalls = _toConsumableArray(res.data.payload);
                    vm.fetchClassCurrentEnrollments().then(function (res) {
                      resolve(res);
                    })["catch"](function (err) {
                      reject(err);
                    });
                  })["catch"](function (err) {
                    vm.rollCalls = [];
                    reject(err);
                  });
                }));

              case 3:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    fetchRollCall: function fetchRollCall(id) {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                vm = _this2;
                return _context2.abrupt("return", new Promise(function (resolve, reject) {
                  axios.get("/api/roll-calls/".concat(id)).then(function (res) {
                    vm.currentRollCall = res.data.payload;
                    resolve(res);
                  })["catch"](function (err) {
                    vm.currentRollCall = null;
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
    fetchAttendanceStatuses: function fetchAttendanceStatuses() {
      var _this3 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        var vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                vm = _this3;
                return _context3.abrupt("return", new Promise(function (resolve, reject) {
                  axios.get("/api/attendance-statuses").then(function (res) {
                    vm.attendanceStatuses = res.data.payload;
                    resolve(res);
                  })["catch"](function (err) {
                    vm.attendanceStatuses = [];
                    reject(err);
                  });
                }));

              case 2:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3);
      }))();
    },
    fetchClassCurrentEnrollments: function fetchClassCurrentEnrollments() {
      var _this4 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4() {
        var vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                vm = _this4;
                return _context4.abrupt("return", new Promise(function (resolve, reject) {
                  axios.get("/api/ph-classes/".concat(vm.classForm.id, "/current-enrollments")).then(function (res) {
                    vm.enrollments = _toConsumableArray(res.data.payload);
                    resolve(res);
                  })["catch"](function (err) {
                    vm.enrollments = [];
                    reject(err);
                  });
                }));

              case 2:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4);
      }))();
    },
    createRollCall: function createRollCall(date) {
      var _this5 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee5() {
        var vm, loading;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee5$(_context5) {
          while (1) {
            switch (_context5.prev = _context5.next) {
              case 0:
                vm = _this5;
                loading = vm.$loading.show();
                return _context5.abrupt("return", new Promise(function (resolve, reject) {
                  vm.ajaxSubmit("/api/roll-calls", {
                    ph_class: {
                      id: vm.classForm.id
                    },
                    date: date.format(),
                    description: "Roll Call for the class ".concat(vm.classForm.name, " for date ").concat(date.format())
                  }).then(function (res) {
                    resolve(res);
                  })["catch"](function (err) {
                    reject(err);
                  })["finally"](function (res) {
                    vm.fetchClassRollCalls(date.getFullYear());
                    loading.hide();
                  });
                }));

              case 3:
              case "end":
                return _context5.stop();
            }
          }
        }, _callee5);
      }))();
    },
    showRollCall: function showRollCall(rollCall) {
      var vm = this;
      vm.attendances = [];
      vm.fetchRollCall(rollCall.id).then(function (res) {
        //Prepare attendances
        var existingAttendances = vm.currentRollCall.attendances;
        vm.enrollments.forEach(function (enrollment) {
          var attendance = existingAttendances.find(function (item) {
            return item.enrollment_id === enrollment.id;
          });

          if (!attendance) {
            attendance = {
              enrollment_id: enrollment.id,
              enrollment: enrollment,
              status: null,
              roll_call_id: vm.currentRollCall.id
            };
          }

          vm.attendances.push(attendance);
        });
        vm.$refs.rollCallModal.show();
      })["catch"](function (err) {
        var _err$response, _err$response$data;

        vm.$notify({
          type: "error",
          text: ((_err$response = err.response) === null || _err$response === void 0 ? void 0 : (_err$response$data = _err$response.data) === null || _err$response$data === void 0 ? void 0 : _err$response$data.messae) || err.message || err
        });
      });
    },
    markAttendance: function markAttendance(status_id, attendance, key) {
      var _this6 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee6() {
        var vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee6$(_context6) {
          while (1) {
            switch (_context6.prev = _context6.next) {
              case 0:
                vm = _this6;
                return _context6.abrupt("return", new Promise(function (resolve, reject) {
                  var status = vm.attendanceStatuses.find(function (item) {
                    return item.id === status_id;
                  });
                  attendance.status = _objectSpread({}, status);
                  axios.post("api/attendances", attendance).then(function (res) {})["catch"](function (err) {});
                }));

              case 2:
              case "end":
                return _context6.stop();
            }
          }
        }, _callee6);
      }))();
    }
  }
});

/***/ })

}]);