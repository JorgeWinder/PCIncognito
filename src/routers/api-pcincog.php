<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;  
    
    
    // Acceso colaborador

    $app->post('/api-pcincog/colaborador/acceso',  function(Request $request, Response $response) {        
 
        $Correo = $request->getParam('Correo');    
        $Password = $request->getParam('Password');
        
        $sql = "SELECT col.* , per.NombrePerfil FROM colaborador col, perfil per where col.idPerfil=per.idPerfil and col.Correo='$Correo'";
    
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


    // Modificar colaborador

    $app->post('/api-pcincog/colaborador/update', function(Request $request, Response $response){
    
        $idColaborador = $request->getParam('idColaborador');

        $Nombres = $request->getParam('Nombres');
        $Apellidos = $request->getParam('Apellidos');
        $Correo = $request->getParam('Correo');
        $idPerfil = $request->getParam('idPerfil');        
        $Password = password_hash($request->getParam('Password'), PASSWORD_DEFAULT);
    
        $sql = "UPDATE colaborador SET Nombres='$Nombres' , 
        Apellidos='$Apellidos' , 
        Correo='$Correo' , 
        idPerfil='$idPerfil' , 
        Password='$Password'
        WHERE idColaborador='$idColaborador'";
    
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


    //Busqueda de colaborador

    $app->post('/api-sigop/cliente/busqueda',  function(Request $request, Response $response) { 
    
        $Nombres = $request->getParam('Nombres');
        
        $sql="SELECT * FROM cliente where  colaborador like '%$Nombres%' or  RucDnICL like '%$Nombres%'";
     
        try{
            
             // Get DB Object
             $db = new db();
             // Connect
             $db = $db->connect();
             $stmt = $db->query($sql);
             $productos = $stmt->fetchAll(PDO::FETCH_OBJ);
             $db = null;
             
             if(count($productos)>0){
                 echo json_encode($productos); 
             }else{
                 echo json_encode("Objeto vacio"); 
             }
            
            
        } catch(PDOException $e){
             echo '{"error" : {"text": '.$e->getMessage().'}';
        }
        
     });
     
    

    // Listar perfil

    $app->get('/api-pcincog/Perfil/get',  function(Request $request, Response $response) { 
   
        $sql = "SELECT * FROM perfil";
        
        try{
            
             // Get DB Object
             $db = new db();
             // Connect
             $db = $db->connect();
             $stmt = $db->query($sql);
             $Perfil = $stmt->fetchAll(PDO::FETCH_OBJ);
             $db = null;
             
             if(count($Perfil)>0){            
                 
                 $resultado="";
                 
                 foreach ($Perfil as  $row) {
                     $resultado = $resultado . "<option value='" . $row->idPerfil . "'>" . $row->NombrePerfil . "</option>"; 
                 }
     
                 echo json_encode($resultado);
             }
            
            
        } catch(PDOException $e){
             echo '{"error": {"text": '.$e->getMessage().'}';
        }
        
     });


    // Listar distrito

    $app->get('/api-pcincog/Distrito/get',  function(Request $request, Response $response) { 
   
        $sql = "SELECT * FROM distrito";
        
        try{
            
             // Get DB Object
             $db = new db();
             // Connect
             $db = $db->connect();
             $stmt = $db->query($sql);
             $Perfil = $stmt->fetchAll(PDO::FETCH_OBJ);
             $db = null;
             
             if(count($Perfil)>0){            
                 
                 $resultado="";
                 
                 foreach ($Perfil as  $row) {
                     $resultado = $resultado . "<option value='" . $row->idDistrito . "'>" . $row->NomDistrito . "</option>"; 
                 }
     
                 echo json_encode($resultado);
             }
            
            
        } catch(PDOException $e){
             echo '{"error": {"text": '.$e->getMessage().'}';
        }
        
     });
