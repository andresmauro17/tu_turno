import Vue from "vue"
import swal from 'sweetalert2'
import axios from '../../api'
import moment from 'moment'
moment.locale('es');

import TvModuleCardComponent from './TvModuleCardComponent'

const TvComponent = Vue.component("tv-component",{

    components:{
        TvModuleCardComponent
    },

    props:[
        "modules",
        "services",
        "turnstotales"
    ],

    data() {
        return {
            modulesLocal: [],
            hours: '', 
        }
    },

    mounted:function(){
        // console.log('hi from TvComponent')
        let widthSize = document.getElementById("video-iframe").offsetWidth;
        document.getElementById("video-iframe").style.height = `${widthSize*0.6}px`;
        this.getHour();
        setInterval(() => {
            this.getHour()
        }, 1000),

        this.modulesLocal = this.modules;
        this.traerDatos();
        
    },

    updated() {
        if (this.turnstotales === 10) {
            this.showNotification('top','left')
        }
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
        },

        showNotification: function(from, align) {
            let type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];
        
            let color = Math.floor((Math.random() * 6) + 1);
        
            $.notify({
              icon: "add_alert",
              message: "Cantidad Maxima De Turnos"
        
            },{
                type: type[color],
                timer: 3000,
                placement: {
                from: from,
                align: align
                }
            });
        },
    },
});

export default TvComponent;