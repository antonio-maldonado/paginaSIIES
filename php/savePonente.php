<?php

    session_start();

    require 'data.php';

    $message='';

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);
  
    }else{

        header('Location: ../index');
        exit();

    }
    if (isset($_GET['idActividad'])){

        $id=$_GET['idActividad'];
        
    }else{

        header('Location: ../index');
        exit();

    }

    if(isset($_POST['save'])){
    
        $sql="INSERT INTO ponente( id, nombre, nivelAcademico, institucion, telefono, email, fechaCreacion, fechaModificacion,tipoParticipante,creadoPor,modificadoPor) VALUES ( :id, :nombre, :nivelAcademico, :institucion, :telefono, :email, :fechaCreacion, :fechaModificacion,:tipoParticipante,:creadoPor,:modificadoPor)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nombre',$_POST['nombre'],PDO::PARAM_STR);
        $stmt->bindParam(':nivelAcademico',$_POST['nivelAcademico'],PDO::PARAM_STR);
        $stmt->bindParam(':institucion',$_POST['institucion'],PDO::PARAM_STR);
        $stmt->bindParam(':telefono',$_POST['telefono'],PDO::PARAM_STR);
        $stmt->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
        date_default_timezone_set('America/Mexico_City'); 
        $fecha=date("Y-m-d H:i:s");
        $stmt->bindParam(':fechaCreacion',$fecha);
        $stmt->bindParam(':fechaModificacion',$fecha);
        $stmt->bindParam(':tipoParticipante',$_POST['tipoParticipante']);
        $stmt->bindParam(':creadoPor',$results['nombreContacto']);
        $stmt->bindParam(':modificadoPor',$results['nombreContacto']);
        
        if($stmt->execute()){           
            
            $message='Se creó al participante';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: editarActividad?idActividad=".$id.'#ponente');
            exit();
          
        }else{
             
            $message='Error, no se pudo crear al particpante';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: editarActividad=?idActividad=".$id.'#ponente');
            exit();
        }
    
    }else{

        header('Location: ../index');
        exit();
        
    }

?>
