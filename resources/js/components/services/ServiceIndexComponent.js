import Vue from "vue"

const ServiceIndexConponent = Vue.component("service-index-component",{
    data() {
        return {
        
        }
    },
    methods: {
        abrir(){
            alert("cualuiqer mensaje");
            swal({
                title: "Here's a message!",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success"
            }).catch(swal.noop)
        }
    },
});

export default ServiceIndexConponent;