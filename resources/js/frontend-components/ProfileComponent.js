import ImageUtils from "../mixins/ImageUtils";
import AppListing from "../web/app-components/Listing/AppListing";

const ProfileComponent = {
    mixins: [AppListing, ImageUtils],
    props: [],
    data: function () {
        return {
            profile: {},
            loading: false,
            editing: null,
            pwdForm: {
                current_password: null,
                new_password: null,
                new_password_confirmation: null,
            }
        }
    },
    async mounted() {
        await this.fetchProfile();
    },
    methods: {
        editField(e,editing) {
            const vm = this;
            this.editing = editing;
            this.$nextTick(function() {
                if (vm.$refs[editing]) {
                    vm.$refs[editing].focus();
                }
            })
        },
        stopEditing(e=null) {
            this.editing = null;
        },
        updateProfile(e, field=null) {
            const vm = this;
            let data = {};
            if (field) {
                data[field] = this.profile[field];
            } else {
                data = {...this.profile};
            }
            return new Promise(((resolve, reject) => {
                vm.ajaxSubmit(`/api/profile`, data,'put').then(res => {
                    vm.$notify({
                        text: "Profile updated",
                        type: 'success'
                    });
                    resolve(res)
                }).catch(err => {
                    vm.$notify({
                        type: 'error',
                        text: err.response?.data?.message || err.message || err
                    })
                    reject(err)
                }).finally(res => {
                    vm.stopEditing();
                    vm.fetchProfile();
                });
            }))
        },
        async fetchProfile() {
            const vm = this;
            return new Promise(((resolve, reject) => {
                // let loading = vm.$loading.show();
                axios.get("/api/profile").then(res => {
                    vm.profile = {...res.data.payload};
                    resolve(res);
                }).catch(err => {
                    vm.profile = null;
                    reject(err);
                }).finally(res => {
                    // loading.hide();
                })
            }))
        },
        uploadCroppedAvatar({coordinates, canvas}) {
            const vm = this;
            let img = canvas.toDataURL();
            this.loading = true;
            this.uploadImage(img,`/api/profile/avatar`,'avatar').then(res => {
            this.$root.$emit("avatar-changed");
            }).finally(res => {
                vm.fetchProfile()
                this.loading = false;
            });
        },
        resetPwdForm() {
            this.pwdForm = {
                current_password: null,
                new_password: null,
                new_password_confirmation: null,
            };
        },
        onPasswordModalHidden() {
            this.resetPwdForm();
        },
        onPasswordModalShown() {
            const vm = this;
            this.$nextTick(function() {
                this.resetPwdForm();
                vm.$refs.currentPassword.focus();
            });
        },
        updatePassword() {
            const vm = this;
            vm.ajaxSubmit(`api/profile/password`,vm.pwdForm,'put').then(res => {
                vm.$refs.passwordModal.hide();
                vm.$notify({
                    type: "success",
                    text: "Password has been updated."
                })
            }).catch(err => {
                console.log(err);
            }).finally(res => {
                vm.resetPwdForm();
            })
        }
    }
}
export default ProfileComponent
