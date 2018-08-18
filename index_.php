<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Itala Migone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <?php include_once './View/Plantillas/cabecera.php'; ?>

      <!-- Script / Recurso de la página actual-->

      <link rel="stylesheet" type="text/css" media="screen" href="Recursos/css/portada.css" />

      <!-- -------------------------- -->

      <script>

 
         /* Script de carrusel slider página principal */

           $(document).ready(function(){
            

              $('.sidenav').sidenav();

              $('.carousel.carousel-slider').carousel({
                    fullWidth: true,
                    indicators: true,                    
              });

              $('.slider').slider({
                height: 540
              });

         /* Script de carrusel video historias página principal */                  
              
              $('.sliderx').bxSlider({
                    mode: 'horizontal',
                    auto: true,
                    pause: 4000,
                    slideWidth: 1000

              }); 
              
              
          /* Script scroll click */     

            $('a').click(function(){
                $('html, body').animate({
                    scrollTop: $( $(this).attr('href') ).offset().top - 50
                }, 1500);
                return false;
            });    
            

          });

          /* Evento al terminar de cargar la página*/   
          
          $(window).on("load", function (e) {
            $('#page-preloader').fadeOut(500);                
          })


        
      </script>

      <style>
         
      </style>


</head>
<body>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="Recursos/js/materialize.min.js"></script>

    <!-- preloader  -->
    <?php 
    include_once './View/Plantillas/preload.php';
    ?>
    <!-- --> 

<?php 
 include_once './View/Plantillas/menu.php';
 ?>
<!--
  <div class="carousel carousel-slider">
    <a class="carousel-item" href="#"><img src="Recursos/img/portadav3.jpg"></a>
    <a class="carousel-item" href="#"><img src="Recursos/img/portadav3.jpg"></a>
  </div>

-->

<!-- Botón flotante de mensajeria  -->

<?php 
 include_once './View/Plantillas/mensajeria.php';
?>

<!-- ---------------- -->

  <!--  Hacer slider principal con mZ   -->

            <div class="slider">
                <ul class="slides">
                <li>
                    <img id="img1" src="Recursos/img/portadav3.jpg"> <!-- random image -->
                    <!-- <div class="caption center-align"> -->
                    <div class="caption left-align">
                    <h3 style="text-shadow: 2px 2px 3px #424242;">Una foto se convertirá</h3>
                    <h5 class="light white-text text-lighten-3" style="text-shadow: 2px 2px 2px #424242;">en la gran prueba de nuestro amor<br>para toda la vida</h5>
                    </div>
                </li>
                <li>
                    <img id="img2" src="Recursos/img/Portada02.jpg"> <!-- random image -->
                    <div id="txtport2" class="caption right-align" style="margin-left: 50px;">
                    <h3 style="text-shadow: 2px 2px 3px #757575;">Y será la excusa perfecta</h3>
                    <h5 class="light white-text text-lighten-3" style="text-shadow: 2px 2px 3px #757575;">para tener al lado a nuestros hijos,<br>tengan la edad que tengan.</h5>
                    </div>
                </li>
                
                </ul>                

            </div>

  <!-- ----------------------------- -->

  <div class="container" style="padding-top: 5rem;">
        
        <div class="row valign-wrapper">

            <div class="col s12 m4">
                <img src="Recursos/img/itala4.png" alt="" class="circle responsive-img">                
            </div>

            <div class="col s12 m8">
                <h4 style="color: #e59691;">Itala Migone</h4>
                <h6><u>Fotógrafa y mamá de Juan Pablo</u></h6>
                <p>La fotografia siempre formó parte de mi vida. La etapa de mamá, me vinculó aún más con ella. Este vínculo me dió la oportunidad de ver crecer a mi hijo para guardar cada momento de amor, en una foto.</p>
                <button id="btn_sobremi" class="waves-light btn-small" style="background-color: #b56289;">Conóceme</button>
            </div>

        </div>             

  </div>

<!--   Lista de servicios -->

  <div id="categorias" class="container-wide">

        <div class="row" style="padding-top: 5rem;">
           <div id="pr1" class="col s12 m4 red center-align" style="height:480px;padding: 0px;">                
                <!--<img  class="" style="position: relative;height: auto;" src="Recursos/img/PortadaEM.jpg" width="100%"> -->
                <a href="./embarazo.php" class="waves-effect waves-light btn" style="top: 81%;background-color: #b56289;">Embarazo</a>
           </div>
           <div id="pr2" class="col s12 m4 blue center-align" style="height:480px;padding: 0px;">
                <a href="./newborn.php" class="waves-effect waves-light btn" style="top: 81%;background-color: #b56289;">Newborn</a>
           </div>
           <div id="pr3" class="col s12 m4 green center-align" style="height:480px;padding: 0px;">
                <!--<button id="btn_categorias" style="border:1px solid white; background-color:transparent;">Smash Cake</button> --> 
                <a href="./smashcake.php" class="waves-effect waves-light btn" style="top: 81%;background-color: #b56289;">smash cake</a>               
           </div>
        </div>
    
  
  </div>

 <!--   Carrusel con bxslider para historias -->

  <div id="historias" class="container" style="padding: 4rem 0 4rem 0;">
  <div class="sliderx" style="padding: 5px;">
    <div>


        <div class="row" style="padding: 25px;box-shadow: 0 2px 5px rgba(0,0,0,0.5)">

            <div class="col s12 m4">
                <div class="video-container">
                    <iframe width="853" height="480" src="//www.youtube.com/embed/3BeGmFVlikM" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
                        
            <div class="col s12 m8">
                <h4>La fotografía y  yo(Itala)</h4>                
                <p>La fotografía siempre formó parte de mi vida, y mi etapa de mamá, me viculo aún mucho más con ella.</p>
                <button id="btn_sobremi" class="waves-light btn-small" style="background-color: #b56289;">Ver más historias</button>
            </div>

        </div>


    </div>
    
    <div>


        <div class="row" style="padding: 25px;box-shadow: 0 2px 5px rgba(0,0,0,0.5)">

            <div class="col s12 m4">
                <div class="video-container">
                    <iframe width="853" height="480" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
                        
            <div class="col s12 m8">
                <h4>Fabiola y Walter :</h4>                
                <p>"La fotografia es el gran momento que quedará guardado para toda nuestras vidas." </p>
                <button id="btn_sobremi" class="waves-light btn-small" style="background-color: #b56289;">Ver más historias</button>
            </div>

        </div>


    </div>

    <!--
    <div>

        
        <div class="row" style="padding: 25px;box-shadow: 0 2px 5px rgba(0,0,0,0.5)">

            <div class="col s12 m4">
                <div class="video-container">
                    <iframe width="853" height="480" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
                        
            <div class="col s12 m8">
                <h4>Historias</h4>                
                <p>Awesome app! So glad I wondered across your site today. Great user onboarding experience. AARON MYHRE, DIGITAL NOMAD</p>
                <button id="btn_sobremi" class="waves-light btn-small" style="background-color: #b56289;">Ver más historias</button>
            </div>

        </div>

        

    </div>
    -->
    

  </div>
  </div>



 <!--   Pie de página -->

<?php 
 include_once './View/Plantillas/pie.php';
 ?>



</body>
</html>