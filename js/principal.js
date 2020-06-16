var aro = window.aro || {};

aro.principal = (function () {

    return {

        init_dashboard: function(){
            $(document).ready(function (){            

                var tabla_pagos = $('#datatable_clientes').dataTable({
                    "ajax": {
                        url: 'Principal/trae_pagos',
                        type: 'POST'
                    },
                    "order": [[1, "desc"]],
                    "pageLength": 10,
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "No hay ningun dato disponible",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    }
                }); // fin de datatable  
                
                $(document).on("click", "#btn_pagado_pago", function () {
                    var id_data = $(this).data("id")

                    $.ajax({
                        url: 'Principal/importa_pago_mensual/' + id_data,
                        type: 'post',
                        dataType: 'json', //expect return data as html from server
                        data: id_data,
                        success: function (response, textStatus, jqXHR) {
                           $('#id_pago').val(id_data);
                           $('#id_cliente').val(response.id_cliente);
                           $('#nombre').val(response.nombre + ' ' + response.primer_apellido + ' ' + response.segundo_apellido);
                          
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('error');
                            console.log('error(s):' + textStatus, errorThrown);
                        }
                    });
                    event.preventDefault();
                    event.stopImmediatePropagation();
                    
                    $('#mdl_pago_cliente').modal({
                        backdrop: 'static',
                        keyboard: false
                    })
                });

                $(document).on("click", "#btn_modifica_pago", function () {
                    var id_data = $(this).data("id")

                    Swal.fire({
                        title: '¿Esta seguro?',
                        text: "Usted revertira el pago!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, revertir!'
                      }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: 'Principal/revertir_pago/' + id_data,
                                type: 'post',
                                dataType: 'html', //expect return data as html from server
                                data: id_data,
                                success: function (response, textStatus, jqXHR) {
                                    if(response=='OK')
                                    {
                                        Swal.fire(
                                            'Pago revertido!',
                                            'Usted revirtio el pago.',
                                            'success'
                                          )
                                          location.reload();
                                    }                                    
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    alert('error');
                                    console.log('error(s):' + textStatus, errorThrown);
                                }
                            });
                            event.preventDefault();
                            event.stopImmediatePropagation();                          
                        }
                      })

                });

                $(document).on("click", "#comprobante_pago", function (){
                    var id_data = $(this).data("id")
                   
                    $.ajax({
                        url: 'Principal/importa_pago_mensual/' + id_data,
                        type: 'post',
                        dataType: 'json', //expect return data as html from server
                        data: id_data,
                        success: function (response, textStatus, jqXHR) {
                           $('#nombre_cliente').val(response.nombre + ' ' + response.primer_apellido + ' ' + response.segundo_apellido);
                           
                           $('#comprobante').attr("src", base_url+"/assets/pagos/"+response.comprobante_pago);                        
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('error');
                            console.log('error(s):' + textStatus, errorThrown);
                        }
                    });
                    event.preventDefault();
                    event.stopImmediatePropagation();
                    
                    $('#mdl_comprobante_pago').modal({
                        backdrop: 'static',
                        keyboard: false
                    })
                });

                $('input[type="file"]').change(function(e){
                    var fileName = e.target.files[0].name;
                });

                $(document).on("click", "#close_modal_pago", function () {
                    $('#frm_pago_cliente')[0].reset();                 
                });
                $(document).on("click", "#cerrar_modal_pago_x", function () {
                    $('#frm_pago_cliente')[0].reset(); 
                });

                $("#frm_pago_cliente").submit(function(event){
                    $.ajax({
                        url: 'Principal/realiza_pago',
                        type: 'post',
                        dataType: 'html', //expect return data as html from server
                        data: new FormData(this),
                        contentType: false,  
                        cache: false,  
                        processData:false,  
                        success: function (response, textStatus, jqXHR) {
                           if(response=='OK'){
                                Swal.fire(
                                    'Se agrego pago!',
                                    'Se agrego el pago satisfactoriamente.',
                                    'success'
                                ) .then((result) => {
                                    if (result.value) {
                                        $('#mdl_pago_cliente').modal('hide');
                                        location.reload();
                                    }
                                  })
                                
                            }else if(response=='falta_comprobante'){
                                $('#noti_archivo_pago').html("Se requiere archivo.");
                                $('#noti_archivo_pago').show();
                                $('#archivo_pago').trigger('focus');
                            }                         
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('error');
                            console.log('error(s):' + textStatus, errorThrown);
                        }
                    });
                    event.preventDefault();
                    event.stopImmediatePropagation(); 
                              
                });
            });  
            $("#archivo_pago").blur(function(){
                $('#noti_archivo_pago').hide();
            });
        },
        
    }
})();