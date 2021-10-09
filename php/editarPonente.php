<?php

    $tabName='Editar Participante';

    session_start();

    require 'data.php';

    $message='';

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango,nivel FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $user=$records->fetch(PDO::FETCH_ASSOC);

        if($user['nivel']==1){

            header('Location: mostrarActividad');
            exit();

        }
  
    }else{

        header('Location: ../index');
        exit();

    }

    if (isset($_GET['idPonente'])){

        $id=$_GET['idPonente'];
        $_SESSION['idPonente']=$id;

        $records=$conn->prepare('SELECT * FROM ponente WHERE idPonente=:idPonente');
        $records->bindParam(':idPonente',$id);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
            exit();

        }

    }else if (!isset($_GET['idPonente'])&&!isset($_POST['save'])){

        header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
        exit();

    }

    if (isset($_POST['save'])){

        $idPonente=$_SESSION['idPonente'];
        $nombre=$_POST['nombre'];
        $institucion=$_POST['institucion'];
        $telefono=$_POST['telefono'];
        $nivelAcademico=$_POST['nivelAcademico'];
        $email=$_POST['email'];
        $tipoParticipante=$_POST['tipoParticipante'];
        date_default_timezone_set('America/Mexico_City'); 
        $fecha=date("Y-m-d H:i:s");
        $modificadoPor=$user['nombreContacto'];

        $sql="UPDATE ponente SET modificadoPor='".$modificadoPor."', fechaModificacion='".$fecha."', nombre='".$nombre."', institucion='".$institucion."', telefono='".$telefono."', nivelAcademico='".$nivelAcademico."', email='".$email."', tipoParticipante='".$tipoParticipante."'  WHERE idPonente = '".$idPonente."' ";
        $stmt=$conn->prepare($sql);
    
        if($stmt->execute()){

            $records2=$conn->prepare('SELECT id FROM ponente WHERE idPonente=:id');
            $records2->bindParam(':id',$idPonente);
            $records2->execute();
            $results2=$records2->fetch(PDO::FETCH_ASSOC);

            $message='Actualizacion exitosa';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good';

            header("Location: editarActividad?idActividad=".$results2['id'].'#ponente');
            exit();
            
        }else{

            $message='Error, Actualizacion no completada';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';
            header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
            exit();
        

        }
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

            Editar participante

        </h1>

    </div>

    <form action=""  class="formulario" method="POST">

            <label class="etiqueta" for="fc">Ingrese el nombre completo</label> 
            <input type="text" name="nombre" value="<?= $results['nombre'] ?>"  class="field"  onfocus="var val=this.value; this.value=''; this.value= val;" autofocus required>

            <label class="etiqueta" for="fc">Ingrese el nivel académico</label> 
            <input type="text" value="<?= $results['nivelAcademico'] ?>" name="nivelAcademico" class="field" required>

            <label class="etiqueta" >Ingrese el nombre de la institución</label>
            <input type="text" name="institucion" value="<?= $results['institucion'] ?>" class="field" required>

            <label class="etiqueta" for="fc">Ingrese el número de teléfono </label> 
            <input type="text" value="<?= $results['telefono'] ?>" name="telefono" class="field" required>

            <label class="etiqueta" for="fc">Ingrese el correo electrónico </label> 
            <input type="email" value="<?= $results['email'] ?>"  name="email" class="field" autocomplete="on" required>

            <label class="etiqueta" for="rangoId">Elige el tipo de participante:</label>
            <select  class="field" id="rangoId" name="tipoParticipante" required>

                <?php

                    if($results['tipoParticipante']=='Ponente'){

                ?>

                        <option value="Ponente">Ponente</option>

                        <option value="Coordinador">Coordinador</option>

                <?php

                    }else{

                ?>

                        <option value="Coordinador">Coordinador</option>

                        <option value="Ponente">Ponente</option>

                <?php

                    }

                ?>
               
            </select>
            
            <input type="submit" class="field" name="save" value="Enviar">

        </form>

   <br> <br>
   
<?php include '../includes/footer.php'; ?>