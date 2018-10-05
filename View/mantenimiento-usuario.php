<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once './View/Plantillas/cabecera.php'; ?>

    <!-- Script / Estilos CSS / Recursos solo de la página actual -->
    <script src="Recursos/js/ion.rangeSlider.js"></script>
    <script src="View/Scripts/mantenimiento-usuario.js"></script>
    <script src="View/Scripts/validacion.js"></script>
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
        <li class="tab col s4"><a class="active" href="#test1">Registro de colaborador</a></li>
        <li class="tab col s4"><a href="#test2">Registar usario cliente</a></li>
        <li class="tab col s4"><a href="#test3">Registar encuestador</a></li>
        <!-- <li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li> -->
        
      </ul>
    </div>

    <div id="test1" class="col s12">

        <!-- inicio de card colaborador -->
    
        <div class="card white">
            <div class="card-content" style="font-weight: 500;">
                <!--<span class="card-title center-align" style="border-left: 7px solid #e85b21;border-right: 7px solid #e85b21;">INGRESAR</span>-->
                <span class="card-title" style="padding-bottom: 10px;"></span>
                
                <div class="row">
                    <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">library_books</i>
                                    <input id="dni" type="text" value="" style="">
                                    <label for="dni" class="">Documento de identidad</label>
                    </div>        
                </div>

                <div class="row">
                    <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">face</i>
                                    <input id="Nombres" type="text" value="">
                                    <label for="Nombres" class="">Nombres</label>
                    </div>
                    <div class="input-field col s12 l6">
                                    <!-- <i class="material-icons prefix">library_books</i> -->
                                    <input id="Apellidos" type="text" value="" style="">
                                    <label for="Apellidos" class="">Apellidos</label>
                    </div>                            
                </div>

                <div class="row">        
                    <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">email</i>
                                    <input id="Correo" type="text" value="">
                                    <label for="Correo" class="">Correo electrónico</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">account_box</i>
                            <select id="cboPerfil">
                            <option value="" disabled selected>Seleccione perfil de usuario</option>
                            <option value="1">Administrador</option>                            
                            </select>                        
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">https</i>
                                    <input id="Password" type="password" value="">
                                    <label for="Password" class="">Contraseña</label>
                                    <i class="material-icons" style="display: inline-block !important;">https</i>                                            
                    </div>        
                    <div class="input-field col s12 l6">
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 l12 center-align">
                        <a id="btnnuevo" href="" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Nuevo</a>
                        <a id="btnregistrar" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Registrar</a>
                        <a id="btnmodificar" href="#" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Modificar</a>
                        <a id="btneliminar" href="#" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Eliminar</a>
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
                       

                        <div class="input-field col l4 s12">

                            <i class="material-icons prefix">business</i>
                            <input type="text" id="autocomplete-inputx" class="autocomplete">
                            <label for="autocomplete-inputx">Ingrese código de proyecto</label>

                        </div>

                        <div class="input-field col l8 s12">
                            <!-- <i class="material-icons prefix">business</i> -->
                            <input id="icon_telephone" type="text" class="validate" disabled>
                            <label for="icon_telephone">Nombre de proyecto</label>
                        </div>                
                        
                    </div>

                    <div class="row">

                        <div class="col s12 m12">

                            <ul class="collection with-header">
                                <li class="collection-header"><h5>Lista de preguntas</h5></li>
                                <li class="collection-item">
                                    <label>                
                                        <input id="task1" type="checkbox" class="filled-in"/>
                                        <span>P1. Calidad de la recepción</span>
                                        <a href="#" class="secondary-content"><span class="ultra-small">Ver repuesta</span></a>
                                    </label>
                                </li>
                                <li class="collection-item">
                                    <label>                
                                        <input id="task1" type="checkbox" class="filled-in"/>
                                        <span>P2. ¿El personal comprendió su solicitud sin dificultad?</span>
                                        <a href="#" class="secondary-content"><span class="ultra-small">Ver repuesta</span></a>
                                    </label>
                                </li>
                                <li class="collection-item">
                                    <label>                
                                        <input id="task1" type="checkbox" class="filled-in"/>
                                        <span>P3. ¿El personal ofreció otros productos, promociones y/o ofertas además de su solicitud inicial?</span>
                                        <a href="#" class="secondary-content"><span class="ultra-small">Ver repuesta</span></a>
                                    </label>
                                </li>
                                <li class="collection-item">
                                    <label>                
                                        <input id="task1" type="checkbox" class="filled-in"/>
                                        <span>P4. ¿El personal tenía conocimiento de los productos, promociones y/o ofertas que se brindan en el local?</span>
                                        <a href="#" class="secondary-content"><span class="ultra-small">Ver repuesta</span></a>
                                    </label>
                                </li>

                                <li class="collection-item">
                                    <label>                
                                        <input id="task1" type="checkbox" class="filled-in"/>
                                        <span>P5. ¿El personal interrumpió su atención por una llamada telefónica, compañero de trabajo u otra situación que no corresponde; y no se disculpó?</span>
                                        <!-- <a href="#" class="secondary-content"><span class="ultra-small">Pregunta</span></a> -->
                                    </label>
                                </li>

                                <li class="collection-item">
                                    <label>                
                                        <input id="task1" type="checkbox" class="filled-in"/>
                                        <span>P6. ¿El personal le indicó un tiempo aproximado estimado de espera para recibir su orden o servicio?</span>
                                        <a href="#" class="secondary-content"><span class="ultra-small">Ver repuesta</span></a>
                                    </label>
                                </li>

                                <li class="collection-item">
                                    <label>                
                                        <input id="task1" type="checkbox" class="filled-in"/>
                                        <span>P7. ¿El personal fue amable durante su atención?</span>
                                        <a href="#" class="secondary-content"><span class="ultra-small">Ver repuesta</span></a>
                                    </label>
                                </li>

                                <li class="collection-item">
                                    <label>                
                                        <input id="task1" type="checkbox" class="filled-in"/>
                                        <span>P8. Durante su atención ¿El personal fue seguro en sus respuestas?</span>
                                        <a href="#" class="secondary-content"><span class="ultra-small">Ver repuesta</span></a>
                                    </label>
                                </li>

                            </ul>

                                                    
                        </div>


                    </div>
                    
                    <br>

                    <div class="row">
                        
                        <div class="col s12 m4 l4">
                            <!-- <a href="#" class="waves-effect waves-light btn" style="width: 100%;background-color: #1b479a;">Agregar fila</a> -->
                        </div>

                        <div class="col s12 m4 l4">
                                <a href="#" class="waves-effect waves-light btn" style="width: 100%;background-color: #f39c12;">Crear cuestionario</a>
                        </div>
                        <div class="col s12 m4 l4">
                                <a href="./pautas-e-indicaciones" class="waves-effect waves-light btn disabled" style="width: 100%;background-color: #f39c12;">Borrar cuestionario</a>
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
                            <label for="autocomplete-input2">Ingrese código de proyecto</label>

                        </div>

                        <div class="input-field col l8 s12">
                            <!-- <i class="material-icons prefix">business</i> -->
                            <input id="icon_telephone" type="text" class="validate" disabled>
                            <label for="icon_telephone">Nombre de proyecto</label>
                        </div>


                        <div class="col s12 l12">

                            <table class="highlight responsive-table" style="margin-top: 20px;">
                                    <thead>
                                    <tr style="color: #f39c12;">
                                        <th>N.° de DNI</th>
                                        <th>Nombres y apellidos</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>45347734</td>
                                        <td>Jorge Gerald Winder Avila</td>
                                        <td class="center-left">
                                            <a href="#modal1" class="waves-effect waves-light btn modal-trigger" style="background-color: #f39c12;">Establecimientos asignados</a>    
                                        </td> 
                                        <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">add_box</i></a></td>
                                        <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">remove_circle_outline</i></a></td>
                                                                               
                                    </tr>
                                    <tr>
                                        <td>29722385</td>
                                        <td>Claudia Alejandra Velasquez Diaz</td>
                                        <td class="center-left">
                                            <a href="#modal1" class="waves-effect waves-light btn modal-trigger" style="background-color: #f39c12;">Establecimientos asignados</a>    
                                        </td> 
                                        <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">add_box</i></a></td>
                                        <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">remove_circle_outline</i></a></td>
                                           
                                    </tr>
                                    <tr>
                                        <td>00000000</td>
                                        <td>

                                            <div class="input-field">
                                                <!-- <i class="material-icons prefix">search</i>                                             -->
                                                <input id="search" placeholder="Buscar encuestador">
                                                <div class="search-results" style="padding-left: 5px;">
                                                    <a style="display: block;" href="#">Jorge Winder Avila</a>
                                                    <a style="display: block;" href="#">Claudia Velasquez</a>
                                                    <a style="display: block;"  href="#">Rosa María Flores</a>
                                                </div>
                                            </div>

                                        </td>
                                        <td class="center-left">
                                            <a href="./agencias-asignadas" class="waves-effect waves-light btn disabled" style="background-color: #f39c12;">Establecimientos asignados</a>    
                                        </td> 
                                        <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">add_box</i></a></td>
                                        <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">remove_circle_outline</i></a></td>
                                        
                                    </tr>
                                    </tbody>
                            </table>

                    </div>

                        
                    </div>

                    <div class="row">

                    </div>
                    
                    <br>

                    <div class="row">
                        
                        <div class="col s12 m4 l4">
                            <a href="#" class="waves-effect waves-light btn" style="width: 100%;background-color: #1b479a;">Agregar nuevo</a>
                        </div>
                                             
                    </div>

            </div>

        </div>

        <!-- Fin de card 3 -->
    </div>
    
  
  </div>



