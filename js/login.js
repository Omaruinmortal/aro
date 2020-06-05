var aro = window.aro || {};

aro.login = (function () {

    return {

        submit_login: function(){
            $("#frm_ingresa_usuarios").submit(function(event){
                $.ajax({
                    url: 'index.php/Usuarios/login',
                    type: 'post',
                    dataType: 'html', //expect return data as html from server
                    data: $("#frm_ingresa_usuarios").serialize(),
                    success: function (response, textStatus, jqXHR) {
                        if(response=="correcto"){                                                       
                             window.location.replace("index.php/Principal"); 
                             return false;                              
                         }else{
                            alert('El usuario y/o contraseña están incorrectos');
                            //window.location.replace(base_url_maker+"/vw_pac_pacientelist.php");
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