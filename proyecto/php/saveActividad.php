<?php
session_start();
require 'data.php';

if(isset($_POST['save'])){

    $sql="INSERT INTO actividad (programaEvento,tipoActividad,nombreActividad,area,nivelEscolarPublicoObjetivo,nombreInstitucion,descripcionActividad,fechaHora,duracion,numeroPersonas,modalidad,liga) VALUES (:programaEvento,:tipoActividad,:nombreActividad,:area,:nivelEscolarPublicoObjetivo,:nombreInstitucion,:descripcionActividad,:fechaHora,:duracion,:numeroPersonas,:modalidad,:liga) ";
    $stmt=$conn->prepare($sql);

    $stmt->bindParam(':programaEvento',$_POST['programaEvento'],PDO::PARAM_STR);
    $stmt->bindParam(':tipoActividad',$_POST['tipoActividad'],PDO::PARAM_STR);
    $stmt->bindParam(':nombreActividad',$_POST['nombreActividad'],PDO::PARAM_STR);
    $stmt->bindParam(':area',$_POST['area'],PDO::PARAM_STR);
    $stmt->bindParam(':nivelEscolarPublicoObjetivo',$_POST['nivelEscolar'],PDO::PARAM_STR);
    $stmt->bindParam(':nombreInstitucion',$_POST['institucion'],PDO::PARAM_STR);
    $stmt->bindParam(':descripcionActividad',$_POST['descripcion'],PDO::PARAM_STR);
    $stmt->bindParam(':fechaHora',$_POST['fechaHora']);
    $stmt->bindParam(':duracion',$_POST['duracion'],PDO::PARAM_INT);
    $stmt->bindParam(':numeroPersonas',$_POST['numeroPersonas'],PDO::PARAM_INT);
    $stmt->bindParam(':modalidad',$_POST['modalidad'],PDO::PARAM_STR);
    $stmt->bindParam(':liga',$_POST['liga'],PDO::PARAM_STR);
    
  
    if($stmt->execute()){
        $message='Registro exitoso';
        $_SESSION['message']=$message;
        header('location: mostrarActividad.php');
     }else{
        $message='Error, registro no completado';
        $_SESSION['message']=$message;
        header('location: mostrarActividad.php');
     }
  
}

if(isset($_SESSION['user_id'])){
    $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
    $records->bindParam(':id',$_SESSION['user_id']);
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);

    if($results['rango']!='admin'){
        header('Location: ../index.php');
    }

}else{
    header('Location: ../index.php');
}

?>