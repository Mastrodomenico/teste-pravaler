import Vue from 'vue'
import VueTheMask from 'vue-the-mask'
import {mask} from 'vue-the-mask'
Vue.use(VueTheMask);

const app = new Vue({
    directives: {mask},
    el: '#app',
    data: {
        form:{
            status: form_status
        }
    },
    mounted() {
        // console.log('montei')
    }
});

