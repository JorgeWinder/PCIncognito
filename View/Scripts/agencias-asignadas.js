
  $(document).ready(function(){

    /* Control de rango de fecha */     

    $("#range").ionRangeSlider({
        hide_min_max: true,
        keyboard: true,
        min: 0,
        max: 31,
        from: 0,
        to: 30,
        type: 'double',
        step: 1,
        prefix: "Días",
        grid: true
    });

    // Cargar detalle de agencias asignadas 

    CargarAgenciasAsignadas();

 });

 function CargarAgenciasAsignadas() {


    $("#tablaAgencias tbody tr").remove();
        
    $.ajax({
        type: "GET",
        url: './api-pcincog/DetalleAgenciasAsignadas/get',
        data:  {idProyecto: $("#idProyecto").val(), idEncuestador: $("#idEncuestador").val() },
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            //alert(obj);            
            $("#tablaAgencias tbody").append(obj);    
            
            $("#NombreProyecto").val($("#NombrePro").val());
        },
        error: function (resultado) {
            alert("Error");
        }
    });

 }