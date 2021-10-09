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

        if(isset($_GET['idUsuario'])){

            if($_SESSION['user_id']==$_GET['idUsuario']){

                header('Location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario']);
                exit();
    
            }
            
            $id=$_GET['idUsuario'];
            $uno=1;
            $cero=0;
            
            $records=$conn->prepare('SELECT * FROM usuario WHERE idUsuario=:idUsuario');
            $records->bindParam(':idUsuario',$id);
            $records->execute();
            $results=$records->fetch(PDO::FETCH_ASSOC);

            if(!$results){

                header('Location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario']);
                exit();
    
            }

            if($results['apagar']==0){

                $sql="UPDATE usuario SET apagar='".$uno."' WHERE idUsuario = '".$id."' ";
                $stmt=$conn->prepare($sql);
                $stmt->execute();
    
                header('Location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario']);
                exit();
    
            }else{
    
                $sql="UPDATE usuario SET apagar='".$cero."' WHERE idUsuario = '".$id."' ";
                $stmt=$conn->prepare($sql);
                $stmt->execute();
    
                header('Location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario']);
                exit();
    
            }

        }else{

            header('Location: ../index');
            exit();
            
        }
    
    }else{

        header('Location: ../index');
        exit();
        
    }



?>