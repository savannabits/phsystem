import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function() {
    return {
    form: {
    title:  '' ,
    description:  '' ,
    published_at:  '' ,
    enabled:  false ,
    uploaded_by:  '' ,
    
    }
    }
    },
    mounted() {

    },
    methods: {

    }
}
