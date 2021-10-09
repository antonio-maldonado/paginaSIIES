<?php
session_start();
require 'data.php';

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

    $sql="UPDATE actividad SET programaEvento= '".$programaEvento."', tipoActividad='".$tipoActividad."',nombreActividad='".$nombreActividad."',area='".$area."',nivelEscolarPublicoObjetivo='".$nivelEscolar."',nombreInstitucion='".$institucion."',descripcionActividad='".$descripcion."',fechaHora='".$fechaHora."',duracion='".$duracion."',numeroPersonas='".$numeroPersonas."',modalidad='".$modalidad."', liga='".$liga."' WHERE idActividad = '".$id."' ";
    $stmt=$conn->prepare($sql);
  
    if($stmt->execute()){
        $message='Actualizacion exitosa';
        $_SESSION['message']=$message;
        header('location: mostrarActividad.php');
     }else{
        $message='Error, Actualizacion no completada';
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