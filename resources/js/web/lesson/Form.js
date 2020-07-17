import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function () {
        return {
            form: {
                ph_class_id: '',
                facilitator_id: '',
                lesson_date: '',
                start_time: '',
                end_time: '',
                objective: '',
                activities: '',
                biblical_passage: '',
                homework: '',
                enabled: false,

            }
        }
    },
    mounted() {

    },
    methods: {}
}
