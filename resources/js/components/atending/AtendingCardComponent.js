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
            FirstTurnInQueue : {},
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
        clearData(){
            this.FirstTurnInQueue = {}
            this.currentTurn=""
            this.waitQueueTimeMills = ""
            this.turnTimeAtentionMills = ""
            this.waitQueueTime = "0:0:0"
            this.turnsWaiting= 0;
            this.atendedTurns= 0;
            this.turnState = ""
            this.turnTimeAtention = "0:0:0"

            this.FirstTurnInQueue = {}
            this.currentTurnObject = {}
        },
        setData(turns){
            this.clearData()
            let turnsWaitingCount = 0
            let turnsAtendedCount = 0
            
            
           
            if(turns){
                turns.map(turn => {
                    
                    //if turn has module as null is a turn in queue
                    if(this.checkIsNull(turn.module_id)){
                        turnsWaitingCount++
                        if(turnsWaitingCount == 1){
                            this.FirstTurnInQueue = turn
                        }
                    }
                    // if turn has the same module is a taked turn or atendend turn
                    else if(turn.module_id == this.userModule.id ){
                        // if is a taked is atending or called
                        if(this.checkIsNull(turn.end_atention) && (this.checkIsNull(turn.time_atention) || !this.checkIsNull(turn.time_atention))){
                            this.currentTurnObject = turn
                        }

                        // if is a attended turn
                        if(!this.checkIsNull(turn.end_atention) && !this.checkIsNull(turn.time_atention)){
                            turnsAtendedCount++
                        }
                    }

                });
            }

            this.turnsWaiting=turnsWaitingCount
            this.atendedTurns=turnsAtendedCount
            
            // if there is a firs turn in queue
            if(!Object.keys(this.FirstTurnInQueue).length == 0){
                console.log('if there is a firs turn in queue')
                this.waitQueueTimeMills = Date.now() - new Date( this.FirstTurnInQueue.printed_at )
                this.waitQueueTime = this.formatChron(this.waitQueueTimeMills)
            }
            
            // if there is a turn taked or taking
            if(!Object.keys(this.currentTurnObject).length == 0 ){
                if(this.checkIsNull(this.currentTurnObject.time_atention)){
                    this.turnState='llamado'
                    this.turnTimeAtentionMills = ""
                    this.turnTimeAtention = this.formatChron(this.turnTimeAtentionMills)
                }else{
                    this.turnState='en atencion'
                    this.turnTimeAtentionMills = Date.now() - new Date(this.currentTurnObject.time_atention)
                    this.turnTimeAtention = this.formatChron(this.turnTimeAtentionMills)

                }
                this.currentTurn = this.currentTurnObject.consecutive_string
                
            }
            
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
            let data = {'module':this.userModule.id, 'current_diligence':this.currentDiligence}
            api.post(`atending/atend-turn`,data).then((response) => {
                console.log(response.data)
                if(response.data.message){
                    swal(response.data.message)
                }
                // this.$emit('reloaddata')
            })
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