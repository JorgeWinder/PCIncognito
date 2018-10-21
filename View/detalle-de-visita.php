<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once './View/Plantillas/cabecera.php'; ?>

    <!-- Script / Estilos CSS / Recursos solo de la página actual -->
    <script src="Recursos/js/ion.rangeSlider.js"></script>
    <script src="View/Scripts/detalle-de-visita.js"></script>
    <link rel="stylesheet" href="Recursos/css/ion.rangeSlider.css" /> 
    <link rel="stylesheet" href="Recursos/css/ion.rangeSlider.skinFlat.css" />
    <!-- Fin de Script / Estilos CSS  -->

    <style>
    
    </style>

</head>

<body style="background-color: white;">

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="Recursos/js/materialize.min.js"></script>

<?php 
 include_once './View/Plantillas/menulogin.php';
 ?>

<main>


<section class="container" style="margin: 55px auto 0;max-width: 900px;">

    <h5><span class="" style="color: #f39c12;padding-bottom: 10px;"> 
    <?php 
        if($_REQUEST['visita']==1){
            echo "<i class='material-icons prefix'>filter_1</i> Detalle de visita uno</span></h5>";
        }else if($_REQUEST['visita']==2){
            echo "<i class='material-icons prefix'>filter_2</i> Detalle de visita dos</span></h5>";
        }else if($_REQUEST['visita']==3){
            echo "<i class='material-icons prefix'>filter_3</i> Detalle de visita tres</span></h5>";
        }else if($_REQUEST['visita']==4){
            echo "<i class='material-icons prefix'>filter_2</i> Detalle de visita cuatro</span></h5>";
        }
    ?> 
    <hr>
    <br><br>

    <input type="hidden" id="idProyecto">
    <input type="hidden" id="NombreEntidad">
    <input type="hidden" id="visita" value="<?php echo $_REQUEST['visita']; ?>">
    <input type="hidden" id="idVisitasAsignadas" value="<?php echo $_REQUEST['idva']; ?>">
    <input type="hidden" id="idEncuestador" value="<?php echo $_REQUEST['dnienc']; ?>">

    <div class="row">
        <div class="input-field col s12 l6">
                          <i class="material-icons prefix">home</i>
                          <input id="NombreEstablecimiento" type="text" style="font-weight: 600;" value="" rearonly>
                          <label for="NombreEstablecimiento" class="">Establecimiento</label>
        </div>        
        <div class="input-field col s12 l6">
                          <i class="material-icons prefix">map</i>
                          <input id="Direccion" type="text" style="font-weight: 600;" value="" rearonly>
                          <label for="Direccion" class="">Dirección</label>
        </div>
    </div>

<form action="#" >

    <div class="row">
        
    
            <div class="file-field input-field col s12 l12">
                <div class="btn" style="background-color: #1b479a">
                    <span>File</span>
                    <input type="file" name="image" id="archivo">
                </div>                    
                <div class="file-path-wrapper">
                    <input class="file-path" type="text" placeholder="Seleccione el archivo de video">
                </div>

                <br>
                <div class="progress right" style="width: 50%;">
                    <div class="determinate" style="width: 1%"></div>
                </div>
                
            </div>
                      
    </div>


    <div class="row">
        <div class="col s12 l3"> 
            <button type="submit" class="waves-effect waves-light btn" style="width: 100%;margin-top: 10px;background-color: #1b479a;">Cargar video</button>
            <!-- <a href="#" class="waves-effect waves-light btn" style="width: 100%;margin-top: 10px;background-color: #1b479a;">Cargar</a> -->
        </div>
        <div class="col s12 l3">
            <a id="cancel" href="#" class="waves-effect waves-light btn" style="width: 100%;margin-top: 10px;background-color: #1b479a;">Cancelar</a>
        </div>
        <div class="input-field col s12 l6">
                          <i class="material-icons prefix">date_range</i>
                          <input id="icon_prefix3" type="date" class="validate" value="Agencia Interbank Vea Brasil" style="font-weight: 700;" disabled>
                          <label for="icon_prefix3" class="">Fecha de cargado</label>
        </div>        
    </div>

