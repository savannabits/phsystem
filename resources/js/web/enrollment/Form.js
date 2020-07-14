import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function () {
        return {
            form: {
                child_id: null,
                ph_class_id: null,
                enrollment_date: null
            }
        }
    },
    mounted() {

    },
    methods: {}
}
