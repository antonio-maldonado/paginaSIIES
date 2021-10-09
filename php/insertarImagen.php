<?php

    $tabName='Agregar Imagen';

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
   

    if(isset($_REQUEST['save'])){

        if(isset($_FILES['imagen']['name'])){

            $tipoArchivo=$_FILES['imagen']['type'];

            $permitido=array("image/png","image/jpg","image/jpeg");

            if(in_array($tipoArchivo,$permitido)==false){

                $message='Tipo de archivo no permitido, solo: jpg,jpeg,png';
                $_SESSION['message']=$message;
                
                header('location: insertarImagen');
                exit();
            }


            $nombreArchivo=$_FILES['imagen']['name'];
            $tamanoArchivo=$_FILES['imagen']['size'];
            $img=fopen($_FILES['imagen']['tmp_name'],'r');
            $binaryImg=fread($img,$tamanoArchivo);
            $binImg=$conn->quote($binaryImg);

            $query="SELECT id FROM imagen WHERE titulo=:titulo AND img=:img AND tipo=:tipo ";
            $stmt=$conn->prepare($query);
            $stmt->bindParam(':titulo',$nombreArchivo);
            $stmt->bindParam(':img',$binaryImg);
            $stmt->bindParam(':tipo',$tipoArchivo);
            $stmt->execute();
    
            $id1=$stmt->fetch(PDO::FETCH_ASSOC);
    
            if(($id1)){
    
                header('location: banner#imagen');
                exit();
                
            }

            $query="INSERT INTO imagen(titulo,img,tipo) VALUES (:titulo,:img,:tipo)";
            $stmt=$conn->prepare($query);
            
            $stmt->bindParam(':titulo',$nombreArchivo);
            $stmt->bindParam(':img',$binaryImg);
            $stmt->bindParam(':tipo',$tipoArchivo);

            if($stmt->execute()){

                $message='Imagen guardada';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='good';
                header('location: banner#imagen');
                exit();

            }else{

                $message='Error, no se guardó la imagen';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='error';
                header('location: banner');
                exit();

            }
        }

    }

?>

<?php include '../includes/header.php'?>

    <div class="topnav" id="myTopnav">
    
    <a href="../index"  class="im">
                
        <img src="../img/siies1.png" class="nav-brand" alt="Logo SIIES">

    </a>

    <div class="ai">

        <a href="javascript:void(0);" class="icon" onclick="myFunction()">

            <i class="fa fa-bars"></i>

        </a>

    </div>

    <div class="caja">
               
        <a href="mostrarActividad" class="padi">Actividades</a>

        <a href="mostrarUsuarios" class="padi">Usuarios</a>
        
        <a href="banner" class="padi">Banner</a>

        <a href="mostrarCatalogo" class="padi">Catálogo</a>

        <a href="logout" class="padi">Cerrar Sesión</a>

    </div>
        
</div>

    <div class="centro mt">

        <h1>

            Agregar Imagen

        </h1>

    </div>

    <form method="post" class="formulario" enctype="multipart/form-data">

        <label class="etiqueta" for="">Ingrese una imagen</label>
        <input type="file" class="field" name="imagen" autofocus id="" placeholder="" aria-describedby="fileHelpId">

        <input type="submit" name="save" class="field" value="Enviar">

    </form>

<?php include '../includes/footer.php'?>
   