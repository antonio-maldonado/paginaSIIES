<?php
    session_start();
    require 'data.php';

    $message='';

    if(!empty($_POST['programaEvento'])&&!empty($_POST['tipoActividad'])&&!empty($_POST['nombreActividad'])&&!empty($_POST['area'])&&!empty($_POST['nivelEscolar'])&&!empty($_POST['institucion'])&&!empty($_POST['descripcion'])&&!empty($_POST['fechaHora'])&&!empty($_POST['duracion'])&&!empty($_POST['numeroPersonas'])&&!empty($_POST['modalidad']) &&!empty($_POST['liga']) )
    {
        $sql="INSERT INTO actividad (programaEvento,tipoActividad,nombreActividad,area,nivelEscolarPublicoObjetivo,nombreInstitucion,descripcionActividad,fechaHora,duracion,numeroPersonas,modalidad,liga) VALUES (:programaEvento,:tipoActividad,:nombreActividad,:area,:nivelEscolarPublicoObjetivo,:nombreInstitucion,:descripcionActividad,:fechaHora,:duracion,:numeroPersonas,:modalidad,:liga) ";
        $stmt=$conn->prepare($sql);

        $stmt->bindParam(':programaEvento',$_POST['programaEvento'],PDO::PARAM_STR);
        $stmt->bindParam(':tipoActividad',$_POST['tipoActividad'],PDO::PARAM_STR);
        $stmt->bindParam(':nombreActividad',$_POST['nombreActividad'],PDO::PARAM_STR);
        $stmt->bindParam(':area',$_POST['area'],PDO::PARAM_STR);
        $stmt->bindParam(':nivelEscolarPublicoObjetivo',$_POST['nivelEscolar'],PDO::PARAM_STR);
        $stmt->bindParam(':nombreInstitucion',$_POST['institucion'],PDO::PARAM_STR);
        $stmt->bindParam(':descripcionActividad',$_POST['descripcion'],PDO::PARAM_STR);
        $stmt->bindParam(':fechaHora',$_POST['fechaHora']);
        $stmt->bindParam(':duracion',$_POST['duracion'],PDO::PARAM_INT);
        $stmt->bindParam(':numeroPersonas',$_POST['numeroPersonas'],PDO::PARAM_INT);
        $stmt->bindParam(':modalidad',$_POST['modalidad'],PDO::PARAM_STR);
        $stmt->bindParam(':liga',$_POST['liga'],PDO::PARAM_STR);
        
      
        if($stmt->execute()){
            $message='Registro exitoso';
         }else{
            $message='Error, registro no completado';
         }
      
    }
    
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
                    
                    <form action="saveActividad.php" method="POST">

                        <div class="form-group ">

                            <input type="text" name="programaEvento" class="form-control" placeholder="Escribe el nombre del programa o evento" autofocus required>

                        </div>

                        <div class="form-group ">

                            <input type="text" name="tipoActividad" class="form-control" placeholder="Escribe el tipo de actividad" required>

                        </div>

                         <div class="form-group ">

                            <input type="text" name="nombreActividad" class="form-control" placeholder="Escribe el nombre de la actividad" required>

                        </div>

                        <div class="form-group ">

                            <input type="text" name="area" class="form-control" placeholder="Escribe el nombre del área" required>

                        </div>

                        <div class="form-group ">

                            <input type="text" name="nivelEscolar" class="form-control" placeholder="Escribe el nombre del nivel escolar público objetivo" required >

                        </div>

                        <div class="form-group ">

                            <input type="text" name="institucion" class="form-control" placeholder="Escribe el nombre de la institucion o SEDE" required >

                        </div>

                        <div class="form-group">

                            <textarea name="descripcion"  class="form-control" rows="4" cols="10"  placeholder="Escriba la descripción de la actividad" required></textarea>

                        </div>

                        <br>

                        <div class="form-group">

                            <input type="datetime-local" name="fechaHora" class="form-control" value="2021-01-01T00:00" required>

                        </div>

                        <br>

                        <div class="form-group">

                            <input type="number" name="duracion"  placeholder="Escribe la duracion de la actividad en minutos" min="0" max="999" required class="form-control">

                        </div>

                        <br>

                        <div class="form-group">

                            <input type="number" name="numeroPersonas"  placeholder="Escribe el cupo maximo de personas" min="0" max="9999" required class="form-control">

                        </div>

                        <div class="form-group ">

                            <input type="text" name="modalidad" class="form-control" placeholder="Escribe el nombre de la modalidad" required >

                        </div>

                        <div class="form-group ">

                            <input type="text" name="liga" class="form-control" placeholder="Ingresa la liga(link) de acceso" required >

                        </div>

                        <input type="submit" class="btn btn-success btn-block" name="save" value="Enviar">

                    </form>

                </div>

            </div>

        </div>

    </div>

<?php include '../includes/footer.php'; ?>
