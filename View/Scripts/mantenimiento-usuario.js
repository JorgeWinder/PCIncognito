
  $(document).ready(function(){

    ValNumeros("#dni");
    ValLetras("#Nombres");
    ValLetras("#Apellidos");

    CargarComboPerfil();
    CargarComboDistrito();

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
            
        if( $("select option:selected").attr("value") > 0  && $("#dni").val()!="" && $("#Nombres").val()!="" && $("#Apellidos").val()!=""){

            $.ajax({
              type: "POST",
              url: './api-pcincog/colaborador/add',
              data:  {idColaborador: $("#dni").val().trim(), Nombres: $("#Nombres").val().trim().toUpperCase() , Apellidos: $("#Apellidos").val().trim().toUpperCase() , Correo: $("#Correo").val().trim().toUpperCase() , idPerfil: $("#cboPerfil option:selected").attr("value") , Password: $("#Password").val() },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("COLABORADOR REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR COLABORADOR");
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
                             $("#btnmodificar").attr("disabled","true");
                  }
            });

        }else{ alert("FLATAN COMPLETAR DATOS"); }        

    });


        

 });


 //BUSQUEDA AUTOCOMPLETADO COLABORADOR

 function autocompleta(itempro){
        
    //$(".list-group li").remove();

    if($("#nompro" + itempro).val()!="")
    {

        $.ajax({
           type: "POST",
           url: './api-sigop/producto/busqueda',
           data:  {NombreProducto: $("#nompro" + itempro).val() , idTienda: $("#idtienda").val() },
           success: function (response) {
                          var obj = $.parseJSON(response);             
                          $("#autoproducto" + itempro).css("display","block");                 
                          $("#autoproducto" + itempro +" li").remove();

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idProducto.toString());
                               //textoprecios= "<a href='javascript:void()' style='text-decoration:none; position: absolute;' data-toggle='popover' title='Precios' data-trigger='click' data-html='true' data-content='" + obj[i].PrecioVenta.toString()  + "<br> l2'> <span class='label label-info'>Ver precios</span> </a>"; // + "<span style='background-color: white;cursor: pointer;' title='Información' data-toggle='popover' data-trigger='hover' data-html='true' data-content='¿Ha olvidado su comtraseña?'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></span>"; 
                               textoprecios= " <span class='label label-default'>PV : " + obj[i].PrecioVenta.toString() + "</span>";
                               textoprecios = textoprecios + " <span class='label label-default'>PM : " + obj[i].PrecioxMayor.toString() + "</span>";                                   
                               textoprecios = textoprecios + " <span class='label label-default'>PF : " + obj[i].PrecioVenta2.toString() + "</span>";                                   
                               textoprecios = textoprecios + " <span class='label label-default'>PL : " + obj[i].PrecioVenta3.toString() + "</span>";                                   

                                if(obj[i].getStock > 0){
                                    html="<a href='javascript:setProducto("+ itempro +","+ obj[i].idProducto.toString() +",\"" + obj[i].NombreProducto.toString() + "\"," + obj[i].PrecioVenta.toString() + ","  + obj[i].PrecioVenta2.toString() + ","  + obj[i].PrecioVenta3.toString() + "," + obj[i].PrecioxMayor.toString() + "," + obj[i].getStock.toString() + ")' style='text-decoration:none;'><li class='list-group-item'>" + obj[i].idProducto.toString() + " - " + obj[i].NombreProducto.toString() + " <span class='label label-primary'>STOCK : " + obj[i].getStock.toString() + "</span></li></a>";    
                                }else{
                                    html="<li class='list-group-item'><a href='javascript:void()' style='text-decoration:none;'>" + obj[i].idProducto.toString() + " - " + obj[i].NombreProducto.toString() + " <span class='label label-danger'>STOCK : " + obj[i].getStock.toString() + "</span></a> " + textoprecios + "</li>";                                            
                                }
                                
                                $("#autoproducto" + itempro).append(html);
                          }

                          //obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR EL CLIENTE");
                }
        });	 

    }else{ $("#autoproducto" + itempro + " a").remove(); }


}


function setProducto(item,cod,nombre,preciounit,preciounit2,preciounit3,PrecioxMayor,stockmax){

    $("#autoproducto" + item).css("display","none");
    $("#nompro" + item).val(nombre);
    //$("#nompro" + item).prop("readonly",true);
    $("#nompro" + item).prop("disabled",true);
    //$("#preciounit" + item).prop("readonly","");
    $("#total" + item).prop("readonly","true");   

}

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