<?php

    session_start();
    require 'data.php';

    if(isset($_SESSION['user_id'])){
    
        $records=$conn->prepare('SELECT * FROM usuario WHERE idUsuario=:idUsuario');
        $records->bindParam(':idUsuario', $_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if($results['rango']!='capturista'){

            header('Location: ../index');
            exit();

        }

    }else{

        header('Location: ../index');
        exit();

    }
    
    if(!empty($_POST['password'])){

        $contrasena=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $sql="UPDATE usuario SET  contrasena='".$contrasena."' WHERE idUsuario = '".$_SESSION['user_id']."' ";
        $stmt=$conn->prepare($sql);

        if($stmt->execute()){           
            
            $message='Contraseña actualizada';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: usuario");
            exit();
          
        }else{
             
            $message='No se pudo actualizar la contraseña';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: usuario");
            exit();

        }

    }
    
?>
