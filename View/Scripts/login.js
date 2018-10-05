
  $(document).ready(function(){

    /* Efecto objetos select formulario */     
    $(document).ready(function(){
        $('select').formSelect();
      });  
        
 });


 function Login(){

    if($("#Correo").val()!='' && $("#Password").val()!='')
    {                                                  
        
        $.ajax({
            type: 'POST',
            url: './api-pcincog/colaborador/acceso',                    
            data:  {dni: $("#Correo").val() , password: $("#Password").val()},
            success: function (response) {
                  var obj = $.parseJSON(response);
                  obj ? window.location.href = './pagina-de-inicio' : alert("Verifique su usuario y/o password");
            },
            error: function (response) {
                alert("Hubo un error");
            }
        });                                
    }else{
        alert("Debes ingresar tu usuario y password");
    }

}