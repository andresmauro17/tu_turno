import Vue from "vue"
import swal from 'sweetalert2'

import KioskCardComponent from './KioskCardComponent'

const KioskComponent = Vue.component("kiosk-component",{
    components:{
        KioskCardComponent
    },
    props:[
        'services'
    ],
    data() {
        return {

        }
    },
    mounted:function(){
        console.log('hi from KioskComponent')
    },
    methods: {
       
    },
});

export default KioskComponent;