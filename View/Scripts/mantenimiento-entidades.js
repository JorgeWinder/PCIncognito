$(document).ready(function(){

    /* Efecto objetos select formulario */     
    $('select').formSelect();

    CargarComboDepartamento();

    $("#cboDepartamento").change(function() {
        CargarComboProvincia();
    });

    $("#cboProvincia").change(function() {        
        CargarComboDistrito();
    });

    $("#btnadd").attr("disabled","true");

    //------- Modal -----------

    $('.modal').modal();

    /* Habilitar tabs */

    $('.tabs').tabs();

    $("#btnregistrar").click(function(){
              
        if( $("#NombreEntidad").val()!=""){ 
  
            $.ajax({
              type: "POST",
              url: './api-pcincog/entidad/add',
              data:  { NombreEntidad: $("#NombreEntidad").val().trim().toUpperCase() },
              //data:  {NombreProyecto: $("#NombreProyecto").val().trim().toUpperCase() , FechaInicio: '2018-10-31' , FechaFin: '2018-10-01' , Cliente_Ruc: $("#Cliente_Ruc").val() , idColaborador: $("#idColaborador").val() , idEstadoProyecto: $("#cboEstadoProyecto option:selected").attr("value") },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             //obj ? alert("ENTIDAD REGISTRADA") : alert("HUBO PROBLEMAS AL REGISTRAR ENTIDAD");
                             $("#idEntidad").val(obj.Respuesta[0].Id.toString().padStart(4, "0")); 
                             $("#btnregistrar").attr("disabled","true");
                             alert("ENTIDAD REGISTRADA");
                  }
            });
  
        }else{ alert("FLATAN COMPLETAR DATOS"); }        
  
    });


    $("#btnmodificar").click(function(){
              
        if( $("#NombreEntidad").val()!=""){ 
            
            $.ajax({
              type: "POST",
              url: './api-pcincog/entidad/update',
              data:  { idEntidad: parseInt($("#idEntidad").val()) , NombreEntidad: $("#NombreEntidad").val().trim().toUpperCase() },
              //data:  {NombreProyecto: $("#NombreProyecto").val().trim().toUpperCase() , FechaInicio: '2018-10-31' , FechaFin: '2018-10-01' , Cliente_Ruc: $("#Cliente_Ruc").val() , idColaborador: $("#idColaborador").val() , idEstadoProyecto: $("#cboEstadoProyecto option:selected").attr("value") },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             obj ? alert("ENTIDAD MODIFICADA") : alert("HUBO PROBLEMAS AL REGISTRAR ENTIDAD");
                             
                  }
            });
  
        }else{ alert("FLATAN COMPLETAR DATOS"); }        
  
    });


    $("#btnregistrarEst").click(function(){

                     
        if( $("#cboDistrito option:selected").attr("value") && $("#NombreEstablecimiento").val()!="" && $("#Direccion").val()!="" ){             

            $.ajax({
              type: "POST",
              url: './api-pcincog/establecimiento/add',
              data:  { idEntidad: $("#idEntidad2").val(), NombreEstablecimiento: $("#NombreEstablecimiento").val().trim().toUpperCase(), idDistrito: $("#cboDistrito option:selected").attr("value"), Direccion: $("#Direccion").val().trim().toUpperCase(), Longitud: $("#Longitud").val(), Latitud: $("#Latitud").val() },
              //data:  {NombreProyecto: $("#NombreProyecto").val().trim().toUpperCase() , FechaInicio: '2018-10-31' , FechaFin: '2018-10-01' , Cliente_Ruc: $("#Cliente_Ruc").val() , idColaborador: $("#idColaborador").val() , idEstadoProyecto: $("#cboEstadoProyecto option:selected").attr("value") },
              success: function (response) {
                             var obj = $.parseJSON(response);                      
                             //obj ? alert("ENTIDAD REGISTRADA") : alert("HUBO PROBLEMAS AL REGISTRAR ENTIDAD");
                             if (obj.Respuesta[0].insert=="ok") {
                                $("#idEstablecimiento").val(obj.Respuesta[0].Id.toString().padStart(4, "0"));
                                $("#nomest1").val($("#NombreEstablecimiento").val());
                                $("#ubica1").val( $("#cboDepartamento").text() + ", " + $("#cboDistrito").text() + ", " + $("#cboDistrito").text());                                
                                $("#btnregistrarEst").attr("disabled","true");
                                CargarEstablecimientoEntidad();
                                alert("ENTIDAD REGISTRADA");    
                             } else {
                                alert("HUBO PROBLEMAS AL REGISTRAR ESTABLECIMIENTO");
                             }
                             
                  }
            });
  
        }else{ alert("FLATAN COMPLETAR DATOS"); }        
  
    });


    //AGREGAR DETALLE DEL PEDIDO
      $("#btnadd").click(function () {  
         var cant = $("#tablaestable tbody tr").length + 1;              
         //var contenido = "<tr><td align='center'>" + cant + "</td><td><input id='nompro" + cant + "' type='text' placeholder='Ingresar producto' class='form-control' onkeyup='autocompleta(" + cant + ")'><input type='hidden' id='codpro" + cant + "' value=''><ul id='autoproducto" + cant + "' class='list-group'></ul></td><td><input id='cantidad" + cant + "' onchange='CalValTotal(" + cant + ",this.value)' class='form-control' type='number' required maxlength='2' value='0'></td><td><select id='preciounit" + cant + "' class='form-control'><option value='0'>---</option></select></td><td><input id='total" + cant + "' class='form-control' value='0.00' readonly='true'><input id='totalx" + cant + "' type='hidden' value='0.00'><input id='stockmax" + cant + "' type='hidden' value='0'></td><td><button class='btn btn-danger' id='BtnDelete'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span> Eliminar</button></td><td style='width: 150px;'><div class='form-inline'><input id='Desct" + cant + "' type='number' class='form-control'  value='0.00' style='width: 81px; margin-right: 10px;'><label for='Desct1'> DESC.</label></div></td><td></td></tr>";
         //$("#tablapedido").append(contenido); 
         
         var contenido = "<tr>" +
                                "<td class='center'>00</td>" +
                                "<td><span id='nomest"+ cant +"'>******************</span></td>" +
                                "<td><span id='ubica"+ cant +"'>******************</span></td>" +                               
                                "<td><a href='#modal1' class='modal-trigger'><i class='material-icons prefix' style='font-size: 30pt;'>add_box</i></a><a href='#'><i class='material-icons prefix' style='font-size: 30pt;'>remove_circle_outline</i></a></td>" +
                            "</tr>";
         
      $("#tablaestable tbody").append(contenido);    
      Limpiar();   

      });

    //-------------------------



});

