<?php

    $tabName='Banner';

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
    

    if (isset($_GET['id'])){

        $_SESSION['idB']=$_GET['id'];

        $id=$_GET['id'];

        $records=$conn->prepare("SELECT id FROM imagen WHERE id=$id");
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: banner');
            exit();

        }

    }

    $id=$_SESSION['idB'];

    if(isset($_POST['Si'])){

        $q="SELECT banner FROM imagen WHERE id=:id";
        $img=$conn->prepare($q);
        $img->bindParam('id',$id);
        $img->execute();
        $img=$img->fetch(PDO::FETCH_ASSOC);

        if(empty($img)){

            header('Location: banner');
            exit();

        }

        $_SESSION['idB']=null;

        if($img['banner']==0){

            $query="DELETE FROM imagen WHERE id=:id";
            $stmt=$conn->prepare($query);
            $stmt->bindParam(':id',$id);

            if($stmt->execute()){

                $message='Imagen eliminada';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='good';

                header('Location: banner');
                exit();

            }else{

                $message='Error, imagen no eliminada';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='error';

                header('Location: banner');
                exit();

            }

        }else{

            $message='No se puede eliminar esta imagen ya que está siendo usada como banner';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='caution';

            header('Location: banner');
            exit();

        }

    }else if(isset($_POST['No'])){

        header('location: banner');
        exit();

    }

?>

<?php include '../includes/header.php'; ?>

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

        <form action="eliminarImagen" class="eliminar" method="POST">

            <label for="" class="eli">¿Está seguro de eliminar esta imagen?</label>

            <input type="submit" name="Si" class="eli field" value="Si">

            <input type="submit" name="No" class="eli field" value="No">

        </form>
    
    </div>

<?php include '../includes/footer.php';  ?>
