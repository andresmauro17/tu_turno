import ServiceIndexComponent from "./components/services/ServiceIndexComponent"
import AtendingComponent from "./components/atending/AtendingComponent"
import KioskComponent from "./components/kiosk/KioskComponent"
import TvComponent from "./components/tv/TvComponent"
import ModuleIndexComponent from "./components/modules/ModuleIndexComponent"


const GlobalComponents = {
    install(Vue){
        Vue.component("serviceIndexComponent", ServiceIndexComponent),
        Vue.component("AtendingComponent", AtendingComponent),
        Vue.component("KioskComponent", KioskComponent),
        Vue.component("TvComponent", TvComponent),
        Vue.component("ModuleIndexComponent", ModuleIndexComponent)
    }
}

export default GlobalComponents;