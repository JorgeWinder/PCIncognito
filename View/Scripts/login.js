
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
                    window.location="pautas-e-indicaciones";
                } else if($("#cbotipouser option:selected").attr("value")==3){
                    LoginAdmin();
                }
            
            }else{alert("Debe seleccionar el tipo de usuario");}                
        }else{
             alert("Debes ingresar tu correo y password");
        }        

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