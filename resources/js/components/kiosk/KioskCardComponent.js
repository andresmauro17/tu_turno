import Vue from "vue"
import swal from 'sweetalert2'
import api from '../../api'

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

        api.post('kiosk/takeAturn',this.service).then((response) => {
            console.log(response.data)
            window.open("/imprimir");
        })
       }
    },
});

export default KioskCardComponent;