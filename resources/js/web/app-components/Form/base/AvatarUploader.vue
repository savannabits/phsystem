<template>
    <div class="avatar-uploader">
        <Cropper
            ref="cropper"
            classname="avatar-cropper"
            :src="image"
            :stencilProps="{
                  handlers: {},
                  movable: true,
                  scalable: true,
                  aspectRatio: 1,
            }"
        />
        <div class="button-wrapper">
            <span :disabled="loading" type="button" class="button danger" @click="$refs.file.click()">
				<input type="file" ref="file" @change="uploadImage($event)" accept="image/*">
				Browse Files
			</span>
            <button :disabled="loading" type="button" class="button success" @click="onCrop"><i class="fa fa-spinner fa-spin" v-if="loading"></i> CROP</button>
        </div>
    </div>
</template>

<script>
    import {Cropper} from "vue-advanced-cropper";
    export default {
        props: {
            initialAvatar: {
                type:String,
                default: null
            },
            loading: {
                type: Boolean,
                default: false
            }
        },
        name: "AvatarUploader",
        components: { Cropper },
        data() {
            return {
                image: null
            }
        },
        mounted() {
            if (this.initialAvatar) {
                this.image = this.initialAvatar;
            }
        },
        methods: {
            uploadImage(event) {
                // Reference to the DOM input element
                var input = event.target;
                // Ensure that you have a file before attempting to read it
                if (input.files && input.files[0]) {
                    // create a new FileReader to read this image and convert to base64 format
                    var reader = new FileReader();
                    // Define a callback function to run, when FileReader finishes its job
                    reader.onload = (e) => {
                        // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                        // Read image as base64 and set to imageData
                        this.image = e.target.result;
                    }
                    // Start the reader job - read file as a data url (base64 format)
                    reader.readAsDataURL(input.files[0]);
                }
            },
            onCrop() {
                const {coordinates, canvas} = this.$refs.cropper.getResult()
                // You able to do different manipulations at a canvas
                // but there we just get a cropped image
                this.image = canvas.toDataURL()
                this.$emit('crop',{coordinates, canvas});
            }
        }
    }
</script>

<style scoped>
    .avatar-uploader {
        margin-bottom: 10px;
    }
    .avatar-cropper {
        border: solid 1px #EEE;
        min-height: 300px;
        max-height: 800px;
        width: 100%;
    }

    .button-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 17px;
    }

    .button {
        color: white;
        font-size: 16px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background 0.5s;
    }
    .button.success {
        background: #3fb37f;
    }
    .button.danger {
        background: #b33f71;
    }
    .button.success:hover {
        background: #38d890;
    }
    .button.danger:hover {
        background: #d83858;
    }

    .button input {
        display: none;
    }
</style>
