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

        Vue.axios.post('api/kiosk/takeAturn',this.service).then((response) => {
            console.log(response.data)
            window.open("/imprimir");
        })
       }
    },
});

export default KioskCardComponent;