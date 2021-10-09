<?php

    $tabName='Cambiar contraseña';

    session_start();
    require 'data.php';

    if(isset($_SESSION['user_id'])){
    
        $records=$conn->prepare('SELECT * FROM usuario WHERE idUsuario=:idUsuario');
        $records->bindParam(':idUsuario', $_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if($results['rango']!='capturista'){

            header('Location: mostrarActividad');
            exit();

        }

    }else{

        header('Location: login3');
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

                            <a href="usuario" class="padi">Usuario</a>

                            <a href="logout" class="padi">Cerrar Sesión</a>

                <?php

                        }

                    }else{

                        header('Location: login3');
                        exit();

                    }

                ?>
                
            </div>
            
    </div>

    <div class="centro mt">

        <h1>

            Usuario

        </h1>

    </div>

    <form action="updateContrasena.php" class="formulario" method="POST">

        <label class="etiqueta" for="">Ingrese su nueva contraseña</label>
        <input type="password" name="password" class="field" required autofocus>

        <input type="submit" class="field" name="save" value="Enviar">

    </form>

   

<?php include '../includes/footer.php'; ?>