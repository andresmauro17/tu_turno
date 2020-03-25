import Vue from "vue"
// ES6 Modules or TypeScript
import swal from 'sweetalert2'

const AtendingCardComponent = Vue.component("atending-card-component",{
    data() {
        return {
            currentTurn:"",
            turnState:"",
            turnTimeAtention:"",
            turnsWaiting:"",
            waitQueueTime:"",
            atendedTurns:"",
            averageTime:""

        }
    },
    mounted:function(){
        console.log('hi from AtendingCardComponent')
        // this.currentTurn="VA012"
        // this.turnState='en atencion'
        // this.turnTimeAtention="00:12:04"
        // this.turnsWaiting="4"
        // this.waitQueueTime="00:12:04"
        // this.atendedTurns="8"
        // this.averageTime="00:12:04"
    },
    methods: {
       nexTurn:()=>{
        console.log("nexTurn")
       },
       callAgain:()=>{
        console.log("callAgain")
       },
       atendTurn:()=>{
        console.log("atendTurn")
       },
       finishTurn:()=>{
        console.log("finishturn")
       },
       cancelTurn:()=>{
        console.log("cancelTurn")
       },
    },
});

export default AtendingCardComponent;