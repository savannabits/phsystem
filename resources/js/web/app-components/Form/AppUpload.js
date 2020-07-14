import BaseUpload from './base/BaseUpload';

Vue.component('media-upload', {
    mixins: [BaseUpload],
    props:["baseUrl"],
});
