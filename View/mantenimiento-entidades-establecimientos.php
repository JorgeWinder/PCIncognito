<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once './View/Plantillas/cabecera.php'; ?>

    <!-- Script / Estilos CSS / Recursos solo de la página actual -->
    <script src="Recursos/js/ion.rangeSlider.js"></script>
    <script src="View/Scripts/mantenimiento-entidades.js"></script>
    <link rel="stylesheet" href="Recursos/css/ion.rangeSlider.css" /> 
    <link rel="stylesheet" href="Recursos/css/ion.rangeSlider.skinFlat.css" />
    <!-- Fin de Script / Estilos CSS  -->

    <style>

        .tabs .tab a{
            color: #112d5c;
            background-color: white;
        } /*Black color to the text*/

        .tabs .tab a:hover {
            background-color: white;
            color: #112d5c;
        } /*Text color on hover*/

        .tabs .tab a.active {
            background-color: white;
            color: #112d5c;
        } /*Background and text color when a tab is active*/

        .tabs .indicator {
            background-color: #112d5c;
        } /*Color of underline*/


        .tabs .tab a:focus, .tabs .tab a:focus.active {
            background-color: #e8f0ff;
            outline: none;
        }
    
    </style>

</head>

<body style="background-color: rgb(239, 239, 239);">

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="Recursos/js/materialize.min.js"></script>

<?php 
 include_once './View/Plantillas/menulogin.php';
 ?>

<main>

<section class="container" style="margin: 55px auto 0;">

    
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s4"><a class="active" href="#test1">Registro de entidad</a></li>
        <li class="tab col s4"><a href="#test2">Registro de establecimientos</a></li>
        <li class="tab col s4"><a href="#test3">Reporte por entidad</a></li>
        <!-- <li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li> -->        
      </ul>
    </div>

    <div id="test1" class="col s12">

        <!-- inicio de card -->
    
        <div class="card white">
            <div class="card-content">

                <span class="card-title" style="padding: 0 5% 10px 5%;">  

                        <div class="input-field" style="border: 50px;">
                            <input id="search" onkeyup="autocompleta()" style="padding-left: 4rem; width: calc(100% - 4rem);" placeholder="Busqueda de entidad" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>                            
                            <div id="searchRS" class="collection" style="padding-left: 0px;position: absolute;background-color: white;z-index: 100;font-size: 16px;display: none;">
                                        <!-- <a style="" href="#" class="collection-item">45347734 - JORGE WINDER</a>
                                        <a style="" href="#" class="collection-item">29722385 - CLAUDIA VELASQUEZ</a>
                                        <a style="" href="#" class="collection-item">36589757 - ROSA VASQUEZ MORENO</a> -->
                            </div>
                        </div>          

                </span>
                
                    <div class="row">                    

                        <div class="input-field col s12 l4">
                            <i class="material-icons prefix">copyright</i>
                            <input id="idEntidad" type="text" placeholder="Código entidad" readonly>            
                        </div>

                        <div class="input-field col l10 s12">

                            <i class="material-icons prefix">business_center</i>
                            <input id="NombreEntidad" type="text">
                            <label for="NombreEntidad">Nombre de la entidad</label>

                        </div>

                    </div>    

                    <br>
                    <br>

                    <div class="row">
                        <div class="col s12 m4 l4">
                                <a id="btnregistrar" href="JavaScript:void()" class="waves-effect waves-light btn" style="width: 100%;background-color: #f39c12;">Registrar</a>
                        </div>
                        <div class="col s12 m4 l4">
                                <a id="btnmodificar" href="JavaScript:void()" class="waves-effect waves-light btn" style="width: 100%;background-color: #f39c12;">Modificar</a>
                        </div>
                        <div class="col s12 m4 l4">
                                <a id="btneliminar" href="JavaScript:void()" class="waves-effect waves-light btn" style="width: 100%;background-color: #f39c12;">Eliminar</a>
                        </div>                        
                    </div>

            </div>

        </div>

        <!-- Fin de card -->
    
    </div>
    
<div id="test2" class="col s12">
        
<!-- inicio de card 2 -->

