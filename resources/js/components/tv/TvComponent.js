import Vue from "vue"
import swal from 'sweetalert2'

import TvModuleCardComponent from './TvModuleCardComponent'

const TvComponent = Vue.component("tv-component",{
    components:{
        TvModuleCardComponent
    },
    props:[
    ],
    data() {
        return {

        }
    },
    mounted:function(){
        console.log('hi from TvComponent')
    },
    methods: {
       
    },
});

export default TvComponent;