<?php
session_start();
require 'data.php';

if (isset($_GET['idActividad'])){
    $id=$_GET['idActividad'];
    $records=$conn->prepare("DELETE FROM actividad WHERE idActividad = $id");
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);

    if($results){
        $message='Error, no se pudo eliminar';
        $_SESSION['message']=$message;
        header('location: mostrarActividad.php');
    }else{
        $message='Se eliminó el registro';
        $_SESSION['message']=$message;
        header('location: mostrarActividad.php');
    }
}

?>