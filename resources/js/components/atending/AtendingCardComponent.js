import Vue from "vue"
// ES6 Modules or TypeScript
import swal from 'sweetalert2'
import moment from 'moment'

const AtendingCardComponent = Vue.component("atending-card-component",{
    props:[
        'atendingData',
        'userModule'
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
        console.log('hi from AtendingCardComponent')
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
            // console.log('setData method')
            // console.log(turns)
            console.log('----------------')
            console.log('calculating data')
            let turnsWaiting = 0
            let turnsAtended = 0
            let firstQueueTurnCreatedAt = ""
            let time_atention = ""
            this.waitQueueTimeMills = ""
            this.waitQueueTime = "00:00:00"
            if(turns){
                turns.map(turn => {
                    // console.log('module_id=',turn.module_id)
                    // console.log('printed_at=',turn.printed_at)
                    
                    // console.log(typeof turn.module_id)
                   
                    
                    // console.log('turnsWaiting= ', turnsWaiting)
                    
                    if(this.checkIsNull(turn.module_id)){
                        turnsWaiting++

                        if(turnsWaiting == 1){
                            firstQueueTurnCreatedAt = turn.printed_at 
                        }
                        
                    }

                    if(turn.module_id = this.userModule.id ){
                        if(this.checkIsNull(turn.end_atention) && !this.checkIsNull(turn.time_atention)){
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
            

            if(!Object.keys(this.currentTurnObject).length === 0 ){
                console.log('entra en el if')
                this.currentTurn = this.currentTurnObject.consecutive_string
                this.turnState='en atencion'
                time_atention = this.currentTurnObject.time_atention
                time_atention = new Date(time_atention);
                this.turnTimeAtentionMills = Date.now() - time_atention
                this.turnTimeAtention = this.formatChron(this.turnTimeAtentionMills)
            }            
            
            
            this.turnsWaiting=turnsWaiting
            
            this.atendedTurns=turnsAtended
            this.averageTime="00:12:04"
        },
        formatChron(value){
            // console.log('formatChron')
            // console.log(value)
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
            // console.log('incrementWaitQueueTime');
            // console.log(typeof this.waitQueueTimeMills)

            if(typeof this.waitQueueTimeMills == "number"){
                this.waitQueueTimeMills = this.waitQueueTimeMills + 1000
                this.waitQueueTime = this.formatChron(this.waitQueueTimeMills)
            }
            
        },
        incrementTurnTimeAtention(){
            // console.log('incrementTurnTimeAtention');
            // console.log(typeof this.turnTimeAtentionMills)
            if(typeof this.turnTimeAtentionMills == "number"){
                this.turnTimeAtentionMills = this.turnTimeAtentionMills + 1000
                this.turnTimeAtention = this.formatChron(this.turnTimeAtentionMills)
            }
            
        },
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