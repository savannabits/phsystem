import AppForm from "../web/app-components/Form/AppForm";

const HeaderComponent = {
    mixins: [AppForm],
    props: [],
    data: function () {
        return {
            form: {
            }
        }
    },
    mounted() {
        console.log("header component mounted")
    },
    methods: {
        async logout() {
            let vm = this;
            return new Promise(((resolve, reject) => {
                axios.post('logout').then(res => {
                    vm.$notify("Logout success");
                    location.reload();
                    resolve(true);
                },err => {
                    console.err(err);
                    reject(err);
                })
            }))
        }
    }
}
export default HeaderComponent
