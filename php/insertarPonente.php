<?php

    $tabName='Agregar Participante';

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

    if (isset($_GET['idActividad'])){

        $id=$_GET['idActividad'];
        $_SESSION['idA']=$_GET['idActividad'];

    }else{

        header('Location: ../index');
        exit();

    }

    if(isset($_POST['save'])){

        $query="SELECT id FROM ponente WHERE id=:id AND nombre=:nombre AND nivelAcademico=:nivelAcademico AND institucion=:institucion AND telefono=:telefono AND email=:email AND tipoParticipante=:tipoParticipante";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nombre',$_POST['nombre'],PDO::PARAM_STR);
        $stmt->bindParam(':nivelAcademico',$_POST['nivelAcademico'],PDO::PARAM_STR);
        $stmt->bindParam(':institucion',$_POST['institucion'],PDO::PARAM_STR);
        $stmt->bindParam(':telefono',$_POST['telefono'],PDO::PARAM_STR);
        $stmt->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
        $stmt->bindParam(':tipoParticipante',$_POST['tipoParticipante']);
        $stmt->execute();

        $id1=$stmt->fetch(PDO::FETCH_ASSOC);

        if(($id1)){

            $message='Se creó al participante';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good2';

            header("Location: editarActividad?idActividad=".$_SESSION['idA'].'#ponente');
            exit();
            
        }else{


        $sql="INSERT INTO ponente( id, nombre, nivelAcademico, institucion, telefono, email, fechaCreacion, fechaModificacion,tipoParticipante,creadoPor,modificadoPor) VALUES ( :id, :nombre, :nivelAcademico, :institucion, :telefono, :email, :fechaCreacion, :fechaModificacion,:tipoParticipante,:creadoPor,:modificadoPor)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nombre',$_POST['nombre'],PDO::PARAM_STR);
        $stmt->bindParam(':nivelAcademico',$_POST['nivelAcademico'],PDO::PARAM_STR);
        $stmt->bindParam(':institucion',$_POST['institucion'],PDO::PARAM_STR);
        $stmt->bindParam(':telefono',$_POST['telefono'],PDO::PARAM_STR);
        $stmt->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
        date_default_timezone_set('America/Mexico_City'); 
        $fecha=date("Y-m-d H:i:s");
        $stmt->bindParam(':fechaCreacion',$fecha);
        $stmt->bindParam(':fechaModificacion',$fecha);
        $stmt->bindParam(':tipoParticipante',$_POST['tipoParticipante']);
        $stmt->bindParam(':creadoPor',$user['nombreContacto']);
        $stmt->bindParam(':modificadoPor',$user['nombreContacto']);

        if($stmt->execute()){           
            
            $message='Se creó al participante';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good2';

            header("Location: editarActividad?idActividad=".$_SESSION['idA'].'#ponente');
            exit();
          
        }else{
             
            $message='Error, no se pudo crear al particpante';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header("Location: editarActividad?idActividad=".$_SESSION['idA'].'#ponente');
            exit();
        }
    
    }
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

            Agregar participante

        </h1>

    </div>

    <form action="" method="POST" class="formulario" >

        <label class="etiqueta" for="fc">Ingrese el nombre completo</label> 
        <input type="text" name="nombre" class="field" autofocus required>

        <label class="etiqueta" for="fc">Ingrese el nivel académico</label> 
        <input type="text" name="nivelAcademico" class="field" required>

    <?php

            $query="SELECT nombreInstitucion FROM actividad WHERE idActividad=:idActividad";
            $res=$conn->prepare($query);
            $res->bindParam(':idActividad',$id);
            $res->execute();
            $ins=$res->fetch(PDO::FETCH_ASSOC);

    ?>

        <label class="etiqueta" >Ingrese el nombre de la institución</label>
         <input type="text" name="institucion" class="field" required>

        <label class="etiqueta" for="fc">Ingrese el número de teléfono </label> 
        <input type="text" name="telefono" class="field" required>

        <label class="etiqueta" for="fc">Ingrese el correo electrónico </label> 
        <input type="email"  name="email" class="field" autocomplete="on" required>

        <label class="etiqueta" for="rangoId">Elige el tipo de participante:</label>
        <select  class="field" id="rangoId" name="tipoParticipante" required>

            <option value="">--Por favor, selecciona una opción-</option>

            <option value="Coordinador">Coordinador</option>

            <option value="Ponente">Ponente</option>

        </select>
        
        <input type="submit" class="field" id="submit" name="save" value="Enviar">

    </form>

  <br>

<?php include '../includes/footer.php'; ?>