
 $(document).ready(function () {

  
    //$("#NombreEstablecimiento").focus();
    //$("#Direccion").focus();
  /*---- Control de fecha ----*/     

    $('.datepicker').datepicker();

  //---------------------------

    // ListarMaterialesCargar();

    // $("#grupo").attr("disabled",true);
    // $("#curso").attr("disabled",true);


    // $("#btnNuevo").click(function () {

    //   $("#cargar").prop("disabled","");	
    //   $("#cancelar").prop("disabled","");	
    //   $("#nommaterial").prop("readonly",false);
    //   $("#nommaterial").prop("readonly",false);
    //   $("form").find('.progress-bar').width('0%').html('0%');
    //   $("#nommaterial").val("");
    //   $("#nommaterial").focus();		

    // });	

   //alert($("#idVisitasAsignadas").val());

   CargarVisitaAsignada();

});


function CargarVisitaAsignada() {
    
    $("#tablaAgencias tbody tr").remove();
        
    $.ajax({
        type: "GET",
        url: './api-pcincog/VisitaAsignada/get',
        data:  { idVisitasAsignadas: $("#idVisitasAsignadas").val(), idEncuestador: $("#idEncuestador").val() },
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            //alert(obj);            
            for (var i = 0; i < obj.length; i++) {
        
                 $("#idProyecto").val(obj[i].idProyecto.toString().padStart(4, "0"));
                 $("#NombreEntidad").val(obj[i].NombreEntidad.toString());
                 //alert($("#NombreEntidad").val());
                 $("#NombreEstablecimiento").val(obj[i].NombreEstablecimiento.toString());
                 $("#NombreEstablecimiento").focus();
                 $("#Direccion").val(obj[i].Direccion.toString());
                 $("#Direccion").focus();
                                  
            }
            
        },
        error: function (resultado) {
            alert("Error");
        }
    });
}


function InsertaMaterial() {		

  idencuesta = $("#idencuesta").val();    
  //ruta = "upload-folder/" + $("#dni").val() + "/" + $("#cliente").val() +  " - " + $("#oficina").val() +  "/" + document.getElementById('archivo').files[0].name;
  ruta = "upload-folder/" + $("#dni").val() + "/" + $("#cliente").val() +  " - " + $("#oficina").val();

  $.ajax({
              type: "POST",
              url: './api-bacins/material/update',
              data:  { idencuesta: idencuesta , RutaArchivo: ruta },
              success: function (resultado) {                        
                  var obj = $.parseJSON(resultado);
                   
                  ListarMaterialesCargar();   
                  //$("#tablaalumnos").append(obj);                    
                  },
                  error: function (resultado) {
                      alert("Error");
                  }
          });
}

function EliminarMaterial(id , link ) {		

  //ruta = "upload-folder/" + $("#programa option:selected").attr("value") + "/" + $("#grupo option:selected").attr("value") +  "/" + $("#curso option:selected").attr("value") +  "/" + document.getElementById('archivo').files[0].name;

  $.ajax({
              type: "POST",
              url: './api-bacins/material/delete',
              data:  { idencuesta:  id , link:  link},
              success: function (resultado) {                        
                  var obj = $.parseJSON(resultado);
                  
                  if(obj==true){

                    ListarMaterialesCargar();
                      alert("Documento eliminado");	
                      
                      $("#tablamateriales tr").remove();    	                           
                      $("#tablamateriales").append("<tr><td width='20'>ID</td><td width='500'>NOMBRE DE ARCHIVO</td><td style='width: 100px'>TIPO</td><td style='width: 50px;'></td><td style='width: 50px;'></td></tr>");

                  } 
                      
                                      
                  },
                  error: function (resultado) {
                      alert("Error");
                  }
          });
}

function ListarMaterialesCargar() {


      idencuesta = $("#idencuesta").val();

  $("#tablamateriales tr").remove();    	
      cabe = "<tr><td width='20'>ID</td><td width='500'>NOMBRE DE ARCHIVO</td><td style='width: 50px;'></td><td style='width: 50px;'></td></tr>";   
      $("#tablamateriales").append(cabe);

  $.ajax({
              type: "GET",
              url: './api-bacins/material/listacarga',
              data:  { idencuesta: idencuesta },
              success: function (resultado) {                        
                  var obj = $.parseJSON(resultado);
                      //alert(obj);                       
                  $("#tablamateriales").append(obj);
                  },
                  error: function (resultado) {
                      alert("Error");
                  }
  });

}

function Descargar(enlace){
                 /*var Fechaini=$("#Fechaini").val();
                 var Fechafin=$("#Fechafin").val();*/	
                 win=window.open("./descarga.php?enlace=" + enlace,"_blank", "menubar=yes, scrollbars=yes, resizable=yes, top=300, left=500, width=400, height=20","false");
}
