<?php
    session_start();
    require 'data.php';
   
    $message='';

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Signup</title>
</head>
<body>
   
    <header>
        <a href="../index.php">Inicio</a>
    </header>
   
<?php
  if(isset($_SESSION['message'])){
    $aux=$_SESSION['message'];
    echo "<script>alert('$aux');</script>";
    session_unset();
}
?>
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }   
    </script>
     <?php
        if(!empty($message)):
    ?>
    <p><?php  echo "<script>alert('$message');</script>"; ?></p>
    <?php endif;?>
    <h1>Registrarse</h1>
    <span>o <a href="login.php">Iniciar Sesión</a></span>
    <form action="save.php" method="POST">
        <input type="text"  name="email" placeholder="Ingrese su email" required autocomplete="on" required>
        <input type="password" name="password" placeholder="Ingrese su contraseña" required>
        <input type="text"  name="nombreInstitucion" placeholder="Ingrese el nombre de institución o SEDE" required autocomplete="on">
        <input type="text"  name="nombreContacto" placeholder="Ingrese su nombre de contacto" required autocomplete="on">
        <input type="text" name="telContacto" placeholder="Ingrese su numero de teléfono" required autocomplete="on">
        <input type="text"  name="correoContacto" placeholder="Ingrese su correo de contacto" required autocomplete="on">
        <input type="text"  name="programa" placeholder="Ingrese su nombre de programa o evento" required autocomplete="on">
        <input type="submit" name="save" value="Enviar" >
    </form>
</body>
</html>