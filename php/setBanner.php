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

    if(isset($_GET['id'])){

        $id=$_GET['id'];

        $records=$conn->prepare("SELECT id FROM imagen WHERE id=$id");
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: banner');
            exit();

        }
        
        $setBanner=1;
        $unsetBanner=0;

        $sql="UPDATE imagen SET  banner='".$unsetBanner."' WHERE banner = '".$setBanner."' ";
        $stmt=$conn->prepare($sql);
        $stmt->execute();

        $sql="UPDATE imagen SET  banner='".$setBanner."' WHERE id = '".$id."' ";
        $stmt=$conn->prepare($sql);


        if($stmt->execute()){

            $message='Imagen seleccionada como banner';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header('Location: banner');
            exit();
    
        }else{

            $message='Error, No se pudo seleccionar la imagen como banner';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header('Location: banner');
            exit();

        }

    }

?>