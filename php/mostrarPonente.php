<?php

    $tabName='Participante';

    session_start();

    require 'data.php';

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $user=$records->fetch(PDO::FETCH_ASSOC);

        if(isset($_GET['idPonente'])){
            
            $id=$_GET['idPonente'];
            
            $records=$conn->prepare('SELECT * FROM ponente WHERE idPonente=:idPonente');
            $records->bindParam(':idPonente',$id);
            $records->execute();
            $results=$records->fetch(PDO::FETCH_ASSOC);

            if(!$results){

                header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
                exit();
    
            }

        }else{

            header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
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

                if ($user['rango']=='admin'){ 

        ?>
               
                    <a href="mostrarActividad" class="padi">Actividades</a>

                    <a href="mostrarUsuarios" class="padi">Usuarios</a>

                    <a href="banner" class="padi">Banner</a>

                    <a href="mostrarCatalogo" class="padi">Catálogo</a>

                    <a href="logout" class="padi">Cerrar Sesión</a>

                <?php 

                    }else if($user['rango']=='capturista'){
                    
                ?>

                        <a href="mostrarActividad" class="padi">Actividades</a>

                        <a href="usuario" class="padi">Usuario</a>

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

            Participante

        </h1>

    </div>

    <form action="editarActividad.php?idActividad=<?=$results['id']?>" method="POST" class="formulario">

        <label class="etiqueta" for="fc">Nombre completo</label> 
        <input type="text" name="nombre" value="<?= $results['nombre'] ?>"  class="field" autofocus  disabled>

        <label class="etiqueta" for="fc">Nivel académico</label> 
        <input type="text" value="<?= $results['nivelAcademico'] ?>" name="nivelAcademico" class="field"  disabled>


        <label class="etiqueta" >Nombre de institución</label>
        <input type="text" value="<?= $results['institucion'] ?>" name="nivelAcademico" class="field"  disabled>
            
        <label class="etiqueta" for="fc">Número de teléfono </label> 
        <input type="text" value="<?= $results['telefono'] ?>" name="telefono" class="field"  disabled>

        <label class="etiqueta" for="fc">Correo electrónico </label> 
        <input type="email" value="<?= $results['email'] ?>"  name="email" class="field" autocomplete="on"  disabled>

        <label class="etiqueta" for="fc">Tipo de participante </label> 
        <input type="text" value="<?= $results['tipoParticipante'] ?>" name="telefono" class="field"  disabled>
        
        <label class="etiqueta" >Creado por:</label> 
        <input type="text" id="per" class="field"  value="<?= $results['creadoPor'] ?>" name="numeroPersonas"  min="0" max="9999" disabled required>

        <label class="etiqueta" for="fc">Fecha de creación</label> 
        <input type="text" id="per" class="field"  value="<?= $results['fechaCreacion'] ?>" name="numeroPersonas"  min="0" max="9999" disabled required>

        <label class="etiqueta">Modificado por:</label> 
        <input type="text" id="per" class="field"  value="<?= $results['modificadoPor'] ?>" name="numeroPersonas"  min="0" max="9999" disabled required>
       
        <label class="etiqueta" >Fecha de la ultima modificación</label> 
        <input type="text" id="per" class="field"  value="<?= $results['fechaModificacion'] ?>" name="numeroPersonas"  min="0" max="9999" disabled required>
        
    </form>

    <br><br>

<?php include '../includes/footer.php'?>