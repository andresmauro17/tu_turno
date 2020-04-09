import Vue from "vue"
import swal from 'sweetalert2'

// import KioskCardComponent from './KioskCardComponent'

const TvModuleCardComponent = Vue.component("tv-module-card-component",{

    components:{
        // KioskCardComponent
    },

    props:[
        "module"
    ],

    data() {
        return {
            noti: ''
        }
    },

    mounted:function(){
        console.log('hi from TvModuleCardComponent')
    },

    methods: {
        notification: function(){
            if(!this.noti){
                this.noti = 'alert alert-warning'
            }else this.noti = ''
             
        },
    },
});

export default TvModuleCardComponent;