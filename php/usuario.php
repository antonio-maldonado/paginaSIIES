<?php

    $tabName='Usuario';

    session_start();
    require 'data.php';

    if(isset($_SESSION['user_id'])){
    
        $records=$conn->prepare('SELECT * FROM usuario WHERE idUsuario=:idUsuario');
        $records->bindParam(':idUsuario', $_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if($results['rango']!='capturista'){

            header('Location: ../index');
            exit();

        }

    }else{

        header('Location: ../index');
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

                    if ($results['rango']=='admin'){ 

            ?>
                   
                        <a href="banner" class="padi">Banner</a>

                        <a href="mostrarUsuarios" class="padi">Usuarios</a>

                        <a href="mostrarCatalogo" class="padi">Catálogo</a>

                        <a href="logout" class="padi">Cerrar Sesión</a>

                    <?php 

                        }else if($results['rango']=='capturista'){
                        
                    ?>

                            <a href="mostrarActividad" class="padi">Actividades</a>

                            <a href="usuario" class="padi pestana">Usuario</a>

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

        <h1>

           Usuario

        </h1>

    </div>  

    <form action="cambiarContrasena" class="formulario" method="POST">

        <label class="etiqueta" for="">Correo electrónico</label>
        <input type="email"  name="email" class="field" value="<?= $results['email'] ?>" disabled required>

        <label class="etiqueta" for="rangoId">Nombre de la institución o SEDE</label>
        <input type="email"  name="email" class="field" value="<?= $results['nombreInstitucion'] ?>"  disabled required>

        <label class="etiqueta" for="">Nombre de contacto</label>
        <input type="text" name="nombreContacto" value="<?= $results['nombreContacto'] ?>" disabled class="field" required>

        <label class="etiqueta" for="">Número telefónico</label>
        <input type="text" name="telContacto" value="<?= $results['telContacto'] ?>" disabled class="field" required >
        
        <label class="etiqueta" for="rangoId">Nombre del programa o evento</label>
        <input type="text" name="telContacto" value="<?= $results['programaEvento'] ?>" disabled class="field" required >

        <input type="submit" class="field" name="save" value="Cambiar contraseña">

    </form>

    <br>

<?php include '../includes/footer.php'; ?>