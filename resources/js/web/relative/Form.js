import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function() {
    return {
    form: {
    user_id:  '' ,
    child_id:  '' ,
    relationship_type_id:  '' ,
    custom_relationship:  '' ,
    
    }
    }
    },
    mounted() {

    },
    methods: {

    }
}
