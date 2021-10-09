<?php
    session_start();
    require 'data.php';

    $message='';

    
if(isset($_SESSION['user_id'])){
    $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
    $records->bindParam(':id',$_SESSION['user_id']);
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);

    if($results['rango']!='admin'){
        header('Location: ../index.php');
    }

}else{
    header('Location: ../index.php');
}


    if (isset($_GET['idActividad'])){
        $id=$_GET['idActividad'];
        $_SESSION['idActividad']=$id;
        $records=$conn->prepare("SELECT idActividad,programaEvento,tipoActividad,nombreActividad,area,nivelEscolarPublicoObjetivo,nombreInstitucion,descripcionActividad,fechaHora,duracion,numeroPersonas,modalidad,liga FROM actividad WHERE idActividad=$id");
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);
        if(!$results){
            header('Location: ../index.php');
        }
    }else{
        header('Location: ../index.php');
    }


?>
 <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }   
</script>

<?php include '../includes/header.php'; ?>

<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="admin.php" class="navbar-brand">Admin</a>
            <a href="mostrarActividad.php" class="navbar-brand">Actividades</a>
            <a href="../index.php" class="navbar-brand ">Inicio</a>
        </div>
</nav>

<?php
        if(!empty($message)):
    ?>
    <p><?php  echo "<script>alert('$message');</script>"; ?></p>
    <?php endif;?>

<div class=" container p-4 d-flex justify-content-center " >

        <div class="row" >

            <div class="col">

                <div class="card card-body">
                    
                    <form action="updateActividad.php" method="POST">

                        <div class="form-group ">

                            <input type="text" name="programaEvento" class="form-control" placeholder="Escribe el nombre del programa o evento" value="<?= $results['programaEvento'] ?>" autofocus required>

                        </div>

                        <div class="form-group ">

                            <input type="text" name="tipoActividad" class="form-control" placeholder="Escribe el tipo de actividad" value="<?= $results['tipoActividad'] ?>" required>

                        </div>

                         <div class="form-group ">

                            <input type="text" name="nombreActividad" class="form-control" placeholder="Escribe el nombre de la actividad" value="<?= $results['nombreActividad'] ?>" required>

                        </div>

                        <div class="form-group ">

                            <input type="text" name="area" class="form-control" placeholder="Escribe el nombre del área" value="<?= $results['area'] ?>" required>

                        </div>

                        <div class="form-group ">

                            <input type="text" name="nivelEscolar" class="form-control" placeholder="Escribe el nombre del nivel escolar público objetivo" value="<?= $results['nivelEscolarPublicoObjetivo'] ?>" required >

                        </div>

                        <div class="form-group ">

                            <input type="text" name="institucion" class="form-control" placeholder="Escribe el nombre de la institucion o SEDE" value="<?= $results['nombreInstitucion'] ?>" required >

                        </div>

                        <div class="form-group">

                            <textarea name="descripcion"  class="form-control" rows="4" cols="10"  placeholder="Escriba la descripción de la actividad" required><?= $results['descripcionActividad'] ?></textarea>

                        </div>

                        <br>

                        <div class="form-group">

                            <input type="datetime-local" name="fechaHora" class="form-control" value="2021-01-01T00:00" value="<?= $results['fechaHora'] ?>" required>

                        </div>

                        <br>

                        <div class="form-group">

                            <input type="number" name="duracion"  placeholder="Escribe la duracion de la actividad en minutos" min="0" max="999" value="<?= $results['duracion'] ?>" required class="form-control">

                        </div>

                        <br>

                        <div class="form-group">

                            <input type="number" name="numeroPersonas"  placeholder="Escribe el cupo maximo de personas" min="0" max="9999" value="<?= $results['numeroPersonas'] ?>" required class="form-control">

                        </div>

                        <div class="form-group ">

                            <input type="text" name="modalidad" class="form-control" placeholder="Escribe el nombre de la modalidad" value="<?= $results['modalidad'] ?>" required >

                        </div>

                        <div class="form-group ">

                            <input type="text" name="liga" class="form-control" placeholder="Ingresa la liga(link) de acceso" value="<?= $results['liga'] ?>" required >

                        </div>

                        <input type="submit" class="btn btn-success btn-block" name="save" value="Enviar">

                    </form>

                </div>

            </div>

        </div>

    </div>

<?php include '../includes/footer.php'; ?>