</form>

    <hr>

    <div class="row">
        <div class="input-field col s12 l6">
            <i class="material-icons prefix">date_range</i>
            <input type="text" class="datepicker"  placeholder="Fecha de visita">            
        </div>
    </div>

    <div class="row">
        <div class="col s12 l12">
            <h5 style="color: #f39c12;"><u>Observaciones:</u></h5>            
            <br><br>            
        </div>

        <div class="col s12 l6">
            
            <label>                
                <input type="checkbox" class="filled-in" checked="checked"/>
                <span>CAMBIO DE DIRECCIÓN</span>
            </label>
            <br><br>
            <label>                
                <input type="checkbox" class="filled-in"/>
                <span>DIRECCIÓN NO EXISTE</span>
            </label>
            <br><br>
            <label>                
                <input type="checkbox" class="filled-in"/>
                <span>EL LOCAL YA NO FUNCIONA EN ESTA DIRECCIÓN</span>
            </label>

        </div>

        <div class="col s12 l6">
            
            <label>                
                <input type="checkbox" class="filled-in"/>
                <span>NO SE REALIZAN LOS CAMBIOS</span>
            </label>
            <br><br>
            <label>                
                <input type="checkbox" class="filled-in"/>
                <span>NO HAY OBSERVACIONES</span>
            </label>
            <br><br>
            <label>                
                <input type="checkbox" class="filled-in"/>
                <span>OTROS</span>
                <input id="icon_prefix3" type="text" class="validate" value="" style="" placeholder="Escriba otras observaciones">
            </label>
            
        </div>

    </div>

    <div class="row">
        <div class="col s12 l12 right-align">
            <a href="#" class="waves-effect waves-light btn" style="background-color: #f39c12;">Grabar</a>
            <a href="./agencias-asignadas" class="waves-effect waves-light btn" style="background-color: #f39c12;">Volver</a>
        </div>    
    </div>


</section>


<script>


        // $('.upload-all').click(function(){
        //     //submit all form
        //     $('form').submit();
        // });
        // $('.cancel-all').click(function(){
        //     //submit all form
        //     $('form .cancel').click();
        // });

        $(document).on('submit','form',function(e){

            e.preventDefault();
            $form = $(this);
            uploadImage($form);

        });

        function uploadImage($form){

            $form.find('.progress div').removeClass('determinate')
                                        .addClass('indeterminate');
            var formdata = new FormData($form[0]); //formelement
            var request = new XMLHttpRequest();
            
            //progress event...
            request.upload.addEventListener('progress',function(e){
                var percent = Math.round(e.loaded/e.total * 100);
                // $form.find('.progress-bar').width(percent+'%').html(percent+'%');
                $form.find('.progress div').removeClass('indeterminate').addClass('determinate').width(percent+'%');
            });

            //progress completed load event
            request.addEventListener('load',function(e){
                $form.find('.progress div').removeClass('indeterminate').addClass('determinate').width('100%');
                alert("Archivo cargado");
                    //InsertaMaterial();
                    //ruta = "upload-folder/" + $("#dni").val() + "/" + $("#cliente").val() +  " - " + $("#oficina").val() +  "/" + document.getElementById('archivo').files[0].name;
                    
            });			
            
            //request.open('post', 'upload.php?dni=' + $("#dni").val() + '&cliente=' + $("#cliente").val() + '&oficina=' + $("#oficina").val() );
            request.open('post', 'upload.php?proyecto=' + $("#idProyecto").val() + '&dni=' + $("#idEncuestador").val() + '&entidad=' + $("#NombreEntidad").val() + '&establecimiento=' + $("#NombreEstablecimiento").val() + '&visita=Visita' + $("#visita").val() );
            request.send(formdata);
            
            $form.on('click','#cancel',function(){
                request.abort();
                //$form.find('.progress div').removeClass('indeterminate').addClass('determinate').width('1%');
                $form.find('.progress div').width('1%');
            });

        }


</script>


</main>    

 <!--   Pie de página -->

<?php 
 include_once './View/Plantillas/pie.php';
 ?>


</body>
</html>