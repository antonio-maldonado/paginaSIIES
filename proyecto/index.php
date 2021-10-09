<?php
session_start();

require 'php/data.php';
if(isset($_SESSION['user_id'])){
    $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
    $records->bindParam(':id',$_SESSION['user_id']);
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);

    $user=null;

    if(count($results)>0){
        $user=$results;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/proyecto/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Sistema</title>
</head>
<body>
    
    <h1>Bienvenido</h1>   
      
    <?php
        if(isset($_SESSION['message'])){
            $aux=$_SESSION['message'];
            echo "<script>alert('$aux');</script>";
            session_unset();
        }
        if(!empty($user)){

    ?>
    <h2><?=$user['nombreContacto']; ?></h2>
    <br>
    <a href="php/logout.php">Logout</a>
    
    <br><?php
    if ($results['rango']=='admin'){ ?>
        <br>
    <a href="php/admin.php">admin</a>
    
    <?php
     }?>
    <?php 
        }else{?>

         <br>
        <nav>
        <a href="php/login.php">Iniciar Sesión</a>
        <a href="php/signup.php">Registrarse</a>
        </nav>
        <br>
    <?php } ?>
    
</body>
</html>