<div class="card white">
    <div class="card-content">
        <!--<span class="card-title center-align" style="border-left: 7px solid #e85b21;border-right: 7px solid #e85b21;">INGRESAR</span>-->
        <span class="card-title" style="color: #f39c12;padding-bottom: 10px;"></span>
        
            <div class="row">


                <!-- div de opción "Seleccione una entidad" -->
                <div class="input-field col l6 s12">

                    <i class="material-icons prefix">business_center</i>
                    <input type="hidden" id="idEntidad2">
                    <input type="text" id="search2" onkeyup="autocompleta2()">
                    <label for="search2">Seleccione una entidad</label>
                    <div id="searchRS2" class="collection" style="padding-left: 0px;position: absolute;background-color: white;z-index: 100;font-size: 16px;display: none;">
                                        <!-- <a style="" href="#" class="collection-item">45347734 - JORGE WINDER</a>
                                        <a style="" href="#" class="collection-item">29722385 - CLAUDIA VELASQUEZ</a>
                                        <a style="" href="#" class="collection-item">36589757 - ROSA VASQUEZ MORENO</a> -->
                    </div>

                </div>

                <!-- div de boton OTRA ENTIDAD -->
                <div class="input-field col l3 s12">
                    <a id="" href="JavaScript:void()" onclick="$('#btnadd').attr('disabled','true');$('#tablaestable tbody tr').remove();$('#search2').val('').focus();" class="waves-effect waves-light btn" style="width: 100%;background-color: #f39c12;">Otra entidad</a>
                </div>                


                <div class="col s12 l12">

                    <table id="tablaestable" class="highlight responsive-table" style="margin-top: 20px;">
                            <thead>
                                <tr>
                                    <td class="center">Código</td>
                                    <td>Nombre de establecimiento</td>
                                    <td>Ubicación</td>
                                    <td></td>                                    
                                </tr>
                            </thead>
                            <tbody>
                            <!-- <tr>
                                <td class='center'>00</td>
                                <td>******************</td>
                                <td>******************</td>                                
                                <td><a href='#modal1' class='modal-trigger'><i class='material-icons prefix' style='font-size: 30pt;'>add_box</i></a><a href='#'><i class='material-icons prefix' style='font-size: 30pt;'>remove_circle_outline</i></a></td>
                            </tr> -->
                            </tbody>
                    </table>

            </div>

                
            </div>

            <div class="row">

            </div>
            
            <br>

            <div class="row">
                
                <div class="col s12 m4 l4">
                    <a href="javascript:void()" id="btnadd" class="waves-effect waves-light btn" style="width: 100%;background-color: #1b479a;">Agregar nuevo</a>
                </div>
                                     
            </div>

    </div>

</div>
        <!-- Fin de card 2 -->


    </div>
    
    <div id="test3" class="col s12">

        <!-- inicio de card 3 -->
    
        <div class="card white">
            <div class="card-content">
                <!--<span class="card-title center-align" style="border-left: 7px solid #e85b21;border-right: 7px solid #e85b21;">INGRESAR</span>-->
                <span class="card-title" style="color: #f39c12;padding-bottom: 10px;"></span>
                
                    <div class="row">

                        <div class="input-field col l4 s12">

                            <i class="material-icons prefix">business</i>
                            <input type="text" id="autocomplete-input2" class="autocomplete">
                            <label for="autocomplete-input2">Ingrese entidad</label>

                        </div>

                        


                        <div class="col s12 l12">

                            <table class="highlight responsive-table" style="margin-top: 20px;">
                                    <thead>
                                   Se muestra el Reporte
                                    </tbody>
                            </table>

                    </div>

                        
                    </div>

                    <div class="row">

                    </div>
                    
                    <br>

                    <div class="row">
                        
                        <div class="col s12 m4 l4">
                            
                            <a href="#" class="waves-effect waves-light btn" style="width: 100%;background-color: #1b479a;">Imprimir</a>
                            </div>
                        
                        <div class="col s12 m4 l4">
                            <a href="#" class="waves-effect waves-light btn" style="width: 100%;background-color: #1b479a;">Exportar</a>
                        </div>
                                             
                    </div>

            </div>

        </div>

        <!-- Fin de card 3 -->
    </div>
    
  
  </div>



</section>


  <!-- Modal Structure -->

<?php 
 include_once './View/modal-asigna-establecimiento.php';
 ?>


  <!-- Fin modal Structure -->

</main>    

 <!--   Pie de página -->

<?php 
 include_once './View/Plantillas/pie.php';
 ?>


</body>
</html>