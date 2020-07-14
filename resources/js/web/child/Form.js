import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function () {
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
                    'action': 'add',
                }]
            },
        }
    },
    mounted() {
        console.log(this.form);
    },
    methods: {
        onAvatarCropped({coordinates, canvas}) {
            let img = canvas.toDataURL();
            // this.$refs.avatarThumb.src = img;
            console.log("uploading");
            this.loading = true;
            this.uploadImage(img).then(res => {
                this.$root.$emit("avatar-changed");
            }).finally(res => {
                this.loading = false;
            });
            // this.form.avatar[0].path ="";
        },
        async uploadImage(dataURL) {
            const vm = this;
            console.log("Beginning upload")
            let form = new FormData();
            form.append("avatar",this.dataURItoBlob(dataURL));
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            return new Promise((resolve, reject) => {
                axios.post(`/api/avatars/${vm.form.id}/upload`,form,config).then(res => {
                    resolve(res.data.payload);
                }).catch(err => {
                    reject(err.message || err);
                })
            })
        },
        dataURItoBlob(dataURI) {
            // convert base64 to raw binary data held in a string
            // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
            var byteString = atob(dataURI.split(',')[1]);

            // separate out the mime component
            var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

            // write the bytes of the string to an ArrayBuffer
            var ab = new ArrayBuffer(byteString.length);
            var ia = new Uint8Array(ab);
            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }

            //Old Code
            //write the ArrayBuffer to a blob, and you're done
            //var bb = new BlobBuilder();
            //bb.append(ab);
            //return bb.getBlob(mimeString);

            //New Code
            return new Blob([ab], {type: mimeString});
        }
    }
}
