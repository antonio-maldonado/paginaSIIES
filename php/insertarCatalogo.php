<?php

    $tabName='Agregar al Catálogo';

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

           Agregar al Catálogo

        </h1>

    </div>

    <?php

        if(isset($_GET['programa'])){

            $id=$_GET['programa'];

    ?>

            <form action="saveCatalogo.php?programa=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nombre del programa o evento</label>
                <input type="text" name="programa" class="field"  autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>

    <?php
            
        }else if(isset($_GET['nivelEscolar'])){

            $id=$_GET['nivelEscolar'];

    ?>

            <form action="saveCatalogo.php?nivelEscolar=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nivel escolar del público objetivo</label>
                <input type="text" name="nivelEscolar" class="field"  autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>
     
    <?php
            
        }else if(isset($_GET['tipoActividad'])){

            $id=$_GET['tipoActividad'];

    ?>

            <form action="saveCatalogo.php?tipoActividad=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nombre del tipo de actividad</label>
                <input type="text" name="tipoActividad" class="field"  autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>

    <?php
            
        }else if(isset($_GET['area'])){

            $id=$_GET['area'];

    ?>

            <form action="saveCatalogo.php?area=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nombre del area</label>
                <input type="text" name="area" class="field"  autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>

    <?php
            
        }else if(isset($_GET['institucion'])){

            $id=$_GET['institucion'];

    ?>

            <form action="saveCatalogo.php?institucion=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nombre de la institución o SEDE</label>
                <input type="text" name="institucion" class="field"  autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>

    <?php
            
        }else if(isset($_GET['modalidad'])){

            $id=$_GET['modalidad'];

    ?>

            <form action="saveCatalogo.php?modalidad=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nombre de la modalidad</label>
                <input type="text" name="modalidad" class="field"  autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>

    <?php
            
        }

    ?>
    <br>
<?php include '../includes/footer.php'; ?>