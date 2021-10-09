<?php

    session_start();
    require 'data.php';

    $tabName='Eliminar elemento del catálogo';
    
    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $user1=$records->fetch(PDO::FETCH_ASSOC);

        if($user1['rango']!='admin'){

            header('Location: ../index');
            exit();

        }

    }else{

        header('Location: ../index');
        exit();

    }

    if (isset($_GET['programa'])){

        $_SESSION['cata']=$_GET['programa'];
        $_SESSION['cata2']='programa';

        $query="SELECT ocultar FROM programacatalogo WHERE programa=:programa";
        $records=$conn->prepare($query);
        $records->bindParam(':programa',$_SESSION['cata']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=1');
            exit();

        }
        

    }else if (isset($_GET['nivelEscolar'])){

        $_SESSION['cata']=$_GET['nivelEscolar'];
        $_SESSION['cata2']='nivelEscolar';

        $query="SELECT ocultar FROM nivelescolarcatalogo WHERE nivelEscolar=:nivelEscolar";
        $records=$conn->prepare($query);
        $records->bindParam(':nivelEscolar',$_SESSION['cata']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=2');
            exit();

        }
        
    }else if (isset($_GET['tipoActividad'])){

        $_SESSION['cata']=$_GET['tipoActividad'];
        $_SESSION['cata2']='tipoActividad';

        $query="SELECT ocultar FROM tipoactividadcatalogo WHERE tipoActividad=:tipoActividad";
        $records=$conn->prepare($query);
        $records->bindParam(':tipoActividad',$_SESSION['cata']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=3');
            exit();

        }        

    }else if (isset($_GET['area'])){

        $_SESSION['cata']=$_GET['area'];
        $_SESSION['cata2']='area';

        $query="SELECT ocultar FROM areacatalogo WHERE area=:area";
        $records=$conn->prepare($query);
        $records->bindParam(':area',$_SESSION['cata']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=4');
            exit();

        }  

    }else if (isset($_GET['institucion'])){

        $_SESSION['cata']=$_GET['institucion'];
        $_SESSION['cata2']='institucion';

        $query="SELECT ocultar FROM institucioncatalogo WHERE institucion=:institucion";
        $records=$conn->prepare($query);
        $records->bindParam(':institucion',$_SESSION['cata']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=5');
            exit();

        }

    }else if (isset($_GET['modalidad'])){

        $_SESSION['cata']=$_GET['modalidad'];
        $_SESSION['cata2']='modalidad';

        $query="SELECT ocultar FROM modalidadcatalogo WHERE modalidad=:modalidad";
        $records=$conn->prepare($query);
        $records->bindParam(':modalidad',$_SESSION['cata']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if(!$results){

            header('Location: mostrarCatalogo?pagina=6');
            exit();

        }

    }else{

    if(isset($_POST['Si'])){

        if ($_SESSION['cata2']=='programa'){



            $query="SELECT idActividad FROM actividad WHERE programaEvento=:programaEvento";
            $actividad=$conn->prepare($query);
            $actividad->bindParam(':programaEvento',$_SESSION['cata']);
            $actividad->execute();
            $actividades=$actividad->fetch(PDO::FETCH_ASSOC);

            $query="SELECT idUsuario FROM usuario WHERE programaEvento=:programaEvento";
            $usuario=$conn->prepare($query);
            $usuario->bindParam(':programaEvento',$_SESSION['cata']);
            $usuario->execute();
            $usuarios=$usuario->fetch(PDO::FETCH_ASSOC);

            if(empty($usuarios)&&empty($actividades)){

                $records=$conn->prepare("DELETE FROM programacatalogo WHERE programa = :programa");
                $records->bindParam(':programa',$_SESSION['cata']);
                $records->execute();
                $results=$records->fetch(PDO::FETCH_ASSOC);

                if($results){
                    
                    $message='Error, no se pudo eliminar el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='error';

                    header("Location: mostrarCatalogo?pagina=1");
                    exit();

                }else{

                    $message='Se eliminó el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='good';
                    
                    header("Location: mostrarCatalogo?pagina=1");
                    exit();

                }

            }else{

                $message='No se puede eliminar ya que está en uso';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='caution';

                header("Location: mostrarCatalogo?pagina=1");
                exit();

            }

        }else if ($_SESSION['cata2']=='nivelEscolar'){

            $query="SELECT idActividad FROM actividad WHERE nivelEscolarPublicoObjetivo=:nivelEscolarPublicoObjetivo";
            $actividad=$conn->prepare($query);
            $actividad->bindParam(':nivelEscolarPublicoObjetivo',$_SESSION['cata']);
            $actividad->execute();
            $actividades=$actividad->fetch(PDO::FETCH_ASSOC);
            
            if(empty($actividades)){

                $records=$conn->prepare("DELETE FROM nivelescolarcatalogo WHERE nivelEscolar = :nivelEscolar");
                $records->bindParam(':nivelEscolar',$_SESSION['cata']);
                $records->execute();
                $results=$records->fetch(PDO::FETCH_ASSOC);

                if($results){
                    
                    $message='Error, no se pudo el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='error';

                    header("Location: mostrarCatalogo?pagina=2");
                    exit();

                }else{

                    $message='Se eliminó el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='good';
                    
                    header("Location: mostrarCatalogo?pagina=2");
                    exit();

                }
            
            }else{

                $message='No se puede eliminar ya que está en uso';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='caution';

                header("Location: mostrarCatalogo?pagina=2");
                exit();

            }

        }else if ($_SESSION['cata2']=='tipoActividad'){

            $query="SELECT idActividad FROM actividad WHERE tipoActividad=:tipoActividad";
            $actividad=$conn->prepare($query);
            $actividad->bindParam(':tipoActividad',$_SESSION['cata']);
            $actividad->execute();
            $actividades=$actividad->fetch(PDO::FETCH_ASSOC);

            if(empty($actividades)){

                $records=$conn->prepare("DELETE FROM tipoactividadcatalogo WHERE tipoActividad = :tipoActividad");
                $records->bindParam(':tipoActividad',$_SESSION['cata']);
                $records->execute();
                $results=$records->fetch(PDO::FETCH_ASSOC);

                if($results){
                    
                    $message='Error, no se pudo eliminar el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='error';

                    header("Location: mostrarCatalogo?pagina=3");
                    exit();

                }else{

                    $message='Se eliminó el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='good';

                    header("Location: mostrarCatalogo?pagina=3");
                    exit();

                }
        
            }else{

                $message='No se puede eliminar ya que está en uso';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='caution';

                header("Location: mostrarCatalogo?pagina=3");
                exit();

            }

        }else if ($_SESSION['cata2']=='area'){

            $query="SELECT idActividad FROM actividad WHERE area=:area";
            $actividad=$conn->prepare($query);
            $actividad->bindParam(':area',$_SESSION['cata']);
            $actividad->execute();
            $actividades=$actividad->fetch(PDO::FETCH_ASSOC);

            if(empty($actividades)){

                $records=$conn->prepare("DELETE FROM areacatalogo WHERE area = :area");
                $records->bindParam(':area',$_SESSION['cata']);
                $records->execute();
                $results=$records->fetch(PDO::FETCH_ASSOC);

                if($results){
                    
                    $message='Error, no se pudo eliminar el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='error';

                    header("Location: mostrarCatalogo?pagina=4");
                    exit();

                }else{

                    $message='Se eliminó el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='good';

                    header("Location: mostrarCatalogo?pagina=4");
                    exit();

                }

            }else{

                $message='No se puede eliminar ya que está en uso';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='caution';

                header("Location: mostrarCatalogo?pagina=4");
                exit();


            }

        }else if ($_SESSION['cata2']=='institucion'){

            $query="SELECT idActividad FROM actividad WHERE nombreInstitucion=:nombreInstitucion";
            $actividad=$conn->prepare($query);
            $actividad->bindParam(':nombreInstitucion',$_SESSION['cata']);
            $actividad->execute();
            $actividades=$actividad->fetch(PDO::FETCH_ASSOC);

            $query="SELECT idUsuario FROM usuario WHERE nombreInstitucion=:nombreInstitucion";
            $usuario=$conn->prepare($query);
            $usuario->bindParam(':nombreInstitucion',$_SESSION['cata']);
            $usuario->execute();
            $usuarios=$usuario->fetch(PDO::FETCH_ASSOC);

            $query="SELECT id FROM ponente WHERE institucion=:institucion";
            $ponente=$conn->prepare($query);
            $ponente->bindParam(':institucion',$_SESSION['cata']);
            $ponente->execute();
            $ponentes=$ponente->fetch(PDO::FETCH_ASSOC);

            if(empty($usuarios)&&empty($actividades)&&empty($ponentes)){

                $records=$conn->prepare("DELETE FROM institucioncatalogo WHERE institucion = :institucion");
                $records->bindParam(':institucion',$_SESSION['cata']);
                $records->execute();
                $results=$records->fetch(PDO::FETCH_ASSOC);

                if($results){
                    
                    $message='Error, no se pudo eliminar el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='error';

                    header("Location: mostrarCatalogo?pagina=5");
                    exit();

                }else{

                    $message='Se eliminó el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='good';
                    
                    header("Location: mostrarCatalogo?pagina=5");
                    exit();

                }

            }else{

                $message='No se puede eliminar ya que está en uso';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='caution';

                header("Location: mostrarCatalogo?pagina=5");
                exit();

            }      

        }else if ($_SESSION['cata2']=='modalidad'){

            $query="SELECT idActividad FROM actividad WHERE modalidad=:modalidad";
            $actividad=$conn->prepare($query);
            $actividad->bindParam(':modalidad',$_SESSION['cata']);
            $actividad->execute();
            $actividades=$actividad->fetch(PDO::FETCH_ASSOC);

            if(empty($actividades)){

                $records=$conn->prepare("DELETE FROM modalidadcatalogo WHERE modalidad = :modalidad");
                $records->bindParam(':modalidad',$_SESSION['cata']);
                $records->execute();
                $results=$records->fetch(PDO::FETCH_ASSOC);

                if($results){
                    
                    $message='Error, no se pudo eliminar el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='error';
                    
                    header("Location: mostrarCatalogo?pagina=6");
                    exit();

                }else{

                    $message='Se eliminó el registro';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='good';
                    
                    header("Location: mostrarCatalogo?pagina=6");
                    exit();

                }

            }else{

                $message='No se puede eliminar ya que está en uso';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='caution';
                header("Location: mostrarCatalogo?pagina=6");
                exit();

            }

        }else{

            header("Location: ../index");
            exit();

        }

    }else if(isset($_POST['No'])){

        header("Location: mostrarCatalogo?pagina=".$_SESSION['paginaCatalogo']);
        exit();

    }
   
        header('Location: mostrarCatalogo?pagina=1');
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

                    if ($user1['rango']=='admin'){ 

            ?>

                        <a href="mostrarActividad" class="padi">Actividades</a>

                        <a href="mostrarUsuarios" class="padi">Usuarios</a>

                        <a href="banner" class="padi">Banner</a>

                        <a href="mostrarCatalogo" class="padi">Catálogo</a>

                        <a href="logout" class="padi">Cerrar Sesión</a>

                    <?php 

                        }else if($user1['rango']=='capturista'){
                        
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

        <form action="eliminarCatalogo" class="eliminar" method="POST">

            <label for="" class="eli">¿Está seguro de eliminar este elemento del catálogo?</label>

            <input type="submit" name="Si" class="eli field" value="Si">

            <input type="submit" name="No" class="eli field" value="No">

        </form>
    
    </div>

<?php include '../includes/footer.php';  ?>

