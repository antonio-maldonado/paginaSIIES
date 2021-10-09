<?php

    $tabName='Eliminar Participante';

    session_start();
    require 'data.php';
    
    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango,nivel FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $user1=$records->fetch(PDO::FETCH_ASSOC);

        if($user1['nivel']==1){

            header('Location: mostrarActividad');
            exit();

        }

    }else{

        header('Location: ../index');
        exit();

    }

    
    if (isset($_GET['idPonente'])){
        
        $_SESSION['idP']=$_GET['idPonente'];
        $id=$_GET['idPonente'];

        $records=$conn->prepare('SELECT * FROM ponente WHERE idPonente=:idPonente');
        $records->bindParam(':idPonente',$id);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
            exit();

        }

    }else if (!isset($_GET['idPonente'])&&!isset($_POST['Si'])){

        header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
        exit();

    }

    $id=$_SESSION['idP'];

    if(isset($_POST['Si'])){
   
        $records2=$conn->prepare('SELECT id FROM ponente WHERE idPonente=:id');
        $records2->bindParam(':id',$id);
        $records2->execute();
        $results2=$records2->fetch(PDO::FETCH_ASSOC);

        if(!$results2){
            header("Location: editarActividad?idActividad=".$_SESSION['comodin'].'#ponente');
            exit();
        }

        $records=$conn->prepare("DELETE FROM ponente WHERE idPonente = $id");
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if($results){
            
            $message='Error, no se pudo eliminar al participante';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';   

            header("Location: editarActividad?idActividad=".$results2['id'].'#ponente');
            exit();
           
        }else{

            $_SESSION['comodin']=$results2['id'];

            $message='Se eliminó al parcipante';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';
            
            header("Location: editarActividad?idActividad=".$results2['id'].'#ponente');
            exit();

        }

    }else if(isset($_POST['No'])){

        $records2=$conn->prepare('SELECT id FROM ponente WHERE idPonente=:id');
        $records2->bindParam(':id',$id);
        $records2->execute();
        $results2=$records2->fetch(PDO::FETCH_ASSOC);

        header('location: editarActividad?idActividad='.$results2['id'].'#ponente');
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

        <form action="eliminarPonente" class="eliminar" method="POST">

            <label for="" class="eli">¿Está seguro de eliminar a este participante?</label>

            <input type="submit" name="Si" class="eli field" value="Si">

            <input type="submit" name="No" class="eli field" value="No">

        </form>
    
    </div>

<?php include '../includes/footer.php';  ?>
