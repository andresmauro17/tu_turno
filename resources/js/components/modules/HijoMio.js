import Vue from "vue"
import swal from "sweetalert2"
import axios from "../../api/index"

const HijoMio = Vue.component("hijo-mio", {

    props:[
        "prophijo"
    ],

    data() {
        return {
           datahijo: "Soy el hijo de mi padre" 
        }
    },

    

});


export default HijoMio;