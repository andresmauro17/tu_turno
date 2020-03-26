import Vue from "vue"
import swal from 'sweetalert2'

const KioskCardComponent = Vue.component("kiosk-card-component",{
    props:[
    ],
    data() {
        return {

        }
    },
    mounted:function(){
        console.log('hi from KioskCardComponent')
    },
    methods: {
       
    },
});

export default KioskCardComponent;