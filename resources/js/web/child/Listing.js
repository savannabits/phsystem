import AppListing from '../app-components/Listing/AppListing';
import ImageUtils from "../../mixins/ImageUtils";
export default {
    mixins: [AppListing, ImageUtils],
    data() {
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
                relatives: [],
            },
            relativeData: {
                user: null,
                relationship_type: null,
                custom_relationship: null
            },
            usersRepo: {data:[]},
            relationshipTypes: []
        };
    },
    mounted() {
        this.fetchUsers();
        this.fetchRelationshipTypes();
    },
    methods: {
        resetForm() {
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
                relatives: [],
            };
        },
        uploadCroppedAvatar({coordinates, canvas}) {
            const vm = this;
            let img = canvas.toDataURL();
            // this.$refs.avatarThumb.src = img;
            this.loading = true;
            this.uploadImage(img,`/api/children/${vm.form.id}/avatar`,'avatar').then(res => {
                // this.$root.$emit("avatar-changed");
            }).finally(res => {
                vm.fetchChild(vm.form.id)
                this.loading = false;
            });
            // this.form.avatar[0].path ="";
        },
        showChildCreateModal() {
            const vm = this;
            vm.resetForm();
            vm.$nextTick(function() {
                vm.$refs.childCreateModal.show();
            })
        },

        showChildEditModal(e, item) {
            const vm = this;
            vm.fetchChild(item.id).then(res => {
                vm.$refs.childCreateModal.show();
            })
        },

        onChildCreateModalShown() {

        },
        onChildCreateModalHidden() {
            const vm = this;
            vm.resetForm();
        },
        addRelative() {
            let relative = {
                user: null,
                relationship_type: null,
                custom_relationship: null
            };
            this.form.relatives.push(relative);
        },
        removeRelative(e, relative, index) {
            let vm = this;
            let loading = vm.$loading.show();
            if (relative.id) {
                // Call server to remove
                axios.delete(`/api/relatives/${relative.id}`).then(res => {
                    vm.$notify({
                        type: "success",
                        title: "Relative deleted",
                        text: res.data.message
                    });
                }).catch(err => {
                    vm.$notify({
                        type: "error",
                        title: "ERROR",
                        text: err.response?.data?.message || err.message || err
                    })
                }).finally(res => {
                    if (vm.form.id) {
                        vm.fetchChild(vm.form.id)
                    }
                    loading.hide();
                });
            } else {
                vm.form.relatives.splice(index,1);
                loading.hide();
            }
        },
        async fetchChild(id) {
            const vm = this;
            return new Promise(((resolve, reject) => {
                axios.get(`/api/children/${id}`).then(res => {
                    vm.form = {...res.data.payload};
                    resolve(res);
                }).catch(err => {
                    vm.resetForm();
                    vm.$notify({
                        title: "Server Error",
                        type: "error",
                        text: err.response?.data?.message || err.message || err
                    })
                    reject(err);
                })
            }));
        },
        async fetchRelationshipTypes() {
            const vm = this;
            return new Promise(((resolve, reject) => {
                axios.get(`/api/relationship-types`).then(res => {
                    vm.relationshipTypes = res.data.payload;
                    resolve(res);
                }).catch(err => {
                    vm.relationshipTypes = []
                    reject(err);
                })
            }));
        },
        async fetchUsers(query=null) {
            const vm = this;
            let nextPage = vm.usersRepo.current_page ? vm.usersRepo.current_page+1 : 1;
            return new Promise(((resolve, reject) => {
                if (vm.usersRepo.current_page && !vm.usersRepo.next_page_url) {
                    resolve(false);
                }
                let params = {}
                if (query && query.length) {
                    params.search = query;
                    params.page = 1
                } else {
                    params.page = nextPage;
                }
                axios.get(`/api/users`, {
                    params: params
                }).then(res => {
                    if (!query) {
                        let data = [...vm.usersRepo.data,...res.data.payload.data];
                        vm.usersRepo = {...res.data.payload};
                        vm.usersRepo.data = data;
                    } else {
                        vm.usersRepo = {...res.data.payload};
                    }
                    resolve(res);
                }).catch(err => {
                    vm.usersRepo = {data:[]};
                    reject(err);
                })
            }));
        },
        submitChildForm() {
            const vm = this;
            let loader = vm.$loading.show();
            if (vm.form.id) {
                //Update
                vm.ajaxSubmit(`/api/children/${vm.form.id}`,vm.form,'put')
                    .then(res => {
                        vm.$notify({
                            title: "SUCCESS",
                            type: 'success',
                            text: res.data.message
                        })
                    })
                    .catch(err => {
                        vm.$notify({
                            title: "ERROR",
                            type: "error",
                            text: err.response?.data?.message || err.message || err
                        })
                    })
                    .finally(res => {
                        vm.fetchChild(vm.form.id)
                        vm.loadData();
                        loader.hide();
                    });
            } else {
                // Create
                vm.ajaxSubmit(`/api/children`,vm.form,'post')
                    .then(res => {
                        vm.$notify({
                            title: "SUCCESS",
                            type: 'success',
                            text: res.data.message
                        })
                    })
                    .catch(err => {
                        vm.$notify({
                            title: "ERROR",
                            type: "error",
                            text: err.response?.data?.message || err.message || err
                        })
                    })
                    .finally(res => {
                        vm.loadData()
                        loader.hide();
                    });
            }
        },

    }
}
