import AppForm from '../web/app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                email:  null ,
                username:  null ,
                first_name:  null ,
                middle_name:  null ,
                last_name:  null,
                password:  null,
                password_confirmation:  null ,
            }
        }
    },
    mounted() {

    },
    methods: {

    }
}
