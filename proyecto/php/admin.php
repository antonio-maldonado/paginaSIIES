<?php
    session_start();
    require 'data.php';


    if(isset($_SESSION['user_id'])){
        
        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);
  
    }else{
        header('Location: ../index.php');
    }



?>

    <?php include '../includes/header.php'?>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="../index.php" class="navbar-brand">Inicio</a>
        </div>

    </nav>
    <br> <br>
    <div>
        <?php
            if ($results['rango']=='admin'){
        ?>
       
        <a href="mostrarActividad.php">Mostrar Actividades</a>
        <?php
            }else{
                    header('Location: ../index.php');
                }
        ?>
    </div>
    
    <?php include '../includes/footer.php'?>
   