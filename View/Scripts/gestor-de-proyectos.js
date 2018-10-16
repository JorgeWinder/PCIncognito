
  $(document).ready(function(){

    $("#btnadd").attr("disabled","");

   // FECHA AUTOMÁTICA
        var d = new Date();
        var n = d.getFullYear() + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + ("0" + (d.getDate())).slice(-2);
        $("#FechaInicio").val(n);
   
        $('.datepicker').datepicker({          
            selectMonths: true,
            selectYears: 200,            
            format: 'yyyy-mm-dd'
            //format: 'dd/mm/yyyy'
        });

    /* Habilitar tabs */

    $('.tabs').tabs();

    /* Efecto objetos select formulario */     
    $('select').formSelect();

    //------- Modal -----------

    $('.modal').modal();

    //AGREGAR DETALLE DEL PEDIDO
      $("#btnadd").click(function () {
         var cant = $("#tablapersonas tbody tr").length + 1;              
         //var contenido = "<tr><td align='center'>" + cant + "</td><td><input id='nompro" + cant + "' type='text' placeholder='Ingresar producto' class='form-control' onkeyup='autocompleta(" + cant + ")'><input type='hidden' id='codpro" + cant + "' value=''><ul id='autoproducto" + cant + "' class='list-group'></ul></td><td><input id='cantidad" + cant + "' onchange='CalValTotal(" + cant + ",this.value)' class='form-control' type='number' required maxlength='2' value='0'></td><td><select id='preciounit" + cant + "' class='form-control'><option value='0'>---</option></select></td><td><input id='total" + cant + "' class='form-control' value='0.00' readonly='true'><input id='totalx" + cant + "' type='hidden' value='0.00'><input id='stockmax" + cant + "' type='hidden' value='0'></td><td><button class='btn btn-danger' id='BtnDelete'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span> Eliminar</button></td><td style='width: 150px;'><div class='form-inline'><input id='Desct" + cant + "' type='number' class='form-control'  value='0.00' style='width: 81px; margin-right: 10px;'><label for='Desct1'> DESC.</label></div></td><td></td></tr>";
         //$("#tablapedido").append(contenido);  
         var contenido ="<tr>" +
         "<td><span id='lbldni"+ cant +"'>00000000</span></td>" +
         "<td>"+
             "<div class='input-field'>"+
                 "<input id='search"+ cant +"' onkeyup='autocompletaENC("+ cant +")' type='text' placeholder='Buscar encuestador'>"+
                 "<div id='search-rs"+ cant +"' class='search-rs' style='padding-left: 5px; position: absolute;z-index: 100;background-color: white;width: 100%;'>"+
                 "</div>"+
             "</div>"+
         "</td>"+
         "<td class='center-left'>"+
             "<a id='btnEstable"+ cant +"' href='#modal1' class='waves-effect waves-light btn modal-trigger' style='background-color: #f39c12;' disabled>Establecimientos asignados</a>"+
         "</td>"+
         "<td><a id='btnaddEnc"+ cant +"' href='javascript:void()' onclick='RegDetalleProyecto("+ cant +");'><i class='material-icons prefix' style='font-size: 30pt;'>save</i></a></td>"+
         "<td><a href='javascript:void()'><i class='material-icons prefix' style='font-size: 30pt;'>remove_circle_outline</i></a></td>"+
      "</tr>";

      $("#tablapersonas").append(contenido);       

      });

    //-------------------------


        //AGREGAR DETALLE VISITAS ASIGNADAS

        $("#btnAddVA").click(function () {
            var cant = $("#tablavisitasasig tbody tr").length + 1;              
            
            var contenido ="<tr>" +
            "<td><span id='lblenti"+ cant +"'>*********</span></td>" +
            "<td>" +
                "<div class='input-field'>" +         
                "<input id='estable"+ cant +"' type='hidden'>" +       
                    "<input id='searchV"+ cant +"' onkeyup='autocompletaESTA("+ cant +")' placeholder='Buscar establecimiento'>" +
                    "<div id='searchRSV"+ cant +"' style='padding-left: 5px; position: absolute;z-index: 100;background-color: white;width: 100%;'>" +                
                    "</div>" +
                "</div>" +
            "</td>" +
            "<td><span id='lblubica"+ cant +"'>*********</span></td>" +
            "<td><a onclick='GrabarVA(\""+ $("#dnienc").val() +"\","+ cant +")' href='javascript:void()'><i class='material-icons prefix' style='font-size: 30pt;'>save</i></a></td>" +
            "<td><a onclick='DaleteVA()' href='javascript:void()'><i class='material-icons prefix' style='font-size: 30pt;'>remove_circle_outline</i></a></td>" +
        "</tr>";
         
    
         $("#tablavisitasasig tbody").append(contenido);       
    
         });



    //--------------------------

    $("#btnregistrar").click(function(){

      //alert($("#cboEstadoProyecto option:selected").attr("value"));
            
      if( $("select option:selected").attr("value") > 0  && $("#NombreProyecto").val()!="" && $("#FechaInicio").val()!="" && $("#FechaFin").val()!="" && $("#Cliente_Ruc").val()!=""){ 

          $.ajax({
            type: "POST",
            url: './api-pcincog/proyecto/add',
            data:  {NombreProyecto: $("#NombreProyecto").val().trim().toUpperCase() , FechaInicio: $("#FechaInicio").val() , FechaFin: $("#FechaFin").val() , Cliente_Ruc: $("#Cliente_Ruc").val() , idColaborador: $("#idColaborador").val() , idEstadoProyecto: $("#cboEstadoProyecto option:selected").attr("value") },
            //data:  {NombreProyecto: $("#NombreProyecto").val().trim().toUpperCase() , FechaInicio: '2018-10-31' , FechaFin: '2018-10-01' , Cliente_Ruc: $("#Cliente_Ruc").val() , idColaborador: $("#idColaborador").val() , idEstadoProyecto: $("#cboEstadoProyecto option:selected").attr("value") },
            success: function (response) {
                           var obj = $.parseJSON(response);                      
                           obj ? alert("PROYECTO REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR PROYECTO");
                           $("#btnregistrar").attr("disabled","true");
                }
          });

      }else{ alert("FLATAN COMPLETAR DATOS"); }        

  });



  $("#btnmodificar").click(function(){
    $('select').formSelect();
    alert($("#cboEstadoProyecto option:selected").attr("value"));
      alert($("#FechaInicio").val());
      alert($("#FechaFin").val());
      $("#FechaFin").val("2018-11-01")
  }); 


 });


  //BUSQUEDA AUTOCOMPLETADO PROYECTO

  function autocompleta(){

    if($("#search").val()!="")
    {        

        $.ajax({
           type: "POST",
           url: './api-pcincog/proyecto/busqueda',
           data:  {Nombres: $("#search").val() },
           success: function (response) {
                          var obj = $.parseJSON(response);  
        
                          $("#searchRS").css("display","block");                 
                          $("#searchRS a").remove();
                          html = "";

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idColaborador.toString());
                              //html="<a href='javascript:setProducto("+ itempro +","+ obj[i].idProducto.toString() +",\"" + obj[i].NombreProducto.toString() + "\"," + obj[i].PrecioVenta.toString() + ","  + obj[i].PrecioVenta2.toString() + ","  + obj[i].PrecioVenta3.toString() + "," + obj[i].PrecioxMayor.toString() + "," + obj[i].getStock.toString() + ")' style='text-decoration:none;'><li class='list-group-item'>" + obj[i].idProducto.toString() + " - " + obj[i].NombreProducto.toString() + " <span class='label label-primary'>STOCK : " + obj[i].getStock.toString() + "</span></li></a>";                                                       
                               html = "<a style='' href='javascript:setProyecto("+ obj[i].idProyecto.toString() +",\"" + obj[i].NombreProyecto.toString() + "\",\"" + obj[i].FechaInicio.toString() + "\",\"" + obj[i].FechaFin.toString() + "\"," + obj[0].idEstadoProyecto.toString() + ")' class='collection-item'>" + obj[i].idProyecto.toString() + " - " + obj[i].NombreProyecto.toString() + "</a>";
                               $("#searchRS").append(html);
                          }

                          //obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR EL CLIENTE");
                }
        });	 

    }else{ $("#searchRS a").remove(); }


}

