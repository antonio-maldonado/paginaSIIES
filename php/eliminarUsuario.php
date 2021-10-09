<?php

    $tabName='Eliminar Usuario';

    session_start();
    require 'data.php';
    
    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $user1=$records->fetch(PDO::FETCH_ASSOC);

        if($user1['rango']!='admin'){

            header('Location: ../index');
            exit();

        }

    }else{

        header('Location: ../index');
        exit();

    }

    
    if (isset($_GET['idUsuario'])){

        $_SESSION['idU']=$_GET['idUsuario'];
        $id=$_GET['idUsuario'];

        if($_SESSION['user_id']==$_GET['idUsuario']){

            header('Location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario']);
            exit();

        }

        $records=$conn->prepare("SELECT idUsuario FROM usuario WHERE idUsuario=$id");
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario']);
            exit();

        }

    }

    $id=$_SESSION['idU'];

    if(isset($_POST['Si'])){

        $records=$conn->prepare("DELETE FROM usuario WHERE idUsuario = $id");
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if($results>0){

            $message='Error, no se pudo eliminar el Usuario';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header('location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario'].'#us');
            exit();

        }else{

            $message='Se eliminó el Usuario';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';
            
            header('location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario'].'#us');
            exit();

        }

    }else if(isset($_POST['No'])){

        header('location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario'].'#us');
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

            <?php

                if(isset($_SESSION['user_id'])){

                    if ($user1['rango']=='admin'){ 

            ?>

                        <a href="mostrarActividad" class="padi">Actividades</a>

                        <a href="mostrarUsuarios" class="padi">Usuarios</a>

                        <a href="banner" class="padi">Banner</a>

                        <a href="mostrarCatalogo" class="padi">Catálogo</a>

                        <a href="logout" class="padi">Cerrar Sesión</a>

                    <?php 

                        }else if($user1['rango']=='capturista'){
                        
                    ?>
                    
                            <a href="mostrarActividad" class="padi">Actividades</a>

                            <a href="usuario" class="padi">Usuario</a>

                            <a href="logout" class="padi">Cerrar Sesión</a>

                <?php

                        }

                    }else{

                ?>

                        <a href="login" class="padi">Iniciar Sesión</a>
                
                <?php

                    }

                ?>
                
            </div>
            
    </div>

    <div class="centro mt">

        <form action="eliminarUsuario" class="eliminar" method="POST">

            <label for="" class="eli">¿Está seguro de eliminar este Usuario?</label>

            <input type="submit" name="Si" class="eli field" value="Si">

            <input type="submit" name="No" class="eli field" value="No">

        </form>
    
    </div>

<?php include '../includes/footer.php';  ?>

