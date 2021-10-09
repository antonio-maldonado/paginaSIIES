<?php

    session_start();

    require 'data.php';

    $message='';

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT * FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if($results['rango']!='admin'){

            header('Location: ../index');
            exit();

        }

    }else{

        header('Location: ../index');
        exit();

    }

    if (isset($_GET['programa'])){

        $query="SELECT programa FROM programacatalogo WHERE programa=:programa  ";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(':programa',$_POST['programa']);
        $stmt->execute();

        $id1=$stmt->fetch(PDO::FETCH_ASSOC);

        if(($id1)){

            header("Location: mostrarCatalogo?pagina=1#cat");
            exit();
            
        }

        $sql="INSERT INTO programacatalogo( programa) VALUES ( :programa)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':programa',$_POST['programa']);
  
        if($stmt->execute()){           
            
            $message='Registro exitoso';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=1#cat");
            exit();
          
        }else{
             
            $message='Error, no se pudo crear el nombre del programa';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=1#cat");
            exit();

        }
    
    }else  if (isset($_GET['nivelEscolar'])){

        $query="SELECT nivelEscolar FROM nivelescolarcatalogo WHERE nivelEscolar=:nivelEscolar";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(':nivelEscolar',$_POST['nivelEscolar']);
        $stmt->execute();

        $id1=$stmt->fetch(PDO::FETCH_ASSOC);

        if(($id1)){

            header("Location: mostrarCatalogo?pagina=2#cat");
            exit();
            
        }

        $sql="INSERT INTO nivelescolarcatalogo(nivelEscolar) VALUES ( :nivelEscolar)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':nivelEscolar',$_POST['nivelEscolar']);

        if($stmt->execute()){           
            
            $message='Registro exitoso';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=2#cat");
            exit();
          
        }else{
             
            $message='Error, no se pudo crear el nombre del programa';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=2#cat");
            exit();

        }
    
    }else  if (isset($_GET['tipoActividad'])){

        $query="SELECT tipoActividad FROM tipoactividadcatalogo WHERE tipoActividad=:tipoActividad";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(':tipoActividad',$_POST['tipoActividad']);
        $stmt->execute();

        $id1=$stmt->fetch(PDO::FETCH_ASSOC);

        if(($id1)){

            header("Location: mostrarCatalogo?pagina=3#cat");
            exit();
            
        }

        $sql="INSERT INTO tipoactividadcatalogo(tipoActividad) VALUES ( :tipoActividad)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':tipoActividad',$_POST['tipoActividad']);
  
        if($stmt->execute()){           
            
            $message='Registro exitoso';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=3#cat");
            exit();
          
        }else{
             
            $message='Error, no se pudo crear el nombre del programa';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=3#cat");
            exit();

        }
    
    }else  if (isset($_GET['area'])){

        $query="SELECT area FROM areacatalogo WHERE area=:area";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(':area',$_POST['area']);
        $stmt->execute();

        $id1=$stmt->fetch(PDO::FETCH_ASSOC);

        if(($id1)){

            header("Location: mostrarCatalogo?pagina=4#cat");
            exit();
            
        }

        $sql="INSERT INTO areacatalogo(area) VALUES (:area)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':area',$_POST['area']);
  
        if($stmt->execute()){           
            
            $message='Registro exitoso';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=4#cat");
            exit();
          
        }else{
             
            $message='Error, no se pudo crear el nombre del programa';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=4#cat");
            exit();

        }
    
    }else  if (isset($_GET['institucion'])){

        $query="SELECT institucion FROM institucioncatalogo WHERE institucion=:institucion";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(':institucion',$_POST['institucion']);
        $stmt->execute();

        $id1=$stmt->fetch(PDO::FETCH_ASSOC);

        if(($id1)){

            header("Location: mostrarCatalogo?pagina=5#cat");
            exit();
            
        }

        $sql="INSERT INTO institucioncatalogo(institucion) VALUES (:institucion)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':institucion',$_POST['institucion']);
  
        if($stmt->execute()){           
            
            $message='Registro exitoso';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=5#cat");
            exit();
          
        }else{
             
            $message='Error, no se pudo crear el nombre del programa';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=5#cat");
            exit();

        }
    
    }else  if (isset($_GET['modalidad'])){

        $query="SELECT modalidad FROM modalidadcatalogo WHERE modalidad=:modalidad";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(':modalidad',$_POST['modalidad']);
        $stmt->execute();

        $id1=$stmt->fetch(PDO::FETCH_ASSOC);

        if(($id1)){

            header("Location: mostrarCatalogo?pagina=6#cat");
            exit();
            
        }

        $sql="INSERT INTO modalidadcatalogo(modalidad) VALUES (:modalidad)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':modalidad',$_POST['modalidad']);
  
        if($stmt->execute()){           
            
            $message='Registro exitoso';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=6#cat");
            exit();
          
        }else{
             
            $message='Error, no se pudo crear el nombre del programa';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=6#cat");
            exit();

        }
    
    }else{

        header('Location: ../index');
        exit();

    }
    
?>

<?php include '../includes/footer.php'; ?>