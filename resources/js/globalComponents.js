import ServiceIndexComponent from "./components/services/ServiceIndexComponent"
 
const GlobalComponents = {
    install(Vue){
        Vue.component("serviceIndexComponent", ServiceIndexComponent)
    }
}

export default GlobalComponents;