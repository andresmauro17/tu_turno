import Vue from "vue"
import swal from 'sweetalert2'
import axios from "../../api/index"


const ServiceIndexConponent = Vue.component("service-index-component",{
    
    props:[
        "services"
    ],
    
    data() {
        return {
        
        }
    },

    methods: {
        borrar(service_id){

            swal({
                title: 'Estas Seguro?',
                text: 'No podras revertirlo',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, borrar!',
                cancelButtonText: 'No, cancelar',
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).then(function() {
                // hace la peticion al backend para borrar
                    axios.delete(`services/${service_id}`).then(function(response){
                        console.log(response)
                        location.reload();
                    })

                // cuando termine de hacer la peticion
                    swal({
                        title: 'Borrado!',
                        text: 'El registro ha sido borrado.',
                        type: 'success',
                        confirmButtonClass: "btn btn-success",
                        buttonsStyling: false
                        }).catch(swal.noop)
                //cuando no la termina muestr hubo un error
                    // swal({
                    //     title: 'Hubo un errror!',
                    //     text: 'El registro no fue borrado.',
                    //     type: 'warning',
                    //     confirmButtonClass: "btn btn-success",
                    //     buttonsStyling: false
                    //     }).catch(swal.noop)
                
            }, function(dismiss) {
              // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
              if (dismiss === 'cancel') {
                swal({
                  title: 'Cancelado',
                  text: 'No Hicimos nada :)',
                  type: 'error',
                  confirmButtonClass: "btn btn-info",
                  buttonsStyling: false
                }).catch(swal.noop)
              }
            })
        } 
    },
});

export default ServiceIndexConponent;