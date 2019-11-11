import Vue from 'vue'
import VueTheMask from 'vue-the-mask'
import {mask} from 'vue-the-mask'
Vue.use(VueTheMask);

const app = new Vue({
    directives: {mask},
    el: '#appStudent',
    data: {
        form: {
            course_id: form_course_id,
            status: form_status,
            uf: form_uf
        }
    },
    mounted() {
        // console.log('montei')
    }
});

