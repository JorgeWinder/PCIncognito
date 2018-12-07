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






<div id="modal2" class="modal">
    <div class="modal-content">
        <h5 style="color: #112d5c;">Clientes </h5>
        <hr>
        <p>

                <!-- <div class="card white"> -->
            <!-- <div class="card-content"> -->
                <!--<span class="card-title center-align" style="border-left: 7px solid #e85b21;border-right: 7px solid #e85b21;">INGRESAR</span>-->
                <span class="card-title" style="color: #f39c12;padding-bottom: 10px; padding: 0 5% 10px 5%;">

                    <!-- <div class="input-field col l6 s12" style="border: 50px;"> -->
                    <div class="input-field" style="border: 50px;">
                                <input id="search3" onkeyup="autocompleta3()" style="padding-left: 4rem; width: calc(100% - 4rem);" placeholder="Busqueda de usuario cliente" type="search" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                                <div id="searchRS3" class="collection" style="padding-left: 0px;position: absolute;background-color: white;z-index: 100;font-size: 16px;display: none;">
                                            <!-- <a style="" href="#" class="collection-item">45347734 - JORGE WINDER</a>
                                            <a style="" href="#" class="collection-item">29722385 - CLAUDIA VELASQUEZ</a>
                                            <a style="" href="#" class="collection-item">36589757 - ROSA VASQUEZ MORENO</a> -->
                                </div>
                    </div>   


    
                    <!-- div de boton OTRA ENTIDAD -->
                    <!-- <div class="input-field col l3 s12"> -->
                    <!-- <div class="input-field col l3 s12">
                    <a id="" href="JavaScript:void()" onclick="$('#btnadd').attr('disabled','true');$('#tablaestable tbody tr').remove();$('#search2').val('').focus();" class="waves-effect waves-light btn" style="width: 100%;background-color: #f39c12;">Clientes</a>
                    </div>      -->

              
                </span>
                
                <div class="row">
                    <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">library_books</i>
                                    <input id="Ruc3" type="text" value="" style="">
                                    <label for="Ruc3" class="">RUC</label>
                    </div>        
                </div>

                <div class="row">
                    <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">face</i>
                                    <input id="NombreCliente3" type="text" value="">
                                    <label for="NombreCliente3" class="">Nombre Cliente</label>
                    </div>
                    <div class="input-field col s12 l6">
                                    <!-- <i class="material-icons prefix">library_books</i> -->
                                    <input id="RazonSoc3" type="text" value="" style="">
                                    <label for="RazonSoc3" class="">Razón Social</label>
                    </div>                            
                </div>

                <div class="row">        
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">email</i>
                        <input id="Contacto3" type="text" value="">
                        <label for="Contacto3" class="">Contacto</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">phone</i>
                        <input id="TelefonoContacto3" type="text" value="">
                        <label for="TelefonoContacto3" class="">Teléfono Contacto</label>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">https</i>
                                    <input id="Password3" type="password" value="">
                                    <label for="Password3" class="password">Contraseña</label>                                    
                    </div>         -->
                    <!-- <div class="input-field col s12 l6"> -->
                        <!-- <i class="material-icons prefix">vpn_key</i> -->
                        <!-- <input id="Password" type="password" value=""> -->
                        <!-- <label for="Password" class="password">Cambiar password</label>  -->
                    <!-- </div>
                </div> -->

                <div class="row">
                    <div class="col s12 l12 center-align">
                        <a id="btnnuevo3" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Nuevo</a>
                        <a id="btnregistrar3" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Registrar</a>
                        <a id="btnmodificar3" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Modificar</a>
                        <a id="btneliminar3" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;width:20%;">Eliminar</a>
                    </div>    
                </div>
                    
            <!-- </div> -->

        <!-- </div> -->



    </div>
</div>