function Limpiar() {
    
    $("#idEstablecimiento").val("");
    $("#NombreEstablecimiento").val("");
    $("#Direccion").val("");
    $("#Direccion").val("");
    $("#cboDepartamento option:selected").attr("value")==$("#cboDepartamento").val("0");
    $("#cboProvincia option:selected").attr("value")==$("#cboProvincia").val("0");
    $("#cboDistrito option:selected").attr("value")==$("#cboDistrito").val("0");

}

// AUTOCOMPLETA BUSQUEDA ENTIDAD 1

function autocompleta(){

    if($("#search").val()!="")
    {        

        $.ajax({
           type: "POST",
           url: './api-pcincog/entidad/busqueda',
           data:  {NombreEntidad: $("#search").val() },
           success: function (response) {
                          var obj = $.parseJSON(response);  
        
                          $("#searchRS").css("display","block");                 
                          $("#searchRS a").remove();
                          html = "";

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idColaborador.toString());
                               html = "<a style='' href='javascript:setEntidad("+ obj[i].idEntidad.toString() +",\"" + obj[i].NombreEntidad.toString() + "\")' class='collection-item'>" + obj[i].idEntidad.toString().padStart(4, "0") + " - " + obj[i].NombreEntidad.toString() + "</a>";
                               $("#searchRS").append(html);
                          }
                
                }
        });	 

    }else{ $("#searchRS a").remove(); }


}

function setEntidad(idEntidad,NombreEntidad){

    $("#searchRS").css("display","none");
    $("#search").val("");
    $("#idEntidad").val(idEntidad.toString().padStart(4, "0"));
    $("#idEntidad").focus();
    $("#NombreEntidad").val(NombreEntidad);
    $("#NombreEntidad").focus();
    $("#btnregistrar").attr("disabled","true");
      
  }


  // AUTOCOMPLETA BUSQUEDA ENTIDAD 2

function autocompleta2(){

    if($("#search2").val()!="")
    {        

        $.ajax({
           type: "POST",
           url: './api-pcincog/entidad/busqueda',
           data:  {NombreEntidad: $("#search2").val() },
           success: function (response) {
                          var obj = $.parseJSON(response);  
        
                          $("#searchRS2").css("display","block");                 
                          $("#searchRS2 a").remove();
                          html = "";

                          for (var i = 0; i < obj.length; i++) {
                              //alert(obj[i].idColaborador.toString());
                               html = "<a style='' href='javascript:setEntidad2("+ obj[i].idEntidad.toString() +",\"" + obj[i].NombreEntidad.toString() + "\")' class='collection-item'>" + obj[i].idEntidad.toString().padStart(4, "0") + " - " + obj[i].NombreEntidad.toString() + "</a>";
                               $("#searchRS2").append(html);
                          }
                
                }
        });	 

    }else{ $("#searchRS2 a").remove(); }


}

