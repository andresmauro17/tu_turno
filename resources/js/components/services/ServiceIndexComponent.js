import Vue from "vue"
// ES6 Modules or TypeScript
import swal from 'sweetalert2'

const ServiceIndexConponent = Vue.component("service-index-component",{
    data() {
        return {
        
        }
    },
    methods: {
        abrir(){
            alert("cualuiqer mensaje");
            Swal({
                title: "Here's a message!",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success"
            }).catch(swal.noop)
        },
        deleteitem(){
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
                // cuando termine de hacer la peticion
                    swal({
                        title: 'Borrado!',
                        text: 'El registro ha sido borrado.',
                        type: 'success',
                        confirmButtonClass: "btn btn-success",
                        buttonsStyling: false
                        }).catch(swal.noop)
                //cuando no la termina muestr hubo un error
                    swal({
                        title: 'Hubo un errror!',
                        text: 'El registro no fue borrado.',
                        type: 'warning',
                        confirmButtonClass: "btn btn-success",
                        buttonsStyling: false
                        }).catch(swal.noop)
                
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