function autocompleta2(){

  if($("#search2t").val()!="")
  {        

      $.ajax({
         type: "POST",
         url: './api-pcincog/proyecto/busqueda',
         data:  {Nombres: $("#search2t").val() },
         success: function (response) {
                        var obj = $.parseJSON(response);  
      
                        $("#searchRS2").css("display","block");                 
                        $("#searchRS2 a").remove();
                        html = "";

                        for (var i = 0; i < obj.length; i++) {
                            //alert(obj[i].idColaborador.toString());
                            //html="<a href='javascript:setProducto("+ itempro +","+ obj[i].idProducto.toString() +",\"" + obj[i].NombreProducto.toString() + "\"," + obj[i].PrecioVenta.toString() + ","  + obj[i].PrecioVenta2.toString() + ","  + obj[i].PrecioVenta3.toString() + "," + obj[i].PrecioxMayor.toString() + "," + obj[i].getStock.toString() + ")' style='text-decoration:none;'><li class='list-group-item'>" + obj[i].idProducto.toString() + " - " + obj[i].NombreProducto.toString() + " <span class='label label-primary'>STOCK : " + obj[i].getStock.toString() + "</span></li></a>";                                                       
                             html = "<a style='' href='javascript:setProyecto2("+ obj[i].idProyecto.toString() +",\"" + obj[i].NombreProyecto.toString() + "\")' class='collection-item'>" + obj[i].idProyecto.toString() + " - " + obj[i].NombreProyecto.toString() + "</a>";
                             $("#searchRS2").append(html);
                        }

                        //obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR EL CLIENTE");
              }
      });	 

  }else{ $("#searchRS2 a").remove(); }


}

  //BUSQUEDA AUTOCOMPLETADO CLIENTE


