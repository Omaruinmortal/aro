var aro = window.aro || {};

aro.clientes = (function () {

    return {

        init_clientes: function(){
            $(document).ready(function (){

                var tabla_clientes = $('#datatable_clientes').dataTable({
                    "ajax": {
                        url: 'Clientes/trae_clientes',
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
                
            });

            $("#nombre").blur(function(){
                $('#noti_agrega_cliente').hide();
            });
            $("#primer_apellido").blur(function(){
                $('#noti_agrega_cliente').hide();
            });
            $("#celular").blur(function(){
                $('#noti_agrega_cliente').hide();
            });
            $("#domicilio").blur(function(){
                $('#noti_agrega_cliente').hide();
            });
            $("#id_paquete").blur(function(){
                $('#noti_agrega_cliente').hide();
            });
            $("#id_comunidad").blur(function(){
                $('#noti_agrega_cliente').hide();
            });
        },

        submit_guarda: function(){
            $("#frm_agrega_cliente").submit(function(event){
                $.ajax({
                    url: 'Clientes/guardar_cliente',
                    type: 'post',
                    dataType: 'html', //expect return data as html from server
                    data: $("#frm_agrega_cliente").serialize(),
                    success: function (response, textStatus, jqXHR) {
                       if(response=='Guardado')
                       {
                        $('#frm_agrega_cliente')[0].reset();
                        $('#mdl_agrega_usuario').modal('hide');
                        location.reload();
                       }else if(response=='nombre'){
                        $('#noti_agrega_cliente').html("Se requiere colocar un nombre.");
                        $('#noti_agrega_cliente').show();
                        $('#nombre').trigger('focus');
                       }else if(response=='primer_apellido'){
                        $('#noti_agrega_cliente').html("Se requiere colocar un primer apellido.");
                        $('#noti_agrega_cliente').show();
                        $('#primer_apellido').trigger('focus');
                       }else if(response=='celular'){
                        $('#noti_agrega_cliente').html("Se requiere colocar un celular.");
                        $('#noti_agrega_cliente').show();
                        $('#celular').trigger('focus');
                       }else if(response=='domicilio'){
                        $('#noti_agrega_cliente').html("Se requiere colocar un domicilio.");
                        $('#noti_agrega_cliente').show();
                        $('#domicilio').trigger('focus');
                       }else if(response=='id_paquete'){
                        $('#noti_agrega_cliente').html("Se requiere seleccionar un paquete.");
                        $('#noti_agrega_cliente').show();
                        $('#id_paquete').trigger('focus');
                       }else if(response=='id_comunidad'){
                        $('#noti_agrega_cliente').html("Se requiere colocar una comunidad.");
                        $('#noti_agrega_cliente').show();
                        $('#id_comunidad').trigger('focus');
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

        boton_agregar: function(){
            $('#agrega_usuario').on('click', function () {
                $('#mdl_agrega_usuario').modal({
                    keyboard: false
                })
            });
        },
       
    }
})();