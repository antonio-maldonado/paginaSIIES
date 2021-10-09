<?php

    session_start();
    require 'data.php';

    $tabName='Usuarios';

    if(isset($_SESSION['user_id'])){
        
        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
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

    if(isset($_GET['pagina'])){

        $_SESSION['pagUsuario']=$_GET['pagina'];

        if($_GET['pagina']<1 || $_GET['pagina']>$_SESSION['pu']){

            $_GET['pagina']=1;
            $_SESSION['pagUsuario']=1;

            header('Location: mostrarUsuarios?pagina=1');
            exit();

        }
    
    }else{

        $_SESSION['pagUsuario']=1;
        $_GET['pagina']=1;
       
    }
  
    if($_GET['pagina']!=$_SESSION['pagUsuario']){

        header('Location: mostrarUsuarios?pagina=1');
        exit();

    }

?>

<?php include '../includes/header.php'?>

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

                <a href="mostrarUsuarios" class="padi pestana">Usuarios</a>

                <a href="banner" class="padi">Banner</a>

                <a href="mostrarCatalogo" class="padi">Catálogo</a>

                <a href="logout" class="padi">Cerrar Sesión</a>
                    
            </div>
                
        </div>

    <div class="centro mt">

        <h1>

           Usuarios

        </h1>

    </div>  

    <div class="datatable-container" >

        <div class="header-tools">

            <div class="tools">

                <div class="agregar-boton ">

                    <a alt="Insertar" class="btn btn-primary boton"  href="insertarUsuario">Agregar Usuario</a>

                </div>

            </div>

            <i class='bx bx-search-alt ser' ></i>

            <div class="search">

                <input type="text"class="search-input" name="busqueda" id="busqueda"  onfocus="var val=this.value; this.value=''; this.value= val;" autofocus value="<?=$_SESSION['usuario']?>" >

            </div>

        </div>

            <div id="user">
                   
            </div>
               
    </div>

    <div id="us"></div>
    
    <br><br><br><br><br>

<?php include '../includes/footer.php'; ?>