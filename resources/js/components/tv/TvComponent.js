import Vue from "vue"
import swal from 'sweetalert2'
import axios from '../../api'

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
        this.traerDatos();
    },
    methods: {
       traerDatos:function(){

           console.log('elecutar traerDatos')
           axios.get('tv/get-data').then(function(response){
                console.log(' esta es mi response')
                console.log(response.data)
           })
           
       }
    },
});

export default TvComponent;