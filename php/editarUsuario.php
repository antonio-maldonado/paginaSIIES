<?php

    $tabName='Editar Usuario';

    session_start();

    require 'data.php';

    $message='';

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT * FROM usuario WHERE idUsuario=:id');
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

    if (isset($_GET['idUsuario'])){

        $id=$_GET['idUsuario'];
        $_SESSION['idUsuario']=$id;

        $records=$conn->prepare("SELECT * FROM usuario WHERE idUsuario=$id");
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario']);
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

           Editar Usuario

        </h1>

    </div>

    <form action="updateUsuario.php" class="formulario" method="POST">

        <label class="etiqueta" for="">Ingrese su correo electrónico</label>
        <input type="email" name="email" class="field" value="<?= $results['email'] ?>" onfocus="var val=this.value; this.value=''; this.value= val;" autocomplete="on" autofocus required>

        <label class="etiqueta" for="">Ingrese su contraseña</label>
        <input type="password" name="password" class="field" placeholder="(Vacío si no quiere cambiar)" value="">

        <label class="etiqueta" for="rangoId">Ingrese el nombre de la institución</label>
        <select  class="field" name="nombreInstitucion" required>

            <option value="<?= $results['nombreInstitucion'] ?>"><?= $results['nombreInstitucion'] ?></option>

        <?php

            $records=$conn->prepare('SELECT * FROM institucioncatalogo WHERE institucion<>:institucion AND ocultar=:ocultar');
            $records->bindParam(':institucion',$results['nombreInstitucion']);
            $records->bindParam(':ocultar',$cero);
            $records->execute();
            while($results1=$records->fetch(PDO::FETCH_ASSOC)){

        ?>

                <option value="<?=$results1['institucion']?>"><?=$results1['institucion']?></option>

        <?php

            }

        ?>
                                
        </select>

        <label class="etiqueta" for="">Ingrese el nombre completo</label>
        <input type="text" name="nombreContacto" value="<?= $results['nombreContacto'] ?>" class="field" required>

        <label class="etiqueta" for="">Ingrese el número telefónico</label>
        <input type="text" name="telContacto" value="<?= $results['telContacto'] ?>" class="field" required >

        <label class="etiqueta" for="rangoId">Ingrese el nombre del programa</label>
        <select  class="field" id="rangoId" name="programa" required>

            <option value="<?= $results['programaEvento'] ?>"><?= $results['programaEvento'] ?></option>

        <?php

            $records=$conn->prepare('SELECT * FROM programacatalogo WHERE programa<>:programa AND ocultar=:ocultar');
            $records->bindParam(':programa',$results['programaEvento']);
            $records->bindParam(':ocultar',$cero);
            $records->execute();
            while($results1=$records->fetch(PDO::FETCH_ASSOC)){

        ?>
            
                <option value="<?=$results1['programa']?>"> <?=$results1['programa']?></option>

        <?php

            }

        ?>
                                
        </select>

        <label class="etiqueta" for="rangoId">Elige el rango del Usuario:</label>
        <select  class="field" id="rangoId" name="rango" required>

            <option value="<?= $results['rango'] ?>"><?= $results['rango'] ?></option>
                                
        <?php

            if($results['rango']=='capturista'){

        ?>

                <option value="admin">admin</option>

        <?php

            }else{

                if($_SESSION['user_id']!=$id){
        ?>

                <option value="capturista">capturista</option>

        <?php
                }
            }

        ?>

        </select>

        <input type="submit" class="field" name="save" value="Enviar">

    </form>

    <br>

<?php include '../includes/footer.php'; ?>