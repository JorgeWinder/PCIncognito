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
        <li class="tab col s4"><a href="#test2">Registar encuestador</a></li>
        <li class="tab col s4"><a href="#test3">Registar usuario cliente</a></li>
        <!-- <li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li> -->
        
      </ul>
    </div>

    <div id="test1" class="col s12">

        <!-- inicio de card colaborador -->
    
        <div class="card white">
            <div class="card-content" style="font-weight: 500;">
                <!--<span class="card-title center-align" style="border-left: 7px solid #e85b21;border-right: 7px solid #e85b21;">INGRESAR</span>-->
                <span class="card-title" style="padding: 0 5% 10px 5%;">  

                        <div class="input-field" style="border: 50px;">
                            <input id="search"  style="padding-left: 4rem; width: calc(100% - 4rem);" placeholder="Busqueda de colaborador" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                            <div id="searchResults" ></div>
                        </div>          

                </span>
                
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
                            <!-- <option value="1">Administrador</option>                             -->
                            </select>                        
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">https</i>
                                    <input id="Password" type="password" value="">
                                    <label for="Password" class="">Contraseña</label>                                    
                    </div>        
                    <div class="input-field col s12 l6">
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 l12 center-align">
                        <a id="btnnuevo" href="" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Nuevo</a>
                        <a id="btnregistrar" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Registrar</a>
                        <a id="btnmodificar" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Modificar</a>
                        <a id="btneliminar" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Eliminar</a>
                    </div>    
                </div>
                

            </div>
        </div>

        <!-- Fin de card -->
    
    </div>
    
    <div id="test2" class="col s12">
        
        <!-- inicio de card encuestador -->
    
        <div class="card white">
            <div class="card-content" style="font-weight: 500;">
                <!--<span class="card-title center-align" style="border-left: 7px solid #e85b21;border-right: 7px solid #e85b21;">INGRESAR</span>-->
                <span class="card-title" style="padding: 0 5% 10px 5%;">  

                        <div class="input-field" style="border: 50px;">
                            <input id="search" onkeyup="autocompleta(1)" style="padding-left: 4rem; width: calc(100% - 4rem);" placeholder="Busqueda de encuestador" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                            <div id="search-results" class="collection" style="padding-left: 0px;position: absolute;background-color: white;z-index: 100;font-size: 16px;">
                                        <a style="" href="#" class="collection-item">45347734 - JORGE WINDER</a>
                                        <a style="" href="#" class="collection-item">29722385 - CLAUDIA VELASQUEZ</a>
                                        <a style="" href="#" class="collection-item">36589757 - ROSA VASQUEZ MORENO</a>
                            </div>
                        </div>          

                </span>                
                
                <div class="row">
                    <div class="input-field col s12 l3">
                                    <i class="material-icons prefix">library_books</i>
                                    <input id="dni2" type="text" value="" style="">
                                    <label for="dni2" class="">N.° DNI</label>
                    </div>  
                    <div class="input-field col s12 l9">
                                    <i class="material-icons prefix">face</i>
                                    <input id="Nombres2" type="text" value="">
                                    <label for="Nombres2" class="">Nombres y apellidos</label>
                    </div>      
                </div>

                <div class="row">

                    <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">email</i>
                                    <input id="Correo2" type="text" value="" style="">
                                    <label for="Correo2" class="">Correo electrónico</label>
                    </div>  
                    <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="Telefono2" type="text" value="">
                                    <label for="Telefono2" class="">Teléfono</label>
                    </div>                             
                </div>

                <div class="row">
                    <div class="input-field col s12 l6">
                            <i class="material-icons prefix">map</i>
                            <select id="cboDistrito">
                            <option value="" disabled selected>Seleccione distrito</option>
                            <!-- <option value="1">Administrador</option>                             -->
                            </select>                        
                    </div>                        
                    <div class="input-field col s12 l6">
                                    
                                    <input id="Direccion2" type="text" value="">
                                    <label for="Direccion2" class="">Dirección</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">https</i>
                                    <input id="Password2" type="password" value="">
                                    <label for="Password2" class="">Contraseña</label>                                    
                    </div>        
                    <div class="input-field col s12 l6">
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 l12 center-align">
                        <a id="btnnuevo" href="" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Nuevo</a>
                        <a id="btnregistrar2" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Registrar</a>
                        <a id="btnmodificar2" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Modificar</a>
                        <a id="btneliminar2" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Eliminar</a>
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