<?php
session_start();
require 'data.php';

if(isset($_POST['save'])){

    $records=$conn->prepare('SELECT email FROM usuario WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);
   
        $sql="INSERT INTO usuario (email,contrasena,nombreInstitucion,nombreContacto,telContacto,correoContacto,programaEvento) VALUES ( :email, :contrasena, :nombreInstitucion, :nombreContacto, :telContacto, :correoContacto, :programaEvento)";
        $stmt=$conn->prepare($sql);

        $stmt->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
        $contrasena=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $stmt->bindParam(':contrasena',$contrasena,PDO::PARAM_STR);
        $stmt->bindParam(':nombreInstitucion',$_POST['nombreInstitucion'],PDO::PARAM_STR);
        $stmt->bindParam(':nombreContacto',$_POST['nombreContacto'],PDO::PARAM_STR);
        $stmt->bindParam(':telContacto',$_POST['telContacto'],PDO::PARAM_STR);
        $stmt->bindParam(':correoContacto',$_POST['correoContacto'],PDO::PARAM_STR);
        $stmt->bindParam(':programaEvento',$_POST['programa'],PDO::PARAM_STR);
        $bandera=false;

        if(!empty($results)){
            $message='Ya existe ese correo';
            $_SESSION['message']=$message;
            header('location: signup.php');
        }else{
       
            if($stmt->execute()&&empty($results)){
                $message='Registro exitoso';
                
                $_SESSION['message']=$message;
                $records=$conn->prepare('SELECT idUsuario, email, contrasena,rango FROM usuario WHERE email=:email');
                $records->bindParam(':email', $_POST['email']);
                $records->execute();
                $results=$records->fetch(PDO::FETCH_ASSOC);
                if(empty($results)){
    
                }else{
                    $message='';
                    if(count($results)>0 && password_verify($_POST['password'],$results['contrasena'])){
                    $_SESSION['user_id']=$results['idUsuario'];
                    
                    header('Location: ../index.php');
                    $message='Login exitoso';
                    }else{
                    $message='La contraseña es incorrecta';
                    $_SESSION['message']=$message;
                    header('location: signup.php');
                
                    }
                }
            }else{
                $message='Ya existe ese correo';
                $_SESSION['message']=$message;
                header('location: signup.php');
            }
        }
}
?>