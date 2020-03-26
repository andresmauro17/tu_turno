import Vue from "vue"
import swal from 'sweetalert2'

const KioskCardComponent = Vue.component("kiosk-card-component",{
    props:[
        'service'
    ],
    data() {
        return {

        }
    },
    mounted:function(){
        console.log('hi from KioskCardComponent')
    },
    methods: {
       takeAturn(){
        console.log('hi from takeAturn')
       }
    },
});

export default KioskCardComponent;