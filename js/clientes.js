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

                $(document).on("click", "#btn_eliminar_cliente", function () {
                    var data = $(this).data("id")
                    Swal.fire({
                        title: 'Esta seguro de Eliminar este Cliente?',
                        text: "Usted no será capaz de revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Eliminar!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: 'Clientes/elimina_cliente',
                                type: 'POST',
                                dataType: 'html', //expect return data as html from server
                                data: { id: data },
                                dataType: 'json',
                                success: function (response, textStatus, jqXHR) {
                                    if (response == true) {
                                        Swal.fire(
                                            'Se elimino!',
                                            'El cliente a sido borrado satisfactoriamente.',
                                            'success'
                                        )
    
                                        tabla_clientes.api().ajax.reload();
                                    }
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.log('error');
                                    console.log('error(s):' + textStatus, errorThrown);
                                }
                            });
    
                        }
                    })
                });
                $(document).on("click", "#btn_modifica_cliente", function () {
                    var id_data = $(this).data("id")

                    $.ajax({
                        url: 'Clientes/importar_cliente/' + id_data,
                        type: 'post',
                        dataType: 'json', //expect return data as html from server
                        data: id_data,
                        success: function (response, textStatus, jqXHR) {
                           $('#id_cliente').val(id_data);
                           $('#nombre_m').val(response.nombre);
                           $('#primer_apellido_m').val(response.primer_apellido);
                           $('#segundo_apellido_m').val(response.segundo_apellido);
                           $('#celular_m').val(response.celular);
                           $('#domicilio_m').val(response.domicilio);
                           $('#id_comunidad_m').val(response.id_comunidad);
                           $('#id_paquete_m').val(response.id_paquete);
                           $('#fecha_instalacion_m').val(response.fecha_instalacion);
                           $('#mac_antena_cliente_m').val(response.mac_antena_cliente);
                           $('#id_antena_ap_m').val(response.id_antena_ap);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('error');
                            console.log('error(s):' + textStatus, errorThrown);
                        }
                    });
                    event.preventDefault();
                    event.stopImmediatePropagation();
                    
                    $('#mdl_modificar_usuario').modal({
                        backdrop: 'static',
                        keyboard: false
                    })
                });

                $(document).on("click", "#close_modal_cliente", function () {
                    $('#frm_agrega_cliente')[0].reset();
                    $('#id_comunidad').prop('selectedIndex',0);
                    $('#id_paquete').prop('selectedIndex',0);
                });
                $(document).on("click", "#cerrar_modal", function () {
                    $('#frm_agrega_cliente')[0].reset();
                    $('#id_comunidad').prop('selectedIndex',0);
                    $('#id_paquete').prop('selectedIndex',0);
                });
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
            $("#fecha_instalacion").blur(function(){
                $('#noti_agrega_cliente').hide();
            });
        },

        submit_guarda: function(){
            $("#frm_agrega_cliente").submit(function(event){
                $.ajax({
                    url: 'Clientes/guardar_cliente',
                    type: 'post',
                    dataType: 'html', //expect return data as html from server
                    data: $("#frm_agrega_cliente").serialize() + '&tipo=agregar_usuario',
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
                       }else if(response=='fecha_instalacion'){
                        $('#noti_agrega_cliente').html("Se requiere colocar una fecha de instalacion.");
                        $('#noti_agrega_cliente').show();
                        $('#fecha_instalacion').trigger('focus');
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

        submit_modificar: function(){
            $("#frm_modificar_cliente").submit(function(event){
                $.ajax({
                    url: 'Clientes/modificar_cliente',
                    type: 'post',
                    dataType: 'html', //expect return data as html from server
                    data: $("#frm_modificar_cliente").serialize() + '&tipo=modificar_usuario',
                    success: function (response, textStatus, jqXHR) {
                       if(response=='Modificado')
                       {
                        $('#frm_modificar_cliente')[0].reset();
                        $('#mdl_modificar_usuario').modal('hide');
                        location.reload();
                       }else if(response=='nombre'){
                        $('#noti_modificar_cliente').html("Se requiere colocar un nombre.");
                        $('#noti_modificar_cliente').show();
                        $('#nombre_m').trigger('focus');
                       }else if(response=='primer_apellido'){
                        $('#noti_modificar_cliente').html("Se requiere colocar un primer apellido.");
                        $('#noti_modificar_cliente').show();
                        $('#primer_apellido_m').trigger('focus');
                       }else if(response=='celular'){
                        $('#noti_modificar_cliente').html("Se requiere colocar un celular.");
                        $('#noti_modificar_cliente').show();
                        $('#celular_m').trigger('focus');
                       }else if(response=='domicilio'){
                        $('#noti_modificar_cliente').html("Se requiere colocar un domicilio.");
                        $('#noti_modificar_cliente').show();
                        $('#domicilio_m').trigger('focus');
                       }else if(response=='id_paquete'){
                        $('#noti_modificar_cliente').html("Se requiere seleccionar un paquete.");
                        $('#noti_modificar_cliente').show();
                        $('#id_paquete_m').trigger('focus');
                       }else if(response=='id_comunidad'){
                        $('#noti_modificar_cliente').html("Se requiere colocar una comunidad.");
                        $('#noti_modificar_cliente').show();
                        $('#id_comunidad_m').trigger('focus');
                       }else if(response=='fecha_instalacion'){
                        $('#noti_modificar_cliente').html("Se requiere colocar una fecha de instalación.");
                        $('#noti_modificar_cliente').show();
                        $('#fecha_instalacion_m').trigger('focus');
                       }else{
                        Swal.fire(
                            'Se actualizo!',
                            'El cliente a sido actualizado satisfactoriamente.',
                            'success'
                        )
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
                    backdrop: 'static',
                    keyboard: false
                })
            });
        },
       
    }
})();