function autocompletaCL(){


    if($("#searchCL").val()!="")
    {

        $.ajax({
           type: "POST",
           url: './api-pcincog/cliente/busqueda',
           data:  {Nombres: $("#searchCL").val() },
           success: function (response) {
                          var obj = $.parseJSON(response);  
        
                          $("#searchRSCL").css("display","block");                 
                          $("#searchRSCL a").remove();
                          html = "";

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idColaborador.toString());                              
                               html = "<a style='' href='javascript:setCliente("+ obj[i].Ruc.toString() +",\"" + obj[i].NombreCliente .toString() + "\")' class='collection-item'>" + obj[i].Ruc.toString() + " - " + obj[i].NombreCliente.toString() + "</a>";                                   
                               $("#searchRSCL").append(html);
                          }

                          //obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR EL CLIENTE");
                }
        });	 

    }else{ $("#searchRSCL a").remove(); }

}


  //BUSQUEDA AUTOCOMPLETADO ENCUESTADOR

  function autocompletaENC(item){

    if($("#search" + item).val()!="")
    {
      
        $.ajax({
           type: "POST",
           url: './api-pcincog/encuestador/busqueda',
           data:  {Nombres: $("#search" + item).val() },
           success: function (response) {
                          var obj = $.parseJSON(response);  
        
                          $("#search-rs" + item).css("display","block");                 
                          $("#search-rs" + item + " a").remove();
                          html = "";

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idColaborador.toString());                              
                               //html = "<a style='' href='javascript:setEncuestador("+ obj[i].idEncuestador.toString() +",\"" + obj[i].Nombres.toString() + "\")' class='collection-item'>" + obj[i].idEncuestador.toString() + " - " + obj[i].Nombres.toString() + "</a>";
                               html = "<a  href='javascript:setEncuestador(" + item + "," + obj[i].idEncuestador.toString() +",\"" + obj[i].Nombres.toString() + "\")' style='display: block;border-bottom: #9b9b9b solid 1px;padding: 10px;' href='#'>" + obj[i].Nombres.toString() + "</a>";
                               $("#search-rs" + item).append(html);
                          }

                          //obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR EL CLIENTE");
                }
        });	 

    }else{ $("#search-rs" + item + " a").remove(); }

}

  //BUSQUEDA AUTOCOMPLETADO ESTABLECIMIENTO

  function autocompletaESTA(item){

    if($("#searchV" + item).val()!="")
    {
      
        $.ajax({
           type: "POST",
           url: './api-pcincog/establecimiento/busqueda',
           data:  {NombreEstablecimiento: $("#searchV" + item).val() },
           success: function (response) {
                          var obj = $.parseJSON(response);  
                          
                          $("#searchRSV" + item).css("display","block");                 
                          $("#searchRSV" + item + " a").remove();
                          html = "";

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idColaborador.toString());                              
                               //html = "<a style='' href='javascript:setEncuestador("+ obj[i].idEncuestador.toString() +",\"" + obj[i].Nombres.toString() + "\")' class='collection-item'>" + obj[i].idEncuestador.toString() + " - " + obj[i].Nombres.toString() + "</a>";
                               html = "<a  href='javascript:setEstablecimiento(" + item + ",\"" + obj[i].NombreEntidad + "\"," + obj[i].idEstablecimiento +",\"" + obj[i].NombreEstablecimiento.toString() + "\",\"" + obj[i].Ubicacion.toString() + "\")' style='display: block;border-bottom: #9b9b9b solid 1px;padding: 10px;' href='#'>" + obj[i].NombreEstablecimiento.toString() + "</a>";
                               $("#searchRSV" + item).append(html);
                          }

                          //obj ? alert("CLIENTE REGISTRADO") : alert("HUBO PROBLEMAS AL REGISTAR EL CLIENTE");
                }
        });	 

    }else{ $("#searchRSV" + item + " a").remove(); }

}



