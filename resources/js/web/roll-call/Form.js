import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function() {
    return {
    form: {
    date:  '' ,
    ph_class_id:  '' ,
    created_by:  '' ,
    description:  '' ,
    
    }
    }
    },
    mounted() {

    },
    methods: {

    }
}
