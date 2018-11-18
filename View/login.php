<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once './View/Plantillas/cabecera.php'; ?>

    <!-- Script / Estilos CSS / Recursos de la página actual -->

    <script src="View/Scripts/login.js"></script> 

    <!-- Fin de Script / Estilos CSS  -->

    <script>

         $(document).ready(function () {

              $("#cbotipouser").change(function(){
                   
              });

         });
    
    
    </script>


</head>

<body style="background-color: #efefef;">

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="Recursos/js/materialize.min.js"></script>

<?php 
 include_once './View/Plantillas/menulogin.php';;
 ?>

<main>

    <section class="container" id="form" style="margin: 50px auto 0;max-width: 400px;">

        <div class="card white">
            <div class="card-content">
                <!--<span class="card-title center-align" style="border-left: 7px solid #e85b21;border-right: 7px solid #e85b21;">INGRESAR</span>-->
                <span class="card-title center-align" style="color: #f39c12;padding-bottom: 10px;">INGRESAR</span>
                
                    <div class="row">
                        <div class="input-field col s12">
                        <i class="material-icons prefix">markunread</i>
                        <input id="Correo" type="text">
                        <label for="Correo">Nombre de correo</label>
                        </div>

                        <div class="input-field col s12">
                        <i class="material-icons prefix">account_box</i>
                            <select id="cbotipouser">
                            <option value="" disabled selected>Seleccione tipo de usuario</option>
                            <option value="1">Encuestador</option>
                            <option value="2">Cliente</option>
                            <option value="3">Administrador</option>
                            </select>                        
                        </div>

                        <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="Password" type="password">
                        <label for="Password">Contraseña</label>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col s12 m12 l12">
                                <a id="btniniciar" href="javascript:void()" class="waves-effect waves-light btn" style="width: 100%;background-color: #f39c12;">Iniciar sesión</a>
                        </div>
                        
                    </div>

            </div>
            <div class="card-action center-align" style="font-size: 10px;">
                <a href="#">Olvidé mi contraseña</a>
                <!--<a href="#">This is a link</a> -->
            </div>
        </div>

    </section>

</main>    


 <!--   Pie de página -->

<?php 
 include_once './View/Plantillas/pie.php';
 ?>


</body>
</html>