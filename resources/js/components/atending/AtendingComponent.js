import Vue from "vue"
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
            atendingData : {},
            datodelhijo: '',

        }
    },
    watch:{
        selectDiligence: function (newData, oldData) {
            this.getAtendingData()
         
        }
    },
    mounted(){
        self = this
        this.getAtendingData()
    },
    methods: {
        getAtendingData:function(){
            self=this
            let diligenceId = this.selectDiligence
            if(this.userModule.diligences.length == 1){
                diligenceId = this.userModule.diligences[0].id
            }else{
                // need to define this
            }

            api.get(`atending/${diligenceId}/getData/${this.userModule.id}`).then((response) => {
                // console.log(response.data)
                this.atendingData = response.data
            
            })
            
       }
    },
});

export default AtendingComponent;