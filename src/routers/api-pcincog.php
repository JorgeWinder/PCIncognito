<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;  
    
    
    // Acceso colaborador

    $app->post('/api-pcincog/colaborador/acceso',  function(Request $request, Response $response) {        
 
        $Correo = $request->getParam('Correo');    
        $Password = $request->getParam('Password');
        
        $sql = "SELECT col.* , per.NombrePerfil FROM colaborador col, perfil per where col.idPerfil=per.idPerfil and col.Correo='$Correo' and ";
    
        try{
            // Get DB Object
            $db = new db();
            // Connect
            $db = $db->connect();
            $stmt = $db->query($sql);
            $colaboradores = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;                 
            
            if(count($colaboradores)==1 && password_verify($Password, $colaboradores[0]->Password))
            {   
               session_start(); 
    
               $_SESSION["Nombres"]=$colaboradores[0]->Nombres;
               $_SESSION["Apellidos"]=$colaboradores[0]->Apellidos;
               $_SESSION["Correo"]=$colaboradores[0]->Correo;
               $_SESSION['NombrePerfil']=$colaboradores[0]->NombrePerfil;               
               
               echo json_encode(TRUE); 
            }  else {       
    
               echo json_encode(FALSE); 
            }
    
            } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
        }
    
              
    });


    $app->get('/api/encuesta/{id}', function (Request $request, Response $response) {
        $name = $request->getAttribute('id');    
        $response->getBody()->write("Hello, $name");
        return $response;
    });

    // Registrar colaborador

    $app->post('/api-pcincog/colaborador/add', function(Request $request, Response $response){

        $idColaborador = $request->getParam('idColaborador');
        $Nombres = $request->getParam('Nombres');
        $Apellidos = $request->getParam('Apellidos');
        $Correo = $request->getParam('Correo');
        $idPerfil = $request->getParam('idPerfil');        
        $Password = password_hash($request->getParam('Password'), PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO colaborador (idColaborador, Nombres, Apellidos, Correo, idPerfil, Password) VALUES ('$idColaborador', '$Nombres', '$Apellidos', '$Correo', '$idPerfil', '$Password')";

        try{
            // Get DB Object
            $db = new db();
            // Connect
            $db = $db->connect();
            $stmt = $db->prepare($sql);
    
            if($stmt->execute())
            {
    /*            session_start(); 
                $_SESSION["pagina"]='/encuesta/pagina-dos';*/
                echo json_encode(TRUE);
            }
        
        } catch(PDOException $e){
            //echo '{"error": {"text": '.$e->getMessage().'}';
            echo json_encode(FALSE);
        }
    });
