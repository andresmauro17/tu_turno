import ServiceIndexComponent from "./components/services/ServiceIndexComponent"
import AtendingComponent from "./components/atending/AtendingComponent"
import KioskComponent from "./components/kiosk/KioskComponent"
import TvComponent from "./components/tv/TvComponent"



const GlobalComponents = {
    install(Vue){
        Vue.component("serviceIndexComponent", ServiceIndexComponent),
        Vue.component("AtendingComponent", AtendingComponent)
        Vue.component("KioskComponent", KioskComponent)
        Vue.component("TvComponent", TvComponent)

    }
}

export default GlobalComponents;