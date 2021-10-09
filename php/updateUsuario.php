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

    if(isset($_POST['save'])){

        $programaEvento=$_POST['programa'];
        $email=$_POST['email'];
        $nombreInstitucion=$_POST['nombreInstitucion'];
        $nombreContacto=$_POST['nombreContacto'];
        $telContacto=$_POST['telContacto'];
        $rango=$_POST['rango'];
        $id=$_SESSION['idUsuario'];

        date_default_timezone_set('America/Mexico_City'); 
        $fecha=date("Y-m-d H:i:s");

        if($_POST['password']==''){

            $sql="UPDATE usuario SET email='".$email."', fechaModificacion='".$fecha."', rango= '".$rango."',programaEvento= '".$programaEvento."', nombreInstitucion='".$nombreInstitucion."',nombreContacto='".$nombreContacto."',telContacto='".$telContacto."' WHERE idUsuario = '".$id."' ";
        
        }else{
            
            $contrasena=password_hash($_POST['password'],PASSWORD_BCRYPT);
            $sql="UPDATE usuario SET email='".$email."', fechaModificacion='".$fecha."',contrasena= '".$contrasena."', rango= '".$rango."', programaEvento= '".$programaEvento."', nombreInstitucion='".$nombreInstitucion."',nombreContacto='".$nombreContacto."',telContacto='".$telContacto."' WHERE idUsuario = '".$id."' ";
        
        }

        $stmt=$conn->prepare($sql);
    
        if($stmt->execute()){

            $message='Actualizacion exitosa';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header('location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario'].'#us');
            exit();

        }else{

            $message='Error, Actualizacion no completada';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header('location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario'].'#us');
            exit();

        }
    
    }
    
?>