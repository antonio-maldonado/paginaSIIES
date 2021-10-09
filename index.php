<?php

    $tabName='Inicio';

    session_start();

    require 'php/data.php';

    if(isset($_SESSION['user_id'])){


        $_SESSION['consulta']='';
        $_SESSION['num']=10;
        $_SESSION['pagActividad']=1;
        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        $user=null;

        if(count($results)>0){

            $user=$results;

        }
        header('Location: php/mostrarActividad');
        exit();

        

    }else{
    
        header('Location: php/login3');
        exit();

    }

?>

<?php include 'includes/header.php'; ?>

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

                    if ($results['rango']=='admin'){ 

            ?>
                        <a href="php/mostrarActividad" class="padi">Actividades</a>
                          
                        <a href="php/banner" class="padi">Banner</a>

                        <a href="php/mostrarUsuarios" class="padi">Usuarios</a>

                        <a href="php/mostrarCatalogo" class="padi">Catálogo</a>

                        <a href="php/logout" class="padi">Cerrar Sesión</a>

                    <?php 

                        }else if($results['rango']=='capturista'){
                        
                    ?>
                    
                            <a href="php/mostrarActividad" class="padi">Actividades</a>

                            <a href="php/usuario" class="padi">Usuario</a>

                            <a href="php/logout" class="padi">Cerrar Sesión</a>
                        
                <?php

                        }

                    }else{

                ?>

                        <a href="php/login3" class="padi">Iniciar Sesión</a>
                
                <?php

                    }

                ?>
                
            </div>
            
    </div>

    <div class="l-form2">
    
        <div class="form2">
    
            <?php

                $query='SELECT * FROM imagen WHERE banner=:banner';
                $img=$conn->prepare($query);
                $uno=1;
                $img->bindParam(':banner',$uno);
                $img->execute();
                $imagen=$img->fetch(PDO::FETCH_ASSOC);

            ?>

            <img src="data:<?=$imagen['tipo']?>;base64,<?=base64_encode($imagen['img']);?>" class="" alt="">

        </div>

    </div>

<?php include 'includes/footer.php'; ?>