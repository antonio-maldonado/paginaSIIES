<?php

    $tabName='Agregar Usuario';

    session_start();

    require 'data.php';

    $message='';

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if($results['rango']!='admin'){

            header('Location: ../index');
            exit();

        }
  
    }else{

        header('Location: ../index');
        exit();

    }

    $cero=0;

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

            <a href="mostrarActividad" class="padi">Actividades</a>

            <a href="mostrarUsuarios" class="padi">Usuarios</a>

            <a href="banner" class="padi">Banner</a>

            <a href="mostrarCatalogo" class="padi">Catálogo</a>

            <a href="logout" class="padi">Cerrar Sesión</a>
                
        </div>
            
    </div>

    <div class="centro mt">

        <h1>

            Agregar Usuario

        </h1>

    </div>

    <form action="saveUsuario.php" class="formulario" method="POST">

        <label class="etiqueta" for="">Ingrese su correo electrónico</label>
        <input type="email"  name="email" class="field" autocomplete="on" autofocus required>

        <label class="etiqueta" for="">Ingrese su contraseña</label>
        <input type="password" name="password" class="field" required>

        <label class="etiqueta" for="rangoId">Ingrese el nombre de la institución</label>
        <select  class="field" name="nombreInstitucion" required>

            <option value="">--Por favor, selecciona una opción-</option>

        <?php

            $records=$conn->prepare('SELECT * FROM institucioncatalogo WHERE ocultar=:ocultar');
            $records->bindParam(':ocultar',$cero);
            $records->execute();

            while($results=$records->fetch(PDO::FETCH_ASSOC)){

        ?>

                <option value="<?=$results['institucion']?>"><?=$results['institucion']?></option>

        <?php

            }

        ?>
                                
        </select>

        <label class="etiqueta" for="">Ingrese el nombre completo</label>
        <input type="text" name="nombreContacto" class="field" required>

        <label class="etiqueta" for="">Ingrese el número telefónico</label>
        <input type="text" name="telContacto" class="field" required >

        <label class="etiqueta" for="rangoId">Ingrese el nombre del programa</label>
        <select  class="field" id="rangoId" name="programa" required>

            <option value="">--Por favor, selecciona una opción-</option>

        <?php

            $records=$conn->prepare('SELECT * FROM programacatalogo WHERE ocultar=:ocultar');
            $records->bindParam(':ocultar',$cero);
            $records->execute();

            while($results=$records->fetch(PDO::FETCH_ASSOC)){

        ?>

                <option value="<?=$results['programa']?>"><?=$results['programa']?></option>

        <?php

            }

        ?>
                                
        </select>

        <label class="etiqueta" for="rangoId">Elige el rango del Usuario:</label>
        <select  class="field" id="rangoId" name="rango" required>

            <option value="">--Por favor, selecciona una opción-</option>

            <option value="admin">admin</option>

            <option value="capturista">capturista</option>

        </select>

        <input type="submit" class="field" name="save" value="Enviar">

    </form>

    <br>

<?php include '../includes/footer.php'; ?>