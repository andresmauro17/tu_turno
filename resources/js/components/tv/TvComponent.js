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
        "turnstotales",
    ],

    data() {
        return {
            modulesLocal: [],
            hours: '', 
            tTotales: 0,

            myNoti: false,
            colorNoty: '',
        }
    },

    updated() {
        if(this.tTotales >= 8){
            this.notifyTurns()
        }else{
            this.colorNoty = ''
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

        this.tTotales = this.turnstotales

        this.mySoundTurn = new Audio('./sound/turno.mp3')
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

        aumentarTurno: function(){
            this.tTotales++
        },

        reducirTurno: function(){
            this.tTotales--
        },

        notifyTurns: function(){
            if(this.myNoti == false){
                this.colorNoty = 'alert alert-danger'
                this.mySoundTurn.play() 
                this.myNoti = true

                setTimeout(() => {
                    this.myNoti = false
                } ,5000)
            }
        }
    },
});

export default TvComponent;