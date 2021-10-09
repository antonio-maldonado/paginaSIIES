<?php

    $tabName='Actividades';

    session_start();

    require 'data.php';
   
    if(isset($_SESSION['user_id'])){
        
        $user=$conn->prepare('SELECT * FROM usuario WHERE idUsuario=:id');
        $user->bindParam(':id',$_SESSION['user_id']);
        $user->execute();
        $user1=$user->fetch(PDO::FETCH_ASSOC);

        $_SESSION['institucion']=$user1['nombreInstitucion'];
        $_SESSION['rango']=$user1['rango'];

        if($user1['rango']=='admin'){

            $records=$conn->prepare('SELECT * FROM actividad');
            $records->execute();
           
        }else if($user1['rango']=='capturista'){

            $records=$conn->prepare('SELECT * FROM actividad WHERE nombreInstitucion=:nombreInstitucion');
            $records->bindParam(':nombreInstitucion',$user1['nombreInstitucion']);
            $records->execute();

        }

    }else{

        header('Location: ../index');
        exit();
        
    }

   
    if(isset($_GET['pagina'])){

        $_SESSION['pagActividad']=$_GET['pagina'];

        if($_GET['pagina']<1 || $_GET['pagina']>$_SESSION['pp']){

            $_GET['pagina']=1;
            $_SESSION['pagActividad']=1;
            header('Location: mostrarActividad?pagina=1');
            exit();

        }
    
    }else{

        $_SESSION['pagActividad']=1;
        $_GET['pagina']=1;


    }
  
    if($_GET['pagina']!=$_SESSION['pagActividad']){

        $_SESSION['pagActividad']=1;
        header('Location: mostrarActividad?pagina=1');
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
                        <a href="mostrarActividad" class="padi pestana">Actividades</a>

                        <a href="mostrarUsuarios" class="padi">Usuarios</a>

                        <a href="banner" class="padi">Banner</a>

                        <a href="mostrarCatalogo" class="padi">Catálogo</a>

                        <a href="logout" class="padi">Cerrar Sesión</a>

                    <?php 

                        }else if($user1['rango']=='capturista'){
                        
                    ?>

                            <a href="mostrarActividad" class="padi pestana">Actividades</a>

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

    <div class="centro pt-4 mt ">

        <h1>

            Actividades

        </h1>

    </div>
  
    <div class="datatable-container">

        <div class="header-tools">

            <div class="tools">

                <div class="agregar-boton ">

                <?php

                    if($user1['nivel']==0){

                ?>
                    
                    <a alt="Insertar" class="btn btn-primary boton"  href="insertarActividad">Agregar  actividad</a>

                <?php

                    }

                ?>

                </div>
                        
            </div>

            <i class='bx bx-search-alt ser' ></i>

            <div class="search">
                
                <input type="text" class="search-input" name="caja_busqueda" id="caja_busqueda" value="<?=$_SESSION['consulta']?>"  onfocus="var val=this.value; this.value=''; this.value= val;" autofocus >
      
                
            </div>
  

    
                </div>

               <div id="datos">
                

               </div>

    </div>

        <form action="buscarActividad" method="POST">

            <div class="centro jc">
                
                <button type="submit" class="exp" name="save">Descargar reporte de actividades</button>
                    
            </div>

        </form>
        
<br><br>


  <br><br>

<?php include '../includes/footer.php';  ?>