function setEntidad2(idEntidad,NombreEntidad){

    $("#searchRS2").css("display","none");
    $("#search2").val(idEntidad.toString().padStart(4, "0") + " - " + NombreEntidad);
    $("#idEntidad2").val(idEntidad);
    CargarEstablecimientoEntidad();
    $("#btnadd").removeAttr("disabled");
    
}

function CargarComboDepartamento(){

    $.ajax({
        type: "GET",
        url: './api-pcincog/Departamento/get',
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            //alert(obj);
            $("#cboDepartamento").append(obj);
            /* Efecto objetos select formulario */
            $('select').formSelect();
        },
        error: function (resultado) {
            alert("Error");
        }
    });
}

function CargarComboProvincia(){

    $("#cboProvincia option").remove();

    $.ajax({
        type: "GET",
        url: './api-pcincog/ProvinciaFil/get',
        data:  {idDepartamento: $("#cboDepartamento option:selected").attr("value") },
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            //alert(obj);
            $("#cboProvincia").append("<option value='' disabled selected>Seleccione provincia</option>");
            $("#cboProvincia").append(obj);
            /* Efecto objetos select formulario */
            $('select').formSelect();
        },
        error: function (resultado) {
            alert("Error");
        }
    });
}


function CargarComboDistrito(){

    $("#cboDistrito option").remove();
        
    $.ajax({
        type: "GET",
        url: './api-pcincog/DistritoFil/get',
        data:  {idProvincia: $("#cboProvincia option:selected").attr("value") },
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            //alert(obj);
            $("#cboDistrito").append("<option value='' disabled selected>Seleccione distrito</option>");
            $("#cboDistrito").append(obj);
            /* Efecto objetos select formulario */
            $('select').formSelect();
        },
        error: function (resultado) {
            alert("Error");
        }
    });
}

function CargarEstablecimientoEntidad(){

    $("#tablaestable tbody tr").remove();
        
    $.ajax({
        type: "GET",
        url: './api-pcincog/establecimiento/entidad/get',
        data:  {idEntidad: $("#idEntidad2").val() },
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            //alert(obj);            
            $("#tablaestable tbody").append(obj);            
        },
        error: function (resultado) {
            alert("Error");
        }
    });

}


function CargarEst(id){

    $.ajax({
        type: "GET",
        url: './api-pcincog/establecimiento/get',
        data:  {idEstablecimiento: id },
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            //alert(obj);            
            $("#idEstablecimiento").val(obj[0].idEstablecimiento); 
            $("#NombreEstablecimiento").val(obj[0].NombreEstablecimiento); 
            $("#NombreEstablecimiento").focus();
            $("#Direccion").val(obj[0].Direccion); 
            $("#Direccion").focus();
            $("#Longitud").val(obj[0].Longitud);
            $("#Longitud").focus(); 
            $("#Latitud").val(obj[0].Latitud); 
            $("#Latitud").focus();
            $("#cboDepartamento option:selected").attr("value")==$("#cboDepartamento").val(obj[0].idDepartamento);
            // CargarComboProvincia();            
            // $("#cboProvincia option:selected").attr("value")==$("#cboProvincia").val(obj[0].idProvincia);
            // $('select').formSelect(); 
            // $("#cboDistrito option:selected").attr("value")==$("#cboDistrito").val(obj[0].idDistrito); 
            $('select').formSelect();
            

            $("#btnregistrarEst").attr("disabled","true");

        },
        error: function (resultado) {
            alert("Error");
        }
    });

}


function DeleteEst(id){

    if (confirm("¿Confirma eliminar el establecimiento?")) {
        
        $.ajax({
            type: "POST",
            url: './api-pcincog/establecimiento/delete',
            data:  {idEstablecimiento: id },
            //scriptCharset: "utf-8",
            success: function (resultado) {                        
                var obj = $.parseJSON(resultado);
                //alert(obj);            
                if (obj) {
                    CargarEstablecimientoEntidad();
                    alert("Establecimiento eliminado");
                }else{alert("Hubo problemas al eliminar");}
                //$("#btnregistrarEst").attr("disabled","true");
    
            },
            error: function (resultado) {
                alert("Error");
            }
        });
    

    }
    

}