function setCliente(Ruc,NombreCliente){

  $("#searchRSCL").css("display","none");
  $("#Cliente_Ruc").val(Ruc);  
  $("#searchCL").val(NombreCliente);
    
  $("#cboEstadoProyecto option:selected").focus(); 
  $('select').formSelect();


}

function setEncuestador(item,dni,Nombres){  
  $("#search-rs" + item).css("display","none");   
  $("#lbldni" + item).text(dni);
  $("#search" + item).val(Nombres); 
  
}

function setEstablecimiento(item,entidad,idestable,estable,direccion) {
    $("#searchRSV" + item).css("display","none");   
    $("#lblenti" + item).text(entidad);    
    $("#estable" + item).val(idestable); 
    $("#searchV" + item).val(estable); 
    $("#lblubica" + item).text(direccion);
}

function setProyecto(id,NombreCliente,fi,ff,estado){

  $("#searchRS").css("display","none");
  $("#search").val("");
  //$("#Cliente_Ruc").val(id); 
  $("#idProyecto").val(id.toString().padStart(4, "0"));
  $("#idProyecto").focus();
  $("#NombreProyecto").val(NombreCliente);
  $("#NombreProyecto").focus();

  var d = new Date(fi);
  var n = d.getFullYear() + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + ("0" + (d.getDate())).slice(-2);
  $("#FechaInicio").val(n);

  var d = new Date(ff);
  var n = d.getFullYear() + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + ("0" + (d.getDate())).slice(-2);
  $("#FechaFin").val(n);

  $("#cboEstadoProyecto option:selected").attr("value")==$("#cboEstadoProyecto").val(estado);

  $('select').formSelect();
}

function setProyecto2(id,NombreCliente){

  $("#searchRS2").css("display","none");
  $("#search2t").val("");
  $("#idProyecto2").val(id.toString().padStart(4, "0"));
  $("#NombreProyecto2").val(NombreCliente);
  $('select').formSelect();

  CargarDetalleProyecto();

  $("#btnadd").removeAttr("disabled");

}

