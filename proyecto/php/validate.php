
<?php

if($_POST['password']!=$_POST['confirm_password']){?>
    <form action="signup.php" method="post" >
    <input type="text"  name="email" placeholder="Ingrese su email" value =<?php echo$corre ?> required>
    <input type="password" name="password" placeholder="Ingrese su contraseña" required>
    <input type="password" name="confirm_password" placeholder="Confirme su contraseña" required>
    <input type="text"  name="nombreInstitucion" placeholder="Ingrese el nombre de institución o SEDE" required>
    <input type="text"  name="nombreContacto" placeholder="Ingrese su nombre de contacto" required>
    <input type="tel" name="telContacto" placeholder="Ingrese su numero de teléfono" required>
    <input type="text"  name="correoContacto" placeholder="Ingrese su correo de contacto" required>
    <input type="text"  name="programa" placeholder="Ingrese su nombre de programa o evento" required>
    <input type="submit" value="Send" >
    <?php }
?>
