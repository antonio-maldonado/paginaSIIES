<?php
session_start();
require 'data.php';

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

<?php include '../includes/header.php'; ?>

<script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }   
</script>

<?php
    if(isset($_SESSION['message'])){
        $aux=$_SESSION['message'];
        echo "<script>alert('$aux');</script>";
        $_SESSION['message']=null;
    }
?>

<script src="https://kit.fontawesome.com/03bb5336a4.js" crossorigin="anonymous"></script>

<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="admin.php" class="navbar-brand">Admin</a>
            <a href="../index.php" class="navbar-brand ">Inicio</a>
        </div>
</nav>

<div class="col-md-12">

    <table class="table table-bordered">
        <thead>
            <th>Programa o Evento</th>
            <th>Tipo de actividad</th>
            <th>Nombre de Actividad</th>
            <th>Área</th>
            <th>Nivel escolar</th>
            <th>Institución o SEDE</th>
            <th>Descripción</th>
            <th>Fecha y hora</th>
            <th>Duración</th>
            <th>Número de personas</th>
            <th>Modalidad</th>
            <th>Liga</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
            $records=$conn->prepare('SELECT idActividad,programaEvento,tipoActividad,nombreActividad,area,nivelEscolarPublicoObjetivo,nombreInstitucion,descripcionActividad,fechaHora,duracion,numeroPersonas,modalidad,liga FROM actividad');
            $records->execute();
            
            while($results=$records->fetch(PDO::FETCH_ASSOC)){?>
                <tr>
                    <td>
                        <?= $results['programaEvento']?>
                    </td>
                    <td>
                        <?= $results['tipoActividad']?>     
                    </td>
                    <td>
                        <?= $results['nombreActividad']?>
                    </td>
                    <td>
                        <?= $results['area']?>
                    </td>
                    <td>
                        <?= $results['nivelEscolarPublicoObjetivo']?>
                    </td>
                    <td>
                        <?= $results['nombreInstitucion']?>
                    </td>
                    <td>
                        <?= $results['descripcionActividad']?>
                    </td>
                    <td>
                        <?= $results['fechaHora']?>
                    </td>
                    <td>
                        <?= $results['duracion']?>
                    </td>
                    <td>
                        <?= $results['numeroPersonas']?>
                    </td>
                    <td>
                        <?= $results['modalidad']?>
                    </td>
                    <td>
                    <?= $results['liga']?>
                    </td>
                    <td>
                        <a class="btn btn-secondary" href="edit.php?idActividad=<?php echo$results['idActividad']?>"><i class="fas fa-edit"> </i></a>
                 
                        <a class="btn btn-danger" href="delete.php?idActividad=<?php echo$results['idActividad']?>"><i class="fas fa-trash-alt"> </i></a>
                 
                        <a class="btn btn-primary" href="insertarActividad.php"><i class="fas fa-plus"></i></a>
                    </td>
                </tr>
               
            <?php }

            ?>
        </tbody>
    </table>

</div>


<?php include '../includes/footer.php'; ?>