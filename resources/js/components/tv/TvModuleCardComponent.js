import Vue from "vue"
import swal from 'sweetalert2'

// import KioskCardComponent from './KioskCardComponent'

const TvModuleCardComponent = Vue.component("tv-module-card-component",{
    components:{
        // KioskCardComponent
    },
    props:[
    ],
    data() {
        return {

        }
    },
    mounted:function(){
        console.log('hi from TvModuleCardComponent')
    },
    methods: {
       
    },
});

export default TvModuleCardComponent;