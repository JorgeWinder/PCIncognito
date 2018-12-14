
  $(document).ready(function(){

    ValNumeros("#dni");
    ValLetras("#Nombres");
    ValLetras("#Apellidos");

    CargarComboPerfil();
    CargarComboDistrito();

    $("#btnnuevo").click(function(){
        nuevoColaborador(); //se llama a funcion para limpiar campos en el evento click del boton NUEVO (Colaborador)
    });

    $("#btnnuevo2").click(function(){
        nuevoEncuestador(); //se llama a funcion para limpiar campos en el evento click del boton NUEVO (Encuestador)
    });


    $("#btnnuevo3").click(function(){
        nuevoCliente(); //se llama a funcion para limpiar campos en el evento click del boton NUEVO (Pop Up Cliente)
    });

    $("#btnnuevo4").click(function(){
        nuevoUsuarioCliente(); //se llama a funcion para limpiar campos en el evento click del boton NUEVO (Usuario Cliente)
    });

    //$("#nomx").html("Jorge");

    //------- Modal -----------

    $('.modal').modal(); // se llama a evento modal de jquery para permitir pop up modal de materialize

    /* Habilitar tabs */

    $('.tabs').tabs();

    //---------------------//

    $("#cboDistrito").change(function(){

        $("#Direccion2").focus();
    });
    //---------------------//


    //### Botón Registrar - Colaborador #######
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

        }else{ alert("FALTAN COMPLETAR DATOS"); }        

        // var imp =  $("#dni").val() + "  - " + $("#cboPerfil option:selected").attr("value") + " - " + $("#Nombres").val().toUpperCase() + " - " + $("#Correo").val().toUpperCase() + " - " + $("#Apellidos").val().toUpperCase();
        //  alert(imp);
               
    });


    //### Botón Registrar - Encuestador #####
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

        }else{ alert("FALTAN COMPLETAR DATOS"); }        

    });

    //### Botón Registrar - Cliente #####
    $("#btnregistrar3").click(function(){
            
        if( $("#Ruc3").val()!="" && $("#NombreCliente3").val()!="" && $("#RazonSoc3").val()!="" ){

            $.ajax({
              type: "POST",
              url: './api-pcincog/cliente/add',
              data:  {Ruc: $("#Ruc3").val().trim(), NombreCliente: $("#NombreCliente3").val().trim().toUpperCase() , RazonSocial: $("#RazonSoc3").val().trim().toUpperCase() , Contacto: $("#Contacto3").val().trim().toUpperCase() , TelefonoContacto: $("#TelefonoContacto3").val().trim().toUpperCase() , Password: $("#Password3").val() },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR CLIENTE");
                             $("#btnregistrar3").attr("disabled","true");
                  }
            });

        }else{ alert("FALTAN COMPLETAR DATOS"); }        

    });


    //### Botón Registrar - Usuario Cliente #####
    $("#btnregistrar4").click(function(){
            
        if( $("#search4").val()!="" && $("#Ruc4").val()!="" && $("#Doc4").val()!=""  && $("#Correo4").val()!=""  && $("#Nombres4").val()!=""  && $("#Password4").val()!="" ){

            $.ajax({
              type: "POST",
              url: './api-pcincog/usuariocliente/add',
              data:  {Ruc4: $("#Ruc4").val().trim(), Dni4: $("#Doc4").val().trim() , Nombres4: $("#Nombres4").val().trim(), Correo4: $("#Correo4").val().trim() , Password4: $("#Password4").val() },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("USUARIO CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR USUARIO CLIENTE");
                             $("#btnregistrar4").attr("disabled","true");
                  }
            });

        }else{ alert("FALTAN COMPLETAR DATOS"); }        

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

        }else{ alert("FALTAN COMPLETAR DATOS"); }        

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

        }else{ alert("FALTAN COMPLETAR DATOS"); }        

    });


    

    $("#btnmodificar3").click(function(){
            

        if(  $("#Ruc3").val()!="" ){

            $.ajax({
              type: "POST",
              url: './api-pcincog/cliente/update',
              data:  {Ruc: $("#Ruc3").val().trim(), NombreCliente: $("#NombreCliente3").val().trim().toUpperCase() , RazonSocial: $("#RazonSoc3").val().trim().toUpperCase() , Contacto: $("#Contacto3").val().trim().toUpperCase() , TelefonoContacto: $("#TelefonoContacto3").val().trim().toUpperCase() , Password: $("#Password3").val() },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("REGISTRO MODIFICADO") : alert("HUBO PROBLEMAS AL MODIFICAR EL REGISTRO");
                             //$("#btnmodificar").attr("disabled","true");
                  }
            });

        }else{ alert("FALTAN COMPLETAR DATOS"); }        

    });


    $("#btnmodificar4").click(function(){
            

        if(  $("#search4").val()!="" &&  $("#search4_uc").val()!="" &&  $("#Ruc4").val()!="" &&  $("#Doc4").val()!=""){

            $.ajax({
              type: "POST",
              url: './api-pcincog/usuariocliente/update',
              data:  {Ruc4: $("#Ruc4").val().trim(), Doc4: $("#Doc4").val().trim() , Nombres4: $("#Nombres4").val().trim() , Correo4: $("#Correo4").val().trim()  , Password4: $("#Password4").val() },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("REGISTRO MODIFICADO") : alert("HUBO PROBLEMAS AL MODIFICAR EL REGISTRO");
                             //$("#btnmodificar").attr("disabled","true");
                  }
            });

        }else{ alert("FALTAN COMPLETAR DATOS"); }        

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

    $("#search").val(dni + " - " + Nombres + " " + Apellidos);
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
//-- BUSQUEDA AUTOCOMPLETADO ENCUESTADOR

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

    }else{ $("#searchRS2 a").remove(); }


}

