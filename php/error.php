<?php

    session_start();

    require 'data.php';

    $error=$_SERVER["REDIRECT_STATUS"];
    $error_title='';
    $error_message='';

    if($error==404){

        $error=NULL;

        $message='No existe esa pagina';
        $_SESSION['message']=$message;
        $_SESSION['tipo']='error';

        header('Location: /php/mostrarActividad');
        exit();  
        
    }

?>

