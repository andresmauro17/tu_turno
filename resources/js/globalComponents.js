import ServiceIndexComponent from "./components/services/ServiceIndexComponent"
import AtendingComponent from "./components/atending/AtendingComponent"



const GlobalComponents = {
    install(Vue){
        Vue.component("serviceIndexComponent", ServiceIndexComponent),
        Vue.component("AtendingComponent", AtendingComponent)

    }
}

export default GlobalComponents;