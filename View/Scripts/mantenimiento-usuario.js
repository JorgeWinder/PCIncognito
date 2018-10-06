
  $(document).ready(function(){

    ValNumeros("#dni");
    ValLetras("#Nombres");
    ValLetras("#Apellidos");

    CargarComboPerfil();
    CargarComboDistrito();

    /* Habilitar tabs */

    $('.tabs').tabs();

    //---------------------

    $("#cboDistrito").change(function(){
        $("#Direccion2").focus();
    });

    $("#btnregistrar").click(function(){
            
        if( $("#cboPerfil option:selected").attr("value") > 0  && $("#dni").val()!="" && $("#Nombres").val()!="" && $("#Apellidos").val()!=""){

            $.ajax({
              type: "POST",
              url: './api-pcincog/colaborador/add',
              data:  {idColaborador: $("#dni").val().trim(), Nombres: $("#Nombres").val().trim().toUpperCase() , Apellidos: $("#Apellidos").val().trim().toUpperCase() , Correo: $("#Correo").val().trim().toUpperCase() , idPerfil: $("#cboPerfil option:selected").attr("value") , Password: $("#Password").val() },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("COLABORADOR REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR COLABORADOR");
                             $("#btnregistrar").attr("disabled","true");
                  }
            });

        }else{ alert("FLATAN COMPLETAR DATOS"); }        

        // var imp =  $("#dni").val() + "  - " + $("#cboPerfil option:selected").attr("value") + " - " + $("#Nombres").val().toUpperCase() + " - " + $("#Correo").val().toUpperCase() + " - " + $("#Apellidos").val().toUpperCase();
        //  alert(imp);
               
    });


    $("#btnregistrar2").click(function(){
            
        if( $("select option:selected").attr("value") > 0  && $("#dni").val()!="" && $("#Nombres").val()!="" && $("#Apellidos").val()!=""){

            $.ajax({
              type: "POST",
              url: './api-pcincog/colaborador/add',
              data:  {idColaborador: $("#dni").val().trim(), Nombres: $("#Nombres").val().trim().toUpperCase() , Apellidos: $("#Apellidos").val().trim().toUpperCase() , Correo: $("#Correo").val().trim().toUpperCase() , idPerfil: $("#cboPerfil option:selected").attr("value") , Password: $("#Password").val() },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("COLABORADOR REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR COLABORADOR");
                             $("#btnregistrar").attr("disabled","true");
                  }
            });

        }else{ alert("FLATAN COMPLETAR DATOS"); }        

        // var imp =  $("#dni").val() + "  - " + $("#cboPerfil option:selected").attr("value") + " - " + $("#Nombres").val().toUpperCase() + " - " + $("#Correo").val().toUpperCase() + " - " + $("#Apellidos").val().toUpperCase();
        //  alert(imp);
               
    });

        

 });


 function CargarComboPerfil(){
    $.ajax({
        type: "GET",
        url: './api-pcincog/Perfil/get',
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            //alert(obj);
            $("#cboPerfil").append(obj);
            /* Efecto objetos select formulario */
            $('select').formSelect();
        },
        error: function (resultado) {
            alert("Error");
        }
    });
}

function CargarComboDistrito(){
    $.ajax({
        type: "GET",
        url: './api-pcincog/Distrito/get',
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            //alert(obj);
            $("#cboDistrito").append(obj);
            /* Efecto objetos select formulario */
            $('select').formSelect();
        },
        error: function (resultado) {
            alert("Error");
        }
    });
}