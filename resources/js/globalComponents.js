import ServiceIndexComponent from "./components/services/ServiceIndexComponent"
import AtendingComponent from "./components/atending/AtendingComponent"
import KioskComponent from "./components/kiosk/KioskComponent"
import TvComponent from "./components/tv/TvComponent"
import ModuleIndexComponent from "./components/modules/ModuleIndexComponent"
import DiligenceIndexComponent from "./components/diligences/DiligenceIndexComponent"
import UserIndexComponent from "./components/users/UserIndexComponent"
import ClientIndexComponent from "./components/clients/ClientIndexComponent"


const GlobalComponents = {
    install(Vue){
        Vue.component("serviceIndexComponent", ServiceIndexComponent),
        Vue.component("AtendingComponent", AtendingComponent),
        Vue.component("KioskComponent", KioskComponent),
        Vue.component("TvComponent", TvComponent),
        Vue.component("ModuleIndexComponent", ModuleIndexComponent),
        Vue.component("DiligenceIndexComponent", DiligenceIndexComponent)
        Vue.component("UserIndexComponent", UserIndexComponent);
        Vue.component("ClientIndexComponent", ClientIndexComponent);
    }
}

export default GlobalComponents;