//----------------------------------------------------
//-- BUSQUEDA AUTOCOMPLETADO CLIENTE

function autocompleta3(){
        

    if($("#search3").val()!="")
    {
        $.ajax({
           type: "POST",
           url: './api-pcincog/cliente/busqueda',
           data:  {Nombres: $("#search3").val() },
           success: function (response) {
                          var obj = $.parseJSON(response);  
        
                          $("#searchRS3").css("display","block");                 
                          $("#searchRS3 a").remove();
                          html = "";

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idColaborador.toString());
                              
                            if (obj[i].RazonSocial == null  || obj[i].RazonSocial == undefined || obj[i].RazonSocial == ""){
                                var RazonSocial = "";
                            }else{
                                RazonSocial = obj[i].RazonSocial.toString();
                            }

                            if (obj[i].Contacto == null || obj[i].Contacto == undefined){
                                var Contacto = "";
                            }else{
                                Contacto = obj[i].Contacto.toString();
                            }

                            if (obj[i].TelefonoContacto == null || obj[i].TelefonoContacto == undefined){
                                var TelefonoContacto = "";
                            }else{
                                TelefonoContacto = obj[i].TelefonoContacto.toString();
                            }

                            //html = "<a style='' href='javascript:setCliente("+ obj[i].Ruc.toString() +",\"" + obj[i].NombreCliente.toString() + "\",\"" + obj[i].RazonSocial.toString() + "\",\"" + obj[i].Telefono.toString() +  "\",\"" + obj[i].Contacto.toString() + "\","+ obj[i].TelefonoContacto.toString() +")' class='collection-item'>" + obj[i].Ruc.toString() + " - " + obj[i].NombreCliente.toString() + "</a>";                                   
                            html = "<a style='' href='javascript:setCliente("+ obj[i].Ruc.toString() +",\"" + obj[i].NombreCliente.toString() + "\",\"" + RazonSocial +   "\",\"" + Contacto + "\","+ TelefonoContacto +")' class='collection-item'>" + obj[i].Ruc.toString() + " - " + obj[i].NombreCliente.toString() + "</a>";                                   
                            $("#searchRS3").append(html);
                            $("#searchRS4").append(html);
                          }

                          
                          //obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR EL CLIENTE");
                }
        });	 

    }else{ $("#searchRS3 a").remove(); }



}


function autocompletaCliente(){
        

    if($("#search4").val()!="")
    {
        $.ajax({
           type: "POST",
           url: './api-pcincog/cliente/busqueda',
           data:  {Nombres: $("#search4").val() },
           success: function (response) {
                          var obj = $.parseJSON(response);  
        
                          $("#searchRS4").css("display","block");                 
                          $("#searchRS4 a").remove();
                          html = "";

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idColaborador.toString());

                            //html = "<a style='' href='javascript:setCliente("+ obj[i].Ruc.toString() +",\"" + obj[i].NombreCliente.toString() + "\",\"" + obj[i].RazonSocial.toString() + "\",\"" + obj[i].Telefono.toString() +  "\",\"" + obj[i].Contacto.toString() + "\","+ obj[i].TelefonoContacto.toString() +")' class='collection-item'>" + obj[i].Ruc.toString() + " - " + obj[i].NombreCliente.toString() + "</a>";                                   
                            html = "<a style='' href='javascript:setClienteFirst("+ obj[i].Ruc.toString() +",\"" + obj[i].NombreCliente.toString()   +"\")  ' class='collection-item'>" + obj[i].Ruc.toString() + " - " + obj[i].NombreCliente.toString() + "</a>";                                   
                            //$("#searchRS3").append(html);
                            $("#searchRS4").append(html);
                          }

                          
                          //obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR EL CLIENTE");
                }
        });	 

    }else{ $("#searchRS4 a").remove(); }



}


