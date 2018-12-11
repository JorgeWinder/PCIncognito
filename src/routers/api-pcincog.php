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
    
               $_SESSION["idColaborador"]=$colaboradores[0]->idColaborador;
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

    // Acceso encuestador

    $app->post('/api-pcincog/ecuestador/acceso',  function(Request $request, Response $response) {        
 
        $Correo = $request->getParam('Correo');    
        $Password = $request->getParam('Password');
        
        $sql = "SELECT * FROM encuestador WHERE Correo='$Correo'";
    
        try{
            // Get DB Object
            $db = new db();
            // Connect
            $db = $db->connect();
            $stmt = $db->query($sql);
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;                 
            
            if(count($resultado)==1 && password_verify($Password, $resultado[0]->Password))
            {   
               session_start(); 
               $_SESSION["idEncuestador"]=$resultado[0]->idEncuestador;
               $_SESSION["Nombres"]=$resultado[0]->Nombres;
               $_SESSION["Correo"]=$resultado[0]->Correo;
               
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

    $app->post('/api-pcincog/colaborador/busqueda',  function(Request $request, Response $response) { 
    
        $Nombres = $request->getParam('Nombres');
        
        //$sql="SELECT * FROM colaborador where  idColaborador like '%$Nombres%' or  Apellidos like '%$Nombres%'";
        $sql="SELECT * FROM colaborador where  idColaborador like '%$Nombres%' OR concat(Nombres , ' ', Apellidos ) like '%$Nombres%'";

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


    
    // Registrar encuestador

    $app->post('/api-pcincog/encuestador/add', function(Request $request, Response $response){

        $idEncuestador = $request->getParam('idEncuestador');
        $Nombres = $request->getParam('Nombres');
        $Correo = $request->getParam('Correo');
        $Telefono = $request->getParam('Telefono');        
        $Direccion = $request->getParam('Direccion');
        $idDistrito = $request->getParam('idDistrito');        
        $Password = password_hash($request->getParam('Password'), PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO encuestador (idEncuestador, Nombres, Correo, Telefono, Direccion, idDistrito, Password) VALUES ('$idEncuestador', '$Nombres', '$Correo', '$Telefono', '$Direccion', '$idDistrito', '$Password')";

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

        // Modificar encuestador

        $app->post('/api-pcincog/encuestador/update', function(Request $request, Response $response){
            
        $idEncuestador = $request->getParam('idEncuestador');

        $Nombres = $request->getParam('Nombres');
        $Correo = $request->getParam('Correo');
        $Telefono = $request->getParam('Telefono');        
        $Direccion = $request->getParam('Direccion');
        $idDistrito = $request->getParam('idDistrito'); 
        
            $sql = "UPDATE colaborador SET Nombres='$Nombres' , 
            Correo='$Correo' , 
            Telefono='$Telefono' , 
            Direccion='$Direccion' , 
            idDistrito='$idDistrito'
            WHERE idEncuestador='$idEncuestador'";
        
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
    
    
    //Busqueda de encuestador

    $app->post('/api-pcincog/encuestador/busqueda',  function(Request $request, Response $response) { 
    
        $Nombres = $request->getParam('Nombres');
        
        //$sql="SELECT * FROM colaborador where  idColaborador like '%$Nombres%' or  Apellidos like '%$Nombres%'";
        $sql="SELECT * FROM encuestador where  idEncuestador like '%$Nombres%' OR Nombres like '%$Nombres%'";

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
     
     

    // Registrar Proyecto

    $app->post('/api-pcincog/proyecto/add', function(Request $request, Response $response){

        $NombreProyecto = $request->getParam('NombreProyecto');
        $FechaInicio = $request->getParam('FechaInicio');
        $FechaFin = $request->getParam('FechaFin');
        $Cliente_Ruc = $request->getParam('Cliente_Ruc');
        $idColaborador = $request->getParam('idColaborador');        
        $idEstadoProyecto = $request->getParam('idEstadoProyecto');        
        //$idEstadoProyecto = 1;        
    
        $sql = "INSERT INTO proyecto (NombreProyecto, FechaInicio, FechaFin, Cliente_Ruc, idColaborador, idEstadoProyecto) VALUES ('$NombreProyecto', '$FechaInicio', '$FechaFin', '$Cliente_Ruc', '$idColaborador', '$idEstadoProyecto')";

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


        //Busqueda de proyecto

        $app->post('/api-pcincog/proyecto/busqueda',  function(Request $request, Response $response) { 
    
            $NombreProyecto = $request->getParam('Nombres');
            
            //$sql="SELECT * FROM colaborador where  idColaborador like '%$Nombres%' or  Apellidos like '%$Nombres%'";
            $sql="SELECT * FROM proyecto where  NombreProyecto like '%$NombreProyecto%'";
    
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
     
    //Busqueda de usuario cliente

    $app->post('/api-pcincog/usuariocliente/busqueda',  function(Request $request, Response $response) { 
    
        $Nombres = $request->getParam('Nombres');
        $Nombres2 = $request->getParam('Nombres2');
        
        //$sql="SELECT * FROM colaborador where  idColaborador like '%$Nombres%' or  Apellidos like '%$Nombres%'";
        $sql="SELECT * FROM usuariocliente where Cliente_Ruc =  left('$Nombres2',11) and (idUsuarioCliente like '%$Nombres%' or Nombres like '%$Nombres%') ";

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


     //Registrar Usuario Cliente

     $app->post('/api-pcincog/usuariocliente/add', function(Request $request, Response $response){

        $Ruc = $request->getParam('Ruc');
        $Nombres = $request->getParam('Nombres');
        $Correo = $request->getParam('Correo'); 
        $Password = password_hash($request->getParam('Password'), PASSWORD_DEFAULT);
    

        $sql = "INSERT INTO usuariocliente (Ruc, Cliente_Ruc, correo, Nombres) VALUES ('$Ruc', '$Ruc', '$Correo', '$Nombres')";

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
            //  echo '{"error": {"text": '.$e->getMessage().'}';
            echo json_encode(FALSE);
        }
    });


    //Modificar Usuario Cliente

    $app->post('/api-pcincog/usuariocliente/update', function(Request $request, Response $response){

        $Ruc = $request->getParam('Ruc');
        $Nombres = $request->getParam('Nombres');
        $Correo = $request->getParam('Correo'); 
        $Password = password_hash($request->getParam('Password'), PASSWORD_DEFAULT);
    

        $sql = "UPDATE usuariocliente 
        SET  Cliente_Ruc='$Ruc',
        SET  Nombres='$Nombres' ,
        SET  Correo='$Correo' 
        WHERE idEntidad='$idEntidad'";

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
            //  echo '{"error": {"text": '.$e->getMessage().'}';
            echo json_encode(FALSE);
        }
    });














             

    //Busqueda de cliente

        $app->post('/api-pcincog/cliente/busqueda',  function(Request $request, Response $response) { 
    
            $Nombres = $request->getParam('Nombres');
            
            //$sql="SELECT * FROM colaborador where  idColaborador like '%$Nombres%' or  Apellidos like '%$Nombres%'";
            $sql="SELECT * FROM cliente where  Ruc like '%$Nombres%' OR NombreCliente  like '%$Nombres%'";
    
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


    
    
    // Registrar cliente

        $app->post('/api-pcincog/cliente/add', function(Request $request, Response $response){

            $Ruc = $request->getParam('Ruc');
            $NombreCliente = $request->getParam('NombreCliente');
            $RazonSocial = $request->getParam('RazonSocial');
            $Contacto = $request->getParam('Contacto');        
            $TelefonoContacto = $request->getParam('TelefonoContacto'); 
            //$Password = password_hash($request->getParam('Password'), PASSWORD_DEFAULT);
        

            $sql = "INSERT INTO cliente (Ruc, NombreCliente, RazonSocial, Contacto, TelefonoContacto) VALUES ('$Ruc', '$NombreCliente', '$RazonSocial', '$Contacto', '$TelefonoContacto')";

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
                //  echo '{"error": {"text": '.$e->getMessage().'}';
                echo json_encode(FALSE);
            }
        });



    //Modificar cliente

    $app->post('/api-pcincog/cliente/update', function(Request $request, Response $response){

        $Ruc = $request->getParam('Ruc');
        $NombreCliente = $request->getParam('NombreCliente');
        $RazonSocial = $request->getParam('RazonSocial');
        $Contacto = $request->getParam('Contacto');        
        $TelefonoContacto = $request->getParam('TelefonoContacto'); 
        //$Password = password_hash($request->getParam('Password'), PASSWORD_DEFAULT);
    

        $sql = "UPDATE cliente SET Ruc='$Ruc' , 
        NombreCliente='$NombreCliente' , 
        RazonSocial='$RazonSocial' , 
        Contacto='$Contacto' , 
        TelefonoContacto='$TelefonoContacto'
        WHERE Ruc='$Ruc'";

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
            //  echo '{"error": {"text": '.$e->getMessage().'}';
            echo json_encode(FALSE);
        }
    });


         

     
    // Registrar entidad

        $app->post('/api-pcincog/entidad/add', function(Request $request, Response $response){

            $NombreEntidad = $request->getParam('NombreEntidad');
            
            $sql = "INSERT INTO entidad (NombreEntidad) VALUES ('$NombreEntidad')";
    
            try{
                // Get DB Object
                $db = new db();
                // Connect
                $db = $db->connect();
                $stmt = $db->prepare($sql);
        
                if($stmt->execute())
                {
                    //echo json_encode(TRUE);
                    $ucod=$db->lastInsertId();         
                    echo '{ "Respuesta" : [{ "Id" : "' . $ucod .'" , "insert" : true }]}';
                }
            
            } catch(PDOException $e){
                //echo '{"error": {"text": '.$e->getMessage().'}';
                echo json_encode(FALSE);
            }
        });
    
    // Modificar entidad

    $app->post('/api-pcincog/entidad/update', function(Request $request, Response $response){

        $idEntidad = $request->getParam('idEntidad');
        $NombreEntidad = $request->getParam('NombreEntidad');

        $sql = "UPDATE entidad SET  
            NombreEntidad='$NombreEntidad' 
            WHERE idEntidad='$idEntidad'";
        
        try{
            // Get DB Object
            $db = new db();
            // Connect
            $db = $db->connect();
            $stmt = $db->prepare($sql);
    
            if($stmt->execute())
            {
                echo json_encode(TRUE);
            }
        
        } catch(PDOException $e){

            echo json_encode(FALSE);
        }
    });



        //Busqueda de entidad

        $app->post('/api-pcincog/entidad/busqueda',  function(Request $request, Response $response) { 
    
            $NombreEntidad = $request->getParam('NombreEntidad');
            
            //$sql="SELECT * FROM colaborador where  idColaborador like '%$Nombres%' or  Apellidos like '%$Nombres%'";
            $sql="SELECT * FROM entidad where  NombreEntidad  like '%$NombreEntidad%'";
    
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

    // Listar distrito filtrado

    $app->get('/api-pcincog/DistritoFil/get',  function(Request $request, Response $response) { 
   
        $idProvincia = $request->getParam('idProvincia');

        $sql = "SELECT * FROM distrito WHERE idProvincia='$idProvincia'";
        
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

     // Listar provincia filtrado

     $app->get('/api-pcincog/ProvinciaFil/get',  function(Request $request, Response $response) { 
        
        $idDepartamento = $request->getParam('idDepartamento');

        $sql = "SELECT * FROM provincia WHERE idDepartamento='$idDepartamento'";
        
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
                     $resultado = $resultado . "<option value='" . $row->idProvincia . "'>" . $row->NomProvincia  . "</option>"; 
                 }
     
                 echo json_encode($resultado);
             }
            
            
        } catch(PDOException $e){
             echo '{"error": {"text": '.$e->getMessage().'}';
        }
        
     });     


          // Listar departamento

          $app->get('/api-pcincog/Departamento/get',  function(Request $request, Response $response) { 
    
            $sql = "SELECT * FROM departamento";
            
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
                         $resultado = $resultado . "<option value='" . $row->idDepartamento . "'>" . $row->NomDepartemento . "</option>"; 
                     }
         
                     echo json_encode($resultado);
                 }
                
                
            } catch(PDOException $e){
                 echo '{"error": {"text": '.$e->getMessage().'}';
            }
            
         });   



         // Registrar establecimiento 

    $app->post('/api-pcincog/establecimiento/add', function(Request $request, Response $response){

        //$idEstablecimiento = $request->getParam('idEstablecimiento');
        $idEntidad = $request->getParam('idEntidad');
        $NombreEstablecimiento = $request->getParam('NombreEstablecimiento');
        $idDistrito = $request->getParam('idDistrito');
        $Direccion = $request->getParam('Direccion');        
        $Longitud = $request->getParam('Longitud');        
        $Latitud = $request->getParam('Latitud');        
        
        $sql = "INSERT INTO establecimiento (idEntidad, NombreEstablecimiento, idDistrito, Direccion, Longitud, Latitud) VALUES ('$idEntidad', '$NombreEstablecimiento', '$idDistrito', '$Direccion', '$Longitud', '$Latitud')";

        try{
            // Get DB Object
            $db = new db();
            // Connect
            $db = $db->connect();
            $stmt = $db->prepare($sql);
    
            if($stmt->execute())
            {
    
                $ucod=$db->lastInsertId();         
                echo '{ "Respuesta" : [{ "Id" : "' . $ucod .'" , "insert" : "ok" }]}';
            }
        
        } catch(PDOException $e){
            //echo '{"error": {"text": '.$e->getMessage().'}';
            echo json_encode(FALSE);
        }
    });


          // Listar establecimientos por entidades

          $app->get('/api-pcincog/establecimiento/entidad/get',  function(Request $request, Response $response) { 
    
            $idEntidad = $request->getParam('idEntidad');

            $sql = "SELECT es.idEstablecimiento, es.NombreEstablecimiento, CONCAT(dep.NomDepartemento, ', ' , pro.NomProvincia, ', ' , dis.NomDistrito) AS Ubicacion FROM establecimiento es , distrito dis , provincia pro , departamento dep 
            WHERE es.idDistrito=dis.idDistrito AND dis.idProvincia=pro.idProvincia and pro.idDepartamento=dep.idDepartamento and es.idEntidad='$idEntidad'";
            
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
                     $cant=0;
                     foreach ($Perfil as  $row) {
                         $cant = $cant + 1;   
                         //$resultado = $resultado . "<option value='" . $row->idDepartamento . "'>" . $row->NomDepartemento . "</option>"; 
                         $resultado = $resultado . "<tr>
                                <td class='center'>" . $row->idEstablecimiento . "</td>
                                <td><span id='nomest" . $cant . "'>" . $row->NombreEstablecimiento . "</span></td>
                                <td><span id='ubica" . $cant . "'>" . $row->Ubicacion . "</span></td>                                
                                <td><a href='#modal1' onclick='CargarEst(" . $row->idEstablecimiento . ");' class='modal-trigger'><i class='material-icons prefix' style='font-size: 30pt;'>add_box</i></a><a href='javascript:void()' onclick='DeleteEst(" . $row->idEstablecimiento . ");'><i class='material-icons prefix' style='font-size: 30pt;'>remove_circle_outline</i></a></td>
                            </tr>";
                     }
         
                     echo json_encode($resultado);
                 }
                
                
            } catch(PDOException $e){
                 echo '{"error": {"text": '.$e->getMessage().'}';
            }
            
         });       




          // Busqueda establecimientos por nombre

          $app->post('/api-pcincog/establecimiento/busqueda',  function(Request $request, Response $response) { 
    
            $NombreEstablecimiento = $request->getParam('NombreEstablecimiento');

            $sql = "SELECT es.idEntidad, ent.NombreEntidad, es.idEstablecimiento, es.NombreEstablecimiento, CONCAT(dep.NomDepartemento, ', ' , pro.NomProvincia, ', ' , dis.NomDistrito) AS Ubicacion 
            FROM entidad ent , establecimiento es , distrito dis , provincia pro , departamento dep 
            WHERE es.idEntidad=ent.idEntidad and es.idDistrito=dis.idDistrito AND 
            dis.idProvincia=pro.idProvincia and pro.idDepartamento=dep.idDepartamento and NombreEstablecimiento like '%$NombreEstablecimiento%'";
            
            try{
                
                 // Get DB Object
                 $db = new db();
                 // Connect
                 $db = $db->connect();
                 $stmt = $db->query($sql);
                 $Perfil = $stmt->fetchAll(PDO::FETCH_OBJ);
                 $db = null;                            
                              
                if(count($Perfil)>0){
                    echo json_encode($Perfil); 
                }else{
                    echo json_encode("Objeto vacio"); 
                }
                
                
            } catch(PDOException $e){
                 echo '{"error": {"text": '.$e->getMessage().'}';
            }
            
         });       



    $app->get('/api-pcincog/establecimiento/get',  function(Request $request, Response $response) { 

       $idEstablecimiento = $request->getParam('idEstablecimiento');
       
       //$sql="SELECT * FROM colaborador where  idColaborador like '%$Nombres%' or  Apellidos like '%$Nombres%'";
       $sql="SELECT es.* , dis.idDistrito , pro.idProvincia , dep.idDepartamento FROM establecimiento es , distrito dis , provincia pro , departamento dep 
       where es.idDistrito=dis.idDistrito AND dis.idProvincia=pro.idProvincia and pro.idDepartamento=dep.idDepartamento and es.idEstablecimiento='$idEstablecimiento'";

       try{
           
            // Get DB Object
            $db = new db();
            // Connect
            $db = $db->connect();
            $stmt = $db->query($sql);
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            
            if(count($resultado)>0){
                echo json_encode($resultado); 
            }else{
                echo json_encode("Objeto vacio"); 
            }
           
           
       } catch(PDOException $e){
            echo '{"error" : {"text": '.$e->getMessage().'}';
       }
       
    });  


        // eliminar establecimi

        $app->post('/api-pcincog/establecimiento/delete', function(Request $request, Response $response){
            
            $idEstablecimiento = $request->getParam('idEstablecimiento');
    
            $sql = "DELETE FROM establecimiento  
                WHERE idEstablecimiento='$idEstablecimiento'";
            
            try{
                // Get DB Object
                $db = new db();
                // Connect
                $db = $db->connect();
                $stmt = $db->prepare($sql);
        
                if($stmt->execute())
                {
                    echo json_encode(TRUE);
                }
            
            } catch(PDOException $e){
    
                echo json_encode(FALSE);
            }
        });


         // Registrar detalle de proyecto 

         $app->post('/api-pcincog/DetalleProyecto/add', function(Request $request, Response $response){

            //$idEstablecimiento = $request->getParam('idEstablecimiento');
            $idEncuestador = $request->getParam('idEncuestador');
            $idProyecto = $request->getParam('idProyecto');
            
            $sql = "INSERT INTO destalleproyecto (idEncuestador, idProyecto) VALUES ('$idEncuestador', '$idProyecto')";
    
            try{
                // Get DB Object
                $db = new db();
                // Connect
                $db = $db->connect();
                $stmt = $db->prepare($sql);
        
                if($stmt->execute())
                {
        
                    $ucod=$db->lastInsertId();         
                    echo '{ "Respuesta" : [{ "Id" : "' . $ucod .'" , "insert" : "ok" }]}';
                }
            
            } catch(PDOException $e){
                //echo '{"error": {"text": '.$e->getMessage().'}';
                echo json_encode(FALSE);
            }
        });  
        
        
          // Listar detalle proyecto

          $app->get('/api-pcincog/DetalleProyecto/get',  function(Request $request, Response $response) { 
    
            $idProyecto = $request->getParam('idProyecto');

            $sql = "SELECT dt.* , enc.Nombres FROM destalleproyecto dt , encuestador enc 
            WHERE dt.idEncuestador=enc.idEncuestador and idProyecto='$idProyecto'";
            
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
                     $cant=0;
                     foreach ($Perfil as  $row) {
                         $cant = $cant + 1;   
                         //$resultado = $resultado . "<option value='" . $row->idDepartamento . "'>" . $row->NomDepartemento . "</option>";                         

                        $resultado = $resultado . "<tr>
                                <td><span id='lbldni". $cant ."'>" . $row->idEncuestador . "</span></td>
                                <td>
                                    <div class='input-field'>
                                        <input id='search". $cant ."' type='text' placeholder='Buscar encuestador' value='" . $row->Nombres . "' readonly>
                                        <div id='search-rs". $cant ."' class='search-rs' style='padding-left: 5px; position: absolute;z-index: 100;background-color: white;width: 100%;'>
                                        </div>
                                    </div>
                                </td>
                                <td class='center-left'>
                                    <a id='btnEstable". $cant ."' href='#modal1' onclick='CargarVisitasAsignadas(". $idProyecto .",". $row->idEncuestador .")' class='waves-effect waves-light btn modal-trigger' style='background-color: #f39c12;'>Establecimientos asignados</a>
                                </td>
                                <td><a id='btnaddEnc". $cant ."' href='javascript:void()' onclick='RegDetalleProyecto(". $cant .");' class='btn-flat disabled'><i class='material-icons prefix' style='font-size: 30pt;'>save</i></a></td>
                                <td><a href='javascript:void()'><i class='material-icons prefix' style='font-size: 30pt;'>remove_circle_outline</i></a></td>
                            </tr>";

                        //$resultado = $resultado . "hola";
                     }
         
                     echo json_encode($resultado);
                 }
                
                
            } catch(PDOException $e){
                 echo '{"error": {"text": '.$e->getMessage().'}';
            }
            
         });   
         
         


         $app->get('/api-pcincog/VisitasAsignadas/get',  function(Request $request, Response $response) { 

            $idProyecto = $request->getParam('idProyecto');
            $idEncuestador = $request->getParam('idEncuestador');
            
            $sql = "SELECT es.idEntidad, ent.NombreEntidad, es.idEstablecimiento, es.NombreEstablecimiento, CONCAT(dep.NomDepartemento, ', ' , pro.NomProvincia, ', ' , dis.NomDistrito) AS Ubicacion 
            FROM entidad ent , establecimiento es , distrito dis , provincia pro , departamento dep , visitasasignadas va 
            WHERE es.idEntidad=ent.idEntidad and es.idDistrito=dis.idDistrito AND va.idEstablecimiento=es.idEstablecimiento AND 
            dis.idProvincia=pro.idProvincia and pro.idDepartamento=dep.idDepartamento and va.idProyecto='$idProyecto' and va.idEncuestador='$idEncuestador'";
     
            try{
                
                 // Get DB Object
                 $db = new db();
                 // Connect
                 $db = $db->connect();
                 $stmt = $db->query($sql);
                 $visitas = $stmt->fetchAll(PDO::FETCH_OBJ);
                 $db = null;
                 
                 if(count($visitas)>0){            
                     
                    $resultado="";
                    $cant=0;
                    foreach ($visitas as  $row) {
                        $cant = $cant + 1;   
                        //$resultado = $resultado . "<option value='" . $row->idDepartamento . "'>" . $row->NomDepartemento . "</option>";                         

                       $resultado = $resultado . "<tr>
                                <td><span id='lblenti". $cant ."'>" . $row->NombreEntidad . "</span></td>
                                <td>
                                    <div class='input-field'>                                     
                                        <input id='estable". $cant ."' type='hidden' value='" . $row->idEstablecimiento . "'>       
                                        <input id='searchV". $cant ."' placeholder='Buscar establecimiento' value='" . $row->NombreEstablecimiento . "' readonly>
                                        <div id='searchRSV". $cant ."' style='padding-left: 5px; position: absolute;z-index: 100;background-color: white;width: 100%;'>
                                        </div>
                                    </div>
                                </td>
                                <td><span id='lblubica". $cant ."'>" . $row->Ubicacion . "</span></td>
                                <td><a onclick='' href='javascript:void()' class='btn-flat desabled'><i class='material-icons prefix' style='font-size: 30pt;'>save</i></a></td>
                                <td><a onclick='' href='javascript:void()'><i class='material-icons prefix' style='font-size: 30pt;'>remove_circle_outline</i></a></td>
                            </tr>";

                       //$resultado = $resultado . "hola";
                    }
        
                    echo json_encode($resultado);
                }
                
                
            } catch(PDOException $e){
                 echo '{"error" : {"text": '.$e->getMessage().'}';
            }
            
         });         


         // Registrar visita asignada 

         $app->post('/api-pcincog/VisitasAsignadas/add', function(Request $request, Response $response){

            //$idEstablecimiento = $request->getParam('idEstablecimiento');
            $idEncuestador = $request->getParam('idEncuestador');
            $idEstablecimiento = $request->getParam('idEstablecimiento');
            $idProyecto = $request->getParam('idProyecto');
            
            $sql = "INSERT INTO visitasasignadas (idEncuestador, idEstablecimiento, idProyecto) VALUES ('$idEncuestador', '$idEstablecimiento', '$idProyecto')";
    
            try{
                // Get DB Object
                $db = new db();
                // Connect
                $db = $db->connect();
                $stmt = $db->prepare($sql);
        
                if($stmt->execute())
                {
        
                    $ucod=$db->lastInsertId();         
                    echo '{ "Respuesta" : [{ "Id" : "' . $ucod .'" , "insert" : "ok" }]}';
                }
            
            } catch(PDOException $e){
                //echo '{"error": {"text": '.$e->getMessage().'}';
                echo json_encode(FALSE);
            }
        });     
        
        

          // Listar detalle proyecto asignados

          $app->get('/api-pcincog/DetalleProyectosAsignados/get',  function(Request $request, Response $response) { 
    
            $idEncuestador = $request->getParam('idEncuestador');

            $sql = "SELECT dp.* , pro.NombreProyecto , pro.idEstadoProyecto , ep.EstadoProyecto 
            FROM destalleproyecto dp , proyecto pro , estadoproyecto ep
            where pro.idProyecto=dp.idProyecto and pro.idEstadoProyecto=ep.idEstadoProyecto AND dp.idEncuestador='$idEncuestador'";
            
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
                     $cant=0;
                     foreach ($Perfil as  $row) {
                         $cant = $cant + 1;   
                         //$resultado = $resultado . "<option value='" . $row->idDepartamento . "'>" . $row->NomDepartemento . "</option>";                         

                        $resultado = $resultado . "<tr>
                                <td>" . $row->idProyecto . "</td>
                                <td>" . $row->NombreProyecto . "</td>
                                <td>" . $row->EstadoProyecto . "</td>
                                <td><div class='progress'><div class='determinate' style='width: 1%'></div></div></td>
                                <td class='center-align'><a href='./agencias-asignadas?proyec=" . $row->idProyecto . "' class='waves-effect waves-light btn' style='background-color: #f39c12;'>Ir</a></td>
                            </tr>";

                        //$resultado = $resultado . "hola";
                     }
         
                     echo json_encode($resultado);
                 }
                
                
            } catch(PDOException $e){
                 echo '{"error": {"text": '.$e->getMessage().'}';
            }
            
         });   
         

          // Listar detalle agecias asignadas encuestador

          $app->get('/api-pcincog/DetalleAgenciasAsignadas/get',  function(Request $request, Response $response) { 
    
            $idProyecto = $request->getParam('idProyecto');
            $idEncuestador = $request->getParam('idEncuestador');
            
            $sql = "SELECT proy.NombreProyecto ,es.idEntidad, ent.NombreEntidad, es.idEstablecimiento, es.NombreEstablecimiento, dep.NomDepartemento,  pro.NomProvincia, dis.NomDistrito, va.idVisitasAsignadas, va.idEncuestador 
            FROM entidad ent , establecimiento es , distrito dis , provincia pro , departamento dep , visitasasignadas va , proyecto proy
            WHERE es.idEntidad=ent.idEntidad and es.idDistrito=dis.idDistrito AND va.idEstablecimiento=es.idEstablecimiento AND 
            proy.idProyecto=va.idProyecto AND dis.idProvincia=pro.idProvincia and pro.idDepartamento=dep.idDepartamento and va.idProyecto='$idProyecto' and va.idEncuestador='$idEncuestador'";

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
                     $cant=0;
                     foreach ($Perfil as  $row) {
                         $cant = $cant + 1;   
                         //$resultado = $resultado . "<option value='" . $row->idDepartamento . "'>" . $row->NomDepartemento . "</option>";                         

                            $resultado = $resultado . "<tr>
                            <td><input type='hidden' id='NombrePro' value='" . $row->NombreProyecto . "'>" . $row->NomDepartemento . "</td>
                            <td>" . $row->NomProvincia . "</td>
                            <td>" . $row->NomDistrito . "</td>
                            <td>" . $row->NombreEntidad . "</td>
                            <td class='center-align'>
                                <a href='./detalle-de-visita?visita=1&idva=" . $row->idVisitasAsignadas . "&dnienc=" . $row->idEncuestador . "' style=''><i class='material-icons prefix'>filter_1</i></a>
                                <a href='./detalle-de-visita?visita=2&idva=" . $row->idVisitasAsignadas . "&dnienc=" . $row->idEncuestador . "' style=''><i class='material-icons prefix'>filter_2</i></a>
                                <a href='./detalle-de-visita?visita=3&idva=" . $row->idVisitasAsignadas . "&dnienc=" . $row->idEncuestador . "' style=''><i class='material-icons prefix'>filter_3</i></a>
                                <a href='./detalle-de-visita?visita=4&idva=" . $row->idVisitasAsignadas . "&dnienc=" . $row->idEncuestador . "' style=''><i class='material-icons prefix'>filter_4</i></a>
                            </td>
                            <td></td>
                        </tr>";



                        //$resultado = $resultado . "hola";
                     }
         
                     echo json_encode($resultado);
                 }
                
                
            } catch(PDOException $e){
                 echo '{"error": {"text": '.$e->getMessage().'}';
            }
            
         });   
  
         
          // Busqueda visita de establecimientos asignado

          $app->get('/api-pcincog/VisitaAsignada/get',  function(Request $request, Response $response) { 
    
            $idVisitasAsignadas = $request->getParam('idVisitasAsignadas');
            $idEncuestador = $request->getParam('idEncuestador');

            $sql = "SELECT vis.idProyecto, vis.idVisitasAsignadas,  enc.Nombres, vis.idEncuestador, enti.NombreEntidad, vis.idEstablecimiento, esta.NombreEstablecimiento, esta.Direccion
            FROM visitasasignadas vis, establecimiento esta, entidad enti, encuestador enc
            WHERE vis.idEstablecimiento=esta.idEstablecimiento and esta.idEntidad=enti.idEntidad and 
            enc.idEncuestador=vis.idEncuestador and vis.idVisitasAsignadas='$idVisitasAsignadas'";
            
            try{
                
                 // Get DB Object
                 $db = new db();
                 // Connect
                 $db = $db->connect();
                 $stmt = $db->query($sql);
                 $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                 $db = null;                            
                              
                if(count($resultado)>0){
                    echo json_encode($resultado); 
                }else{
                    echo json_encode("Objeto vacio"); 
                }
                
                
            } catch(PDOException $e){
                 echo '{"error": {"text": '.$e->getMessage().'}';
            }
            
         });       
;
