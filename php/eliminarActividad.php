<?php

    $tabName='Eliminar Actividad';

    session_start();
    require 'data.php';

    if(!isset($_SESSION['user_id'])){

        header('Location: ../index');
        exit();

    }else{
        
        $user=$conn->prepare('SELECT * FROM usuario WHERE idUsuario=:id');
        $user->bindParam(':id',$_SESSION['user_id']);
        $user->execute();
        $user1=$user->fetch(PDO::FETCH_ASSOC);

        if($user1['nivel']==1){

            header('Location: mostrarActividad');
            exit();

        }

    }

    if (isset($_GET['idActividad'])){
        
        $_SESSION['idAct']=$_GET['idActividad'];
        $id=$_GET['idActividad'];

        $records=$conn->prepare("SELECT * FROM actividad WHERE idActividad=$id");
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
            exit();

        }

    }

    if(isset($_POST['Si'])){

        $id=$_SESSION['idAct'];
        $records=$conn->prepare("DELETE FROM ponente WHERE id = $id");
        $records->execute();
        $records=$conn->prepare("DELETE FROM actividad WHERE idActividad = $id");
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if($results>0){

            $message='Error, no se pudo eliminar';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header('location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
            exit();

        }else{

            $message='Se eliminó el registro';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header('location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
            exit();

        }
    }else if(isset($_POST['No'])){

        header('location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
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

        <form action="eliminarActividad" class="eliminar" method="POST">

            <label for="" class="eli">¿Está seguro de eliminar esta actividad?</label>

            <input type="submit" name="Si" class="eli field" value="Si">

            <input type="submit" name="No" class="eli field" value="No">

        </form>
    
    </div>

<?php include '../includes/footer.php';  ?>

