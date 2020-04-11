import Vue from "vue"
import swal from 'sweetalert2'
import moment from 'moment'

import api from "../../api";

const AtendingCardComponent = Vue.component("atending-card-component",{
    props:[
        'atendingData',
        'userModule',
        'currentDiligence'
    ],
    data() {
        return {
            currentTurnObject:{},
            currentTurn:"",
            turnState:"",
            turnTimeAtentionMills:"",
            turnTimeAtention:"",
            turnsWaiting:"",
            waitQueueTime:"",
            waitQueueTimeMills:"",
            atendedTurns:"",
            averageTime:""

        }
    },
    mounted:function(){
        this.setData()
        setInterval(() => {
            this.incrementWaitQueueTime()
            this.incrementTurnTimeAtention()
        }, 1000)
    },
    watch: {
        atendingData: function (newData, oldData) {
          this.setData(newData.turns)
        }
      },
    methods: {
        setData(turns){
            let turnsWaiting = 0
            let turnsAtended = 0
            let firstQueueTurnCreatedAt = ""
            let time_atention = ""
            this.waitQueueTimeMills = ""
            this.waitQueueTime = "00:00:00"
            if(turns){
                turns.map(turn => {
                    if(this.checkIsNull(turn.module_id)){
                        turnsWaiting++
                        if(turnsWaiting == 1){
                            firstQueueTurnCreatedAt = turn.printed_at 
                        }
                    }
                    if(turn.module_id == this.userModule.id ){
                        if(this.checkIsNull(turn.end_atention) && (this.checkIsNull(turn.time_atention) || !this.checkIsNull(turn.time_atention))){
                            this.currentTurnObject = turn
                        }
                        if(!this.checkIsNull(turn.end_atention) && !this.checkIsNull(turn.time_atention)){
                            turnsAtended++
                        }
                    }

                });
            }
            
            if(firstQueueTurnCreatedAt){
                firstQueueTurnCreatedAt = new Date(firstQueueTurnCreatedAt);
                this.waitQueueTimeMills = Date.now() - firstQueueTurnCreatedAt
                this.waitQueueTime = this.formatChron(this.waitQueueTimeMills)
            }
            

            if(!Object.keys(this.currentTurnObject).length == 0 ){
                if(this.checkIsNull(this.currentTurnObject.time_atention)){
                    this.turnState='llamado'
                    this.turnTimeAtentionMills = ""
                    this.turnTimeAtention = this.formatChron(this.turnTimeAtentionMills)
                }else{
                    this.turnState='en atencion'
                    time_atention = this.currentTurnObject.time_atention
                    time_atention = new Date(time_atention);
                    this.turnTimeAtentionMills = Date.now() - time_atention
                    this.turnTimeAtention = this.formatChron(this.turnTimeAtentionMills)

                }
                this.currentTurn = this.currentTurnObject.consecutive_string
                
            }
            this.turnsWaiting=turnsWaiting
            this.atendedTurns=turnsAtended
            this.averageTime="00:12:04"
        },
        formatChron(value){
            var seconds = moment.duration(value).seconds();
            var minutes = moment.duration(value).minutes();
            var hours = Math.trunc(moment.duration(value).asHours());
            value = hours+':'+minutes+':'+seconds;
            return value
        },
        checkIsNull(value){
           return typeof value == "object"
        },
        incrementWaitQueueTime(){
            if(typeof this.waitQueueTimeMills == "number"){
                this.waitQueueTimeMills = this.waitQueueTimeMills + 1000
                this.waitQueueTime = this.formatChron(this.waitQueueTimeMills)
            }
            
        },
        incrementTurnTimeAtention(){
            if(typeof this.turnTimeAtentionMills == "number"){
                this.turnTimeAtentionMills = this.turnTimeAtentionMills + 1000
                this.turnTimeAtention = this.formatChron(this.turnTimeAtentionMills)
            }
            
        },
        nextTurn:function(){
            let data = {'module':this.userModule.id, 'current_diligence':this.currentDiligence}
            api.post(`atending/next-turn`,data).then((response) => {
                console.log(response.data)
                if(response.data.message){
                    swal(response.data.message)
                }
                this.$emit('reloaddata')
            })
        },
        callAgain:function(){
        console.log("callAgain")
        },
        atendTurn:function(){
        console.log("atendTurn")
        },
        finishTurn:function(){
        console.log("finishturn")
        },
        cancelTurn:function(){
        console.log("cancelTurn")
        },
    },
});

export default AtendingCardComponent;