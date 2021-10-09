<?php

    $tabName='Usuario';

    session_start();

    require 'data.php';

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if($results['rango']!='admin'){

            header('Location: ../index');
            exit();

        }

        if(isset($_GET['idUsuario'])){
            
            $id=$_GET['idUsuario'];
            
            $records=$conn->prepare("SELECT * FROM usuario WHERE idUsuario=$id");
            $records->execute();
            $results=$records->fetch(PDO::FETCH_ASSOC);

            if(!$results){

                header('Location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario']);
                exit();

            }

        }else{

            header('Location: mostrarUsuarios?pagina='.$_SESSION['pagUsuario']);
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
                
            <a href="mostrarActividad" class="padi">Actividades</a>

            <a href="mostrarUsuarios" class="padi">Usuarios</a>

            <a href="banner" class="padi">Banner</a>

            <a href="mostrarCatalogo" class="padi">Catálogo</a>

            <a href="logout" class="padi">Cerrar Sesión</a>
                
        </div>
            
    </div>

    <div class="centro mt">

        <h1>

            Usuario

        </h1>

    </div>

    <?php

        $id=$_SESSION['pagUsuario'];

    ?>

    <form action="mostrarUsuarios?pagina=<?=$id?>" class="formulario" method="POST">

        <label class="etiqueta" for="">Correo electrónico</label>
        <input type="email"  name="email" class="field" value="<?= $results['email'] ?>" disabled required>

        <label class="etiqueta" for="rangoId">Nombre de la institución</label>
        <input type="email"  name="email" class="field" value="<?= $results['nombreInstitucion'] ?>"  disabled required>

        <label class="etiqueta" for="">Nombre completo</label>
        <input type="text" name="nombreContacto" value="<?= $results['nombreContacto'] ?>" disabled class="field" required>

        <label class="etiqueta" for="">Número telefónico</label>
        <input type="text" name="telContacto" value="<?= $results['telContacto'] ?>" disabled class="field" required >

        <label class="etiqueta" for="rangoId">Nombre del programa</label>
        <input type="text" name="telContacto" value="<?= $results['programaEvento'] ?>" disabled class="field" required >

        <label class="etiqueta" for="rangoId">Rango del Usuario:</label>
        <input type="text" name="telContacto" value="<?= $results['rango'] ?>" disabled class="field" required >

        <label class="etiqueta" for="fc">Fecha de creación</label>
        <input type="text" value="<?= $results['fechaCreacion'] ?>"  id="num" class="field" name="duracion"  min="0" max="999" disabled=""> 
            
        <label class="etiqueta" >Fecha de la ultima modificación</label> 
        <input type="text" value="<?= $results['fechaModificacion'] ?>"  id="num" class="field" name="duracion"  min="0" max="999" disabled=""> 

        <input type="submit" class="field" name="save" value="Regresar">

    </form>

    <br>

<?php include '../includes/footer.php'; ?>