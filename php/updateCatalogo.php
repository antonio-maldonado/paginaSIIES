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

        $id=$_GET['programa'];
        $sql="UPDATE programacatalogo SET  programa='".$_POST['programa']."' WHERE programa = '".$id."' ";
        $stmt=$conn->prepare($sql);


        if($stmt->execute()){         
            
            $query="UPDATE actividad SET programaEvento='".$_POST['programa']."' WHERE programaEvento = '".$id."' ";
            $record=$conn->prepare($query);
            $record->execute();

            $query="UPDATE usuario SET programaEvento='".$_POST['programa']."' WHERE programaEvento= '".$id."' ";
            $record=$conn->prepare($query);
            $record->execute();
            
            $message='Registro actualizado';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=1");
            exit();
          
        }else{
             
            $message='No se pudo actualizar el registro';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=1");
            exit();

        }
    
    }else if (isset($_GET['nivelEscolar'])){

        $id=$_GET['nivelEscolar'];
        $sql="UPDATE nivelescolarcatalogo SET nivelEscolar='".$_POST['nivelEscolar']."' WHERE nivelEscolar = '".$id."' ";
        $stmt=$conn->prepare($sql);

        if($stmt->execute()){           
            
            $query="UPDATE actividad SET nivelEscolarPublicoObjetivo='".$_POST['nivelEscolar']."' WHERE nivelEscolarPublicoObjetivo = '".$id."' ";
            $record=$conn->prepare($query);
            $record->execute();

            $message='Registro actualizado';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=2");
            exit();
          
        }else{
             
            $message='No se pudo actualizar el registro';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=2");
            exit();

        }
    
    }else if (isset($_GET['tipoActividad'])){

        $id=$_GET['tipoActividad'];
        $sql="UPDATE tipoactividadcatalogo SET tipoActividad='".$_POST['tipoActividad']."' WHERE tipoActividad = '".$id."' ";
        $stmt=$conn->prepare($sql);

        if($stmt->execute()){      
            
            $query="UPDATE actividad SET tipoActividad='".$_POST['tipoActividad']."' WHERE tipoActividad = '".$id."' ";
            $record=$conn->prepare($query);
            $record->execute();
            
            $message='Registro actualizado';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=3");
            exit();
          
        }else{
             
            $message='No se pudo actualizar el registro';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=3");
            exit();

        }
    
    }else if (isset($_GET['area'])){

        $id=$_GET['area'];
        $sql="UPDATE areacatalogo SET area='".$_POST['area']."' WHERE area = '".$id."' ";
        $stmt=$conn->prepare($sql);

        if($stmt->execute()){           
            
            $query="UPDATE actividad SET area='".$_POST['area']."' WHERE area = '".$id."' ";
            $record=$conn->prepare($query);
            $record->execute();

            $message='Registro actualizado';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=4");
            exit();
          
        }else{
             
            $message='No se pudo actualizar el registro';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=4");
            exit();

        }
    
    }else if (isset($_GET['institucion'])){

        $id=$_GET['institucion'];
        $sql="UPDATE institucioncatalogo SET institucion='".$_POST['institucion']."' WHERE institucion = '".$id."' ";
        $stmt=$conn->prepare($sql);

        if($stmt->execute()){         
            
            $query="UPDATE actividad SET nombreInstitucion='".$_POST['institucion']."' WHERE nombreInstitucion = '".$id."' ";
            $record=$conn->prepare($query);
            $record->execute();

            $query="UPDATE usuario SET nombreInstitucion='".$_POST['institucion']."' WHERE nombreInstitucion = '".$id."' ";
            $record=$conn->prepare($query);
            $record->execute();
            
            $query="UPDATE ponente SET institucion='".$_POST['institucion']."' WHERE institucion = '".$id."' ";
            $record=$conn->prepare($query);
            $record->execute();

            $message='Registro actualizado';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=5");
            exit();
          
        }else{
             
            $message='No se pudo actualizar el registro';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=5");
            exit();

        }
    
    }else if (isset($_GET['modalidad'])){

        $id=$_GET['modalidad'];
        $sql="UPDATE modalidadcatalogo SET modalidad='".$_POST['modalidad']."' WHERE modalidad = '".$id."' ";
        $stmt=$conn->prepare($sql);
        
        if($stmt->execute()){           

            $query="UPDATE actividad SET modalidad='".$_POST['modalidad']."' WHERE modalidad = '".$id."' ";
            $record=$conn->prepare($query);
            $record->execute();

            $message='Registro actualizado';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: mostrarCatalogo?pagina=6");
            exit();
          
        }else{
             
            $message='No se pudo actualizar el registro';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: mostrarCatalogo?pagina=6");
            exit();

        }
    
    }else{

        header('Location: ../index');
        exit();

    }

?>

