
  $(document).ready(function(){

    ValNumeros("#dni");
    ValLetras("#Nombres");
    ValLetras("#Apellidos");

    CargarComboPerfil();
    CargarComboDistrito();

    $("#nomx").html("Jorge");

    //------- Modal -----------

    $('.modal').modal();

    /* Habilitar tabs */

    $('.tabs').tabs();

    //---------------------//

    $("#cboDistrito").change(function(){

        $("#Direccion2").focus();
    });
    //---------------------//

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
            
        if( $("#cboDistrito option:selected").attr("value") > 0  && $("#dni2").val()!="" && $("#Nombres2").val()!="" && $("#Correo2").val()!=""){

            $.ajax({
              type: "POST",
              url: './api-pcincog/encuestador/add',
              data:  {idEncuestador: $("#dni2").val().trim(), Nombres: $("#Nombres2").val().trim().toUpperCase() , Correo: $("#Correo2").val().trim().toUpperCase() , Telefono: $("#Telefono2").val().trim().toUpperCase() , Direccion: $("#Direccion2").val().trim().toUpperCase() , idDistrito: $("#cboDistrito option:selected").attr("value") , Password: $("#Password2").val() },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("ENCUESTADOR REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR ENCUESTADOR");
                             $("#btnregistrar2").attr("disabled","true");
                  }
            });

        }else{ alert("FLATAN COMPLETAR DATOS"); }        

    });


    $("#btnmodificar").click(function(){
            

        if( $("select option:selected").attr("value") > 0  && $("#dni").val()!="" && $("#Nombres").val()!="" && $("#Apellidos").val()!=""){

            $.ajax({
              type: "POST",
              url: './api-pcincog/colaborador/update',
              data:  {idColaborador: $("#dni").val().trim(), Nombres: $("#Nombres").val().trim().toUpperCase() , Apellidos: $("#Apellidos").val().trim().toUpperCase() , Correo: $("#Correo").val().trim().toUpperCase() , idPerfil: $("#cboPerfil option:selected").attr("value") , Password: $("#Password").val() },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("REGISTRO MODIFICADO") : alert("HUBO PROBLEMAS AL MODIFICAR EL REGISTRO");
                             //$("#btnmodificar").attr("disabled","true");
                  }
            });

        }else{ alert("FLATAN COMPLETAR DATOS"); }        

    });


    $("#btnmodificar2").click(function(){
            
        if( $("select option:selected").attr("value") > 0  && $("#dni2").val()!="" && $("#Nombres2").val()!="" && $("#Correo2").val()!=""){

            $.ajax({
              type: "POST",
              url: './api-pcincog/encuestador/update',
              data:  {idEncuestador: $("#dni2").val().trim(), Nombres: $("#Nombres2").val().trim().toUpperCase() , Correo: $("#Correo2").val().trim().toUpperCase() , Telefono: $("#Telefono2").val().trim().toUpperCase() , Direccion: $("#Direccion2").val().trim().toUpperCase() , idDistrito: $("#cboDistrito option:selected").attr("value") },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("REGISTRO MODIFICADO") : alert("HUBO PROBLEMAS AL MODIFICAR EL REGISTRO");
                             //$("#btnmodificar").attr("disabled","true");
                  }
            });

        }else{ alert("FLATAN COMPLETAR DATOS"); }        

    });


        

 });


 //BUSQUEDA AUTOCOMPLETADO COLABORADOR

 function autocompleta(){
        

    if($("#search").val()!="")
    {
        

        $.ajax({
           type: "POST",
           url: './api-pcincog/colaborador/busqueda',
           data:  {Nombres: $("#search").val() },
           success: function (response) {
                          var obj = $.parseJSON(response);  
        
                          $("#searchRS").css("display","block");                 
                          $("#searchRS a").remove();
                          html = "";

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idColaborador.toString());
                              //html="<a href='javascript:setProducto("+ itempro +","+ obj[i].idProducto.toString() +",\"" + obj[i].NombreProducto.toString() + "\"," + obj[i].PrecioVenta.toString() + ","  + obj[i].PrecioVenta2.toString() + ","  + obj[i].PrecioVenta3.toString() + "," + obj[i].PrecioxMayor.toString() + "," + obj[i].getStock.toString() + ")' style='text-decoration:none;'><li class='list-group-item'>" + obj[i].idProducto.toString() + " - " + obj[i].NombreProducto.toString() + " <span class='label label-primary'>STOCK : " + obj[i].getStock.toString() + "</span></li></a>";                                                       
                               html = "<a style='' href='javascript:setColaborador("+ obj[i].idColaborador.toString() +",\"" + obj[i].Nombres.toString() + "\",\"" + obj[i].Apellidos.toString() + "\",\"" + obj[i].Correo.toString() + "\","+ obj[i].idPerfil.toString() +")' class='collection-item'>" + obj[i].idColaborador.toString() + " - " + obj[i].Nombres.toString() + " " + obj[i].Apellidos.toString() + "</a>";                                   
                               $("#searchRS").append(html);
                          }

                          //obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR EL CLIENTE");
                }
        });	 

    }else{ $("#searchRS a").remove(); }


}


