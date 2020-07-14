import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function() {
    return {
    form: {
    code:  '' ,
    name:  '' ,
    description:  '' ,
    enabled:  false ,
    
    }
    }
    },
    mounted() {

    },
    methods: {

    }
}
