import Vue from "vue"
// ES6 Modules or TypeScript
import swal from 'sweetalert2'
import AtendingCardComponent from './AtendingCardComponent'
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

        }
    },
    mounted:function(){
        console.log('hi from AtendingComponent')
        // console.log(this.userModule)
    },
    methods: {
       
    },
});

export default AtendingComponent;