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
            myNoti: false,
            noti: '',
            cont: 0
        }
    },

    mounted:function(){
        console.log('hi from TvModuleCardComponent')
        this.mySound = new Audio('./sound/timbre.mp3')

    },

    methods: {
        notification: function(){
            if(this.myNoti == false){
                this.noti = 'alert alert-warning'
                this.mySound.play()
                this.myNoti = true  

                this.cont++
                if(this.cont == 1){
                    setTimeout(() => {
                        this.notification()
                    } ,1500)
                    setTimeout(() => {
                        this.notification()
                    } ,2600)
                    setTimeout(() => {
                        this.notification()
                    } ,4000)
                }
                if(this.cont == 2){
                    this.cont = 0
                }
            }
            else {
                this.noti = ''
                this.myNoti = false
            }
            
        },
    },
});

export default TvModuleCardComponent;