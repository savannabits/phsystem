import AppListing from '../web/app-components/Listing/AppListing';
import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'
export default {
    mixins: [AppListing],
    components: {VueCal},
    props: {
        "phClass": {
            required: true,
            type: Object
        }
    },
    data: function () {
        return {
            classForm: {},
            rollCalls: [],
            currentRollCall: null,
            enrollments: [],
            attendances: [],
            attendanceStatuses: []
        }
    },
    mounted() {
        const vm = this;
        this.classForm = {...this.phClass};
        this.$nextTick(function(){
            vm.fetchClassRollCalls();
            vm.fetchAttendanceStatuses();
        })
    },
    methods: {
        async fetchClassRollCalls(year = null) {
            const vm = this;
            return new Promise(((resolve, reject) => {
                axios.get(`/api/ph-classes/${vm.classForm.id}/roll-calls`,{
                    params: {
                        year: year
                    }
                }).then(res => {
                    vm.rollCalls = [...res.data.payload];
                    vm.fetchClassCurrentEnrollments().then(res => {
                        resolve(res);
                    }).catch(err => {
                        reject(err);
                    });
                }).catch(err => {
                    vm.rollCalls = [];
                    reject(err);
                });
            }));
        },
        async fetchRollCall(id) {
            const vm = this;
            return new Promise(((resolve, reject) => {
                axios.get(`/api/roll-calls/${id}`)
                    .then(res => {
                        vm.currentRollCall = res.data.payload;
                        resolve(res);
                    }).catch(err => {
                    vm.currentRollCall = null;
                    reject(err);
                });
            }));
        },
        async fetchAttendanceStatuses() {
            const vm = this;
            return new Promise(((resolve, reject) => {
                axios.get(`/api/attendance-statuses`)
                    .then(res => {
                        vm.attendanceStatuses = res.data.payload;
                        resolve(res);
                    }).catch(err => {
                    vm.attendanceStatuses = [];
                    reject(err);
                });
            }));
        },

        async fetchClassCurrentEnrollments() {
            const vm = this;
            return new Promise(((resolve, reject) => {
                axios.get(`/api/ph-classes/${vm.classForm.id}/current-enrollments`)
                    .then(res => {
                        vm.enrollments = [...res.data.payload];
                        resolve(res);
                    }).catch(err => {
                        vm.enrollments = [];
                        reject(err);
                    });
            }));
        },
        async createRollCall(date) {
            const vm = this;
            let loading  = vm.$loading.show();
            return new Promise(((resolve, reject) => {
                vm.ajaxSubmit(`/api/roll-calls`,{
                    ph_class: {id: vm.classForm.id},
                    date: date.format(),
                    description: `Roll Call for the class ${vm.classForm.name} for date ${date.format()}`
                }).then(res => {
                    resolve(res);
                }).catch(err => {
                    reject(err)
                }).finally(res => {
                    vm.fetchClassRollCalls(date.getFullYear())
                    loading.hide();
                })
            }));
        },
        showRollCall(rollCall) {
            const vm = this;
            vm.attendances = [];
            vm.fetchRollCall(rollCall.id).then(res => {
                //Prepare attendances
                let existingAttendances = vm.currentRollCall.attendances;
                vm.enrollments.forEach(enrollment => {
                    let attendance = existingAttendances.find(item => {
                        return item.enrollment_id ===enrollment.id;
                    });
                    if (!attendance) {
                        attendance = {
                            enrollment_id: enrollment.id,
                            enrollment: enrollment,
                            status: null,
                            roll_call_id: vm.currentRollCall.id,
                        }
                    }
                    vm.attendances.push(attendance);
                })
                vm.$refs.rollCallModal.show();
            }).catch(err => {
                vm.$notify({
                    type: "error",
                    text: err.response?.data?.messae || err.message || err
                })
            })
        },
        async markAttendance(status_id, attendance,key){
            const vm = this;
            return new Promise(((resolve, reject) => {
                let status = vm.attendanceStatuses.find(item => item.id===status_id);
                attendance.status = {...status};
                axios.post(`api/attendances`,attendance).then(res => {

                }).catch(err => {

                })
            }))
        }
    }
}
