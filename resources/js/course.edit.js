import Vue from 'vue'
import VueTheMask from 'vue-the-mask'
import {mask} from 'vue-the-mask'
Vue.use(VueTheMask);

const app = new Vue({
    directives: {mask},
    el: '#app',
    data:{
        form:{
            duration_week: duration_week,
            institution_id: institution_id,
            status: status
        }
    },
    mounted() {
        // console.log('montei')
    }
});