// REGISTRAR DETALLE DE PROYECTO

function RegDetalleProyecto(item){

    if( $("#lbldni" + item).text()!="" ){             

        $.ajax({
          type: "POST",
          url: './api-pcincog/DetalleProyecto/add',
          data:  { idEncuestador: $("#lbldni" + item).text(), idProyecto: $("#idProyecto2").val() },
          //data:  {NombreProyecto: $("#NombreProyecto").val().trim().toUpperCase() , FechaInicio: '2018-10-31' , FechaFin: '2018-10-01' , Cliente_Ruc: $("#Cliente_Ruc").val() , idColaborador: $("#idColaborador").val() , idEstadoProyecto: $("#cboEstadoProyecto option:selected").attr("value") },
          success: function (response) {
                         var obj = $.parseJSON(response);                      
                
                         if (obj.Respuesta[0].insert=="ok") {
                            //alert(obj.Respuesta[0].Id.toString().padStart(4, "0"));                            
                            $("#btnaddEnc" + item).attr("disabled","");
                            $("#btnEstable" + item).removeAttr("disabled");
                            alert("ENCUESTADOR ASIGNADO");    
                         } else {
                            alert("HUBO PROBLEMAS AL ASIGNAR ENCUESTADO");
                         }
                         
              }
        });

    }else{ alert("FLATAN COMPLETAR DATOS"); }  

}

// CARGAR DETALLE DE PROYECTO

function CargarDetalleProyecto(){

    //alert(parseInt($("#idProyecto2").val()));
    $("#tablapersonas tbody tr").remove();
        
    $.ajax({
        type: "GET",
        url: './api-pcincog/DetalleProyecto/get',
        data:  {idProyecto: parseInt($("#idProyecto2").val()) },
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            //alert(obj);            
            $("#tablapersonas tbody").append(obj);            
        },
        error: function (resultado) {
            alert("Error");
        }
    });

}



// CARGAR VISITAS ASIGNADAS

function CargarVisitasAsignadas(idProyecto,idEncuestador){

    //alert(parseInt($("#idProyecto2").val()));
    $("#tablavisitasasig tbody tr").remove();

    $("#dnienc").val(idEncuestador.toString());
            
    $.ajax({
        type: "GET",
        url: './api-pcincog/VisitasAsignadas/get',
        data:  {idProyecto: idProyecto , idEncuestador: idEncuestador },
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            $("#dnienc").val(idEncuestador.toString());            
            $("#tablavisitasasig tbody").append(obj);            
        },
        error: function (resultado) {
            alert("Error");
        }
    });

}

// GRABAR VISITAS ASIGNADAS

function GrabarVA(dni,item) {

    
    if( $("#estable" + item).val()!="" ){             

        $.ajax({
          type: "POST",
          url: './api-pcincog/VisitasAsignadas/add',
          data:  { idEncuestador: dni, idEstablecimiento: $("#estable" + item).val(), idProyecto: parseInt($("#idProyecto2").val()) },
          //data:  {NombreProyecto: $("#NombreProyecto").val().trim().toUpperCase() , FechaInicio: '2018-10-31' , FechaFin: '2018-10-01' , Cliente_Ruc: $("#Cliente_Ruc").val() , idColaborador: $("#idColaborador").val() , idEstadoProyecto: $("#cboEstadoProyecto option:selected").attr("value") },
          success: function (response) {
                         var obj = $.parseJSON(response);                      
                
                         if (obj.Respuesta[0].insert=="ok") {
                            //alert(obj.Respuesta[0].Id.toString().padStart(4, "0"));                            
                            $("#searchV" + item).attr("readonly","");            
                            alert("ESTABLECIMIENTO ASIGNADO");    
                         } else {
                            alert("HUBO PROBLEMAS AL ASIGNAR ESTABLECIMIENTO");
                         }
                         
              }
        });

    }else{ alert("FLATA EL CÓDIGO DE ESTABLECIMIENTO"); }  
    
}