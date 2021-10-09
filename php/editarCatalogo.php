<?php

    $tabName='Editar Catálogo';

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

            Catálogo

        </h1>

    </div>

    <?php

        if(isset($_GET['programa'])){

            $id=$_GET['programa'];

            $query="SELECT ocultar FROM programacatalogo WHERE programa=:programa";
            $records=$conn->prepare($query);
            $records->bindParam(':programa',$id);
            $records->execute();
            $results=$records->fetch(PDO::FETCH_ASSOC);

            if(!$results){

                header('Location: mostrarCatalogo?pagina=1');
                exit();

            }
            
    ?>

            <form action="updateCatalogo.php?programa=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nombre del programa o evento</label>
                <input type="text" name="programa" value="<?= $id?>" onfocus="var val=this.value; this.value=''; this.value= val;"  class="field"  autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>

    <?php
        
        }else if(isset($_GET['nivelEscolar'])){

            $id=$_GET['nivelEscolar'];

            $query="SELECT ocultar FROM nivelescolarcatalogo WHERE nivelEscolar=:nivelEscolar";
            $records=$conn->prepare($query);
            $records->bindParam(':nivelEscolar',$id);
            $records->execute();
            $results=$records->fetch(PDO::FETCH_ASSOC);

            if(!$results){

                header('Location: mostrarCatalogo?pagina=2');
                exit();

            }

    ?>

            <form action="updateCatalogo.php?nivelEscolar=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nivel escolar del público objetivo</label>
                <input type="text" name="nivelEscolar" class="field" value="<?= $id ?>" onfocus="var val=this.value; this.value=''; this.value= val;" autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>

    <?php
        
        }else if(isset($_GET['tipoActividad'])){

            $id=$_GET['tipoActividad'];

            $query="SELECT ocultar FROM tipoactividadcatalogo WHERE tipoActividad=:tipoActividad";
            $records=$conn->prepare($query);
            $records->bindParam(':tipoActividad',$id);
            $records->execute();
            $results=$records->fetch(PDO::FETCH_ASSOC);

            if(!$results){

                header('Location: mostrarCatalogo?pagina=3');
                exit();

            }

    ?>

            <form action="updateCatalogo.php?tipoActividad=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nombre del tipo de actividad</label>
                <input type="text" name="tipoActividad" class="field" value="<?= $id?>" onfocus="var val=this.value; this.value=''; this.value= val;" autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>

    <?php

        } else if(isset($_GET['area'])){

            $id=$_GET['area'];

            $query="SELECT ocultar FROM areacatalogo WHERE area=:area";
            $records=$conn->prepare($query);
            $records->bindParam(':area',$id);
            $records->execute();
            $results=$records->fetch(PDO::FETCH_ASSOC);

            if(!$results){

                header('Location: mostrarCatalogo?pagina=4');
                exit();

            }

    ?>

            <form action="updateCatalogo.php?area=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nombre del área</label>
                <input type="text" name="area" class="field" value="<?= $id?>" onfocus="var val=this.value; this.value=''; this.value= val;" autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>

    <?php

        }else if(isset($_GET['institucion'])){

            $id=$_GET['institucion'];

            $query="SELECT ocultar FROM institucioncatalogo WHERE institucion=:institucion";
            $records=$conn->prepare($query);
            $records->bindParam(':institucion',$id);
            $records->execute();
            $results=$records->fetch(PDO::FETCH_ASSOC);

            if(!$results){

                header('Location: mostrarCatalogo?pagina=5');
                exit();

            }

    ?>

            <form action="updateCatalogo.php?institucion=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nombre de la institución o SEDE</label>
                <input type="text" name="institucion" class="field" value="<?= $id?>" onfocus="var val=this.value; this.value=''; this.value= val;" autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>

    <?php

        }else if(isset($_GET['modalidad'])){

            $id=$_GET['modalidad'];

            $query="SELECT ocultar FROM modalidadcatalogo WHERE modalidad=:modalidad";
            $records=$conn->prepare($query);
            $records->bindParam(':modalidad',$id);
            $records->execute();
            $results=$records->fetch(PDO::FETCH_ASSOC);
    
            if(!$results){
    
                header('Location: mostrarCatalogo?pagina=6');
                exit();
    
            }
    ?>

            <form action="updateCatalogo.php?modalidad=<?php echo$id?>" class="formulario" method="POST">

                <label class="etiqueta" for="">Ingrese el nombre de la modalidad</label>
                <input type="text" name="modalidad" class="field" value="<?= $id?>" onfocus="var val=this.value; this.value=''; this.value= val;" autofocus required>

                <input type="submit" class="field" name="save" value="Enviar">

            </form>

        <?php

            } else{

                header('Location: mostrarCatalogo?pagina=1');
                exit();

            }

        ?>

    <br>
    
<?php include '../includes/footer.php'; ?>
