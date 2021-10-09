<?php

    session_start();
    require 'data.php';

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

    }else{

        header('Location: ../index');
        exit();
        
    }

    if(isset($_POST['save'])){

        $programaEvento=$_POST['programaEvento'];
        $tipoActividad=$_POST['tipoActividad'];
        $nombreActividad=$_POST['nombreActividad'];
        $area=$_POST['area'];
        $nivelEscolar=$_POST['nivelEscolar'];
        $institucion=$_POST['institucion'];
        $descripcion=$_POST['descripcion'];
        $fechaHora=$_POST['fechaHora'];
        $duracion=$_POST['duracion'];
        $numeroPersonas=$_POST['numeroPersonas'];
        $modalidad=$_POST['modalidad'];
        $liga=$_POST['liga'];
        $id=$_SESSION['idActividad'];
        $modificadoPor=$results['nombreContacto'];

        date_default_timezone_set('America/Mexico_City'); 
        $fecha=date("Y-m-d H:i:s");
        
       
        if(($_POST['numeroPersonas'])!=""){
        
            $sql="UPDATE actividad SET  modificadoPor='".$modificadoPor."', fechaModificacion='".$fecha."',programaEvento= '".$programaEvento."', tipoActividad='".$tipoActividad."',nombreActividad='".$nombreActividad."',area='".$area."',nivelEscolarPublicoObjetivo='".$nivelEscolar."',nombreInstitucion='".$institucion."',descripcionActividad='".$descripcion."',fechaHora='".$fechaHora."',duracion='".$duracion."',numeroPersonas='".$numeroPersonas."',modalidad='".$modalidad."', liga='".$liga."' WHERE idActividad = '".$id."' ";

        }else{

            $sql="UPDATE actividad SET modificadoPor='".$modificadoPor."', fechaModificacion='".$fecha."',programaEvento= '".$programaEvento."', tipoActividad='".$tipoActividad."',nombreActividad='".$nombreActividad."',area='".$area."',nivelEscolarPublicoObjetivo='".$nivelEscolar."',nombreInstitucion='".$institucion."',descripcionActividad='".$descripcion."',fechaHora='".$fechaHora."',duracion='".$duracion."',numeroPersonas=NULL,modalidad='".$modalidad."', liga='".$liga."' WHERE idActividad = '".$id."' ";
        
        }
    
        $stmt=$conn->prepare($sql);

        if($stmt->execute()){

            $message='Actualizacion exitosa';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';
            
            $message='Actividad actualizada';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';
            header('location: editarActividad?idActividad='.$id);
            exit();

        }else{

            $message='Error, Actualizacion no completada';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header('location: editarActividad?idActividad='.$id);
            exit();

        }
    
    }

?>