//----------------------------------------------------
//-- BUSQUEDA AUTOCOMPLETADO USUARIO CLIENTE
function autocompletaUsuarioCliente()
{

    if($("#search4_uc").val()!="")
    {
        $.ajax({
           type: "POST",
           url: './api-pcincog/usuariocliente/busqueda',
           data:  {Nombres: $("#search4_uc").val(),
                    Nombres2 : $("#search4").val()},
           success: function (response) {
                          var obj = $.parseJSON(response);  
        
                          $("#searchRS4").css("display","block");                 
                          $("#searchRS4 a").remove();
                          html = "";

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idColaborador.toString());
                              

                            //html = "<a style='' href='javascript:setCliente("+ obj[i].Ruc.toString() +",\"" + obj[i].NombreCliente.toString() + "\",\"" + obj[i].RazonSocial.toString() + "\",\"" + obj[i].Telefono.toString() +  "\",\"" + obj[i].Contacto.toString() + "\","+ obj[i].TelefonoContacto.toString() +")' class='collection-item'>" + obj[i].Ruc.toString() + " - " + obj[i].NombreCliente.toString() + "</a>";                                   
                            html = "<a style='' href='javascript:setUsuarioCliente(" + "\"" + obj[i].Cliente_Ruc.toString() +"\",\"" + obj[i].idUsuarioCliente.toString() +   "\",\"" + obj[i].correo.toString() + "\",\"" + obj[i].Nombres.toString() +  "\"" + ")' class='collection-item'>" + obj[i].idUsuarioCliente.toString() + " - " + obj[i].Nombres.toString() + "</a>";                                   
                            $("#searchRS4").append(html);
                          }

                          
                          //obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR EL CLIENTE");
                }
        });	 

    }else{ $("#searchRS3 a").remove(); }

}


function setUsuarioCliente(Ruc,Doc,Correo,Nombres)
{

    $("#search4_uc").val(Doc + " - " + Nombres);

    $("#searchRS4").css("display","none");

    $("#Nombres4").val(Nombres);
    $("#Nombres4").focus();

    $("#Doc4").val(Doc);
    $("#Doc4").focus();

    $("#Correo4").val(Correo);
    $("#Correo4").focus();

    $("#Ruc4").val(Ruc);
    $("#Ruc4").focus();
    

    $("#Password3").attr("disabled",true);

    $("#btnregistrar4").attr("disabled",true);

}

function setClienteFirst(Ruc, Nombre)
{
    $("#search4").val(Ruc + " - " + Nombre);

    $("#Ruc4").val(Ruc);

    $("#searchRS4").css("display","none");

    $("#search4_uc").focus();

    $("#Ruc4").focus();
}


function setCliente(Ruc,Nombre,RazonSoc,Contacto,TelefonoContacto){

    $("#search3").val(Ruc + " - " + Nombre);
    
    $("#searchRS3").css("display","none");

    $("#Ruc3").val(Ruc);
    $("#Ruc3").focus();

    $("#NombreCliente3").val(Nombre);
    $("#NombreCliente3").focus();

    $("#RazonSoc3").val(RazonSoc);
    $("#RazonSoc3").focus();

    $("#Contacto3").val(Contacto);
    $("#Contacto3").focus();

    $("#TelefonCont3").val(TelefonoContacto);
    $("#TelefonCont3").focus();

    $("#Password3").attr("disabled",true);

    $("#Ruc3").focus();

    $("#btnregistrar3").attr("disabled",true);

}


function setCliente_uc(Ruc,Nombre){

    $("#search4").val(Ruc + " - " + Nombre);

}


function setEncuestador(dni,Nombres,Correo,Telefono,Direccion,Distrito){

    $("#search2").val(dni + " - " + Nombres);
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

//------------------------------
//-- NUEVO COLABORADOR 
function nuevoColaborador(){

    $("#search").val("");
    $("#dni").val("");
    $("#Nombres").val("");
    $("#Apellidos").val("");
    $("#Correo").val("");
    
    $("#cboPerfil option:selected").attr("value") == $("#cboPerfil").val("1"); ///combo distrito
    $('select').formSelect();
    $("#btnregistrar").attr("disabled",false);
}


//------------------------------
//-- NUEVO ENCUESTADOR 

//Funcion para refrescar campos luego de hacer clicl al boton NUEVO
function nuevoEncuestador(){

    $("#search2").val("");
    $("#dni2").val("");
    $("#Nombres2").val("");
    $("#Correo2").val("");
    $("#Telefono2").val("");
    $("#Direccion2").val("");

    
    $("#cboDistrito option:selected").attr("value") == $("#cboDistrito").val("1"); ///combo distrito
    $('select').formSelect();
    $("#btnregistrar2").attr("disabled",false);
}

//------------------------------
//-- NUEVO CLIENTE 

//Funcion para refrescar campos luego de hacer clicl al boton NUEVO
function nuevoCliente(){

    $("#search3").val("");
    $("#Ruc3").val("");
    $("#NombreCliente3").val("");
    $("#RazonSoc3").val("");
    $("#Contacto3").val("");
    $("#TelefonCont3").val("");
    $('select').formSelect();

    $("#btnregistrar3").attr("disabled",false);

    //$('select').formSelect();
}


//------------------------------
//-- NUEVO USUARIO CLIENTE 

//Funcion para refrescar campos luego de hacer clicl al boton NUEVO
function nuevoUsuarioCliente(){

    $("#search4").val("");
    $("#Ruc4").val("");
    $("#Correo4").val("");
    $("#Nombres4").val("");
    $("#search4_uc").val("");
    $("#Doc4").val("");
    $('select').formSelect();

    $("#btnregistrar4").attr("disabled",false);

    //$('select').formSelect();
}