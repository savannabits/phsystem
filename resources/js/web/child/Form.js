import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function() {
    return {
    form: {
    first_name:  '' ,
    middle_names:  '' ,
    last_name:  '' ,
    bio:  '' ,
    gender:  '' ,
    dob:  '' ,
    school:  '' ,
    hobbies:  '' ,
    location:  '' ,
    active:  false ,
    enrollment_date:  '' ,
    
    }
    }
    },
    mounted() {

    },
    methods: {

    }
}
