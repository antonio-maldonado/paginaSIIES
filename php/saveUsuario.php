<?php

    session_start();
    require 'data.php';
    $bandera=0;

    if(isset($_SESSION['user_id'])){

        $bandera=1;
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

        $records=$conn->prepare('SELECT idUsuario FROM usuario WHERE email=:email AND (nombreInstitucion<>:nombreInstitucion OR nombreContacto<>:nombreContacto OR telContacto<>:telContacto OR programaEvento<>:programaEvento OR rango<>:rango)');
        $records->bindParam(':email', $_POST['email']);
        $records->bindParam(':nombreInstitucion',$_POST['nombreInstitucion'],PDO::PARAM_STR);
        $records->bindParam(':nombreContacto',$_POST['nombreContacto'],PDO::PARAM_STR);
        $records->bindParam(':telContacto',$_POST['telContacto'],PDO::PARAM_STR);
        $records->bindParam(':programaEvento',$_POST['programa'],PDO::PARAM_STR);
        $records->bindParam(':rango',$_POST['rango'],PDO::PARAM_STR);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(($results)){

            $message='Usuario no creado, Ya existe ese correo';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header('location: mostrarUsuarios');
            exit();

        }

        $records=$conn->prepare('SELECT idUsuario FROM usuario WHERE email=:email AND nombreInstitucion=:nombreInstitucion AND nombreContacto=:nombreContacto AND telContacto=:telContacto AND programaEvento=:programaEvento AND rango=:rango');
        $records->bindParam(':email', $_POST['email']);
        $records->bindParam(':nombreInstitucion',$_POST['nombreInstitucion'],PDO::PARAM_STR);
        $records->bindParam(':nombreContacto',$_POST['nombreContacto'],PDO::PARAM_STR);
        $records->bindParam(':telContacto',$_POST['telContacto'],PDO::PARAM_STR);
        $records->bindParam(':programaEvento',$_POST['programa'],PDO::PARAM_STR);
        $records->bindParam(':rango',$_POST['rango'],PDO::PARAM_STR);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(($results)){

            $message='Usuario Creado';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header('location: mostrarUsuarios');
            exit();

        }
    
        $sql="INSERT INTO usuario (email,contrasena,nombreInstitucion,nombreContacto,telContacto,programaEvento,rango,fechaCreacion,fechaModificacion) VALUES ( :email, :contrasena, :nombreInstitucion, :nombreContacto, :telContacto, :programaEvento,:rango,:fechaCreacion,:fechaModificacion)";
        $stmt=$conn->prepare($sql);

        $stmt->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
        $contrasena=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $stmt->bindParam(':contrasena',$contrasena,PDO::PARAM_STR);
        $stmt->bindParam(':nombreInstitucion',$_POST['nombreInstitucion'],PDO::PARAM_STR);
        $stmt->bindParam(':nombreContacto',$_POST['nombreContacto'],PDO::PARAM_STR);
        $stmt->bindParam(':telContacto',$_POST['telContacto'],PDO::PARAM_STR);
        $stmt->bindParam(':programaEvento',$_POST['programa'],PDO::PARAM_STR);
        $stmt->bindParam(':rango',$_POST['rango'],PDO::PARAM_STR);

        date_default_timezone_set('America/Mexico_City'); 
        $fecha=date("Y-m-d H:i:s");
        $stmt->bindParam(':fechaCreacion',$fecha);
        $stmt->bindParam(':fechaModificacion',$fecha);

            if($stmt->execute()){
                    
                $message='Usuario Creado';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='good';

                header('location: mostrarUsuarios');
                exit();

            }else{

                $message='Error, usuario no creado';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='error';

                header('location: mostrarUsuarios');
                exit();

            }
                    
        }else{

            header('location: mostrarUsuarios');
            exit();
            
        }

    
    
?>