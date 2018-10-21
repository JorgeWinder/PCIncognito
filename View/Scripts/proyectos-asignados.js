
         
$(document).ready(function(){
            

    CargarProyectosAsignados();


});


function CargarProyectosAsignados(){

    $("#tabladetaproyecto tbody tr").remove();
        
    $.ajax({
        type: "GET",
        url: './api-pcincog/DetalleProyectosAsignados/get',
        data:  {idEncuestador: $("#idEncuestador").val() },
        //scriptCharset: "utf-8",
        success: function (resultado) {                        
            var obj = $.parseJSON(resultado);
            //alert(obj);            
            $("#tabladetaproyecto tbody").append(obj);            
        },
        error: function (resultado) {
            alert("Error");
        }
    });
    
}