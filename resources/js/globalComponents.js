import ServiceIndexComponent from "./components/services/ServiceIndexComponent"
import AtendingComponent from "./components/atending/AtendingComponent"
import KioskComponent from "./components/kiosk/KioskComponent"



const GlobalComponents = {
    install(Vue){
        Vue.component("serviceIndexComponent", ServiceIndexComponent),
        Vue.component("AtendingComponent", AtendingComponent)
        Vue.component("KioskComponent", KioskComponent)

    }
}

export default GlobalComponents;