</section>


  <!-- Modal Structure -->

  <div id="modal1" class="modal">
    <div class="modal-content">
      <h5 style="color: #112d5c;">Establecimientos asignados</h5>
      <hr>
      <p>
                <table class="highlight responsive-table" style="margin-top: 20px;">
                        <thead>
                        <tr style="color: #f39c12;">
                            <th>Entidad</th>
                            <th>Establecimiento</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Interbank</td>
                            <td>IBK Plaza Vea Brasil</td>
                            <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">save</i></a></td>
                            <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">remove_circle_outline</i></a></td>
                                                                   
                        </tr>
                        <tr>
                            <td>Interbank</td>
                            <td>IBK Centro Civico Real Plaza</td>
                            <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">save</i></a></td>
                            <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">remove_circle_outline</i></a></td>
                               
                        </tr>
                        <tr>
                            <td>*********</td>
                            <td>
                                <div class="input-field">
                                    
                                    <input id="search" placeholder="Buscar establecimiento">
                                    <div class="search-results" style="padding-left: 5px;">
                                        <a style="display: block;" href="#">IBK Plaza Vea Brasil</a>
                                        <a style="display: block;" href="#">IBK Centro Civico Real Plaza</a>
                                        <a style="display: block;"  href="#">IBK C.C. Royal Plaza</a>
                                    </div>
                                </div>
                            </td>
                            <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">save</i></a></td>
                            <td><a href="#"><i class="material-icons prefix" style="font-size: 30pt;">remove_circle_outline</i></a></td>
                            
                        </tr>
                        </tbody>
                </table>

      </p>

        <div class="row">                        
                <div class="col s12 m6 l6">
                    <a href="#" class="waves-effect waves-light btn" style="width: 100%;background-color: #1b479a;">Nuevo establecimiento</a>
                </div>                                             
        </div>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-light btn" style="background-color: #f39c12;">Salir</a>
    </div>
  </div>

  <!-- Fin modal Structure -->

</main>    

 <!--   Pie de página -->

<?php 
 include_once './View/Plantillas/pie.php';
 ?>


</body>
</html>