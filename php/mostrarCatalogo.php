<?php

    $tabName='Catalogo';

    session_start();

    require 'data.php';

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

    $pagina=1;

    if(isset($_GET['pagina'])){

        if($_GET['pagina']<1 || $_GET['pagina']>7){

            $_GET['pagina']=1;
            $pagina=1;
            header('Location: mostrarCatalogo?pagina=1');
            exit();

    
        }else{

            $pagina=$_GET['pagina'];

        }
    
    }else{

        $pagina=1;
        header('Location: mostrarCatalogo?pagina=1');
        exit();

    }

    $_SESSION['paginaCatalogo']=$pagina;
  
?>

<?php include '../includes/header.php'; ?>

    <script src="https://kit.fontawesome.com/03bb5336a4.js" crossorigin="anonymous"></script>

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

        <a href="mostrarUsuarios" class="padi">Usuarios</a>

        <a href="banner" class="padi">Banner</a>

        <a href="mostrarCatalogo" class="padi pestana">Catálogo</a>

        <a href="logout" class="padi">Cerrar Sesión</a>

    </div>
        
</div>


    <div class="centro pt-4 mt">

        <h1>

           Catálogo

        </h1>
    
    </div>

    <?php if($pagina==1){?>

    <div class="centro"  id="programa">

    <div class="datatable-container">

        <div class="header-tools">

            <div class="tools">

                <div class="agregar-boton ag ag2">

                    <a alt="Insertar" class="btn btn-primary boton" href="insertarCatalogo?programa='programa'>">Agregar</a>
                               
                </div>

                <div class="pages pg">
        
                    <ul>

                        <li class="li-a"> <a class="active" href="mostrarCatalogo?pagina=1">Programa</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=2">Nivel escolar</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=3">Tipo actividad</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=4">Área</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=5">Institución</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=6">Modalidad</a></li>

                    </ul>

                </div>

            </div>
                    
        </div>

        <table class="datatable">

            <thead>

                <th class="width-70" rowspan="2"> 
                       
                    Nombre del programa 

                </th>

                <th class="width-30" colspan="3">
                        
                    Acciones
                        
                </th>

                <tr>
      
                    <th scope="col">Editar</th>
                    <th scope="col">Borrar</th>
                    <th scope="col">Ocultar</th>
  
                </tr>

            </thead>

            <tbody>

                <?php
                        
                    $procat=$conn->prepare('SELECT * FROM programacatalogo');
                    $procat->execute();
 
                    while($pro=$procat->fetch(PDO::FETCH_ASSOC)){?>

                        <tr>

                            <td class="centro">

                                <?= $pro['programa']?>

                            </td>

                            <td class="centro">

                                <div class="botones">

                                    <a alt="Editar" class="btn btn-warning" href="editarCatalogo?programa=<?php echo$pro['programa']?>"><i class="fas fa-edit"> </i></a>
                            
                                </div>

                            </td>

                            
                            <td class="centro">

                                <div class="botones">

                                    <a alt="Eliminar" class="btn btn-danger" href="eliminarCatalogo?programa=<?php echo$pro['programa']?>"><i class="fas fa-trash-alt"> </i></a>
                            
                                </div>

                            </td>

                            <td class="centro">

                                <?php

                                    if($pro['ocultar']==0){

                                ?>

                                        <div class="botones">

                                            <a alt="Ocultar" class="btn btn-success" href="ocultarCatalogo?programa=<?php echo$pro['programa']?>"><i class="fas fa-eye"></i></a>
                                    
                                        </div>

                                <?php

                                    }else{

                                ?>

                                        <div class="botones">

                                            <a alt="Ocultar" class="btn btn-dark" href="ocultarCatalogo?programa=<?php echo$pro['programa']?>"><i class="far fa-eye-slash"></i></a>
                                    
                                        </div>
                                
                                <?php

                                    }

                                ?>
                                    
                            </td>

                        </tr>
                        
                    <?php 

                    }

                    ?>

            </tbody>

        </table>

    </div>

    </div>

    <?php }else if($pagina==2){?>
    
    <div class="centro" id="nivelEscolar">
   
    <div class="datatable-container">

        <div class="header-tools">

            <div class="tools">

                <div class="agregar-boton ag ag2">

                    <a alt="Insertar" class="btn btn-primary boton" href="insertarCatalogo?nivelEscolar='nivelEscolar'">Agregar</a>
                                
                </div>

                <div class="pages pg">
        
                    <ul>

                        <li class="li-a"> <a href="mostrarCatalogo?pagina=1">Programa</a> </li>
                        <li class="li-a"> <a class="active" href="mostrarCatalogo?pagina=2">Nivel escolar</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=3">Tipo actividad</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=4">Área</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=5">Institución</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=6">Modalidad</a></li>

                    </ul>

                </div>

            </div>

        </div>
        

        <table class="datatable">

            <thead>

                    <th class="width-70" rowspan="2"> 
                       
                        Nombre del nivel escolar del público objetivo

                    </th>
                
                    <th class="width-30" colspan="3">
                        
                        Acciones
                        
                    </th>

                    <tr>
      
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        <th scope="col">Ocultar</th>
    
                    </tr>

                </thead>

                <tbody>

                    <?php
                        
                        $procat=$conn->prepare('SELECT * FROM nivelescolarcatalogo');
                        $procat->execute();
                            
                        while($pro=$procat->fetch(PDO::FETCH_ASSOC)){?>

                            <tr>

                                <td>

                                    <?= $pro['nivelEscolar']?>

                                </td>

                                <td class="centro" >

                                    <div class="botones">
                                        
                                    <a alt="Editar" class="btn btn-warning" href="editarCatalogo?nivelEscolar=<?php echo$pro['nivelEscolar']?>"><i class="fas fa-edit"> </i></a>
                                    
                                    </div>

                                </td>

                                <td class="centro" >

                                    <div class="botones">

                                    <a alt="Eliminar" class="btn btn-danger" href="eliminarCatalogo?nivelEscolar=<?php echo$pro['nivelEscolar']?>"><i class="fas fa-trash-alt"> </i></a>
                                    
                                    </div>
      
                                </td>

                                <td class="centro" >

                                <?php

                                    if($pro['ocultar']==0){

                                ?>

                                        <div class="botones">

                                            <a alt="Ocultar" class="btn btn-success" href="ocultarCatalogo?nivelEscolar=<?php echo$pro['nivelEscolar']?>"><i class="fas fa-eye"></i></a>
                                    
                                        </div>

                                <?php

                                    }else{

                                ?>

                                        <div class="botones">

                                            <a alt="Ocultar" class="btn btn-dark" href="ocultarCatalogo?nivelEscolar=<?php echo$pro['nivelEscolar']?>"><i class="far fa-eye-slash"></i></a>
                                    
                                        </div>
                                
                                <?php

                                    }

                                ?>

                                </td>

                            </tr>
                        
                        <?php 

                        }

                        ?>

                </tbody>

        </table>

    </div>

    </div>

    <?php }else if($pagina==3){?>

    <div class="centro" id="tipoActividad">
  
    <div class="datatable-container">

        <div class="header-tools">

            <div class="tools">
               
                <div class="agregar-boton ag ag2">

                    <a alt="Insertar" class="btn btn-primary boton" href="insertarCatalogo?tipoActividad='tipoActividad'">Agregar</a>    
                        
                </div>

                <div class="pages pg">
        
                    <ul>

                        <li class="li-a"> <a href="mostrarCatalogo?pagina=1">Programa</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=2">Nivel escolar</a> </li>
                        <li class="li-a"> <a class="active" href="mostrarCatalogo?pagina=3">Tipo actividad</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=4">Área</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=5">Institución</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=6">Modalidad</a></li>

                    </ul>

                </div>

            </div>

        </div>

        <table class="datatable">

            <thead>

                    <th class="width-70" rowspan="2"> 
                       
                        Nombre del tipo de actividad

                    </th>
                
                    <th class="width-30" colspan="3">
                        
                        Acciones
                        
                    </th>

                    <tr>
      
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        <th scope="col">Ocultar</th>
    
                    </tr>

                </thead>

                <tbody>

                    <?php 

                        $procat=$conn->prepare('SELECT * FROM tipoactividadcatalogo');
                        $procat->execute();
                        
                        while($pro=$procat->fetch(PDO::FETCH_ASSOC)){?>

                            <tr>

                                <td>

                                    <?= $pro['tipoActividad']?>

                                </td>

                                <td class="centro" >

                                    <div class="botones">

                                        <a alt="Editar" class="btn btn-warning" href="editarCatalogo?tipoActividad=<?php echo$pro['tipoActividad']?>"><i class="fas fa-edit"> </i></a>
                            
                                    </div>

                                </td>

                                <td class="centro" >

                                    <div class="botones">

                                        <a alt="Eliminar" class="btn btn-danger" href="eliminarCatalogo?tipoActividad=<?php echo$pro['tipoActividad']?>"><i class="fas fa-trash-alt"> </i></a>
                            
                                    </div>

                                </td>
                                    
                                <td class="centro" >
                                
                                <?php

                                    if($pro['ocultar']==0){

                                ?>

                                        <div class="botones">

                                            <a alt="Ocultar" class="btn btn-success" href="ocultarCatalogo?tipoActividad=<?php echo$pro['tipoActividad']?>"><i class="fas fa-eye"></i></a>
                                    
                                        </div>

                                <?php

                                    }else{

                                ?>

                                        <div class="botones">

                                            <a alt="Ocultar" class="btn btn-dark" href="ocultarCatalogo?tipoActividad=<?php echo$pro['tipoActividad']?>"><i class="far fa-eye-slash"></i></a>
                                    
                                        </div>
                                
                                <?php

                                    }

                                ?>

                                </td>

                            </tr>
                        
                        <?php 

                        }

                        ?>

            </tbody>


        </table>

    </div>
    
    </div>
   
    <?php }else if($pagina==4){?>

    <div class="centro" id="area">

    <div class="datatable-container">

        <div class="header-tools">

            <div class="tools">

                <div class="agregar-boton ag ag2">

                    <a alt="Insertar" class="btn btn-primary boton" href="insertarCatalogo?area='area'">Agregar</a>    

                </div>

                <div class="pages pg">
        
                    <ul>

                        <li class="li-a"> <a href="mostrarCatalogo?pagina=1">Programa</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=2">Nivel escolar</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=3">Tipo actividad</a> </li>
                        <li class="li-a"> <a class="active" href="mostrarCatalogo?pagina=4">Área</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=5">Institución</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=6">Modalidad</a></li>

                    </ul>

                </div>

            </div>

        </div>

        <table class="datatable">

            <thead>
    
                        <th class="width-70" rowspan="2"> 
                           
                            Nombre del area
    
                        </th>
                    
                        <th class="width-30" colspan="3">
                            
                            Acciones
                            
                        </th>

                        <tr>
      
                            <th scope="col">Editar</th>
                            <th scope="col">Borrar</th>
                            <th scope="col">Ocultar</th>
        
                        </tr>
    
                    </thead>
    
                    <tbody>
    
                        <?php
                            
                            $procat=$conn->prepare('SELECT * FROM areacatalogo');

                            $procat->execute();
                            
                            while($pro=$procat->fetch(PDO::FETCH_ASSOC)){?>
    
                                <tr>
    
                                    <td>
    
                                        <?= $pro['area']?>
    
                                    </td>
    
                                <td class="centro" >

                                    <div class="botones">
    
                                        <a alt="Editar" class="btn btn-warning" href="editarCatalogo?area=<?php echo$pro['area']?>"><i class="fas fa-edit"> </i></a>
                                
                                    </div>

                                </td>

                                <td class="centro" >

                                    <div class="botones">

                                        <a alt="Eliminar" class="btn btn-danger" href="eliminarCatalogo?area=<?php echo$pro['area']?>"><i class="fas fa-trash-alt"> </i></a>
                                
                                    </div>

                                </td>
                                
                                <td class="centro" >
                                
                                <?php

                                    if($pro['ocultar']==0){

                                ?>

                                        <div class="botones">

                                            <a alt="Ocultar" class="btn btn-success" href="ocultarCatalogo?area=<?php echo$pro['area']?>"><i class="fas fa-eye"></i></a>
                                    
                                        </div>

                                <?php

                                    }else{

                                ?>

                                        <div class="botones">

                                            <a alt="Ocultar" class="btn btn-dark" href="ocultarCatalogo?area=<?php echo$pro['area']?>"><i class="far fa-eye-slash"></i></a>
                                    
                                        </div>
                                
                                <?php

                                    }

                                ?>

                                </td>
    
                                </tr>
                            
                            <?php 
    
                            }
    
                            ?>
    
                    </tbody>


        </table>

    </div>
   
    </div>

    <?php }else if($pagina==5){?>

    <div class="centro" id="institucion">

    <div class="datatable-container">

        <div class="header-tools">

            <div class="tools">

                <div class="agregar-boton ag ag2">

                    <a alt="Insertar" class="btn btn-primary boton" href="insertarCatalogo?institucion='institucion'">Agregar</a>

                </div>

                <div class="pages pg">
        
                    <ul>

                        <li class="li-a"> <a href="mostrarCatalogo?pagina=1">Programa</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=2">Nivel escolar</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=3">Tipo actividad</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=4">Área</a> </li>
                        <li class="li-a"> <a class="active" href="mostrarCatalogo?pagina=5">Institución</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=6">Modalidad</a></li>

                    </ul>

                </div>

            </div>

        </div>

        <table class="datatable">

                <thead>
        
                    <th class="width-70" rowspan="2"> 
                               
                        Nombre de la institución
        
                    </th>
                        
                    <th class="width-30" colspan="3">
                                
                        Acciones
                                
                    </th>

                    <tr>
      
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        <th scope="col">Ocultar</th>
    
                    </tr>
        
                </thead>
        
                <tbody>
                            
                    <?php

                        $procat=$conn->prepare('SELECT * FROM institucioncatalogo');
   
                        $procat->execute();
                                
                        while($pro=$procat->fetch(PDO::FETCH_ASSOC)){?>
        
                            <tr>
        
                                <td>
        
                                        <?= $pro['institucion']?>
        
                                    </td>
        
                                    <td class="centro" >
        
                                        <div class="botones">

                                            <a alt="Editar" class="btn btn-warning" href="editarCatalogo?institucion=<?php echo$pro['institucion']?>"><i class="fas fa-edit"> </i></a>
                                        
                                        </div>

                                    </td>

                                    <td class="centro" >

                                        <div class="botones">

                                            <a alt="Eliminar" class="btn btn-danger" href="eliminarCatalogo?institucion=<?php echo$pro['institucion']?>"><i class="fas fa-trash-alt"> </i></a>
                                        
                                        </div>

                                    </td>

                                    <td class="centro" >

                                <?php

                                    if($pro['ocultar']==0){

                                ?>

                                        <div class="botones">

                                            <a alt="Ocultar" class="btn btn-success" href="ocultarCatalogo?institucion=<?php echo$pro['institucion']?>"><i class="fas fa-eye"></i></a>
                                    
                                        </div>

                                <?php

                                    }else{

                                ?>

                                        <div class="botones">

                                            <a alt="Ocultar" class="btn btn-dark" href="ocultarCatalogo?institucion=<?php echo$pro['institucion']?>"><i class="far fa-eye-slash"></i></a>
                                    
                                        </div>
                                
                                <?php

                                    }

                                ?>
                                            
                                    </td>
        
                            </tr>

                            <?php
        
                                }

                            ?>

                        </tbody>
        

        </table>

    </div>

    </div>

    <?php }else if($pagina==6){?>

    <div class="centro" id="modalidad">

    <div class="datatable-container">

        <div class="header-tools">

            <div class="tools">

                <div class="agregar-boton ag ag2">

                    <a alt="Insertar" class="btn btn-primary boton" href="insertarCatalogo?modalidad='modalidad'">Agregar</a>

                </div>

                <div class="pages pg">
        
                    <ul>

                        <li class="li-a"> <a href="mostrarCatalogo?pagina=1">Programa</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=2">Nivel escolar</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=3">Tipo actividad</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=4">Área</a> </li>
                        <li class="li-a"> <a href="mostrarCatalogo?pagina=5">Institución</a> </li>
                        <li class="li-a"> <a class="active" href="mostrarCatalogo?pagina=6">Modalidad</a></li>

                    </ul>

                </div>

            </div>

        </div>

        <table class="datatable">

            <thead>

                        <thead>
        
                            <th class="width-70" rowspan="2"> 
                               
                                Nombre de la modalidad
        
                            </th>
                        
                            <th class="width-30" colspan="3">
                                
                                Acciones
                                
                            </th>

                            <tr>
      
                                <th scope="col">Editar</th>
                                <th scope="col">Borrar</th>
                                <th scope="col">Ocultar</th>
            
                            </tr>
        
                        </thead>
        
                        <tbody>
        
                            <?php
                                
                                
                                //$records=$conn->prepare('SELECT * FROM usuario WHERE rango<>:rango');
                                $procat=$conn->prepare('SELECT * FROM modalidadcatalogo');
                                //$records->bindParam(':rango',$r);
                                $procat->execute();
                                
                                while($pro=$procat->fetch(PDO::FETCH_ASSOC)){?>
        
                                    <tr>
        
                                        <td>
        
                                            <?= $pro['modalidad']?>
        
                                        </td>
        
                                        <td class="centro" >

                                            <div class="botones">
                                                
                                                <a alt="Editar" class="btn btn-warning" href="editarCatalogo?modalidad=<?php echo$pro['modalidad']?>"><i class="fas fa-edit"> </i></a>
                                            
                                            </div>

                                        </td>

                                        <td class="centro" >

                                            <div class="botones">

                                                <a alt="Eliminar" class="btn btn-danger" href="eliminarCatalogo?modalidad=<?php echo$pro['modalidad']?>"><i class="fas fa-trash-alt"> </i></a>
                                            
                                            </div>

                                        </td>

                                        <td class="centro" >

                                    <?php

                                        if($pro['ocultar']==0){

                                    ?>

                                            <div class="botones">

                                                <a alt="Ocultar" class="btn btn-success" href="ocultarCatalogo?modalidad=<?php echo$pro['modalidad']?>"><i class="fas fa-eye"></i></a>
                                        
                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="botones">

                                                <a alt="Ocultar" class="btn btn-dark" href="ocultarCatalogo?modalidad=<?php echo$pro['modalidad']?>"><i class="far fa-eye-slash"></i></a>
                                        
                                            </div>
                                    
                                    <?php

                                        }

                                    ?>

                                            </td>
            
                                        </tr>
                                    
                                <?php 
            
                                    }
            
                                ?>
        
                        </tbody>

        </table>

    </div>

    </div>
    
    <?php }?>

    <div id="cat"></div>
    <br><br>

<?php include '../includes/footer.php'; ?>