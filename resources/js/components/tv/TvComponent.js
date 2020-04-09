import Vue from "vue"
import swal from 'sweetalert2'
import axios from '../../api'
import moment from 'moment'
moment.lang('es');

import TvModuleCardComponent from './TvModuleCardComponent'

const TvComponent = Vue.component("tv-component",{

    components:{
        TvModuleCardComponent
    },

    props:[
        "modules",
    ],

    data() {
        return {
            modulesLocal: [],
            hours: '', 
        }
    },

    mounted:function(){
        // console.log('hi from TvComponent')

        this.getHour();
        setInterval(() => {
            this.getHour()
        }, 1000),

        this.modulesLocal = this.modules;
        this.traerDatos();
        
    },

    methods: {

        getHour: function(){
            this.hours = moment().format('MMMM Do YYYY, h:mm:ss a')
        },

        traerDatos:function(){

        //    console.log('elecutar traerDatos')
           axios.get('tv/get-data').then(response => {
               this.modulesLocal = response.data
                // console.log(' esta es mi response')
                // console.log(response.data)
           });
           
       }
    },
});

export default TvComponent;