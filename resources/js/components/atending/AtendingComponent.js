import Vue from "vue"
// ES6 Modules or TypeScript
import swal from 'sweetalert2'
import AtendingCardComponent from './AtendingCardComponent'

import api from "../../api";

const AtendingComponent = Vue.component("atending-component",{
    components:{
        AtendingCardComponent
    },
    props:[
        'userModule'
    ],
    data() {
        return {
            selectDiligence:null,
            atendingData : {}

        }
    },
    mounted(){
        self = this
        console.log('hi from AtendingComponent')
        
        this.getAtendingData()
        // console.log(this.userModule)
    },
    methods: {
        getAtendingData:function(){
            self=this
            console.log('atending data')
            
            let diligenceId
            if(this.userModule.diligences.length == 1){
                diligenceId = this.userModule.diligences[0].id
            }else{
                // need to define this
            }

            api.get(`atending/${diligenceId}/getData`).then((response) => {
                // console.log(response.data)
                // console.log(self)
                this.atendingData = response.data
            
            })
            
       }
    },
});

export default AtendingComponent;