<?php

    session_start();

    require 'data.php';

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
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

    $uno=1;
    $cero=0;

    if (isset($_GET['programa'])){

        $id=$_GET['programa'];

        $query="SELECT ocultar FROM programacatalogo WHERE programa=:programa";
        $records=$conn->prepare($query);
        $records->bindParam(':programa',$id);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=1');
            exit();

        }

        if($results['ocultar']==0){

            $sql="UPDATE programacatalogo SET ocultar='".$uno."' WHERE programa = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=1');
            exit();

        }else{

            $sql="UPDATE programacatalogo SET ocultar='".$cero."' WHERE programa = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=1');
            exit();

        }

    }else if (isset($_GET['nivelEscolar'])){

        $id=$_GET['nivelEscolar'];

        $query="SELECT ocultar FROM nivelescolarcatalogo WHERE nivelEscolar=:nivelEscolar";
        $records=$conn->prepare($query);
        $records->bindParam(':nivelEscolar',$id);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=2');
            exit();

        }

        if($results['ocultar']==0){

            $sql="UPDATE nivelescolarcatalogo SET ocultar='".$uno."' WHERE nivelEscolar = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=2');
            exit();
            
        }else{

            $sql="UPDATE nivelescolarcatalogo SET ocultar='".$cero."' WHERE nivelEscolar = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=2');
            exit();

        }

    }else if (isset($_GET['tipoActividad'])){

        $id=$_GET['tipoActividad'];

        $query="SELECT ocultar FROM tipoactividadcatalogo WHERE tipoActividad=:tipoActividad";
        $records=$conn->prepare($query);
        $records->bindParam(':tipoActividad',$id);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=3');
            exit();

        }

        if($results['ocultar']==0){

            $sql="UPDATE tipoActividadcatalogo SET ocultar='".$uno."' WHERE tipoActividad = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=3');
            exit();
            
        }else{

            $sql="UPDATE tipoActividadcatalogo SET ocultar='".$cero."' WHERE tipoActividad = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=3');
            exit();

        }


    }else if (isset($_GET['area'])){

        $id=$_GET['area'];

        $query="SELECT ocultar FROM areacatalogo WHERE area=:area";
        $records=$conn->prepare($query);
        $records->bindParam(':area',$id);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=4');
            exit();

        }

        if($results['ocultar']==0){

            $sql="UPDATE areacatalogo SET ocultar='".$uno."' WHERE area = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=4');
            exit();
            
        }else{

            $sql="UPDATE areacatalogo SET ocultar='".$cero."' WHERE area = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=4');
            exit();

        }
  
    }else if (isset($_GET['institucion'])){

        $id=$_GET['institucion'];

        $query="SELECT ocultar FROM institucioncatalogo WHERE institucion=:institucion";
        $records=$conn->prepare($query);
        $records->bindParam(':institucion',$id);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=5');
            exit();

        }

        if($results['ocultar']==0){

            $sql="UPDATE institucioncatalogo SET ocultar='".$uno."' WHERE institucion = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=5');
            exit();
            
        }else{

            $sql="UPDATE institucioncatalogo SET ocultar='".$cero."' WHERE institucion = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=5');
            exit();

        }

    }else if (isset($_GET['modalidad'])){

        $id=$_GET['modalidad'];

        $query="SELECT ocultar FROM modalidadcatalogo WHERE modalidad=:modalidad";
        $records=$conn->prepare($query);
        $records->bindParam(':modalidad',$id);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=6');
            exit();

        }

        if($results['ocultar']==0){

            $sql="UPDATE modalidadcatalogo SET ocultar='".$uno."' WHERE modalidad = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=6');
            exit();
            
        }else{

            $sql="UPDATE modalidadcatalogo SET ocultar='".$cero."' WHERE modalidad = '".$id."' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();

            header('Location: mostrarCatalogo?pagina=6');
            exit();

        }

    }

?>