function setColaborador(dni,Nombres,Apellidos,Correo,Perfil){


    $("#searchRS").css("display","none");
    $("#dni").val(dni);
    $("#dni").focus();
    $("#Nombres").val(Nombres);
    $("#Nombres").focus();
    $("#Apellidos").val(Apellidos);
    $("#Apellidos").focus();
    $("#Correo").val(Correo);
    $("#Correo").focus();
    $("#cboPerfil option:selected").attr("value")==$("#cboPerfil").val(Perfil);
    $('select').formSelect();
    $(".password").text("Nueva contraseña");
    $("#dni").focus();

    $("#btnregistrar").attr("disabled",true);

}

//----------------------------------------------------


 //BUSQUEDA AUTOCOMPLETADO ENCUESTADOR

 function autocompleta2(){
        

    if($("#search2").val()!="")
    {
        

        $.ajax({
           type: "POST",
           url: './api-pcincog/encuestador/busqueda',
           data:  {Nombres: $("#search2").val() },
           success: function (response) {
                          var obj = $.parseJSON(response);  
        
                          $("#searchRS2").css("display","block");                 
                          $("#searchRS2 a").remove();
                          html = "";

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idColaborador.toString());
                              //html="<a href='javascript:setProducto("+ itempro +","+ obj[i].idProducto.toString() +",\"" + obj[i].NombreProducto.toString() + "\"," + obj[i].PrecioVenta.toString() + ","  + obj[i].PrecioVenta2.toString() + ","  + obj[i].PrecioVenta3.toString() + "," + obj[i].PrecioxMayor.toString() + "," + obj[i].getStock.toString() + ")' style='text-decoration:none;'><li class='list-group-item'>" + obj[i].idProducto.toString() + " - " + obj[i].NombreProducto.toString() + " <span class='label label-primary'>STOCK : " + obj[i].getStock.toString() + "</span></li></a>";                                                       
                               html = "<a style='' href='javascript:setEncuestador("+ obj[i].idEncuestador.toString() +",\"" + obj[i].Nombres.toString() + "\",\"" + obj[i].Correo.toString() + "\",\"" + obj[i].Telefono.toString() +  "\",\"" + obj[i].Direccion.toString() + "\","+ obj[i].idDistrito.toString() +")' class='collection-item'>" + obj[i].idEncuestador.toString() + " - " + obj[i].Nombres.toString() + "</a>";                                   
                               $("#searchRS2").append(html);
                          }

                          //obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR EL CLIENTE");
                }
        });	 

    }else{ $("#searchRS a").remove(); }


}


function setEncuestador(dni,Nombres,Correo,Telefono,Direccion,Distrito){


    $("#searchRS2").css("display","none");
    $("#dni2").val(dni);
    $("#dni2").focus();
    $("#Nombres2").val(Nombres);
    $("#Nombres2").focus();
    $("#Telefono2").val(Telefono);
    $("#Telefono2").focus();
    $("#Direccion2").val(Direccion);
    $("#Direccion2").focus();
    $("#Correo2").val(Correo);
    $("#Correo2").focus();
    $("#cboDistrito option:selected").attr("value")==$("#cboDistrito").val(Distrito); 
    $('select').formSelect();
    $("#Password2").attr("disabled",true);
    $("#dni2").focus();

    $("#btnregistrar2").attr("disabled",true);
    // //$("#preciounit" + item).prop("readonly","");
    // $("#total" + item).prop("readonly","true");   

}

//----------------------------------------------------

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

