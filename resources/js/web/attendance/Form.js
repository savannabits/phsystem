import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function() {
    return {
    form: {
    enrollment_id:  '' ,
    roll_call_id:  '' ,
    attendance_status_id:  '' ,
    comment:  '' ,
    
    }
    }
    },
    mounted() {

    },
    methods: {

    }
}
