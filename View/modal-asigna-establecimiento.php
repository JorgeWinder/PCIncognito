<div id="modal1" class="modal">
    <div class="modal-content">
      <h5 style="color: #112d5c;">Registro de establecimiento</h5>
      <hr>
      <p>
                <div class="row">
                    <div class="input-field col s12 l3">
                                    <i class="material-icons prefix">library_books</i>
                                    <input id="idEstablecimiento" type="text" placeholder="Código" readonly>
                                    <label for="idEstablecimiento" class=""></label>
                    </div>  
                    <div class="input-field col s12 l9">
                                    <i class="material-icons prefix">business</i>
                                    <input id="NombreEstablecimiento" type="text" value="">
                                    <label for="NombreEstablecimiento" class="">Nombre establecimiento</label>
                    </div>
                    <div class="input-field col s12 l12">                                    
                                    <input id="Direccion" type="text" value="">
                                    <label for="Direccion" class="">Dirrección</label>
                    </div> 
                     
                    <div class="input-field col s12 l6">
                            <i class="material-icons prefix">map</i>
                            <select id="cboDepartamento">
                            <option value="0" disabled selected>Seleccione departemento</option>
                            <!-- <option value="1">Administrador</option>                             -->
                            </select>
                    </div>
                    <div class="input-field col s12 l6">
                            <i class="material-icons prefix">map</i>
                            <select id="cboProvincia">
                            <option value="0" disabled selected>Seleccione provincia</option>
                            <!-- <option value="1">Administrador</option>                             -->
                            </select>
                    </div>
                    <div class="input-field col s12 l12">
                            <i class="material-icons prefix">map</i>
                            <select id="cboDistrito">
                            <option value="0" disabled selected>Seleccione distrito</option>
                            <!-- <option value="1">Administrador</option>                             -->
                            </select>
                    </div>
                    <div class="input-field col s12 l6">                                    
                                    <input id="Longitud" type="text" value="">
                                    <label for="Longitud" class="">Longitud</label>
                    </div>
                    <div class="input-field col s12 l6">                                    
                                    <input id="Latitud" type="text" value="">
                                    <label for="Latitud" class="">Latitud</label>
                    </div>
                    
                       
                </div>

      </p>

    </div>
    <div class="modal-footer">
        <a id="btnregistrarEst" href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;">Registar</a>
        <a href="javascript:void()" class="waves-effect waves-light btn" style="background-color: #f39c12;">Modificar</a>
        <a href="javascript:void()" class="modal-close waves-effect waves-light btn" style="background-color: #f39c12;">Salir</a>
    </div>
  </div>


