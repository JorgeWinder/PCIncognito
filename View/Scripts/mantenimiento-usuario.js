
  $(document).ready(function(){

    ValNumeros("#dni");
    ValLetras("#Nombres");
    ValLetras("#Apellidos");

    /* Habilitar tabs */

    $('.tabs').tabs();

    /* Efecto objetos select formulario */     
    $(document).ready(function(){
        $('select').formSelect();
    });

    $("#btnregistrar").click(function(){
            
        if( $("select option:selected").attr("value") > 0  && $("#dni").val()!="" && $("#Nombres").val()!="" && $("#Apellidos").val()!=""){

            $.ajax({
              type: "POST",
              url: './api-pcincog/colaborador/add',
              data:  {idColaborador: $("#dni").val(), Nombres: $("#Nombres").val().toUpperCase() , Apellidos: $("#Apellidos").val().toUpperCase() , Correo: $("#Correo").val().toUpperCase() , idPerfil: $("#cboPerfil option:selected").attr("value") , Password: $("#Password").val() },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("COLABORADOR REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR COLABORADOR");
                             $("#btnregistrar").prop("disabled","true");
                  }
            });

        }else{ alert("FLATAN COMPLETAR DATOS"); }        

        // var imp =  $("#dni").val() + "  - " + $("#cboPerfil option:selected").attr("value") + " - " + $("#Nombres").val().toUpperCase() + " - " + $("#Correo").val().toUpperCase() + " - " + $("#Apellidos").val().toUpperCase();
        //  alert(imp);
               
    });


        

 });