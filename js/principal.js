var aro = window.aro || {};

aro.principal = (function () {

    return {

        init_dashboard: function(){
            $(document).ready(function (){            

                var tabla_clientes = $('#datatable_clientes').dataTable({
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
                           $('#nombre').val(response.nombre + ' ' + response.primer_apellido + ' ' + response.segundo_apellido);
                           ;
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

                $('input[type="file"]').change(function(e){
                    var fileName = e.target.files[0].name;
                    document.getElementById('nombre_archivo').innerHTML = fileName; 
                });

                $(document).on("click", "#close_modal_pago", function () {
                    $('#frm_pago_cliente')[0].reset(); 
                    document.getElementById('nombre_archivo').innerHTML = 'Seleccionar Archivo (2MB)';                  
                });
                $(document).on("click", "#cerrar_modal_pago_x", function () {
                    $('#frm_pago_cliente')[0].reset(); 
                    document.getElementById('nombre_archivo').innerHTML = 'Seleccionar Archivo (2MB)';                  
                });
            });  
        },

        submit_guarda_pago: function(){
            $("#frm_pago_cliente").submit(function(event){
                $.ajax({
                    url: 'Principal/realiza_pago',
                    type: 'post',
                    dataType: 'html', //expect return data as html from server
                    data: $("#frm_pago_cliente").serialize(),
                    success: function (response, textStatus, jqXHR) {
                       if(response=='Pagado')
                       {
                        $('#frm_pago_cliente')[0].reset();
                        $('#mdl_modificar_usuario').modal('hide');
                        location.reload();
                       }else if(response=='comprobante'){
                        $('#noti_modificar_cliente').html("Se requiere colocar un nombre.");
                        $('#noti_modificar_cliente').show();
                        $('#comprobante').trigger('focus');
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
        },
        
       
    }
})();