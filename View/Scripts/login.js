
  $(document).ready(function(){

    /* Efecto objetos select formulario */     
    $(document).ready(function(){
        $('select').formSelect();
      });  

      $("#btniniciar").click(function(){  
          
        
        if($("#Correo").val()!='' && $("#Password").val()!='')
        {   
            if ($("#cbotipouser option:selected").attr("value")!="") {
                
             
                if ($("#cbotipouser option:selected").attr("value")==1) {
                    LoginEnc();
                } else if($("#cbotipouser option:selected").attr("value")==3){
                    LoginAdmin();
                }
            
            }else{alert("Debe seleccionar el tipo de usuario");}                
        }else{
             alert("Debes ingresar tu correo y password");
        }        

      });
  
      //funcion para enter con boton
      $(document).ready(function(){     
//        $("#btnIniciar").keypress(function(e) {
        $("#form").keypress(function(e) {
          if(e.which == 13) {
            if($("#Correo").val()!='' && $("#Password").val()!='')
            {   
                if ($("#cbotipouser option:selected").attr("value")!="") {
                    
                 
                    if ($("#cbotipouser option:selected").attr("value")==1) {
                        LoginEnc();
                    } else if($("#cbotipouser option:selected").attr("value")==3){
                        LoginAdmin();
                    }
                
                }else{alert("Debe seleccionar el tipo de usuario");}                
            }else{
                 alert("Debes ingresar tu correo y password");
            }    
          }
        });
  });
      




 });


 function LoginAdmin(){

                                                               
                $.ajax({
                    type: 'POST',
                    url: './api-pcincog/colaborador/acceso',                    
                    data:  {Correo: $("#Correo").val().trim().toUpperCase() , Password: $("#Password").val() },
                    success: function (response) {
                        var obj = $.parseJSON(response);
                        obj ? window.location.href = './modulo-administrador' : alert("Verifique su correo y/o password");
                    },
                    error: function (response) {
                        alert("Hubo un error");
                    }
                });                                            

        
}

function LoginEnc(){
                                                               
    $.ajax({
        type: 'POST',
        url: './api-pcincog/ecuestador/acceso',                    
        data:  { Correo: $("#Correo").val().trim().toUpperCase(), Password: $("#Password").val() },
        success: function (response) {
            var obj = $.parseJSON(response);
            obj ? window.location.href = './pautas-e-indicaciones' : alert("Verifique su correo y/o password");
        },
        error: function (response) {
            alert("Hubo un error" + response.toString());
        }
    });                                            


}