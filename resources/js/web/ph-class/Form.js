import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function() {
    return {
    form: {
    slug:  '' ,
    name:  '' ,
    minimum_age:  '' ,
    maximum_age:  '' ,
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
