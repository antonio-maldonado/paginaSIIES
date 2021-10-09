<?php

session_start();
require 'data.php';

if(isset($_SESSION['user_id'])){
   header('Location: ../index.php');
}

if(!empty($_POST['email']) && !empty($_POST['password'])){
    $records=$conn->prepare('SELECT idUsuario, email, contrasena,rango FROM usuario WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);
    if(empty($results)){
    echo "<script>alert('No existe ese correo');</script>";
   
    }else{
        $message='';
        if(count($results)>0 && password_verify($_POST['password'],$results['contrasena'])){
        $_SESSION['user_id']=$results['idUsuario'];
        
        header('Location: ../index.php');
        $message='Login exitoso';
        }else{
        $message='La contraseña es incorrecta';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }   
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
        if(!empty($message)):
    ?>
    <p><?php  echo "<script>alert('$message');</script>"; ?></p>
    <?php endif;?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    
    <header>
        <nav>
            <a href="../index.php">inicio</a>
        </nav>
    </header>

    <br>
        <br>
    <h1>Iniciar Sesión</h1>
    <span>o <a href="signup.php">Registrarse</a></span>

    <form action="login.php" method="post">
        <input type="text"  name="email" placeholder="Ingrese su email" required autofocus>
        <input type="password" name="password" placeholder="Ingrese su contraseña" required>
        <input type="submit" value="Send" >
    </form>
</body>
</html>